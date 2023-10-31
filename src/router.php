<?php
require 'src/routes.php';

function getRoute(array $routes) {
    // Verifica si se proporciona una url
    if (isset($_REQUEST['url'])) {
        $url = $_REQUEST['url'];
        // Comprueba si la URL proporcionada se encuentra en el array de rutas permitidas.
        if (in_array($url, $routes)) {
            return $url;
        } else {
            // Lanza una excepción si la URL no se encuentra en las rutas permitidas.
            throw new Exception("Route not found");
        }
    }
    // Devuelve null si no se proporciona una URL o si la URL no se encuentra en el array.
    return null;
}




?>