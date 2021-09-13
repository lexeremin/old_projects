<?php

$db = "curse";
$servername = "localhost";
// $login = "root";
// $password = "root";
try {
    $pdo = new PDO("mysql:host = $servername; dbname = $db", $login, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully<br>";
    }
catch(PDOException $e)
    {
    $output="Не возможно подключиться к серверу БД". $e->getMessage();
    include'output.php';
    exit();
    }

?>
