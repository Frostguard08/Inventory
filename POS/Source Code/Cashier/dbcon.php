<?php 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=holidaycafedb', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(!$pdo){
    die("Fatal Error: Connection Failed!");
}
?>