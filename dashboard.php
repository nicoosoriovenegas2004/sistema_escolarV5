<?php 
require_once 'auth.php';


if(!isset($_SESSION['usuario'])){
    header("Location:login.php");
}

include("conexion.php");


$total_alumnos = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT COUNT(*) as total FROM alumnos"))['total'];
$total_docentes = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT COUNT(*) as total FROM docentes"))['total'];
$total_usuarios = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT COUNT(*) as total FROM usuarios"))['total'];
$total_admin = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT COUNT(*) as total FROM usuarios WHERE tipo_usuario='Administrador'"))['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link rel="icon" type="image/png" href="imagenes/logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

body {
    margin: 0;
    background: linear-gradient(to right, #dfe9f3, #ffffff);
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}


.content {
    margin-left: 240px;
    padding: 20px;
    text-align: center;
    flex: 1;
}


.header {
    margin-top: 80px;
}

.logo {
    width: 180px;
    margin-bottom: 20px;
}


.titulo {
    color: #222;
    font-weight: 600;
    font-size: 32px;
}

.subtitulo {
    color: #666;
    font-size: 16px;
    margin-bottom: 10px;
}


.card-box {
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    transition: 0.3s;
    background: white;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    border-top: 5px solid;
}

.card-box:hover {
    transform: translateY(-8px);
}


.blue { border-color: #0d6efd; }
.green { border-color: #198754; }
.orange { border-color: #fd7e14; }
.red { border-color: #dc3545; }


.icon {
    font-size: 35px;
    margin-bottom: 10px;
}

.blue .icon { color: #0d6efd; }
.green .icon { color: #198754; }
.orange .icon { color: #fd7e14; }
.red .icon { color: #dc3545; }

.card-box h2 {
    font-weight: bold;
    margin-top: 10px;
}


.cards-container {
    margin-top: 120px;
}

a.card-link {
    text-decoration: none;
    color: inherit;
}


.footer {
    margin-left: 240px;
    text-align: center;
    padding: 15px;
    color: white;
    background: #222;
    font-weight: bold;
}

</style>
</head>

<body>

<?php include("sidebar.php"); ?>

<div class="content">

    
    <div class="header">
        <img src="imagenes/logo.png" class="logo">
        <h2 class="titulo">¡Bienvenido Administrador Principal!</h2>
        <p class="subtitulo">Panel de control del sistema escolar</p>
    </div>

    <!-- CARDS -->
    <div class="row justify-content-center g-4 cards-container">

        <div class="col-md-3 col-sm-6">
            <a href="usuarios.php" class="card-link">
                <div class="card-box blue">
                    <div class="icon"><i class="fas fa-users"></i></div>
                    <h5>Usuarios</h5>
                    <h2><?php echo $total_usuarios; ?></h2>
                </div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6">
            <a href="alumnos.php" class="card-link">
                <div class="card-box green">
                    <div class="icon"><i class="fas fa-user-graduate"></i></div>
                    <h5>Alumnos</h5>
                    <h2><?php echo $total_alumnos; ?></h2>
                </div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6">
            <a href="docentes.php" class="card-link">
                <div class="card-box orange">
                    <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h5>Docentes</h5>
                    <h2><?php echo $total_docentes; ?></h2>
                </div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6">
            <a href="usuarios.php" class="card-link">
                <div class="card-box red">
                    <div class="icon"><i class="fas fa-user-shield"></i></div>
                    <h5>Administradores</h5>
                    <h2><?php echo $total_admin; ?></h2>
                </div>
            </a>
        </div>

    </div>

</div>

<style>
body {
  margin: 0;
  height: 100vh;
  background-image: url("imagenes/fondo6.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
</style>

<div class="footer">
    Sistema Escolar © 2026 - Todos los derechos reservados
</div>

</body>
</html>