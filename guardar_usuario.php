<?php
require_once 'auth.php';

include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $role = $_POST['tipo_usuario']; 
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sqlCheck = "SELECT * FROM usuarios WHERE correo = ?";
    $stmtCheck = $conexion->prepare($sqlCheck);
    $stmtCheck->bind_param("s", $correo);
    $stmtCheck->execute();
    $resultado = $stmtCheck->get_result();

    if ($resultado->num_rows > 0) {

        $_SESSION['error'] = "El correo ya está registrado.";
        header("Location: registro_usuario.php");
        exit();
    }

    $sql = "INSERT INTO usuarios (nombre, apellido, role, correo, password) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellido, $role, $correo, $password);

    if ($stmt->execute()) {

        $_SESSION['success'] = "Usuario registrado correctamente.";
        header("Location: index.php");
    } else {

        $_SESSION['error'] = "Error al registrar el usuario.";
        header("Location: registro_usuario.php");
    }

    $stmt->close();
    $conexion->close();
}
?>