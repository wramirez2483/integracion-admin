<?php
require_once '../../config.php';

// Mensaje de depuración
// echo "Script de inicio de sesión alcanzado.";

// Verifica si se ha enviado un formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Almacena en variables los valores del formulario
    $num_id = $_POST['num_id'];
    $tipe_id = $_POST['tipe_id'];
    $password = $_POST['password'];

    // Mensaje de depuración
    // echo "Datos del formulario recibidos: email=$email, password=$password";

    // Encuentra el usuario en la base de datos por email
    $sql = "SELECT * FROM users WHERE  tipe_id = :tipe_id AND num_id = :num_id ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':num_id', $num_id);
    $stmt->bindParam(':tipe_id', $tipe_id);
    $stmt->execute();
    $user = $stmt->fetch();

    // Mensaje de depuración
    // if(!$user) {
    //     $_SESSION['error_message'] = 'Correo electrónico o contraseña incorrectos';
    //     exit();
    // }
    // Verifica si el usuario existe y la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        // Iniciar sesión
        $_SESSION['document'] = $num_id;
        $_SESSION['logueado'] = true;

        // Mensaje de depuración
        echo "Usuario autenticado correctamente.";

        // Redirigir al usuario a la página de inicio
        header('Location: ../../../views/inicio.php');
        exit();

    } else {

        // Las credenciales son incorrectas, redirigir de vuelta al formulario de inicio de sesión
        header('Location: /app-integracion');
        // var_dump(password_verify($password, $user['password']));
        // var_dump($password);
        // var_dump($user);

        $_SESSION['error_message'] = 'Información de usuairo inválida';
        exit();
        
    }
} else {
    // Si no se reciben datos por POST, redirigir al usuario de vuelta al formulario de inicio de sesión
    header('Location: /app-integracion');
    exit();
}
?>
