<?php
include 'db.php';

for ($i = 1; $i <= 100; $i++) {
    $nombre = "Alumno Ejemplo " . $i;
    $email = "alumno" . $i . "@colegio.com";
    
    $sql = "INSERT INTO alumnos (nombre, email) VALUES ('$nombre', '$email')";
    mysqli_query($conexion, $sql);
}

echo "<h1>¡Éxito! Se han creado 100 alumnos de prueba.</h1>";
echo "<a href='alumnos.php' class='btn'>Ir a la lista</a>";
?>
