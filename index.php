<?php

session_start();

require 'src/router.php';
require 'src/routes.php';

//control de ruta
try {
    // Obtiene la ruta deseada utilizando la función getRoute y el array $rutes.
    $controller = getRoute($rutes);
    //si el controller en nulo que lo rediriga a home
    if ($controller == null) {
        $controller = "home";
    }
    require 'controllers/' . $controller . '.php';
} catch (Exception $e) {
    //suelta una exception y lo guardamos todos en la session array error
    $_SESSION['error'] = $e->getMessage();
    require 'public/error.php';
}













?>