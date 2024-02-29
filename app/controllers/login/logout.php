<?php


    session_start();
    session_destroy();
    unset($_SESSION['logueado']);
    header('Location: ../../../');

exit();

