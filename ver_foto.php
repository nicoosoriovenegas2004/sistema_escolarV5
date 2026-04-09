<?php
include("conexion.php");

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $carpetaDestino = "uploads/";

    if (!file_exists($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }

    $nombreArchivo = time() . "_" . basename($_FILES["foto"]["name"]);
    $ruta = $carpetaDestino . $nombreArchivo;

    $tipoArchivo = strtolower(pathinfo($ruta, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        echo "No es una imagen.";
        exit;
    }

    if ($_FILES["foto"]["size"] > 2 * 1024 * 1024) {
        echo "Imagen muy grande.";
        exit;
    }

    $permitidos = ['jpg', 'jpeg', 'png', 'gif','webp'];
    if (!in_array($tipoArchivo, $permitidos)) {
        echo "Formato no permitido.";
        exit;
    }

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta)) {
        $sqlUpdate = "UPDATE alumnos SET foto='$ruta' WHERE id='$id'";
        mysqli_query($conexion, $sqlUpdate);
    }
}

$sql = "SELECT nombre_alumno, foto FROM alumnos WHERE id='$id'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
?>
<?php
require_once 'auth.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Foto del Alumno</title>

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
            padding: 20px;
        }

        .card-custom {
            background-color: rgba(0,0,0,0.7);
            color: #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        img {
            border-radius: 10px;
            border: 2px solid #fff;
        }
    </style>
</head>

<body>

<?php include("sidebar.php"); ?>

<div class="container-custom">

    <h2 class="mb-4 text-white">Foto del Alumno</h2>

    <div class="card-custom">

        <h4><?php echo $fila['nombre_alumno']; ?></h4>
        <br>

        <?php if($fila['foto'] != ''){ ?>
            <img src="<?php echo $fila['foto']; ?>" width="300"><br><br>
        <?php } else { ?>
            <p>No hay foto disponible</p>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="file" name="foto" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Subir / Cambiar Foto</button>
        </form>

        <br>
        <a href="alumnos.php" class="btn btn-secondary">Volver</a>

    </div>

</div>

</body>
</html>