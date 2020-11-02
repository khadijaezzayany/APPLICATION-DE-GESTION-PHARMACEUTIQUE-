<?php
require 'config.php';

// // script for login :::::::::::::::::::::::::::::::::::::
//     session_start();
//     if(isset($_POST['valid'])){

//         $username = $_POST['username'];
//         $password = $_POST['password'];
    
    
//         $sth = $db->prepare("SELECT * FROM login WHERE username = :username ");
//         $sth->bindParam(':username',$username);
//         $sth->execute();
//         while ($row = $sth->fetch())
//         {
            
//             if ($row && ($_POST['password'] === $row['password']))
//             {
//                 header("LOCATION:dashboard.php"); 
            
//             }else{
//                 $_SESSION['message']= " Username ou Mot de passe est non Validé !";
//                 $_SESSION['msg_type']= "danger";
        
//             }
//         } 
        

//     }



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
        

        $médCode= "ali";
        $médLib= "ali";
        $médPrix= "ali";
        

        
        $stmt->bindParam(1,$médCode);
        $stmt->bindParam(2,$médLib);
        $stmt->bindParam(3,$médPrix);
        $stmt->execute();

        header("dashboard.php");
    }


    // function for  add new Fournisseur ::::::::::::::::::::::::::::::::::::

       if(isset($_POST["ajout-fournisseur"])){
        $fourNom = $_POST['fourNom'];
        $fourAdrs = $_POST['fourAdrs'];
        $fourVille = $_POST['fourVille'];
        $fourTélé = $_POST['fourTélé'];

        $sql = "INSERT INTO fournisseur (fourNom, fourAdrs, fourVille, fourTété) VALUES (:fourNom, :fourAdrs, :email, :fourTété)";

        $stmt = $db->prepare($sql);
        
        
        $stmt->bindParam(':fourNom', $_REQUEST['first_name']);
        $stmt->bindParam(':fourAdrs', $_REQUEST['fourAdrs']);
        $stmt->bindParam(':fourVille', $_REQUEST['fourVille']);
        $stmt->bindParam(':fourTété', $_REQUEST['fourTété']);
        
        
        $stmt->execute();
       }
















    
    

    ?>