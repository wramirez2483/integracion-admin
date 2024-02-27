<?php
//include('../../app/config.php')
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Login Integración</title>
</head>
<body>
    <form action="" class="form" method="POST">
        <h2 class="form__title">Iniciar Sesión</h2>
        <p class="form__paragraph">Administración de integración</p>   
        <div class="form__container">
            <div class="form__group">
                <input type="email" id="email" class="form__input" placeholder="" required>
                <label for="email" class="form__label">Correo electrónico:</label>
                <span class="form__line"></span>
            </div>
            <div class="form__group">
                <input type="password" id="password" class="form__input" placeholder="" required>
                <label for="password" class="form__label">Contraseña:</label>
                <span class="form__line"></span>
            </div>
            <input type="submit" class="form__submit" value="Entrar">
        </div>
    </form>
</body>
</html>