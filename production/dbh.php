<?php 
$bdd="cabinet";
$pwd="";
$user="root";
$host="localhost";
$conn=new mysqli($host,$user,$pwd,$bdd);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>