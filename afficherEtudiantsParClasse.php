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
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

</head>
<body>
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
                <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
                    <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                    <a class="dropdown-item" href="#">Ajouter Groupe</a>
                    <a class="dropdown-item" href="#">Modifier Groupe</a>
                    <a class="dropdown-item" href="#">Supprimer Groupe</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
                    <a class="dropdown-item" href="ChercherEtudiants.php">Chercher Etudiant</a>
                    <a class="dropdown-item" href="ModifierListeEtudiants.php">Modifier Etudiant</a>
                    <a class="dropdown-item" href="#">Supprimer Etudiant</a>


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
            <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Groupe</button>
        </form>
    </div>
</nav>
      
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Afficher la liste d'étudiants par groupe</h1>
              <p>Cliquer sur la liste afin de choisir une classe!</p>
            </div>
          </div>

<div class="container">


<form id="myform" method="POST">
<div class="form-group">
<!--<label for="classe">Choisir une classe:</label><br>

<input list="classe">
<datalist id="classe" name="classe">
    <option value="1-INFOA">1-INFOA</option>
    <option value="1-INFOB">1-INFOB</option>
    <option value="1-INFOC">1-INFOC</option>
    <option value="1-INFOD">1-INFOD</option>
    <option value="1-INFOE">1-INFOE</option>
</datalist>
-->
<select id="classe" name="classe"  class="custom-select custom-select-sm custom-select-lg" onchange="foo();/*get_classe();*/" >
            <option value="classe">Choisir un classe</option> 
            <?php foreach($outputs["groupes"] as $tab): ?>
                <option value="<?=$tab['nom']?>"><?=$tab['nom']?></option> 
            <?php endforeach ?>
</select>
</div>
</form>


</div>  
<div id="demo" style="text-align:center; color:red;"></div>
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
<script>
    
    function foo() {
        var classe = document.getElementById("classe").value;
        var xmlhttp = new XMLHttpRequest();
        var url = "http://localhost/projetweb1/afficherParClasse.php";

        //Envoie de la requete
        xmlhttp.open("POST",url,true);
        const form=document.getElementById("myform");
        // alert("after");
        const formdata=new FormData(form);

        xmlhttp.send(formdata);

        
        //Traiter la reponse
        xmlhttp.onreadystatechange=function()
        {  // alert(this.readyState+" "+this.status);
            if(this.readyState==4 && this.status==200){
                console.log(this.responseText);
                myFunction(this.responseText);
                
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
                var i;
                /*
                var outg = "<option value='choisir'>Choisir classe</option>"
                
                for ( i = 0; i < arrg.length; i++) {
                    if(arrg[i]){
                    outg+="<option value="+$arrg[i]+"> "+$arrg[i]+"</option>";
                    }
                }
                
                document.getElementById("classe").innerHTML="<option value='choisir'>Choisir classe</option>";
                */
                var arr=obj.etudiants;
                


                var out="<div class='container'>"+"<div class='row'>"+"<div class='table-responsive'>"+"  <table class='table table-striped table-hover'>";

                  out+= "  <tr><th>CIN </th> <th>Nom </th> <th>Prénom</th> <th>Email </th> <th>Classe </th> </tr>"
                for ( i = 0; i < arr.length; i++) {
                    if(arr[i]){
                    out+="<tr><td>"+
                        arr[i].cin +
                        "</td><td>"+
                        arr[i].nom+
                        "</td><td>"+
                        arr[i].prenom+
                        "</td><td>"+
                        arr[i].email+
                        "</td><td>"+
                        arr[i].classe+
                        "</td></tr>" ;
                    }
                }
                out +="</table></div></div></div>";
                document.getElementById("demo").innerHTML=out;
                
                
                
                

                
            }
            else document.getElementById("demo").innerHTML="Aucune Inscriptions pour ce classe!";

        }
    }


</script>
</body>
</html>