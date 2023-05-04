<?php
include_once('../conexion.php');
$conexion = conectar();

$alumno_id = $_POST['alumno_id'];
$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

$sql = "UPDATE alumno SET nombres='$nombres', ape_paterno='$ape_paterno', ape_materno='$ape_materno' WHERE alumno_id='$alumno_id'";

$resultado = mysqli_query($conexion, $sql);

desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualización Alumno</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Actualización Alumno</h1>
            <?php
            if(!$resultado){
                echo '<div class="notification is-danger">No se pudieron actualizar los datos</div>';
            }
            else{
                echo '<div class="notification is-success">El alumno fue actualizado correctamente</div>';
            }
            ?>
            <a class="button is-primary" href="alumnos.php">Regresar</a>
        </div>
    </section>
</body>
</html>
