<?php
require_once '../history/create_history.php';

require_once '../../config.php';

// traer los correos de session['correos']
var_dump($_SESSION['notifications_target']);

// traer el indice del correo en la lista.
var_dump($_GET['indice']);



// borrar el correo de session['correos'] con el indice

$cantidad_correos = count($_SESSION['notifications_target']);
unset($_SESSION['notifications_target']['indice']);


// hacer un update y ya. melo
$emails_serial = serialize($_SESSION['notifications_target']);



$sql = "UPDATE batch SET notifications_target = :notifications_target WHERE id_batch = :id_batch";
$consulta = $pdo->prepare($sql);
$consulta->bindParam(':id_batch', $_SESSION['id_batch']);
$consulta->bindParam(':notifications_target', $emails_serial);

if($consulta->execute()){
    createHistory($_SESSION['document'], "Batch - Borro un destinatario ", $cantidad_correos . " correos",   count($_SESSION['notifications_target']) . " correos",$pdo);
    header('Location: ../../../views/batch.php');
}



