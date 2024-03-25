<?php

require_once "../../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // variables del formulario
    $program_type = $_POST['program_type'];
    $education_level = $_POST['education_level'];
    $code = $_POST['code'];
    $prog_name = $_POST['prog_name'];
    $design_version = $_POST['design_version'];
    $seed_version = $_POST['seed_version'];
    $current_version = true;
    $status = $_POST['status'];
    $modality = $_POST['modality'];
    // formato semilla id
    $seed_id = $code . "_" . strtoupper($design_version) . "_" . $modality. "_" . $seed_version;

    //Verificar si el código sigue el formato esperado
    if (!preg_match('/^\d+_\d+_\w+_\d+$/', $seed_id)) {
        // Si el código no sigue el formato esperado, muestra un mensaje de error
        $_SESSION['error_message_events'] = 'El código debe ser como el siguiente ejemplo "2560119_1_presencial_1"';
        header('Location: ../../../views/seed.php');
        exit();
    }

    // Consulta para verificar si ya existe un evento con el mismo código de semilla
    $sql_check_seed = "SELECT * FROM seeds WHERE program_type = :program_type AND code = :code AND modality = :modality AND current_version = 1";
    $stmt_check_seed = $pdo->prepare($sql_check_seed);
    $stmt_check_seed->bindParam(':program_type', $program_type);
    $stmt_check_seed->bindParam(':code', $code);
    $stmt_check_seed->bindParam(':modality', $modality);
    $stmt_check_seed->execute();
    $old_seed_record = $stmt_check_seed->fetch();

    // si no existe un evento con el mismo codigo
    if ($old_seed_record != null) {
        
        if ($old_seed_record["design_version"] == $design_version && $old_seed_record["seed_version"] == $seed_version ) {
            $_SESSION['error_message_events'] = 'Ya se encuentra registrada una semilla con esa información';
            header('Location: ../../../views/seed.php');
            exit();
        }
        
        $sql_update_previous_seed = "UPDATE seeds SET current_version = 0 WHERE id_seed = :old_seed_id";
        $stmt_update_previous_seed = $pdo->prepare($sql_update_previous_seed);
        $stmt_update_previous_seed->bindParam(':old_seed_id', $old_seed_record["id_seed"]);
        $stmt_update_previous_seed->execute();
    }

    $sql_insert_seed = "INSERT INTO seeds (
        program_type, 
        education_level,
        code,
        id_seed,
        prog_name,
        design_version,
        seed_version,
        current_version,
        status,
        modality
    ) VALUES (
        :program_type, 
        :education_level,
        :code,
        :seed_id,
        :prog_name,
        :design_version,
        :seed_version,
        :current_version,
        :status,
        :modality
    )";
    
    $stmt_insert_seed = $pdo->prepare($sql_insert_seed);
    $stmt_insert_seed->bindParam(':program_type', $program_type);
    $stmt_insert_seed->bindParam(':education_level', $education_level);
    $stmt_insert_seed->bindParam(':code', $code);
    $stmt_insert_seed->bindParam(':seed_id', $seed_id);
    $stmt_insert_seed->bindParam(':prog_name', $prog_name);
    $stmt_insert_seed->bindParam(':design_version', $design_version);
    $stmt_insert_seed->bindParam(':seed_version', $seed_version);
    $stmt_insert_seed->bindParam(':current_version', $current_version);
    $stmt_insert_seed->bindParam(':status', $status);
    $stmt_insert_seed->bindParam(':modality', $modality);

    if ($stmt_insert_seed->execute()) {
        // Seed registrado exitosamente
        $_SESSION['success_message'] = 'Semilla registrada exitosamente';
        header('Location: ../../../views/seed.php');
    } else {
        // Error al registrar el evento
        $_SESSION['error_message_events'] = 'Error al registrar la semilla';
        header('Location: ../../../views/seed.php');
    }
}
?>
