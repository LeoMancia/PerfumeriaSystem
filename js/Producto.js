$(document).ready(function() {
    var funcion;
    $('.select2').select2();
    rellenar_linea();
    rellenar_tipos();
    rellenar_presentaciones();
    buscar_producto();
    
    function rellenar_linea() {
        funcion="rellenar_linea";
        $.post('../Controlador/LineaController.php',{funcion},(response)=>{
            
            const Lineas = JSON.parse(response);
            let template='';
            Lineas.forEach(linea => {
                
                template+=`
                <option value="${linea.id}">${linea.nombre}</option>
                `;
            });
            $('#lineaperfume').html(template);
        })
    }

    function rellenar_tipos() {
        funcion="rellenar_tipos";
        $.post('../Controlador/TipoController.php',{funcion},(response)=>{
            
            const Tipos = JSON.parse(response);
            let template='';
            Tipos.forEach(tipo => {
                
                template+=`
                <option value="${tipo.id}">${tipo.nombre}</option>
                `;
            });
            $('#tipo').html(template);
        })
    }

    function rellenar_presentaciones() {
        funcion="rellenar_presentaciones";
        $.post('../Controlador/PresentacionController.php',{funcion},(response)=>{
            
            const Presentacion = JSON.parse(response);
            let template='';
            Presentacion.forEach(presentacion => {
                
                template+=`
                <option value="${presentacion.id_presentacion}">${presentacion.cant_presentacion}</option>
                `;
            });
            $('#Presentacion').html(template);
        })
    }
    $('#form-crear-producto').submit(e=>{
        let nombre = $('#nombre_producto').val();
        let cantidad = $('#cantidad').val(); 
        let adicional = $('#adicional').val();
        let precio = $('#precio').val();
        let linea = $('#lineaperfume').val();
        let tipo = $('#tipo').val();
        let presentacion = $('#Presentacion').val();
        funcion="crear";
        $.post('../controlador/ProductoController.php',{funcion,nombre,cantidad,adicional,precio,linea,tipo,presentacion}, (response)=>{
            if (response=='add') {
                $('#add').hide('slow');
                $('#add').show(200);
                $('#add').hide(5000);
                $('#form-crear-producto').trigger('reset');  
            }if (response=='noadd') {
                $('#noadd').hide('slow');
                $('#noadd').show(200);
                $('#noadd').hide(5000);
                $('#form-crear-producto').trigger('reset');  
            }
            buscar_producto();
        });
        e.preventDefault();
    });
    function buscar_producto(consulta){
        funcion="buscar";
        $.post('../controlador/ProductoController.php',{consulta,funcion},(response)=>{
            const productos = JSON.parse(response);
            let template ='';
            productos.forEach(producto =>{
                template+=` 
                <div proID="${producto.id}"proNombre="${producto.nombre}"proPrecio="${producto.precio}"proLinea="${producto.Linea}"proPresentacion="${producto.presentacion}"proTipo="${producto.tipo}"proAdicional="${producto.adicional}"proavatar="${producto.avatar}" class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Magic Essense
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>${producto.nombre}</b></h2>
                      <h4 class="lead"><b><i class="fas fa-lg fa-dollar-sign mr-1"></i>${producto.precio}</b></h4>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="far fa-user mr-1"></i></span> Linea: ${producto.Linea}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-spray-can mr-1"></i></span> Presentacion: ${producto.presentacion}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-wind mr-1"></i></span> Tipo: ${producto.tipo}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-plus mr-1"></i></span> Adicional: ${producto.adicional}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="${producto.avatar}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <button  class="avatar btn btn-sm bg-teal">
                      <i class="fas fa-image"></i>
                    </button>
                    <button  class="editar btn btn-sm btn-success">
                      <i class="fas fa-pencil-alt"></i> 
                    </button>
                    <button  class="borrar btn btn-sm btn-danger">
                      <i class="fas fa-trash-alt"></i> 
                    </button>
                  </div>
                </div>
              </div>
            </div>
                
                `;

            });
            $('#productos').html(template);
        });
    }
     //bloque de codigo que captura lo que se escribe en el teclado
    //y lo manda a la funcion buscar_datos
    $(document).on('keyup','#buscar-producto',function(){
        let valor = $(this).val();
        if (valor !="") {
            buscar_producto(valor);
            
        } else {
            buscar_producto();
        }
    }); 
    $(document).on('click', '.avatar', (e)=>{
        funcion="cambiar_avatar";
        const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
        const id = $(elemento).attr('proID');
        const avatar1 = $(elemento).attr('proavatar');
        console.log(elemento)
        console.log(id+' '+avatar1);
    })
})