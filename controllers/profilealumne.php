<?php
$_SESSION['dactual']="Home/Profile";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mi Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>Mi Perfil</h1>
    <h4><?= $_SESSION['dactual'];?></h4>
    
    <?php
    session_start(); // Asegúrate de haber iniciado la sesión en PHP
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        // Aquí puedes acceder a los datos del usuario almacenados en la variable de sesión
        echo "<p>Nombre: " . $usuario['nombre'] . "</p>";
        echo "<p>DNI: " . $usuario['dni'] . "</p>";
        echo "<p>Correo Electrónico: " . $usuario['email'] . "</p>";
        echo "<p>Phone: " . $usuario['phone'] . "</p>";
        // Puedes mostrar otros datos del perfil del usuario aquí
    } else {
        echo "Debes iniciar sesión para ver tu perfil.";
    }
    ?>

    <p><a href="?url=logout">Cerrar Sesión</a></p>
</body>
</html>
