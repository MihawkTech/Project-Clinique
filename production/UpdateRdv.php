<?php 
    session_start();
    include "dbh.php";
    if (isset($_POST["UPDATE"])) {
        if(!empty($_POST["UPDATE"])) {
            $id = $_POST["id"];
                $existUserApp=$conn->query("UPDATE rendez_vous SET rendez_vous.confirmer='1' where rendez_vous.id_rdv=\"".$id."\"")->fetch_assoc();
                //if ($existUserApp){
                    echo "yes";
                //}else{
                    echo "noo";
                //}
        }
        exit();
    }
    if (isset($_POST["save"])) {
        if(!empty($_POST["save"])) {
            $idRdv = $_POST["idRdv"];
            $idst = $_POST["idst"];
            $Maladie = $_POST["Maladie"];
            $idst=$idst."";
            $existUserApp=$conn->query("UPDATE rendez_vous SET rendez_vous.confirmer='2' where rendez_vous.id_rdv=\"".$idRdv."\"")->fetch_assoc();

            $creation="insert into diagnostic(id_rdv, ids_tr, maladie) values('".$idRdv."','".$idst."','".$Maladie."')";
            if($conn->query($creation))
                echo 'Saved! ';
            else
            echo 'NOt Saved! ';
        }
        exit();
    }
    
    if (isset($_POST["saveRdv"])) {
        if(!empty($_POST["saveRdv"])) {
            $idRdv = $_POST["idRdv"];
            $idM = $_POST["idM"];
            $dateRdv = $_POST["dateRdv"];
            $idf = $_POST["idf"];

echo"**$dateRdv**";
            $query="select id_patient from rendez_vous where id_rdv=\"".$idRdv."\"";
            $existUser=$conn->query($query)->fetch_assoc();
            $id_patient=$existUser["id_patient"];

            $creation="UPDATE rendez_vous SET id_medecin='".$idM."',id_inf='".$idf."',id_patient='".$id_patient."',date_rdv='".$dateRdv."',confirmer='0' WHERE id_rdv='".$idRdv."'";
            if($conn->query($creation))
                echo 'Saved! ';
            else{
                echo 'NOt Saved! ';
                echo("Error description: " . $conn -> error);
            }


        }
        exit();
    }
    
?>