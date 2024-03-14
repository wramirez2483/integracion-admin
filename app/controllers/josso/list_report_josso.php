<?php 
//Inicializar variables
$records_per_page = 5;
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

if($_SERVER["REQUEST_METHOD"] == "POST"){
//Verificar si se ha enviado el formulario de cantidad de registros por página
    if(isset($_POST['amount'])) {
        $records_per_page = $_POST['amount'];
    }
}

//Obtener el numero total de reportes
$sql_total_events = "SELECT COUNT(*) AS total FROM reporte_josso";
$stmt_total_events = $pdo->query($sql_total_events);
$total_events = $stmt_total_events->fetchColumn();

//Calcular el numero total de páginas
$total_pages = ceil($total_events / $records_per_page);

//Obtener el numero de pagina actual
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

//Calcular el desplazamiento para la consulta
$offset = ($current_page - 1) * $records_per_page;

//Consulta SQL para obtener los eventos registrados con limit y offset
$sql_select_events = "SELECT id_subprocess, id_details_josso, name, total_events, date_event  FROM reporte_josso ORDER BY   id_subprocess ASC LIMIT :offset, :records_per_page";
$stmt_select_events = $pdo->prepare($sql_select_events);
$stmt_select_events->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt_select_events->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
$stmt_select_events->execute();
$events = $stmt_select_events->fetchAll(PDO::FETCH_ASSOC);
?>