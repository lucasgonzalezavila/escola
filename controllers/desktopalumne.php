<?php
$_SESSION['dactual']="Desktop";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header>
        
        <h1>Bienvenido a Chatgptmain</h1>
        <h4><?= $_SESSION['dactual']; ?></h4>
    </header>
    
    <nav>
        <ul>
            <li><a href="?url=profilealumne">Perfil</a></li>
            <li><a href="?url=datosalumnes">Asignaturas y notas</a></li>
            <li><a href="?url=dashboardprofessors">Professores</a></li>

        </ul>
    </nav>
</body>
</html>
