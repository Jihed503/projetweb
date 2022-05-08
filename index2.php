<?php
  session_start();
  if($_SESSION["autoriser"]!="oui"){
    header("location:login.php");
    exit();
  }
  else{
    $id = $_SESSION["id"];
    if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
        " dans votre espace personnel";
    else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
        " dans votre espace personnel";

    include("connexion.php");

    /// Les niveaux

    //info1
    $reqinf1="select * from groupe where nom like 'INFO1%'";
    $reponseinf1 = $pdo->query($reqinf1);
    $outputs["info1"]=array();
    if($reponseinf1->rowCount()>0) {
        while ($rowinf1 = $reponseinf1 ->fetch(PDO::FETCH_ASSOC)) {
          array_push( $outputs["info1"], $rowinf1);
        }
    }
    //info2
    $reqinf2="select * from groupe where nom like 'INFO2%'";
    $reponseinf2 = $pdo->query($reqinf2);
    $outputs["info2"]=array();
    if($reponseinf2->rowCount()>0) {
        while ($rowinf2 = $reponseinf2 ->fetch(PDO::FETCH_ASSOC)) {
          array_push( $outputs["info2"], $rowinf2);
        }
    }
    //info3
    $reqinf3="select * from groupe where nom like 'INFO3%'";
    $reponseinf3 = $pdo->query($reqinf3);
    $outputs["info3"]=array();
    if($reponseinf3->rowCount()>0) {
        while ($rowinf3 = $reponseinf3 ->fetch(PDO::FETCH_ASSOC)) {
          array_push( $outputs["info3"], $rowinf3);
        }
    }

    /// Mes groupes
    $req="select distinct g.nom from groupe as g inner join ens_grp as eg 
            on g.id=eg.idGroupe where eg.idEnseignant=$id";
    $reponse = $pdo->query($req);
    $outputs["mesgroupes"]=array();
    if($reponse->rowCount()>0) {
        while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
            $groupeANDcount = array();
            array_push($groupeANDcount, $row["nom"]);

            // Recuperer combien d'etudiants dans ce classe
            $count = 0;
            $x = $row['nom'];
            $reqc="select count(*) as count from etudiant where Classe='$x'";
            $reponsec = $pdo->query($reqc);
            if($reponsec->rowCount()>0) {
              while ($rowc = $reponsec ->fetch(PDO::FETCH_ASSOC)) {
                $count = $rowc['count'];
              }
            }
            
            array_push($groupeANDcount, $count);

            array_push($outputs["mesgroupes"], $groupeANDcount);
        }
    }

    /// Les autres enseignants
    $reqe="select * from enseignant where id!=$id";
    $reponsee = $pdo->query($reqe);
    $outputs["enseignants_groupes"]=array();
    if($reponsee->rowCount()>0) {
      $ens_grp = array();
      while ($rowe = $reponsee ->fetch(PDO::FETCH_ASSOC)) {
        $reqge="select distinct g.nom from groupe as g inner join ens_grp as eg 
            on g.id=eg.idGroupe where eg.idEnseignant=".$rowe['id'];
        $reponsege = $pdo->query($reqge);
        $rowg = array();
        if($reponsege->rowCount()>0) {
          while ($rowgr = $reponsege ->fetch(PDO::FETCH_ASSOC)) {
            array_push($rowg, $rowgr['nom']);
          }
        }
        
        array_push($ens_grp, $rowe);
        array_push($ens_grp, $rowg);
      }
      array_push($outputs["enseignants_groupes"], $ens_grp);
    }


    

    




  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Walid SAAD">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SCO-ENICAR</title>
    
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
    </style>

  </head>
  <body>
    
  <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top ">
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
                    <a class="dropdown-item" href="AjouterGroupe.php">Ajouter Groupe</a>
                    <a class="dropdown-item" href="ModifierGroupe.php">Modifier Groupe</a>
                    <a class="dropdown-item" href="SupprimerGroupe.php">Supprimer Groupe</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
                    <a class="dropdown-item" href="ChercherEtudiants.php">Chercher Etudiant</a>
                    <a class="dropdown-item" href="ModifierListeEtudiants.php">Modifier Etudiant</a>
                    <a class="dropdown-item" href="SupprimerListeEtudiants.php">Supprimer Etudiant</a>


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

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3"><?php echo $bienvenue?></h1>
      <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
      <p><a class="btn btn-primary btn-lg" href="#mesgroupes" role="button">Mes Groupes &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Les niveaux -->
    <div class="row">
      <!--info1-->
      <h2>INFO1</h2>
      <ul>
        <?php 
          if($outputs["info1"]){
            foreach($outputs["info1"] as $groupe){ 
              echo "<li><a href='http://localhost/projetweb/afficherGroupe.php?groupe=".$groupe['nom']."'>".$groupe['nom']."</a></li>";
            }
          }
          else{
           echo "<div class='col-md-4'>
             <p>Aucun groupe à afficher!</p>
           </div>";
          }
        ?>
      </ul>
      <!--info2-->
      <h2>INFO2</h2>
      <ul>
        <?php 
          if($outputs["info2"]){
            foreach($outputs["info2"] as $groupe){ 
              echo "<li><a href='http://localhost/projetweb/afficherGroupe.php?groupe=".$groupe['nom']."'>".$groupe['nom']."</a></li>";
            }
          }
          else{
           echo "<div class='col-md-4'>
             <p>Aucun groupe à afficher!</p>
           </div>";
          }
        ?>
      </ul>
      <!--info3-->
      <h2>INFO3</h2>
      <ul>
        <?php 
          if($outputs["info3"]){
            foreach($outputs["info3"] as $groupe){ 
              echo "<li><a href='http://localhost/projetweb/afficherGroupe.php?groupe=".$groupe['nom']."'>".$groupe['nom']."</a></li>";
            }
          }
          else{
           echo "<div class='col-md-4'>
             <p>Aucun groupe à afficher!</p>
           </div>";
          }
        ?>
      </ul>
      
    </div>

    <hr>
    <!-- Mes groupes -->
    <div class="row" id="mesgroupes">
        <?php 
          if($outputs["mesgroupes"]){
            foreach($outputs["mesgroupes"] as $nom_count){ 
              echo "<div class='col-md-4'>
                      <h2>".$nom_count[0]."</h2>
                      <p>".$nom_count[1]." étudiants!</p>
                      <p><a class='btn btn-secondary' href='#' role='button'>Voir les Groupes &raquo;</a></p>
                    </div>";
            }
          }
          else{
           echo "<div class='col-md-4'>
             <h2>Aucun groupe à afficher!</h2>
           </div>";
          }
        ?>
    </div>

    <hr>
    <!-- Les autres enseignants -->
    <!--
      enseignants_groupes
          ens_grp
            rowe
            rowg
    -->
    <div class="row">
      <?php 
          if($outputs["enseignants_groupes"]){
            foreach($outputs["enseignants_groupes"] as $tab){ 
              echo "<div class='col-md-4'>
                      <h2>".$tab[0]['nom']."</h2>
                      <h4>".$tab[0]['prenom']."
                      <p><a class='btn btn-secondary' href='#' role='button'>Voir les Groupes &raquo;</a></p>
                    </div>";
              foreach($tab[1] as $x => $x_value) {
                echo "Key=" . $x . ", Value=" . $x_value;
                echo "<br>";
              }
            }
          }
          else{
           echo "<div class='col-md-4'>
             <h2>Aucun autre enseignants n'est enregistré!</h2>
           </div>";
          }
        ?>
    </div>

  </div> <!-- /container -->

</main>


<footer class="container">
  <p>&copy; ENICAR 2021-2022</p>
</footer>


   
      
  </body>
  <script src="./assets/dist/js/smooth_scroll.js"></script>
</html>
