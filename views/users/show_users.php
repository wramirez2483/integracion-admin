<?php
    require_once '../app/config.php';

    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);
?>

<div class="container-users">
    <div class="content-users">
        <table class="customTable">
            <thead>
                <tr>
                    <!-- <th>Id</th> -->
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Tipo de documento</th>
                    <th>Numero_Id</th>
                </tr>
            </thead>
            <tbody>
                <!-- <td><?php echo $row['id']; ?></td> -->
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['tipe_id']; ?></td>
                    <td><?php echo $row['num_id']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#" class="active">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>

    </div>
</div>