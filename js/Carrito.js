$(document).ready(function(){
    
    Contar_productos();
    RecuperarLS_carrito();
    RecuperarLS_carrito_compra();
    CalcularTotal();
    $(document).on('click','.agregar-carrito',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
        const id = $(elemento).attr('proID');
        const nombre = $(elemento).attr('proNombre');
        const precio = $(elemento).attr('proPrecio');
        const linea = $(elemento).attr('proLinea');
        const presentacion = $(elemento).attr('proPresentacion');
        const tipo = $(elemento).attr('proTipo');
        const adicional = $(elemento).attr('proAdicional');
        const avatar = $(elemento).attr('proavatar');
        const cantidadInv = $(elemento).attr('proCant');
        
        
        const producto={
            id: id,
            nombre: nombre,
            precio: precio,
            linea: linea,
            presentacion: presentacion,
            tipo: tipo,
            adicional: adicional,
            cantidadInv: cantidadInv,
            cantidad:1
        }
        let id_producto;
        let productos;
        productos = RecuperarLS();
        productos.forEach(prod => {
            if (prod.id===producto.id) {
                id_producto=prod.id;
            }
        });
        if (id_producto === producto.id) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El producto ya está agregado en el carrito!',
                footer: '<a>Magic Essence</a>'
            })
        }else{
            template=`
            <tr prodID="${producto.id}">
                <td>${producto.id}</td>
                <td>${producto.nombre}</td>
                <td>${producto.linea}</td>
                <td>${producto.presentacion}</td>                
                <td>${producto.adicional}</td>
                <td>${producto.precio}</td>
                <td><button class="borrar-producto btn btn-danger btn-lock"><i class="fas fa-times-circle"></i></a></td>
            </tr>
        `;
        $('#lista').append(template);
        AgregarLS(producto);
        let contador;
        Contar_productos();
        }

       
    })


    $(document).on('click','.borrar-producto',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('prodID');
        elemento.remove();       
        Eliminar_producto_LS(id)
        Contar_productos();
        CalcularTotal();
    })

    $(document).on('click','#vaciar-carrito',(e)=>{
       $('#lista').empty();    
       EliminarLS();
       contador = Contar_productos();
       console.log(contador)
    })


    ////MANDA DATOS A VISTA CONFIRMAR COMPRA
    $(document).on('click','#procesarPedido', (e)=>{
        Procesar_Pedido();
    })

    $(document).on('click', '#procesar-compra',(e)=>{
        EliminarLS();
    })


    function RecuperarLS() {
        let productos;
        if (localStorage.getItem('productos')===null) {
            productos=[];
        }else{
            productos= JSON.parse(localStorage.getItem('productos'))
        }
        return productos
    }

    function AgregarLS(producto){
        let productos;
        productos = RecuperarLS();
        productos.push(producto)
        localStorage.setItem('productos', JSON.stringify(productos))
    }

    function RecuperarLS_carrito() {
        let productos;
        productos = RecuperarLS();
        productos.forEach(producto => {
            template=`
            <tr prodID="${producto.id}">
                <td>${producto.id}</td>
                <td>${producto.nombre}</td>
                <td>${producto.linea}</td>
                <td>${producto.presentacion}</td>                
                <td>${producto.adicional}</td>
                <td>${producto.precio}</td>
                <td><button class="borrar-producto btn btn-danger btn-lock"><i class="fas fa-times-circle"></i></a></td>
            </tr>
        `;
        $('#lista').append(template);
        });
    }

    function Eliminar_producto_LS(id) {
        let productos;
        productos = RecuperarLS();
        productos.forEach(function(producto,indice) {
            if (producto.id===id) {
                productos.splice(indice,1);     
            }
        });
        localStorage.setItem('productos',JSON.stringify(productos))
    }

   function EliminarLS() {
       localStorage.clear();
   }

   function Contar_productos() {
    let productos;
    let contador=0;
    productos=RecuperarLS();
    productos.forEach(producto=>{
        contador++;
    })
    $('#contador').html(contador);
   }

   //FUNCION PARA MANDAR DATOS DE UNA VISTA A OTRA
   function Procesar_Pedido() {
       let productos;
       productos= RecuperarLS();
       if (productos.length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El carrito esta vacio!',
            footer: '<a>Magic Essence</a>'
        })
    
       }
       else{
           location.href = '../Vista/adm_compra.php';
       }
   }
   ////////////////////////////////////////


   //LLENA TABLA DE PRODUCTOS A COMPRAR
   function RecuperarLS_carrito_compra() {
    let productos;
    productos = RecuperarLS();
    productos.forEach(producto => {
        console.log(producto.cantidadInv);
        template=`
        <tr prodID="${producto.id}">
            <td>${producto.nombre}</td>
            <td>${producto.cantidadInv}</td>
            <td>${producto.precio}</td>
            <td>${producto.linea}</td>
            <td>${producto.presentacion}</td>                
            <td>${producto.adicional}</td>   
            <td>
                <input type="number" min="1" class="form-control cantidad_producto" value="${producto.cantidad}">
            </td>      
            <td class="subtotal">
                <h5>${producto.precio*producto.cantidad}</h5>
            </td>            
            <td><button class="borrar-producto btn btn-danger btn-lock"><i class="fas fa-times-circle"></i></a></td>
        </tr>
    `;
    $('#lista-compra').append(template);
    });
    }
    ////////////////////////////////
    $('#cp').keyup((e)=>{
        let id, cantidad,producto,productos,montos;
        producto = $(this)[0].activeElement.parentElement.parentElement;
        id = $(producto).attr('prodID');
        cantidad = producto.querySelector('input').value;
        montos = document.querySelectorAll('.subtotal');
        productos = RecuperarLS();
        productos.forEach(function(prod, indice) {
            if (prod.id === id) {
                prod.cantidad = cantidad;
                montos[indice].innerHTML = `<h5>${cantidad*productos[indice].precio}</h5>`;
            }
        });
        localStorage.setItem('productos', JSON.stringify(productos));
        CalcularTotal();
    })

    function CalcularTotal() {
        let productos, subtotal_SinIVA, conIVA, total_sin_descuento, pago, vuelto, descuento;
        let total =0, IVA=0.13;
        productos =RecuperarLS();
        productos.forEach(producto =>{
            let subtotal_producto = Number(producto.precio * producto.cantidad);
            total= total+subtotal_producto;
        });
        pago=$('#pago').val();
        descuento=$('#descuento').val();

        total_sin_descuento=total.toFixed(2);
        conIVA=parseFloat(total*IVA).toFixed(2);
        subtotal_SinIVA=parseFloat(total-conIVA).toFixed(2);

        total=total-descuento
        //Total//
        sessionStorage.setItem('Total',total)
        vuelto= pago-total;
        $('#subtotal').html(subtotal_SinIVA);
        $('#con_iva').html(conIVA);
        $('#total_sin_descuento').html(total_sin_descuento);
        console.log(subtotal_SinIVA+' '+conIVA+' '+total_sin_descuento)
        $('#total').html(total.toFixed(2));
        $('#vuelto').html(vuelto.toFixed(2));
        
    }


})