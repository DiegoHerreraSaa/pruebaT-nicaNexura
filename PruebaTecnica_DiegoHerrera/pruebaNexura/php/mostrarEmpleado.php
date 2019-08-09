<?php

include_once 'conexion/conexion.php';
$con = conexion();

$sql = " SELECT empleados.*, areas.nombre AS area FROM empleados JOIN areas ON areas.id = empleados.area_id ";
$result = $con->query($sql);

$cuerpoTabla = "";

while ($datos = $result->fetch_assoc()) {
    if ($datos['boletin'] == 1) {
        $boletin = "Si";
    } else {
        $boletin = "No";
    }
    $cuerpoTabla = $cuerpoTabla . '<tr>
                                    <td>' . $datos['nombre'] . '</td>
                                    <td>' . $datos['email'] . '</td>
                                    <td>' . $datos['sexo'] . '</td>
                                    <td>' . $datos['area'] . '</td>
                                    <td>' . $boletin . '</td>
                                    <td>
                                        <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#actualizarEmpleado" onclick="editarEmpleado(' . $datos['id'] . ')"> 
                                        <i class="far fa-edit"></i>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="btn btn-danger btn-sm" onclick="eliminarEmpleado(' . $datos['id'] . '); eliminarEmp_rol(' . $datos['id'] . ')"> 
                                        <i class="fas fa-trash-alt"></i>
                                        </span>
                                    </td>
                                </tr>';
}
$con->close();

echo '<table class="table table-striped">
        <thead>
            <th><i class="fas fa-user"></i> Nombre</th>
            <th><i class="fas fa-at"></i> Email</th>
            <th><i class="fas fa-venus-mars"></i> Sexo</th>
            <th><i class="fas fa-suitcase"></i> Área</th>
            <th><i class="fas fa-envelope"></i> Boletín</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
            ' . $cuerpoTabla . '
        </tbody>
    </table>';