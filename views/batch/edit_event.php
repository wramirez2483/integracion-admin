<?php
    require_once '../../app/controllers/batch/edit_event.php';
    // require_once '../../guards/validationLogin.php';
    // validarLogin();

?>
<!-- Formulario HTML para editar el evento -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/main.css">

    <title>Editar Evento</title>
</head>
<body>
    <header> Editar Evento </header>
    <div class="container-form">
        <form action="../../app/controllers/batch/update_event.php" method="POST" class="content-form">
            <input type="hidden" name="event_seed_code" value="<?php echo $event_seed_code; ?>">
            
            <div class="form-inputs">
                <h3 for="modality">Modalidad</h3>
                <select name="modality" id="modality" required>
                    <option value="">Seleccione</option>
                    <option value="A" <?php if ($modality === 'A') echo 'selected'; ?>>A = Presencial</option>
                    <option value="V" <?php if ($modality === 'V') echo 'selected'; ?>>V = Virtual</option>
                </select>
            </div>
    
            <div class="form-inputs">
                <h3 for="training">Entrenamiento</h3>
                <select name="training" id="training" required>
                    <option value="">Seleccione</option>
                    <option value="2" <?php if ($training === '2') echo 'selected'; ?>>2</option>
                    <option value="6" <?php if ($training === '6') echo 'selected'; ?>>6</option>
                </select>
            </div>
    
            <div class="form-inputs">
                <h3 for="seed_code">Código Semilla</h3>
                <input type="text" name="seed_code" id="seed_code" placeholder="Semilla" value="<?php echo htmlspecialchars($seed_code); ?>" required>
            </div>
            <div class="botons">
                <input type="submit" name="update_event" value="Actualizar">
                <button> 
                    <a href="../batch.php">Cancelar</a>
                </button>
                
            </div>
        </form>

    </div>
</body>
</html>