<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");


/*
$page=$_REQUEST['page'];

$perPage = 5;

// Calculate Total pages
//$stmt = $db->query('SELECT count(*) FROM users');
$stmt = $pdo->query('select count(*) from etudiant');
$total_results = $stmt->fetchColumn();
$total_pages = ceil($total_results / $perPage);

// Current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$starting_limit = ($page - 1) * $perPage;

// Query to fetch users
//$query = "SELECT * FROM users ORDER BY id DESC LIMIT $starting_limit,$perPage";

*/

$req="select * from etudiant order by cin";//$starting_limit,$perPage";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["etudiants"]=array();
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