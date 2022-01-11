
<?php
session_start();
if ($_SESSION['us_tipo']==1) {
    include_once 'layouts/header.php';   
?>


  <title>Pagina Principal</title>


  <?php 
  include_once 'layouts/nav.php';
  ?>

<div class="content-wrapper">
<div class="jumbotron text-center">
  <h1 class="display-3">¡Transaccion Exitosa!</h1>
  <p class="lead"><strong>Magic Essense</strong> ¡La mejor opcion en perfumeria!</p>
  <hr>
  <p>
    ¿Algún Problema?<a href="../Vista/correo.php">Ponte en contacto</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="../Vista/adm_catalogo.php" role="button" id="completar-compra">Volver al catálogo</a>
    <a class="btn btn-primary btn-sm" href="../Vista/factura.php" role="button" id="completar-compra">Ver comprobante de pago</a>
	
  </p>
</div>
</div>



    <?php
include_once 'layouts/footer.php';
}
else {
    header('Location: ../index.php');
}
?>
<script src="../js/Carrito.js"></script>