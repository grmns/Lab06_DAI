<?php
include('../conexion.php');
$conexion=conectar();
$matricula_id=$_GET['id'];
$sql="SELECT matricula_id, alumno_id, curso_id FROM matricula WHERE matricula_id='$matricula_id'";
$resultado=mysqli_query($conexion,$sql);
$matricula=mysqli_fetch_array($resultado);
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Matrícula</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Editar Matrícula</h1>
            <form method="post" action="confir_matricula.php">
                <div class="field">
                    <label class="label" for="alumno_id">Alumno:</label>
                    <div class="control">
                        <div class="select">
                            <select id="alumno_id" name="alumno_id">
                                <?php
                                $conexion=conectar();
                                $sql="SELECT alumno_id, nombres FROM alumno";
                                $resultado=mysqli_query($conexion,$sql);
                                while($alumno=mysqli_fetch_array($resultado)){
                                    $selected = ($alumno['alumno_id'] == $matricula['alumno_id']) ? 'selected' : '';
                                    echo '<option value="'.$alumno['alumno_id'].'" '.$selected.'>'.$alumno['nombres'].'</option>';
                                }
                                desconectar($conexion);
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="curso_id">Curso:</label>
                    <div class="control">
                        <div class="select">
                            <select id="curso_id" name="curso_id">
                                <?php
                                $conexion=conectar();
                                $sql="SELECT curso_id, nombre_curso FROM curso";
                                $resultado=mysqli_query($conexion,$sql);
                                while($curso=mysqli_fetch_array($resultado)){
                                    $selected = ($curso['curso_id'] == $matricula['curso_id']) ? 'selected' : '';
                                    echo '<option value="'.$curso['curso_id'].'" '.$selected.'>'.$curso['nombre_curso'].'</option>';
                                }
                                desconectar($conexion);
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="matricula_id" value="<?php echo $matricula['matricula_id']; ?>">
                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-link">Guardar</button>
                    </div>
                    <div class="control">
                        <a href="matriculas.php" class="button is-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
