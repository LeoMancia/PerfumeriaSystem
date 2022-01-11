<?php
include '../Modelo/Producto.php';
$producto = new Producto();
if ($_POST['funcion']=='crear') {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $adicional = $_POST['adicional'];
    $precio = $_POST['precio'];
    $linea = $_POST['linea'];
    $tipo = $_POST['tipo'];
    $presentacion = $_POST['presentacion'];
    $avatar ='logomarca.jpg';
    $producto->crear($nombre,$cantidad,$adicional,$precio,$avatar,$linea,$tipo,$presentacion);
}

if ($_POST['funcion']=='buscar') {
    $producto->buscar();
    $json = array();
    foreach ($producto->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_producto,
            'nombre'=>$objeto->nombre,
            'cantidad'=>$objeto->cantidad,
            'adicional'=>$objeto->adicional,
            'precio'=>$objeto->precio,
            'Linea'=>$objeto->linea,
            'tipo'=>$objeto->tipo,
            'presentacion'=>$objeto->presentacion,
            'avatar'=>'../img/'.$objeto->avatar,
            

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

?>