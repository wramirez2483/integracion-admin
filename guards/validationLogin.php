<?php
    session_start();
    function validarLogin(){
        if( !$_SESSION['logueado'] || !isset($_SESSION['logueado'])) {     
            header('Location: ../index.php');
            $_SESSION['error-authorized'] = 'Inicia sesion para continuar.';
        }
    }
    // function autorizarVistaLogin(){
    //     echo isset($_SESSION['logueado']);
        
    //     if(!isset($_SESSION['logueado'])) {
    //         echo isset($_SESSION['logueado']);
    //         // header('Location: ../index.php');
    //         $_SESSION['error-authorized'] = 'Inicia sesion para continuar.';
    //     }
    // }
    

