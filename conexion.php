<?php
// ------------------------------
// ARCHIVO DE CONEXION A MYSQL
// ------------------------------

// Servidor de base de datos (en XAMPP normalmente es localhost)
$servidor = "localhost";

// Usuario de MySQL
$usuario = "root";

// Contraseña (en XAMPP normalmente está vacía)
$password = "";

// Nombre de la base de datos
$bd = "sistema_escolarV5";

// Creamos la conexión usando mysqli_connect
$conexion = mysqli_connect($servidor,$usuario,$password,$bd);

// Verificamos si la conexión falló
if(!$conexion){
    echo "Error de conexión con la base de datos";
}
?>
