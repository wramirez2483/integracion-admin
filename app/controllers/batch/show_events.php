<?php
// Inicializar variables
$records_per_page = 5;
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Si se envió el formulario de cantidad de registros por página
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['amount'])) {
    // Almacenar el valor seleccionado en una variable de sesión
    $_SESSION['records_per_page'] = $_POST['amount'];
}

// Obtener la cantidad de registros por página almacenada en la variable de sesión
if (isset($_SESSION['records_per_page'])) {
    $records_per_page = $_SESSION['records_per_page'];
}

// Obtener el número total de eventos registrados
$sql_total_events = "SELECT COUNT(*) AS total FROM events_without_sync WHERE status_event = 1";
$stmt_total_events = $pdo->query($sql_total_events);
$total_events = $stmt_total_events->fetchColumn();

// Calcular el número total de páginas
$total_pages = ceil($total_events / $records_per_page);

// Calcular el desplazamiento para la consulta SQL
$offset = ($current_page - 1) * $records_per_page;

// Consulta SQL para obtener los eventos registrados con limit y offset
$sql_select_events = "SELECT modality, training, seed_code 
                      FROM events_without_sync 
                      WHERE status_event = 1 
                      ORDER BY date_created DESC 
                      LIMIT :offset, :records_per_page";
$stmt_select_events = $pdo->prepare($sql_select_events);
$stmt_select_events->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt_select_events->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
$stmt_select_events->execute();
$events = $stmt_select_events->fetchAll(PDO::FETCH_ASSOC);
?>