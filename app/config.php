<?php

session_start();

define('APP_NAME', 'APP Integracion');
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('PUERTO', '3306');
define('BD', 'db_integracion');

// Intenta conectarte a la base de datos
try {
    $servidor = "mysql:host=".SERVIDOR.";port=".PUERTO.";dbname=".BD;
    $pdo = new PDO($servidor, USUARIO, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa con la base de datos";
} catch(PDOException $e) {
    // echo "Error: No se pudo conectar a la base de datos: " . $e->getMessage();
}

date_default_timezone_set("America/Bogota");
$fechaHora = date('Y-m-d H:i:s');
