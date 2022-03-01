<?php 
    session_start();
    include "dbh.php";
//echo("Error description: " . $conn -> error);

 /*   if(isset($_POST['email']) && isset($_POST['password']))
    {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($user!== "" && $password !== "")
        {
            $query= "SELECT * FROM patient where email=\"".$email."\"";

            $existUser=$conn->query($query)->fetch_assoc();
            if( $existUser["psw"] == $password){
                $_SESSION['id']=$existUser["id_patient"];
                $_SESSION['email']=$existUser["email"];
                $_SESSION['nom']=$existUser["nom"];
                $_SESSION['prenom']=$existUser["prenom"];
                $_SESSION['date_n']=$existUser["date_n"];
                $_SESSION['adresse']=$existUser["adresse"];
                $_SESSION['numero_tel']=$existUser["numero_tel"];
                $_SESSION['sexe']=$existUser["sexe"];
                header('Location: Home.php');
            }
            else
            {
               header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
        }
 
    }*/

   //prendre un rendez vous 
   if (isset($_POST['symptome'])){
        $symptome = $_POST['symptome'];
        $id_p = $_SESSION['id'];
        

        $query1="INSERT into rendez_vous(id_patient,symptomes) values('$id_p','$symptome')";
        if(mysqli_query($conn, $query1)){
           
            echo "Votre demande de rendez-vous va etre traiter.";
            
        } else{
            echo "ERROR: Could not able to execute $query1. " . mysqli_error($conn);
        }
        exit();
   }


       if (isset($_POST['reclamation']))
       {
            $reclamation = $_POST['reclamation'];
            $id_p = $_SESSION['id'];
            $id_medecin = $_POST['id_medecin'];
            if ($reclamation!== "")
            {
                $query2="INSERT into reclamation(id_patient,id_medecin, reclamation) values('$id_p','$id_medecin','$reclamation')";
                if(mysqli_query($conn, $query2)){
                    echo "Votre Avis a été envoyer Merci.";
                } else{
                    echo "ERROR: Could not able to execute $query2. " . mysqli_error($conn);
                }
           }
           exit();
      }
      
      if (isset($_POST['id_rdv']))
      {
        
        $_SESSION['id_rdv']=$_POST['id_rdv'];
        $_SESSION['date_rdv']=$_POST['date_rdv'];
        if($_SESSION['id_rdv']!== ""){
           
          
            
        } else{
            echo "ERROR: page" ;
        }





      }

       
        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
       // $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
      //  $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
  
    ?>

    