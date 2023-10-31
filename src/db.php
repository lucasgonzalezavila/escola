<?php
function conectarBaseDeDatos() {
    //los datos de la base de datos
    $host = "localhost";
    $usuario = "escola";
    $contrasena = "linuxlinux";
    $base_de_datos = "escola";
    
    try {
        //Crea una nueva instancia de conexión PDO
        $conexion = new PDO("mysql:host=$host;dbname=$base_de_datos", $usuario, $contrasena);
        //Se utiliza para configurar el modo de manejo de errores de una conexión PDO
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Se utiliza para configurar el modo predeterminado de obtención de resultados cuando se recuperan datos de consultas en una conexión PDO
        $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //retorne la conxion
        return $conexion;
        //en caso de error te salta una exception con el mensaje de error
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
    //en caso de que no de conxion te retorna un null
    $conexion = null;
}
?>
