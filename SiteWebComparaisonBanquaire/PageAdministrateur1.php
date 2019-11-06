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
	<title>Page Administrateur </title>
       
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="CSS/util.css">
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
<!--===============================================================================================-->
         
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        
  
   	<script src="js/jquery-3.2.1.min.js"></script>
	
</head>
<body style="border:0;">
      
      <div id="header" > 
        <img src="img/logo3.jpg" style="width: 20% ; height: 55px ; display : inline; float: left;border-color: rgba(25, 119, 154, 1) ;
    border-bottom-style: solid;
    border-bottom-width: 1px;"/>
        <div style="  background:rgba(25, 119, 154, 1); width: 100%; height: 55px;">
            <ul id="menu_horizontal" >
             <li ><a style="height: 55px" class="horizontal"href="Home.php" >Accueil</a></li>
             <li><a style="height: 55px" class="horizontal"href="Comparatif.php">Comparatif</a></li>
            <li><a  style="height: 55px" class="horizontal"href="Contact.php">Qui sommes nous ?</a></li>
 <li><a  style="height: 55px ; float: right; font-size:20px;" class="horizontal" href="Home.php" >Deconnexion</a></li>
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
    <div style="width: 100%;height: auto;background-color: white;border: 2px solid rgba(25, 119, 154, 1);">
        <button   class="adminButtun"   name="Form"onclick="ShowForm(this)" style="margin-left: 250px;" > Modifier Banque </button> <button  name="Form1" class="adminButtun"  onclick="ShowForm(this)"  > Ajouter Banque</button>  
        <form action="php/Modificateur1.php" method="post" style="display:inline;">
            <button   type="submit" name="Supprimer" class="adminButtun" > Supprimer Banque</button> <br>
            <span class="label-input100" style="font-size: 16px;">Veuillez selectionner une banque a Supprimer ou a Modifier </span>
            <select class="sel" name="Banque1" style="display: inline-block;margin-top: 20px; margin-left:  80px; " class="contact100-form validate-form" > 
                <?php    
                $Requete1 = $BDD->query("SELECT bq_Nom FROM banque ORDER BY bq_Nom");
			 
			 		while( $data = $Requete1->fetch())
					{  
					?>
                <option value="<?php echo $data['bq_Nom']?>"  > <?php echo $data['bq_Nom']?> </option>
                          <?php } ?>
                                               </select>
                       
       
         
          <br><br><br><br>
     
           
          <div id="Form" class="wrap-contact100">
				<span class="contact100-form-title">
					Modifier La banque <?php echo $data['bq_Nom']?>
				</span>

				<!--div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Nom de la Banque *</span>
					<input class="input100" type="text" name="bq_Nom1" placeholder="Nom">
				</div!-->

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Siege social  *</span>
					<input class="input100" type="text" name="bq_Siege1" placeholder="Siege social">
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Tel</span>
					<input class="input100" type="text" name="bq_Tel1" placeholder="Telephone">
				</div>
                                <div class="wrap-input100">
					<span class="label-input100">Fax</span>
					<input class="input100" type="text" name="bq_Fax1" placeholder="Fax">
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Description</span>
					<textarea class="input100" name="bq_Description1" placeholder="Description sur la banque"></textarea>
				</div>
                                <span class="contact100-form-title">
                                                       Tarifs des prestations
                                                </span>
          
                
                <span class="label-input100">Ouverture de compte et delivrance chequier</span><input name="14" class="input100" type="text"  >
                                                                
										
														
								<span class="label-input100">Frais de tenue de compte courant</span><input class="input100" type="text" name="15"  >
                                                               
														
								<span class="label-input100">Frais de tenue de compte professionnel</span><input class="input100" type="text" name="16" >
								
										
														
								<span class="label-input100">Frais de tenue de compte cheque</span><input class="input100" type="text" name="17" >
								
										
														
								<span class="label-input100">Tenue de compte en devise</span><input class="input100" type="text"name="18"  >
								
										
														
								<span class="label-input100">Fermeture compte courant</span><input class="input100" type="text" name="19" >
								
										
														
								<span class="label-input100">Fermeture compte cheque</span><input class="input100" type="text"  name="20">
								
										
														
								
                                                                 <span class="label-input100">Emission de la premiere carte</span><input class="input100" type="text" name="21" >
                                                                
										
														
								<span class="label-input100">Renouvelement</span><input class="input100" type="text" name="22" >
                                                               
														
								<span class="label-input100">Reconfection</span><input class="input100" type="text" name="23" >
								
										
														
								<span class="label-input100">Reedition du code secret</span><input class="input100" type="text"  name="24">
								
										
														
								<span class="label-input100">Comission de retrait Sur DAB de la banquet</span><input class="input100" type="text" name="25" >
								
										
														
								<span class="label-input100">Comission de retrait Sur DAB confrere</span><input class="input100" type="text"  name="26">
								
										
														
								
										

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
                                                <button name="Modifier" type="submit" class="contact100-form-btn">
							Valider
						</button>
					</div>
				</div>
                            </div>
                <div id="Form1" class="wrap-contact100">
				<span class="contact100-form-title">
					Ajouter Une banque
                                </span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Nom de la Banque *</span>
					<input class="input100" type="text" name="bq_Nom" placeholder="Nom">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Siege social  *</span>
					<input class="input100" type="text" name="bq_Siege" placeholder="Siege social">
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Tel</span>
					<input class="input100" type="text" name="bq_Tel" placeholder="Telephone">
				</div>
                                <div class="wrap-input100">
					<span class="label-input100">Fax</span>
					<input class="input100" type="text" name="bq_Fax" placeholder="Fax">
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Description</span>
					<textarea class="input100" name="bq_Description" placeholder="Description sur la banque"></textarea>
				</div>
                                <span class="contact100-form-title">
                                                       Tarifs des prestations
                                                </span>
          
                
                <span class="label-input100">Ouverture de compte et delivrance chequier</span><input name="1" class="input100" type="text"  >
                                                                
										
														
								<span class="label-input100">Frais de tenue de compte courant</span><input class="input100" type="text" name="2"  >
                                                               
														
								<span class="label-input100">Frais de tenue de compte professionnel</span><input class="input100" type="text" name="3" >
								
										
														
								<span class="label-input100">Frais de tenue de compte cheque</span><input class="input100" type="text" name="4" >
								
										
														
								<span class="label-input100">Tenue de compte en devise</span><input class="input100" type="text"name="5"  >
								
										
														
								<span class="label-input100">Fermeture compte courant</span><input class="input100" type="text" name="6" >
								
										
														
								<span class="label-input100">Fermeture compte cheque</span><input class="input100" type="text"  name="7">
								
										
														
								
                                                                 <span class="label-input100">Emission de la premiere carte</span><input class="input100" type="text" name="8" >
                                                                
										
														
								<span class="label-input100">Renouvelement</span><input class="input100" type="text" name="9" >
                                                               
														
								<span class="label-input100">Reconfection</span><input class="input100" type="text" name="10" >
								
										
														
								<span class="label-input100">Reedition du code secret</span><input class="input100" type="text"  name="11">
								
										
														
								<span class="label-input100">Comission de retrait Sur DAB de la banquet</span><input class="input100" type="text" name="12" >
								
										
														
								<span class="label-input100">Comission de retrait Sur DAB confrere</span><input class="input100" type="text"  name="13">
								
										
														
								
										

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
                                                <button name="Ajouter" type="submit" class="contact100-form-btn">
							Valider
						</button>
					</div>
				</div>
                            </div>
			</form>
		

   
    </div>
  
    </body>
    <script>
          function ShowForm(nom)
        {
            
                   
                   
                    //var Login = document.getElementById(nom);
                   //alert(nom.name);
                if(document.getElementById(nom.name).id === "Form")
                
                {document.getElementById("Form1").style.display =  "none" ;
                    document.getElementById("Form").style.display =  "block" ;
                }
                else
                {
                    document.getElementById("Form").style.display =  "none" ;
                    document.getElementById("Form1").style.display =  "block" ;
                }
                
            
        }
                                
                             
    </script>
</html>
     