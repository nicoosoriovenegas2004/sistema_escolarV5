<?php
require_once 'auth.php'; 

include("conexion.php");

if(isset($_POST['id']) && isset($_POST['nota'])){

    $id = $_POST['id'];
    $nota = $_POST['nota'];

    $sql = "UPDATE alumnos SET nota = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $nota, $id);

    if($stmt->execute()){
        header("Location: alumnos.php");
        exit();
    } else {
        echo "Error al guardar la nota: " . $stmt->error;
    }

    $stmt->close();

} else {
    echo "No se recibieron datos del formulario";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ingreso de Notas</title>

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

        table {
            width: 100%;
            background-color: #000 !important;
            color: #fff !important;
        }

        table th, table td {
            border: 1px solid #fff !important;
            text-align: center;
            vertical-align: middle;
            background-color: #000 !important; 
            color: #fff !important; 
        }

        table th {
            background-color: #111 !important; 
        }

        .btn-warning { color: #000 !important; }
        .btn-danger, .btn-success, .btn-info, .btn-primary, .btn-secondary {
            color: #fff !important;
        }

        .d-flex input[type="text"] {
            max-width: 250px;
        }

        h2 {
            color: #ffffff;
        }
    </style>
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