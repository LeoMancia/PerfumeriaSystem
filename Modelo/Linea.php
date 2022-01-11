<?php
include 'Conexion.php';
class Linea{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }


function rellenar_linea(){
    $sql="SELECT * FROM linea_produccion ORDER BY nombre ASC";
    $query = $this->acceso->prepare($sql);
    $query->execute();
    $this->objetos = $query->fetchall();
    return $this->objetos;
}
}
?>