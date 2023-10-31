<?php
session_start(); // Asegúrate de haber iniciado la sesión

// Destruye la sesión
session_destroy();
setcookie("email", "", time() - 3600, "/");
setcookie("password", "", time() - 3600, "/");

// Redirige al usuario a la página de inicio de sesión u otra página de tu elección
header("Location:?url=home"); // Reemplaza "inicio_sesion.php" por la URL de tu página de inicio de sesión
exit();
?>
