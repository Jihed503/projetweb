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
    <title>SCO-ENICAR Modifier Etudiant</title>
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
                    <a class="dropdown-item" href="#">Chercher Etudiant</a>
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
            <h1 class="display-4">Modifier un étudiant</h1>
            <p>Remplir le formulaire ci-dessous afin de modifier un étudiant!</p>
        </div>
    </div>


    <div class="container">
    <?php
        include("connexion.php");
        //$req="SELECT * FROM etudiant";
        //$reponse = $pdo->query($req);

        $userid = $_GET['cin'];
        $useridstr = intval ($_GET['cin']);
        $sql ="select * FROM etudiant where cin=:nouvelleid";

        $query = $pdo->prepare($sql);
        $query->bindParam(':nouvelleid', $useridstr , PDO::PARAM_STR);
        $query->execute();

        $resultat= $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($resultat as $row)
        {
        ?>
        <form id="myform" method="GET" action="modifier.php">
            <!--
                               TODO: Add form inputs
                               Prenom - required string with autofocus
                               Nom - required string
                               Email - required email address
                               CIN - 8 chiffres
                               Password - required password string, au moins 8 letters et chiffres
                               ConfirmPassword
                               Classe - Commence par la chaine INFO, un chiffre de 1 a 3, un - et une lettre MAJ de A à E
                               Adresse - required string
                           -->
            <!--CIN-->
            <div class="form-group">
                <label for="cin">CIN:</label><br>
                <input readonly type="text" id="cin" name="cin"  class="form-control" required pattern="[0-9]{8}" title="8 chiffres" value="<?php echo $row->cin; ?>"/>
            </div>
            
            <!--Nom-->
            <div class="form-group">
                <label for="nom">Nom:</label><br>
                <input type="text" id="nom" name="nom" class="form-control" required autofocus value="<?php echo $row->nom; ?>">
            </div>
            <!--Prénom-->
            <div class="form-group">
                <label for="prenom">Prénom:</label><br>
                <input type="text" id="prenom" name="prenom" class="form-control" required value="<?php echo $row->prenom; ?>">
            </div>
            <!--Email-->
            <div class="form-group">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" class="form-control" required value="<?php echo $row->email; ?>">
            </div>
            
            <!--Password-->
            <!--ConfirmPassword-->
            <!--
            <div class="form-group">
                <label for="pwd">Mot de passe:</label><br>
                <input type="password" id="pwd" name="pwd" class="form-control"  required pattern="[a-zA-Z0-9]{8,}" title="Au moins 8 lettres et nombres" value="<?php echo $row->password; ?>"/>
            </div>
            
            <div class="form-group">
                <label for="cpwd">Confirmer Mot de passe:</label><br>
                <input type="password" id="cpwd" name="cpwd" class="form-control"  required/>
            </div>
            -->
            <!--Classe-->
            <div class="form-group">
                <label for="classe">Classe:</label><br>
                <input type="text" id="classe" name="classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"
                       title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C" value="<?php echo $row->Classe; ?>">
            </div>
            <!--Adresse-->
            <div class="form-group">
                <label for="adresse">Adresse:</label><br>

                <textarea id="adresse" name="adresse" rows="10" cols="30" class="form-control" required ><?php echo $row->adresse; ?> </textarea>


            </div>
            <!--Bouton modifier-->
            <button  type="submit" class="btn btn-primary btn-block"onclick="modifier()">Modifier</button>


            <?php } ?>
        </form>
    </div>
</main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
</footer>

<script>

    function modifier()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/projetweb/modifier.php";

        //Envoie Req
        xmlhttp.open("POST",url,true);

        form=document.getElementById("myForm");
        formdata=new FormData(form);

        xmlhttp.send(formdata);

        //Traiter Res
        /*
        xmlhttp.onreadystatechange=function()
        {
            if(this.readyState==4 && this.status==200){
                // alert(this.responseText);
                if(this.responseText=="OK")
                {
                    document.getElementById("demo").innerHTML="La modification de l'étudiant a été bien effectué";
                    document.getElementById("demo").style.backgroundColor="green";
                }
                else
                {
                    document.getElementById("demo").innerHTML="L'étudiant n'existe pas, merci de vérifier le CIN";
                    document.getElementById("demo").style.backgroundColor="#fba";
                }
            }
        }*/


    }
</script>
</body>
</html>
