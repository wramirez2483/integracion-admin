<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    require_once '../../config.php';
    require_once '../../controllers/history/create_history.php';


    // Validar que existe una configuracion de josso anterior
    $sql_find = "SELECT * FROM email_server";
    $stmt_find = $pdo->query($sql_find);
    $resultado = $stmt_find->fetch(PDO::FETCH_ASSOC);

    if($resultado){
        $email_server = $resultado['email_server'];
        $portocol = $resultado['portocol'];
        $port = $resultado['port'];
        $user = $resultado['user'];
        $password = $resultado['password'];    
    }

    $user_id  = $_SESSION['document'];
    $new_email_server = $_POST['email_server'];
    $new_portocol = $_POST['portocol'];
    $new_port = $_POST['port'];
    $new_user = $_POST['user'];
    $new_password = $_POST['password'];

    // Cuando no hay una configuraccion se crea
    if ($stmt_find->rowCount() == 0) {
        
        if (empty($new_email_server) || empty($new_portocol) || empty($new_port) || empty($new_user) || empty($new_password)) {
            $_SESSION['error-created'] = 'Todos los campos son obligatorios';
            header('Location: ../../../views/servidor-email.php');
            exit; 
        }
        $sql = "INSERT INTO email_server (email_server , portocol , port , user , password, user_id) 
            VALUES (:email_server , :portocol , :port , :user, :password , :user_id)";
    }
    // Si ya existe se actualiza 
    else {

        $sql = "UPDATE email_server SET email_server = :email_server , portocol = :portocol , port = :port , user = :user  , password = :password , user_id = :user_id WHERE id_email_server = :id_email_server";
    }

    if($new_email_server != $email_server){
        createHistory($user_id,'ServerEmail - Modificó el servidor de correo',$email_server,$new_email_server,$pdo);
    }

    if($new_portocol != $portocol){
        createHistory($user_id,'ServerEmail - Modificó el protocolo',$portocol,$new_portocol,$pdo);
    }

    if($new_port != $port){
        createHistory($user_id,'ServerEmail - Modificó el puerto',$port,$new_port,$pdo);
    }

    if($new_user != $user){
        createHistory($user_id,'ServerEmail - Modificó el usuario',$user,$new_user,$pdo);
    }

    if($new_password != $password){
        createHistory($user_id,'ServerEmail - Modificó la contraseña',$password,$new_password,$pdo);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email_server', $new_email_server);
    $stmt->bindParam(':portocol', $new_portocol);
    $stmt->bindParam(':port', $new_port);
    $stmt->bindParam(':user', $new_user);
    $stmt->bindParam(':password', $new_password);
    $stmt->bindParam(':user_id', $user_id);

    if ($stmt_find->rowCount() > 0) {
        // Agregar vinculación de parámetro :id_josso
        $stmt->bindParam(':id_email_server', $_POST['id_email_server']);
    }

    if ($stmt->execute()) { 
        $_SESSION['message-created'] = 'Configuración cambiada con éxito.';
        header('Location: ../../../views/servidor-email.php');

    } else {
        $_SESSION['error-created'] = 'Error al cambiar la configuración.';
        header('Location: ../../../views/servidor-email.php');

    }

    header('Location: ../../../views/servidor-email.php');
    exit; // Importante para detener la ejecución después de redirigir
}
