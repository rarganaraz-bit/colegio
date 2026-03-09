<?php
include 'db.php';

// Lógica para asignar clase
if (isset($_POST['asignar'])) {
    $id_asig = $_POST['id_asignatura'];
    $id_prof = $_POST['id_profesor'];
    $dia     = $_POST['dia'];
    $hora    = $_POST['hora'];

    // 1. Buscar un aula que esté LIBRE a esa hora y día
    $sql_aula = "SELECT id FROM aulas 
                 WHERE borrado = 0 
                 AND id NOT IN (SELECT id_aula FROM clases WHERE dia_semana = '$dia' AND hora_inicio = '$hora')
                 LIMIT 1";
    
    $res_aula = mysqli_query($conexion, $sql_aula);
    $aula = mysqli_fetch_assoc($res_aula);

    if ($aula) {
        $id_aula = $aula['id'];
        // 2. Insertar la clase
        $sql = "INSERT INTO clases (id_asignatura, id_profesor, id_aula, dia_semana, hora_inicio) 
                VALUES ($id_asig, $id_prof, $id_aula, '$dia', '$hora')";
        mysqli_query($conexion, $sql);
        echo "<script>alert('Clase asignada en el aula ID: $id_aula');</script>";
    } else {
        echo "<script>alert('No hay aulas disponibles a esa hora');</script>";
    }
}

$query = "SELECT c.*, a.nombre as asig, p.nombre as prof, au.numero as aula 
          FROM clases c 
          JOIN asignaturas a ON c.id_asignatura = a.id
          JOIN profesores p ON c.id_profesor = p.id
          JOIN aulas au ON c.id_aula = au.id";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Horarios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" class="btn">⬅ Volver</a>
    <h1>Asignación de Clases</h1>

    <form method="POST">
        <select name="id_asignatura" required>
            <option value="">Selecciona Asignatura</option>
            <?php 
            $asigs = mysqli_query($conexion, "SELECT * FROM asignaturas WHERE borrado=0");
            while($a = mysqli_fetch_assoc($asigs)) echo "<option value='{$a['id']}'>{$a['nombre']}</option>";
            ?>
        </select>

        <select name="id_profesor" required>
            <option value="">Selecciona Profesor</option>
            <?php 
            $profs = mysqli_query($conexion, "SELECT * FROM profesores WHERE borrado=0");
            while($p = mysqli_fetch_assoc($profs)) echo "<option value='{$p['id']}'>{$p['nombre']}</option>";
            ?>
        </select>

        <select name="dia" required>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miércoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
        </select>

        <select name="hora" required>
            <?php for($i=8; $i<14; $i++) echo "<option value='$i:00:00'>$i:00</option>"; ?>
        </select>

        <button type="submit" name="asignar" class="btn">Asignar Clase Automáticamente</button>
    </form>

    <br>
    <table>
        <thead>
            <tr>
                <th>Día</th>
                <th>Hora</th>
                <th>Asignatura</th>
                <th>Profesor</th>
                <th>Aula</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $row['dia_semana']; ?></td>
                <td><?php echo $row['hora_inicio']; ?></td>
                <td><?php echo $row['asig']; ?></td>
                <td><?php echo $row['prof']; ?></td>
                <td><?php echo $row['aula']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
