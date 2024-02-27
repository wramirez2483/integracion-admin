<?php

define('APP_NAME','APP Integración');
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','db_integration');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "conexión exitosa con la base de datos";
}catch (PDOException $e){
   // print_r($e);
    echo "error no se pudo conectar a la base de datos";
}


$URL = "http://localhost/www.app-integration.com";

date_default_timezone_set("America/Bogota");
$fechaHora = date('Y-m-d H:i:s');