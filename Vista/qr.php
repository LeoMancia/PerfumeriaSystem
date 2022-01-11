
<?php
session_start();
if ($_SESSION['us_tipo']==1) {
    include_once 'layouts/header.php';   
?>


  <title>Pagina Principal</title>


  <?php 
  include_once 'layouts/nav.php';
  ?>




    <?php
include_once 'layouts/footer.php';
}
else {
    header('Location: ../index.php');
}
?>