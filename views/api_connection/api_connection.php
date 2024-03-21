<?php
// require_once '../app/controllers/api_connection/create_api_connection.php';
require_once '../app/controllers/api_connection/show_api_connection.php';
require_once '../app/controllers/api_connection/list_logs_api.php';
?>
    <div class="container__box">

        <div class="container__form--logs">
    
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
    
        </div>
    
        <div class="container__logs">
    
            <!-- Lista de logs -->
            <div class="container__logs-lis-logs">
                <h1> Reporte de Transacciones API</h1>
    
                <!-- Paginacion cantidad -->
                <div class="other__pagination">
    
                    <!-- Barra de búsqueda -->
                    <div class="other__pagination__search">
    
                    <div class="other__pagination__search__amount">

                            <!-- Formulario para seleccionar la cantidad de eventos por página -->
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="other__pagination__amount__list">
                                    <select name="amount" id="amount" onchange="this.form.submit()">
                                        <option value="5" <?php if ($records_per_page_logs == 5) echo 'selected'; ?>>5</option>
                                        <option value="10" <?php if ($records_per_page_logs == 10) echo 'selected'; ?>>10</option>
                                        <option value="20" <?php if ($records_per_page_logs == 20) echo 'selected'; ?>>20</option>
                                        <option value="40" <?php if ($records_per_page_logs == 40) echo 'selected'; ?>>40</option>
                                    </select>
                                </div>
                            </form>
    
                            <?php
                            // Verificar si se ha enviado el formulario de búsqueda
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_term"])) {
                                
                                $search_by = $_POST["search_by"];
                                $search_term = $_POST["search_term"];
                                
                                // Preparar la consulta SQL
                                $sql_search_events = "SELECT * FROM log_transac.log_transac WHERE ";
                                
                                // Usar operador ternario para determinar el tipo de comparación
                                $sql_search_events .= ($search_by === 'http_response') ? "$search_by = :search_term" : "$search_by LIKE :search_term";
                                
                                // Añadir comodines para búsqueda LIKE si no es 'http_response'
                                $search_term = ($search_by !== 'http_response') ? "%$search_term%" : $search_term;
                                
                                $stmt_search_events = $pdo->prepare($sql_search_events);
                                
                                // Enlazar el parámetro de término de búsqueda
                                $stmt_search_events->bindParam(':search_term', $search_term, ($search_by !== 'http_response') ? PDO::PARAM_STR : PDO::PARAM_INT);
                                
                                // Ejecutar la consulta
                                $stmt_search_events->execute();
                                
                                // Obtener los resultados
                                $list_logs = $stmt_search_events->fetchAll(PDO::FETCH_ASSOC);
                            }
                            ?>
    
                        </div>
                        <form method="post" class="other__pagination__form">
                            <select name="search_by" id="search_by">
                                <option value="event">Evento</option>
                                <option value="endpoint">Endpoint</option>
                                <option value="http_response">Código de estado</option>
                                <!-- <option value="status">Estado</option> -->
                            </select>
                            <!-- Icono de busqueda -->
                            <div class="content__search__input">
                                <div class="search__input">
                                    <input type="text" name="search_term" id="search_term" placeholder="Buscar registro">
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
                <div class="list__logs">
    
                    <table class="table__list">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Evento</th>
                                <th>Fecha</th>
                                <th>Endpoint</th>
                                <th>Código de estado</th>
                                <th>Detalles</th>
                                <th>Estado</th>
    
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_logs as $log) : ?>
                                <tr>
                                    <td><?php echo $log['id']; ?></td>
                                    <td><?php echo $log['event']; ?></td>
                                    <td><?php echo $log['date']; ?></td>
                                    <td><?php echo $log['endpoint']; ?></td>
                                    <td><?php echo $log['http_response']; ?></td>
                                    <td><?php echo $log['details']; ?></td>
                                    <td><?php echo ($log['status'] == 1 ? '1' : '0'); ?></td>
    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
    
                </div>
    
            </div>
    
            <!-- Paginación -->
            <div class="pagination">
                <?php if ($total_pages > 1) : ?>
                    <a href="?page=1&amount=<?php echo $records_per_page_logs; ?>">&laquo;</a>
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <a href="?page=<?php echo $i; ?>&amount=<?php echo $records_per_page_logs; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                    <?php endfor; ?>
                    <a href="?page=<?php echo $total_pages; ?>&amount=<?php echo $records_per_page_logs; ?>">&raquo;</a>
                <?php endif; ?>
            </div>
    
        </div>
    </div>



    <script src="../helpers/scripts.js"></script>

