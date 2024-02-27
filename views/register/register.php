<?php
//include('../../app/config.php')
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Registro Integración</title>
</head>
<body>
    <form action="" class="form" method="POST">
        <h2 class="form__title">Registrar</h2>
        <p class="form__paragraph">Administración de integración</p>   
        <div class="form__container">
            <div class="form__group">
                <input type="email" id="email" name="email" class="form__input" placeholder="" required>
                <label for="email" class="form__label">Correo electrónico:</label>
                <span class="form__line"></span>
            </div>
            <div class="form__group">
                <input type="text" id="name" name="name" class="form__input" placeholder="" required>
                <label for="name" class="form__label">Nombre:</label>
                <span class="form__line"></span>
            </div>
            <div class="form__group">
                <label for="rol" class="form__label"></label>
                <select id="rol" name="rol" class="form__input">
                    <option value="administrador">Administrador</option>
                    <option value="lector">Lector</option>
                </select>
                <span class="form__line"></span>
            </div>
            <div class="form__group input-password">
                <input type="password" id="password" name="password" class="form__input" placeholder="" required>
                
                <label for="password" class="form__label">Contraseña:</label>
                <span class="form__line"></span>
                <div class="input-pwd">

                    <div class="eye">
                        <img class="icon_handle" id="icon-toggle" src="../../img/RiEyeLine.svg" onclick="handleEye()" alt="Toggle Password Visibility">
                    </div>
                </div>

            </div>
            <div class="form__group input-password">
                <input type="password" id="verify-password" name="verificar_password" class="form__input" placeholder="" required>
                
                <label for="password" class="form__label">Confirmar contraseña:</label>
                <span class="form__line"></span>
                <div class="input-pwd">

                    <div class="eye">
                        <img class="icon_handle" id="icon-toggle2" src="../../img/RiEyeLine.svg" onclick="handleEyeTwo()" alt="Toggle Password Visibility">
                    </div>
                </div>

            </div>
            <input type="submit" class="form__submit" value="Registrarse">
        </div>
    </form>
    <script src="../../helpers/scripts.js"></script>
</body>
</html>