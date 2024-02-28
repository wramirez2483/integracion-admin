
    <form action="/app-integracion/app/controllers/login/singin.php" class="form" method="POST">
        <?php
            if (isset($_SESSION['error_message'])  ) {
                echo '<div class="message">' .  $_SESSION['error_message']   . '</div>';
                unset($_SESSION['error_message']);
            }
            if (isset($_SESSION['error-authorized'])  ) {
                echo '<div class="message">' .  $_SESSION['error-authorized']   . '</div>';
                unset($_SESSION['error-authorized']);
            }

        ?> 
        <h2 class="form__title">Iniciar Sesión</h2>
        <p class="form__paragraph">Administración de integración</p>   
        <div class="form__container">
            
            <!-- Correo  -->
            <div class="form__group">
                <input type="email" id="email" name="email" class="form__input" placeholder="" required>
                <label for="email" class="form__label">Correo electrónico:</label>
                <span class="form__line"></span>
            </div>

            <!-- Contraseña  -->
            <div class="form__group input-password">
                <input type="password" id="password" name="password" class="form__input" placeholder="" required>
                
                <label for="password" class="form__label">Contraseña:</label>
                <span class="form__line"></span>
                <div class="input-pwd">

                    <div class="eye">
                        <img class="icon_handle" id="icon-toggle" src="./img/RiEyeLine.svg" onclick="handleEye()" alt="Toggle Password Visibility">
                    </div>
                </div>

            </div>

            <input type="submit" class="form__submit" value="Entrar">
        </div>
    </form>
    <script src="./helpers/scripts.js"></script>
