<?php

require_once '../app/controllers/batch/create_batch.php';
require_once '../app/controllers/batch/create_notification_target.php';
require_once '../app/controllers/batch/show_batch.php';
require_once '../app/controllers/batch/show_events.php';


?>
<!-- Modal -->
<dialog class="modal-window close" id="window-target">
    <!-- Boton de cerrar -->
    <div class="modal-cerrar" onclick="handleWindow('#window-target')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="#dc2626" d="M12 2c5.53 0 10 4.47 10 10s-4.47 10-10 10S2 17.53 2 12S6.47 2 12 2m3.59 5L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41z" />
        </svg>
    </div>
    <!-- Contenido del modal -->
    <div class="content-modal">

        <!-- Editar -->

    </div>


</dialog>

<div class="container-batch">

    <div class="content-batch">

        <form class="form-batch" method="post" >
            <!-- Mensajes batch -->
            <?php
            if (isset($_SESSION['message-created'])) {

                echo '<div class="message success">
                    <div></div>

                    <p>' . $_SESSION['message-created'] . '</p>
                    <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
                </div>';
                unset($_SESSION['message-created']);
            }
            if (isset($_SESSION['error-created'])) {
                echo '<div class="message error">  
                    <div></div>

                <p>' . $_SESSION['error-created'] . '</p>
                <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
              </div>';
                unset($_SESSION['error-created']);
            }
            ?>
            <input type="hidden" name="id_batch" value="<?php echo isset($id_batch) ?  $id_batch : ''; ?>">

            <!-- checkbox -->
            <div class="input">


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

                                ?> type="checkbox" name="availabity" id="si" onclick="handleCheckBox('si')">


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
                                ?> type="checkbox" name="inavailabity" id="no" onclick="handleCheckBox('no')">

                    </div>

                </div>



            </div>



            <!-- Hora de ejecucion -->
            <div class="input">
        
                <label for=""> Hora de ejecución </label>
                <input value="<?php echo isset($execution_schedule) ? $execution_schedule : ''; ?>" type="time" id="execution_schedule" name="execution_schedule" required />
        
        
            </div>
            <input type="submit" name="batch-submit" value="Guardar configuracion">
        </form>

        <div class="form-target">
    
    
            <div class="new-noti-target">
                <h3>Nuevo destinatarios</h3>
    
                <form class="input-new-target" method="post">
    
                    <input type="hidden" name="id_batch" value="<?php echo isset($id_batch) ?  $id_batch : ''; ?>">
    
                    <div class="content-new-target">
    
                        <!-- Input nuevo destinatario -->
                        <div class="new-target">
                            <input type="email" name="notifications_target" id="notifications_target" placeholder="Nuevo destinatario" required>
                        </div>
                        <!-- Boton de acciones -->
                        <div class="acctions">
    
                            <button type="submit" name="new_notification_target">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="#ffffff" d="M11 13H6q-.425 0-.712-.288T5 12q0-.425.288-.712T6 11h5V6q0-.425.288-.712T12 5q.425 0 .713.288T13 6v5h5q.425 0 .713.288T19 12q0 .425-.288.713T18 13h-5v5q0 .425-.288.713T12 19q-.425 0-.712-.288T11 18z" />
                                </svg>
                            </button>
    
                        </div>
                    </div>
    
                </form>
    
            </div>
            <div class="list-targets">
                <h3>Lista de destinatarios actuales</h3>
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
                                <input name='' type='text' value='" . $destinatario . "'>
                                <button onclick='borrar(this)' data-indice='" . $indice . "'>
                                    <a href='../app/controllers/batch/delete_notifications.php?indice=" . $indice . "'>X</a>
                                   
                                </button>
                            </div>
                        ";
                    }
                  
                }
                ?>
    
            </div>
        </div>
    </div>

    <hr>
    
    <!-- Mensajes -->
    <?php
    if (isset($_SESSION['success_message'])) {
        echo
        '<div class="message success">
                <div></div>
    
                <p>' . $_SESSION['success_message'] . '</p>
                <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
    
            </div>';
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message_events'])) {
        echo '<div class="message error">  
            
            <div></div>
            <p>' . $_SESSION['error_message_events'] . '</p>
    
                <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
            </div>';
        unset($_SESSION['error_message_events']);
    }
    ?>
    <!-- -- EVENTOS --  -->
    <!-- Registrar evento -->
    <div class="container-events">
        <form action="../app/controllers/batch/create_events.php" method="POST" class="register-events">
    
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
    
            <div class="input">
                <label for="seed_code">Código Semilla </label>
                <input type="text" name="seed_code" id="seed_code" placeholder="Semilla" required>
            </div>
    
            <input type="submit" name="events" value="Añadir">
        </form>
        
        <!-- Lista de eventos -->
        <div class="events-sync">
            <h1>Eventos por Sincronizar</h1>
    
            <!-- Paginacion cantidad -->
    
            <div class="other-pagination">
                <!-- Formulario para seleccionar la cantidad de eventos por página -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="amount-list">
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
                <!-- Barra de búsqueda -->
                <div class="search">
                    <form method="post">
                        <select name="search_by" id="search_by">
                            <option value="modality">Modalidad</option>
                            <option value="training">Entrenamiento</option>
                            <option value="seed_code">Código de Semilla</option>
                        </select>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" />
                            </svg> -->
                        <input type="text" name="search_term" id="search_term" placeholder="Buscar evento">
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </div>
    
            <!-- Tabla de eventos -->
            <div class="list-events">

                <table class="customTable">
                    <thead>
                        <tr>
                            <th>Modalidad</th>
                            <th>Entrenamiento</th>
                            <th>Código de Semilla</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event) : ?>
                            <tr>
                                <td><?php echo $event['modality']; ?></td>
                                <td><?php echo $event['training']; ?></td>
                                <td><?php echo $event['seed_code']; ?></td>
                                <!-- Agrega los enlaces de editar y borrar según sea necesario -->
                                <td class="edit-icon">
                                    <a href="./batch/edit_event.php?seed_code=<?php echo $event['seed_code']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="#39a900" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
                                        </svg>
                                    </a>
                                    <a href="../app/controllers/batch/delete_event.php?seed_code=<?php echo $event['seed_code']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path fill="#e11d48" fill-opacity=".25" d="m17.004 17.98l1.711-9.415c.117-.642.176-.963.013-1.049c-.162-.085-.394.145-.857.604l-.886.88L12 10L6.996 9l-.863-.865c-.465-.465-.697-.698-.86-.612c-.162.085-.104.408.014 1.054l1.71 9.402a.068.068 0 0 0 .018.036a7.05 7.05 0 0 0 9.97 0a.068.068 0 0 0 .019-.036" />
                                                <ellipse cx="12" cy="7" stroke="#e11d48" stroke-linecap="round" stroke-width="1.2" rx="7" ry="3" />
                                                <path stroke="#e11d48" stroke-linecap="round" stroke-width="1.2" d="m5 7l1.996 10.98a.068.068 0 0 0 .019.035v0a7.05 7.05 0 0 0 9.97 0v0a.068.068 0 0 0 .019-.036L19 7" />
                                            </g>
                                        </svg>
                                    </a>
                                </td>
        
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
            </div>
    
        </div>
    
        <!-- paginación -->
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


<script src="../helpers/scripts.js"></script>