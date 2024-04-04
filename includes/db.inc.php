<?php

//if(extension_loaded("pdo_mysql")){
//   echo "You have PDO for MySql driver installed";
//} else {
    //echo "PDO driver for MySQL is not installed in your system";
//}

$dsn = "mysql:host=localhost;dbname=OnlineMarket";
$dbusername = "Massimo";
$dbusername = "Massimo";
$dbpassword = "Massimo2007";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "\n Failed: " . $e->getMessage();
}