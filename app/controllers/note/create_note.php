<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['note_submit'])) {

    require_once '../../config.php';
    require_once '../../controllers/history/create_history.php';

    // Validar que existe una configuracion de josso anterior
    $sql_find = "SELECT * FROM note";
    $stmt_find = $pdo->query($sql_find);
    $resultado = $stmt_find->fetch(PDO::FETCH_ASSOC);

    if($resultado){
        $id_note  = $resultado['id'];
        $url_web_service = $resultado['url_web_service'];
        $user = $resultado['user'];
        $password = $resultado['password'];
        $sync_notes = $resultado['sync_notes'];
        $default_letter = $resultado['default_letter'];
    }
    $user_id  = $_SESSION['document'];

    $new_url_web_service = $_POST['url_web_service'];
    $new_user = $_POST['user'];
    $new_password = $_POST['password'];
    $new_default_letter = $_POST['default_letter'];
    $new_sync_notes = isset($_POST['not_sync_notes']) ? 0 : 1;

    // Cuando no hay una configuraccion se crea
    if ($stmt_find->rowCount() == 0) {
        
        // if (empty($new_email_server) || empty($new_portocol) || empty($new_port) || empty($new_user) || empty($new_password)) {
        //     $_SESSION['error-created'] = 'Todos los campos son obligatorios';
        //     header('Location: ../../../views/server_email.php');
        //     exit; 
        // }
        // $sql = "INSERT INTO email_server (email_server , portocol , port , user , password, user_id) 
        //     VALUES (:email_server , :portocol , :port , :user, :password , :user_id)";
    }
    // Si ya existe se actualiza 
    else {

        $sql = "UPDATE note SET url_web_service = :url_web_service , user = :user , password = :password , sync_notes = :sync_notes  , default_letter = :default_letter WHERE id = :id_note";
    }

    if($new_url_web_service != $url_web_service){
        createHistory($user_id,'Notas - Modificó el url webservice',$url_web_service,$new_url_web_service,$pdo);
    }

    if($new_user != $user){
        createHistory($user_id,'Notas - Modificó el usuario',$user,$new_user,$pdo);
    }

    if($new_password != $password){
        createHistory($user_id,'Notas - Modificó la contraseña',$password,$new_password,$pdo);
    }
    if($new_sync_notes != $sync_notes){
        
        $event = $new_sync_notes == 1 ? 'Habilito' : 'Deshabilito' . "  la sincronización de notas";
        createHistory($user_id, "Notas - ". $event . " la sincronización de notas",$sync_notes,$new_sync_notes,$pdo);

    }
    if($new_default_letter != $default_letter){
        createHistory($user_id,'Notas - Modificó la letra por defecto',$default_letter,$new_default_letter,$pdo);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_note', $id_note);
    $stmt->bindParam(':url_web_service', $new_url_web_service);
    $stmt->bindParam(':user', $new_user);
    $stmt->bindParam(':password', $new_password);
    $stmt->bindParam(':sync_notes', $new_sync_notes);
    $stmt->bindParam(':default_letter', $new_default_letter);


    // if ($stmt_find->rowCount() > 0) {
    //     // Agregar vinculación de parámetro :id_josso
    //     $stmt->bindParam(':id_email_server', $_POST['id_email_server']);
    // }

    if ($stmt->execute()) { 
        $_SESSION['message-created'] = 'Configuración cambiada con éxito.';
        header('Location: ../../../views/note.php');

    } else {
        $_SESSION['error-created'] = 'Error al cambiar la configuración.';
        header('Location: ../../../views/note.php');

    }

    var_dump($_POST);
    // header('Location: ../../../views/note.php');
    // exit;
}
