<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Sistema Escolar</title>

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
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.card-login {
    background: rgba(0, 0, 0, 0.75);
    color: #fff;
    border-radius: 20px;
    padding: 60px 50px; 
    max-width: 600px; 
    width: 90%;
    text-align: center;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
}

.logo {
    display: block;
    margin: 0 auto 20px auto;
    width: 180px; 
}

.card-login h1 {
    font-weight: 800;
    margin-bottom: 15px;
    font-size: 36px;
}

.card-login p {
    color: #ddd;
    margin-bottom: 35px;
    font-size: 18px;
}

.btn-login {
    background: linear-gradient(90deg, #00b4d8, #0096c7);
    color: #fff;
    font-weight: bold;
    width: 100%;
    padding: 14px;
    border-radius: 12px;
    font-size: 18px;
    transition: 0.3s;
}

.btn-login:hover {
    background: linear-gradient(90deg, #0096c7, #0077b6);
}

</style>

</head>

<body>

<div class="card-login">

    <img src="imagenes/logo.png" class="logo">

    <h1>Sistema Escolar</h1>
    <p>Panel de Acceso</p>

    <a href="login.php" class="btn btn-login">Iniciar Sesión</a>

</div>

</body>
</html>