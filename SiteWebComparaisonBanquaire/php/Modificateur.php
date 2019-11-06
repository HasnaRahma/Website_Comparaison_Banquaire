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
$bqid = $_REQUEST['id'];
  

if($_REQUEST['name'] == "Supprimer") { 
    //echo $_REQUEST['id'] ;
    // $Requete = $BDD->query("DELETE FROM banque WHERE bq_Id = ".$bqid." ");
			 // $url=$_SERVER["HTTP_REFERER"];
			  //header("Location:".$url."");
  ?> <div>   <h1> hey hey hey hey  <?php echo $_REQUEST['id']; ?></h1></div>  <?php
}
else {//le cas de modification
    
    
}

?>
       

