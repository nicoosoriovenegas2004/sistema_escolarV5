<?php
require_once 'auth.php';

include("conexion.php");

$sql = "SELECT asignatura, COUNT(id) as cantidad
FROM alumnos
GROUP BY asignatura";

$resultado = mysqli_query($conexion, $sql);

$asignaturas = [];
$cantidades = [];

while($fila = mysqli_fetch_assoc($resultado)){
    $asignaturas[] = strtolower($fila['asignatura']); 
    $cantidades[] = $fila['cantidad'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico Circular</title>

    <link rel="icon" type="image/png" href="imagenes/logo.png">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-image: url("imagenes/fondo6.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.3);
            z-index: -1;
        }

        h2 {
            margin-bottom: 40px; 
            text-align: center;
        }

        .sidebar {
            width: 240px;
            position: fixed;
            height: 100%;
            background-color: #333;
            color: white;
            padding: 20px;
        }

        .container-custom {
            margin-left: 240px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            max-width: 100%;
            gap: 50px;
            height: 100vh;
        }

        .graph-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 50px;
            max-height: 70vh;
        }

        .labels-side {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            max-height: 70vh;
        }

        .labels-side .badge {
            margin: 8px 0;
            font-size: 1.3rem; 
            padding: 0.7em 1em;
            color: #000;
        }

        canvas {
            max-width: 400px;
            max-height: 70vh;
        }

        .btn-back {
            margin-top: 20px;
            padding: 0.7em 1.5em;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        @media (max-width: 768px) {
            .graph-container {
                flex-direction: column;
                gap: 30px;
                max-height: 60vh;
            }

            .labels-side {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                max-height: none;
            }

            .labels-side .badge {
                margin: 5px;
            }

            canvas {
                max-width: 90vw;
                max-height: 50vh;
            }
        }
    </style>
</head>
<body>

<?php include("sidebar.php"); ?>

<div class="container-custom">

    <h2>Distribución de Estudiantes por Asignatura</h2>

    <div class="graph-container">
        <div class="labels-side">
            <?php
            $colores = [];
            foreach($asignaturas as $index => $asig){
                switch($asig){
                    case 'matematicas': $color='lightblue'; break;
                    case 'lenguaje': $color='red'; break;
                    case 'historia': $color='brown'; break;
                    case 'ciencias': $color='green'; break;
                    case 'ingles': $color='yellow'; break;
                    default: $color='gray';
                }
                $colores[] = $color;
                echo "<span class='badge' style='background-color:$color;'>".ucfirst($asig)."</span>";
            }
            ?>
        </div>

        <canvas id="miGrafico"></canvas>
    </div>

    <a href="dashboard.php" class="btn btn-secondary btn-back">Volver</a>

</div>

<script>
const labels = <?php echo json_encode($asignaturas); ?>;
const dataValues = <?php echo json_encode($cantidades); ?>;
const coloresJS = <?php echo json_encode($colores); ?>;

const ctx = document.getElementById('miGrafico');

Chart.register(ChartDataLabels);

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: dataValues,
            backgroundColor: coloresJS
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
            animateScale: true,
            animateRotate: true
        },
        plugins: {
            legend: {
                display: false
            },
            datalabels: {
                color: 'black',
                formatter: (value, context) => {
                    let total = context.chart._metasets[0].total;
                    return ((value / total) * 100).toFixed(1) + "%";
                }
            }
        }
    }
});
</script>

</body>
</html>