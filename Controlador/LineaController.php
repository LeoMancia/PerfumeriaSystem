<?php
include '../Modelo/Linea.php';
$linea = new Linea();




if ($_POST['funcion']=='rellenar_linea') {
    $linea->rellenar_linea();
    $json = array();
    foreach ($linea->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_produccion,
            'nombre'=>$objeto->nombre
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}


?>