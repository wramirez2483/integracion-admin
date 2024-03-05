<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    require_once '../../config.php';

    // Validar que existe una configuracion de josso anterior
    $sql_find = "SELECT * FROM josso";
    $stmt_find = $pdo->query($sql_find);

    
    if ($stmt_find->rowCount() == 0) {
        if (empty($url_service_gateway) || empty($maximun_time_response_socket) || empty($maximun_time_response_webservice) || empty($name_plataforma)) {
            $_SESSION['error-created'] = 'Todos los campos son obligatorios';
            exit();
        }
        $sql = "INSERT INTO josso (url_service_gateway, maximun_time_response_socket, maximun_time_response_webservice, name_plataforma) 
                VALUES (:url_service_gateway, :maximun_time_response_socket, :maximun_time_response_webservice, :name_plataforma)";
                
    } else {

        $sql = "UPDATE josso SET url_service_gateway = :url_service_gateway, maximun_time_response_socket = :maximun_time_response_socket, maximun_time_response_webservice = :maximun_time_response_webservice, name_plataforma = :name_plataforma WHERE id_josso = :id_josso ";
    
    }
    
    
    $url_service_gateway = $_POST['url_service_gateway'];
    $maximun_time_response_socket = $_POST['maximun_time_response_socket'];
    $maximun_time_response_webservice = $_POST['maximun_time_response_webservice'];
    $name_plataforma = $_POST['name_plataforma'];
    $id_josso = $_POST['id_josso'];

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':url_service_gateway', $url_service_gateway);
    $stmt->bindParam(':maximun_time_response_socket', $maximun_time_response_socket);
    $stmt->bindParam(':maximun_time_response_webservice', $maximun_time_response_webservice);
    $stmt->bindParam(':name_plataforma', $name_plataforma);
    $stmt->bindParam(':id_josso', $id_josso);

    if ($stmt->execute()) {
        $_SESSION['message-created'] = 'Configuración cambiada con éxito.';
        header('Location: ../../../views/josso.php');
    } else {
        $_SESSION['error-created'] = 'Error al cambiar la configuración.';
        header('Location: ../../../views/josso.php');

    }
}

   
