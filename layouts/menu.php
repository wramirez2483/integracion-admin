<?php

// Obtén la ruta actual
$currentPath = $_SERVER['REQUEST_URI'];
// echo $currentPath;

// Define las rutas correspondientes a cada elemento del menú
$batchPath = '/app-integracion/views/inicio.php';
$jossoPath = '/app-integracion/views/josso.php';
$userPath = '/app-integracion/views/users.php';
$serverPath = '/app-integracion/views/servidor-email.php';
$reportPath = '/app-integracion/views/reportes.php';
// Agrega más rutas según sea necesario

?>

<div class="container-menu">
    <div class="content">

        <div class="admin-title">

            <img class="admin-icon" src="../img/ADMIN.svg" alt="" srcset="">
            <h1>Admin Integración</h1>
        </div>

        <div class="options">
            
            <!-- Batch -->
            <a class="<?php echo ($currentPath == $batchPath) ? 'active' : ''; ?>" href="../views/inicio.php">

                <h2>Batch</h2>

                <div class="image-container">

                    <svg class="icon" viewBox="0 0 47 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.8684 29.25C20.8611 29.25 21.8295 29.1825 22.7979 29.115C23.2579 27.405 24.0326 25.785 25.0979 24.3675C23.4274 24.615 21.66 24.75 19.8684 24.75C14.0095 24.75 8.48947 23.4 5.34211 21.2625V14.94C8.90105 16.8075 14.0821 18 19.8684 18C25.6547 18 30.8358 16.8075 34.3947 14.94V18.4275C35.6053 18.1575 36.8158 18 38.1474 18C38.5105 18 38.8737 18 39.2368 18.0675V9C39.2368 4.0275 30.5695 0 19.8684 0C9.16737 0 0.5 4.0275 0.5 9V31.5C0.5 36.4725 9.19158 40.5 19.8684 40.5C21.4663 40.5 23.04 40.41 24.5168 40.23C23.6695 38.9025 23.04 37.44 22.6768 35.865C21.7811 36 20.8611 36 19.8684 36C10.4989 36 5.34211 32.625 5.34211 31.5V26.4825C9.24 28.2375 14.3484 29.25 19.8684 29.25ZM19.8684 4.5C29.2379 4.5 34.3947 7.875 34.3947 9C34.3947 10.125 29.2379 13.5 19.8684 13.5C10.4989 13.5 5.34211 10.125 5.34211 9C5.34211 7.875 10.4989 4.5 19.8684 4.5ZM46.5 32.625C46.5 34.47 45.8947 36.18 44.8779 37.5975L42.2389 35.145C42.6505 34.38 42.8684 33.525 42.8684 32.625C42.8684 29.52 40.1568 27 36.8158 27V30.375L31.3684 25.3125L36.8158 20.25V23.625C42.1663 23.625 46.5 27.6525 46.5 32.625ZM36.8158 34.875L42.2632 39.9375L36.8158 45V41.625C31.4653 41.625 27.1316 37.5975 27.1316 32.625C27.1316 30.78 27.7368 29.07 28.7537 27.6525L31.3926 30.105C30.9811 30.87 30.7632 31.725 30.7632 32.625C30.7632 35.73 33.4747 38.25 36.8158 38.25V34.875Z" />
                    </svg>

                </div>

            </a>
            <!-- Josso -->
            <a class="<?php echo ($currentPath == $jossoPath) ? 'active' : ''; ?>" href="../views/josso.php">
                <h2>Josso</h2>
                <div class="image-container">
                    <svg class="icon" viewBox="0 0 35 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5 0C19.6421 0 21.6965 0.853391 23.2112 2.37244C24.726 3.89148 25.5769 5.95175 25.5769 8.1C25.5769 10.2483 24.726 12.3085 23.2112 13.8276C21.6965 15.3466 19.6421 16.2 17.5 16.2C15.3579 16.2 13.3035 15.3466 11.7888 13.8276C10.274 12.3085 9.42308 10.2483 9.42308 8.1C9.42308 5.95175 10.274 3.89148 11.7888 2.37244C13.3035 0.853391 15.3579 0 17.5 0ZM17.5 18.9C21.8885 18.9 25.9 19.845 29.6154 21.735C33.2231 23.652 35 25.947 35 28.647V44.226C35 47.25 32.6846 49.788 27.9731 51.813V45.9C27.9731 43.335 25.6577 41.526 21.0269 40.419C19.5192 40.068 18.3346 39.906 17.5 39.906C15.1577 39.906 12.9231 40.365 10.8769 41.31C8.80385 42.228 7.56538 43.416 7.16154 44.847C10.7692 46.278 14.2154 47.007 17.5 47.007L20.1923 46.737V53.838L17.5 54C13.8115 54 10.3115 53.244 7.02692 51.813C2.31538 49.788 0 47.25 0 44.226V28.647C0 25.947 1.77692 23.652 5.38462 21.735C9.1 19.845 13.1385 18.9 17.5 18.9ZM17.5 24.3C16.0719 24.3 14.7023 24.8689 13.6925 25.8816C12.6827 26.8943 12.1154 28.2678 12.1154 29.7C12.1154 31.1322 12.6827 32.5057 13.6925 33.5184C14.7023 34.5311 16.0719 35.1 17.5 35.1C18.9281 35.1 20.2977 34.5311 21.3075 33.5184C22.3173 32.5057 22.8846 31.1322 22.8846 29.7C22.8846 28.2678 22.3173 26.8943 21.3075 25.8816C20.2977 24.8689 18.9281 24.3 17.5 24.3Z" />
                    </svg>
                </div>

            </a>

            <!-- Usuarios -->
            <a class="<?php echo ($currentPath == $userPath) ? 'active' : ''; ?>"  href="../views/users.php">
                <h2>Usuarios</h2>

                <div class="image-container">
                    <svg class="icon" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.5 0C23.1522 0 25.6957 1.05357 27.5711 2.92893C29.4464 4.8043 30.5 7.34784 30.5 10C30.5 12.6522 29.4464 15.1957 27.5711 17.0711C25.6957 18.9464 23.1522 20 20.5 20C17.8478 20 15.3043 18.9464 13.4289 17.0711C11.5536 15.1957 10.5 12.6522 10.5 10C10.5 7.34784 11.5536 4.8043 13.4289 2.92893C15.3043 1.05357 17.8478 0 20.5 0ZM20.5 25C31.55 25 40.5 29.475 40.5 35V40H0.5V35C0.5 29.475 9.45 25 20.5 25Z" />
                    </svg>
                </div>
            </a>
            <!-- Servidor -->
            <a class="<?php echo ($currentPath == $serverPath) ? 'active' : ''; ?>" href="../views/servidor-email.php">
                <h2>Servidor</h2>

                <div class="image-container">

                    <svg class="icon" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M30.6 7.25L17 15.6875L3.4 7.25V3.875L17 12.3125L30.6 3.875M30.6 0.5H3.4C1.513 0.5 0 2.00187 0 3.875V24.125C0 25.0201 0.358213 25.8785 0.995837 26.5115C1.63346 27.1444 2.49826 27.5 3.4 27.5H30.6C31.5017 27.5 32.3665 27.1444 33.0042 26.5115C33.6418 25.8785 34 25.0201 34 24.125V3.875C34 2.00187 32.47 0.5 30.6 0.5Z" />
                    </svg>

                </div>
            </a>
            <!-- Reportes -->
            <a class="<?php echo ($currentPath == $reportPath) ? 'active' : '';?>" href="../views/reportes_g.php">
                <h2>Reportes</h2>
                <div class="image-container">
                    <svg class="icon" viewBox="0 0 42 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 46V13.8H9.33333V46H0ZM16.3333 46V0H25.6667V46H16.3333ZM32.6667 46V27.6H42V46H32.6667Z" />
                    </svg>
                </div>

            </a>

            <a class="">

                <h2>Reportes Josso</h2>

            </a>

            <a class="">
                <h2>Reportes Batch</h2>


            </a>
        </div>

        <a href="../app/controllers/login/logout.php">
            <div class="auth">
                <h2>Cerrar Sesión</h2>

                <svg viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 4L13.59 5.41L16.17 8H6V10H16.17L13.59 12.58L15 14L20 9M2 2H10V0H2C0.9 0 0 0.9 0 2V16C0 17.1 0.9 18 2 18H10V16H2V2Z" fill="white" />
                </svg>


            </div>

        </a>
    </div>

</div>