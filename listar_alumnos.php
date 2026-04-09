<?php
require_once 'auth.php';

include("conexion.php");

$sql="SELECT * FROM alumnos";

$resultado=mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Lista Alumnos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Lista de Alumnos</h2>

<table class="table">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Dirección</th>
<th>Teléfono</th>
<th>Año</th>
</tr>

<?php while($fila=mysqli_fetch_array($resultado)){ ?>

<tr>

<td><?php echo $fila['id']; ?></td>

<td><?php echo $fila['nombre_alumno']; ?></td>

<td><?php echo $fila['apellido_alumno']; ?></td>

<td><?php echo $fila['direccion_alumno']; ?></td>

<td><?php echo $fila['telefono_alumno']; ?></td>

<td><?php echo $fila['anio_escolar']; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>
