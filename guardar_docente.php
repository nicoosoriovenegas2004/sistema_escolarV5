<?php
require_once 'auth.php';

include("conexion.php");

$nombre = $_POST['nombre'];
$carrera = $_POST['carrera'];
$asignatura = $_POST['asignatura'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$sql = "INSERT INTO docentes(nombre_docente,carrera_docente,asignatura,telefono_docente,correo_docente)
VALUES('$nombre','$carrera','$asignatura','$telefono','$correo')";

mysqli_query($conexion,$sql);

header("Location:docentes.php");

?>
