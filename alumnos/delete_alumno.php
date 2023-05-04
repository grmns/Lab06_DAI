<?php
include('../conexion.php');
$conexion=conectar();

$alumno_id = $_GET['id']; 

$sql="DELETE FROM alumno WHERE alumno_id ='$alumno_id'";

if(mysqli_query($conexion,$sql)){
    header('Location: alumnos.php');
}else{
    echo "Error al eliminar el registro: ".mysqli_error($conexion);
}
desconectar($conexion);
?>
