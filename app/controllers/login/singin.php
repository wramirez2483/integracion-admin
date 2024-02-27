<?php

    require_once '../../config.php';

    // Si se ha enviado un post se ejecuta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Almacena en una varible el valor de los inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Encuentra el usuario en la base de datos
    $sql = "SELECT * FROM users WHERE email = :email";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    // Verifica si el usuario existe y la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        // Iniciar sesión
        $_SESSION['sesion_email'] = $email;
        $_SESSION['logueado'] = true;
        // Redirigir al usuario a la página de inicio
        header('Location:'.$URL.'/index.php');
        exit();
    } else {
        // Las credenciales son incorrectas, redirigir de vuelta al formulario de inicio de sesión
        header('Location: ../../../views/login/login.php');
        $_SESSION['error_message'] = 'Correo electrónico o contraseña incorrectos';
        exit();
    }
} else {
    // Si no se reciben datos por POST, redirigir al usuario de vuelta al formulario de inicio de sesión
    header('Location: ../../../views/login/login.php');
    exit();
}
?>
