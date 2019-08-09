<?php

function conexion(){
    try {
        include_once 'config.php';
        $con = new mysqli(HOST, USER, PASS, BASE_DATOS);
        if ($con->connect_errno) {
            echo "Error en conexión base de datos: " . $con->connect_error;
        }
    } catch (SQLException $e) {
        echo "Error conexión = " . $e;
    }
    $con->set_charset('utf8');
    return $con;
}