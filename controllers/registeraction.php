<?php

require 'src/db.php';
//exprotas todos los datos del formulario de register
$nombre= $_POST['name'];
$email = $_POST['email'];
$dni = $_POST['dni'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$usertype= $_POST['usertype'];
//comprobamos si el usertype es alumno o professor
if($usertype === "alumnes"){
try{
    //conexion a la base de datos
    $conexion = conectarBaseDeDatos();
    //Establece el modo de manejo de errores para una conexión PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //aqui hacemos una sentencia sql de insert
    $sql = "INSERT INTO alumnes (dni, nombre, email, password,phone) VALUES (:dni, :nombre, :email, :password, :phone)";
    //Realiza la preparación de una consulta SQL en una instancia de conexión PDO
    $stmt = $conexion->prepare($sql);
    //asigna un valor a un marcador de posición en una consulta SQL preparada utilizando PDO (
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
    //Se utiliza para ejecutar una consulta SQL
    $stmt->execute();
        //te dice si a tenido exito
        echo "Registro exitoso. El alumno $nombre $apellido ha sido registrado.";
        //te redirige a una desktop en 10 segundos
        header("refresh:10;?url=desktopalumne");
        //salta una excepcion en caso de fallo
}catch (PDOException $e) {
    echo "Error de conexión o registro: " . $e->getMessage();
}
}
if($usertype === "professors"){
    try{
        $conexion = conectarBaseDeDatos();
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "INSERT INTO professors (dni, nombre, correo, password,phone) VALUES (:dni, :nombre,:correo, :password, :phone)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
        $stmt->execute();
            
            echo "Registro exitoso. El professor $nombre ha sido registrado.";
            header("refresh:10;?url=desktopprofessors");
    }catch (PDOException $e) {
        echo "Error de conexión o registro: " . $e->getMessage();
    }
}

