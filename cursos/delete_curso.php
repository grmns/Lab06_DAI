<?php
include('../conexion.php');


$conexion=conectar();


$curso_id = $_GET['id']; 


$sql="DELETE FROM curso WHERE curso_id ='$curso_id'";

if(mysqli_query($conexion,$sql)){

    header('Location: cursos.php');
}else{
    echo "Error al eliminar el registro: ".mysqli_error($conexion);
}
desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar Curso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Eliminar Curso</h1>
        <?php
        if(mysqli_query($conexion,$sql)){
            echo '<div class="notification is-success">
                  <p>El curso ha sido eliminado correctamente.</p>
                  <a href="cursos.php" class="button is-success mt-2">Regresar</a>
                  </div>';
        }else{
            echo '<div class="notification is-danger">
                  <p>Error al eliminar el curso:</p>
                  <p>'.mysqli_error($conexion).'</p>
                  <a href="cursos.php" class="button is-danger mt-2">Regresar</a>
                  </div>';
        }
        ?>
    </div>
</body>
</html>
