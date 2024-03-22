<?php
require_once '../app/config_pg.php';

// Inicializar variables
$records_per_page_logs = 10;
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Si se envió el formulario de cantidad de registros por página
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['amount'])) {
    // Almacenar el valor seleccionado en una variable de sesión
    $_SESSION['records_per_page_logs'] = $_POST['amount'];
}

// Obtener la cantidad de registros por página almacenada en la variable de sesión
if (isset($_SESSION['records_per_page_logs'])) {
    $records_per_page_logs = $_SESSION['records_per_page_logs'];
}

// Obtener el número total de eventos registrados
$sql_total_notes = "SELECT COUNT(*) AS total FROM log_transac.log_transac";

$stmt_total_notes = $pdo->query($sql_total_notes);
$total_notes = $stmt_total_notes->fetchColumn();

// Calcular el número total de páginas
$total_pages = ceil($total_notes / $records_per_page_logs);

// Calcular el desplazamiento para la consulta SQL
$offset = ($current_page - 1) * $records_per_page_logs;

// Consulta SQL para obtener los eventos registrados con limit y offset
$sql_select_notes = "SELECT *
                     FROM log_transac.log_transac 
                     ORDER BY id ASC
                     OFFSET :offset ROWS
                     FETCH FIRST :records_per_page_logs ROWS ONLY";

    
$stmt_select_notes = $pdo->prepare($sql_select_notes);
$stmt_select_notes->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt_select_notes->bindParam(':records_per_page_logs', $records_per_page_logs, PDO::PARAM_INT);
$stmt_select_notes -> execute();

$list_logs = $stmt_select_notes->fetchAll(PDO::FETCH_ASSOC);

?>