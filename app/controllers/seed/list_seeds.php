<?php
// Inicializar variables
$records_per_page = 5;
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario de cantidad de registros por página
    if (isset($_POST['amount'])) {
        $records_per_page = $_POST['amount'];
    }
}

// Obtener el número total de eventos registrados
$sql_total_seeds = "SELECT COUNT(*) AS total FROM seeds";
$stmt_total_seeds = $pdo->query($sql_total_seeds);
$total_seeds = $stmt_total_seeds->fetchColumn();

// Calcular el número total de páginas
$total_pages = ceil($total_seeds / $records_per_page);

// Obtener el número de página actual
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Calcular el desplazamiento para la consulta SQL
$offset = ($current_page - 1) * $records_per_page;

// Consulta SQL para obtener los eventos registrados con limit y offset
$sql_select_seeds = "SELECT id, code, modality FROM seeds WHERE status_seed = 1 ORDER BY id ASC LIMIT :offset, :records_per_page ";
$stmt_select_seeds = $pdo->prepare($sql_select_seeds);
$stmt_select_seeds->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt_select_seeds->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
$stmt_select_seeds->execute();
$seeds = $stmt_select_seeds->fetchAll(PDO::FETCH_ASSOC);
?>