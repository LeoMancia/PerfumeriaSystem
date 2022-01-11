
<?php
session_start();
if ($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3) {
    include_once 'layouts/header.php';   
?>


  <title>Validar Compra</title>


  <?php 
  include_once 'layouts/nav.php';
  ?>

  <!--PayPal-->
  <script src="https://www.paypal.com/sdk/js?client-id=AQLpkC_YOb-91zGuaY1a6huwgxiBJrtJ371H2yS6216_qM3cqmsnchU9a_dA0g8S2uHsLms-RLc6aIr6"> // Replace YOUR_CLIENT_ID with your sandbox client ID</script>
  <!--PayPal-->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Comprar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active">Magic Essence</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                    </div>
                    <div class="card-body p-0">
                        <header>
                            <div class="logo_cp">
                                <img src="../img/logomarca.jpg" width="150" height="150">
                            </div>
                            <h1 class="titulo_cp">SOLICITUD DE COMPRA</h1>
                            <div class="datos_cp">
                                <div class="form-group row">
                                    <span>Cliente: </span>
                                    <div class="input-group-append col-md-6">
                                        <input type="text" class="form-control" id="cliente" placeholder="Ingresa nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span>DUI: </span>
                                    <div class="input-group-append col-md-6">
                                        <input type="text" class="form-control" id="dni" placeholder="Ingresa DUI">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span>Vendedor: </span>
                                    <h3>usuario</h3>
                                </div>
                            </div>
                        </header>
                        <button id="actualizar"class="btn btn-success" onclick="location.reload()">Actualizar</button>
                        <div id="cp"class="card-body p-0">
                            <table class="compra table table-hover text-nowrap">
                                <thead class='table-success'>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Existencias</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Linea</th>
                                        <th scope="col">Presentacion</th>
                                        <th scope="col">Adicional</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="lista-compra" class='table-active'>
                                    
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                            <i class="fas fa-dollar-sign"></i>
                                            Calculo 1
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="info-box mb-3 bg-warning p-0">
                                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-left ">SUB TOTAL</span>
                                                    <span class="info-box-number" id="subtotal"></span>
                                                </div>
                                            </div>
                                            <div class="info-box mb-3 bg-warning">
                                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-left ">IVA</span>
                                                    <span class="info-box-number"id="con_iva"></span>
                                                </div>
                                            </div>
                                            <div class="info-box mb-3 bg-info">
                                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-left ">SIN DESCUENTO</span>
                                                    <span class="info-box-number" id="total_sin_descuento"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                            <i class="fas fa-bullhorn"></i>
                                            Calculo 2
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="info-box mb-3 bg-danger">
                                                <span class="info-box-icon"><i class="fas fa-comment-dollar"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-left ">DESCUENTO</span>
                                                    <input id="descuento"type="number" min="1" placeholder="Ingrese descuento" class="form-control">
                                                </div>
                                            </div>
                                            <div class="info-box mb-3 bg-info">
                                                <span class="info-box-icon"><i class="ion ion-ios-cart-outline"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-left ">TOTAL</span>
                                                    <span class="info-box-number" id="total"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                            <i class="fas fa-cash-register"></i>
                                            Cambio
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                        <div class="info-box mb-3 bg-success">
                                            <span class="info-box-icon"><i class="fas fa-money-bill-alt"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-left ">INGRESO</span>
                                                <input type="number" id="pago" min="1" placeholder="Ingresa Dinero" class="form-control">
                                               
                                            </div>
                                        </div>
                                        <div class="info-box mb-3 bg-info">
                                            <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-left ">VUELTO</span>
                                                <span class="info-box-number" id="vuelto"></span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4 mb-2">
                                <a href="../vista/adm_catalogo.php" class="btn btn-primary btn-block">Seguir comprando</a>
                            </div>
                            <div class="col-xs-12 col-md-4">                              
                                <div id="paypal-button-container"></div>
                            </div>
                            <div class=" col-md-4">
                                <a href="../Vista/Thanks.php" class="btn btn-success btn-block mb-2" id="procesar-compra">Realizar compra</a>
                                <div id="paypal-button-container" ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Main content -->

  </div>
  <!-- /.content-wrapper -->  
  <script>

    let TotalPago = sessionStorage.getItem('Total');
    console.log(TotalPago);
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: TotalPago
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
              if (details.status == 'COMPLETED') {
                  location.href="./Thanks.php";
                  alert('Transaction completed by ' + details.payer.name.given_name);
                  localStorage.clear();
              }
            
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
<?php
include_once 'layouts/footer.php';
}
else {
    header('Location: ../index.php');
}
?>
<script src="../js/Carrito.js"></script>