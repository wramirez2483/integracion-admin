<?php 

require_once "../../config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modality = $_POST['modality'];
    $code = $_POST['code'];
    $event = "created_seed";

    // Consulta para verificar si ya existe un evento con el mismo código de semilla
    $sql_check_seed = "SELECT COUNT(*) FROM seeds WHERE code = :code";
    $stmt_check_seed = $pdo->prepare($sql_check_seed);
    $stmt_check_seed->bindParam(':code', $code);
    $stmt_check_seed->execute();
    $count = $stmt_check_seed->fetchColumn();

    if ($count > 0) {
        // Si ya existe un evento con el mismo código de semilla, muestra un mensaje de error
        $_SESSION['error_message_events'] = 'Ya existe una semilla con este código';
        header('Location: ../../../views/seed.php');
        exit();
    }

    $sql_insert_seed = "INSERT INTO seeds (modality, code, event) VALUES (:modality, :code, :event)";
    $stmt_insert_seed = $pdo->prepare($sql_insert_seed);
    $stmt_insert_seed->bindParam(':modality', $modality);
    $stmt_insert_seed->bindParam(':code', $code);
    $stmt_insert_seed->bindParam(':event', $event);

    if ($stmt_insert_seed->execute()) {
        // Seed registrado exitosamente
        $_SESSION['success_message'] = 'Semilla registrada exitosamente';
        header('Location: ../../../views/seed.php');
    } else {
        // Error al registrar el evento
        $_SESSION['error_message_events'] = 'Error al registrar la semilla';
        header('Location: ../../../views/seed.php');
    }
}
?>