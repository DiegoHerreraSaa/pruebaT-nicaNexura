<?php

include_once 'conexion/conexion.php';
$con = conexion();

$nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
$correo = $con->real_escape_string(htmlentities($_POST['correo']));
$sexo = $con->real_escape_string(htmlentities($_POST['sexo']));
$area = $con->real_escape_string(htmlentities($_POST['area']));
$descripcion = $con->real_escape_string(htmlentities($_POST['descripcion']));
if(!isset($_POST['boletin'])){
    $boletin = 0;
} else {
    if($con->real_escape_string(htmlentities($_POST['boletin'] == "on"))){
        $boletin = 1;
    }
}

$sql = " INSERT INTO empleados(nombre, email, sexo, area_id, boletin, descripcion) VALUES(?,?,?,?,?,?)";
$query1 = $con->prepare($sql);
$query1->bind_param('ssssss', $nombre, $correo, $sexo, $area, $boletin, $descripcion);
echo $query1->execute();

$con->close();