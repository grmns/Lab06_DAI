<?php
include('../conexion.php');
$conexion=conectar();
$sql='SELECT m.matricula_id, a.nombres, c.nombre_curso
FROM matricula m
INNER JOIN alumno a ON m.alumno_id = a.alumno_id
INNER JOIN curso c ON m.curso_id = c.curso_id
ORDER BY m.matricula_id ASC;';
$resultado=mysqli_query($conexion,$sql);
if (!$resultado) {
  die('Error en la consulta: ' . mysqli_error($conexion));
}
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrículas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Matrículas</h1>
        <div>
            <a href="create_matricula.php" class="button is-success is-shadowed">Nueva Matrícula</a>
            <table class="table is-striped is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($matricula=mysqli_fetch_array($resultado)){
                        $matricula_id=$matricula['matricula_id'];
                        $nombre_alumno=$matricula['nombres'];
                        $nombre_curso=$matricula['nombre_curso'];
                        echo '<tr>';
                        echo '<td>'.$matricula_id.'</td>';
                        echo '<td>'.$nombre_alumno.'</td>';
                        echo '<td>'.$nombre_curso.'</td>';
                        echo '<td><a href="edit_matricula.php?id='.$matricula_id.'" class="button is-warning is-shadowed">Editar</a>
                                    <a href="delete_matricula.php?id='.$matricula_id.'" class="button is-danger is-shadowed">Eliminar</a></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
            <a href="../index.html" class="button is-primary is-shadowed">Regresar</a>
        </div>

    </div>
    
</body>
</html>
