<?php
require_once '../../app/config.php'
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register/css/style.css">
    <title>Registro Integración</title>
</head>
<body>
    <form action="../../app/controllers/login/register.php" class="form" method="POST">
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<div class="message error">' .  $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']);
    }
    ?>
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
                <label for="tipe_id" class="form__label"></label>
                <select id="tipe_id" name="tipe_id" class="form__input">
                    <option value="cc">Cédula de Ciudadanía</option>
                    <option value="ti">Tarjeta de Identidad</option>
                    <option value="ce">Cedula de Extranjería</option>
                    <option value="pep">PEP</option>
                    <option value="ppt">Permiso por Protección Temporal</option>
                </select>
                <span class="form__line"></span>
            </div>
            <div class="form__group">
                <input type="text" id="num_id" name="num_id" class="form__input" placeholder="" pattern="[0-9]+" minlength="7" maxlength="15" title="Ingrese solo números" required>
                <label for="num_id" class="form__label">Número de Identificación:</label>
                <span class="form__line"></span>
            </div>
            <div class="form__group">
                <label for="role" class="form__label"></label>
                <select id="role" name="role" class="form__input">
                    <option value="admin">Administrador</option>
                    <option value="reader">Lector</option>
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
                <input type="password" id="verify-password" name="verificar_password" value="" class="form__input" placeholder="" required>
                
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