<?php
include("conexion.php");

if(isset($_GET['token'])){
    $token = $_GET['token'];
}

if(isset($_POST['password'])){
    $password = $_POST['password'];

    $sql = "UPDATE usuarios SET password='$password', token=NULL WHERE token='$token'";
    mysqli_query($conexion, $sql);

    echo "Contraseña actualizada";
}
?>

<form method="POST">
    <input type="password" name="password" placeholder="Nueva contraseña" required>
    <button type="submit">Guardar</button>
</form>