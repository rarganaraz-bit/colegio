<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión del Colegio - Inicio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="max-width: 800px; margin: 50px auto; text-align: center;">
        <h1>SISTEMA DE GESTIÓN ESCOLAR</h1>
        <p>Bienvenido al panel de administración del colegio.</p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 30px;">
            <a href="alumnos.php" class="btn" style="padding: 30px; font-size: 1.2em;">Gestionar Alumnos</a>
            <a href="profesores.php" class="btn" style="padding: 30px; font-size: 1.2em;">Gestionar Profesores</a>
            <a href="aulas.php" class="btn" style="padding: 30px; font-size: 1.2em;">Gestionar Aulas</a>
            <a href="asignaturas.php" class="btn" style="padding: 30px; font-size: 1.2em;">Gestionar Asignaturas</a>
            <a href="horarios.php" class="btn" style="padding: 30px; font-size: 1.2em; grid-column: span 2; background-color: #ad1457;">Gestión de Clases y Horarios</a>
        </div>
    </div>
</body>
</html>
