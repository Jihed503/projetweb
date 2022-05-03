<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Afficher Etudiants</title>
    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
    <script src="./assets/dist/js/jquery.min.js"></script>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

</head>
<body onload="refresh()">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">SCO-Enicar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="index.html" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="AfficherEtudiants.php">Lister tous les étudiants</a>
                    <a class="dropdown-item" href="afficherEtudiantsParClasse.html">Etudiants par Groupe</a>
                    <a class="dropdown-item" href="#">Ajouter Groupe</a>
                    <a class="dropdown-item" href="#">Modifier Groupe</a>
                    <a class="dropdown-item" href="#">Supprimer Groupe</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="AjouterEtudiant.php">Ajouter Etudiant</a>
                    <a class="dropdown-item" href="#">Chercher Etudiant</a>
                    <a class="dropdown-item" href="#">Modifier Etudiant</a>
                    <a class="dropdown-item" href="#">Supprimer Etudiant</a>


                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="saisirAbsence.html">Saisir Absence</a>
                    <a class="dropdown-item" href="etatAbsence.html">État des absences pour un groupe</a>
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
            <h1 class="display-4">Liste des étudiants</h1>
            <p>Cliquer sur le bouton afin d'actualiser la liste!</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <p id="demo">Liste vide</p>

                </table>
                <br>
            </div>
            <button  type="button" class="btn btn-primary btn-block active" onclick="refresh()">Actualiser</button>
        </div>
    </div>

</main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
</footer>
<script>
    function refresh() {
        var xmlhttp = new XMLHttpRequest();
        var url = "http://localhost/projetweb/afficher.php";

        //Envoie de la requete
        xmlhttp.open("GET",url,true);
        xmlhttp.send();


        //Traiter la reponse
        xmlhttp.onreadystatechange=function()
        {  // alert(this.readyState+" "+this.status);
            if(this.readyState==4 && this.status==200){

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
                var arr=obj.etudiants;
                var i;

                var out="<div class='container'>"+"<div class='row'>"+"<div class='table-responsive'>"+"  <table class='table table-striped table-hover'>";

                  out+= "  <tr><th>CIN </th> <th>Nom </th> <th>Prénom</th> <th>Email </th> <th>Classe </th> </tr>"
                for ( i = 0; i < arr.length; i++) {
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
                out +="</table></div></div></div>";
                document.getElementById("demo").innerHTML=out;
            }
            else document.getElementById("demo").innerHTML="Aucune Inscriptions!";

        }
    }
</script>
</body>
</html>