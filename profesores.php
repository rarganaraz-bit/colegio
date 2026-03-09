<?php
include 'db.php';

// Insertar Profesor
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $especialidad = $_POST['especialidad'];
    $sql = "INSERT INTO profesores (nombre, especialidad) VALUES ('$nombre', '$especialidad')";
    mysqli_query($conexion, $sql);
}

// Marcar como borrado
if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    $sql = "UPDATE profesores SET borrado = 1 WHERE id = $id";
    mysqli_query($conexion, $sql);
}

$query = "SELECT * FROM profesores WHERE borrado = 0";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Profesores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" class="btn">⬅ Volver</a>
    <h1>Gestión de Profesores</h1>

    <form method="POST">
        <h3>Añadir Profesor</h3>
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="text" name="especialidad" placeholder="Especialidad (Ej: Matemáticas)" required>
        <button type="submit" name="guardar" class="btn">Guardar Profesor</button>
    </form>

    <br>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['especialidad']; ?></td>
                <td>
                    <a href="profesores.php?borrar=<?php echo $row['id']; ?>" style="color: red;" onclick="return confirm('¿Borrar profesor?')">Borrar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
