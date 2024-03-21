<?php

// session_start();

define('SERVIDOR_PG', 'localhost');
define('USUARIO_PG', 'postgres');
define('PASSWORD_PG', '123');
define('PUERTO_PG', '5433');
define('BD_PG', 'db_integracion');

// Intenta conectarte a la base de datos
try {
    $servidor = "pgsql:host=".SERVIDOR_PG.";port=".PUERTO_PG.";dbname=".BD_PG;
    $pdo = new PDO($servidor, USUARIO_PG, PASSWORD_PG);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa con la base de datos";
} catch(PDOException $e) {
    // echo "Error: No se pudo conectar a la base de datos: " . $e->getMessage();
}
