<?php
    function validarLogin(){
        // si el usuario no esa logueado
        if( !$_SESSION['logueado'] || !isset($_SESSION['logueado'])) {     
            $_SESSION['error-authorized'] = 'Inicia sesion para continuar.';
            // Regirige al login
            header('Location: ../index.php');
        }
    }

    function redigirLoginUser(){
        // si el usuario esta logueado
        if(isset($_SESSION['logueado'])){
            // Redirige al inicio si esta logueado
            header('Location: ./views/inicio.php');
        }
    }


