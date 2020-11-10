<?php
session_start();
require 'config.php';

// function for filter input ::::::::::::::::::::::::::::::::::::
    function filter_data($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
       return $data;
        
    }
 
// // script for login :::::::::::::::::::::::::::::::::::::
   
    if(isset($_POST['valid'])){

        $username = filter_data($_POST['username']);
        $password = filter_data($_POST['password']);
    
    
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
// // // script for logout :::::::::::::::::::::::::::::::::::::
    if(isset($_POST['logout'])){
        // remove all session variables
    session_unset(); 

       // destroy the session 
    session_destroy(); 
        
    header("LOCATION:../index.php"); 
    }



        //FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF
    // function for  add new Fournisseur ::::::::::::::::::::::::::::::::::::

        $changefour = false;
        $fourCode="";
        $fourNom="";
        $fourAdrs="";
        $fourVille="";
        $fourTélé="";

       if(isset($_POST["ajout-fournisseur"])){
        $fourNom = filter_data($_POST['fourNom']);
        $fourAdrs = filter_data($_POST['fourAdrs']);
        $fourVille = filter_data($_POST['fourVille']);
        $fourTélé = filter_data($_POST['fourTélé']);

        $sql = "INSERT INTO fournisseur (fourNom, fourAdrs, fourVille, fourTélé) VALUES (?, ?, ?, ?)";

        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(1, $fourNom);
        $stmt->bindParam(2, $fourAdrs);
        $stmt->bindParam(3, $fourVille);
        $stmt->bindParam(4, $fourTélé);
        
        $stmt->execute();
        header('location:dashboard.php');

      
       }



          // function for  Delete  Fournisseur ::::::::::::::::::::::::::::::::::::
            if(isset($_GET['delete'])){
                $fourCode=$_GET['delete'];
        
                $stmt=$db->prepare('DELETE FROM fournisseur WHERE fourCode= :fourCode ')  ;
                $stmt->bindParam(':fourCode',$fourCode);
                $stmt->execute();
                header('location:dashboard.php');
                
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

                    $changefour= true;     // true ou false selon selon le choix : form vide  ou   recuperer les details de fournisseur in input
        
    }
    
                
}
            // edit details of foutnisseur
            if(isset($_POST['changefour'])){
                $fourCode=$_GET['edit'];
                $fourNom =filter_data ($_POST['fourNom']);
                $fourAdrs =filter_data( $_POST['fourAdrs']);
                $fourVille = filter_data($_POST['fourVille']);
                $fourTele =filter_data ($_POST['fourTélé']);  
                            
                            $stmt = $db->prepare("UPDATE fournisseur SET fourNom = :fourNom, fourAdrs = :fourAdrs, fourVille = :fourVille ,fourTélé = :fourTele  WHERE fourCode=:fourCode");
                            $stmt -> execute(array(
                                    'fourCode'=>"$fourCode",
                                    'fourNom'=>"$fourNom",
                                    'fourAdrs'=>"$fourAdrs",
                                    'fourVille'=>"$fourVille",
                                    'fourTele'=>"$fourTele",

        
                                 
                            ));
                               
                                header("location: dashboard.php");
            
                 }








            
                    //SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
                      // function for  add new Stock ::::::::::::::::::::::::::::::::::::
                        if(isset($_POST["ajout-stock"])){
                            
                            $stockNom = filter_data($_POST['stockNom']);
                            $stockQuan = filter_data($_POST['stockQuan']);
                           
                    
                            $sql = "INSERT INTO stock (stockNom, stockQuan) VALUES (?, ?)";
                    
                            $stmt = $db->prepare($sql);
                            
                            $stmt->bindParam(1, $stockNom);
                            $stmt->bindParam(2, $stockQuan);
                           
                            
                            $stmt->execute();
                            header('location:stock.php');
                    
                           }


                              // function for  Delete  Stock ::::::::::::::::::::::::::::::::::::
                            if(isset($_GET['deletestock'])){
                                $stockCode=$_GET['deletestock'];
                        
                                $stmt=$db->prepare('DELETE FROM stock WHERE stockCode= :stockCode ')  ;
                                $stmt->bindParam(':stockCode',$stockCode);
                                $stmt->execute();
                                header('location: stock.php');
                            
                            }










//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
// function for  add new Médicament ::::::::::::::::::::::::::::::::::::

    $changemedicament = false;
    $medCode="";
    $medNom="";
    $famiCode="";
    $medPrix="";
    $medQuan="";
    $stockCode="";


   if(isset($_POST["ajout-medicament"])){
    $medNom = filter_data($_POST['medNom']);
    $famiCode = filter_data($_POST['famiCode']);
    $medPrix = filter_data($_POST['medPrix']);
    $medQuan =filter_data( $_POST['medQuan']);
    $stockCode =filter_data( $_POST['stockCode']);
    

    $sql = "INSERT INTO medicament (medNom, famiCode, medPrix, medQuan,stockCode) VALUES (?, ?, ?, ?,?)";

    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(1, $medNom);
    $stmt->bindParam(2, $famiCode);
    $stmt->bindParam(3, $medPrix);
    $stmt->bindParam(4, $medQuan);
    $stmt->bindParam(5, $stockCode);
    
    $stmt->execute();
    header('location: medicament.php');

  
   }


     // function for  Delete  médicament ::::::::::::::::::::::::::::::::::::
        if(isset($_GET['deletemedicament'])){
            $medCode=$_GET['deletemedicament'];
    
            $stmt=$db->prepare('DELETE FROM medicament WHERE medCode= :medCode ')  ;
            $stmt->bindParam(':medCode',$medCode);
            $stmt->execute();
            header('location:medicament.php');
          
        }



    //  // function for  Edit  médicament ::::::::::::::::::::::::::::::::::::

    
        if(isset($_GET['editmedicament'])){
            
            $medCode=$_GET['editmedicament'];
            // select the medicament a modifier selon son id et recuperer les details de ce post
            $sth=$db->prepare('SELECT * FROM medicament I WHERE medCode = :medCode ')  ;
            $sth->bindParam(':medCode',$medCode);
            $sth->execute();
            while ($row = $sth->fetch())
            {
                $medCode=$row['medCode'];
                $medNom=$row['medNom'];
                $famiCode=$row['famiCode'];
                $medPrix=$row['medPrix'];
                $medQuan=$row['medQuan'];
                $stockCode=$row['stockCode'];

                $changemedicament= true;     // true ou false selon selon le choix : form vide  ou   recuperer les details de medicament in input
    
}

            
}



        if(isset($_POST['changemedicament'])){
            $medCode=$_GET['editmedicament'];
            $medNom = filter_data($_POST['medNom']);
            $famiCode =$_POST['famiCode'];
            $medPrix = filter_data($_POST['medPrix']);
            $medQuan =filter_data( $_POST['medQuan']);
            $stockCode =$_POST['stockCode'];
                        $stmt = $db->prepare("UPDATE medicament SET medNom = :medNom, famiCode = :famiCode, medPrix = :medPrix ,medQuan = :medQuan stockCode = :stockCode  WHERE medCode=:medCode");
                        $stmt -> execute(array(
                                'medCode'=>"$medCode",
                                'medNom'=>"$medNom",
                                'famiCode'=>"$famiCode",
                                'medPrix'=>"$medPrix",
                                'medQuan'=>"$medQuan",
                                'stockCode'=>"$stockCode",

    
                             
                        ));
                           
                            header("location: medicament.php");
        
             }
        

      

                //CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC
                 // function for  add new Commande ::::::::::::::::::::::::::::::::::::
    
           if(isset($_POST["ajout-commande"])){
            $medCode = filter_data($_POST['medCode']);
            $commQuan = filter_data( $_POST['commQuan']);
            $fourCode = filter_data($_POST['fourCode']);
    
            $sql = "INSERT INTO commande ( commDate,medCode, commQuan, fourCode) VALUES (now(), ?, ?, ?)";
    
            $stmt = $db->prepare($sql);
            
            $stmt->bindParam(1, $medCode);
            $stmt->bindParam(2, $commQuan);
            $stmt->bindParam(3, $fourCode);
            
            $stmt->execute();
            header('location: commande.php');
    

           }
            





                    //VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV
                 // function for  add new vente ::::::::::::::::::::::::::::::::::::
    
                    if(isset($_POST["ajout-vente"])){
                        $medCode = filter_data($_POST['medCode']);
                        $venteQuan = filter_data($_POST['venteQuan']);
                        $venteMontant = filter_data($_POST['venteMontant']);
                
                        $sql = "INSERT INTO vente ( venteDate,medCode, venteQuan, venteMontant) VALUES (now(), ?, ?, ?)";
                
                        $stmt = $db->prepare($sql);
                        
                        $stmt->bindParam(1, $medCode);
                        $stmt->bindParam(2, $venteQuan);
                        $stmt->bindParam(3, $venteMontant);
                        
                        $stmt->execute();
                        header('location: vent.php');
                
            
                       }
          


                
                      

    ?>