<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
<link href = "https://fonts.googleapis.com/css2? family = Poppins: wght @ 700 & display = swap" rel = "hoja de estilo">
    <link rel="stylesheet" type="text/css " href="css/style.css">
    <link rel="stylesheet" type="text/css " href="css/css/all.min.css">
</head>

<!--Verifica si hay una sesion activa-->
<?php
session_start();
if (!empty($_SESSION['us_tipo'])) {
    header('Location: controlador/LoginController.php');
}
else {
    #Borrar Sessiones en curso
    session_destroy();
    
?>
<!--Verifica si hay una sesion activa-->
<body>
    <img class= "wave" src="img/wave.png" alt="">


        <div class="contenedor">
            <div class="img">
                <img src="img/fondo.svg" alt="">
            </div>
            <div class="contenido-login">
                <form action="Controlador/loginController.php" method="POST">
                    <img src="Img/user.png" alt="">
                    <h2>Magic_Essence</h2>
                    <h3>Perfumeria</h3>
                    <div class="input-div name">
                        <div class="i">
                            <i class="fas fa-user"></i>
                       </div>
                       <div class="div">
                            <h5>Nombre</h5>
                            <input type="text" name="user" class="input" id="">
                        </div>
                    </div>
                    <div class="input-div pass">
                         <div class="i">
                         <i class="fas fa-lock"></i>
                         </div>   
                         <div class="div">
                            <h5>Contraseña</h5>
                            <input type="password" name="pass" class="input" id="">
                        </div>
                    </div>
                    <a href="">Create Warpieces</a>
                    <input type="submit" class="btn" value="iniciar sesion">
                </form>
            </div>
        </div> 
</body>
<script src="js/login.js"></script>
</html>
<?php

}
?>