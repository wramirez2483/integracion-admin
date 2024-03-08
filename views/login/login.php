
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

            <!-- Documento  -->
            
            <div class="form__group">
                <input type="text" id="num_id" name="num_id" class="form__input" placeholder="" pattern="[0-9]+" title="Ingrese solo números" required>
                <label for="num_id" class="form__label">Número de Identificación:</label>
                <span class="form__line"></span>
            </div>

            <!-- Contraseña  -->
            <div class="form__group input-password">
                <input type="password" id="password" name="password" class="form__input" placeholder="" required>
                
                <label for="password" class="form__label">Contraseña:</label>
                <span class="form__line"></span>
                <div class="input-pwd">

                    <div class="eye">
                        <img class="icon_handle" id="icon-toggle" src="./img/RiEyeLine.svg" onclick="handleEyeGeneral('./img/')" alt="Toggle Password Visibility">
                    </div>
                </div>

            </div>

            <input type="submit" class="form__submit" value="Entrar">
        </div>
    </form>
    <script src="./helpers/scripts.js"></script>
