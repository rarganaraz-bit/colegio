<?php
include 'db.php';

// Capturamos el ID que viene por la URL
$id = $_GET['id'];

// Si el usuario pulsa el botón de actualizar
if (isset($_POST['actualizar'])) {
    $nom = $_POST['nombre'];
    $mail = $_POST['email'];
    
    $sql = "UPDATE alumnos SET nombre='$nom', email='$mail' WHERE id=$id";
    mysqli_query($conexion, $sql);
    
    // Redirigir de vuelta a la lista de alumnos
    header("Location: alumnos.php");
}

// Consultar los datos actuales del alumno para que salgan en el formulario
$res = mysqli_query($conexion, "SELECT * FROM alumnos WHERE id=$id");
$alum = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Editar Alumno</title>
</head>
<body>
    <div style="max-width: 500px; margin: 50px auto;">
        <a href="alumnos.php" class="btn">⬅ Cancelar</a>
        <h1>Editar Datos del Alumno</h1>
        
        <form method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $alum['nombre']; ?>" required>
            <br><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $alum['email']; ?>" required>
            <br><br>
            <button type="submit" name="actualizar" class="btn">Actualizar Alumno</button>
        </form>
    </div>
</body>
</html>
