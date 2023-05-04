<?php
include_once("../conexion.php");

$conexion = conectar();

$alumno_id = $_GET['id'];
$sql = "SELECT alumno_id, nombres, ape_paterno, ape_materno FROM alumno WHERE alumno_id = '$alumno_id'";

$resultado = mysqli_query($conexion, $sql);

desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Editar Alumno</h1>
            <?php
            while($alumno = mysqli_fetch_array($resultado)){
                $alumno_id = $alumno['alumno_id'];
                $nombres = $alumno['nombres'];
                $ape_paterno = $alumno['ape_paterno'];
                $ape_materno = $alumno['ape_materno'];
            ?>
            <form method="post" action="confir_edit.php">
                <div class="field">
                    <label class="label" for="nombres">Nombres:</label>
                    <div class="control">
                        <input class="input" type="text" id="nombres" name="nombres" value="<?php echo $nombres; ?>">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="ape_paterno">Apellido Paterno:</label>
                    <div class="control">
                        <input class="input" type="text" id="ape_paterno" name="ape_paterno" value="<?php echo $ape_paterno; ?>">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="ape_materno">Apellido Materno:</label>
                    <div class="control">
                        <input class="input" type="text" id="ape_materno" name="ape_materno" value="<?php echo $ape_materno; ?>">
                    </div>
                </div>
                <input type="hidden" name="alumno_id" value="<?php echo $alumno_id; ?>">
                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-primary">Guardar</button>
                    </div>
                    <div class="control">
                        <a href="alumnos.php" class="button is-link is-light">Cancelar</a>
                    </div>
                </div>
            </form>
            <?php
            }
            ?>
        </div>
    </section>
</body>
</html>
