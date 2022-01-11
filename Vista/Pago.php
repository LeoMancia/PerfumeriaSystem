<?php
session_start();
if ($_SESSION['us_tipo']==1) {
    include_once 'layouts/header.php';   
?>


  <title>Validar Compra</title>


  <?php 
  include_once 'layouts/nav.php';
  ?>
<!--PayPal-->
<script src="https://www.paypal.com/sdk/js?client-id=AQLpkC_YOb-91zGuaY1a6huwgxiBJrtJ371H2yS6216_qM3cqmsnchU9a_dA0g8S2uHsLms-RLc6aIr6"> // Replace YOUR_CLIENT_ID with your sandbox client ID</script>
  <!--PayPal-->

  
  <div class="content-wrapper">
    <?php include("./layouts/header.php"); ?> 
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black"></h2>
          </div>
          <div class="col-md-7">
            <form action="./msgCompra.php?metodo=efectivo" method="post">
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <center><h5 class="text-black"> Datos de Compra </h5></center>
                  <div class="col-md-12">
                    <label for="c_direccion" class="text-black"> Dirección <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_direccion" name="c_direccion">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_ciudad" class="text-black"> Ciudad <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_ciudad" name="c_ciudad">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_lname" class="text-black"> Telefono <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_phone" name="c_phone">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black"> Correo Electrónico <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <h2></h2>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <h2></h2>
                  </div>
                </div>
                <center><p class="text-black"> Tipo de compra </p></center>
                <div class="form-group row">
                  <div class="col-md-12">
                    <h2></h2>
                  </div>
                </div>
              <div class="form-group row">
                  <div class="col-lg-12">
                    <center><button class="btnT solid" type="submit"> Completar compra por Efectivo </button></center>
                    <p></p>
                    <div id="paypal-button-container"></div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- Desde aqui no tocar nadaaaaaaaa --->
          <div class="col-md-5 ml-auto">
            <div class="p-4 border mb-3">
              <center><img src="img/LogoP.png">
            </div>
            <div class="row mb-5">
              <div class="col-md-12">
                <div class="p-3 p-lg-5 border">
                  <center><h4 class="text-black">Detalle de la compra</h4></center>
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody id="lista_a_pagar">
                     
                      
                      
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total de la Orden</strong></td>
                        <td class="text-black font-weight-bold" id="TotalPagar"></strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>
                    <div class="collapse" id="collapsecheque">
                      <div class="py-2">
                        <p class="text-black"> Realice su pago directamente en nuestra cuenta bancaria. Utilice su ID de pedido como referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en nuestra cuenta.</p>
                      </div>
                    </div>
                  </div>
                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>
                    
                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2">
                        <p class="text-black"> Realice su pago directamente en nuestra cuenta bancaria. Utilice su ID de pedido como referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en nuestra cuenta. </p>
                        <div id="paypal-button-container"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("./layouts/footer.php"); ?> 
  </div>
  

  <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '6875.00'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
              console.log(details)
            alert('Transaction completed by ' + details.payer.name.given_name);
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