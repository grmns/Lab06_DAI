<?php
include('../conexion.php');
$conexion = conectar();
$curso_id = $_POST['curso_id'];
$nombre_curso = $_POST['nombre_curso'];
$creditos = $_POST['creditos'];
$sql = "UPDATE curso SET nombre_curso='$nombre_curso', creditos='$creditos' WHERE curso_id='$curso_id'";
$resultado = mysqli_query($conexion, $sql);
desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Curso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Actualizar Curso</h1>

            <?php
            if (!$resultado) {
                echo '<div class="notification is-danger">';
                echo '<button class="delete"></button>';
                echo 'No se pudo actualizar el curso';
                echo '</div>';
            } else {
                echo '<div class="notification is-success">';
                echo '<button class="delete"></button>';
                echo 'El curso se actualizó correctamente';
                echo '</div>';
            }
            ?>

            <a href="cursos.php" class="button is-link">Regresar</a>
        </div>
    </section>

    <script>
        // Cerrar la notificación al hacer clic en el botón de cerrar
        document.addEventListener('DOMContentLoaded', () => {
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                const $notification = $delete.parentNode;

                $delete.addEventListener('click', () => {
                    $notification.parentNode.removeChild($notification);
                });
            });
        });
    </script>
</body>
</html>
