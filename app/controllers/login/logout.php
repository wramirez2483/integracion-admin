<?php
require_once '../../config.php';

// Iniciar la sesión
session_start();

// Verificar si se ha iniciado sesión antes de cerrarla
if (isset($_SESSION['logueado']) && $_SESSION['logueado']) {

    $user_id = $_SESSION['document'];
    

    $event = "logout";
    
    $audit_sql = "INSERT INTO audit (id_user, events) VALUES (:id_user, :event)";
    $audit_stmt = $pdo->prepare($audit_sql);
    $audit_stmt->bindParam(':id_user', $user_id);
    $audit_stmt->bindParam(':event', $event);
    $audit_stmt->execute();
}

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio
header('Location: ../../../');
exit();
?>