<?php

include_once 'conexion/conexion.php';
$con = conexion();

if (isset($_POST['rol'])) {
    $id_role = $con->real_escape_string(htmlentities($_POST['rol']));
}

$sql = "SELECT MAX(id) AS idEmpleado FROM empleados";
$fila = $con->query($sql);
$datos = $fila->fetch_assoc();
$id_empleado = $datos["idEmpleado"];
//var_dump($datos);
//var_dump($datos["idEmpleado"]);

$sql2 = " INSERT INTO empleado_rol(empleado_id, rol_id) VALUES(?,?)";
$query = $con->prepare($sql2);
$query->bind_param('ii', $id_empleado, $id_role);
echo $query->execute();

$con->close();
