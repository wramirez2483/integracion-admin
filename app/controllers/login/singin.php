<?php
require_once '../../config.php';
// importar el archivo de loginJosso
require_once '../../controllers/login/loginJosso.php';
require_once '../../controllers/login/lmsLogin.php';

// Verifica si se ha enviado un formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Almacena en variables los valores del formulario
    $num_id = $_POST['num_id'];
    $tipe_id = $_POST['tipe_id'];
    $password = $_POST['password'];

    // Encuentra el usuario en la base de datos por documento
    $sql = "SELECT * FROM users WHERE tipe_id = :tipe_id AND num_id = :num_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':num_id', $num_id);
    $stmt->bindParam(':tipe_id', $tipe_id);
    $stmt->execute();
    $user = $stmt->fetch();

    // Verifica si el usuario existe y la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {

        // Valida en sofia y genera un token
        $assertionId = genAssertId($num_id, $tipe_id, $password);

        // si el token esta vacio no se logeo en sofia
        if($assertionId == ''){
            $_SESSION['error_message'] = 'Error al iniciar sesion en Josso';
            header('Location: /app-integracion');
            exit;
        }

        // redirecionar nuestro login a lms
        // loginLMS($num_id,$password);
        
        // var_dump($resultLoginLMS);

        // header('Location: 192.168.1.170');

        // var_dump($assertionId);
        $_SESSION['token'] = $assertionId;
        echo $_SESSION['token'];
        
        // Iniciar sesión
        $_SESSION['document'] = $num_id;
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['logueado'] = true;
        $_SESSION['menu-toggle'] = true;
        $event = "singin";

        // Guardar registro en la tabla de auditoría con evento "signIn"
        
        $audit_sql = "INSERT INTO audit (id_user, events) VALUES (:id_user, :event)";
        $audit_stmt = $pdo->prepare($audit_sql);
        $audit_stmt->bindParam(':id_user', $num_id);
        $audit_stmt->bindParam(':event', $event); // Utilizando una consulta preparada también para $event
        $audit_stmt->execute();

        // Redirigir al usuario a la página de inicio
        header('Location: ../../../views/inicio.php');
        exit();

    } else {
        // Las credenciales son incorrectas, redirigir de vuelta al formulario de inicio de sesión
        header('Location: /app-integracion');
        $_SESSION['error_message'] = 'Información de usuario inválida';
        exit();
    }
} else {
    // Si no se reciben datos por POST, redirigir al usuario de vuelta al formulario de inicio de sesión
    header('Location: /app-integracion');
    exit();
}
?>