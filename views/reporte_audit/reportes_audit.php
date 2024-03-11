<?php

require_once '../app/controllers/reporte_audit/list_audit.php'

?>

<div class="container-report">

    <div class="other-pagination">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="amount-list">
                <select name="amount" id="amount" onchange="this.form.submit()">
                    <option value="10" <?php if ($records_per_page == 5) echo 'selected'; ?>>10</option>
                    <option value="20" <?php if ($records_per_page == 20) echo 'selected'; ?>>20</option>
                    <option value="30" <?php if ($records_per_page == 30) echo 'selected'; ?>>30</option>
                    <option value="50" <?php if ($records_per_page == 50) echo 'selected'; ?>>50</option>
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
            $sql_search_events = "SELECT histories.id, user_id, users.name, event, previous_state, new_state, date FROM histories JOIN users ON user_id = users.num_id WHERE $search_by LIKE :search_term";
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
                    <option value="histories.id">Id</option>
                    <option value="user_id">Numero Documento</option>
                    <option value="name">Autor</option>
                    <option value="event">Evento</option>
                    <option value="previous_state">Estado Previo</option>
                    <option value="new_state">Nuevo Estado</option>
                    <option value="date">Fecha</option>
                </select>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" />
                </svg> -->
                <input type="text" name="search_term" id="search_term" placeholder="Buscar usuario">
                <button type="submit">Buscar</button>
            </form>
        </div>
    </div>

    <div class="list-audits">
        <table class="customTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Numero Documento</th>
                    <th>Autor</th>
                    <th>Evento</th>
                    <th>Estado Previo</th>
                    <th>Nuevo Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($events as $event) :
                ?>
                    <tr>
                        <td><?php echo $event['id']; ?></td>
                        <td><?php echo $event['user_id']; ?></td>
                        <td><?php echo $event['name']; ?></td>
                        <td><?php echo $event['event']; ?></td>
                        <td><?php echo $event['previous_state']; ?></td>
                        <td><?php echo $event['new_state']; ?></td>
                        <td><?php echo $event['date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <?php if ($total_pages > 1) : ?>
            <a href="?page=1&amount=<?php echo $records_per_page; ?>">&laquo;</a>
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <a href="?page=<?php echo $i; ?> &amount=<?php echo $records_per_page; ?>" <?php if ($i == $current_page) echo 'class="active"';  ?>><?php echo $i; ?></a>
            <?php endfor; ?>
            <a href="?page=<?php echo $total_pages; ?>&amount=<?php echo $records_per_page; ?>">&raquo;</a>
        <?php endif; ?>
    </div>
    
</div>