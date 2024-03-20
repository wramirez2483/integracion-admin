<?php
//ruta actual
$currentPath = $_SERVER['REQUEST_URI'];
?>

<div class="menu__container">
    <div class="menu__content">
        <div class="menu__content__admin__title">
            <img class="admin-title" src="../img/logo-sena-verde.png" alt="" srcset="">
            <h1>ADI</h1>
        </div>
        <div class="menu__content__options">
            <h3 class="title__options">
                Configuración
            </h3>
            <ul>
                <!-- Dashboard -->
                <li class="<?php echo (strpos($currentPath, 'inicio.php')) ? 'active' : ''; ?>" >
                    <a href="../views/inicio.php">
                        <div class="menu__content-image-container">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M14 9q-.425 0-.712-.288T13 8V4q0-.425.288-.712T14 3h6q.425 0 .713.288T21 4v4q0 .425-.288.713T20 9zM4 13q-.425 0-.712-.288T3 12V4q0-.425.288-.712T4 3h6q.425 0 .713.288T11 4v8q0 .425-.288.713T10 13zm10 8q-.425 0-.712-.288T13 20v-8q0-.425.288-.712T14 11h6q.425 0 .713.288T21 12v8q0 .425-.288.713T20 21zM4 21q-.425 0-.712-.288T3 20v-4q0-.425.288-.712T4 15h6q.425 0 .713.288T11 16v4q0 .425-.288.713T10 21z" />
                            </svg>
                        </div>
                        <h2>Dashboard</h2>
                    </a>
                </li>
                
                <!-- Batch -->
                <li class="<?php echo (strpos($currentPath, '/batch.php')) ? 'active' : ''; ?>">
                    <a href="../views/batch.php">
                        <div class="menu__content-image-container">
                            <svg class="icon" viewBox="0 0 47 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.8684 29.25C20.8611 29.25 21.8295 29.1825 22.7979 29.115C23.2579 27.405 24.0326 25.785 25.0979 24.3675C23.4274 24.615 21.66 24.75 19.8684 24.75C14.0095 24.75 8.48947 23.4 5.34211 21.2625V14.94C8.90105 16.8075 14.0821 18 19.8684 18C25.6547 18 30.8358 16.8075 34.3947 14.94V18.4275C35.6053 18.1575 36.8158 18 38.1474 18C38.5105 18 38.8737 18 39.2368 18.0675V9C39.2368 4.0275 30.5695 0 19.8684 0C9.16737 0 0.5 4.0275 0.5 9V31.5C0.5 36.4725 9.19158 40.5 19.8684 40.5C21.4663 40.5 23.04 40.41 24.5168 40.23C23.6695 38.9025 23.04 37.44 22.6768 35.865C21.7811 36 20.8611 36 19.8684 36C10.4989 36 5.34211 32.625 5.34211 31.5V26.4825C9.24 28.2375 14.3484 29.25 19.8684 29.25ZM19.8684 4.5C29.2379 4.5 34.3947 7.875 34.3947 9C34.3947 10.125 29.2379 13.5 19.8684 13.5C10.4989 13.5 5.34211 10.125 5.34211 9C5.34211 7.875 10.4989 4.5 19.8684 4.5ZM46.5 32.625C46.5 34.47 45.8947 36.18 44.8779 37.5975L42.2389 35.145C42.6505 34.38 42.8684 33.525 42.8684 32.625C42.8684 29.52 40.1568 27 36.8158 27V30.375L31.3684 25.3125L36.8158 20.25V23.625C42.1663 23.625 46.5 27.6525 46.5 32.625ZM36.8158 34.875L42.2632 39.9375L36.8158 45V41.625C31.4653 41.625 27.1316 37.5975 27.1316 32.625C27.1316 30.78 27.7368 29.07 28.7537 27.6525L31.3926 30.105C30.9811 30.87 30.7632 31.725 30.7632 32.625C30.7632 35.73 33.4747 38.25 36.8158 38.25V34.875Z" />
                            </svg>
                        </div>
                        <h2>Batch</h2>
                    </a>
                </li>
                <!-- Josso -->
                <li class="<?php echo (strpos($currentPath, '/josso.php')) ? 'active' : ''; ?>">     
                    <a href="../views/josso.php">
                        <div class="menu__content-image-container">
                            <svg class="icon" viewBox="0 0 35 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 0C19.6421 0 21.6965 0.853391 23.2112 2.37244C24.726 3.89148 25.5769 5.95175 25.5769 8.1C25.5769 10.2483 24.726 12.3085 23.2112 13.8276C21.6965 15.3466 19.6421 16.2 17.5 16.2C15.3579 16.2 13.3035 15.3466 11.7888 13.8276C10.274 12.3085 9.42308 10.2483 9.42308 8.1C9.42308 5.95175 10.274 3.89148 11.7888 2.37244C13.3035 0.853391 15.3579 0 17.5 0ZM17.5 18.9C21.8885 18.9 25.9 19.845 29.6154 21.735C33.2231 23.652 35 25.947 35 28.647V44.226C35 47.25 32.6846 49.788 27.9731 51.813V45.9C27.9731 43.335 25.6577 41.526 21.0269 40.419C19.5192 40.068 18.3346 39.906 17.5 39.906C15.1577 39.906 12.9231 40.365 10.8769 41.31C8.80385 42.228 7.56538 43.416 7.16154 44.847C10.7692 46.278 14.2154 47.007 17.5 47.007L20.1923 46.737V53.838L17.5 54C13.8115 54 10.3115 53.244 7.02692 51.813C2.31538 49.788 0 47.25 0 44.226V28.647C0 25.947 1.77692 23.652 5.38462 21.735C9.1 19.845 13.1385 18.9 17.5 18.9ZM17.5 24.3C16.0719 24.3 14.7023 24.8689 13.6925 25.8816C12.6827 26.8943 12.1154 28.2678 12.1154 29.7C12.1154 31.1322 12.6827 32.5057 13.6925 33.5184C14.7023 34.5311 16.0719 35.1 17.5 35.1C18.9281 35.1 20.2977 34.5311 21.3075 33.5184C22.3173 32.5057 22.8846 31.1322 22.8846 29.7C22.8846 28.2678 22.3173 26.8943 21.3075 25.8816C20.2977 24.8689 18.9281 24.3 17.5 24.3Z" />
                            </svg>
                        </div>
                        <h2>Josso</h2>
                    </a>
                </li>
                
                <!-- Note -->
                <li class="<?php echo (strpos($currentPath, '/note.php')) ? 'active' : ''; ?>">
                    <a href="../views/note.php">

                        <div class="menu__content-image-container">

                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15">
                                <path d="M10.5 14.5H10a.5.5 0 0 0 .854.354zm0-4V10a.5.5 0 0 0-.5.5zm4 0l.354.354A.5.5 0 0 0 14.5 10zM1.5 1h12V0h-12zM1 13.5v-12H0v12zm13-12v8.586h1V1.5zM10.086 14H1.5v1h8.586zm3.768-3.56l-3.415 3.414l.707.707l3.415-3.415zM10.086 15a1.5 1.5 0 0 0 1.06-.44l-.707-.706a.5.5 0 0 1-.353.146zM14 10.086a.5.5 0 0 1-.146.353l.707.707a1.5 1.5 0 0 0 .439-1.06zM0 13.5A1.5 1.5 0 0 0 1.5 15v-1a.5.5 0 0 1-.5-.5zM13.5 1a.5.5 0 0 1 .5.5h1A1.5 1.5 0 0 0 13.5 0zm-12-1A1.5 1.5 0 0 0 0 1.5h1a.5.5 0 0 1 .5-.5zM11 14.5v-4h-1v4zm-.5-3.5h4v-1h-4zm3.646-.854l-4 4l.708.708l4-4zM3 4h9V3H3z" />
                            </svg>


                        </div>
                        <h2>Notas</h2>

                    </a>
                </li>

                <!-- API CONNECTION -->
                <li class="<?php echo (strpos($currentPath, 'api_connection.php')) ? 'active' : ''; ?>">
                    <a  href="../views/api_connection.php">
        
                        <div class="menu__content-image-container">
        
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.5 13L7 11.5l5.5 5.5l-1.5 1.5c-.75.75-3.5 2-5.5 0s-.75-4.75 0-5.5M3 21l2.5-2.5m13-7.5L17 12.5L11.5 7L13 5.5c.75-.75 3.5-2 5.5 0s.75 4.75 0 5.5m-6-3l-2 2M21 3l-2.5 2.5m-2.5 6l-2 2" />
                            </svg>
        
        
                        </div>
                        <h2>API</h2>
        
                    </a>
                </li>
                <!-- Usuarios -->
                <li  class="<?php echo (strpos($currentPath, '/users.php')) ? 'active' : ''; ?>">
                    <a href="../views/users.php">
        
                        <div class="menu__content-image-container">
                            <svg class="icon" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.5 0C23.1522 0 25.6957 1.05357 27.5711 2.92893C29.4464 4.8043 30.5 7.34784 30.5 10C30.5 12.6522 29.4464 15.1957 27.5711 17.0711C25.6957 18.9464 23.1522 20 20.5 20C17.8478 20 15.3043 18.9464 13.4289 17.0711C11.5536 15.1957 10.5 12.6522 10.5 10C10.5 7.34784 11.5536 4.8043 13.4289 2.92893C15.3043 1.05357 17.8478 0 20.5 0ZM20.5 25C31.55 25 40.5 29.475 40.5 35V40H0.5V35C0.5 29.475 9.45 25 20.5 25Z" />
                            </svg>
                        </div>
                        <h2>Usuarios</h2>
        
                    </a>
                </li>
                <!-- Servidor -->
                <li class="<?php echo (strpos($currentPath, 'server-email')) ? 'active' : ''; ?>">
                    <a  href="../views/server-email.php">
        
        
                        <div class="menu__content-image-container">
        
                            <svg class="icon" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30.6 7.25L17 15.6875L3.4 7.25V3.875L17 12.3125L30.6 3.875M30.6 0.5H3.4C1.513 0.5 0 2.00187 0 3.875V24.125C0 25.0201 0.358213 25.8785 0.995837 26.5115C1.63346 27.1444 2.49826 27.5 3.4 27.5H30.6C31.5017 27.5 32.3665 27.1444 33.0042 26.5115C33.6418 25.8785 34 25.0201 34 24.125V3.875C34 2.00187 32.47 0.5 30.6 0.5Z" />
                            </svg>
        
                        </div>
                        <h2>Servidor</h2>
        
                    </a>
                </li>
                <!-- Semillas -->
                <li class="<?php echo (strpos($currentPath, 'seed.php')) ? 'active' : ''; ?>">
                    <a  href="../views/seed.php">
        
        
                        <div class="menu__content-image-container">
        
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32M0 96c0-17.7 14.3-32 32-32h32c123.7 0 224 100.3 224 224v192c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96" />
                            </svg>
        
                        </div>
                        <h2>Semillas</h2>
        
                    </a>
                </li>
                <!-- Reportes -->
                <li class="<?php echo (strpos($currentPath, 'report')) ? 'active' : ''; ?>">
                    
                    <div onclick="toggleReportesMenu()" class="toggle__menu__report">
        
                        <svg class="icon"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path d="M10 18h8v2h-8zm0-5h12v2H10zm0 10h5v2h-5z"/>
                            <path d="M25 5h-3V4a2 2 0 0 0-2-2h-8a2 2 0 0 0-2 2v1H7a2 2 0 0 0-2 2v21a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2M12 4h8v4h-8Zm13 24H7V7h3v3h12V7h3Z"/>
                        </svg>
        
                        <div class="title__options__toggle">

                            <h2>
                                Reportes
                            </h2>
                            
                            <svg class="icon_dos" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd">
                                <path  d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/>
                                <path class="icon_dos_path" fill="white" d="M13.06 16.06a1.5 1.5 0 0 1-2.12 0l-5.658-5.656a1.5 1.5 0 1 1 2.122-2.121L12 12.879l4.596-4.596a1.5 1.5 0 0 1 2.122 2.12l-5.657 5.658Z"/></g>
                            </svg>
                        </div>
        
        
        
                    </div>
        
                    
                    
                </li>
                <div class="menu__reportes <?php echo (strpos($currentPath, 'report')) ? 'active__toggle' : ''; ?>" id="reportesMenu">
                    <ul>
                        
                        <!-- Reportes -->
                        <li class="report_list_element <?php echo (strpos($currentPath, 'report_audit')) ? 'active__menu__report' : ''; ?>">
                            <a href="../views/report_audit.php">
                                <h2>Reportes Audit</h2>
                            </a>
                        </li>

                        <!-- Reporte Josso -->
                        <li class="report_list_element <?php echo (strpos($currentPath, 'report_josso')) ? 'active__menu__report' : ''; ?>">
                            <a href="../views/report_josso.php">
                                <h2>Reportes Josso</h2>
                            </a>
                        </li>

                        <!-- Reporte Batch -->
                        <li  class="report_list_element  <?php echo (strpos($currentPath, 'report_batch')) ? 'active__menu__report' : ''; ?>">
                            <a href="../views/report_batch.php">
                                <h2>Reportes Batch</h2>
                            </a>
                        </li>
                    </ul>        
                

                    <!-- <li>
                        Reporte notas
                        <a class="report_list_element <?php echo (strpos($currentPath, 'r_notas')) ? 'active' : ''; ?>" href="../views/r_notas.php">
                            <h2>Reporte Notas</h2>
                        </a>
                    </li>                         -->
      

                </div>
            </ul>

           

        </div>

        <!-- Cerrar Sesion -->
        <div class="logout">
            <a href="../app/controllers/login/logout.php">
                <div class="menu__auth">
                    <div class="menu__content-image-container">
        
                        <svg viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 4L13.59 5.41L16.17 8H6V10H16.17L13.59 12.58L15 14L20 9M2 2H10V0H2C0.9 0 0 0.9 0 2V16C0 17.1 0.9 18 2 18H10V16H2V2Z" fill="white" />
                        </svg>
                    </div>
                    <h2>Cerrar Sesión</h2>
        
                </div>
        
            </a>
        </div>
    </div>
    

</div>

<script>
    function toggleReportesMenu() {


        var reportesMenu = document.getElementById("reportesMenu");
        var iconDos = document.querySelector(".icon_dos");

        reportesMenu.classList.toggle("active__toggle");

        if (reportesMenu.classList.contains("active__toggle")) {
            iconDos.classList.remove('rotate-animation-disabled')

            iconDos.classList.add("rotate-animation");
        } else {
            iconDos.classList.remove("rotate-animation");
            iconDos.classList.add('rotate-animation-disabled')
        }
    }
</script>