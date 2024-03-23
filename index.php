<?php 
    require_once './app/config.php';
    require_once './guards/validationLogin.php';
    redigirLoginUser();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/login/css/style.css">
    <link rel="stylesheet" href="./assets/main.css">

    <title>App-Integracion</title>
</head>
<body>
    <?php
        include './views/login/login.php'
    ?>
</body>
</html>