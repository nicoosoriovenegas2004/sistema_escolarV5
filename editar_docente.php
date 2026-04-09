<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM docentes WHERE id='$id'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Docente</title>

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

<body class="bg-light">

<?php include("sidebar.php"); ?>

<div class="container-custom">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="text-center mb-4">Editar Docente</h2>

            <form action="actualizar_docente.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre_docente" class="form-control"
                    value="<?php echo $fila['nombre_docente']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Carrera</label>
                    <input type="text" name="carrera_docente" class="form-control"
                    value="<?php echo $fila['carrera_docente']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Asignatura</label>
                    <input type="text" name="asignatura" class="form-control"
                    value="<?php echo $fila['asignatura']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono_docente" class="form-control"
                    value="<?php echo $fila['telefono_docente']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo</label>
                    <input type="text" name="correo_docente" class="form-control"
                    value="<?php echo $fila['correo_docente']; ?>">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="docentes.php" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>