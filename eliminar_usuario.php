<?php
require_once 'auth.php';

include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id='$id'";
mysqli_query($conexion, $sql);

header("Location: usuarios.php");
?>