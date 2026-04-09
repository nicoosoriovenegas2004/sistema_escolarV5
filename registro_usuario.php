<!DOCTYPE html>
<html>
<head>

<title>Registro Usuario</title>

<link rel="icon" type="image/png" href="imagenes/logo.png">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Registro de Usuario</h2>

<form action="guardar_usuario.php" method="POST">

<input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre">

<input type="text" name="apellido" class="form-control mb-3" placeholder="Apellido">

<select name="tipo_usuario" class="form-control mb-3">
<option>Administrador</option>
<option>Docente</option>
</select>

<input type="email" name="correo" class="form-control mb-3" placeholder="Correo">

<input type="password" name="password" class="form-control mb-3" placeholder="Contraseña">

<button class="btn btn-primary">Guardar</button>

<a href="usuarios.php" class="btn btn-secondary">Volver</a>

</form>

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
