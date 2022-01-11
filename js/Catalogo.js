$(document).ready(function(){
  $('#cat-carrito').show();
    buscar_producto();
    function buscar_producto(consulta){
        funcion="buscar";
        $.post('../controlador/ProductoController.php',{consulta,funcion},(response)=>{
            const productos = JSON.parse(response);
            let template ='';
            productos.forEach(producto =>{
                template+=` 
                <div proID="${producto.id}" proCant="${producto.cantidad}"  proNombre="${producto.nombre}"proPrecio="${producto.precio}"proLinea="${producto.Linea}"proPresentacion="${producto.presentacion}"proTipo="${producto.tipo}"proAdicional="${producto.adicional}"proavatar="${producto.avatar}" class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Magic Essense
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                    <h2 class="lead"><b>${producto.nombre}</b></h2>
                      <h5  class="lead"><b>Codigo: ${producto.id}</b></h5>
                        <h4 class="lead"><b><i class="fas fa-lg fa-dollar-sign mr-1"></i>${producto.precio}</b></h4>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="far fa-user mr-1"></i></span> Linea: ${producto.Linea}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-spray-can mr-1"></i></span> Presentacion: ${producto.presentacion}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-wind mr-1"></i></span> Tipo: ${producto.tipo}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-plus mr-1"></i></span> Adicional: ${producto.adicional}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-cubes mr-1"></i></span> Existencias: ${producto.cantidad}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="${producto.avatar}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                   
                    <button  class="agregar-carrito btn btn-sm btn-success">
                      <i class="fas fa-plus-square mr-1"></i>Agregar al carrito 
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
})