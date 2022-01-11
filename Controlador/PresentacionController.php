<?php
include '../Modelo/Presentacion.php';
$presentacion = new Presentacion();

if ($_POST['funcion']=='rellenar_presentaciones') {
    $presentacion->rellenar_presentaciones();
    $json = array();
    foreach ($presentacion->objetos as $objeto) {
        $json[]=array(
            'id_presentacion'=>$objeto->id_presentacion,
            'cant_presentacion'=>$objeto->cant_presentacion
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}


?>