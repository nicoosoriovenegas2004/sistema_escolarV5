<?php 
require_once 'auth.php'; 


if(!isset($_SESSION['usuario'])){
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Usuario</title>

<link rel="icon" type="image/png" href="imagenes/logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- ICONOS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

body {
    margin: 0;
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
    width: 160px;
    margin-bottom: 15px;
}

.titulo {
    font-weight: 600;
    font-size: 28px;
}

.subtitulo {
    color: #666;
    font-size: 15px;
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

.icon {
    font-size: 35px;
    margin-bottom: 10px;
}

.blue .icon { color: #0d6efd; }
.green .icon { color: #198754; }
.orange .icon { color: #fd7e14; }

.card-box h2 {
    font-weight: bold;
    margin-top: 10px;
}

a.card-link {
    text-decoration: none;
    color: inherit;
}

.cards-container {
    margin-top: 100px;
}

.footer {
    margin-left: 240px;
    text-align: center;
    padding: 15px;
    color: white;
    background: #222;
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 240px;
    width: calc(100% - 240px);
    height: 100%;
    background-image: url("imagenes/fondo6.jpg");
    background-size: cover;
    background-position: center;
    z-index: -1;
}

</style>
</head>

<body>

<?php include("sidebar.php"); ?>

<div class="content">

    <div class="header">
        <img src="imagenes/logo.png" class="logo">
        <h2 class="titulo">Bienvenido Usuario</h2>
        <p class="subtitulo">Panel del sistema escolar</p>
    </div>

    <div class="row justify-content-center g-4 cards-container">

        <div class="col-md-3 col-sm-6">
            <a href="alumnos_usuario.php" class="card-link">
                <div class="card-box green">
                    <div class="icon"><i class="fas fa-user-graduate"></i></div>
                    <h5>Alumnos</h5>
                </div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6">
            <a href="docentes_usuario.php" class="card-link">
                <div class="card-box orange">
                    <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h5>Docentes</h5>
                </div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6">
            <a href="grafico_notas_usuario.php" class="card-link">
                <div class="card-box blue">
                    <div class="icon"><i class="fas fa-chart-bar"></i></div>
                    <h5>Gráficos</h5>
                </div>
            </a>
        </div>

    </div>

</div>

<div class="footer">
    Sistema Escolar © <?php echo date("Y"); ?> - Todos los derechos reservados
</div>

</body>
</html>