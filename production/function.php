


<?php    
require_once("conn.php");

////////////////////////fonction qui returne le nombre totale d'ensrignant//////
function Totale($item,$table)
{
	global $con;
$nbr=$con->query("SELECT COUNT($item) FROM $table  ")->fetchColumn(); 
return $nbr;
}


/////////////////
function somme($item,$table)
{
	global $con;
$nbr=$con->query("SELECT SUM($item)
	 FROM $table  ")->fetchColumn(); 
return $nbr;
}



?>