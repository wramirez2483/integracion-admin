<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    require_once '../../config.php';
    require_once '../../controllers/history/create_history.php';

    // Validar que existe una configuracion de josso anterior
    $sql_find = "SELECT * FROM api_connection";
    $stmt_find = $pdo->query($sql_find);
    $resultado = $stmt_find->fetch(PDO::FETCH_ASSOC);

    if($resultado){
        $api_connection_url = $resultado['api_connection_url'];
        $user = $resultado['user'];
        $password = $resultado['password'];    
    }

    $user_id  = $_SESSION['document'];
    $new_api_connection_url = $_POST['api_connection_url'];
    $new_user = $_POST['user'];
    $new_password = $_POST['password'];

    // Cuando no hay una configuraccion se crea
    if ($stmt_find->rowCount() == 0) {
        
        if (empty($new_api_connection_url) || empty($new_user) || empty($new_password)) {
            $_SESSION['error-created'] = 'Todos los campos son obligatorios';
            header('Location: ../../../views/api_connection.php');
            exit; 
        }
        $sql = "INSERT INTO api_connection (api_connection_url , user, password) 
            VALUES (:new_api_connection_url , :user, :password)";
    }
    // Si ya existe se actualiza 
    else {

        $sql = "UPDATE api_connection SET api_connection_url = :new_api_connection_url, user = :user, password = :password WHERE id_api_connection = :id_api_connection";
    }

    if($new_api_connection_url != $api_connection_url){
        createHistory($user_id,'ApiConnection - Modificó la URL de conexión a la API',$api_connection_url,$new_api_connection_url,$pdo);
    }

    if($new_user != $user){
        createHistory($user_id,'ApiConnection - Modificó el usuario de conexión a la API',$user,$new_user,$pdo);
    }

    if($new_password != $password){
        createHistory($user_id,'ApiConnection - Modificó la contraseña de conexión a la API',$password,$new_password,$pdo);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':new_api_connection_url', $new_api_connection_url);
    $stmt->bindParam(':user', $new_user);
    $stmt->bindParam(':password', $new_password);

    if ($stmt_find->rowCount() > 0) {
        // Agregar vinculación de parámetro :id_josso
        $stmt->bindParam(':id_api_connection', $_POST['id_api_connection']);
    }

    if ($stmt->execute()) { 
        $_SESSION['message-created'] = 'Configuración cambiada con éxito.';
        header('Location: ../../../views/api_connection.php');

    } else {
        $_SESSION['error-created'] = 'Error al cambiar la configuración.';
        header('Location: ../../../views/api_connection.php');

    }

    header('Location: ../../../views/api_connection.php');
    exit;
}
