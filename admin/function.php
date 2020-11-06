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

//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
// function for  add new Médicament ::::::::::::::::::::::::::::::::::::

        // $change = false;
        $medCode="";
        $famiCode="";
        $medNom="";
        $medPrix="";
        $medQuan="";


       if(isset($_POST["ajout-medicament"])){
        $medNom = $_POST['medNom'];
        $famiCode = $_POST['famiCode'];
        $medPrix = $_POST['medPrix'];
        $medQuan = $_POST['medQuan'];

        $sql = "INSERT INTO medicament (medNom, famiCode, medPrix, medQuan) VALUES (?, ?, ?, ?)";

        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(1, $medNom);
        $stmt->bindParam(2, $famiCode);
        $stmt->bindParam(3, $medPrix);
        $stmt->bindParam(4, $medQuan);
        
        $stmt->execute();
        header('location: dashboard.php');

        // exit;
        // $_SESSION['response']="Successfully inserted to the databese";
        // $_SESSION['rest_type']="success";
       }







         // function for  Delete  médicament ::::::::::::::::::::::::::::::::::::
            if(isset($_GET['deletee'])){
                $medCode=$_GET['deletee'];
        
                $stmt=$db->prepare('DELETE FROM medicament WHERE medCode= :medCode ')  ;
                $stmt->bindParam(':medCode',$medCode);
                $stmt->execute();
                header('location: dashboard.php');
                // $_SESSION['response']="Successfully Deleted!";
                // $_SESSION['res_type']="danger";
            }



         // function for  Edit  médicament ::::::::::::::::::::::::::::::::::::

            if(isset($_GET['editt'])){
    
                $id = $_GET['editt'];
            
                // select the medicament a modifier selon son id et recuperer les details de ce post
                $sth=$db->prepare('SELECT * FROM medicament INNER JOIN famille ON medicament.famiCode = famille.famiCode  WHERE medCode = :medCode ')  ;
                $sth->bindParam(':medCode',$medCode);
                $sth->execute();
                while ($row = $sth->fetch())
                {
                    $medCode=$row['medCode'];
                    $medNom=$row['medNom'];
                    $famiCode=$row['famiCode'];
                    $medPrix=$row['medPrix'];
                    $medQuan=$row['medQuan'];
            
                    $update = true;     // true ou false selon selon le choix : form vide  ou   recuperer les details de projet in input
                    
                }
            
                
            
            
            }





















            
    //FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF
    // function for  add new Fournisseur ::::::::::::::::::::::::::::::::::::

        $change = false;
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

                    $change = true;     // true ou false selon selon le choix : form vide  ou   recuperer les details de fournisseur in input
        
    }
    
                
}
            // edit details of foutnisseur
            // if(isset($_POST[change])){
                
                    // $fourCode = $_POST['fourCode'];
                    // $fourNom = $_POST['fourNom'];
                    // $fourAdrs = $_POST['fourAdrs'];
                    // $fourVille = $_POST['fourVille'];
                    // $fourTélé = $_POST['fourTélé'];

            //         $sql = "UPDATE fournisseur SET fourNom=?, fourAdrs=?, fourVille=?, fourTélé=? WHERE fourCode=$fourCode";

            //         $stmt = $db->prepare($sql);

            //         $stmt->bindParam(1, $fourNom);
            //         $stmt->bindParam(2, $fourAdrs);
            //         $stmt->bindParam(3, $fourVille);
            //         $stmt->bindParam(4, $fourTélé);

            //         $stmt->execute();
            //         header('location:fournisseur.php');
            // }

            if(isset($_POST['change'])){
                $fourCode=$_GET['edit'];
                $fourNom = $_POST['fourNom'];
                $fourAdrs = $_POST['fourAdrs'];
                $fourVille = $_POST['fourVille'];
                $fourTele = $_POST['fourTélé'];  
                            
                            $stmt = $db->prepare("UPDATE fournisseur SET fourNom = :fourNom, fourAdrs = :fourAdrs, fourVille = :fourVille ,fourTélé = :fourTele  WHERE fourCode=:fourCode");
                            $stmt -> execute(array(
                                    'fourCode'=>"$fourCode",
                                    'fourNom'=>"$fourNom",
                                    'fourAdrs'=>"$fourAdrs",
                                    'fourVille'=>"$fourVille",
                                    'fourTele'=>"$fourTele",

        
                                 
                            ));
                               
                                // $err = "Your image path is updated successfuly";
                                header("location: fournisseur.php");
            
                 }
            
            

    ?>