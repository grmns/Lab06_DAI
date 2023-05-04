<?php

include_once("../conexion.php");

$conexion = conectar();

$sql = "INSERT INTO alumno (nombres, ape_paterno, ape_materno) VALUES ('$_POST[nombres]', '$_POST[ape_paterno]', '$_POST[ape_materno]')";

$resultado = mysqli_query($conexion, $sql);
desconectar($conexion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Alumno</title>
</head>
<body>
    <h1>Nuevo Alumno</h1>
    <h3>
        <?php
        if ($resultado) {
            echo "Alumno registrado correctamente";
        } else {
            echo "Error al registrar alumno";
        }
        ?>
    </h3>
    <a href="alumnos.php">Regresar</a>
</body>
</html>