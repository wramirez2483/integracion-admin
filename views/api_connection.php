<?php
    require_once '../app/config.php';
    require_once '../guards/validationLogin.php';
    validarLogin();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/api_connection/css/styles.css">    
    <link rel="stylesheet" href="../assets/main.css">
    <title>App-Integracion</title>
</head>
<body>

    
    <div class="container__home">
        
            <?php
                include '../layouts/menu.php'
            ?>
        <div class="content__home">
            <?php
                include '../layouts/header.php'
            ?>
  
            <?php   
                include './api_connection/api_connection.php'
            ?>
            
        </div>
     

    </div>
</body>
</html>