<?php

    $host = 'localhost';
    $dbn = 'holidaycafedb';
    $dbu = 'root';
    $dbpw = '';

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbn", $dbu, $dbpw);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die("Connection Failed" . $e->getMessage());
    }