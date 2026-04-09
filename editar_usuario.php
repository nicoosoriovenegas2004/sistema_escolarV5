<?php
require_once 'auth.php';

include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id='$id'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>

    <link rel="icon" type="image/png" href="imagenes/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            height: 100vh;
            background-image: url("imagenes/fondo6.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container-custom {
            margin-left: 240px; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }

        .card {
            background-color: #535353 !important;
            color: #fff !important;
            width: 100%;
            max-width: 600px;
        }

        .card {
            background-color: #535353 !important; 
            color: #fff !important;           
        }

        .form-label {
            color: #fff !important;
        }

        .form-control {
            background-color: #ffffff !important; 
            color: #000000 !important;            
            border: 1px solid #fff !important; 
        }

        .btn-secondary {
            color: #fff !important;
        }

        .btn-success {
            color: #fff !important;
        }

        h2 {
            color: #fff;
        }

    </style>
</head>


<body class="bg-light">
            <?php include("sidebar.php"); ?>

<div class="container mt-5">
    <div class="container-custom">

<div class="card shadow">
<div class="card-body">

<h2 class="text-center mb-4">Editar Usuario</h2>

<form action="actualizar_usuario.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control"
        value="<?php echo $fila['nombre']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control"
        value="<?php echo $fila['apellido']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="text" name="correo" class="form-control"
        value="<?php echo $fila['correo']; ?>">
    </div>

    <div class="d-flex justify-content-between">
        <a href="usuarios.php" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </div>

</form>

</div>
</div>

</div>

<style>
body {
  margin: 0;
  height: 100vh;
  background-image: url("imagenes/fondo6.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
</style>

</body>
</html>