<?php
require_once 'auth.php';

include("conexion.php");

if(isset($_GET['id'])){
    $alumno_id = $_GET['id'];

    $sql = "SELECT * FROM alumnos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $alumno_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $alumno = $resultado->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Notas</title>
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
            padding: 20px;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff !important;
            width: 100%;
            max-width: 600px; 
            padding: 20px;
        }

        .form-control {
            background-color: #ffffff !important;
            color: #000000 !important;
            border: 1px solid #ffffff;
        }

        .form-control::placeholder {
            color: #cccccc;
        }

        .btn-secondary, .btn-success {
            color: #fff !important;
        }

        h2, h4 {
            color: #fff;
        }
    </style>
</head>
<body class="bg-light">

<?php include("sidebar.php"); ?>

<div class="container-custom">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="text-center mb-4">Ingreso de Notas</h2>

            <?php if(isset($alumno)): ?>
                <h4>Alumno: <?php echo $alumno['nombre_alumno'] . " " . $alumno['apellido_alumno']; ?></h4>

                <form action="guardar_nota.php" method="POST">
                    <input type="hidden" name="alumno_id" value="<?php echo $alumno['id']; ?>">

                    <div class="mb-3">
                        <select name="asignatura" class="form-control mb-3">
                            <option>Matematicas</option>
                            <option>Lenguaje</option>
                            <option>Ingles</option>
                            <option>Historia</option>
                            <option>Ciencias</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Nota</label>
                        <input type="number" step="0.1" name="nota" class="form-control" required>
                    </div>

                    <button class="btn btn-success">Guardar Nota</button>
                    <a href="alumnos.php" class="btn btn-secondary">Volver</a>
                </form>

            <?php else: ?>
                <div class="alert alert-danger">Alumno no encontrado</div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>