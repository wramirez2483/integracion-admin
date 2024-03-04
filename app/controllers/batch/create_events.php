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
            exit();
        } else {
            // Error al registrar el evento
            $_SESSION['error_message'] = 'Error al registrar el evento';
            header('Location: ../../../views/register/register.php');
            exit();
        }
    }

} else {
    // Si no se reciben datos por POST, redirige al usuario de vuelta al formulario de registro
    header('Location: ../../../views/register/register.php');
    exit();
}
?>


