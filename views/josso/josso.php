<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Josso</title>
</head>
<body style="text-align:center;">
    <div class="form__container">
        <h2 class="form_title">Integracion Josso</h2>


     <div class ="form_group">
          <h3>Url del servicio gateway</h3>
        <input type="url" id= "url" name="url" class="form_input" placeholder="URL" required>
        <label for="url" class="form_label"></label>
        <span class="form_line"></span>
      </div>

      <div class ="form_group">
          <h3>Tiempo de espera max de respuesta sockets</h3>
        <input type="number" id= "numericlnput" min="0" max="60" placeholder="Minutos" required>
        <label for="numericlnput" class="form_label"></label>
        <span class="form_line"></span>
      </div>

      <div class ="form_group">
            <h3>Tiempo de espera max de respuetsa Webserver</h3> 
            <input type="number" id= "numericlnput" min="0" max="60" placeholder="Minutos" required>
            <label for="numericlnput" class="form_label"></label>
            <span class="form_line"></span>
      </div>

      <div class ="form_group">
        <h3>Nombre de la plataforma</h3>
        <input type="SENAPROD" id= "SENAPROD" name="SENAPROB" class="form_input" placeholder="SENAPROD" required>
        <label for="SENAPROD" class="form_label"></label>
        <span class="form_line"></span>
      </div>
<div class = "form_input">

        <input type = "submit" name="Guardar" value="Guardar">
        <input type = "submit" name = "Regresar" value = "Regresar">
</div>
    </div>
    
</body>
</html>