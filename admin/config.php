<?php
$dsn = 'mysql:host=localhost; dbname=pharma';
$user = 'root';
$pass = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',
);

try{
    $db = new PDO($dsn, $user, $pass, $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOExeption $e)
{
    echo 'Failed!' . $e->getMessage();
}
// try
// {
//     $db = new PDO('mysql:host=localhost;dbname=pharma;charset=utf8','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// }
// catch(PDOException $error)
// {
//         die('Erreur : '.$error->getMessage());
// }
?>