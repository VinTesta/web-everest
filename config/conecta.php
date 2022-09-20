<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    //DESENVOLVIMENTO = migração localhost
    
    $conexao = new PDO("mysql:host=143.106.241.3;dbname=cl200275", "cl200275", "cl*15042004", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    date_default_timezone_set('America/Sao_Paulo');
} catch (Exception $e) {
    error_log($e->getMessage());
}