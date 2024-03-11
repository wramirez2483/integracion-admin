<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_notification_target'])) {
        
        require_once '../app/controllers/history/create_history.php';

        if(empty($_POST['notifications_target'])){
            $_SESSION['error-created'] = 'Todos los campos son obligatorios';
            header('Location: ../../../views/bath.php');
            exit;
        }

        $user_id  = $_SESSION['document'];
        $id_batch = $_POST['id_batch'];

        // si la lista esta vacia es porque no hay destintarios por lo tanto añade localmente y envia
        if(empty($_SESSION['notifications_target'])){

            array_push($_SESSION['notifications_target'] , $_POST['notifications_target']);
        

            $emails_serial = serialize($_SESSION['notifications_target']);

            $sql = "UPDATE batch SET notifications_target = :notifications_target WHERE id_batch = :id_batch";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(':notifications_target', $emails_serial);
            $consulta->bindParam(':id_batch', $id_batch);
            $consulta->execute();


        }
        // agrega cuando ya existen en la base de datoss
        else{
            // trae los correos de la base de datos
            $sql = "SELECT notifications_target FROM batch ";

            $stmt = $pdo->query($sql);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // almacena los correos de la db
            $lista_correos = unserialize($resultado['notifications_target']);
            
            // guarda la cantidad de correos anterios 
            $cantidad_correos = count($lista_correos);

            //agregar el correo a al lista
            $lista_correos[] = $_POST['notifications_target'];

            $emails_serial = serialize($lista_correos);

            $sql = "UPDATE batch SET notifications_target = :notifications_target WHERE id_batch = :id_batch";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(':id_batch', $id_batch);
            $consulta->bindParam(':notifications_target', $emails_serial);
            $consulta->execute();

            createHistory($user_id, "Batch - Agregó destinatario ", $cantidad_correos . " correos",   count($lista_correos) . " correos",$pdo);

        }

    }

