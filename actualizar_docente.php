<?php
require_once 'auth.php';

include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre_docente'];
$carrera = $_POST['carrera_docente'];
$asignatura = $_POST['asignatura'];
$telefono = $_POST['telefono_docente'];
$correo = $_POST['correo_docente'];

$sql = "UPDATE docentes SET 
        nombre_docente='$nombre',
        carrera_docente='$carrera',
        asignatura='$asignatura',
        telefono_docente='$telefono',
        correo_docente='$correo'
        WHERE id='$id'";

$resultado = mysqli_query($conexion, $sql);

if($resultado){
    header("Location: docentes.php"); 
} else {
    echo "Error al actualizar: " . mysqli_error($conexion);
}
?>