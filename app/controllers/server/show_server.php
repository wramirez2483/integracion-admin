<?php
    require_once '../app/config.php';

    $sql = "SELECT * FROM email_server";
    $stmt = $pdo->query($sql);
    $stmt->execute();
    
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    if($resultado){
        $id_email_server  = $resultado['id_email_server'];
        $email_server = $resultado['email_server'];
        $protocol = $resultado['protocol'];
        $port = $resultado['port'];
        $user = $resultado['user'];
        $password = $resultado['password'];
        
        
    }



