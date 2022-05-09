<?php
    session_start();
    if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
    }
    else{
    
    // Select mes groupes
    include("connexion.php");
    $id = $_SESSION["id"];
    $req="select distinct g.nom from groupe as g inner join ens_grp as eg 
            on g.id=eg.idGroupe where eg.idEnseignant=$id";
    $reponse = $pdo->query($req);
    $outputs["mesgroupes"]=array();
    if($reponse->rowCount()>0) {
        while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
            array_push($outputs["mesgroupes"], $row['nom']);
        }
    }










    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etudiants Par CLasse</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

</head>
<body id="myPage">
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="http://www.enicarthage.rnu.tn" class="w3-bar-item w3-button w3-teal"><img src="data:image/png;base64,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" alt="enicarthage" style="height:50px;width:auto;"></a>
  <a href="http://localhost/projetweb/index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Acceuil</a>
  <!--gestion des groupes-->
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Gestion des groupes <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a class="w3-bar-item w3-button" href="afficherEtudiants.php">Lister tous les étudiants</a>
      <a class="w3-bar-item w3-button" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
      <a class="w3-bar-item w3-button" href="AjouterGroupe.php">Ajouter Groupe</a>
      <a class="w3-bar-item w3-button" href="ModifierGroupe.php">Modifier Groupe</a>
      <a class="w3-bar-item w3-button" href="SupprimerGroupe.php">Supprimer Groupe</a>
    </div>
  </div>
  <!--gestion des étudiants-->
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Gestion des étudiants <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
    <a class="w3-bar-item w3-button" href="ajouterEtudiant.php">Ajouter Etudiant</a>
    <a class="w3-bar-item w3-button" href="ChercherEtudiants.php">Chercher Etudiant</a>
    <a class="w3-bar-item w3-button" href="ModifierListeEtudiants.php">Modifier Etudiant</a>
    <a class="w3-bar-item w3-button" href="SupprimerListeEtudiants.php">Supprimer Etudiant</a>
    </div>
  </div>
  <!--gestion des absences-->
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Gestion des absences <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
    <a class="w3-bar-item w3-button" href="saisirAbsence.php">Saisir Absence</a>
    <a class="w3-bar-item w3-button" href="etatAbsence.php">État des absences pour un groupe</a>
    </div>
  </div>
  <a href="deconnexion.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Se Déconnecter <span class="sr-only">(current)</span></a>
  <a href="http://localhost/projetweb/ChercherEtudiants.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a>
 </div>
  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
  <a href="http://localhost/projetweb/index.php" class="w3-bar-item w3-button">Acceuil</a>
  <!--gestion des groupes-->
  <div class="w3-dropdown-hover">
    <button class="w3-button" title="Notifications">Gestion des groupes <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a class="w3-bar-item w3-button" href="afficherEtudiants.php">Lister tous les étudiants</a>
      <a class="w3-bar-item w3-button" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
      <a class="w3-bar-item w3-button" href="AjouterGroupe.php">Ajouter Groupe</a>
      <a class="w3-bar-item w3-button" href="ModifierGroupe.php">Modifier Groupe</a>
      <a class="w3-bar-item w3-button" href="SupprimerGroupe.php">Supprimer Groupe</a>
    </div>
  </div>
  <!--gestion des étudiants-->
  <div class="w3-dropdown-hover">
    <button class="w3-button" title="Notifications">Gestion des étudiants <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
    <a class="w3-bar-item w3-button" href="ajouterEtudiant.php">Ajouter Etudiant</a>
    <a class="w3-bar-item w3-button" href="ChercherEtudiants.php">Chercher Etudiant</a>
    <a class="w3-bar-item w3-button" href="ModifierListeEtudiants.php">Modifier Etudiant</a>
    <a class="w3-bar-item w3-button" href="SupprimerListeEtudiants.php">Supprimer Etudiant</a>
    </div>
  </div>
  <!--gestion des absences-->
  <div class="w3-dropdown-hover">
    <button class="w3-button" title="Notifications">Gestion des absences <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
    <a class="w3-bar-item w3-button" href="saisirAbsence.php">Saisir Absence</a>
    <a class="w3-bar-item w3-button" href="etatAbsence.php">État des absences pour un groupe</a>
    </div>
  </div>
  <a href="deconnexion.php" class="w3-bar-item w3-button">Se Déconnecter</a>
  <a href="http://localhost/projetweb/ChercherEtudiants.php" class="w3-bar-item w3-buttonw3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a>
  </div>
</div>
<!---------------------------------------------------Navbar--------------------------------------------->

      
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
              <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
            </div>
          </div>

<div class="container">
    <div id='demo2'></div>
<form id="myform" method="POST" action="saisir.php">
<div class="form-group">
  <label for="semaine">Choisir une semaine:</label><br>
  <input required id="semaine" type="week" name="debut" size="10" class="datepicker"/>
</div>
  <div class="form-group">
<label for="classe">Choisir un groupe:</label><br>

<!--Mes groupes-->
<select id="classe" name="classe"  class="custom-select custom-select-sm custom-select-lg" onchange="foo();">
    <option>Choisir un groupe...</option>
    <?php foreach($outputs['mesgroupes'] as $groupe){
        echo "<option value=".$groupe.">".$groupe."</option>";
    }
    ?>
</select>
</div>

<!--Modules-->
<div class="form-group">
  <label for="module">Choisir un module:</label><br>
  <select id="module" name="module"  class="custom-select custom-select-sm custom-select-lg">
      <option value="Tech. Web">Tech. Web</option>
      <option value="SGBD">SGBD</option>
  </select>
  </div>

<!--Table d'absence-->
<div id="demo" style="text-align:center; color:red;"></div>

 <!--Bouton Valider-->
 <button  type="submit" class="btn btn-primary btn-block">Valider</button>
</form>
</div>  


</main>
<!-- Footer -->
<footer style='margin-top:200px;' class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Réseaux sociaux</h4>
  <a class="w3-button w3-large w3-teal" href="https://www.facebook.com/Ecole-Nationale-dIngénieurs-de-Carthage-ENICarthage-532762086862252/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-button w3-large w3-teal" href="https://www.instagram.com/enicarthage/?hl=fr" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="https://www.linkedin.com/school/enicarthage/about/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p>&copy; ENICAR 2021-2022</p>

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>
<script>
    function foo() {
        var classe = document.getElementById("classe").value;
        var xmlhttp = new XMLHttpRequest();
        var url = "http://localhost/projetweb/afficherPar.php";

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
                
                //document.getElementById("demo").innerHTML=out;
                
                // Parse Dates
                let parseDates = (inp) => {
                    let year = parseInt(inp.slice(0,4), 10);
                    let week = parseInt(inp.slice(6), 10);

                    let day = (1 + (week - 1) * 7); // 1st of January + 7 days for each week

                    let dayOffset = new Date(year, 0, 1).getDay(); // we need to know at what day of the week the year start

                    dayOffset--;  // depending on what day you want the week to start increment or decrement this value. This should make the week start on a monday

                    let days = [];
                    for (let i = 0; i < 7; i++) // do this 7 times, once for every day
                        days.push(new Date(year, 0, day - dayOffset + i)); // add a new Date object to the array with an offset of i days relative to the first day of the week
                    return days;
                }
                let week = document.getElementById("semaine");
                let dates = parseDates(week.value);
                //alert(dates[0].getFullYear());
                //alert(dates[0].getDate()+7);
                //alert(dates[0].getUTCMonth()+2);

                // Table d'absence
                var ta="<div class='container'><div class='row'><div class='table-responsive'><table  class='table table-striped table-hover' rules='cols' frame='box'><tr><th>25 étudiants</th>"
                    +"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Lundi</th>"
                    +"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Mardi</th>"
                    +"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Mercredi</th>"
                    +"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Jeudi</th>"
                    +"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Vendredi</th>"
                    +"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Samedi</th>"
                    +"</tr><tr><td>&nbsp;</td>";
                    for ( i = 0; i < (dates.length-1); i++) {
                        ta+="<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>"+(dates[i].getDate())+"/"+(dates[i].getUTCMonth()+1)+"/"+dates[i].getFullYear()+"</th>";
                    }
                    
                    ta+="</tr><tr><td>&nbsp;</td>"
                    +"<th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th>"
                    +"</tr>";
                
                    for ( i = 0; i < arr.length; i++) {
                        if(arr[i]){
                            ta+="<tr class='row_3'><td><b>"+arr[i].nom+" "+arr[i].prenom+"</b></td>";
                            for(var j=0; j<(dates.length-1); j++){
                                /* am justifiée*/    ta+="<td><input name='check[]' type='checkbox' value='"+(dates[j].getDate())+"/"+(dates[j].getUTCMonth()+1)+"/"+dates[j].getFullYear()+"_AM_j_"+arr[i].cin+"_"+arr[i].nom+"_"+arr[i].prenom+"'>"
                                /* am non justifiée*/   +"<input name='check[]' style='filter: invert(100%) hue-rotate(18deg) brightness(1.7);' type='checkbox'  value='"+(dates[j].getDate())+"/"+(dates[j].getUTCMonth()+1)+"/"+dates[j].getFullYear()+"_AM_nj_"+arr[i].cin+"_"+arr[i].nom+"_"+arr[i].prenom+"'></td>"
                                /* pm justifiée*/      +"<td><input name='check[]' type='checkbox'  value='"+(dates[j].getDate())+"/"+(dates[j].getUTCMonth()+1)+"/"+dates[j].getFullYear()+"_PM_j_"+arr[i].cin+"_"+arr[i].nom+"_"+arr[i].prenom+"'>"
                                /* pm non justifiée*/   +"<input name='check[]' style='filter: invert(100%) hue-rotate(18deg) brightness(1.7);' type='checkbox'  value='"+(dates[j].getDate())+"/"+(dates[j].getUTCMonth()+1)+"/"+dates[j].getFullYear()+"_PM_nj_"+arr[i].cin+"_"+arr[i].nom+"_"+arr[i].prenom+"'></td>"
                                ;
                            }
                                ta+="</tr>";
                        }
                }
                ta+="</table></div></div></div><br>";

                document.getElementById("demo").innerHTML=ta;
            }
            else document.getElementById("demo").innerHTML="Aucune Inscriptions pour ce classe!";

        }
    }


    function foo2() {
        var classe = document.getElementById("classe").value;
        var xmlhttp = new XMLHttpRequest();
        var url = "http://localhost/projetweb/saisir.php";

        //Envoie de la requete
        xmlhttp.open("GET",url,true);

        //Traiter la reponse
        xmlhttp.onreadystatechange=function()
        {  // alert(this.readyState+" "+this.status);
            if(this.readyState==4 && this.status==200){
                console.log(this.responseText);
                document.getElementById("demo2").innerHTML=this.responseText;
                
                console.log(this.responseText);
                //console.log(this.responseText);
            }
        }
    }

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
<script src="./assets/dist/js/smooth_scroll.js"></script>
</body>
</html>