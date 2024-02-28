<?php


session_start();
session_destroy();
unset($_SESSION['logueado']);
header('Location: ../../../views/login/login.php');
exit();

