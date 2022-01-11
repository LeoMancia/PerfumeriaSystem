<!--Header-->
<?php
session_start();
if ($_SESSION['us_tipo']==1) {
    include_once 'layouts/header.php';   
?>
  <title>Preguntas frecuentes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Estilos -->
  <link rel="stylesheet" type="text/css" media="screen" href="../css/stylesFaqs.css">
  <!--Barra lateral-->
  <?php 
  include_once 'layouts/nav.php';
  ?>


  <!-- La lista de preguntas irá aquí -->
<div class="fondo">
<ul class="lista">
  <!-- Pregunta 1 -->
  <li class="pregunta" data-resp_id="resp_1">
    <span>¿Quienes somos?</span>
    <i class="ico_resp fas fa-angle-down"></i>
  </li>
  <li class="respuesta" id="resp_1">
    <span id="sp_resp_1">Somos una linea de contratipos de perfumes dedicada a la creacion de los mejores aromas para ti.</span>
    

  </li>

  <!-- Pregunta 3 -->
  <li class="pregunta" data-resp_id="resp_2">
    <span>¿Tienen atencion al cliente?</span>
    <i class="ico_resp fas fa-angle-down"></i>
  </li>
  <li class="respuesta" id="resp_2">
    <span id="sp_resp_2">Efectivamente, puedes contactarnos por correo electronico, o por nuestras fanpages en Instagram y Facebook.</span>
  </li>

   <!-- Pregunta 4 -->
   <li class="pregunta" data-resp_id="resp_3">
    <span>¿A donde se hacen envios?</span>
    <i class="ico_resp fas fa-angle-down"></i>
  </li>
  <li class="respuesta" id="resp_3">
    <span id="sp_resp_3">Si deseas adquirir una fragancia, los puntos de entregan son: Santa Ana centro y Ahuachapan Centro.</span>
  </li>

   <!-- Pregunta 5 -->
   <li class="pregunta" data-resp_id="resp_4">
    <span>¿Cuánto cuesta el envío?</span>
    <i class="ico_resp fas fa-angle-down"></i>
  </li>
  <li class="respuesta" id="resp_4">
    <span id="sp_resp_4">El coste de envio es de $1.00 (Un dolar) a Santa Ana y Ahuachapan</span>
  </li>

   <!-- Pregunta 6 -->
   <li class="pregunta" data-resp_id="resp_5">
    <span>¿El producto es auténtico?</span>
    <i class="ico_resp fas fa-angle-down"></i>
  </li>
  <li class="respuesta" id="resp_5">
    <span id="sp_resp_5">Los perfumes comercializados por Magic Essence son contratipos, lo que quiere decir que NO son originales, pero el aroma es similar al original, por lo que no habria gran diferencia.</span>
  </li>

   <!-- Pregunta 7 -->
   <li class="pregunta" data-resp_id="resp_6">
    <span>¿Cuales son las presentaciones de los perfumes?</span>
    <i class="ico_resp fas fa-angle-down"></i>
  </li>
  <li class="respuesta" id="resp_6">
    <span id="sp_resp_6">Los perfumes normalmente se presentan en dos versiones: 50 ml y 100 ml, este ultimo se hace mayoritariamente por encargos especiales.</span>
  </li>
</ul>

</div>

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <!-- Script para controlar la lista de preguntas -->
  <script src="../js/faqs.js"></script>
	<!-- FontAwesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  
  <!--Footer-->
  <?php
}
else {
    header('Location: ../index.php');
}
?>
</body>
</html>