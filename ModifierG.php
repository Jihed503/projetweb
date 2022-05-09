<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$groupe=$_REQUEST['classe'];
$nom=$_REQUEST['nom'];

include("connexion.php");
$req="update groupe set nom = '$nom' where nom = '$groupe'";
$reponse = $pdo->exec($req) or die("error2");

$req2 = "update etudiant set Classe='$nom' where Classe='$groupe'";
$reponse2 = $pdo->exec($req2) or die("error");

header("location:ModifierGroupe.php");
}
?>