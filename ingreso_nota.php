<?php
require_once 'auth.php';

include("conexion.php");


$fila = null;

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "SELECT * FROM alumnos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_assoc();
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ingreso de Notas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">
<div class="card-body">

<h2 class="text-center mb-4">Ingreso de Notas</h2>

<form method="GET" class="mb-4">
    <div class="input-group">
        <input type="number" name="id" class="form-control" placeholder="Buscar alumno por ID" required>
        <button class="btn btn-primary">Buscar</button>
    </div>
</form>

<?php if($fila): ?>

    <div class="mb-3">
        <strong>Alumno:</strong>
        <?php echo $fila['nombre_alumno'] . " " . $fila['apellido_alumno']; ?>
    </div>

    <form action="ingresar_nota.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Nota</label>
            <input type="number" step="0.1" min="0" max="7"
            name="nota" class="form-control"
            value="<?php echo isset($fila['nota']) ? $fila['nota'] : ''; ?>" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="alumnos.php" class="btn btn-secondary">Volver</a>
            <button type="submit" class="btn btn-success">Guardar Nota</button>
        </div>

    </form>

<?php else: ?>

    <div class="alert alert-info text-center">
        Ingrese un ID para buscar un alumno
    </div>

<?php endif; ?>

</div>
</div>

</div>

</body>
</html>