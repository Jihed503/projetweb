<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {

$classe=$_REQUEST['groupe'];


include("connexion.php");
         $sel=$pdo->prepare("select * from groupe where nom=? limit 1");
         $sel->execute(array($classe));
         $tab=$sel->fetchAll();
         if(count($tab)>0){
            $erreur="NOT OK";// Etudiant existe déja
            $_SESSION["ajout"]="not ok";
            header("location:AjouterGroupe.php");
         }
         else{
            $_SESSION["groupe"]=$classe;
            $req="insert into groupe(nom) values ('$classe')";
            $reponse = $pdo->exec($req) or die("error");
            
            //recuperer l'id de ce groupe
            $idg=0;
            $req="select id FROM groupe where nom='$classe'";
            $reponse = $pdo->query($req);
            if($reponse->rowCount()>0) {
               while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
                  $idg = $row["id"];
               }
            }

            $req="insert into ens_grp (idEnseignant, idGroupe) values (".$_SESSION['id'].", $idg)";

            $reponse = $pdo->exec($req) or die("error");
        

            $erreur ="OK";
            $_SESSION["ajout"]="ok";
            header("location:AjouterGroupe.php");
         }
}
?>