<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$cin=$_REQUEST['cin'];


include("connexion.php");
         $sel=$pdo->prepare("select cin from etudiant where cin=? limit 1");
         $sel->execute(array($cin));
         $tab=$sel->fetchAll();
         if(count($tab)==0){
           // $erreur="NOT OK";// Etudiant existe déja
            $_SESSION["supp"]="not ok";
            header("location:SupprimerListeEtudiants.php");
         }
         else{
            $sel=$pdo->prepare("delete from etudiant where cin=?");
            $sel->execute(array($cin));
            //$erreur ="OK";
            $_SESSION["supp"]="ok";
            header("location:SupprimerListeEtudiants.php");
         }  
         echo $erreur;
}
?>