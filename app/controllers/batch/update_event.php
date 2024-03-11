<?php
// Archivo: update_event.php

// Incluir el archivo de configuración de la base de datos
require_once '../../config.php';

// Verificar si se ha enviado el formulario de actualización del evento
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_event'])) {
    // Recuperar los datos del formulario
    $event_seed_code = $_POST['event_seed_code'];
    $modality = $_POST['modality'];
    $training = $_POST['training'];
    $seed_code = $_POST['seed_code'];
    $user_id = $_SESSION['document'];
    $events = "update";

    // Consulta para actualizar los datos del evento en la base de datos
    $sql_update_event = "UPDATE events_without_sync SET modality = :modality, training = :training, seed_code = :seed_code, user_id = :user_id, events = :events WHERE seed_code = :event_seed_code";
    $stmt_update_event = $pdo->prepare($sql_update_event);
    $stmt_update_event->bindParam(':event_seed_code', $event_seed_code);
    $stmt_update_event->bindParam(':modality', $modality);
    $stmt_update_event->bindParam(':training', $training);
    $stmt_update_event->bindParam(':seed_code', $seed_code);
    $stmt_update_event->bindParam(':user_id', $user_id);
    $stmt_update_event->bindParam(':events', $events);

    // Ejecutar la consulta de actualización
    if ($stmt_update_event->execute()) {
        // Redirigir a la página de eventos o mostrar un mensaje de éxito
        $_SESSION['success_message'] = 'El evento se actualizó correctamente';
        header('Location: ../../../views/batch.php');
        exit();
    } else {
        // Mostrar un mensaje de error si la actualización falla
        $_SESSION['error_message'] = 'Error al actualizar el evento';
        header('Location: edit_event.php?seed_code=' . $event_seed_code); // Redirigir de vuelta al formulario de edición con el código de semilla del evento
        exit();
    }
} else {
    // Si se intenta acceder a este script directamente sin enviar el formulario, redirigir a alguna página adecuada o mostrar un mensaje de error
    header('Location: ../../../views/batch.php');
    exit();
}
?>
