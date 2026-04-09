<?php
require_once 'auth.php';

include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM alumnos WHERE id='$id'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Alumno</title>

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

<body>
    <?php include("sidebar.php"); ?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container-custom">
    <div class="card shadow" style="width: 500px;">
        <div class="card-body">

            <h2 class="text-center mb-4">Editar Alumno</h2>

            <form action="actualizar_alumno.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre_alumno" class="form-control"
                    value="<?php echo $fila['nombre_alumno']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" name="apellido_alumno" class="form-control"
                    value="<?php echo $fila['apellido_alumno']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="direccion_alumno" class="form-control"
                    value="<?php echo $fila['direccion_alumno']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono_alumno" class="form-control"
                    value="<?php echo $fila['telefono_alumno']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Año Escolar</label>
                    <input type="text" name="anio_escolar" class="form-control"
                    value="<?php echo $fila['anio_escolar']; ?>">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="alumnos.php" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>