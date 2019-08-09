<?php

include_once 'conexion/conexion.php';
$con = conexion();
$id = $con->real_escape_string(htmlentities($_POST['id']));

$sql = " SELECT empleados.*, areas.nombre AS area, empleado_rol.rol_id AS rol FROM empleados JOIN areas ON areas.id = empleados.area_id JOIN empleado_rol ON empleado_rol.empleado_id = empleados.id WHERE empleados.id = ? ";

$query = $con->prepare($sql);
$query->bind_param("i", $id);
$query->execute();
$datos = $query->get_result()->fetch_assoc();

echo json_encode($datos);