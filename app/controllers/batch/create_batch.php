<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['notifications'])) {
        require_once '../../config.php';
        // archivo que contiene el registro antiguo del batch
        require_once '../../controllers/history/create_history.php';
        
        // busca si ya existen 
        $sql_find = "SELECT * FROM batch";
        $stmt_find = $pdo->query($sql_find);
        
        $resultado = $stmt_find->fetch(PDO::FETCH_ASSOC);

        if($resultado){
            $id_batch = $resultado['id_batch'];
            $integration_availabity = $resultado['integration_availabity'];
            $execution_schedule = $resultado['execution_schedule'];
            $notifications_target = $resultado['notifications_target'];
        }

        // recibir las variables del post

        $user_id  = $_SESSION['document'];
        $id_batch = $_POST['id_batch'];
        $new_execution_schedule = $_POST['execution_schedule'];
        $new_integration_availabity = isset($_POST['inavailabity']) ? 0 : 1;

        // si es igual a 0 es porque se va a crear por primera vez
        if ($stmt_find->rowCount() == 0){

            // verifica que los datos ingresados esten llenos
            if(empty($user_id)  || empty($new_execution_schedule) || empty($new_integration_availabity)){
                $_SESSION['error-created'] = 'Todos los campos son obligatorios';
                header('Location: ../../../views/inicio.php');
                exit;
            }
            // asigna el sql de crear
            $sql = "INSERT INTO batch (integration_availabity,execution_schedule,user_id) VALUES(:integration_availabity , :execution_schedule  , :user_id)";
            
        }
        
        // si ya existe se actualica (flujo normal);

        else{
            $sql = "UPDATE batch SET integration_availabity = :integration_availabity , execution_schedule = :execution_schedule  , user_id = :user_id WHERE id_batch = :id_batch";
        }
        
        // Si son diferentes es porque se actualizó

        if($new_integration_availabity != $integration_availabity ){
            
            $event = $new_integration_availabity == 1 ? 'Habilito' : 'Deshabilito' . " la disponibilidad de integración";
                
            createHistory($user_id, "Batch - ". $event . " la disponibilidad de integración",$integration_availabity,$new_integration_availabity,$pdo);
        }
        if($new_execution_schedule != $execution_schedule ){
            createHistory($user_id,'Batch - Modificó la hora de ejecución',$execution_schedule,$new_execution_schedule,$pdo);
        }


        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':execution_schedule', $new_execution_schedule);
        $stmt->bindParam(':integration_availabity', $new_integration_availabity);
        $stmt->bindParam(':user_id', $user_id);
        
        if ($stmt_find->rowCount() > 0) {
            $stmt->bindParam(':id_batch', $id_batch);            
        }

        if ($stmt->execute()) {
            $_SESSION['message-created'] = 'Configuración cambiada con exito.';
            // redirigir a la misma ubicacion
            header('Location: ../../../views/inicio.php');
            // var_dump($_POST);
        } else {
            // redirigir a la misma ubicacion
            $_SESSION['error-created'] = 'Error al cambiar la configuración.';
        }
    }
}