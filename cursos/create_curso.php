<?php
include('../conexion.php');
$nombre_curso=$_POST['nombre_curso'];
$creditos=$_POST['creditos'];
$conexion=conectar();
$sql="INSERT INTO curso (nombre_curso,creditos) VALUES ('$nombre_curso','$creditos')";
$resultado=mysqli_query($conexion,$sql);
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Curso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Nuevo Curso</h1>
            <div class="content">
               <?php
               if (!$resultado) {
                echo '<div class="notification is-danger">';
                echo 'No se pudo ingresar el nuevo curso';
                echo '</div>';
               }else{
                echo '<div class="notification is-success">';
                echo 'El curso se ingresó correctamente';
                echo '</div>';
               }
               ?>
            </div>
            <div class="buttons">
                <a href="cursos.php" class="button is-success">Regresar</a>
            </div>
        </div>
    </section>
</body>
</html>
