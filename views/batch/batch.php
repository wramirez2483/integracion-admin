<?php

require_once '../app/controllers/batch/create_batch.php';
require_once '../app/controllers/batch/show_batch.php';
require_once '../app/controllers/batch/show_events.php';


?>


<div class="container-batch">

    <div>
        <form class="form-batch" action="../app/controllers/batch/create_batch.php" method="post">
        <?php 
            if (isset($_SESSION['message-created'])  ) {
                echo '<div class="message success">' .  $_SESSION['message-created']   . '</div>';
                unset($_SESSION['message-created']);
            }
            if (isset($_SESSION['error-created'])  ) {
                echo '<div class="message error">' .  $_SESSION['error-created']   . '</div>';
                unset($_SESSION['error-created']);
            }
        ?>
            <input type="hidden" name="id_batch" value="<?php echo $id_batch; ?>">
            <div class="input">


                <label for=""> Integración Disponible </label>

                <div class="checkboxes">

                    <div class="check">

                        <p>Si</p>
                        <input  <?php echo ($integration_availabity === 1 ? 'checked' : ''); ?>  type="checkbox" name="availabity" id="si" onclick="handleCheckBox('si')">


                    </div>

                    <div class="check">
                        <p>No</p>
                        <input  <?php echo ($integration_availabity === 0 ? 'checked' : ''); ?>  type="checkbox" name="inavailabity" id="no" onclick="handleCheckBox('no')">

                    </div>

                </div>



            </div>

            <div class="input">

                <label for=""> Hora de ejecución </label>
                <input  value="<?php echo $execution_schedule; ?>" type="time" id="execution_schedule" name="execution_schedule" required />
                <!-- <input type="text" name="" id="" placeholder="En minutos"> -->

            </div>

            <div class="input">

                <label for=""> Destinatario de notificaciónes </label>
                <input value="<?php echo $notifications_target; ?>" type="email0" name="notifications_target" id="notifications_target" placeholder="@correo">

            </div>

            <div class="input">
                <input type="submit" name="notifications" value="Guardar">
            </div>

        </form>
    </div>
    <hr>

    <?php
    if (isset($_SESSION['success_message'])) {
        echo '<div class="message success">' .  $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message_events'])) {
        echo '<div class="message error">' .  $_SESSION['error_message_events'] . '</div>';
        unset($_SESSION['error_message_events']);
    }
    ?>

    <!-- Registrar evento -->
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

    <div class="events-sync">
        <h1>Eventos por Sincronizar</h1> 

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

            <!-- Barra de búsqueda -->
            <div class="search">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" />
                </svg>
                <input type="text" name="search" id="search" placeholder="Buscar evento">
            </div>
        </div>

        <!-- Tabla de eventos -->
        <table class="customTable">
            <thead>
                <tr>
                    <th>Modalidad</th>
                    <th>Entrenamiento</th>
                    <th>Codigo de Semilla</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event) : ?>
                    <tr>
                        <td><?php echo $event['modality']; ?></td>
                        <td><?php echo $event['training']; ?></td>
                        <td><?php echo $event['seed_code']; ?></td>
                        <!-- Agrega los enlaces de editar y borrar según sea necesario -->
                        <td><a href="#">Editar</a></td>
                        <td><a href="#">Borrar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Opciones de paginación -->
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
<script src="../helpers/scripts.js"></script>