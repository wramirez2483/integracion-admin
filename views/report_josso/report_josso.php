<?php 
require_once '../app/controllers/josso/list_report_josso.php'
?>
<div class="container__box">
    <div class="content-users">
        <div class="other__pagination">

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="other__pagination__amount__list">
                <select name="amount" id="amount" onchange="this.form.submit()">
                    <option value="5"<?php if($records_per_page == 5) echo 'selected';?>>5</option>
                    <option value="10"<?php if($records_per_page == 10) echo 'selected';?>>10</option>
                    <option value="20"<?php if($records_per_page == 20) echo 'selected';?>>20</option>
                    <option value="40"<?php if($records_per_page == 40) echo 'selected';?>>40</option>
                    </select>
             </div>
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_term"])){
            $search_term = $_POST["search_term"];
            $search_by = $_POST["search_by"];

            $sql_search_josso = "SELECT * FROM reporte_josso WHERE $search_by LIKE :search_term";
            $stmt_search_josso = $pdo->prepare($sql_search_josso);

            $search_term = "%$search_term%";
            $stmt_search_josso->bindParam(':search_term', $search_term, PDO::PARAM_STR);

            $stmt_search_josso->execute();
            $josso = $stmt_search_josso->fetchAll(PDO::FETCH_ASSOC);
        };
        ?>
                <div class="search">
                    <form method="post">
                        <select name="search_by" id="search_by">
                            <option value="name">Nombre</option>
                            <option value="total_events">Total Eventos</option>
                            <option value="date_event">Fecha Eventos</option>
                        </select>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" />
                            </svg> -->
                            <input type="text" name="search_term" id="search_term" placeholder="Buscar Reporte josso">
                            <button type="submit">Buscar</button>
                        </form>
                </div>
    
        </div>
        <div class="list_audits">
            <table class="table__list">
                <thead>
                    <tr>
                        <th>ID SUB</th>
                        <th>ID Detalles</th>
                        <th>Nombre</th>
                        <th>Total Eventos</th>
                        <th>Fecha Eventos</th>
                        <th>Ver Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $event) : ?>
                        <tr>
                            <td><?php echo $event['id_subprocess']; ?></td>
                            <td><?php echo $event['id_details_josso']; ?></td>
                            <td><?php echo $event['name']; ?></td>
                            <td><?php echo $event['total_events']; ?></td>
                            <td><?php echo $event['date_event']; ?></td>
                            <td><a href="#">Ver Detalle</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
                
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