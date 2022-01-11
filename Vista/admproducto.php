<?php
session_start();
if ($_SESSION['us_tipo']==1) {
    include_once 'layouts/header.php';   
?>
  <title>Editar datos</title>
  <?php 
  include_once 'layouts/nav.php';
  ?>
 
<!--*******************************************************************-->
<!--Modal de creacion de nuevo usuario-->
 <!-- Modal -->
 <div class="modal fade" id="crearproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
        <div class="modal-content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Ingresar producto</h3>
                <button data-dismiss="modal" aria-label="close"  class="close" >
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Apartado para ingresar los datos de un nuevo usuario-->
            <div class="card-body">
            <!--Mensaje de Alerta-->
                 <div class="alert alert-success text-center" id="add" style='display:none;'>
                    <span><i class="fas fa-check m-1"></i>Se ha agregado exitosamente!</span>
                </div>
            <!--Mensaje de Alerta-->
                 <div class="alert alert-danger text-center" id="noadd" style='display:none;'>
                    <span><i class="fas fa-times m-1"></i>¡Error!, ¡El producto ya existe!</span>
                 </div>   
            <!--Fin Alertas-->
                <form id="form-crear-producto">
                    <div class="form-group">
                        <label for="nombre_producto">Nombre producto</label>
                        <input id="nombre_producto" type="text" class="form-control" placeholder="Ingresar Nombre" required>                        
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" type="numer" class="form-control" value="1" placeholder="Ingresar cantidad" required>                        
                    </div>
                    <div class="form-group">
                        <label for="adicional">Adicional</label>
                        <input id="adicional" type="texto" class="form-control" placeholder="Ingresar producto adicional">                        
                    </div>             
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" type="number" class="form-control" value="1" placeholder="Ingresar precio">                        
                    </div>       
                    <div class="form-group">
                        <label for="linea">Linea</label>
                        <select name="linea" id="lineaperfume" class="form-control select2" style="width: 100%;"></select>                        
                    </div>        
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control select2" style="width: 100%;"></select>                        
                    </div>        
                    <div class="form-group">
                        <label for="Presentacion">Presentacion</label>
                        <select name="Presentacion" id="Presentacion" class="form-control select2" style="width: 100%;"></select>                        
                    </div>                               
            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                <button type="button" data-dismiss="modal" class="btn btn-outline-danger float-right m-1">Cerrar</button>
                </form>         
            </div>
        </div>
        </div>
    </div>
 </div>
<!--Fin Modal-->
<!--************************************************************************-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestionar Producto <button type="button" data-toggle="modal" data-target="#crearproducto" class="btn bg-gradient-primary ml-3">Ingresar nuevo producto</button></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../Vista/adm_catalogo.php">Inicio</a></li>
              <li class="breadcrumb-item active">Gestion de producto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  
    <!--Apartado donde se veran y buscaran los usuarios-->
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header Titulo">
                    <h3 class="card-title">Buscar producto</h3>
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
  </div>
  <!-- /.content-wrapper -->  
<?php
include_once 'layouts/footer.php';
}
else {
    header('Location: ../index.php');
}
?>
<script src="../js/Producto.js"></script>
