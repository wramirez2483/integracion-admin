<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    require_once '../../config.php';

    // Validar que existe una configuracion de josso anterior
    $sql_find = "SELECT * FROM josso";
    $stmt_find = $pdo->query($sql_find);

    $url_service_gateway = $_POST['url_service_gateway'];
    $maximun_time_response_socket = $_POST['maximun_time_response_socket'];
    $maximun_time_response_webservice = $_POST['maximun_time_response_webservice'];
    $name_plataforma = $_POST['name_plataforma'];

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
   
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':url_service_gateway', $url_service_gateway);
    $stmt->bindParam(':maximun_time_response_socket', $maximun_time_response_socket);
    $stmt->bindParam(':maximun_time_response_webservice', $maximun_time_response_webservice);
    $stmt->bindParam(':name_plataforma', $name_plataforma);
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
