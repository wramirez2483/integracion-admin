<?php

require_once '../app/controllers/josso/show_josso.php';
require_once '../app/controllers/josso/create_josso.php';
?>


<div class="container-form">
  <form class="content-form" method="post" action="../app/controllers/josso/create_josso.php">
    <input type="hidden" name="id_josso" value="<?php echo isset($id_josso) ? $id_josso : ''; ?>">
    <?php

      if (isset($_SESSION['message-created'])) {
        echo '<div class="message success">  
            <p>' . $_SESSION['message-created'] . '</p>
            <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
          </div>';
        unset($_SESSION['message-created']);
      }

      if (isset($_SESSION['error-created'])) {
        echo '<div class="message error">  
            <p>' . $_SESSION['error-created'] . '</p>
            <strong onclick="this.parentNode.style.display = \'none\';">X</strong>
          </div>';
 
        unset($_SESSION['error-created']);
      }

    ?>
    <div class="form-inputs">
      <h3>Url del servicio gateway</h3>
      <input type="text" id="url" name="url_service_gateway" class="form_input" placeholder="URL" required value="<?php echo isset($url_service_gateway) ? $url_service_gateway : ''; ?>">
    </div>

    <div class="form-inputs">
      <h3>Tiempo de espera max de respuesta sockets</h3>
      <div class="tooltip">
        <span class="tooltiptext">Segundos</span>
        <input type="number" id="time_socket" name="maximun_time_response_socket" min="0" placeholder="Segundos" required value="<?php echo isset($maximun_time_response_socket) ? $maximun_time_response_socket : '' ?>">
      </div>
    </div>

    <div class="form-inputs">
      <h3>Tiempo de espera max de respuesta Webserver</h3>
      <div class="tooltip">
        <span class="tooltiptext">Segundos</span>
        <input type="number" id="time_webservice" name="maximun_time_response_webservice" min="0" placeholder="Segundos" required value="<?php echo  isset($maximun_time_response_webservice) ? $maximun_time_response_webservice : ''; ?>">
    </div>
    </div>

    <div class="form-inputs">
      <h3>Nombre de la plataforma</h3>
      <input type="text" id="SENAPROD" name="name_plataforma" class="form_input" required value="<?php echo isset($name_plataforma) ?  $name_plataforma : ''; ?>">
    </div>

    <div class="botons">

      <input type="submit" name="Guardar" value="Guardar">
      <!-- <input type="submit" name="Regresar" value="Limpiar"> -->
    </div>

  </form>
</div>