<?php
require_once 'auth.php';
include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM docentes WHERE id='$id'";
mysqli_query($conexion, $sql);

header("Location: docentes.php");
?>