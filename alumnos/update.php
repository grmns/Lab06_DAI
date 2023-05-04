<?php
	// Obtener los datos del formulario de actualización
	$alumno_id = $_POST['alumno_id'];
	$nombres = $_POST['nombres'];
	$ape_paterno = $_POST['ape_paterno'];
	$ape_materno = $_POST['ape_materno'];

	// Conexión a la base de datos
	$conexion = mysqli_connect("localhost", "root", "usbw", "lab06");

	// Consulta para actualizar los datos del alumno
	$query = "UPDATE alumno SET nombres='$nombres', ape_paterno='$ape_paterno', ape_materno='$ape_materno' WHERE alumno_id=$alumno_id";
	$resultado = mysqli_query($conexion, $query);

	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <h1>Actualizar Alumno</h1>
    <h3>
        <?php
        if ($resultado) {
            echo "Alumno actualizado correctamente";
        } else {
            echo "Error al actualizar alumno";
        }
        ?>
    </h3>
    <a href="alumnos.php">Regresar</a>
</body>
</html>