<?php

require_once '../app/controllers/seed/list_seeds.php'

?>


<!-- Modal de añadir -->
<dialog class="modal_window close" id="window__create">
    <!-- Contenido del modal -->
    <div class="content__modal">
        <!-- Crear-->
        <h1>Crear Evento</h1>
        <div class="container__form-modal">


            <form action='../app/controllers/seed/create_seed.php' method='POST' class='content__form-modal'>
                
                <div class='input'>
                    <label for='code'>Código</label>
                    <input type='text' name='code' id='code' placeholder='Código' required>
                </div>

                <div class="input">
                    <label for="modality">Modalidad</label>
                    <select name="modality" id="modality" required>
                        <option value="">Seleccione</option>
                        <option value="Titulada - Presencial">Titulada - Presencial</option>
                        <option value="Titulada - Virtual">Titulada - Virtual</option>
                        <option value="Complementaria - Presencial">Complementaria - Presencial</option>
                        <option value="Complementaria - Virtual">Complementaria - Virtual</option>
                    </select>
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
            <form action="../app/controllers/seed/update_seed.php" method="POST" class="content__form-modal">
                <input type="hidden" name="id" id="id" value="">

                <div class='input'>
                    <label for='code'>Código</label>
                    <input type='text' name='new_code' id='new_code' placeholder='Código' required>
                </div>
                
                <div class="input">
                    <label for="modality">Modalidad</label>
                    <select name="new_modality" id="new_modality" required>
                        <option value="">Seleccione</option>
                        <option value="Titulada - Presencial">Titulada - Presencial</option>
                        <option value="Titulada - Virtual">Titulada - Virtual</option>
                        <option value="Complementaria - Presencial">Complementaria - Presencial</option>
                        <option value="Complementaria - Virtual">Complementaria - Virtual</option>
                    </select>
                </div>

                <div class="content__form__botons">
                    <input type="submit" name="update_seed" value="Actualizar">
                    <div onclick="handleWindow('#windows-edit')" class="boton_cancelar">Cancelar</div>
                </div>
                
            </form>
        </div>
    </div>
</dialog>

<div class="container__box">
    <div class="container__seed">
        <!-- Mensajes -->
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

        <!-- Lista  -->
        <div class="seeds">

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
                                    <option value="10" <?php if ($records_per_page_seed == 10) echo 'selected'; ?>>10</option>
                                    <option value="20" <?php if ($records_per_page_seed == 20) echo 'selected'; ?>>20</option>
                                    <option value="30" <?php if ($records_per_page_seed == 30) echo 'selected'; ?>>30</option>
                                    <option value="40" <?php if ($records_per_page_seed == 40) echo 'selected'; ?>>40</option> 
                                </select>
                            </div>
                        </form>
                        
                        <?php
                        // Verificar si se ha enviado el formulario de búsqueda
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_term"])) {
                            // var_dump($_POST);
                            // Inicializar la variable de término de búsqueda y el campo de búsqueda
                            $search_term = $_POST["search_term"];
                            $search_by = $_POST["search_by"];

                            // Preparar la consulta SQL para buscar eventos
                            $sql_search_seeds = "SELECT * FROM seeds WHERE status_seed = 1 AND $search_by LIKE :search_term";
                            $stmt_search_seeds = $pdo->prepare($sql_search_seeds);

                            // Bind the parameters
                            $search_term = "%$search_term%";
                            $stmt_search_seeds->bindParam(':search_term', $search_term, PDO::PARAM_STR);

                            // Ejecutar la consulta
                            $stmt_search_seeds->execute();
                            $seeds = $stmt_search_seeds->fetchAll(PDO::FETCH_ASSOC);
                        }
                        ?>   
                       

                    </div>
                    <form method="post" class="other__pagination__form">
                        <select name="search_by" id="search_by">
                            <option value="seeds.id">id</option>
                            <option value="code">Código</option>
                            <option value="modality">Modalidad</option>
                        </select>
                        <!-- Icono de busqueda -->
                        <div class="content__search__input">
                            <div class="search__input">
                                <input type="text" name="search_term" id="search_term" placeholder="Buscar semilla">
                            </div>

                            <div class="acctions">

                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" />
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
                            <th>Id</th>
                            <th>Código</th>
                            <th>Modalidad</th>
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
                            <?php foreach ($seeds as $seed) : ?>
                                <tr>
                                    <td><?php echo $seed['id']; ?></td>
                                    <td><?php echo $seed['code']; ?></td>
                                    <td><?php echo $seed['modality']; ?></td>
    
                                    <?php
                                    if ($_SESSION['role'] == 'admin') {
                                        echo "
                                               
                                            <!-- Agrega los enlaces de editar y borrar según sea necesario -->
                                            <td class='edit__icon'>  
    
                                                <a onclick=\"handleEditSeed('" . $seed['id'] . "','" . $seed['code'] . "','" . $seed['modality'] . "')\">
                                                
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                                                        <path fill='#39a900' d='M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z' />
                                                    </svg>
                                                </a>
                                                <a onclick=\"handleDeleteSeed('" . $seed['id'] . "')\">
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
                    <a href="?page=1&amount=<?php echo $records_per_page_seed; ?>">&laquo;</a>
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <a href="?page=<?php echo $i; ?>&amount=<?php echo $records_per_page_seed; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                    <?php endfor; ?>
                    <a href="?page=<?php echo $total_pages; ?>&amount=<?php echo $records_per_page_seed; ?>">&raquo;</a>
                <?php endif; ?>
            </div> 
       
    </div>
</div>

<!-- Conectar el JavaScript -->
<script src="../helpers/scripts.js"></script>