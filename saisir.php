<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
    @$groupe=$_REQUEST['classe'];
    @$module=$_REQUEST['module'];
    @$checklist=$_REQUEST['check'];
/*    
    foreach($checklist as $check){
        echo $check."||";
    }
*/

    include("connexion.php");
    if($checklist){
    foreach($checklist as $check){ // Loop over les absences
        // 26/4/2022_PM_nj_14235782_Selmi_Jihed
        //convert string date to sql Date : CAST('12/01/2019' as date)
        // explode string to array : explode(" ",$str)
        $infos = explode("_", $check); // ['26/4/2022', 'PM', 'nj', '14235782', 'Selmi', 'Jihed']
        $date = $infos[0];
        $datex = explode("/", $date);
        $date = $datex[2]."-".$datex[1]."-".$datex[0];
        $justifiee = $infos[2];
        $cin = $infos[3];
        $nom = $infos[4];
        $prenom = $infos[5];

        $sel=$pdo->prepare("select * from absence where cin=? and date=? and matiere=?");
        $sel->execute(array($cin, $date, $module));
        $tab=$sel->fetchAll();

        // insertion
        if(count($tab)==0){
            if($justifiee=="j")
                $req="insert into absence (cin, nom, prenom, justifie, nonJustifie, date, matiere, groupe) 
                values ('$cin', '$nom', '$prenom', 1, 0,'$date', '$module', '$groupe')";
            else{
                $req="insert into absence (cin, nom, prenom, justifie, nonJustifie, date, matiere, groupe) 
                values ('$cin', '$nom', '$prenom', 0, 1, '$date', '$module', '$groupe')";
            }
            $reponse = $pdo->exec($req) or die("insertion");
         }
         // Modification / increment
         else{
            if($justifiee=="j")
                $req="update absence set justifie=justifie+1 
                        where cin='$cin' 
                        and date=$date
                        and matiere='$module'";
            else{
                $req="update absence set nonJustifie=nonJustifie+1 
                        where cin='$cin' 
                        and date='$date'
                        and matiere='$module'";
            }
            $reponse = $pdo->exec($req) or die("modification");

            
         }

    }
    echo $date;
    echo "Saisie términée avec succes!";
    header("location:etatAbsence.php");
}
else{
        echo "Merci de vérifier tous les champs nécessaires!";
        header("location:saisirAbsence.php");
    }

    }
?>