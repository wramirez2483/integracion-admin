<?php

    require_once '../app/controllers/server/show_server.php';
    require_once '../app/controllers/server/create_server.php';
?>



<div class="container-form">

    <form class="content-form" method="post" action="../app/controllers/server/create_server.php">


            <input type="hidden" name="id_email_server" value="<?php echo isset($id_email_server) ? $id_email_server : ''; ?>">

            <?php
            if (isset($_SESSION['message-created'])) {
                echo '<div class="message success">  
                    <p>' . $_SESSION['message-created'] . '</p>
                    <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
                </div>';
                unset($_SESSION['message-created']);
            }

            if (isset($_SESSION['error-created'])) {
                echo '<div class="message error">  
                    <p>' . $_SESSION['error-created'] . '</p>
                    <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
                </div>';
        
                unset($_SESSION['error-created']);
            }

            ?>
        <div class="form-inputs">
            <h3>Servidor</h3>
            <input type="text" id="servidor" name="email_server" class="form__input" value="<?php echo isset($email_server) ? $email_server : ''  ?>" placeholder="" required>
        </div>
        <div class="form-inputs">
            <h3>Protocolo</h3>
            <input type="text" id="portocol" name="portocol" class="form__input" value="<?php echo isset($portocol) ? $portocol : ''  ?>" placeholder="" required>

        </div>
        <div class="form-inputs">
            <h3>Puerto</h3>

            <input type="number" id="port" name="port" class="form__input" value="<?php echo isset($port) ? $port : ''  ?>" placeholder="" required>

        </div>
        <div class="form-inputs">
            <h3>Usuario</h3>
            <input type="text" id="usuario" name="user" class="form__input" value="<?php echo isset($user) ? $user : ''  ?>" placeholder="" required>
           
        </div>
        <div class="form-inputs">
            <h3>Password</h3>
            <div class="password-input">

                <input type="password" id="password" name="password" class="form__input" value="<?php echo isset($password) ? $password : ''  ?>" placeholder="" required>
                
               
                <img class="icon_handle" id="icon-toggle" src="../img/RiEyeLine.svg" onclick="handleEyeGeneral('../img/')" alt="Toggle Password Visibility">
                    
            </div>
            

        </div>

        <div class="botons">

            <input type="submit" name="Guardar" value="Guardar">
        </div>
        
    </form>
    <script src="../helpers/scripts.js"></script>

</div>