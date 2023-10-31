<?php
$_SESSION['dactual']="Desktop/Dashboard/";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Profesores y Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <h4><?= $_SESSION['dactual']; ?></h4>
</head>
<body>
    <h1>Profesores</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especialidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'src/db.php';

            try {
                //conexion a la base de datos
                $conexion = conectarBaseDeDatos();
                //se realiza una consulta SQL
                $professors_query = $conexion->query("SELECT id,nombre,especialidad FROM professors");
                //se ejecuta la consulta y se recuperan todas las filas del resultado como un array asociativo
                $professors = $professors_query->fetchAll(PDO::FETCH_ASSOC);
                //se hace un bucle para sacar todos los datos y recorrer toda la array
                foreach ($professors as $professor) {
                    echo "<tr><td>{$professor['id']}</td><td>{$professor['nombre']}</td><td>{$professor['especialidad']}</td></tr>";
                }
                //lanzamos una excepcion en caso de fallo
            } catch (PDOException $e) {
                echo "Error de conexión a la base de datos: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</body>
</html>
