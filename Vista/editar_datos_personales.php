<?php
session_start();
if ($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3) {
    include_once 'layouts/header.php';   
?>
  <title>Editar datos</title>
  <?php 
  include_once 'layouts/nav.php';
  ?>
 <!-- Modal de cambio de contraseña-->
<div class="modal fade" id="cambiarcontra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times m-1"></i></button>
      </div>
      
      <div class="modal-body">
  <div class="text-center">
    <img id='fotoPerfil3' src="../Img/foto.jpg" class="profile-user-img img-fluid img-circle">
  </div>
  <div class="text-center">
    <b>
        <?php
            echo $_SESSION['nombre_us'];
        ?>
    </b>
  </div>
  <!--Mensaje de Alerta-->
  <div class="alert alert-success text-center" id="update" style='display:none;'>
       <span><i class="fas fa-check m-1"></i>Se ha cambiado la contraseña exitosamente!</span>
  </div>
  <!--Mensaje de Alerta-->
   <div class="alert alert-danger text-center" id="noupdate" style='display:none;'>
        <span><i class="fas fa-times m-1"></i>¡Error!, ¡contraseña actual es incorrecta!</span>
   </div>               
   <!--Formulario de cambio de contaseñas-->          
    <form id="form-pass">
    <dib class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
        </div>
            <input id="oldpass" type="password" class="form-control" placeholder="Ingrese la contraseña actual">
    </dib>
    <dib class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
        </div>
            <input id="newpass" type="text" class="form-control" placeholder="Ingrese la contraseña nueva">
    </dib>
      
 <!--Footer del modal-->
    </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline-success">Guardar</button>
               </form>  
        </div>
    </div>
  </div>
</div>
<!--Fin Modal-->
<!--*******************************************************************-->
<!--Modal de cambio de foto-->
 <!-- Modal -->
 <div class="modal fade" id="cambiarfoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Foto</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times m-1"></i></button>
      </div>
      
      <div class="modal-body">
  <div class="text-center">
    <img id='fotoPerfil1' src="../Img/foto.jpg" class="profile-user-img img-fluid img-circle">
  </div>
  <div class="text-center">
    <b>
        <?php
            echo $_SESSION['nombre_us'];
        ?>
    </b>
  </div>
  <!--Mensaje de Alerta-->
  <div class="alert alert-success text-center" id="edit" style='display:none;'>
       <span><i class="fas fa-check m-1"></i>Se ha cambiado la foto exitosamente!</span>
  </div>
  <!--Mensaje de Alerta-->
   <div class="alert alert-danger text-center" id="noedit" style='display:none;'>
        <span><i class="fas fa-times m-1"></i>¡Error!, ¡Formato inválido!</span>
   </div>               
   <!--Formulario de cambio de foto-->          
    <form id="form-photo" enctype="multipart/form-data">
    <dib class="input-group mb-3 ml-5 mt-2">
        <input type="file" name="foto" class="input-group">
        <input type="hidden" name="funcion" value="cambiar_foto">
    </dib>    
 <!--Footer del modal-->
    </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline-success">Guardar</button>
               </form>  
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
            <h1>Datos Personales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../Vista/adm_catalogo.php">Inicio</a></li>
              <li class="breadcrumb-item active">Datos Personales</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  
    <section>
        <div class="content">
        <!--Cuadro de datos estaticos-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <!--Datos Estaticos-->
                        <div class="card card-info card-outline">
                            <div class="card-body box-profile">

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="text-center">
                                            <img id='fotoPerfil2' src="../Img/foto.jpg" class="profile-user-img img-fluid img-circle">    
                                            <h3 id="nombre_us" class="profile-username text-center" style="color:#A60DAB">Nombre</h3>
                                            <p id="apellido_us" class="text-muted text-center">Apellidos</p>    
                                            <!--boton de cambiar avatar-->
                                            <div class="tex-center" mt-1.5>
                                            <button type="button" data-toggle="modal" data-target="#cambiarfoto" class="btn btn-primary btn-sm">Cambiar foto</button>
                                            </div>
                                            <!---->                                                                                                               
                                        </div>                                        
                                             <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuario']?>">                                            
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                             <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b style="color:#A60DAB">Edad</b><a id="edad_us" class="float-right">-----</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b style="color:#A60DAB">DUI</b><a id="dui_us" class="float-right">-----</a>
                                                </li>   
                                                <li class="list-group-item">
                                                <b style="color:#A60DAB">Tipo Usuario</b>
                                                    <span id="us_tipo" class="float-right">Null</span>
                                                </li>
                                                <button data-toggle="modal" data-target="#cambiarcontra" type="button" class="btn btn-block btn-outline-warning btn-sm" >Cambiar contraseña</button>
                                             </ul>
                                        </div>
                                        <div class="col-md-2"></div>                                        
                                    </div>                                
                                </div>                              
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
            <!--Contenerdor de datos modificables-->
            <div class="container-fluid">
                <div class="row">                  
                    <div class="col-md-2">
                    <!--Apartado sobre mi-->
                    <div class="card card-info">
                            <div class="Titulo">
                                <h3 class="titulo_letra">Sobre Mi</h3>
                            </div>
                            <div class="card-body">
                                <strong style="color:#A60DAB">
                                    <i class="fas fa-phone mr-2"></i>Telefono
                                </strong>
                                <p id="telefono_us" class="text-muted">12345678</p>
                                <!---->
                                <strong style="color:#A60DAB">
                                    <i class="fas fa-map-marker-alt mr-2"></i>Residencia
                                </strong>
                                <p id="residencia_us" class="text-muted">Ahuachapan</p>
                                <!---->
                                <strong style="color:#A60DAB">
                                    <i class="fas fa-at mr-2"></i>Correo
                                </strong>
                                <p id="correo_us" class="text-muted">eliseomancia@gmail.com</p>
                                <!---->
                                <strong style="color:#A60DAB">
                                    <i class="fas fa-smile-wink mr-2"></i>Sexo
                                </strong>
                                <p id="sexo_us" class="text-muted">Masculino</p>                                
                                <strong style="color:#A60DAB">
                                    <i class="fas fa-pencil-alt mr-2"></i>Informacion Adicional
                                </strong>
                                <p id="adicional_us" class="text-muted">Joven Emprendedor</p>
                                <button class="edit btn btn-block btn-outline-danger">Editar</button>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                    <!--Apartado de edicion-->
                    <div class="col-md-10">
                        <div class="card card-info">
                            <div class="Titulo">
                               <h3 class="titulo_letra">Editar datos personales</h3>
                            </div>
                            <div class="card-body">
                            <!--Mensaje de Alerta-->
                            <div class="alert alert-success text-center" id="editado" style='display:none;'>
                                <span><i class="fas fa-check m-1"></i> Editado</span>
                            </div>
                            <!--Mensaje de Alerta-->
                            <div class="alert alert-danger text-center" id="noeditado" style='display:none;'>
                                <span><i class="fas fa-times m-1"></i> Seleccione ¡EDITAR!</span>
                            </div>
                            <form id='form-usuario' class="form-horizontal">
                                <div class="form-group row">
                                    <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                    <div class="col-sm-10">
                                    <input type="number" id="telefono" class="form-control">            
                                    </div>                                    
                                </div>
                                <div class="form-group row">
                                    <label for="residencia" class="col-sm-2 col-form-label">Residencia</label>
                                    <div class="col-sm-10">
                                    <input type="texto" id="residencia" class="form-control">            
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                                    <div class="col-sm-10">
                                    <input type="correo" id="correo" class="form-control">            
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                                    <div class="col-sm-10">
                                    <input type="sexo" id="sexo" class="form-control">            
                                    </div>                                    
                                </div>
                                <div class="form-group row">
                                    <label for="adicional" class="col-sm-2 col-form-label">Informacion adicional</label>
                                    <div class="col-sm-10">
                                    <textarea class="form-control" name="" id="adicional" cols="30" rows="10"></textarea>
                                    </div>                                    
                                </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10 float-right">
                                            <button class="btn btn-block btn-outline-success">Guardar</button>
                                        </div>
                                    </div>                                
                            </form>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
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
<script src="../js/Usuario.js"></script>