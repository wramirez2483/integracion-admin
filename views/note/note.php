<?php

require_once '../app/controllers/note/show_note.php';
require_once '../app/controllers/note/create_note.php';

?>

<div class="container__box">
    <div class="container__config__notes">
        <form class="form__config__notes" method="post" action="../app/controllers/note/create_note.php">
    
            <input type="hidden" name="id_note" value="<?php echo isset($id_note) ? $id_note : ''; ?>">
            <div class="content__form__notes">
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
                <div class="content__forms">
                    <div class="form__inputs">
                        <h3>Url Webservice</h3>
                        <input type="text" id="url" name="url_web_service" class="form__input" value="<?php echo isset($url_web_service) ? $url_web_service : ''  ?>" placeholder="" required <?php echo $_SESSION['role'] == 'reader' ? 'disabled' : '' ?>>
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

                            if ($_SESSION['role'] == 'admin') {
                                echo "
                                
                                <img class='icon_handle' id='icon-toggle' src='../img/RiEyeLine.svg' onclick=\"handleEyeGeneral('../img/','password')\" alt='Toggle Password Visibility'>
        
                                ";
                            }
                            ?>

                        </div>

                    </div>

                </div>
            
            </div>
            <div class="content__form__notes">
                <div class="content__forms">
                    <h2>Cursos Autogestionables</h2>
                    <div class="content__forms__inputs">

                        <div class="form__inputs__notes">
                            <label for=""> Sincronizar nota sin actividad con letra defecto </label>
                            <div class="checkboxes">
    
                                <div class="check">
    
                                    <p>Si</p>
                                    <input <?php echo
                                            isset($sync_notes)
                                                ? (
                                                    $sync_notes === 1
                                                    ? 'checked'
                                                    : ''
                                                )
                                                : ''
    
                                            ?> type="checkbox" name="sync_notes" id="si" onclick="handleCheckBox('si')" <?php echo $_SESSION['role'] == 'reader' ? 'disabled' : '' ?>>
        
                                </div>
    
                                <div class="check">
                                    <p>No</p>
                                    <input <?php echo
                                            isset($sync_notes)
                                                ? (
                                                    $sync_notes === 0
                                                    ? 'checked'
                                                    : ''
                                                )
                                                : ''
                                            ?> type="checkbox" name="not_sync_notes" id="no" onclick="handleCheckBox('no')" <?php echo $_SESSION['role'] == 'reader' ? 'disabled' : '' ?>>
    
                                </div>
    
                            </div>
                        </div>

                        <div class="form__inputs__notes">

                            <label>Configurar letra por defecto</label>

                            <select required id="default_letter" name="default_letter" <?php echo $_SESSION['role'] == 'reader' ? 'disabled' : '' ?>>

                                <option value="A" <?php  echo ($default_letter == 'A' ? 'selected' : '') ?>>A</option>
                                <option value="D" <?php  echo ($default_letter == 'D' ? 'selected' : '') ?>>D</option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>
            <div class="content__form__botons">
                <div class="bottons__content">
                <?php

                if ($_SESSION['role'] == 'admin') {
                    echo "

                    <input type='submit' name='note_submit' value='Guardar'>

                ";
                }
                ?>

                </div>

            </div>

        </form>

    </div>
    <script src="../helpers/scripts.js"></script>

</div>