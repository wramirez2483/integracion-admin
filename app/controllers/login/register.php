<?php

    include '../../config.php';

// Verificar si se ha enviado un formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = "KJDF";
    $email = $_POST['email'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $verificar_password = $_POST['verificar_password'];


    // Verificar si el correo elec  trónico ya está registrado

    $sql_check_email = "SELECT * FROM users WHERE email = :email";
    
    // Preparar la declaración

    $stmt_check_email = $pdo->prepare($sql_check_email);
    
    // Vincular parámetros
    $stmt_check_email->bindParam(':email', $email);
    
    // Ejecutar la declaración
    $stmt_check_email->execute();
    
    // Obtener los resultados
    $existing_user = $stmt_check_email->fetch();


    if ($existing_user) {
        // El correo electrónico ya está registrado, redirigir de vuelta al formulario de registro
        header('Location: ../../../views/register/register.php');
        $_SESSION['error_message'] = 'El correo electrónico ya está registrado';
        exit();
    }
    // inserta los datos en la base de datos

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Insertar el nuevo usuario en la base de datos
    $sql_insert_user = "INSERT INTO users (id, email, name, role, password) VALUES (:id, :email, :name, :role, :password)";
    $stmt_insert_user = $pdo->prepare($sql_insert_user);
    $stmt_insert_user->bindParam(':id', $id);
    $stmt_insert_user->bindParam(':email', $email);
    $stmt_insert_user->bindParam(':name', $name);
    $stmt_insert_user->bindParam(':role', $role);
    $stmt_insert_user->bindParam(':password', $hashed_password);

    if ($stmt_insert_user->execute()) {
        echo "Usuario registrado exitosamente, redirigir al formulario de inicio de sesión";
        // Usuario registrado exitosamente, redirigir al formulario de inicio de sesión
        header('Location: ../../../views/login/login.php');
        $_SESSION['success_message'] = 'Usuario registrado exitosamente';
        exit();
    } else {
        // Error al registrar al usuario, redirigir de vuelta al formulario de registro
        header('Location: ../../../views/register/register.php');
        $_SESSION['error_message'] = 'Error al registrar al usuario';
        exit();
    }
    



} else {
    // Si no se reciben datos por POST, redirigir al usuario de vuelta al formulario de registro
    header('Location: ../../../views/register/register.php');
    exit();
}

?>
