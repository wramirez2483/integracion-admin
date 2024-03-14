<?php
    require_once '../app/config.php';

    $sql = "SELECT * FROM note";
    $stmt = $pdo->query($sql);
    $stmt->execute();
    
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if($resultado){
        $id_note  = $resultado['id'];

        $url_web_service = $resultado['url_web_service'];

        $user = $resultado['user'];

        $password = $resultado['password'];
        $sync_notes = $resultado['sync_notes'];
        $default_letter = $resultado['default_letter'];

        
        
        
    }

