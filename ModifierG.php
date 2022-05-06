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
            $_SESSION["modG"]="not ok";
            header("location:SupprimerGroupe.php");
         }
         else{
            $sel=$pdo->prepare("UPDATE groupe SET nom=? where nom=?");
            $sel->execute(array($groupe));
            $sel=$pdo->prepare("UPDATE groupe SET classe=? WHERE classe=?");
            $sel->execute(array($groupe));
            //$erreur ="OK";
            $_SESSION["modG"]="ok";
            header("location:SupprimerGroupe.php");
         }  
         echo $erreur;
}
?>