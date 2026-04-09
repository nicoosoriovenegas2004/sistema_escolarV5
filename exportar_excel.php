<?php
require_once 'auth.php';

include("conexion.php");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=alumnos.xls");

$sql = "SELECT * FROM alumnos";
$resultado = mysqli_query($conexion, $sql);

echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Anio</th>
      </tr>";

while($fila = mysqli_fetch_assoc($resultado)){
    echo "<tr>";
    echo "<td>".$fila['id']."</td>";
    echo "<td>".$fila['nombre_alumno']."</td>";
    echo "<td>".$fila['apellido_alumno']."</td>";
    echo "<td>".$fila['direccion_alumno']."</td>";
    echo "<td>".$fila['telefono_alumno']."</td>";
    echo "<td>".$fila['anio_escolar']."</td>";
    echo "</tr>";
}

echo "</table>";
?>