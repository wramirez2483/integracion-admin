<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['notifications'])) {
        require_once '../../config.php';

        $user_id  = $_SESSION['document'];

        $id_batch = $_POST['id_batch'];

        $execution_schedule = $_POST['execution_schedule'];
        $integration_availabity = isset($_POST['inavailabity']) ? 0 : 1;
        $notifications_target = $_POST['notifications_target'];
        
        $sql = "UPDATE batch SET integration_availabity = :integration_availabity , execution_schedule = :execution_schedule , notifications_target = :notifications_target , user_id = :user_id WHERE id_batch = :id_batch";

        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':notifications_target', $notifications_target);
        $stmt->bindParam(':execution_schedule', $execution_schedule);
        $stmt->bindParam(':integration_availabity', $integration_availabity);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':id_batch', $id_batch);
        
        if ($stmt->execute()) {
            $_SESSION['message-created'] = 'Configuración cambiada con exito.';
            // redirigir a la misma ubicacion
            header('Location: ../../../views/inicio.php');
        } else {
            // redirigir a la misma ubicacion
            $_SESSION['error-created'] = 'Error al cambiar la configuración.';
        }
    }
}
