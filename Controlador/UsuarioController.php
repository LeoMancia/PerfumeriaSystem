<?php
include_once '../Modelo/Usuario.php';
$usuario = new Usuario();
session_start();
$id_usuario=$_SESSION['usuario'];

if ($_POST['funcion']=='buscar_usuario') {
    $json=array();
    $fecha_actual = new DateTime();
    $usuario->obtener_datos($_POST['dato']);
    foreach ($usuario->objetos as $objeto) {
        $nacimiento = new DateTime($objeto->edad_us);
        $edad=$nacimiento->diff($fecha_actual);
        $edad_years = $edad->y;
        $json[]=array(
            'nombre'=>$objeto->nombre_us,
            'apellidos'=>$objeto->apellido_us,
            'edad'=>$edad_years,
            'dui'=>$objeto->dui_us,
            'tipo'=>$objeto->nombre_tipo,
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us,
            'foto'=>'../Img/'.$objeto->foto
         );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}   


if ($_POST['funcion']=='capturar_datos') {
    $json=array();
    $id_usuario=$_POST['id_usuario'];
    $usuario->obtener_datos($id_usuario);
    foreach ($usuario->objetos as $objeto) {
        $json[]=array(
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us
         );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}


if ($_POST['funcion']=='editar_usuario') {
   
    $id_usuario=$_POST['id_usuario'];
    $telefono=$_POST['telefono'];
    $residencia=$_POST['residencia'];
    $correo=$_POST['correo'];
    $sexo=$_POST['sexo'];
    $adicional=$_POST['adicional'];
    $usuario->editar($id_usuario,$telefono,$residencia,$correo,$sexo,$adicional);
    echo 'editado';
}

if ($_POST['funcion']=='cambiar_contra') {
   
   $id_usuario=$_POST['id_usuario'];
   $oldpass=$_POST['oldpass'];
   $newpass=$_POST['newpass'];
   $usuario->cambiar_contra($id_usuario,$oldpass,$newpass);
}

if ($_POST['funcion']=='cambiar_foto') {
    if (($_FILES['foto']['type']=='image/jpeg') || ($_FILES['foto']['type']=='image/png') || ($_FILES['foto']['type']=='image/gif')) {
        $nombre=uniqid().'-'.$_FILES['foto']['name'];
        $ruta='../Img/'.$nombre;
        move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);
        $usuario->cambiar_foto($id_usuario,$nombre);
        foreach ($usuario->objetos as $objeto) {
            unlink('../Img/'.$objeto->foto);
        }
        $json= array();
        $json[]=array(
            'ruta'=>$ruta,
            'alert'=>'edit'
        );
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
    else {
        $json= array();
        $json[]=array(
            'alert'=>'noedit'
        );
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
   
 }
 if ($_POST['funcion']=='Gestion_Usuario') {
    $json=array();
    $fecha_actual = new DateTime();
    $usuario->buscar();
    foreach ($usuario->objetos as $objeto) {
        $nacimiento = new DateTime($objeto->edad_us);
        $edad=$nacimiento->diff($fecha_actual);
        $edad_years = $edad->y;
        $json[]=array(
            'nombre'=>$objeto->nombre_us,
            'apellidos'=>$objeto->apellido_us,
            'edad'=>$edad_years,
            'dui'=>$objeto->dui_us,
            'tipo'=>$objeto->nombre_tipo,
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us,
            'foto'=>'../Img/'.$objeto->foto,
            'tipo_usuario' => $objeto->us_tipo
         );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}   
if ($_POST['funcion']=='crear_usuario') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $dui = $_POST['dui'];
    $pass = $_POST['pass'];
    $tipo=2;
    $foto='genericuser.png';
    $usuario->crear($nombre,$apellido,$edad,$dui,$pass,$tipo,$foto);

}
?>