<?php
 require_once 'auth.php';
 
include("conexion.php");

$sql = "SELECT id, password FROM usuarios";
$resultado = $conexion->query($sql);

while ($fila = $resultado->fetch_assoc()) {
    $id = $fila['id'];
    $password_plano = $fila['password'];

    if (strpos($password_plano, '$2y$') !== 0) {

        $hash = password_hash($password_plano, PASSWORD_DEFAULT);

        $update = $conexion->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
        $update->bind_param("si", $hash, $id);
        $update->execute();
    }
}

echo "Contraseñas encriptadas correctamente ";
?>