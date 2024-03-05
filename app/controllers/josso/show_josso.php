<?php
    require_once '../app/config.php';

    $sql = "SELECT * FROM josso";
        
    $stmt = $pdo->query($sql);

    $stmt->execute();
    // Obtener los resultados de la consulta
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($resultado);
    // Asignar los valores obtenidos a las variables PHP
    if($resultado){
        $id_josso = $resultado['id_josso'];
        $url_service_gateway = $resultado['url_service_gateway'];
        $maximun_time_response_socket = $resultado['maximun_time_response_socket'];
        $maximun_time_response_webservice = $resultado['maximun_time_response_webservice'];
        $name_plataforma = $resultado['name_plataforma'];
    }


