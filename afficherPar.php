<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
    $groupe=$_SESSION["groupePar"];
    if(!empty($groupe)){
        include("connexion.php");
        $req="SELECT * FROM etudiant where classe= ? order by nom ASC";
        $reponse = $pdo->prepare($req);
        $reponse->execute(array($groupe));
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
}
?>