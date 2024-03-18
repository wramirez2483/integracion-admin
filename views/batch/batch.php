<?php

require_once '../app/controllers/batch/create_batch.php';
require_once '../app/controllers/batch/create_notification_target.php';
require_once '../app/controllers/batch/show_batch.php';
require_once '../app/controllers/batch/show_events.php';

?>

<!-- Modal de añadir -->
<dialog class="modal_window close" id="window__create">
    <!-- Contenido del modal -->
    <div class="content__modal">
        <!-- Crear-->
        <h1>Crear Evento</h1>
        <div class="container__form-modal">


            <form action='../app/controllers/batch/create_events.php' method='POST' class='content__form-modal'>

                <div class="input">
                    <label for="modality">Modalidad</label>
                    <select name="modality" id="modality" required>
                        <option value="">Seleccione</option>
                        <option value="A">A = Presencial</option>
                        <option value="V">V = Virtual</option>
                    </select>
                </div>

                <div class="input">
                    <label for="training">Entrenamiento</label>
                    <select name="training" id="training" required>
                        <option value="">Seleccione</option>
                        <option value="2">2</option>
                        <option value="6">6</option>
                    </select>
                </div>

                <div class='input'>
                    <label for='seed_code'>Código Semilla </label>
                    <input type='text' name='seed_code' id='seed_code' placeholder='Semilla' required>
                </div>


                <div class="content__form__botons">
                    <input type='submit' name='events' value='Añadir'>
                    <div onclick="handleWindow('#window__create')" class="boton_cancelar">Cancelar</div>
                </div>
            </form>

        </div>
    </div>
</dialog>

<!-- Modal eliminar -->
<dialog class="modal__window close" id="windows-delete">

    <!-- Contenido modal -->

    <div class="content__modal-delete">
        <h1>¿Estas seguro de eliminarlo?</h1>
        <div class="options-modal">
            <button>
                <a id="delete-option">Eliminar</a>
            </button>

            <div onclick="handleWindow('#windows-delete')" class="boton_cancelar">Cancelar</div>
        </div>
    </div>

</dialog>

<!-- Modal editar -->
<dialog class="modal__window close" id="windows-edit">

    <!-- Contenido del modal -->
    <div class="content__modal">
        <!-- Editar -->
        <h1>Editar Evento</h1>
        <div class="container__form-modal">
            <form action="../app/controllers/batch/update_event.php" method="POST" class="content__form-modal">
                <input type="hidden" name="new_event_seed_code" id="new_event_seed_code" value="">
                <div class="form__inputs">

                    <h3 for="modality">Modalidad</h3>
                    <select name="new_modality" id="new_modality" required>
                        <option value="A">A = Presencial</option>
                        <option value="V">V = Virtual</option>
                    </select>

                </div>
                <div class="form__inputs">

                    <h3 for="training">Entrenamiento</h3>
                    <select name="new_training" id="new_training" required>
                        <option value="2">2</option>
                        <option value="6">6</option>
                    </select>

                </div>
                <div class="form__inputs">
                    <h3 for="seed_code">Código Semilla</h3>
                    <input type="text" name="new_seed_code" id="new_seed_code" placeholder="Semilla" required>
                </div>
                <div class="content__form__botons">
                    <input type="submit" name="update_event" value="Actualizar">
                    <div onclick="handleWindow('#windows-edit')" class="boton_cancelar">Cancelar</div>
                </div>
            </form>
        </div>
    </div>
</dialog>

<!-- Contenedor principal del batch -->
<div class="container__box">

    <!-- Mensajes batch-->
    <?php
    if (isset($_SESSION['message-created'])) {

        echo '<div class="message message--success">
                    <div></div>

                    <p>' . $_SESSION['message-created'] . '</p>
                    <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
                </div>';
        unset($_SESSION['message-created']);
    }
    if (isset($_SESSION['error-created'])) {
        echo '<div class="message message--error">  
                    <div></div>

                <p>' . $_SESSION['error-created'] . '</p>
                <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
              </div>';
        unset($_SESSION['error-created']);
    }
    ?>

    <!-- Contenido del batch -->
    <div class="content__batch">

        <!-- Formulario para guardar la configuración del batch -->
        <form class="form__batch" method="post">
            <input type="hidden" name="id_batch" value="<?php echo isset($id_batch) ?  $id_batch : ''; ?>">

            <!-- Opciones configuración batch -->
            <div class="input form__batch_input">
                <label for=""> Integración Disponible </label>
                <div class="checkboxes">

                    <div class="check">

                        <p>Si</p>
                        <input <?php echo
                                isset($integration_availabity)
                                    ? (
                                        $integration_availabity === 1
                                        ? 'checked'
                                        : ''
                                    )
                                    : ''

                                ?> type="checkbox" name="availabity" id="si" onclick="handleCheckBox('si')" <?php echo $_SESSION['role'] == 'reader' ? 'disabled' : '' ?>>


                    </div>

                    <div class="check">
                        <p>No</p>
                        <input <?php echo
                                isset($integration_availabity)
                                    ? (
                                        $integration_availabity === 0
                                        ? 'checked'
                                        : ''
                                    )
                                    : ''
                                ?> type="checkbox" name="inavailabity" id="no" onclick="handleCheckBox('no')" <?php echo $_SESSION['role'] == 'reader' ? 'disabled' : '' ?>>

                    </div>

                </div>
            </div>

            <!-- Hora de ejecucion -->
            <div class="input">

                <label for=""> Hora de ejecución </label>
                <input value="<?php echo isset($execution_schedule) ? $execution_schedule : ''; ?>" type="time" id="execution_schedule" name="execution_schedule" required <?php echo $_SESSION['role'] == 'reader' ? 'disabled' : '' ?> />

            </div>
            <?php
            if ($_SESSION['role'] == 'admin') {
                echo "
                    <input type='submit' name='batch-submit' value='Guardar configuracion'>
                    ";
            }
            ?>

        </form>
        <!-- Contenedor para agregar nuevos destinatarios -->
        <div class="content__batch__form__target">

            <!-- Input para ingresar un nuevo destinatario -->
            <div class="new__noti__target">
                <?php
                if ($_SESSION['role'] == 'admin') {
                    echo "
                        <form class='input-new-target' method='post'>
        
                            <input type='hidden' name='id_batch' value=' " . (isset($id_batch) ?  $id_batch : '') . " '>
                            
                                <div class='content-new-target'>
        
                                    <!-- Input nuevo destinatario -->
                                    <div class='new-target'>
                                        <input type='email' name='notifications_target' id='notifications_target' placeholder='Nuevo destinatario' required >
                                    </div>
                                    <!-- Boton de acciones -->
                                    <div class='acctions'>
                                        
                                        <button type='submit' name='new_notification_target'>
                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                                                <path fill='#ffffff' d='M11 13H6q-.425 0-.712-.288T5 12q0-.425.288-.712T6 11h5V6q0-.425.288-.712T12 5q.425 0 .713.288T13 6v5h5q.425 0 .713.288T19 12q0 .425-.288.713T18 13h-5v5q0 .425-.288.713T12 19q-.425 0-.712-.288T11 18z' />
                                            </svg>
                                        </button>
            
                                    </div>
                                </div>
                            
        
                        </form>
                    ";
                }
                ?>

            </div>

            <!-- Contenedor para listar los destinatarios -->
            <div class="content__list__targets">
                <h3>Lista de destinatarios actuales</h3>

                <div class="list__targets">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_notification_target'])) {

                        if (empty($_POST['notifications_target'])) {
                            $_SESSION['error-created'] = 'No puedes enviar este campo vacio';
                            return;
                        }
                    }
                    if (!isset($_SESSION['notifications_target']) || count($_SESSION['notifications_target']) == 0) {
                        echo '<p> No hay destinatarios</p>';
                        echo '<p> Agrega uno </p>';
                    } else {

                        foreach ($_SESSION['notifications_target'] as $indice => $destinatario) {
                            echo "
                            <div class='targets'>
                                <input name='' type='text' value='" . $destinatario . "' disabled>
                                ";
                            if ($_SESSION['role'] == 'admin') {
                                echo "
                                        <button onclick='deleteLocalNotificationTarget(this)' data-indice='" . $indice . "'>
                                            <a href='../app/controllers/batch/delete_notifications.php?indice=" . $indice . "'>X</a>
                                        </button>
                                    ";
                            }
                            echo "
                                </div>
                            ";
                        }
                    }
                    ?>

                </div>

            </div>

        </div>
    </div>

    <!-- Mensajes para los eventos por sincronizar-->
    <?php
    if (isset($_SESSION['success_message'])) {
        echo
        '<div class="message message--success">
                <div></div>
    
                <p>' . $_SESSION['success_message'] . '</p>
                <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
    
            </div>';
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message_events'])) {
        echo '<div class="message message--error">  
            
            <div></div>
            <p>' . $_SESSION['error_message_events'] . '</p>
    
                <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
            </div>';
        unset($_SESSION['error_message_events']);
    }
    ?>
    <!-- 
        -----------------
        ---- EVENTOS ----
        -----------------
    -->

    <!-- Registrar evento -->
    <div class="container__events">

        <!-- Lista de eventos -->
        <div class="event__sync">
            <h1>Eventos por Sincronizar</h1>

            <!-- Paginacion cantidad -->
            <div class="other__pagination">

                <?php

                if ($_SESSION['role'] == 'admin') {
                    echo "
                    
                    <button onclick=\"handleWindow('#window__create')\"  type='submit'>Añadir</button>
                    ";
                }
                ?>

                <!-- Barra de búsqueda -->
                <div class="other__pagination__search">

                <div class="other__pagination__search__amount">
                        <!-- Formulario para seleccionar la cantidad de eventos por página -->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="other__pagination__amount__list">
                                <select name="amount" id="amount" onchange="this.form.submit()">
                                    <option value="5" <?php if ($records_per_page == 5) echo 'selected'; ?>>5</option>
                                    <option value="10" <?php if ($records_per_page == 10) echo 'selected'; ?>>10</option>
                                    <option value="20" <?php if ($records_per_page == 20) echo 'selected'; ?>>20</option>
                                    <option value="40" <?php if ($records_per_page == 40) echo 'selected'; ?>>40</option>
                                </select>
                            </div>
                        </form>

                        <?php
                        // Verificar si se ha enviado el formulario de búsqueda
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_term"])) {
                            // Inicializar la variable de término de búsqueda y el campo de búsqueda
                            $search_term = $_POST["search_term"];
                            $search_by = $_POST["search_by"];

                            // Preparar la consulta SQL para buscar eventos
                            $sql_search_events = "SELECT * FROM events_without_sync WHERE status_event = 1 AND $search_by   LIKE :search_term";
                            $stmt_search_events = $pdo->prepare($sql_search_events);

                            // Bind the parameters
                            $search_term = "%$search_term%";
                            $stmt_search_events->bindParam(':search_term', $search_term, PDO::PARAM_STR);

                            // Ejecutar la consulta
                            $stmt_search_events->execute();
                            $events = $stmt_search_events->fetchAll(PDO::FETCH_ASSOC);
                        }
                        ?>

                    </div>
                    <form method="post" class="other__pagination__form">
                        <select name="search_by" id="search_by">
                            <option value="modality">Modalidad</option>
                            <option value="training">Entrenamiento</option>
                            <option value="seed_code">Código de Semilla</option>
                        </select>
                        <!-- Icono de busqueda -->
                        <div class="content__search__input">
                            <div class="search__input">
                                <input type="text" name="search_term" id="search_term" placeholder="Buscar evento">
                            </div>

                            <div class="acctions">
                                
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path  d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" />
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </form>
                   
                </div>
            </div>

            <!-- Tabla de eventos -->
            <div class="list__events">

                <table class="table__list">
                    <thead>
                        <tr>
                            <th>Modalidad</th>
                            <th>Entrenamiento</th>
                            <th>Código de Semilla</th>
                            <?php
                            if ($_SESSION['role'] == 'admin') {
                                echo "
                                        <th>Acciones</th>
                                    
                                    ";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event) : ?>
                            <tr>
                                <td><?php echo $event['modality']; ?></td>
                                <td><?php echo $event['training']; ?></td>
                                <td><?php echo $event['seed_code']; ?></td>

                                <?php
                                if ($_SESSION['role'] == 'admin') {
                                    echo "
                                           

                                        <!-- Agrega los enlaces de editar y borrar según sea necesario -->
                                        <td class='edit__icon'>  

                                            <a onclick=\"handleEditEvent('" . $event['seed_code'] . "','" . $event['modality'] . "', '" . $event['training'] . "')\">
                                            
                                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                                                    <path fill='#39a900' d='M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z' />
                                                </svg>
                                            </a>
                                            <a onclick=\"handleDeleteEvent('" . $event['seed_code'] . "')\">
                                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                                                    <g fill='none'>
                                                        <path fill='#e11d48' fill-opacity='.25' d='m17.004 17.98l1.711-9.415c.117-.642.176-.963.013-1.049c-.162-.085-.394.145-.857.604l-.886.88L12 10L6.996 9l-.863-.865c-.465-.465-.697-.698-.86-.612c-.162.085-.104.408.014 1.054l1.71 9.402a.068.068 0 0 0 .018.036a7.05 7.05 0 0 0 9.97 0a.068.068 0 0 0 .019-.036' />
                                                        <ellipse cx='12' cy='7' stroke='#e11d48' stroke-linecap='round' stroke-width='1.2' rx='7' ry='3' />
                                                        <path stroke='#e11d48' stroke-linecap='round' stroke-width='1.2' d='m5 7l1.996 10.98a.068.068 0 0 0 .019.035v0a7.05 7.05 0 0 0 9.97 0v0a.068.068 0 0 0 .019-.036L19 7' />
                                                    </g>
                                                </svg>
                                            </a>
                                        </td>
                                        
                                        ";
                                }
                                ?>



                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>

        <!-- Paginación -->
        <div class="pagination">
            <?php if ($total_pages > 1) : ?>
                <a href="?page=1&amount=<?php echo $records_per_page; ?>">&laquo;</a>
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <a href="?page=<?php echo $i; ?>&amount=<?php echo $records_per_page; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
                <a href="?page=<?php echo $total_pages; ?>&amount=<?php echo $records_per_page; ?>">&raquo;</a>
            <?php endif; ?>
        </div>

    </div>
</div>

</div>

<!-- Conectar el JavaScript -->
<script src="../helpers/scripts.js"></script>