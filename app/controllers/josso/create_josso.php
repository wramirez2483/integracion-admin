<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    require_once '../../config.php';
    require_once '../../controllers/history/create_history.php';

    // Validar que existe una configuracion de josso anterior

    $user_id  = $_SESSION['document'];

    $sql_find = "SELECT * FROM josso";
    $stmt_find = $pdo->query($sql_find);
    $resultado = $stmt_find->fetch(PDO::FETCH_ASSOC);

    if($resultado){

        $url_service_gateway = $resultado['url_service_gateway'];
        $maximun_time_response_socket = $resultado['maximun_time_response_socket'];
        $maximun_time_response_webservice = $resultado['maximun_time_response_webservice'];
        $name_plataforma = $resultado['name_plataforma'];
        
    }
    
    
    $new_url_service_gateway = $_POST['url_service_gateway'];
    $new_maximun_time_response_socket = $_POST['maximun_time_response_socket'];
    $new_maximun_time_response_webservice = $_POST['maximun_time_response_webservice'];
    $new_name_plataforma = $_POST['name_plataforma'];

    // Cuando no hay una configuraccion se crea
    if ($stmt_find->rowCount() == 0) {
        if (empty($url_service_gateway) || empty($maximun_time_response_socket) || empty($maximun_time_response_webservice) || empty($name_plataforma)) {
            $_SESSION['error-created'] = 'Todos los campos son obligatorios';
            header('Location: ../../../views/josso.php');
            exit; 
        }
        $sql = "INSERT INTO josso (url_service_gateway , maximun_time_response_socket , maximun_time_response_webservice , name_plataforma , user_id) 
            VALUES (:url_service_gateway , :maximun_time_response_socket , :maximun_time_response_webservice , :name_plataforma, :user_id)";
    }
    // Si ya existe se actualiza 
    else {
        $sql = "UPDATE josso SET url_service_gateway = :url_service_gateway , maximun_time_response_socket = :maximun_time_response_socket , maximun_time_response_webservice = :maximun_time_response_webservice , name_plataforma = :name_plataforma , user_id = :user_id WHERE id_josso = :id_josso";

    }
   
    if($new_url_service_gateway != $url_service_gateway ){

        createHistory($user_id,"Josso - Modificó el Url del servicio gateway",$url_service_gateway,$new_url_service_gateway,$pdo);

    }
    if($new_maximun_time_response_socket != $maximun_time_response_socket ){

        createHistory($user_id,"Josso - Modificó tiempo de espera maxi de respuesta sockets",$maximun_time_response_socket,$new_maximun_time_response_socket,$pdo);

    }
    if($new_maximun_time_response_webservice != $maximun_time_response_webservice ){

        createHistory($user_id,"Josso - Modificó tiempo de espera maxi de respuesta webserver",$maximun_time_response_webservice,$new_maximun_time_response_webservice,$pdo);

    }   
    if($new_name_plataforma != $name_plataforma ){

        createHistory($user_id,"Josso - Modificó el nombre de la plataforma",$name_plataforma,$new_name_plataforma,$pdo);

    }




    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':url_service_gateway', $new_url_service_gateway);
    $stmt->bindParam(':maximun_time_response_socket', $new_maximun_time_response_socket);
    $stmt->bindParam(':maximun_time_response_webservice', $new_maximun_time_response_webservice);
    $stmt->bindParam(':name_plataforma', $new_name_plataforma);
    $stmt->bindParam(':user_id', $_SESSION['document']);

    if ($stmt_find->rowCount() > 0) {
        // Agregar vinculación de parámetro :id_josso
        $stmt->bindParam(':id_josso', $_POST['id_josso']);
    }
    if ($stmt->execute()) { 
        $_SESSION['message-created'] = 'Configuración cambiada con éxito.';
    } else {
        $_SESSION['error-created'] = 'Error al cambiar la configuración.';
    }

    header('Location: ../../../views/josso.php');
    exit; // Importante para detener la ejecución después de redirigir
}
