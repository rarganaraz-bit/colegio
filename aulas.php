<?php
include 'db.php';

// Insertar Aula
if (isset($_POST['guardar'])) {
    $num = $_POST['numero'];
    $cap = $_POST['capacidad'];
    $edi = $_POST['edificio'];
    $sql = "INSERT INTO aulas (numero, capacidad, edificio) VALUES ('$num', '$cap', '$edi')";
    mysqli_query($conexion, $sql);
}

// Borrado lógico
if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    mysqli_query($conexion, "UPDATE aulas SET borrado = 1 WHERE id = $id");
}

$resultado = mysqli_query($conexion, "SELECT * FROM aulas WHERE borrado = 0");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Aulas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" class="btn">⬅ Volver</a>
    <h1>Gestión de Aulas</h1>

    <form method="POST">
        <h3>Añadir Aula</h3>
        <input type="text" name="numero" placeholder="Número/Nombre Aula" required>
        <input type="number" name="capacidad" placeholder="Capacidad" required>
        <input type="text" name="edificio" placeholder="Edificio" required>
        <button type="submit" name="guardar" class="btn">Guardar Aula</button>
    </form>

    <br>
    <table>
        <thead>
            <tr>
                <th>Aula</th>
                <th>Capacidad</th>
                <th>Edificio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $row['numero']; ?></td>
                <td><?php echo $row['capacidad']; ?></td>
                <td><?php echo $row['edificio']; ?></td>
                <td>
                    <a href="aulas.php?borrar=<?php echo $row['id']; ?>" style="color: red;">Borrar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
