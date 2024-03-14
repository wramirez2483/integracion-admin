<?php
    require_once '../app/controllers/users/list_users.php';
    // require_once '../app/controllers/users/create_users.php';
?>

<div class="container__box">
    <div class="content-users">
        <div class="other__pagination">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="amount_list">
                    <select name="amount" id="amount" onchange="this.form.submit()">
                        <option value="5" <?php if($records_per_page == 5) echo 'selected';?>>5</option>
                        <option value="10" <?php if($records_per_page == 10) echo 'selected';?>>10</option>
                        <option value="20" <?php if($records_per_page == 20) echo 'selected';?>>20</option>
                        <option value="40" <?php if($records_per_page == 40) echo 'selected';?>>40</option>
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
                $sql_search_users = "SELECT * FROM users WHERE $search_by LIKE :search_term";
                $stmt_search_users = $pdo->prepare($sql_search_users);
                
                // Bind the parameters
                $search_term = "%$search_term%";
                $stmt_search_users->bindParam(':search_term', $search_term, PDO::PARAM_STR);
                
                // Ejecutar la consulta
                $stmt_search_users->execute();
                $users = $stmt_search_users->fetchAll(PDO::FETCH_ASSOC);
            }
            ?>
            <!-- Barra de búsqueda -->
            <div class="other__pagination__search">
                <form method="post">
                    <select name="search_by" id="search_by">
                        <option value="name">Nombre</option>
                        <option value="email">Correo Electrónico</option>
                        <option value="role">Rol</option>
                        <option value="tipe_id">Tipo identificación</option>
                        <option value="num_id">Número identificación</option>
                    </select>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" />
                    </svg> -->
                    <input type="text" name="search_term" id="search_term" placeholder="Buscar usuario">
                    <button type="submit">Buscar</button>
                </form>
            </div>
        </div>

        <table class="table__list">
            <thead>
                <tr>
                    <!-- <th>Id</th> -->
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Tipo de documento</th>
                    <th>Numero Id</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) :  ?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td><?php echo $user['tipe_id']; ?></td>
                    <td><?php echo $user['num_id']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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