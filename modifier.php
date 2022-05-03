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
$pwd=$_REQUEST['pwd'];
$cpwd=$_REQUEST['cpwd'];

$classe=$_REQUEST['classe'];


include("connexion.php");
         $sel=$pdo->prepare("select cin from etudiant where cin=? limit 1");
         $sel->execute(array($cin));
         $tab=$sel->fetchAll();
         if(count($tab)==0)
            $erreur="NOT OK";// Etudiant n'existe pas
         else{
            //$req="delete from etudiant where cin=$cin;insert into etudiant values ($cin,'$email',md5('$pwd'),'$nom','$prenom','$adresse','$classe')";
            //$req="UPDATE etudiant
            //      SET 'email' = $email, password= md5('$pwd'), 'nom'=$nom, 'prenom'=$prenom, 'adresse'=$adresse, 'classe'=$classe
            //      WHERE cin = $cin;"
            $req="update etudiant set email = '$email', password= md5('$pwd'), nom='$nom', prenom='$prenom', adresse='$adresse', Classe='$classe' where cin = '$cin'";
                  
            $reponse = $pdo->exec($req) or die("error");
            header("location:ModifierEtudiants.php");
            $erreur ="OK";
         }
         echo $erreur;
}
?>