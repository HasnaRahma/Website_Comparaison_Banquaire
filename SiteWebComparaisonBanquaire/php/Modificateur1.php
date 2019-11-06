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
$Bqid =0;
$Banque1 = $_POST['Banque1'];
for($i = 1; $i< 26;$i++)
    {
        $inputs[$i] = $_POST[$i];
    }
$Requete = $BDD->query("select bq_Id FROM banque WHERE bq_Nom = '".$Banque1."'  ");
while ($data=$Requete->fetch())
{
    $Bqid = $data['bq_Id'];
}


if(isset($_POST['Supprimer'])) {
    
    
  
    //echo $_REQUEST['id'] ;
    $Requete = $BDD->query("DELETE FROM banque WHERE bq_Nom = '".$Banque1."'  ");
			 // $url=$_SERVER["HTTP_REFERER"];
			  //header("Location:".$url."");
   
}
else { if(isset($_POST['Modifier'])){
    
    
    //$Requete = $BDD->query("UPDATE banque  (bq_Nom, bq_Siege, bq_Tel, bq_Fax, bq_Description) SET('".$_POST['bq_Nom']."', '".$_POST['bq_Siege']."','".$_POST['bq_Tel']."', '".$_POST['bq_Fax']."', '".$_POST['bq_Description']."' WHERE bq_Nom = '".$Banque1."' ");
    //$Requete = $BDD->query("UPDATE banque join GestionCompte G join Payement P  on G.bq_Id = P.bq join Monetique M on M.bId = P.bq (bq_Nom, bq_Siege, bq_Tel, bq_Fax, bq_Desc, Ouverturedecompteetdelivrancechequier, Fraisdetenuedecomptecourant, Fraisdetenuedecompteprofessionnel, Fraisdetenuedecomptecheque, Fraisdetenuedecomptesurlivret, Tenuedecompteendevise, Fermeturecomptecourant, Fermeturecomptecheque,Emissiondelapremierecarte,Renouvelement,Reconfection,Reeditionducodesecret,ComissionderetraitSurDABdelabanque,ComissionderetraitSurDABconfrere,CommissiondepaiementsurTPE/Client,CommissiondepaiementsurTPE/Commercant) SET('".$_POST['bq_Nom']."', '".$_POST['bq_Siege']."','".$_POST['bq_Tel']."', '".$_POST['bq_Fax']."', '".$_POST['bq_Description']."', '".$inputs['1']."', '".$inputs['2']."', '".$inputs['3']."', '".$inputs['4']."', '".$inputs['5']."', '".$inputs['6']."','".$inputs['7']."','".$inputs['8']."', '".$inputs['9']."','".$inputs['10']."','".$inputs['11']."','".$inputs['12']."','".$inputs['13']."','".$inputs['14']."','".$inputs['15']."','".$inputs['16']."') WHERE bq_Nom = '".$Banque1."'  ");
    
    $Requete = $BDD->prepare("UPDATE banque  set  bq_Siege = ?, bq_Tel = ?, bq_Fax= ?, bq_Desc = ? WHERE bq_Nom = '".$Banque1."' ");
    $Requete->execute(array(/*$_POST['bq_Nom1'],*/
                    $_POST['bq_Siege1'],
                    $_POST['bq_Tel1'],
                    $_POST['bq_Fax1'],
                    $_POST['bq_Description1']
                    ));
    $Requete = $BDD->prepare("UPDATE  GestionCompte set Ouverturedecompteetdelivrancechequier = ?, Fraisdetenuedecomptecourant= ?, Fraisdetenuedecompteprofessionnel = ?, Fraisdetenuedecomptecheque = ?, Fraisdetenuedecomptesurlivret = ?, Tenuedecompteendevise = ?, Fermeturecomptecourant = ?, Fermeturecomptecheque= ? WHERE bq_Id = '".$Bqid."'  ");
    $Requete->execute(array($inputs[14],
                    $inputs[15],
                    $inputs[16],
                    $inputs[17],
                    $inputs[18],
                    $inputs[19],
                    $inputs[20],
                    $inputs[21],
                  
                    ));
      $Requete = $BDD->prepare("UPDATE  Monetique set Emissiondelapremierecarte=?,Renouvelement=?,Reconfection=?,Reeditionducodesecret=?,ComissionderetraitSurDABdelabanque=?,ComissionderetraitSurDABconfrere=? WHERE bId = '".$Bqid."'  ");
    $Requete->execute(array($inputs[22],
                    $inputs[23],
                    $inputs[24],
                    $inputs[25],
                    $inputs[26],
                    $inputs[27],
                  
                  
        ));}else {
             $Requete = $BDD->query("INSERT INTO banque  VALUES (NULL,'".$_POST['bq_Nom']."',
                    '".$_POST['bq_Siege']."',
                    '".$_POST['bq_Tel']."',
                    '".$_POST['bq_Fax']."',
                        '',
                    '".$_POST['bq_Description']."') ");
             //Reset à 0
             $Bqid = 0;
           $Requete1 = $BDD->query("select bq_Id FROM banque WHERE bq_Nom = '".$_POST['bq_Nom']."'  ");
                while ($data=$Requete1->fetch())
                {
                    $Bqid = $data['bq_Id'];
                }
                if($Bqid != 0)//S'il a pu inséré dans la table banque le Bqid n'égale pas à 0
                {
                     $Requete = $BDD->query("INSERT INTO GestionCompte  VALUES (NULL,$Bqid ,'".$inputs[1]."',
                    '".$inputs[2]."',
                    '".$inputs[3]."',
                    '".$inputs[4]."',
                    '".$inputs[5]."',
                    '".$inputs[6]."',
                    '".$inputs[7]."',
                    '".$inputs[8]."','','') ");
                   $Requete = $BDD->query("INSERT INTO Monetique  VALUES (NULL,$Bqid ,'".$inputs[9]."',
                    '".$inputs[10]."',
                    '".$inputs[11]."',
                    '".$inputs[13]."',
                    '','','','','','','','','') ");
                }
        }
}
header("Location: ../PageAdministrateur1.php");
?>
       

