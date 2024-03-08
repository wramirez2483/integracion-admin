<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['notifications_target'])) {
        if(empty($_POST['notifications_target'])){
            $_SESSION['error-created'] = 'Todos los campos son obligatorios';
            header('Location: ../../../views/inicio.php');
            exit;
        }
        
        require_once '../../config.php';


        // Se asigna localmente
        var_dump( $_SESSION['notifications_target'] );
        // $_SESSION['notifications_target']  =  $_SESSION['notifications_target']  . ',' . $_POST['notifications_target'];
        array_push($_SESSION['notifications_target'],$_POST['notifications_target']);
        var_dump( $_SESSION['notifications_target'] );
    
        $user_id  = $_SESSION['document'];
        $id_batch = $_POST['id_batch'];

        // se guarda en la base de datos

        // Insertar notificación con destinatarios
        // se separan por coma
        $destinatarios_string = implode(",", $_SESSION['notifications_target']); 
        $sql = "UPDATE batch SET notifications_target = :notifications_target , user_id = :user_id WHERE id_batch = :id_batch";


        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':notifications_target', $destinatarios_string);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':id_batch', $id_batch);
        

        if($stmt->execute()){
            $_SESSION['message-created'] = 'Correo asignado con exito.';
            header('Location: ../../../views/inicio.php');
        }else{
            header('Location: ../../../views/inicio.php');

        }

    }


