<?php 
   $sql = "SELECT status FROM platform_status";

   $stmt = $pdo->query($sql);
   $stmt->execute();

   // Obtener los resultados de la consulta
   $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container-dashboard">

    <h1>Bienvenid@ - <?php echo $_SESSION['name']; ?></h1>
    <h2>Conexiones</h2>
    <div class="info">

        
        <div class="info-connection">
            <h1>SOFIA</h1>

            <div  class="status <?php echo $resultado[0]['status'] == 1 ? 'active' : 'disabled';   ?>" id="status-sofia">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><g fill="#ffffff"><path d="M4.338 5.179a1 1 0 1 1 1.424 1.404A6.127 6.127 0 0 0 4 10.901C4 14.272 6.69 17 10 17s6-2.728 6-6.1c0-1.643-.641-3.18-1.762-4.317a1 1 0 1 1 1.424-1.404A8.127 8.127 0 0 1 18 10.9c0 4.47-3.578 8.1-8 8.1c-4.421 0-8-3.63-8-8.1c0-2.173.85-4.213 2.338-5.721"/><rect width="2" height="10.5" x="9" y="1" rx="1"/></g></svg>
            </div>
            <small  id="text-sofia"> 

                <?php echo $resultado[0]['status'] == 1 ? 'Conectado' : 'Desconectado';   ?>
                
            </small>
        </div>

        <div class="info-connection">

            <h1>LMS</h1>

            <div class="status <?php echo $resultado[1]['status'] == 1 ? 'active' : 'disabled';   ?>" id="status-lms" >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><g fill="#ffffff"><path d="M4.338 5.179a1 1 0 1 1 1.424 1.404A6.127 6.127 0 0 0 4 10.901C4 14.272 6.69 17 10 17s6-2.728 6-6.1c0-1.643-.641-3.18-1.762-4.317a1 1 0 1 1 1.424-1.404A8.127 8.127 0 0 1 18 10.9c0 4.47-3.578 8.1-8 8.1c-4.421 0-8-3.63-8-8.1c0-2.173.85-4.213 2.338-5.721"/><rect width="2" height="10.5" x="9" y="1" rx="1"/></g></svg>
            </div>
            <small  id="text-lms">
                <?php echo $resultado[1]['status'] == 1 ? 'Conectado' : 'Desconectado';   ?>

            </small>

        </div>
    </div>

    <div id="conexion"></div>
    <!-- 3 forma -->
    <script>
        // Función para realizar una solicitud al servidor y actualizar el contenido
        function actualizarConexion() {
            // Crear un objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Configurar la solicitud
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {

                    // guardar los estados en la base de datos
                    let status = JSON.parse(xhr.responseText);
                    // Actualizar el contenido del div 'conexion' con la respuesta del servidor
                    
                    let elemento_lms = document.getElementById('status-lms');
                    let text_lms = document.getElementById('text-lms')
                    let elemento_sofia = document.getElementById('status-sofia');
                    let text_sofia = document.getElementById('text-sofia')

                    // borra la clase anterior
                    elemento_sofia.classList.remove(`${status[0].status === 1 ? 'disabled' : 'active' }`);
                    // asigna la clase nueva
                    elemento_sofia.classList.add(`${status[0].status === 0 ? 'disabled' : 'active' }`);

                    text_sofia.innerHTML = status[0].status === 0 ? 'Desconectado' : 'Conectado' 
                    
                    elemento_lms.classList.remove(`${status[1].status === 1 ? 'disabled' : 'active' }`);
                    // asigna la clase nueva
                    elemento_lms.classList.add(`${status[1].status === 0 ? 'disabled' : 'active' }`);
                    text_lms.innerHTML = status[1].status === 0 ? 'Desconectado' : 'Conectado' 
                }
            };
            
            // Realizar la solicitud al servidor
            xhr.open('GET', '../app/controllers/dashboard/event_connection_platform.php', true);
            xhr.send();
        }

        // Llamar a la función de actualización cada 5 segundos
        setInterval(actualizarConexion, 5000);
    </script>

    <!-- 2 forma -->
    <?php
        // require_once '../app/config.php';


        // while(true){
        //     $sql = "SELECT * FROM platform_status";
        //     // Realizar consulta a la base de datos
        //     $stmt = $pdo->query($sql);
        //     while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
        //         var_dump($fila);
        //     }
        //     // sleep(2);
        // }
    ?>


    <!-- 1 forma -->
    <!-- <div id="data"></div> -->
<!-- 
    <script>
        const eventSource = new EventSource('../app/controllers/dashboard/event_connection_platform.php');

        eventSource.onmessage = function(event) {
            const data = JSON.parse(event.data);
            document.getElementById('data').innerHTML = `Hora: ${data.time}, Valor: ${data.value}`;
        };
    </script> -->
</div>

<script src="../helpers/scripts.js"></script>