<?php

require_once ('../../config.php');

if(isset($_SESSION['sesion_email'])){
    session_start();
    session_destroy();
    header('Location:  ../../../views/login/login.php');
}
?>
