<?php
    require_once '../app/config.php';

    $sql = "SELECT * FROM batch";
        
    $stmt = $pdo->query($sql);
    $stmt->execute();
    // Obtener los resultados de la consulta
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if($resultado){
        $id_batch = $resultado['id_batch'];
        $_SESSION['id_batch'] = $resultado['id_batch'];
        $integration_availabity = $resultado['integration_availabity'];
        $execution_schedule = $resultado['execution_schedule'];
        if(empty($resultado['notifications_target'])){
            $_SESSION['notifications_target'] = [];
            return;
        }else{
            $_SESSION['notifications_target'] = unserialize($resultado['notifications_target']);
  
        }

    }
