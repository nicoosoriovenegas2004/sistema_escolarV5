<?php
require_once 'auth.php';

include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre_alumno'];
$apellido = $_POST['apellido_alumno'];
$direccion = $_POST['direccion_alumno'];
$telefono = $_POST['telefono_alumno'];
$anio = $_POST['anio_escolar'];

$sql = "UPDATE alumnos SET 
        nombre_alumno='$nombre',
        apellido_alumno='$apellido',
        direccion_alumno='$direccion',
        telefono_alumno='$telefono',
        anio_escolar='$anio'
        WHERE id='$id'";

$resultado = mysqli_query($conexion, $sql);


if($resultado){
    header("Location: alumnos.php"); 
} else {
    echo "Error al actualizar: " . mysqli_error($conexion);
}
?>
