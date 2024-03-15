<?php
// Inicializar variables
$records_per_page = 10;
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
$sql_total_notes = "SELECT COUNT(*) AS total FROM note";
$stmt_total_notes = $pdo->query($sql_total_notes);
$total_notes = $stmt_total_notes->fetchColumn();

// Calcular el número total de páginas
$total_pages = ceil($total_notes / $records_per_page);

// Calcular el desplazamiento para la consulta SQL
$offset = ($current_page - 1) * $records_per_page;

// Consulta SQL para obtener los eventos registrados con limit y offset
$sql_select_notes = "SELECT id, url_web_service, user, password, sync_notes, default_letter
                      FROM note 
                      ORDER BY id ASC
                      LIMIT :offset, :records_per_page";
   
$stmt_select_notes = $pdo->prepare($sql_select_notes);
$stmt_select_notes->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt_select_notes->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
$stmt_select_notes -> execute();
$notes = $stmt_select_notes->fetchAll(PDO::FETCH_ASSOC);
?>