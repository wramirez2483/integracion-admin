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
    
    <link rel="stylesheet" href='./reportes_generales/css/styles.css'>

    <link rel="stylesheet" href="../assets/main.css"> 

    <link rel="stylesheet" href="./users/css/styles.css">


    <link rel="stylesheet" href="./batch/css/styles.css"> 

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
                <h1>Reportes</h1>
            </header>

                
            <?php   
                include './reportes_generales/reportes.php'
            ?>
            
        </div>
     

    </div>
</body>
</html>