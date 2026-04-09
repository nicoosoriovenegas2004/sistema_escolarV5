<?php
require_once 'auth.php';

include("conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$asignatura = $_POST['asignatura'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$anio = $_POST['anio'];

$sql = "INSERT INTO alumnos(nombre_alumno,apellido_alumno,asignatura,direccion_alumno,telefono_alumno,anio_escolar)
VALUES('$nombre','$apellido','$asignatura','$direccion','$telefono','$anio')";

mysqli_query($conexion,$sql);

header("Location:alumnos.php");

?>
