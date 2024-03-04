<?php
    require_once '../app/config.php';

    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);
?>