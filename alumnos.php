<?php
include 'db.php';

// Consultar los alumnos que no están borrados
$query = "SELECT * FROM alumnos WHERE borrado = 0 ORDER BY nombre ASC";
$res = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Alumnos</title>
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn">⬅ Volver</a>
        <h1>Listado de Alumnos</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="editar_alumno.php?id=<?php echo $row['id']; ?>" class="btn-edit">Editar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
