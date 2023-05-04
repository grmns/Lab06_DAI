<?php
include('../conexion.php');
$conexion=conectar();

$sql='SELECT curso_id, nombre_curso, creditos from curso';
$resultado=mysqli_query($conexion,$sql);
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cursos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Cursos</h1>
        <div>
            <a href="create.html" class="button is-success">Nuevo Curso</a>
            <table class="table is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Creditos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($curso=mysqli_fetch_array($resultado)){
                            $curso_id=$curso['curso_id'];
                            $nombre_curso=$curso['nombre_curso'];
                            $creditos=$curso['creditos'];
                            echo '<tr>';
                            echo '<td>'.$curso_id.'</td>';
                            echo '<td>'.$nombre_curso.'</td>';
                            echo '<td>'.$creditos.'</td>';
                            echo '<td><a href="edit_curso.php?id='.$curso_id.'" class="button is-warning">Editar</a> <a href="delete_curso.php?id='.$curso_id.'" class="button is-danger">Eliminar</a></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
            <a href="../index.html" class="button is-primary">Regresar</a>
        </div>
    </div>
</body>
</html>
