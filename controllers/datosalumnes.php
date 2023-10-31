<?php
$_SESSION['dactual']="Desktop/Datos";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mis Asignaturas y Calificaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <h4><?= $_SESSION['dactual']; ?></h4>
</head>
<body>
    <h1>Mis Asignaturas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Asignatura</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'src/db.php';
            try {
                //conexion base de datos
                $conexion = conectarBaseDeDatos();
                //se realiza una consulta SQL
                $asignaturas_query = $conexion->query("SELECT nombre FROM asignaturas");
                //realiza una consulta a la base de datos y obtiene un array con valores específicos de una columna
                $asignaturas = $asignaturas_query->fetchAll(PDO::FETCH_COLUMN, 0);
                //se hace un bucle para sacar todos los datos y recorrer toda la array
                foreach ($asignaturas as $asignatura) {
                    echo "<tr><td>$asignatura</td></tr>";
                }
                //lanzamos una exception en caso de fallo
            } catch (PDOException $e) {
                echo "Error de conexión a la base de datos: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>

    <h1>Mis Calificaciones</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                //se realiza una consulta SQL
                $calificaciones_query = $conexion->query("SELECT asignatura, nota FROM calificaciones");
                //realiza una consulta a la base de datos y obtiene un array asociativo con todas las filas de resultados
                $calificaciones = $calificaciones_query->fetchAll(PDO::FETCH_ASSOC);
                //se hace un bucle para sacar todos los datos y recorrer toda la array
                foreach ($calificaciones as $calificacion) {
                    echo "<tr><td>{$calificacion['asignatura']}</td><td>{$calificacion['nota']}</td></tr>";
                }
                //lanzamos una excepcion en caso de que salga algun fallo
            } catch (PDOException $e) {
                echo "Error de conexión a la base de datos: " . $e->getMessage();
            }

            // Cerrar la conexión a la base de datos
            $conn = null;
            ?>
        </tbody>
    </table>
</body>
</html>
