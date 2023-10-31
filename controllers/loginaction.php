<?php
session_start();
require 'src/db.php';
//comprobar que existes los datos
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST["usertype"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];
}
//creamos la variable autenticator
$autenticator= false;
//en caso de que sea usertype alumno hace todo lo del try
if($usertype === "alumnes"){
    try{
        //conexion base de atos
        $conexion = conectarBaseDeDatos();
        //Representa una consulta SQL parametrizada
        $sql = "SELECT * FROM alumnes WHERE email = :email";
        //Prepara una consulta SQL para ser ejecutada en PDO
        $stmt = $conexion->prepare($sql);
        //Se asigna un valor a la variable $email al marcador de posición :email en la consulta preparada
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        //La consulta preparada se ejecuta
        $stmt->execute();
        //Se recupera la fila de resultados de la consulta
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        //Se verifica si la consulta devolvió un resultado
        if ($resultado && password_verify($password, $resultado['password'])) {
            //si tenia resutaldo le damos la bienvenida al usuario
            echo "Acceso concedido. Bienvenido, " . $resultado['nombre'];
            //esta autentificado
            $autenticator= true;
            //si le hizo check al boton de recordar guardaremos los datos en una cookie
            if (isset($_POST['recordar']) && $_POST['recordar'] == 1) {
                setcookie("email", $email, time() + 3600, "/");
                setcookie("password", $password, time() + 3600, "/");
            }
            //creamos una session usuario y guardamos los datos
            $_SESSION['usuario']= $resultado;
            //y a los 10 segundos lo rederigimos al desktop
            header("refresh:10;?url=desktopalumne");
            exit;
            //en caso de no dar resultado pues te deniega el acceso
        } else {
            echo "Acceso denegado. Comprueba tu email y password.";
            $autenticator =false;
        }
    //en caso de cualquier error un exception
    }catch(Exception $e){
        echo "ERROR: " . $e->getMessage();
    }
}
if($usertype === "professors"){
    try{
        
        $conexion = conectarBaseDeDatos();
        $sql = "SELECT * FROM professors WHERE correo = :correo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':correo', $email, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado && password_verify($password, $resultado['password'])) {
            echo "Acceso concedido. Bienvenido, " . $resultado['correo'];
            $autenticator= true;
            if (isset($_POST['recordar']) && $_POST['recordar'] == 1) {
                setcookie("correo", $email, time() + 3600, "/");
                setcookie("password", $password, time() + 3600, "/");
            }
            $_SESSION['usuario']= $resultado;
            header("refresh:10;?url=desktopprofessors");
            exit;
        } else {
            echo "Acceso denegado. Comprueba tu email y password.";
            $autenticator =false;
        }
        
    }catch(Exception $e){
        echo "ERROR: " . $e->getMessage();
    }
}




