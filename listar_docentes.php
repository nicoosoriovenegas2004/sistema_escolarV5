<?php
require_once 'auth.php';

include("conexion.php");

$sql="SELECT * FROM docentes";

$resultado=mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Lista Docentes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Lista de Docentes</h2>

<table class="table">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Carrera</th>
<th>Asignatura</th>
<th>Teléfono</th>
<th>Correo</th>
</tr>

<?php while($fila=mysqli_fetch_array($resultado)){ ?>

<tr>

<td><?php echo $fila['id']; ?></td>

<td><?php echo $fila['nombre_docente']; ?></td>

<td><?php echo $fila['carrera_docente']; ?></td>

<td><?php echo $fila['asignatura']; ?></td>

<td><?php echo $fila['telefono_docente']; ?></td>

<td><?php echo $fila['correo_docente']; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>
