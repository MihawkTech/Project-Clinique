
<?php

	require_once('conn.php');
	
	$NOM=$_POST['nom'];
	
	$PRENOM=$_POST['prenom'];
	$EMAIL=$_POST['email'];
	$SERVICE=$_POST['service'];
	$MODPASSE=hash('sha256', $_POST['modp']);
	
	
	
	$requete= "INSERT INTO infermie (email,mdp,nom,prenom,service) VALUES (?, ?,?,?,?)";
	
	$resultat = $con->prepare($requete);			
	$param=array($EMAIL,$MODPASSE,$NOM,$PRENOM,$SERVICE);			
	$resultat->execute($param);	



		
		
	
	header("location:form.php");
	
?>