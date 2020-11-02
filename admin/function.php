<?php
require 'config.php';
session_start();

 
// // script for login :::::::::::::::::::::::::::::::::::::
   
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
     $data = trim($data);
     $data = htmlspecialchars($data);
     $data = stripcslashes($data);
     
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

        $update = false;
        $fourCode="";
        $fourNom="";
        $fourAdrs="";
        $fourVille="";
        $fourTélé="";

       if(isset($_POST["ajout-fournisseur"])){
        $fourNom = $_POST['fourNom'];
        $fourAdrs = $_POST['fourAdrs'];
        $fourVille = $_POST['fourVille'];
        $fourTélé = $_POST['fourTélé'];

        $sql = "INSERT INTO fournisseur (fourNom, fourAdrs, fourVille, fourTélé) VALUES (?, ?, ?, ?)";

        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(1, $fourNom);
        $stmt->bindParam(2, $fourAdrs);
        $stmt->bindParam(3, $fourVille);
        $stmt->bindParam(4, $fourTélé);
        
        $stmt->execute();
        header('location:fournisseur.php');

        // exit;
        // $_SESSION['response']="Successfully inserted to the databese";
        // $_SESSION['rest_type']="success";
       }



          // function for  Delete  Fournisseur ::::::::::::::::::::::::::::::::::::
            if(isset($_GET['delete'])){
                $fourCode=$_GET['delete'];
        
                $stmt=$db->prepare('DELETE FROM fournisseur WHERE fourCode= :fourCode ')  ;
                $stmt->bindParam(':fourCode',$fourCode);
                $stmt->execute();
                header('location:fournisseur.php');
                // $_SESSION['response']="Successfully Deleted!";
                // $_SESSION['res_type']="danger";
            }

    


          // function for  Edit  Fournisseur ::::::::::::::::::::::::::::::::::::
            if(isset($_GET['edit'])){
                
                $fourCode=$_GET['edit'];
                // select the fournisseur a modifier selon son id et recuperer les details de ce post
                $sth=$db->prepare('SELECT * FROM fournisseur I WHERE fourCode = :fourCode ')  ;
                $sth->bindParam(':fourCode',$fourCode);
                $sth->execute();
                while ($row = $sth->fetch())
                {
                    $fourCode=$row['fourCode'];
                    $fourNom=$row['fourNom'];
                    $fourAdrs=$row['fourAdrs'];
                    $fourVille=$row['fourVille'];
                    $fourTélé=$row['fourTélé'];

                    $update = true;     // true ou false selon selon le choix : form vide  ou   recuperer les details de fournisseur in input
        
    }
    
                
}
            // edit details of foutnisseur
            if(isset($_POST[update])){
                
                    $fourCode = $_POST['fourCode'];
                    $fourNom = $_POST['fourNom'];
                    $fourAdrs = $_POST['fourAdrs'];
                    $fourVille = $_POST['fourVille'];
                    $fourTélé = $_POST['fourTélé'];

                    $sql = "UPDATE fournisseur SET fourNom=?, fourAdrs=?, fourVille=?, fourTélé=? WHERE fourCode=?";

                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(1, $fourNom);
                    $stmt->bindParam(2, $fourAdrs);
                    $stmt->bindParam(3, $fourVille);
                    $stmt->bindParam(4, $fourTélé);

                    $stmt->execute();
                    header('location:fournisseur.php');
            }

    ?>