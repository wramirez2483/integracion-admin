<?php
// Inicializar variables
$records_per_page_seed = 10;
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Si se envió el formulario de cantidad de registros por página
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['amount'])) {
    // Almacenar el valor seleccionado en una variable de sesión
    $_SESSION['records_per_page_seed'] = $_POST['amount']; // Cambiado el nombre de la variable de sesión
}

// Obtener la cantidad de registros por página almacenada en la variable de sesión
if (isset($_SESSION['records_per_page_seed'])) { // Cambiado el nombre de la variable de sesión
    $records_per_page_seed = $_SESSION['records_per_page_seed']; // Cambiado el nombre de la variable
}

// Obtener el número total de eventos registrados
$sql_total_seeds = "SELECT COUNT(*) AS total FROM seeds WHERE deletion_date IS NULL AND current_version = 1";
$stmt_total_seeds = $pdo->query($sql_total_seeds);
$total_seeds = $stmt_total_seeds->fetchColumn();

// Calcular el número total de páginas
$total_pages = ceil($total_seeds / $records_per_page_seed);

// Obtener el número de página actual
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Calcular el desplazamiento para la consulta SQL
$offset = ($current_page - 1) * $records_per_page_seed;

// Consulta SQL para obtener los eventos registrados con limit y offset
$sql_select_seeds = "SELECT *
                    FROM seeds 
                    WHERE deletion_date IS NULL
                    AND current_version = 1
                    ORDER BY id DESC 
                    LIMIT :offset, :records_per_page_seed ";
$stmt_select_seeds = $pdo->prepare($sql_select_seeds);
$stmt_select_seeds->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt_select_seeds->bindParam(':records_per_page_seed', $records_per_page_seed, PDO::PARAM_INT);
$stmt_select_seeds->execute();
$seeds = $stmt_select_seeds->fetchAll(PDO::FETCH_ASSOC);
?>