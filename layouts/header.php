<?php
//ruta actual
$currentPath = $_SERVER['REQUEST_URI'];

?>

<div class="header">
    <header class="header__home" id="header__home">
        <svg onclick="handleMenu()" class="header__home-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" stroke="white"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 6h18M3 12h18M3 18h18"/></svg>
    
        <?php
            if((strpos($currentPath, '/inicio.php'))){
                echo '<h1> Dashboard </h1>';
            }
            if((strpos($currentPath, '/batch.php'))){
                echo '<h1> Batch </h1>';
            }
            if((strpos($currentPath, '/josso.php'))){
                echo '<h1> Josso </h1>';
            } 
            if((strpos($currentPath, '/users.php'))){
                echo '<h1> Usuarios </h1>';
            }
            if((strpos($currentPath, '/note.php'))){
                echo '<h1> Notas </h1>';
            }
            if((strpos($currentPath, '/api_connection.php'))){
                echo '<h1> Conexión a la API </h1>';
            }
            if((strpos($currentPath, '/server-email'))){
                echo '<h1> Servidor de Correo </h1>';
            }
            if((strpos($currentPath, '/seed.php'))){
                echo '<h1> Semillas </h1>';
            }
            if((strpos($currentPath, '/report_audit.php'))){
                echo '<h1> Reportes Auditorias </h1>';
            }
            if((strpos($currentPath, '/report_josso.php'))){
                echo '<h1> Reportes Josso </h1>';
            }
            if((strpos($currentPath, '/report_batch.php'))){
                echo '<h1> Reportes Batch </h1>';
            }

        ?>
        <!-- Perfil usuario -->
        <div></div>
    </header>
</div>

