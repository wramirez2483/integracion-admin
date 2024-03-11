<div class="container-dashboard">

    <h1>Bienvenid@ - <?php echo $_SESSION['name']; ?></h1>
    <h2>Conexiones</h2>
    <div class="info">
        <div class="info-connection">

            <h1>SOFIA</h1>
            <div class="status active">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><g fill="#ffffff"><path d="M4.338 5.179a1 1 0 1 1 1.424 1.404A6.127 6.127 0 0 0 4 10.901C4 14.272 6.69 17 10 17s6-2.728 6-6.1c0-1.643-.641-3.18-1.762-4.317a1 1 0 1 1 1.424-1.404A8.127 8.127 0 0 1 18 10.9c0 4.47-3.578 8.1-8 8.1c-4.421 0-8-3.63-8-8.1c0-2.173.85-4.213 2.338-5.721"/><rect width="2" height="10.5" x="9" y="1" rx="1"/></g></svg>
            </div>
            <small class="active">Conectado</small>

        </div>
        <div class="info-connection">
            <h1>LMS</h1>
            <div class="status disabled">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><g fill="#ffffff"><path d="M4.338 5.179a1 1 0 1 1 1.424 1.404A6.127 6.127 0 0 0 4 10.901C4 14.272 6.69 17 10 17s6-2.728 6-6.1c0-1.643-.641-3.18-1.762-4.317a1 1 0 1 1 1.424-1.404A8.127 8.127 0 0 1 18 10.9c0 4.47-3.578 8.1-8 8.1c-4.421 0-8-3.63-8-8.1c0-2.173.85-4.213 2.338-5.721"/><rect width="2" height="10.5" x="9" y="1" rx="1"/></g></svg>
            </div>
            <small class="disabled">Desconectado</small>


        </div>
    </div>


</div>

<script src="../helpers/scripts.js"></script>