<?php include_once 'partials/header.tpl.php';
$_SESSION['dactual']="Home/Register";
?>
<body>
    <h1><?=$title;?></h1>
    <h4><?= $_SESSION['dactual'];?></h4>
    <hr/>
    <form clas="form"action="?url=registeraction" method="POST">
        <input type="text" name="name" placeholder="Nombre" requiered>
        <input type="text" name="dni" placeholder="dni" required>
        <input type="email" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="number" name="phone" placeholder="phone" required>
        <input type="usertype" placeholder="PON QUE USUARIO ERES" name="usertype" required>
        <button type="submit">REGISTER</button>
    </form>
    <?php include_once 'partials/footer.tpl.php';?>
</body>
</html>