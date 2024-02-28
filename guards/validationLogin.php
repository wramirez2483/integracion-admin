<?php
    function validarLogin(){
        session_start(); // Inicia o reanuda una sesión
        
        if( ! isset($_SESSION['logueado'])) {
            // echo isset($_SESSION['logueado']);
            header('Location: views/login/login.php');
            $_SESSION['error-authorized'] = 'Inicia sesion para continuar.';
        }
    }
    

