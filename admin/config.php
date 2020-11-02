<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=pharma;charset=utf8','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(PDOException $error)
{
        die('Erreur : '.$error->getMessage());
}
?>