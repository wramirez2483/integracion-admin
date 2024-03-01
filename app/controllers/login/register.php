<?php
// Incluye el archivo de configuración y comienza la sesión
require_once '../../config.php';

// Verifica si se ha enviado un formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $tipe_id = $_POST['tipe_id'];
    $num_id = $_POST['num_id'];
    $password = $_POST['password'];
    $verificar_password = $_POST['verificar_password'];

    // Verifica si el num_id ya está registrado
    $sql_check_num_id = "SELECT * FROM users WHERE num_id = :num_id";
    
    // Prepara la declaración
    $stmt_check_num_id = $pdo->prepare($sql_check_num_id);
    
    // Vincula parámetros
    $stmt_check_num_id->bindParam(':num_id', $num_id);
    
    // Ejecuta la declaración
    $stmt_check_num_id->execute();
    
    // Obtiene los resultados
    $existing_user_id = $stmt_check_num_id->fetch();
    
    // Verifica si el email ya está registrado
    $sql_check_email = "SELECT * FROM users WHERE email = :email";
    
    // Prepara la declaración
    $stmt_check_email = $pdo->prepare($sql_check_email);
    
    // Vincula parámetros
    $stmt_check_email->bindParam(':email', $email);
    
    // Ejecuta la declaración
    $stmt_check_email->execute();
    
    // Obtiene los resultados
    $existing_user_email = $stmt_check_email->fetch();

    if (($existing_user_id) || ($existing_user_email)) {
        // El num_id ya está registrado, redirige de vuelta al formulario de registro
        $_SESSION['error_message'] = 'El número de identificación y/o el correo ya se encuentran registrados en el sistema';
        header('Location: ../../../views/register/register.php');
        exit();
    }

    // Verifica que las contraseñas coincidan
    if ($password !== $verificar_password) {
        // Las contraseñas no coinciden, redirige de vuelta al formulario de registro
        $_SESSION['error_message'] = 'Las contraseñas no coinciden';
        header('Location: ../../../views/register/register.php');
        exit();
    }

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Antes de la preparación, mueve esta línea aquí
    $date_created = date('Y-m-d H:i:s'); // Obtener la fecha actual en el formato adecuado

    // Durante la inserción
    $sql_insert_user = "INSERT INTO users (email, name, role, tipe_id, num_id, password, date_created) VALUES (:email, :name, :role, :tipe_id, :num_id, :password, :date_created)";

    // Preparar la declaración después de la asignación de $date_created
    
    $stmt_insert_user = $pdo->prepare($sql_insert_user);
    $stmt_insert_user->bindParam(':email', $email);
    $stmt_insert_user->bindParam(':name', $name);
    $stmt_insert_user->bindParam(':role', $role);
    $stmt_insert_user->bindParam(':tipe_id', $tipe_id);
    $stmt_insert_user->bindParam(':num_id', $num_id);
    $stmt_insert_user->bindParam(':password', $hashed_password);
    $stmt_insert_user->bindParam(':date_created', $date_created);

    if ($stmt_insert_user->execute()) {
        // Usuario registrado exitosamente, redirige al formulario de inicio de sesión
        $_SESSION['success_message'] = 'Usuario registrado exitosamente';
        header('Location: ../../../index.php');
        exit();
    } else {
        // Error al registrar al usuario, redirige de vuelta al formulario de registro
        $_SESSION['error_message'] = 'Error al registrar al usuario';
        header('Location: ../../../views/register/register.php');
        exit();
    }
} else {
    // Si no se reciben datos por POST, redirige al usuario de vuelta al formulario de registro
    header('Location: ../../../views/register/register.php');
    exit();
}
?>
