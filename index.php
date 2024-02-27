<?php 
    require_once ('./guards/validationLogin.php');
    validarLogin();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Hola usuario</h1>
    <form action="../www.app-integration.com/app/controllers/login/logout.php" method="POST">
    <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>