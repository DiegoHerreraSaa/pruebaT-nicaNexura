<?php

include_once 'conexion/conexion.php';
$con = conexion();

$id = $con->real_escape_string(htmlentities($_POST["id"]));

$sql = " DELETE FROM empleados WHERE id LIKE ? ";
$query = $con->prepare($sql);
$query->bind_param("i",$id);
echo $query->execute();
$query->close();
$con->close();