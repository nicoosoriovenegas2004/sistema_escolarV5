<?php
session_start();
include("conexion.php");

if(isset($_POST['correo'])){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if($resultado->num_rows === 1){

        $usuario = $resultado->fetch_assoc();

        if(password_verify($password, $usuario['password'])){

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['usuario'] = $usuario['correo'];
            $_SESSION['role'] = $usuario['role']; 

            $_SESSION['foto'] = (!empty($usuario['foto'])) 
                ? $usuario['foto'] 
                : 'imagenes/user.png';

            if($usuario['role'] == 'administrador'){ 
                header("Location: dashboard.php");
            } else {
                header("Location: dashboard_usuario.php");
            }
            exit();

        } else {
            $error = "Contraseña incorrecta";
        }

    } else {
        $error = "Usuario no encontrado";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>
<link rel="icon" type="image/png" href="imagenes/logo.png">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

body {
    margin: 0;
    height: 100vh;
    background-image: url("imagenes/fondo6.jpg");
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', sans-serif;
}


.login-box {
    width: 600px;
    padding: 60px;
    border-radius: 20px;
    background: rgba(40, 40, 40, 0.95);
    box-shadow: 0px 15px 40px rgba(0,0,0,0.7);
    text-align: center;
}

.logo {
    width: 150px;
    margin-bottom: 15px;
}

h2 {
    color: #fff;
    margin-bottom: 35px;
    font-size: 28px;
}


.input-group-custom {
    display: flex;
    margin-bottom: 20px;
    transition: 0.3s;
}


.input-icon {
    width: 60px;
    background: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px 0 0 12px;
    color: #fff;
    font-size: 20px;
    transition: 0.3s;
}


.input-field {
    flex: 1;
    border: none;
    padding: 15px;
    border-radius: 0 12px 12px 0;
    outline: none;
    font-size: 16px;
}


.input-group-custom:focus-within {
    box-shadow: 0 0 10px #00b4d8;
    border-radius: 12px;
}

.input-group-custom:focus-within .input-icon {
    background: #00b4d8;
}


.btn-login {
    background: #00b4d8;
    color: white;
    border-radius: 12px;
    padding: 15px;
    font-weight: bold;
    font-size: 18px;
    transition: 0.3s;
}

.btn-login:hover {
    background: #0096c7;
}


.link {
    color: #ccc;
    font-size: 14px;
    margin-top: 15px;
    display: block;
}

.link:hover {
    color: #fff;
}

.alert {
    border-radius: 10px;
}

</style>

</head>

<body>

<div class="login-box">

<img src="imagenes/logo.png" class="logo">

<h2>Iniciar Sesión</h2>

<?php if(isset($error)){ ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php } ?>

<form method="POST">

<div class="input-group-custom">
    <div class="input-icon">
        <i class="fas fa-user"></i>
    </div>
    <input type="email" name="correo" class="input-field" placeholder="Correo" required>
</div>

<div class="input-group-custom">
    <div class="input-icon">
        <i class="fas fa-key"></i>
    </div>
    <input type="password" name="password" class="input-field" placeholder="Contraseña" required>
</div>

<button class="btn btn-login w-100">Ingresar</button>

<a href="recuperar.php" class="link">¿Olvidaste tu contraseña?</a>

</form>

</div>

</body>
</html>