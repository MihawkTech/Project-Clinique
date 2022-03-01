<?php 
    session_start();
    include "dbh.php";
    $private = file_get_contents("../PRIVATE KEY.txt");
    $pubKey = file_get_contents("../PUBLIC KEY.txt");
    
    if (isset($_POST["userCheck"])) {
        if(!empty($_POST["userCheck"])) {
            $user = $_POST["userCheck"];
            $existUserP=$conn->query("select * from patient where email='".$user."'")->fetch_assoc();
            $existUserM=$conn->query("select * from medecin where email='".$user."'")->fetch_assoc();
            $existUserI=$conn->query("select * from infermie where email='".$user."'")->fetch_assoc();

            if ($existUserP!=null){
                echo "takenP";
            }else if ($existUserM!=null){
                echo "takenM";
            }else if ($existUserI!=null){
                echo "takenI";
            }else{
                echo "not_taken";
            }
        }
        exit();
    }
    
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $clientL = $_POST['clientL'];

        /*$captcha = $_POST["g-recaptcha-response"];
        $secretkey = "6LfddYkaAAAAADW6YZa-iDrI-cq_8dOkwZ1T9SHq";
        $url = "https://www.google.com/recaptcha/api/siteverify=" . urlencode($secretkey) . "&response=" . urlencode($captcha) . " ";
        $response = file_get_contents($url);
        $responsekey =  json_decode($response, TRUE);
        if ($responsekey["success"]) {
        //traitment login
        }
        else {
                    exit;
                }*/

        $password = $_POST['password'];
        if($clientL=="patient"){
            $query="select * from patient where email=\"".$email."\"";
            if(!$conn->query($query))
                echo("Error select: " . $conn -> error);
            $existUser=$conn->query($query)->fetch_assoc(); 
            if(!is_null($existUser["ban"])){
                $date = new DateTime('now');
                $banDate=new DateTime($existUser["ban"]);
                $dteDiff  = $date->diff($banDate);
                if($dteDiff->format("%H:%I:%S")<'00:00:30'){
                    echo "ban!";
                    exit();
                }
            }
        }
        if($clientL=="patient"){
            $query="select * from patient where email=\"".$email."\"";
            if(!$conn->query($query))
                echo("Error select: " . $conn -> error);
            $existUser=$conn->query($query)->fetch_assoc();


            if( $existUser["mdp"] == hash('sha256',$password)){
                $_SESSION['id']=$existUser["id_patient"];
                $_SESSION['email']=$existUser["email"];
                $_SESSION['nom']=$existUser["nom"];
                $_SESSION['prenom']=$existUser["prenom"];
                $_SESSION['date_n']=$existUser["date_n"];
                $_SESSION['adresse']=$existUser["adresse"];
                $_SESSION['numero_tel']=$existUser["numero_tel"];
                $_SESSION['sexe']=$existUser["sexe"];
                echo 'loginP!';
                $query1="UPDATE patient SET nbrBan='0' WHERE email='".$existUser["email"]."'";
                if(!$conn->query($query1))
                echo("Error nbrBan: " . $conn -> error);

            }else{
                echo 'errpsw!';
            if ($existUser["nbrBan"]==3) {
                $date = new DateTime('now');
                $query1="UPDATE patient SET ban=NOW(),nbrBan=0 WHERE email='".$existUser["email"]."'";
                $conn->query($query1); 
            }else {
                $i=$existUser["nbrBan"]+1;
                $query2="UPDATE patient SET nbrBan='".$i."' WHERE email='".$existUser["email"]."'";
                $conn->query($query2); 
            }
            }
            exit();


        }
        if($clientL=="medecin"){
            $query="select * from medecin where email=\"".$email."\"";
            if(!$conn->query($query))
                echo("Error select: " . $conn -> error);
            $existUser=$conn->query($query)->fetch_assoc();

            if( $existUser["mdp"] == hash('sha256',$password)){
                $_SESSION['id']=$existUser["id_medecin"];
                echo 'loginM!';

            }else{
                echo 'errpsw!';
            }
            exit();
        }
        if($clientL=="inf"){
            $query="select * from infermie where email=\"".$email."\"";
            if(!$conn->query($query))
                echo("Error select: " . $conn -> error);
            $existUser=$conn->query($query)->fetch_assoc();

            if( $existUser["mdp"] == hash('sha256',$password)){
                $_SESSION['id']=$existUser["id_inf"];
                echo 'loginI!';
            }else{
                echo 'errpsw!';
          }
        exit();


        }

    }

    if (isset($_POST['save'])) {
        $email = $_POST['email'];
        $pwd = hash('sha256',$_POST['password']);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $numtel = $_POST['numtel'];
        $adresse = $_POST['adresse'];
        $anniv = $_POST['anniv'];
        $sexe = $_POST['sexe'];
        // Encrypt the data to $encrypted using the public key
        openssl_public_encrypt($_POST['email'], $email, $pubKey);

        $creation="insert into patient(email, mdp,nom,prenom,date_n,adresse,numero_tel,sexe) values('".$email."','".$pwd."','".$nom."','".$prenom."','".$anniv."','".$adresse."','".$numtel."','".$sexe."')";
        if($conn->query($creation)){
            echo 'Saved! ';
            $query="select * from patient where email=\"".$email."\"";  
            $existUser=$conn->query($query)->fetch_assoc();
            $_SESSION['id']=$existUser["id_patient"];
            $_SESSION['email']=$existUser["email"];
            $_SESSION['nom']=$existUser["nom"];
            $_SESSION['prenom']=$existUser["prenom"];
            $_SESSION['date_n']=$existUser["date_n"];
            $_SESSION['adresse']=$existUser["adresse"];
            $_SESSION['numero_tel']=$existUser["numero_tel"];
            $_SESSION['sexe']=$existUser["sexe"];
        }else{
            //echo 'not_Saved! ';
            echo("Error select: " . $conn -> error);
        }

        exit();
    }
    ?>