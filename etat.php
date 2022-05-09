<?php

 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
    $id = $_SESSION['id'];
include("connexion.php");


$classe = $_REQUEST['classe'];
$debut = $_REQUEST['debut'];
$fin = $_REQUEST['fin'];
$outputs['date'] = $debut."||".$fin;

$req="select *, count(justifie) as justifie, count(nonJustifie) as nonjustifie 
        from absence where groupe='$classe'
        and date between '$debut' and '$fin'
        group by cin";
$reqg="select * from groupe as g inner join ens_grp as eg 
on g.id=eg.idGroupe where eg.idEnseignant=$id";

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
        $etudiant["justifie"] = $row["justifie"];
        $etudiant["nonjustifie"] = $row["nonjustifie"];
        $etudiant["total"] = $row["justifie"]+$row["nonjustifie"];
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

