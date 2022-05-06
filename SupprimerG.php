<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$groupe=$_REQUEST['classe'];


include("connexion.php");
         $sel=$pdo->prepare("select * from groupe where nom=? limit 1");
         $sel->execute(array($groupe));
         $tab=$sel->fetchAll();
         if(count($tab)==0){
           // Aucun groupe
            $_SESSION["suppG"]="not ok";
            header("location:SupprimerGroupe.php");
         }
         else{
            $sel=$pdo->prepare("delete from groupe where nom=?");
            $sel->execute(array($groupe));
            $sel=$pdo->prepare("delete from etudiant  where classe=?");
            $sel->execute(array($groupe));
            //$erreur ="OK";
            $_SESSION["suppG"]="ok";
            header("location:SupprimerGroupe.php");
         }  
         echo $erreur;
}
?>