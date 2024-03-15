<?php
    require_once '../app/config.php';

    $sql = "SELECT * FROM api_connection";
    $stmt = $pdo->query($sql);
    $stmt->execute();
    
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    if($resultado){
        $id_api_connection  = $resultado['id_api_connection'];
        $api_connection_url = $resultado['api_connection_url'];
        $user = $resultado['user'];
        $password = $resultado['password'];
        
        
    }



