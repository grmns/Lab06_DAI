<?php
include('../conexion.php');

$conexion=conectar();

$sql='SELECT alumno_id, nombres, ape_paterno, ape_materno from alumno';

$resultado=mysqli_query($conexion,$sql);
//cerramos
desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alumnos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<script>
    body {
        padding: 20px;
    }
</script>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Alumnos</h1>

            <a href="create.html" class="button is-link">Nuevo alumno</a>
            <table class="table is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($resultado)) : ?>
                        <tr>
                            <td><?php echo $fila["alumno_id"]; ?></td>
                            <td><?php echo $fila["nombres"]; ?></td>
                            <td><?php echo $fila["ape_paterno"]; ?></td>
                            <td><?php echo $fila["ape_materno"]; ?></td>
                            <td>
                                <a href="edit_alumno.php?id=<?php echo $fila["alumno_id"]; ?>"class="button is-warning is-shadowed">Editar</a>
                                <a href="delete_alumno.php?id=<?php echo $fila["alumno_id"]; ?>" class="button is-danger is-shadowed">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <a href="../index.html" class="button is-primary">Regresar</a>
        </div>
    </section>
</body>
</html>
