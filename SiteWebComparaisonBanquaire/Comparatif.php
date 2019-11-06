<?php
session_start();
 // $_SESSION['BqId1'] = 0 ;
 // $_SESSION['BqId2'] = 0 ;
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

if(($_SESSION['BqId1'] != 0) & ($_SESSION['BqId2'] != 0))
{$BqId1 = $_SESSION['BqId1'];
$BqId2 = $_SESSION['BqId2'];

}
 else {
    $BqId1 = 0;
    $BqId2 = 0;
   
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="Bedla Hasna Rahma">
	<meta name="description" content="Site Wbe de comparaison de prestations bancaire">
	<meta name="keywords" content="Web , HTML5, CSS3, JS, JQuery, PHP,AJAX, prestation, banque">
	<meta charset="utf-8">
	<title>Comparatif </title>
       

         
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        
  
   	<script src="js/jquery-3.2.1.min.js"></script>
	
</head>
<body >
      
      <div id="header" > 
        <img src="img/logo3.jpg" style="width: 20% ; height: 55px ; display : inline; float: left;border-color: rgba(25, 119, 154, 1) ;
    border-bottom-style: solid;
    border-bottom-width: 1px;"/>
        <div style="  background:rgba(25, 119, 154, 1); width: 100%; height: 55px;">
            <ul id="menu_horizontal" >
             <li ><a style="height: 55px" class="horizontal"href="Home.php" >Accueil</a></li>
             <li><a style="height: 55px" class="horizontal"href="Comparatif.php">Comparatif</a></li>
            <li><a  style="height: 55px" class="horizontal"href="Contact.php">Qui sommes nous ?</a></li>

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
    <div style="width: 100%;min-height: 300px;background-color: white;">
        <form action="php/Comparer.php" method="post">
           <select class="sel" name="Banque1" style="display: inline-block;"> 
                            <option value="BANQUE AL BARAKA ALGERIE" >BANQUE AL BARAKA ALGERIE</option>
                            <option value="BANQUE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL"  >BANQUE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL</option>
                            <option value="BANQUE EXTERIEURE D ALGERIE" >BANQUE EXTERIEURE D ALGERIE</option>
                            <option value="BANQUE NATIONALE D ALGERIE">BANQUE NATIONALE D ALGERIE</option>
                            <option value="BANQUE DE DEVELOPPEMENT LOCAL">BANQUE DE DEVELOPPEMENT LOCAL</option>
                            <option value="CREDIT POPULAIRE D ALGERIE">CREDIT POPULAIRE D ALGERIE</option>                           
                            <option value="CREDIT AGRICOLE CORPORATE ET INVESTISSEMENT BANK ALGERIE" >CREDIT AGRICOLE CORPORATE ET INVESTISSEMENT BANK ALGERIE</option>
                            <option value="AL SALAM BANK  ALGERIA  SPA">AL SALAM BANK  ALGERIA  SPA</option>
                                               </select>
              <select class="sel" name="Banque2" style="display: inline-block;float: right;" > 
                             <option value="BANQUE AL BARAKA ALGERIE" >BANQUE AL BARAKA ALGERIE</option>
                            <option value="BANQUE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL"  >BANQUE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL</option>
                            <option value="BANQUE EXTERIEURE D ALGERIE" >BANQUE EXTERIEURE D ALGERIE</option>
                            <option value="BANQUE NATIONALE D ALGERIE">BANQUE NATIONALE D ALGERIE</option>
                            <option value="BANQUE DE DEVELOPPEMENT LOCAL">BANQUE DE DEVELOPPEMENT LOCAL</option>
                            <option value="CREDIT POPULAIRE D ALGERIE">CREDIT POPULAIRE D ALGERIE</option>                           
                            <option value="CREDIT AGRICOLE CORPORATE ET INVESTISSEMENT BANK ALGERIE" >CREDIT AGRICOLE CORPORATE ET INVESTISSEMENT BANK ALGERIE</option>
                            <option value="AL SALAM BANK  ALGERIA  SPA">AL SALAM BANK  ALGERIA  SPA</option>
                                               </select>
            <br><br><br><br><br><br><br>
                 <button  style="width:300px;margin-left: 35%  ;margin-right:  35%  ; padding: 5px;" type="submit" name="Comparer" >Comparer</button>
        </form>
        <table  class="table-fill">
             <thead>
                 <tr> <th>Prestation</th> <th> <?php if($_SESSION['Banque1'] != null){echo "Banque :" ;echo $_SESSION['Banque1'];}else {    echo "Banque 1";} ?></th> <th> <?php if($_SESSION['Banque2'] != null){echo "Banque :" ;echo $_SESSION['Banque2'];}else {    echo "Banque 2";} ?> </th></tr>
                                                                </thead> 
                                                                <tbody class="table-hover">
                                                                <?php $Requete1 = $BDD->query("SELECT * FROM  Monetique M  join GestionCompte G on M.bId = G.bq_id join Payement P on P.bq = G.bq_id  where G.bq_id = '".$BqId1."'   ");
                                                                      $Requete2 = $BDD->query("SELECT * FROM  Monetique M  join GestionCompte G on M.bId = G.bq_id join Payement P on P.bq = G.bq_id  where G.bq_id = '".$BqId2."' ");
							while( ($data1 = $Requete1->fetch()) & ($data2 = $Requete2->fetch())) { ?>
                                                            

                                                           
                                                                <tr>
								<td class="text-left">Ouverture de compte et delivrance chequier</td>
                                                                <td class="text-left"><?php echo $data1['Ouverturedecompteetdelivrancechequier']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Ouverturedecompteetdelivrancechequier']   ?> </td>
										</tr>
														<tr>
								<td class="text-left">Frais de tenue de compte courant</td>
								<td class="text-left"><?php echo $data1['Fraisdetenuedecomptecourant']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Fraisdetenuedecomptecourant']   ?> </td>
										</tr>
														<tr>
								<td class="text-left">Frais de tenue de compte professionnel</td>
								<td class="text-left"><?php echo $data1['Fraisdetenuedecompteprofessionnel']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Fraisdetenuedecompteprofessionnel']  ?> </td>
										</tr>
														<tr>
								<td class="text-left">Frais de tenue de compte cheque</td>
								<td class="text-left"><?php echo $data1['Fraisdetenuedecomptecheque']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Fraisdetenuedecomptecheque']  ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Frais de tenue de compte sur livret</td>
								<td class="text-left"><?php echo $data1['Fraisdetenuedecomptesurlivret']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Fraisdetenuedecomptesurlivret']  ?> </td>
										</tr>
														<tr>
								<td class="text-left">Tenue de compte en devise</td>
								<td class="text-left"><?php echo $data1['Tenuedecompteendevise']   ?> </td>	
                                                                <td class="text-left"><?php echo $data2['Tenuedecompteendevise']   ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Fermeture compte courant</td>
								<td class="text-left"><?php echo $data1['Fermeturecomptecourant']   ?> </td>
                                                                <td class="text-left"><?php echo $data2['Fermeturecomptecourant']   ?> </td>
										</tr>
														<tr>
								<td class="text-left">Fermeture compte cheque</td>
								<td class="text-left"><?php echo $data1['Fermeturecomptecheque']   ?> </td>
                                                                <td class="text-left"><?php echo $data2['Fermeturecomptecheque']   ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Fermeture compte sur livret</td>
								<td class="text-left"><?php echo $data1['Fermeturecomptesurlivret']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Fermeturecomptesurlivret']  ?> </td>
										</tr>
														<tr>
								<td class="text-left">Fermeture compte devise</td>
								<td class="text-left"><?php echo $data1['Fermeturecomptedevise']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Fermeturecomptedevise']  ?> </td>	
										</tr>
                                                                           <tr>
								<td class="text-left">Versement especes (Client agence)</td>
								<td class="text-left"><?php echo $data1['VersementespecesClientagence']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['VersementespecesClientagence']  ?> </td>
										</tr>
														<tr>
								<td class="text-left">Versement especes (Tiers)</td>
								<td class="text-left"><?php echo $data1['VersementespecesTiers'] ?> </td>
                                                                <td class="text-left"><?php echo $data2['VersementespecesTiers'] ?> </td>
										</tr>
														<tr>
								<td class="text-left">Versement especes deplace (Client autre agence)</td>
								<td class="text-left"><?php echo $data1['VersementespecesdeplaceClientautreagence'] ?> </td>	
                                                                <td class="text-left"><?php echo $data2['VersementespecesdeplaceClientautreagence'] ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Virement recu d un compte de la meme agence</td>
								<td class="text-left"><?php echo $data1['Virementrecuduncomptedelamemeagence'] ?> </td>	
                                                                <td class="text-left"><?php echo $data2['Virementrecuduncomptedelamemeagence'] ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Virement recu d un compte d'une autre agence de la meme banque</td>
								<td class="text-left"><?php echo $data1['Virementrecuduncompteduneautreagencedelamemebanque'] ?> </td>	
                                                                <td class="text-left"><?php echo $data2['Virementrecuduncompteduneautreagencedelamemebanque'] ?> </td>
										</tr>
														<tr>
								<td class="text-left">Virement devise recu de l etranger</td>
								<td class="text-left"><?php echo $data1['Virementdeviserecudeletranger'] ?> </td>
                                                                <td class="text-left"><?php echo $data2['Virementdeviserecudeletranger'] ?> </td>
										</tr>
														<tr>
								<td class="text-left">Rertait especes</td>
								<td class="text-left"><?php echo $data1['Rertaitespeces'] ?> </td>
                                                                <td class="text-left"><?php echo $data2['Rertaitespeces'] ?> </td>
										</tr>
														<tr>
								<td class="text-left">Retrait especes aux guichets d une autre agence</td>
								<td class="text-left"><?php echo $data1['Retraitespecesauxguichetsduneautreagence']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Retraitespecesauxguichetsduneautreagence']  ?> </td>
										</tr>
														<tr>
								<td class="text-left">Emission de cheque de banque</td>
								<td class="text-left"><?php echo $data1['Emissiondechequedebanque']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Emissiondechequedebanque']  ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Emission Cheque de banque deplace</td>
								<td class="text-left"><?php echo $data1['EmissionChequedebanquedeplace'] ?> </td>
                                                                <td class="text-left"><?php echo $data2['EmissionChequedebanquedeplace'] ?> </td>
										</tr>
														<tr>
								<td class="text-left">Annulation de cheque de banque (Client)</td>
								<td class="text-left"><?php echo $data1['AnnulationdechequedebanqueClient']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['AnnulationdechequedebanqueClient']  ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Virement de compte a compte (meme agence)</td>
								<td class="text-left"><?php echo $data1['Virementdecompteacomptememeagence'] ?> </td>	
                                                                <td class="text-left"><?php echo $data2['Virementdecompteacomptememeagence'] ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Virement ordonne en faveur client d une autre agence</td>
								<td class="text-left"><?php echo $data1['Virementordonneenfaveurclientduneautreagence'] ?> </td>
                                                                <td class="text-left"><?php echo $data2['Virementordonneenfaveurclientduneautreagence'] ?> </td>
										</tr>
                                                                                
                                                                                <tr>
								<td class="text-left">Emission de la premiere carte</td>
                                                                <td class="text-left"><?php  echo $data1['Emissiondelapremierecarte']   ?> </td>	
                                                                <td class="text-left"><?php echo $data2['Emissiondelapremierecarte']   ?> </td>
										</tr>
														<tr>
								<td class="text-left">Renouvelement</td>
                                                                <td class="text-left"><?php echo $data1['Renouvelement']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Renouvelement']  ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Reconfection</td>
								<td class="text-left"><?php echo $data1['Reconfection']  ?> </td>
                                                                <td class="text-left"><?php echo $data2['Reconfection']  ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Reedition du code secret</td>
								<td class="text-left"><?php echo $data1['Reeditionducodesecret']   ?> </td>
                                                                <td class="text-left"><?php echo $data2['Reeditionducodesecret']   ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Comission de retrait Sur DAB de la banquet</td>
								<td class="text-left"><?php echo $data1['ComissionderetraitSurDABdelabanque']   ?> </td>	
                                                                <td class="text-left"><?php echo $data2['ComissionderetraitSurDABdelabanque']   ?> </td>	
										</tr>
														<tr>
								<td class="text-left">Comission de retrait Sur DAB confrere</td>
								<td class="text-left"><?php echo $data1['ComissionderetraitSurDABconfrere']  ?> </td>	
                                                                <td class="text-left"><?php echo $data2['ComissionderetraitSurDABconfrere']  ?> </td>	
										</tr>
														<tr>
						
				
                                                        <?php } ?>
            </tbody>
            
        </table>
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
    </body>
    <script>
        window.onload = function(){
          
            $("tr").each(function(){
                var Chaqueligne = $(this);
            var colonne1 = Chaqueligne.children("td:nth-child(2)").text();
            var colonne2 = Chaqueligne.children("td:nth-child(3)").text();
            if(colonne1 < colonne2)
            {
                 Chaqueligne.children("td:nth-child(2)").css("background", "#00E676");
              Chaqueligne.children("td:nth-child(3)").css("background", "#EF5350");
                Chaqueligne.children("td:nth-child(3)").css("color", "white");
              Chaqueligne.children("td:nth-child(2)").css("color", "white");
             
            }else {
                if(colonne1 > colonne2)
                {
                   //alert(colonne2 +"et"+colonne1);
                 Chaqueligne.children("td:nth-child(2)").css("background", "#EF5350");
                Chaqueligne.children("td:nth-child(3)").css("background", "#00E676");
                 
                     Chaqueligne.children("td:nth-child(3)").css("color", "white");
              Chaqueligne.children("td:nth-child(2)").css("color", "white");
                }               
            }
           
            //console.log(colonne1);
                
            });
            /* $( "tr td" ).css( "background", "yellow" );*/
                                         //console.log('hey');
        }
                                
                             
    </script>
</html>
     