
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/main.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../css/select2.css">
  <!-- COMPRA.CSS -->
  <link rel="stylesheet" href="../css/compra.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css//css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css " href="../css/fondoglob.css">
  <!--Sweetalert2-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../vista/adm_catalogo.php" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
      <li class="nav-item dropdown" id="cat-carrito" style="display:none">
        <img src="../Img/shopping-cart.png" class="imagen-carrito nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span id="contador" class="contador badge badge-danger"></span>  
      </img>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <table class="carro table table-hover text-nowrap p-0">
            <thead class="table-success">
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Linea</th>
                  <th>Presentacion</th>
                  <th>Adicional</th>
                  <th>Precio</th>   
                  <th>Eliminar</th>                  
                </tr>
             </thead>
             <tbody id="lista">
              
              </tbody>
          </table>
          <a href="#" id="procesarPedido" class="btn btn-primary col-12">Procesar Compra</a>
          <a href="#" id="vaciar-carrito" class="btn btn-danger col-12">Vaciar Carrito</a>
          </div>
      </li>
    </ul>    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     <a href="../Controlador/logout.php" class="hef">Cerrar Sesion</a>
    </ul>
  </nav>
  <!-- /.navbar -->




  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

  
    <!-- Brand Logo -->
    <a href="../vista/adm_catalogo.php" class="brand-link">
      <img src="../Img/logomarca.jpg"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Magic Essense</span>
    </a>

    
    <!-- Sidebar -->
    <div class="Barra">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img id='fotoPerfil4' src="../Img/foto.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
              <?php
                echo $_SESSION['nombre_us'];
              ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
           <li class="nav-header">Usuarios</li>          
          <li class="nav-item">
            <a href="../vista/editar_datos_personales.php" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Editar Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../vista/adm_usuario.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Administrar Usuarios
              </p>
            </a>
          </li>
          <li class="nav-header">Almacen</li>          
          <li class="nav-item">
            <a href="../vista/admproducto.php" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Gestionar producto
              </p>
            </a>
          </li>

          <li class="nav-header">Galeria de Imagenes</li>          
          <li class="nav-item">
            <a href="../vista/productos.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Galería
              </p>
            </a>
          </li>


          <li class="nav-header">REDES</li>          
          <li class="nav-item">
            <a href="https://www.facebook.com/Esencia-m%C3%A1gica_-perfumer%C3%ADa-101320938404937/" target="_blank" class="nav-link">           
            <i class="nav-icon fab fa-facebook-square"></i>
              <p>
                Facebook
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="https://www.instagram.com/magic_essence_/" target="_blank" class="nav-link">           
            <i class="nav-icon fab fa-instagram"></i>
              <p>
                Instagram
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../vista/correo.php" class="nav-link">           
            <i class="nav-icon far fa-envelope"></i>
              <p>
                Correo
              </p>
            </a>
          </li>

          <li class="nav-header">Preguntas Frecuentes</li>   

          <li class="nav-item">
            <a href="../vista/faqs.php" class="nav-link">           
            <i class="fas fa-head-side-brain"></i>
              <p>
                ¿Tienes alguna pegunta?
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>