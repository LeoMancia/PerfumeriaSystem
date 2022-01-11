<?php
session_start();
if ($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3||$_SESSION['us_tipo']==2) {
    include_once 'layouts/header.php';   
?>
  <title>Editar datos</title>
  <?php 
  include_once 'layouts/nav.php';
  ?>
 
<!--*******************************************************************-->
<!--Modal de creacion de nuevo usuario-->
 <!-- Modal -->
 <div class="modal fade" id="crearusuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
        <div class="modal-content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Crear Usuario</h3>
                <button data-dismiss="modal" aria-label="close"  class="close" >
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Apartado para ingresar los datos de un nuevo usuario-->
            <div class="card-body">
               <!--Mensaje de Alerta-->
              <div class="alert alert-success text-center" id="add" style='display:none;'>
                  <span><i class="fas fa-check m-1"></i>Se ha creado el usuario exitosamente!</span>
              </div>
              <!--Mensaje de Alerta-->
              <div class="alert alert-danger text-center" id="noadd" style='display:none;'>
                    <span><i class="fas fa-times m-1"></i>¡Error!, ¡El Dui ya existe en el registro!</span>
              </div>     
                <form id="form-crear">
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input id="nombre" type="text" class="form-control" placeholder="Ingresar Nombre" required>                        
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input id="apellido" type="text" class="form-control" placeholder="Ingresar apellido" required>                        
                    </div>
                    <div class="form-group">
                        <label for="edad">Fecha de nacimiento</label>
                        <input id="edad" type="date" class="form-control" placeholder="Ingresar fecha de nacimiento" required>                        
                    </div>             
                    <div class="form-group">
                        <label for="dui">Dui</label>
                        <input id="dui" type="text" class="form-control" placeholder="Ingresar dui">                        
                    </div>       
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input id="pass" type="text" class="form-control" placeholder="Ingresar contraseña">                        
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
            <h1>Gestionar Usuarios <button id="button-crear" type="button" data-toggle="modal" data-target="#crearusuario" class="btn bg-gradient-primary ml-3">Crear nuevo usuario</button></h1>
            <input type="hidden" id="tipo_usuario" value="<?php echo $_SESSION['us_tipo']?>">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../Vista/adm_catalogo.php">Inicio</a></li>
              <li class="breadcrumb-item active">Gestion de Usuarios</li>
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
                    <h3 class="card-title">Buscar Usuario</h3>
                    <div class="input-group">
                        <input type="text" id="buscar" class="form-control float-left" placeholder="Ingresar nombre de usuario a buscar">
                        <div class="input-group-append">
                            <button class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <div id="usuarios" class="row d-flex aling-items-strech"></div>
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
<script src="../js/Gestion_Usuario.js"></script>
