<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {

// DataBase connection
$con = mysqli_connect("localhost","root","","gestion_etudiant");
if(!$con){
    echo "Connexion Echouee" . mysqli_connect_error();
}

if(isset($_POST['input'])){
    
    $input = $_POST['input'];

    $query = "select * from etudiant where nom like '{$input}%' or cin like '{$input}%'";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 0){
        echo "<h6 class='text-danger text-center mt-3'>Pas de résultats</h6>";
    }
    else{?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>CIN</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Classe</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                
                while($row = mysqli_fetch_assoc($result)){

                    $cin = $row['cin'];
                    $nom = $row['nom'];
                    $prenom = $row['prenom'];
                    $email = $row['email'];
                    $Classe = $row['Classe'];
                    
                    ?>

                    <tr>
                        <td><?php echo $cin; ?></td>
                        <td><?php echo $nom; ?></td>
                        <td><?php echo $prenom; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $Classe; ?></td>
                    </tr>

                <?php
                }
                ?>

            </tbody>

        </table>
    <?php
    }

}
}
?>
