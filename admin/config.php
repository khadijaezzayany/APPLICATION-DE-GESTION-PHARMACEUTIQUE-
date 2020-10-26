<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=pharmacy;charset=utf8','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(PDOException $error)
{
        die('Erreur : '.$error->getMessage());
}
?>