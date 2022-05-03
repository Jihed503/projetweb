<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=gestion_etudiant","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>