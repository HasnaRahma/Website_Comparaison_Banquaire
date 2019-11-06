<?php
session_start();
  

//Connecter à la bdd
$host = 'localhost';
$db   = 'ptdw';
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
$_SESSION['BqId1'] = 0;
$_SESSION['BqId2'] = 0;

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
	<meta charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="author" content="Bedla Hasna Rahma">
	<meta name="description" content="Site Wbe de comparaison de prestations bancaire">
	<meta name="keywords" content="Web , HTML5, CSS3, JS, JQuery, PHP,AJAX, prestation, banque">
	<meta charset="utf-8">
	<title>Page d'accueil</title>
       
	<!--link rel="stylesheet" href="drag_drop/bootstrap.fd.css"!--> 
	
	<!--link rel="stylesheet" href="CSS/bootstrap-datepicker3.css"/!-->
    
     
        <link rel="stylesheet" type="text/css" href="CSS/styles.css">
        <link rel="stylesheet" href="CSS/jquery-ui-1.8.12.custom.css" type="text/css" /> 
     
  
   	<script src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7QbCoPJ4NEaQJQ8tjGsF-y5LAFavLGBk&libraries=places&sensor=false"></script>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
       
        <script type="text/javascript" src="js/jquery-ui-1.8.12.custom.min.js"></script>
   
        <script type="text/javascript" src="js/iteniaire.js"></script>

</head>
    <body >
        
   
        <div style="  background:rgba(25, 119, 154, 1); width: 100%; height: 55px;">
            <ul id="menu_horizontal" >
             <li ><a style="height: 55px" class="horizontal"href="Home.php" >Accueil</a></li>
             <li><a style="height: 55px" class="horizontal"href="Comparatif.php">Comparatif</a></li>
            <li><a  style="height: 55px" class="horizontal"href="Contact.php">Qui sommes nous ?</a></li>
            <li><a  style="height: 55px ; float: right; font-size:20px;" class="horizontal" href="#a" onclick="ShowLogin()">Connexion </a></li>
            </ul> 
       </div>
        <div  id="img-container"   >
          
		<div id="img_group" background-color="black">
                    <img  style="width:100%; height:100%" src="img/Image9.jpg"/> 
                    <img style="width:100%; height:100%" src="img/Image6.jpg"/> 
                    <img  style="width:100%; height:100%" src="img/Image5.jpg"/> 
                    <img style="width:100%; height:100%" src="img/Image7.jpg"/> 
                    
		
	  </div>
        </div>
      
</div>
  
    <div class="inner-container"  id="Login" style="top:calc(50vh - 300px); display: none;">
            <div class="box">
                <div class="login"> <img src="img/login.png" alt="login_icon" /> </div>
                <form action="php/Connexion.php" method="post">
                 <input type="text" name="pseudo" placeholder="Email" autocomplete="false" />
                 <input type="password" name="mot_de_passe" placeholder="Mot de passe" />
                 <button  style="width:300px;"type="submit" name="connexion"  >Connexion</button>
				  </form>
				 
			</div>
            </div>
        </div>
   
    <div id="main">
    <!-- aside c la partie 1 widh : 20% et left!-->
  
            <div class="vertical-menu">
              
                <ul  class="nav" style="width:200px;" > 
                    
                    <li > <a id="1"  href="#dsd" style="width:200px;" >  Trier les Banques </a>  
                        <ul  class="sub-menu"  >
                            <li ><a style="width:200px;" id="C1" href="#ds"  > Classer Par Gestion et tenue de compte </a>
                                                    <ul class="sub-menu">
                                                        <div  class="Dialog" id="DialC1"  >


                                                          <div>

                                                                         <select class="sel" name="PresetationsC" > 
                                                                                                <option value="1" selected="true" >Ouverture de compte et delivrance chequier</option>
                                                                                                <option value="2" >Frais de tenue de compte courant</option>
                                                                                                <option value="3">Frais de tenue de compte professionnel</option>
                                                                                                <option value="4">Frais de tenue de compte cheque</option>
                                                                                                <option value="Produit5">Frais de tenue de compte sur livret</option>
                                                                                                <option value="Produit1">Tenue de compte en devise</option>
                                                                                                <option value="Produit2" >Fermeture compte courant</option>
                                                                                                <option value="Produit3">Fermeture compte cheque</option>
                                                                                                <option value="Produit4">Fermeture compte sur livret</option>
                                                                                                <option value="Produit5">Fermeture compte devise</option>
                                                                                        </select>

                                                             <button   onclick="CloseDialog(this)"> Trier </button>
                                                         </div>
                                                        </div>
                                                    </ul>
					</li>
                            <li class="sub-sub-menu"> <a style="width:200px;" id="C2" href="#ds"  onclick="ShowDialog(this)"> Classer Par Operation de paiement</a>
                                <ul class="sub-menu">    
                                                <div class="Dialog" id="DialC2"  >


                                                            <div>

                                                                         <select class="sel" name="PresetationsC" > 
                                                                                                   <option value="Produit1" selected="true" >Versement especes Client agence</option>
                                                                                                   <option value="Produit2" >Versement especes Tiers</option>
                                                                                                   <option value="Produit3">Versement especes deplace Client autre agence</option>
                                                                                                   <option value="Produit4">Virement recu d un compte de la meme agence</option>
                                                                                                   <option value="Produit5">Virement recu d un compte d une autre agence de la meme banque</option>
                                                                                                   <option value="Produit1">Virement devise recu de l etranger</option>
                                                                                                   <option value="Produit2" >Rertait especes</option>
                                                                                                   <option value="Produit3">Retrait especes aux guichets d une autre agence</option>
                                                                                                   <option value="Produit4">Emission de cheque de banque</option>
                                                                                                   <option value="Produit5">Emission Cheque de banque deplace</option>
                                                                                                   <option value="Produit4">Annulation de cheque de banque (Client)</option>
                                                                                                   <option value="Produit5">Virement de compte a compte (meme agence)</option>
                                                                                           </select>
                                                                <button   onclick="CloseDialog(this)"> Trier </button>
                                                            </div>
                                                          </div>
                                </ul>  
                           </li>
                            <li class="sub-sub-menu"> <a style="width:200px;" id="C3" href="#ds"  onclick="ShowDialog(this)"> Classer Par Monetique </a>
                                  <ul class="sub-menu">    
                                        <div class="Dialog" id="DialC3"  >


                                                <div>
                                                     <select class="sel" name="PresetationsC" > 
                                                                                       <option value="Produit1" selected="true" >Emission de la premiere carte</option>
                                                                                       <option value="Produit2" >Renouvelement</option>
                                                                                       <option value="Produit3">Reconfection</option>
                                                                                       <option value="Produit4">Reedition du code secret</option>

                                                                               </select>
                                                    <button   onclick="CloseDialog(this)"> Trier </button>
                                                </div>
                                            </div>
                                </ul>  
                            </li>
                        </ul>
                    </li>
                    <li> <a style="width:200px;">Filtrer les Banques</a>
                           <ul  class="sub-menu"  >
                            <li class="sub-sub-menu"><a style="width:200px;" id="F1" href="#ds"  onclick="ShowDialog(this)"> Filtrer Selon Gestion et tenue de compte </a>
                              <ul class="sub-menu">    
                                       <div class="Dialog" id="DialF1"  >


                                        <div style="height: 200px ;">
                                                   <select class="sel" name="PresetationsC" > 
                                                                               <option value="1" selected="true" >Ouverture de compte et delivrance chequier</option>
                                                                               <option value="2" >Frais de tenue de compte courant</option>
                                                                               <option value="3">Frais de tenue de compte professionnel</option>
                                                                               <option value="4">Frais de tenue de compte cheque</option>
                                                                               <option value="Produit5">Frais de tenue de compte sur livret</option>
                                                                               <option value="Produit1">Tenue de compte en devise</option>
                                                                               <option value="Produit2" >Fermeture compte courant</option>
                                                                               <option value="Produit3">Fermeture compte cheque</option>
                                                                               <option value="Produit4">Fermeture compte sur livret</option>
                                                                               <option value="Produit5">Fermeture compte devise</option>
                                                                       </select>
                                              <h3>Valeur Minimale</h3>
                                              <input type="text" name="MIN" placeholder="Entrez la valeur Minimale" autocomplete="false"  >
                                              <h3>Valeur Maximale</h3>
                                               <input type="text" name="MAX" placeholder="Entrez la valeur Maximale" autocomplete="false"  >
                                               <br>
                                            <button   onclick="CloseDialog(this)"> Filtrer </button>
                                        </div>
                                    </div>
                                </ul>     
                            </li>
                               
                            <li class="sub-sub-menu"> <a style="width:200px;" id="F2" href="#ds"  onclick="ShowDialog(this)"> Filtrer Selon Operation de paiement</a> 
                                  <ul class="sub-menu">    
                                        <div class="Dialog" id="DialF2"  >
	
          
                                                    <div style="height: 200px ;">
                                                          <select class="sel" name="PresetationsC" > 
                                                                                           <option value="Produit1" selected="true" >Versement especes Client agence</option>
                                                                                           <option value="Produit2" >Versement especes Tiers</option>
                                                                                           <option value="Produit3">Versement especes deplace Client autre agence</option>
                                                                                           <option value="Produit4">Virement recu d un compte de la meme agence</option>
                                                                                           <option value="Produit5">Virement recu d un compte d une autre agence de la meme banque</option>
                                                                                           <option value="Produit1">Virement devise recu de l etranger</option>
                                                                                           <option value="Produit2" >Rertait especes</option>
                                                                                           <option value="Produit3">Retrait especes aux guichets d une autre agence</option>
                                                                                           <option value="Produit4">Emission de cheque de banque</option>
                                                                                           <option value="Produit5">Emission Cheque de banque deplace</option>
                                                                                           <option value="Produit4">Annulation de cheque de banque (Client)</option>
                                                                                           <option value="Produit5">Virement de compte a compte (meme agence)</option>
                                                                                   </select>
                                                          <h3>Valeur Minimale</h3>
                                              <input type="text" name="MIN" placeholder="Entrez la valeur Minimale" autocomplete="false"  >
                                              <h3>Valeur Maximale</h3>
                                               <input type="text" name="MAX" placeholder="Entrez la valeur Maximale" autocomplete="false"  >
                                               <br>
                                                        <button   onclick="CloseDialog(this)"> Filtrer </button>
                                                    </div>
                                    </div>
                                </ul>  
                         </li>
                            <li class="sub-sub-menu"> <a style="width:200px;" id="F3" href="#ds"  onclick="ShowDialog(this)"> Filtrer Selon Monetique </a>
                                  <ul class="sub-menu">    
                                                                        <div class="Dialog" id="DialF3"  >


                                                                            <div style="height: 200px ;">

                                                          <select class="sel" name="PresetationsC" > 
                                                                                 <option value="Produit1" selected="true" >Emission de la premiere carte</option>
                                                                                 <option value="Produit2" >Renouvelement</option>
                                                                                 <option value="Produit3">Reconfection</option>
                                                                                 <option value="Produit4">Reedition du code secret</option>

                                                                         </select>
                                              <h3>Valeur Minimale</h3>
                                              <input type="text" name="MIN" placeholder="Entrez la valeur Minimale" autocomplete="false"  >
                                              <h3>Valeur Maximale</h3>
                                               <input type="text" name="MAX" placeholder="Entrez la valeur Maximale" autocomplete="false"  >
                                               <br>
                                              <button   onclick="CloseDialog(this)"> Filtrer </button>
                                          </div>
                                      </div>
                                  </ul>  
                                </li></li>
                           
                        </ul>
                    </li>
                </ul>
                        
             
  
            </div>
   
    <!-- section c la partie 2     widh:80% et right!-->
     <div>
                        <span class="label-input100" style="font-size: 16px;">Selectionnez une ville pour afficher seulement les banques de cette ville  </span>
                        <select  id="SELECT"class="sel" name="Banque1" style="display: inline-block;margin-top: 20px; margin-left:  80px; " class="contact100-form validate-form" > 
              <?php    
              $Requete2 = $BDD->query("Select DISTINCT bq_Ville from Local ");
			 
			 		while( $data = $Requete2->fetch())
					{  
					?>
                <option value="<?php echo $data['bq_Ville']?>"  > <?php echo $data['bq_Ville']?> </option>
                          <?php } ?>
                 </select>
                        <button    id="AfficherVille" class="adminButtun" onclick="AfficherVille(this)" > Afficher ses banques</button> <br>
         </div>     
    <section id="contenu">
      
                               <?php  $Requete1 = $BDD->query("SELECT * FROM banque ORDER BY bq_Nom");
                                    $i=0;
                                    $j=0;
			 		while( $data = $Requete1->fetch())
					{  $i++;
				       $j++;
					?>
       
		
        <div  class="divInfo" >
		  
            <img  style="width:50px; height:50px" src="<?php echo $data['bq_Logo'] ?>"/>
            
            <table class="TabInfo">
                  <tr> 
                    <th style="width: 100px;">
                        Nom de Banque :
                    </th> 
                    <td ><?php echo $data['bq_Nom'] ?></td>
                </tr>
                <tr> 
                    <th style="width: 100px;">
                        Siege Social :
                    </th> 
                    <td ><?php echo $data['bq_Siege'] ?></td>
                </tr>
               <tr> 
                    <th>Telephone :</th> 
                    <td><?php echo $data['bq_Tel'] ?></td>
                </tr>
               <tr> 
                    <th>Fax :</th> 
                    <td><?php echo $data['bq_Fax'] ?> </td>
                </tr>
                   
				
            </table>
            <a href="#jkj"  name="<?php echo $data['bq_Id']; ?>" id="Link<?php echo $i ?>" onclick="AfficherDetail(<?php echo $i ?>)">Voir Plus de Detail</a>
            <div class="dessus" id="Div<?php echo $i?>" style="display: none;"> 
                <div  style="font-size: 20px;background-color: rgba(25, 119, 154, 1) ; height: 40px;width: 100%; color: white; ">Les Agences de la banque a travers l'Algerie</div>
                                         
                     <div id="container">
                         <h4 style="color: rgba(25, 119, 154, 1) ;">Vous pouvez Calculer l'itineraire entre votre emplacement et l'une des agences de cette banque</h4>
                         <div id="destinationForm<?php echo $i?>" class="destinationForm">
                        <form action="" method="get" name="direction<?php echo $i?>" id="direction<?php echo $i?>">
                            <label>Point de depart :</label>
                            <input type="text" name="origin" id="origin<?php echo $i?>">
                            <label>Destination :</label>
                            <input type="text" name="destination" id="destination<?php echo $i?>">
                                <input type="button" style="background-color: rgba(25, 119, 154, 1);color:#DCDCDC; border:0;
                        padding: 5px;
                         font-size:16px;
                         width:200px;
                         margin:16px auto;
                         display:inline;cursor:pointer; " value="Calculer l'itineraire" onclick="javascript:calculate(<?php echo $i?>)">
                        </form>
                            
                    </div>
                         <div class="panel" id="panel<?php echo $i?>"></div>
                       <div id="map<?php echo $data['bq_Id']; ?>"  class="map"></div>
                      
                    </div>     
                              
           
                <?php $bqid = $data['bq_Id']; //Je vais utiliser ces <p> juste pour récupérer les agences de cette banques
                $Requete5 = $BDD->query("SELECT bq_Local FROM banque B join Local L on B.bq_Id = L.bqId where B.bq_Id = '".$bqid."' ");
               ?> 
                <div id="hidden" style="display:none;">
               <?php  while( $data5 = $Requete5->fetch())
                        {  ?> <p id="<?php echo  $data5['bq_Local']?>"></p> <?php }?></div>
                <div  style="font-size: 20px;background-color: rgba(25, 119, 154, 1) ; height: 50px;width: 100%; color: white; ">Les tarifs des prestations de la banque</div>
               
                <table  class="table-fill"   > 
				<thead>
				<tr>
					<th class="text-left" >
						<h3 > GESTION ET TENUE DE COMPTE    <h3>	
					</th> 
					<th  class="text-left" > <h3> COMMISSION / FRAIS HT  <h3></th>
					
				</tr>
				</thead>
				<tbody class="table-hover">
				<?php 
					//Commencer les requetes demandÃ©es	
					 $Requete2 = $BDD->query("SELECT * FROM GestionCompte where bq_id = '".$bqid."' ");
							while( $data1 = $Requete2->fetch())
							{                                          
								 ?>
                                                                <tr>
								<td class="text-left">Ouverture de compte et delivrance chequier</td>
								<td class="text-left"><?php if($data1['Ouverturedecompteetdelivrancechequier'] <> Null ) {echo $data1['Ouverturedecompteetdelivrancechequier'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Frais de tenue de compte courant</td>
								<td class="text-left"><?php if($data1['Fraisdetenuedecomptecourant'] <> Null ) {echo $data1['Fraisdetenuedecomptecourant'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Frais de tenue de compte professionnel</td>
								<td class="text-left"><?php if($data1['Fraisdetenuedecompteprofessionnel'] <> Null ) {echo $data1['Fraisdetenuedecompteprofessionnel'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Frais de tenue de compte cheque</td>
								<td class="text-left"><?php if($data1['Fraisdetenuedecomptecheque'] <> Null ) {echo $data1['Fraisdetenuedecomptecheque'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Frais de tenue de compte sur livret</td>
								<td class="text-left"><?php if($data1['Fraisdetenuedecomptesurlivret'] <> Null ) {echo $data1['Fraisdetenuedecomptesurlivret'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Tenue de compte en devise</td>
								<td class="text-left"><?php if($data1['Tenuedecompteendevise'] <> Null ) {echo $data1['Tenuedecompteendevise'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Fermeture compte courant</td>
								<td class="text-left"><?php if($data1['Fermeturecomptecourant'] <> Null ) {echo $data1['Fermeturecomptecourant'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Fermeture compte cheque</td>
								<td class="text-left"><?php if($data1['Fermeturecomptecheque'] <> Null ) {echo $data1['Fermeturecomptecheque'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Fermeture compte sur livret</td>
								<td class="text-left"><?php if($data1['Fermeturecomptesurlivret'] <> Null ) {echo $data1['Fermeturecomptesurlivret'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Fermeture compte devise</td>
								<td class="text-left"><?php if($data1['Fermeturecomptedevise'] <> Null ) {echo $data1['Fermeturecomptedevise'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														
							 <?php  
							}
							?>	
				</tbody>
				</table>
						
						  <table  class="table-fill"   > 
				<thead>
				<tr>
					<th class="text-left" >
						OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES   	
					</th> 
					<th  class="text-left" >  COMMISSION / FRAIS HT  </th>
					
				</tr>
				</thead>
				<tbody class="table-hover">
				<?php 
					//Commencer les requetes demandÃ©es	
					 $Requete3 = $BDD->query("SELECT * FROM payement where bq = '".$bqid."' ");
							while( $data1 = $Requete3->fetch())
							{                                          
								 ?>
								<tr>
								<td class="text-left">Versement especes (Client agence)</td>
								<td class="text-left"><?php if($data1['VersementespecesClientagence']  <> Null ){ echo $data1['VersementespecesClientagence'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Versement especes (Tiers)</td>
								<td class="text-left"><?php if($data1['VersementespecesTiers'] <> Null ){echo $data1['VersementespecesTiers'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Versement especes deplace (Client autre agence)</td>
								<td class="text-left"><?php if($data1['VersementespecesdeplaceClientautreagence'] <> Null ){echo $data1['VersementespecesdeplaceClientautreagence'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Virement recu d un compte de la meme agence</td>
								<td class="text-left"><?php if($data1['Virementrecuduncomptedelamemeagence'] <> Null ){echo $data1['Virementrecuduncomptedelamemeagence'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Virement recu d un compte d'une autre agence de la meme banque</td>
								<td class="text-left"><?php if($data1['Virementrecuduncompteduneautreagencedelamemebanque'] <> Null ){echo $data1['Virementrecuduncompteduneautreagencedelamemebanque'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Virement devise recu de l etranger</td>
								<td class="text-left"><?php if($data1['Virementdeviserecudeletranger'] <> Null ){echo $data1['Virementdeviserecudeletranger'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Rertait especes</td>
								<td class="text-left"><?php if($data1['Rertaitespeces'] <> Null ){echo $data1['Rertaitespeces'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Retrait especes aux guichets d une autre agence</td>
								<td class="text-left"><?php if($data1['Retraitespecesauxguichetsduneautreagence'] <> Null ){ echo $data1['Retraitespecesauxguichetsduneautreagence'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Emission de cheque de banque</td>
								<td class="text-left"><?php if($data1['Emissiondechequedebanque'] <> Null ){echo $data1['Emissiondechequedebanque'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Emission Cheque de banque deplace</td>
								<td class="text-left"><?php if($data1['EmissionChequedebanquedeplace'] <> Null ){echo $data1['EmissionChequedebanquedeplace'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Annulation de cheque de banque (Client)</td>
								<td class="text-left"><?php if($data1['AnnulationdechequedebanqueClient'] <> Null ){echo $data1['AnnulationdechequedebanqueClient'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Virement de compte a compte (meme agence)</td>
								<td class="text-left"><?php if($data1['Virementdecompteacomptememeagence'] <> Null ){echo $data1['Virementdecompteacomptememeagence'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Virement ordonne en faveur client d une autre agence</td>
								<td class="text-left"><?php if($data1['Virementordonneenfaveurclientduneautreagence'] <> Null ){echo $data1['Virementordonneenfaveurclientduneautreagence'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
							 <?php  
							}
							?>	
				</tbody>
				</table>
						
						 <table  class="table-fill"   > 
				<thead>
				<tr>
					<th class="text-left" >
						OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES   	
					</th> 
					<th  class="text-left" >  COMMISSION / FRAIS HT  </th>
					
				</tr>
				</thead>
				<tbody class="table-hover">
				<?php 
					//Commencer les requetes demandÃ©es	
					 $Requete4 = $BDD->query("SELECT * FROM Monetique where bId = '".$bqid."' ");
							while( $data1 = $Requete4->fetch())
							{                                          
								 ?>
                                    <tr>
								<td class="text-left">Emission de la premiere carte</td>
                                                                <td class="text-left"><?php  if($data1['Emissiondelapremierecarte'] <> Null ) {echo $data1['Emissiondelapremierecarte'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Renouvelement</td>
                                                                <td class="text-left"><?php if($data1['Renouvelement'] <> Null ) {echo $data1['Renouvelement'];} else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Reconfection</td>
								<td class="text-left"><?php if($data1['Reconfection'] <> Null ) {echo $data1['Reconfection'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Reedition du code secret</td>
								<td class="text-left"><?php if($data1['Reeditionducodesecret'] <> Null ) {echo $data1['Reeditionducodesecret'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Comission de retrait Sur DAB de la banquet</td>
								<td class="text-left"><?php if($data1['ComissionderetraitSurDABdelabanque'] <> Null ) {echo $data1['ComissionderetraitSurDABdelabanque'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Comission de retrait Sur DAB confrere</td>
								<td class="text-left"><?php if($data1['ComissionderetraitSurDABconfrere'] <> Null ) {echo $data1['ComissionderetraitSurDABconfrere'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
														<tr>
								<td class="text-left">Commission de paiement sur TPE/Client</td>
								<td class="text-left"><?php if($data1['CommissiondepaiementsurTPE/Client'] <> Null ) {echo $data1['CommissiondepaiementsurTPE/Client'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Commission de paiement sur TPE/Commercant</td>
								<td class="text-left"><?php if($data1['CommissiondepaiementsurTPE/Commercant'] <> Null ) {echo $data1['CommissiondepaiementsurTPE/Commercant'];}else {echo"GRATUIT";} ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Mise en opposition</td>
                                                                <td class="text-left"><?php if($data1['Miseenopposition'] <> Null ) {echo $data1['Miseenopposition'] ;}else {echo"GRATUIT";}?> </td>	
										</tr>
								
							 <?php  
							}
							?>	
				</tbody>
				</table>
            </div>	
        </div>
		<?php } ?>
   
   
  
    </section>
    </div>
    
    <footer id="footer">
    
     <ul id="menu_horizontal"style="display: inline;float: left; ;" >
                    <li><a class="horizontal"href="Home.php" >Accueil</a></li>
                    <li><a class="horizontal" href="Comparatif.php">Comparatif</a></li>
            <li><a class="horizontal"href="Contact.php">Qui sommes nous ?</a></li>
         
     </ul> 
        <div style="display: inline;float: left;width: 500px;"></div>
        <ul id="menu_horizontal" style="display: inline;float: right;">
       <a  href=""><image  style="width: 40px;height: 40px;display: inline;float: right;"src="img/if_instagram_online_social_media_photo_734395.png"/> </a>
        <a href=""><image  style="width: 40px;height: 40px;display: inline;float: right;"s src="img/if_online_social_media_facebook_734386.png"/> </a>
      <a href=""><image  style="width: 40px;height: 40px;display: inline;float: right;"s src="img/if_twitter_online_social_media_734367.png"/> </a>
      <a href=""><image  style="width: 40px;height: 40px;display: inline;float: right;"s src="img/if_online_social_media_chrome_734391.png"/> </a>

        </ul>

     <!--a href="Home.php" >Accueil  </a>
     <a href="#">Comparatif  </a>
     <a href="#">Qui sommes nous ?  </a!-->
    </footer>
    <script>
        var height2;
        var strClass;
        var DivId;
        var Min = 0;
        var Max =  0 ;
        var Classer = false;
        var Filtrer = false;
        var FVille = false;
        var maps =[];
        function AfficherDetail(id){
           
            
             //alert(id);
           var detail =  document.getElementById("Div"+id);
		   var link = document.getElementById("Link"+id);
                    var nom = link.name;
                    map_initialize(nom);
                    getMarkers(nom,"Div"+id);//nes7a9 l id ta3 le div li fih les p 
                   
           if(detail.style.display === "none")
           {
               detail.style.display = "block" ;
			   link.innerHTML = "Voir moins de detail";
                           
                             var parent = detail.parentNode;
                           
                           var positionInfo1 = parent.getBoundingClientRect();
                            var height1 = positionInfo1.height;
                            var positionInfo2 = detail.getBoundingClientRect();
                            height2 = positionInfo2.height;
                            
                           parent.style.height = height1 + height2;
                          
			   
           }else
		   {
			   detail.style.display = "none" ;
			   link.innerHTML = "Voir plus de detail";
                               var parent = detail.parentNode;
                           
                           var positionInfo1 = parent.getBoundingClientRect();
                            var height1 = positionInfo1.height;
                           
                            
                           parent.style.height = height1 - height2;
                          
		   }
           
        }
        function AfficherVille(ele)
        {
            var div = ele.parentNode;
                     DivId = 0;
                      var children = div.childNodes;
                      for (var i=0; i<div.childNodes.length; i++) 
                      {
                          if(children[i].nodeName === "SELECT")
                                    {
                                        var e = children[i];
                                          strClass = e.options[e.selectedIndex].text;
                                      
                                         
                                         
                                    }
                      }
        }
        function CloseDialog(ele)
        {
           
                var parent1 = ele.parentNode;
                var DialogWindow = parent1.parentNode;
                     DivId = DialogWindow.id;
                      //alert(DivId);
                    /**********Différencer entre Classer et Filtrer********/
                    if(DialogWindow.id.includes('C'))
                    {
                        Classer = true;
                    }
                    else{//cas de filtre
                        Filtrer = true;
                    }
               
         
                   var children = DialogWindow.childNodes;
             
                   for (var i=0; i<DialogWindow.childNodes.length; i++) {
                      
                        if(children[i].nodeName === "DIV")
                        {
                           
                            var children1 = children[i].childNodes;
                            for (var j=0; j<children[i].childNodes.length; j++) {
                               
                                if(children1[j].nodeName === "SELECT")
                                    {
                                        var e = children1[j];
                                          strClass = e.options[e.selectedIndex].text;
                                      
                                         
                                         
                                    }
                                    
                                    if(children1[j].name === "MIN")//cas du input du Valeur Min
                                    {
                                        var e = children1[j];
                                        Min = e.value;
                                 
                                    }
                                     if(children1[j].name === "MAX")//cas du input du Valeur Max
                                    {
                                        var e = children1[j];
                                        
                                        var e = children1[j];
                                        Max = e.value;
                                    }
                                }
                            }
                        }
                      
              
                //var strUser = e.options[e.selectedIndex].text;  
            //}
           /* else
            {
                DialogWindow.style.visibility =  "visible" ;
            }*/
             
            
        }
            function map_initialize(bqid) {
            
                        //Initialiser le géocoder 
                        geocoder = new google.maps.Geocoder();
                        
                        
                               var myOptions = {
                                                    
                                center: new google.maps.LatLng(28,1),
                                zoom: 5,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                              };
                             
                              if(document.getElementById("map"+bqid) !== null)
                              {
                               map = new google.maps.Map(document.getElementById("map"+bqid), myOptions);
                               panel    = document.getElementById('panel'+bqid);
                               maps[bqid] = map;
                               // alert(maps[bqid]);
                               
                              }
                              /////////////////////////////Pour calculer l'iténiéaire
                              //  
                                                                  

                               
  

                                    direction = new google.maps.DirectionsRenderer({
                                      map   : map,
                                      panel : panel // Dom element pour afficher les instructions d'itinÃ©raire
                                    });
                              //////////////////////////////////////////////////////
                            }
                       
           function getMarkers(bqid,divid){
                                    if(document.getElementById("map"+bqid) !== null)
                              {
                               //map = new google.maps.Map(document.getElementById("map"+bqid), myOptions);
                               //maps[bqid] = map;
                               // alert(maps[bqid]);
                               var div = document.getElementById(divid); 
                                                var children = div.childNodes;
                                                
                                     for (var i=0; i<div.childNodes.length; i++) 
                                     {
                                         //alert(children[i].nodeName);
                                         if(children[i].id === "hidden")
                                                   {
                                                                    var divh = children[i];
                                                                        
                                                                        var childrenl = divh.childNodes;
                                                                        for(var j=0; j<divh.childNodes.length;j++)
                                                                        {
                                                                                         
                                                                                if(childrenl[j].nodeName ==="P")
                                                                                {
                                                                                                        var e = childrenl[j];
                                                                                                           var local = e.id;
                                                                                                    //alert(childrenl[j].nodeName);
                                                                                                        geocoder.geocode({ 'address': local }, function (results, status) {
                                                                                                       console.log(results);
                                                                                                       var latLng = {lat: results[0].geometry.location.lat (), lng: results[0].geometry.location.lng ()};
                                                                                                       console.log (latLng);
                                                                                                       if (status === 'OK') {
                                                                                                           var marker = new google.maps.Marker({
                                                                                                               position: latLng,
                                                                                                               map: maps[bqid],
                                                                                                           });
                                                                                                           //console.log (map);
                                                                                                       } else {
                                                                                                           alert('Geocode was not successful for the following reason: ' + status);
                                                                                                       }
                                                                                        });
                                                                                }
                                                                        }
                                                                }
                                       }
                              
                               
                               }
                            }
                                 function ShowLogin()
        {
            
                   

                    var Login = document.getElementById("Login");
                   

                if(Login.style.display === "none")
                {Login.style.display =  "block" ;}
                else
                {
                    Login.style.display =  "none" ;
                }
                
             
        }
                        

        
        $(document).ready(function(){
         //maps_initialize();
        // getMarkers();
                            $('.nav li > .sub-menu').parent().hover(function() {
                var submenu = $(this).children('.sub-menu');
                if ( $(submenu).is(':hidden') ) {
                  $(submenu).slideDown(200);
                 
                } else {
                  $(submenu).slideUp(200);
                }
              });
              
                  $(".Dialog button").click(function() {
                         
                           $.ajax({
                                
                             url:"php/Classer.php",  
                             type: "POST", 
                             data:{ StrClasser : strClass,Div_Id : DivId,Classer : Classer, Min : Min ,Max : Max, Filtrer : Filtrer},
                             //data : 'Classer=' + Classer + 'StrClasser=' + strClass + 'Div_Id=' + DivId,
                               success: function(data) {
                                  // var div =  $(this).parent();
                                 //alert(Classer);
                                
                                 $('#contenu').html(data);
                                 Classer = false;//on a terminé le classement
                                 Filtrer = false;
                              
                              //   alert(strClass);
                     
                                  //alert(Min);
                                  //alert(Max);
                                 //console.log(data);
                                 //location.reload(true);
                                 
                                 //console.log( statut);
                                 //location.reload(true);
                                    
                                    }		 
                           }); 
                });
          
                        $("#AfficherVille").click(function() {

                            
                            FVille = true;
                            //alert(strClass);
                           $.ajax({
                              
                             url:"php/ClasserVille.php",  
                             type: "POST", 
                             data:{ StrClasser : strClass, FVille : FVille},
                             //data : 'Classer=' + Classer + 'StrClasser=' + strClass + 'Div_Id=' + DivId,
                               success: function(data) {
                                  // var div =  $(this).parent();
                                 //alert(data);
                                 
                                 $('#contenu').html(data);
                              
                                 FVille = false;
                             
                                    
                                    }		 
                           }); 
                });
                        
                        
        });
    
      
                          
    </script>
</body>