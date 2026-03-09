<?php
$host = "localhost";
$user = "root";
$pass = "2007";
$db   = "colegio";

$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
