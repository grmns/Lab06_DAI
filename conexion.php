<?php

function conectar() {
    $conexion = mysqli_connect("localhost", "root", "usbw", "lab06");
    if ($conexion == NULL) {
        die("Error al conectarse");
    }
    return $conexion;
}

function desconectar($conexion) {
    mysqli_close($conexion);
}

?>