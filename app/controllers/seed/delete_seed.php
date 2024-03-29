<?php
require_once '../../config.php';

if(isset($_GET['seed_id'])) {
    // Obtener el seed_id de la URL
    $seed_id = $_GET['seed_id'];

    // Actualizar el estado del registro de 1 a 0
    $sql = "UPDATE seeds SET deletion_date = :deletion_date WHERE id = :seed_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("deletion_date", date("Y-m-d"));
    $stmt->bindParam("seed_id", $seed_id);

    if ($stmt->execute()) {
        // Redirigir a la página principal o mostrar un mensaje de éxito
        $_SESSION['success_message'] = 'La semilla se eliminó correctamente';
        header('Location: ../../../views/seed.php');
        exit();
    } else {
        // Mostrar un mensaje de error si la actualización falla
        $_SESSION['error_message'] = 'Error al eliminar la semilla';
        header('Location: edit_event.php?seed_code=' . $seed_code); // Redirigir de vuelta al formulario de edición con el código de semilla del evento
        exit();
    }

} else {
    // Si no se proporciona seed_code, redirigir a alguna página de error o la página principal
    $_SESSION['error_message'] = 'No se proporcionó un código de semilla válido';
    header("Location: ../../../views/seed.php");
    exit();
}
