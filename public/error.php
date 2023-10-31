<?php
sesion_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body background-color="red">
    <h1><?= $_SESSION['error'];?></h1>
</body>
</html>