<?php
// Archivo: edit_event.php
// Incluir el archivo de configuración de la base de datos
require_once '../../app/config.php';
// Verificar si se proporcionó un código de semilla del evento en la URL
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['seed_code'])) {
    // Obtener el código de semilla del evento de la URL
    $event_seed_code = $_GET['seed_code'];

    // Consulta para obtener los datos del evento a editar
    $sql_get_event = "SELECT * FROM events_without_sync WHERE seed_code = :seed_code";
    $stmt_get_event = $pdo->prepare($sql_get_event);
    $stmt_get_event->bindParam(':seed_code', $event_seed_code);
    $stmt_get_event->execute();
    $event = $stmt_get_event->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró el evento
    if (!$event) {
        // Si no se encuentra el evento, mostrar un mensaje de error o redirigir
        exit("Evento no encontrado");
    }

    // Recuperar los datos del evento
    $modality = $event['modality'];
    $training = $event['training'];
    $seed_code = $event['seed_code'];
} else {
    // Si no se proporcionó un código de semilla del evento en la URL, mostrar un mensaje de error o redirigir
    exit("Código de semilla del evento no proporcionado");
}
?>
