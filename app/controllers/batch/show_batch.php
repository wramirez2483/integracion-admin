<?php
    require_once '../app/config.php';

    $sql = "SELECT * FROM batch";
        
    $stmt = $pdo->query($sql);

    $stmt->execute();
    // Obtener los resultados de la consulta
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($resultado);
    // Asignar los valores obtenidos a las variables PHP
    $id_batch = $resultado['id_batch'];
    $integration_availabity = $resultado['integration_availabity'];
    $execution_schedule = $resultado['execution_schedule'];
    $notifications_target = $resultado['notifications_target']

?>