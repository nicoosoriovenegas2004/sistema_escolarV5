<?php
require_once 'auth.php'; 

include("conexion.php");

if(!isset($_SESSION['id'])){
    echo "Debes iniciar sesión";
    exit;
}

$id_usuario = $_SESSION['id'];
$role = strtolower(trim($_SESSION['role'] ?? ''));

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

    $carpetaDestino = "imagenes/usuarios/";

    if (!file_exists($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }

    $nombreArchivo = time() . "_" . basename($_FILES["foto"]["name"]);
    $ruta = $carpetaDestino . $nombreArchivo;

    $tipoArchivo = strtolower(pathinfo($ruta, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["foto"]["tmp_name"]);

    if ($check === false) {
        echo "No es una imagen.";
        exit;
    }

    if ($_FILES["foto"]["size"] > 2 * 1024 * 1024) {
        echo "Imagen demasiado grande.";
        exit;
    }

    $permitidos = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array($tipoArchivo, $permitidos)) {
        echo "Formato no permitido.";
        exit;
    }

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta)) {

        $sqlUpdate = "UPDATE usuarios SET foto='$ruta' WHERE id='$id_usuario'";
        mysqli_query($conexion, $sqlUpdate);

        $_SESSION['foto'] = $ruta;

        if ($role == 'administrador') {
            header("Location: dashboard.php");
        } else {
            header("Location: dashboard_usuario.php");
        }
        exit;

    } else {
        echo "Error al subir la imagen.";
        exit;
    }

} else {
    echo "No se ha enviado ningún archivo o ha habido un error en la subida.";
    exit;
}
?>