<?php 
require_once 'auth.php';


if(!isset($_SESSION['usuario'])){
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Registro Usuario</title>

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
    margin-left: 260px; 
}
</style>

</head>

<body>

<?php include("sidebar.php"); ?>

<div class="container container-custom mt-5">

<h2>Registro de Usuario</h2>

<form action="guardar_usuario.php" method="POST">

<input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre" required>

<input type="text" name="apellido" class="form-control mb-3" placeholder="Apellido" required>

<select name="tipo_usuario" class="form-control mb-3">
<option value="Administrador">Administrador</option>
<option value="Usuario">Usuario</option>
</select>

<input type="email" name="correo" class="form-control mb-3" placeholder="Correo" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>

<button class="btn btn-primary">Guardar</button>
<a href="usuarios.php" class="btn btn-secondary">Volver</a>

</form>

</div>

</body>
</html>