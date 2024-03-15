<?php

require_once '../app/controllers/api_connection/show_api_connection.php';
require_once '../app/controllers/api_connection/create_api_connection.php';
?>

<div class="container__form">

    <form class="content__form" method="post" action="../app/controllers/api_connection/create_api_connection.php">


        <input type="hidden" name="id_api_connection" value="<?php echo isset($id_api_connection) ? $id_api_connection : ''; ?>">

        <?php
        if (isset($_SESSION['message-created'])) {
            echo '<div class="message message--success">  
                    <p>' . $_SESSION['message-created'] . '</p>
                    <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
                </div>';
            unset($_SESSION['message-created']);
        }

        if (isset($_SESSION['error-created'])) {
            echo '<div class="message message--error">  
                    <p>' . $_SESSION['error-created'] . '</p>
                    <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
                </div>';

            unset($_SESSION['error-created']);
        }

        ?>
        <div class="form__inputs">
            <h3>URL de la conexión</h3>
            <input type="text" id="servidor" name="api_connection_url" class="form__input" value="<?php echo isset($api_connection_url) ? $api_connection_url : ''  ?>" placeholder="" required <?php echo $_SESSION['role'] == 'reader' ? 'disabled' : '' ?>>
        </div>
        <div class="form__inputs">
            <h3>Usuario</h3>
            <input type="text" id="usuario" name="user" class="form__input" value="<?php echo isset($user) ? $user : ''  ?>" placeholder="" required <?php echo $_SESSION['role'] == 'reader' ? 'disabled' : '' ?>>

        </div>
        <div class="form__inputs">
            <h3>Contraseña</h3>
            <div class="password-input">

                <input type="password" id="password" name="password" class="form__input" value="<?php echo isset($password) ? $password : ''  ?>" placeholder="" required <?php echo $_SESSION['role'] == 'reader' ? 'disabled' : '' ?>>
                <?php
      
                    if($_SESSION['role'] == 'admin'){
                        echo "
                        
                        <img class='icon_handle' id='icon-toggle' src='../img/RiEyeLine.svg' onclick=\"handleEyeGeneral('../img/','password')\" alt='Toggle Password Visibility'>

                        ";

                    }
                ?>


            </div>


        </div>

        <div class="content__form__botons">
            <?php

            if ($_SESSION['role'] == 'admin') {
                echo "
        
                <input type='submit' name='Guardar' value='Guardar'>

                ";
                }
            ?>

        </div>

    </form>
    <script src="../helpers/scripts.js"></script>

</div>