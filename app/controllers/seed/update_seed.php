<?php

require_once '../../config.php';

// Verificar si se ha enviado el formulario de actualización de la semilla
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_seed'])) {
    $old_seed = $_POST["old_seed"];
    $new_prog_name = $_POST["new_prog_name"];
    $new_design_version = $_POST["new_design_version"];
    $new_seed_version = $_POST["new_seed_version"];
    $new_status = $_POST["new_status"];

    $sql_select_seed = "SELECT * FROM seeds WHERE id_seed = :id_seed";

    $stmt_select_seed = $pdo->prepare($sql_select_seed);
    $stmt_select_seed->bindParam(":id_seed", $old_seed);
    $stmt_select_seed->execute();
    $old_seed_record = $stmt_select_seed->fetch();

    if ($old_seed_record["prog_name"] == $new_prog_name && $old_seed_record["design_version"] == $new_design_version 
    && $old_seed_record["seed_version"] == $new_seed_version && $old_seed_record["status"] == $new_status) {
        // Redirecciona al listado si el usuario no modifica nada
        header('Location: ../../../views/seed.php');
        exit();
    }

    $url = 'http://localhost/app-integracion/app/controllers/seed/create_seed.php';

    // Datos que quieres enviar en la solicitud POST
    $data = array(
        'program_type' => $old_seed_record["program_type"],
        'education_level' => $old_seed_record["education_level"],
        'code' => $old_seed_record["code"],
        'prog_name' => $new_prog_name,
        'design_version' => $new_design_version,
        'seed_version' => $new_seed_version,
        'status' => $new_status,
        'modality' => $old_seed_record["modality"],
    );
    // Inicializa una nueva sesión cURL
    $ch = curl_init($url);

    // Configura las opciones de la solicitud POST
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecuta la solicitud y obtiene la respuesta
    $response = curl_exec($ch);

    // Cierra la sesión cURL
    curl_close($ch);

    header('Location: ../../../views/seed.php');
    exit();

} else {
    // Si se intenta acceder a este script directamente sin enviar el formulario, redirigir a alguna página adecuada o mostrar un mensaje de error
    header('Location: ../../../views/seed.php');
    exit();
}



?>