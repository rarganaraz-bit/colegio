<?php
include 'db.php';

// Insertar
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    mysqli_query($conexion, "INSERT INTO alumnos (nombre, email) VALUES ('$nombre', '$email')");
}

// Borrado lógico
if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    mysqli_query($conexion, "UPDATE alumnos SET borrado = 1 WHERE id = $id");
}

$resultado = mysqli_query($conexion, "SELECT * FROM alumnos WHERE borrado = 0");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Alumnos</title>
</head>
<body>
    <a href="index.php" class="btn">⬅ Volver</a>
    <h1>Gestión de Alumnos</h1>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="guardar" class="btn">Añadir</button>
    </form>
    <br>
    <table>
        <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr>
        <?php while($row = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="editar_alumno.php?id=<?php echo $row['id']; ?>">Editar</a> | 
                <a href="alumnos.php?borrar=<?php echo $row['id']; ?>" style="color:red">Borrar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
