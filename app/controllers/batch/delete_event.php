<?php
require_once '../../config.php';

if(isset($_GET['seed_code'])) {
    // Obtener el seed_code de la URL
    $seed_code = $_GET['seed_code'];
    $user_id  = $_SESSION['document'];
    $events = "delete";

    // Actualizar el estado del registro de 1 a 0
    $sql = "UPDATE events_without_sync SET status_event = 0, user_id = :user_id, events = :events WHERE seed_code = :seed_code";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['user_id' => $user_id, 'events' => $events, 'seed_code' => $seed_code])) {
        // Redirigir a la página principal o mostrar un mensaje de éxito
        $_SESSION['success_message'] = 'El evento se eliminó correctamente';
        header('Location: ../../../views/batch.php');
        exit();
    } else {
        // Mostrar un mensaje de error si la actualización falla
        $_SESSION['error_message'] = 'Error al eliminar el evento';
        header('Location: edit_event.php?seed_code=' . $seed_code); // Redirigir de vuelta al formulario de edición con el código de semilla del evento
        exit();
    }

} else {
    // Si no se proporciona seed_code, redirigir a alguna página de error o la página principal
    $_SESSION['error_message'] = 'No se proporcionó un código de semilla válido';
    header("Location: ../../../views/batch.php");
    exit();
}
