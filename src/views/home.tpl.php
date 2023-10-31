<?php
include_once 'partials/header.tpl.php';
session_start();
$_SESSION['dactual']="Home/";

?>
<body>
    <h1><?= $title; ?></h1>
    <h4><?= $_SESSION['dactual']; ?></h4>
    <a href="?url=login">LOGIN</a>
    <a href="?url=register">REGISTER</a>
    <?php include_once 'partials/footer.tpl.php';?>
</body>
</html>