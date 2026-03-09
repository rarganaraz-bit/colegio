<?php
$conexion = mysqli_connect("localhost", "root", "2007", "colegio");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
