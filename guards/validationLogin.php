<?php
    function validarLogin(){
        session_start(); // Inicia o reanuda una sesión
    
        if(isset($_SESSION['logueado']) && $_SESSION['logueado'] == true){
            header('Location: ../index.php');
            exit(); // Termina el script después de redirigir
        }
    }
    
?>
