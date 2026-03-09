<?php
$host = "localhost";
$user = "root";
$pass = "2007"; // Tu contraseña de MySQL
$db   = "colegio";

$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
