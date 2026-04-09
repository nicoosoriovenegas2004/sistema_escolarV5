<?php
require_once 'auth.php'; 

include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];


$sql = "UPDATE usuarios SET 
        nombre='$nombre',
        apellido='$apellido',
        correo='$correo'
        WHERE id='$id'";

$resultado = mysqli_query($conexion, $sql);

if($resultado){
    header("Location: usuarios.php"); 
} else {
    echo "Error al actualizar: " . mysqli_error($conexion);
}
?>