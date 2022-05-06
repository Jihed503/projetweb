<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");


$classe = $_REQUEST['classe'];
//$classe = "INFO1-B";

$req="select * from etudiant where Classe='$classe'";//$starting_limit,$perPage";
$reqg="SELECT * FROM groupe  order by nom ASC ";

$reponse = $pdo->query($req);
$reponseg = $pdo->query($reqg);

if(($reponse->rowCount()>0) && ($reponseg->rowCount()>0)) {
	$outputs["etudiants"]=array();
    $outputs["groupes"]=array();
    
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $etudiant = array();
        $etudiant["cin"] = $row["cin"];
        $etudiant["nom"] = $row["nom"];
        $etudiant["prenom"] = $row["prenom"];
        $etudiant["adresse"] = $row["adresse"];
        $etudiant["email"] = $row["email"];
        $etudiant["classe"] = $row["Classe"];
         array_push($outputs["etudiants"], $etudiant);
    }

while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
    $groupe = array();
    $groupe["nom"] = $row["nom"];
    array_push($outputs["groupes"], $groupe);
}
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas d'étudiants";
    // echo no users JSON
    echo json_encode($outputs);
}
}
?>