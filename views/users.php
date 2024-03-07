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

    <link rel="stylesheet" href="../layouts/css/styles_layouts.css">
    
    <link rel="stylesheet" href="../views/users/css/styles.css">

    <link rel="stylesheet" href="../views/batch/css/styles.css">

    <link rel="stylesheet" href="../assets/main.css">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>App-Integracion</title>
</head>
<body>

    
    <div class="container-home">
        
            <?php
                include '../layouts/menu.php'
            ?>
        <div class="content-home">
            
            <header>
                <h1>Usuarios</h1>
            </header>


                
            <?php   
                include './users/show_users.php'
            ?>
            
        </div>
     

    </div>
</body>
</html>