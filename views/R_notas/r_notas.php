<?php
require_once '../app/controllers/reporte_nota/list_notas.php'
?>
<div class="container-report">
<div class="conten"></div>
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

            $sql_search_note = "SELECT * FROM note WHERE $search_by LIKE :search_term";
            $stmt_search_note = $pdo->prepare($sql_search_note);

            $search_term = "%$search_term%";
            $stmt_search_note->bindParam(':search_term', $search_term, PDO::PARAM_STR);

            $stmt_search_note->execute();
            $note = $stmt_search_note->fetchAll(PDO::FETCH_ASSOC);
        };
        ?>
        <div class="other__pagination_search">
            <form method="post">
                <select name="search_by" id="search_by">
                    <option value="name">Usuario</option>
                </select>
                    <input type="text" name="search_term" id="search_term" placeholder="Buscar Notas">
                    <button type="submit">Buscar</button>
            </form>
        </div>
    </div>
        <div class="list_audits">
            <table class="table__list">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Url Web Service</th>
                        <th>Usuario</th>
                        <th>Sincronizar Notas</th>
                        <th>Letra por Defecto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($notes as $note) :?>
                        <tr>
                            <td><?php echo $note['id'];?></td>
                            <td><?php echo $note['url_web_service'];?></td>
                            <td><?php echo $note['user'];?></td>
                            <td><?php echo $note['sync_notes'];?></td>
                            <td><?php echo $note['default_letter'];?></td>
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
 
<script src="../helpers/scripts.js"></script>
    