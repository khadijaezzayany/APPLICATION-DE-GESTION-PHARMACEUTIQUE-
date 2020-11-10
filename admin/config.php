<?php
$dsn = 'mysql:host=localhost; dbname=pharma';
$user = 'root';
$pass = '';


try{
    $db = new PDO($dsn, $user, $pass,);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOExeption $e)
{
    echo 'Failed!' . $e->getMessage();
}

?>