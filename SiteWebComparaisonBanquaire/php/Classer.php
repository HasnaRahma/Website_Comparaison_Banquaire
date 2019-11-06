<?php

 
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
//$Requete1 = '';
$classer = $_REQUEST['Classer'];
$filtrer = $_REQUEST['Filtrer'];
$strclass = $_REQUEST['StrClasser'];
$DivId = $_REQUEST['Div_Id'];
$Min = $_REQUEST['Min'];
$Max = $_REQUEST['Max'];
         $i=0;
	 $j=0;
      
			if($classer == true) 
                            {
                                //$strclass = 'Frais_de_tenue_de_compte_courant';
                                //Enlever les éspaces dans la chaine de classement
                                $strclass = str_replace(' ', '', $strclass);

                                if($DivId == 'DialC1')
                                { $Requete1 = $BDD->query("SELECT * FROM banque B join GestionCompte G on (G.bq_id = B.bq_id) ORDER BY $strclass" );}
                                if($DivId == 'DialC2')
                                { $Requete1 = $BDD->query("SELECT * FROM banque B join payement G on (G.bq = B.bq_id) ORDER BY $strclass" );}
                                if($DivId == 'DialC3')
                                { $Requete1 = $BDD->query("SELECT * FROM banque B join Monetique G on (G.bId = B.bq_id) ORDER BY $strclass" );}
                            }
                            if($filtrer == true)
                                {
                                    $strclass = str_replace(' ', '', $strclass);
                                 if($DivId == 'DialF1')
                                { $Requete1 = $BDD->query("SELECT * FROM banque B join GestionCompte G on (G.bq_id = B.bq_id) where ($strclass <= $Max and $strclass >= $Min) ORDER BY $strclass" );}
                                if($DivId == 'DialF2')
                                { $Requete1 = $BDD->query("SELECT * FROM banque B join payement G on (G.bq = B.bq_id) where ($strclass <= $Max and $strclass >= $Min) ORDER BY $strclass" );}
                                if($DivId == 'DialF3')
                                { $Requete1 = $BDD->query("SELECT * FROM banque B join Monetique G on (G.bId = B.bq_id) where ($strclass <= $Max and $strclass >= $Min) ORDER BY $strclass" );}
                                }
                             /* if($fville == true){
                                  $Requete1 = $BDD->query("SELECT DISTINCT * FROM banque B join Local G on (G.bqId = B.bq_id) where G.bq_Ville = '".$strclass."' " );
                              }*/
                                 
                            	
			
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
  