<?php
include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alumno_id = $_POST['alumno_id'];
    $curso_id = $_POST['curso_id'];

    $conexion = conectar();
    $sql = "INSERT INTO matricula (alumno_id, curso_id) VALUES ('$alumno_id', '$curso_id')";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        header('Location: matriculas.php');
        exit();
    } else {
        echo 'Error al agregar la matrícula: ' . mysqli_error($conexion);
    }
    mysqli_close($conexion);
}

$conexion = conectar();
$sql_alumnos = "SELECT alumno_id, nombres FROM alumno";
$resultado_alumnos = mysqli_query($conexion, $sql_alumnos);
$sql_cursos = "SELECT curso_id, nombre_curso FROM curso";
$resultado_cursos = mysqli_query($conexion, $sql_cursos);
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Matrícula</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Agregar Matrícula</h1>
        <form method="POST">
            <div class="field">
                <label class="label" for="alumno_id">Alumno:</label>
                <div class="control">
                    <div class="select">
                        <select id="alumno_id" name="alumno_id">
                            <?php while ($alumno = mysqli_fetch_array($resultado_alumnos)) { ?>
                                <option value="<?php echo $alumno['alumno_id']; ?>"><?php echo $alumno['nombres']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label" for="curso_id">Curso:</label>
                <div class="control">
                    <div class="select">
                        <select id="curso_id" name="curso_id">
                            <?php while ($curso = mysqli_fetch_array($resultado_cursos)) { ?>
                                <option value="<?php echo $curso['curso_id']; ?>"><?php echo $curso['nombre_curso']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-primary">Agregar Matrícula</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
