<?php
session_start();
  
      
//Connecter à la bdd
$host = 'localhost';
$db   = 'PTDW';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$BDD = new PDO($dsn, $user, $pass, $opt);
//Initialisation

$classer = false;
$DivId = 0;
$strclass = '';
$BqId1 = 0;
$BqId2 = 0 ;
//Récupérer les données du Form
if(isset($_POST['Comparer'])) {
    
    $Banque1 = $_POST['Banque1'];
    $Banque2 = $_POST['Banque2'];
    $Requete1 = $BDD->query("Select bq_id from banque where bq_Nom = '".$Banque1."'");
    
       while($data1 = $Requete1->fetch())
       {
           $BqId1 = $data1['bq_id'];
           //$BqId1 = 5 ;
           
       }
    $Requete2 = $BDD->query("Select bq_id from banque where bq_Nom = '".$Banque2."'");
      while($data2 = $Requete2->fetch())
       {
           $BqId2 = $data2['bq_id'];
          //$BqId2 = 7;
           
       }
      // $BqId2 = 7;
        //$BqId1 = 5;
       $_SESSION['BqId1'] = $BqId1;
       $_SESSION['BqId2'] = $BqId2;
       $_SESSION['Banque1'] = $Banque1;
       $_SESSION['Banque2'] = $Banque2;
       
         header("Location: ../Comparatif.php");
       
}
?>