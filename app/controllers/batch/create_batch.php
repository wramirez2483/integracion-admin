<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['notifications'])) {
        require_once '../../config.php';

        $id_batch = $_POST['id_batch'];

        // $availabity = $_POST['availabity'];
        // $inavailabity = $_POST['inavailabity'];
        $execution_schedule = $_POST['execution_schedule'];
        $integration_availabity = isset($_POST['inavailabity']) ? 0 : 1;
        $notifications_target = $_POST['notifications_target'];
        
        // 'integration_availabity' = ':integration_availabity',
        // 'notifications_target' = ':notifications_target',
        // $sql = "UPDATE batch SET  'execution_schedule' = ':execution_schedule' WHERE 'id_batch' = ':id_batch'";
        $sql = "UPDATE batch SET integration_availabity = :integration_availabity , execution_schedule = :execution_schedule , notifications_target = :notifications_target WHERE id_batch = :id_batch";

        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':notifications_target', $notifications_target);
        $stmt->bindParam(':execution_schedule', $execution_schedule);
        $stmt->bindParam(':integration_availabity', $integration_availabity);
        $stmt->bindParam(':id_batch', $id_batch);

        echo "<br/>";
        var_dump($execution_schedule);
        var_dump($notifications_target);
        var_dump($id_batch);
        echo "<br/>";
        
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
