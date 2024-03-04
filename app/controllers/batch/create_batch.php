<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['notifications'])){

            $id_batch = $_POST['id_batch'];

            // $availabity = $_POST['availabity'];
            // $inavailabity = $_POST['inavailabity'];
            $execution_schedule = $_POST['execution_schedule'];
            $integration_availabity = isset($_POST['inavailabity']) ? $_POST['inavailabity'] : $_POST['availabity'];
            $notifications_target = $_POST['notifications_target'];

            var_dump($_POST);

            $sql = "UPDATE batch SET 'notifications_target' = ':notifications_target'  'integration_availabity' = ':integration_availabity'  'execution_schedule' = ':execution_schedule' WHERE 'id_batch' = ':id_batch'";
            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':notifications_target', $notifications_target);
            $stmt->bindParam(':execution_schedule', $execution_schedule);
            $stmt->bindParam(':integration_availabity', $integration_availabity);
            $stmt->bindParam(':id_batch', $id_batch);

  
            if( $stmt->execute()){
                $_SERVER['message-created'] = 'Configuración cambiada con exito.';
                // redirigir a la misma ubicacion
                // header('Location: ');
            }else{
                // redirigir a la misma ubicacion
                $_SERVER['error-created'] = 'Error al cambiar la configuración.';
            }

        }

    }