<?php
include("conexion.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['correo'])){

    $correo = $_POST['correo'];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0){

        $token = bin2hex(random_bytes(50));
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $sql = "UPDATE usuarios 
                SET token='$token', token_expira='$expira' 
                WHERE correo='$correo'";
        mysqli_query($conexion, $sql);

        $link = "http://localhost/sistema_escolarV2/restablecer.php?token=$token";

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nicoosoriovenegas2004@gmail.com';
            $mail->Password = 'gtam mkmu xcmc hpdq';  
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom('TUCORREO@gmail.com', 'Sistema Escolar');
            $mail->addAddress($correo);

            $mail->isHTML(true);
            $mail->Subject = 'Recuperar contraseña';
            $mail->Body = "
                <h3>Recuperación de contraseña</h3>
                <p>Haz clic en el siguiente enlace para cambiar tu contraseña:</p>
                <a href='$link'>Restablecer contraseña</a>
                <p>Este enlace expira en 1 hora.</p>
            ";

            $mail->send();
            $mensaje = "Revisa tu correo para continuar";

        } catch (Exception $e) {
            $mensaje = "Error al enviar correo: {$mail->ErrorInfo}";
        }

    } else {
        $mensaje = "El correo no existe";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Recuperar contraseña</title>

<link rel="icon" type="image/png" href="imagenes/logo.png">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    margin: 0;
    height: 100vh;
    background: linear-gradient(135deg, #0d1b2a, #1b263b, #415a77);
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', sans-serif;
}

.card {
    border: none;
    border-radius: 15px;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(10px);
}

h3 {
    color: #ffffff;
    font-weight: bold;
    text-align: center;
}

.form-control {
    border-radius: 10px;
    border: 1px solid #b9b9b9;
    transition: 0.3s;
}

.form-control:focus {
    border-color: #0ef1c0;
    box-shadow: 0 0 8px #00b4d8;
}

.btn-login {
    background: #00b4d8;
    color: white;
    border-radius: 10px;
    transition: 0.3s;
}

.btn-login:hover {
    background: #0ecf75e5;
}

a {
    color: #ffffff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.logo {
    display: block;
    margin: 0 auto 15px;
}

.alert {
    border-radius: 10px;
}
</style>

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card shadow">

<div class="card-body">

<img src="imagenes/logo.png" class="mb-3 d-block mx-auto" width="159" height="100">

<h3>Recuperar contraseña</h3>

<?php if(isset($mensaje)){ ?>
    <div class="alert alert-info text-center"><?php echo $mensaje; ?></div>
<?php } ?>

<form method="POST">

<input type="email" name="correo" class="form-control mb-3" placeholder="Ingresa tu correo" required>

<button type="submit" class="btn btn-login w-100">Enviar enlace</button>

<a href="login.php" class="btn btn-link w-100 mt-2">Volver al login</a>

</form>

</div>
</div>

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

</body>
</html>