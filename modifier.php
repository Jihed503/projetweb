<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$cin=$_REQUEST['cin'];
$nom=$_REQUEST['nom'];
$prenom=$_REQUEST['prenom'];
$email=$_REQUEST['email'];
$adresse=$_REQUEST['adresse'];
//$pwd=$_REQUEST['pwd'];
//$cpwd=$_REQUEST['cpwd'];

$classe=$_REQUEST['classe'];


include("connexion.php");
        $req="update etudiant set email = '$email', nom='$nom', prenom='$prenom', adresse='$adresse', Classe='$classe' where cin = '$cin'";
                  
        $reponse = $pdo->exec($req) or die("error");
        header("location:ModifierListeEtudiants.php");
        $erreur ="OK";
        
         echo $erreur;
}
?>