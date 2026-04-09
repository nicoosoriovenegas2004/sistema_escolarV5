<?php
require_once 'auth.php'; 
include("conexion.php");

if(!isset($_GET['id'])){
    die("ID no proporcionado");
}

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas por asignatura</title>
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
            color: #fff;
            width: 100%;
            max-width: 700px; 
            padding: 20px;
        }

        table th, table td {
            border: 1px solid #535353 !important;
            text-align: center;
            vertical-align: middle;
            background-color: #ffffff !important; 
            color: #000000 !important;
        }

        .btn-secondary {
            color: #fff !important;
        }

        h3, h2 {
            color: #fff;
        }
    </style>
</head>
<body>

<?php include("sidebar.php"); ?>

<div class="container-custom">
    <div class="card shadow">
        <div class="card-body">

            <h3 class="text-center mb-4">Notas por asignatura</h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Asignatura</th>
                        <th>Notas</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $sql = "SELECT asignatura, nota 
                        FROM notas 
                        WHERE alumno_id = ? 
                        ORDER BY asignatura";

                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $resultado = $stmt->get_result();

                $notas_por_asignatura = [];

                while($row = $resultado->fetch_assoc()){
                    $notas_por_asignatura[$row['asignatura']][] = $row['nota'];
                }

                foreach($notas_por_asignatura as $asignatura => $notas){
                ?>

                    <tr>
                        <td><?php echo $asignatura; ?></td>
                        <td><?php echo implode(" | ", $notas); ?></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

            <div class="text-center mt-3">
                <a href="alumnos.php" class="btn btn-secondary">Volver</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>