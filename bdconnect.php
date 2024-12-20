<?php
define ('DB_HOST','localhost');
define ('DB_USER','root');
define ('DB_PASS','');
define ('DB_Name','books');
$pdo=new PDO('mysql:host='.DB_HOST. ';dbname='.DB_Name,DB_USER,DB_PASS);
try{
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e){
    echo "erreur de connexion à la base" .$e->getMessage();
    die();
}
?>