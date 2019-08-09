<?php

include_once 'conexion/conexion.php';
$con = conexion();

$id = $con->real_escape_string(htmlentities($_POST['act_id']));
$nombre = $con->real_escape_string(htmlentities($_POST['act_nombre']));
$correo = $con->real_escape_string(htmlentities($_POST['act_correo']));
$sexo = $con->real_escape_string(htmlentities($_POST['act_sexo']));
$area = $con->real_escape_string(htmlentities($_POST['act_area']));
$descripcion = $con->real_escape_string(htmlentities($_POST['act_descripcion']));
if(!isset($_POST['act_boletin'])){
    $boletin = 0;
} else {
    if($con->real_escape_string(htmlentities($_POST['act_boletin'] == "on"))){
        $boletin = 1;
    }
}

$sql = " UPDATE empleados SET nombre=?, email=?, sexo=?, area_id=?, boletin=?, descripcion=? WHERE id LIKE ? ";
$query1 = $con->prepare($sql);
$query1->bind_param('sssssss', $nombre, $correo, $sexo, $area, $boletin, $descripcion, $id);
echo $query1->execute();

$con->close();
