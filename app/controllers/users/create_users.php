<?php

$records_per_page = 5;
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    IF(isset($_POST['amount'])){
        $records_per_page = $_POST['amount'];
    }
}

$sql_total_users = "SELECT COUNT(*) AS total FROM users";
$stmt_total_users = $pdo->query($sql_total_users);
$total_users = $stmt_total_users->fetchColumn();

$total_pages = ceil($total_users / $records_per_page);

$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

$offset = ($current_page -1) * $records_per_page;

$sql_select_users = "SELECT id, name, email, role, tipe_id, num_id 
                      FROM users ORDER BY id ASC 
                      LIMIT :offset, :records_per_page";

$stmt_select_users = $pdo->prepare($sql_select_users);
$stmt_select_users->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt_select_users->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
$stmt_select_users->execute();
$users = $stmt_select_users->fetchAll(PDO::FETCH_ASSOC);
?>