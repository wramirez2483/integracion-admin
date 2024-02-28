<?php 
    require_once '../guards/validationLogin.php';
    autorizarVistaLogin();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layouts/css/styles_layouts.css">
    <!-- <link rel="stylesheet" href="./views/login/css/style.css"> -->
    <title>App-Integracion</title>
</head>
<body>
    <!-- <h1>Hola usuario</h1> -->
    <!-- <a href="app/controllers/login/logout.php"> Logout </a> -->
    <?php
        include '../layouts/menu.php'
    ?>
</body>
</html>