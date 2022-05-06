<?php
session_start();
@$classe=$_POST["classe"];
@$aller=$_POST["valider"];
if($_SESSION["autoriser"]!="oui"){
    header("location:login.php");
    exit();
}
else{
    $tab=array( "INFO1","INFO2","INFO3");
    $_SESSION["groupePar"]=$classe;
    $_SESSION["soumettre"]=$aller;

    //SPECIALE POUR OPTION DE SELECT
    include("connexion.php");
    $req="SELECT * FROM groupe  order by nom ASC ";
    $reponse = $pdo->query($req);
    if($reponse->rowCount()>0) {
        $outputs["groupes"]=array();
        while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
            $etudiant = array();
            $etudiant["nom"] = $row["nom"];
            array_push($outputs["groupes"], $etudiant);
        }
        // success
        $outputs["success"] = 1;
    } else {
        $outputs["success"] = 0;
        $outputs["message"] = "Pas d'étudiants";}
    //SPECIALE POUR OPTION DE SELECT
}
$_SESSION["ajout"]="";//pour mettre la valeur de $erreur="" (vide)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etudiants Par CLasse</title>
    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
    <script src="./assets/dist/js/jquery.min.js"></script>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
    <style>
        #input{width:170px;}
    </style>

</head>
<<<<<<< HEAD
<body onload="refresh()">
=======
<body>
>>>>>>> b5690d384b9ee44431b856e0594786d6a1df9716
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">SCO-Enicar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
<<<<<<< HEAD
                <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
                    <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                    <a class="dropdown-item" href="AjouterGroupe.php">Ajouter Groupe</a>
                    <a class="dropdown-item" href="ModifierGroupe.php">Modifier Groupe</a>
                    <a class="dropdown-item" href="SupprimerGroupe.php">Supprimer Groupe</a>
=======
                <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
                    <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                    <a class="dropdown-item" href="#">Ajouter Groupe</a>
                    <a class="dropdown-item" href="#">Modifier Groupe</a>
                    <a class="dropdown-item" href="#">Supprimer Groupe</a>
>>>>>>> b5690d384b9ee44431b856e0594786d6a1df9716

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
<<<<<<< HEAD
                    <a class="dropdown-item" href="ChercherEtudiant.php">Chercher Etudiant</a>
                    <a class="dropdown-item" href="ModifierEtudiant.php">Modifier Etudiant</a>
                    <a class="dropdown-item" href="SupprimerEtudiant.php">Supprimer Etudiant</a>
=======
                    <a class="dropdown-item" href="ChercherEtudiants.php">Chercher Etudiant</a>
                    <a class="dropdown-item" href="ModifierListeEtudiants.php">Modifier Etudiant</a>
                    <a class="dropdown-item" href="#">Supprimer Etudiant</a>
>>>>>>> b5690d384b9ee44431b856e0594786d6a1df9716


                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="saisirAbsence.php">Saisir Absence</a>
                    <a class="dropdown-item" href="etatAbsence.php">État des absences pour un groupe</a>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
            </li>

        </ul>


        <form class="form-inline my-2 my-lg-0">
<<<<<<< HEAD
            <input class="form-control mr-sm-2" id="input" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
=======
            <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
>>>>>>> b5690d384b9ee44431b856e0594786d6a1df9716
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Groupe</button>
        </form>
    </div>
</nav>
<<<<<<< HEAD

=======
      
>>>>>>> b5690d384b9ee44431b856e0594786d6a1df9716
<main role="main">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Afficher la liste d'étudiants par groupe</h1>
            <p>Choisir une Classe  Valider puis Actualiser</p>
        </div>
    </div>

    <div class="container">
        <form method="post" id="groupe" >
            <div class="form-group">
                <label for="classe">Choisir une classe:</label><br>
                <!--
                <input list="classe">
                <datalist id="classe" name="classe">
                    <option value="1-INFOA">1-INFOA</option>
                    <option value="1-INFOB">1-INFOB</option>
                    <option value="1-INFOC">1-INFOC</option>
                    <option value="1-INFOD">1-INFOD</option>
                    <option value="1-INFOE">1-INFOE</option>
                </datalist>
                -->
                <select  id="classe" name="classe"  class="custom-select custom-select-sm custom-select-lg" onchange="submit()">
                    <option value="">----  ----</option>
                    <?php foreach($outputs["groupes"] as $tab): ?>
                        <option value="<?=$tab['nom']?>"><?=$tab['nom']?></option>
                    <?php endforeach ?>
                    <!-- <option value="INFO1-A">INFO1-A</option>
                    <option value="INFO1-B">INFO1-B</option>
                    <option value="INFO1-C">INFO1-C</option>
                    <option value="INFO1-D">INFO1-D</option>
                    <option value="INFO1-E">INFO1-E</option>
                    <option value="INFO2-A">INFO2-A</option>
                    <option value="INFO2-B">INFO2-B</option>
                    <option value="INFO2-C">INFO2-C</option>
                    <option value="INFO2-D">INFO2-D</option>
                    <option value="INFO2-E">INFO2-E</option>
                    <option value="INFO3-A">INFO3-A</option>
                    <option value="INFO3-B">INFO3-B</option>
                    <option value="INFO3-C">INFO3-C</option>
                    <option value="INFO3-D">INFO3-D</option> -->
                </select>
                <!-- <button class="btn btn-lg btn-primary btn-block" name="valider" type="submit">Valider</button> -->
            </div>
        </form>
        <!--<input type="submit" name="valider" />-->
        <div class="row">
            <div class="table-responsive" id="demo">Liste vide </div>
            <button  type="boutton" class="btn btn-primary btn-block active"  onclick="refresh()">Actualiser</button>
        </div>
    </div>
</main>

<script>
    function submit(){
        document.getElementById("groupe").submit();
    }
    function refresh() {
        var xmlhttp = new XMLHttpRequest();
        var url = "http://localhost/Projet/afficherPar.php";

        //Envoie de la requete
        xmlhttp.open("GET",url,true);
        xmlhttp.send();


        //Traiter la reponse
        xmlhttp.onreadystatechange=function()
        {  // alert(this.readyState+" "+this.status);
            if(this.readyState==4 && this.status==200){

                myFunction(this.responseText);
                //alert(this.responseText);
                console.log(this.responseText);
                //console.log(this.responseText);
            }
        }


        //Parse la reponse JSON
        function myFunction(response){
            var obj=JSON.parse(response);
            //alert(obj.success);

            if (obj.success==1)
            {
                var arr=obj.etudiants;
                var i;
                var out="<table  border=1 class='table table-striped table-hover'> <tr><th>CIN</th><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Email</th><th>Classe</th></tr>";
                for ( i = 0; i < arr.length; i++) {
                    out+="<tr><td>"+
                        arr[i].cin +
                        "</td><td>"+
                        arr[i].nom+
                        "</td><td>"+
                        arr[i].prenom+
                        "</td><td>"+
                        arr[i].adresse+
                        "</td><td>"+
                        arr[i].email+
                        "</td><td>"+
                        arr[i].classe+
                        "</td></tr>" ;
                }
                out +="</table>";
                document.getElementById("demo").innerHTML=out;
            }
            else document.getElementById("demo").innerHTML="AUCUN ETUDIANT DE CETTE CLASSE";

        }
    }
</script>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
</footer>
</body>
</html>