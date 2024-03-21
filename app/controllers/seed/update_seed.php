<?php

require_once '../../config.php';

// Verificar si se ha enviado el formulario de actualización de la semilla
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_seed'])) {
    // Recuperar los datos del formulario
    $seed_id = $_POST['id'];
    $modality = $_POST['new_modality'];
    $code = $_POST['new_code'];
    $event = "update";

    // Consulta para actualizar los datos de la semilla en la base de datos
    $sql_update_seed = "UPDATE seeds SET modality = :modality, code = :code, event = :event WHERE id = :seed_id";

    $stmt_update_seed = $pdo->prepare($sql_update_seed);

    $stmt_update_seed->bindParam(':seed_id', $seed_id);
    $stmt_update_seed->bindParam(':modality', $modality);
    $stmt_update_seed->bindParam(':code', $code);
    $stmt_update_seed->bindParam(':event', $event);

    // Ejecutar la consulta de actualización
    if ($stmt_update_seed->execute()) {
        // Redirigir a la página de eventos o mostrar un mensaje de éxito
        $_SESSION['success_message'] = 'La semilla se actualizó correctamente';
        header('Location: ../../../views/seed.php');
        exit();
    } else {
        // Mostrar un mensaje de error si la actualización falla
        $_SESSION['error_message'] = 'Error al actualizar la semilla';
        header('Location: edit_event.php?seed_code=' . $seed_id); // Redirigir de vuelta al formulario de edición con el código de semilla del evento
        exit();
    }
} else {
    // Si se intenta acceder a este script directamente sin enviar el formulario, redirigir a alguna página adecuada o mostrar un mensaje de error
    header('Location: ../../../views/seed.php');
    exit();
}



?>