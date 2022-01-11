<?php
include 'Conexion.php';
class Producto{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function crear($nombre,$cantidad,$adicional,$precio,$avatar,$linea,$tipo,$presentacion){
        $sql = "SELECT id_producto FROM producto WHERE nombre =:nombre AND cantidad =:cantidad AND adicional =:adicional AND prod_linea =:linea AND prod_tipo=:tipo AND prod_presentacion =:presentacion";
        $query = $this ->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre, ':cantidad'=>$cantidad,':adicional'=>$adicional,':linea'=>$linea,':tipo'=>$tipo,':presentacion'=>$presentacion));
        $this->objetos=$query->fetchall();
        if (!empty($this->objetos)) {
            echo 'noadd';
        } else {
            $sql="INSERT INTO producto(nombre,cantidad,adicional,precio,avatar,prod_linea,prod_tipo,prod_presentacion) VALUES (:nombre,:cantidad,:adicional,:precio,:avatar,:linea,:tipo,:presentacion)";
            $query = $this ->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':cantidad'=>$cantidad,':adicional'=>$adicional,':precio'=>$precio,':avatar'=>$avatar,':linea'=>$linea,':tipo'=>$tipo,':presentacion'=>$presentacion));
            echo 'add';
        }        

    }

    function buscar (){
       
        if (!empty($_POST['consulta'])) {
            $consulta = $_POST['consulta'];
            $sql ="SELECT id_producto, producto.nombre AS nombre, cantidad, adicional, precio, linea_produccion.nombre AS Linea,
            tipo_perfume.nombre_tipo AS tipo, presentacion.cant_presentacion AS presentacion, avatar 
            FROM `producto` 
            JOIN linea_produccion on prod_linea = id_produccion
            JOIN tipo_perfume on prod_tipo = id_tipo
            JOIN presentacion on prod_presentacion = id_presentacion AND producto.nombre LIKE :consulta LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        } else {
            $sql="SELECT id_producto, producto.nombre AS nombre, cantidad, adicional, precio, linea_produccion.nombre AS Linea,
            tipo_perfume.nombre_tipo AS tipo, presentacion.cant_presentacion AS presentacion, avatar 
            FROM `producto` 
            JOIN linea_produccion on prod_linea = id_produccion
            JOIN tipo_perfume on prod_tipo = id_tipo
            JOIN presentacion on prod_presentacion = id_presentacion AND producto.nombre NOT LIKE '' ORDER BY producto.nombre LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        
            
    }


}




?>