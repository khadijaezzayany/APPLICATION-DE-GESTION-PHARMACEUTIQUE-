<?php
require 'config.php';

// script for login :::::::::::::::::::::::::::::::::::::
    session_start();
    if(isset($_POST['valid'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
    
    
        $sth = $db->prepare("SELECT * FROM login WHERE username = :username ");
        $sth->bindParam(':username',$username);
        $sth->execute();
        while ($row = $sth->fetch())
        {
            
            if ($row && ($_POST['password'] === $row['password']))
            {
                header("LOCATION:dashboard.php"); 
            
            }else{
                $_SESSION['message']= " Username ou Mot de passe est non Validé !";
                $_SESSION['msg_type']= "danger";
        
            }
        } 
        

    }

?>