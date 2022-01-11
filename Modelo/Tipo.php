<?php
include 'Conexion.php';
class Tipo{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }


function rellenar_tipos(){
    $sql="SELECT * FROM tipo_perfume ORDER BY nombre_tipo ASC";
    $query = $this->acceso->prepare($sql);
    $query->execute();
    $this->objetos = $query->fetchall();
    return $this->objetos;
}
}
?>