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



// function for filter input ::::::::::::::::::::::::::::::::::::
 function filter_data($data){
     $date = trim($data);
     $date = htmlspecialchars($data);
     $date = stripcslashes($data);
     
 }


// function for  add new Médicament ::::::::::::::::::::::::::::::::::::

    if(isset($_POST['médajout'])){
        
        $médCode = filter_data($_POST['médCode']);
        $médLib = filter_data($_POST['médLib']);
        $médPrix = filter_data($_POST['médPrix']);
        
        $stmt =$db->prepare("INSERT INTO médicament (médCode, médLib, médPrix)
        VALUES (?, ?, ?)");
        
        $stmt->bindParam(':médCode',$médCode);
        $stmt->bindParam(':médLib',$médLib);
        $stmt->bindParam(':médPrix',$médPrix);
        $stmt->execute();
    }


















    
    

    ?>