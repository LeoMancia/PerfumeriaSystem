<?php
include 'Conexion.php';
class Presentacion{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }


function rellenar_presentaciones(){
    $sql="SELECT * FROM presentacion ORDER BY cant_presentacion ASC";
    $query = $this->acceso->prepare($sql);
    $query->execute();
    $this->objetos = $query->fetchall();
    return $this->objetos;
}
}
?>