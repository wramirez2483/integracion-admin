<?php
// Incluye el archivo de configuración y comienza la sesión
require_once '../../config.php';

// Verifica si se ha enviado un formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['events'])){
        
        // Los datos del formulario de registro
        $modality = $_POST['modality'];
        $training = $_POST['training'];
        $seed_code = $_POST['seed_code'];
    
        // Consulta para verificar si ya existe un evento con el mismo código de semilla
        $sql_check_seed = "SELECT COUNT(*) FROM events_without_sync WHERE seed_code = :seed_code";
        $stmt_check_seed = $pdo->prepare($sql_check_seed);
        $stmt_check_seed->bindParam(':seed_code', $seed_code);
        $stmt_check_seed->execute();
        $count = $stmt_check_seed->fetchColumn();
        
        if ($count > 0) {
            // Si ya existe un evento con el mismo código de semilla, muestra un mensaje de error
            $_SESSION['error_message_events'] = 'Ya existe un evento con el mismo código de semilla';
            header('Location: ../../../index.php');
            exit();
        }
    
        // Durante la inserción
        $sql_insert_event = "INSERT INTO events_without_sync (modality, training, seed_code) VALUES (:modality, :training, :seed_code)";
    
        // Preparar la declaración
        $stmt_insert_event = $pdo->prepare($sql_insert_event);
        $stmt_insert_event->bindParam(':modality', $modality);
        $stmt_insert_event->bindParam(':training', $training);
        $stmt_insert_event->bindParam(':seed_code', $seed_code);
    
        if ($stmt_insert_event->execute()) {
            // Evento registrado exitosamente
            $_SESSION['success_message'] = 'Evento registrado exitosamente';
            header('Location: ../../../index.php');
        } else {
            // Error al registrar el evento
            $_SESSION['error_message_events'] = 'Error al registrar el evento';
            header('Location: ../../../index.php');
        }
    }

} else {
    // Si no se reciben datos por POST, redirige al usuario de vuelta al formulario de registro
    header('Location: ../../../views/register/register.php');
    exit();
}
?>