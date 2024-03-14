<?php
if($_SERVER['REQUEST_URI'] === '/app-integracion/app/controllers/dashboard/event_connection_platform.php'){
    require_once '../../config.php';
}else{
    require_once '../app/config.php';
}

$sql = "SELECT status FROM platform_status ";
    
$stmt = $pdo->query($sql);
$stmt->execute();
// Obtener los resultados de la consulta
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

$datos_json = json_encode($resultado);
echo $datos_json;

