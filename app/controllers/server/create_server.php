<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    require_once '../../config.php';
    var_dump($_POST);
    // Validar que existe una configuracion de josso anterior
    $sql_find = "SELECT * FROM email_server";
    $stmt_find = $pdo->query($sql_find);

    $email_server = $_POST['email_server'];
    $portocol = $_POST['portocol'];
    $port = $_POST['port'];
    $user = $_POST['user'];
    $password = $_POST['password'];

    // Cuando no hay una configuraccion se crea
    if ($stmt_find->rowCount() == 0) {
        
        if (empty($email_server) || empty($portocol) || empty($port) || empty($user) || empty($password)) {
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
   
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email_server', $email_server);
    $stmt->bindParam(':portocol', $portocol);
    $stmt->bindParam(':port', $port);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':user_id', $_SESSION['document']);

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
