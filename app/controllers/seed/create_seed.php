<?php 

require_once "../../config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modality = $_POST['modality'];
    $code = $_POST['code'];
    $event = "created_seed";

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