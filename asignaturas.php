<?php
include 'db.php';

// Insertar Asignatura
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $sql = "INSERT INTO asignaturas (nombre) VALUES ('$nombre')";
    mysqli_query($conexion, $sql);
}

// Borrado lógico
if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    mysqli_query($conexion, "UPDATE asignaturas SET borrado = 1 WHERE id = $id");
}

$resultado = mysqli_query($conexion, "SELECT * FROM asignaturas WHERE borrado = 0");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Asignaturas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" class="btn">⬅ Volver</a>
    <h1>Gestión de Asignaturas</h1>

    <form method="POST">
        <h3>Nueva Asignatura</h3>
        <input type="text" name="nombre" placeholder="Nombre de la asignatura" required>
        <button type="submit" name="guardar" class="btn">Guardar</button>
    </form>

    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td>
                    <a href="asignaturas.php?borrar=<?php echo $row['id']; ?>" style="color: red;">Borrar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
