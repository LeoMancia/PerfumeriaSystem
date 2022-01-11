
<?php
session_start();
if ($_SESSION['us_tipo']==1|| $_SESSION['us_tipo']==3) {
    include_once 'layouts/header.php';   
?>


  <title>Pagina Principal</title>


  <?php 
  include_once 'layouts/nav.php';
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catálogo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Magic Essence</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../Img/aromasel.png" width="200" height="400" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../Img/FONDOLOGO.jpg" width="200" height="400" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../Img/aromasella.gif" width="200" height="400" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../Img/LOGOELLA.gif" width="200" height="400" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    </section>
<section>
</br>
</section>

<section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header Titulo">
                    <h3 class="card-title">Buscar Producto</h3>
                    <div class="input-group">
                        <input type="text" id="buscar-producto" class="form-control float-left" placeholder="Ingresar nombre de producto a buscar">
                        <div class="input-group-append">
                            <button class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div id="productos" class="row d-flex aling-items-strech"></div>
                </div>
                <div class="card-footer">
                
                </div>
            </div>
        </div>
</section>

    <!-- Main content -->

  </div>
  <!-- /.content-wrapper -->  
<?php
include_once 'layouts/footer.php';
}
else {
    header('Location: ../index.php');
}
?>
<script src="../js/Catalogo.js"></script>
<script src="../js/Carrito.js"></script>