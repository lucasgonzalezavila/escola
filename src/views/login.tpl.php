<?php
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    // Si las cookies "email" y "password" existen, redirige al usuario a chatgptmain.php
    header('Location:?url=desktopalumne');
    exit();
}
$_SESSION['dactual']="Home/Login";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title><?= $title;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1><?= $title; ?></h1>
    <h4><?= $_SESSION['dactual']; ?></h4>
    <hr>
    <form action="?url=loginaction" method="POST">
        <input type="email" placeholder="PON TU CORREO" name="email" required>
        <input type="password" placeholder="PON TU CONTRASEÑA" name="password" required>
        <input type="usertype" placeholder="PON QUE USUARIO ERES" name="usertype" required>
        <label>
            <input type="checkbox" name="recordar" value=1> Recordeu-me en aquest equip</label>
        <button type="submit">LOG IN</button>
    </form>
</body>
</html>