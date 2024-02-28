<?php

    function validarLogin(){
        
        if( isset($_SESSION['logueado'])) {
            // echo isset($_SESSION['logueado']);
            header('./views/inicio.php');
            // $_SESSION['error-authorized'] = 'Inicia sesion para continuar.';
        }
    }
    function autorizarVistaLogin(){
        
        if(!isset($_SESSION['logueado'])) {
            echo isset($_SESSION['logueado']);
            header('index.php');
            $_SESSION['error-authorized'] = 'Inicia sesion para continuar.';
        }
    }
    

