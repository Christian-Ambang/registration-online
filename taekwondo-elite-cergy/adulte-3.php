<?php  
	   session_start();
	   if($_POST["pageProvenance"]!=""){$_SESSION["pageProvenance"]=$_POST["pageProvenance"];}
	   include_once("parametres.php");
if(isset($_POST["pageProvenance"]) && $_POST["pageProvenance"]=="adulte-2" ){

$_SESSION["TelPortable"]=trim($_POST["telPortable"]);
$_SESSION["TelDomicile"]=trim($_POST["telDomicile"]);
$_SESSION["NomUrgence"]=trim($_POST["nomUrgence"]);
$_SESSION["PrenomUrgence"]=trim($_POST["prenomUrgence"]);	
$_SESSION["TelUrgence"]=trim($_POST["telUrgence"]);	
	
if(trim($_POST["telPortable"])==""|| chaineNumeriqueTelMobile(trim($_POST["telPortable"]),10,10)==false
  || ( trim($_POST["telDomicile"])!="" && chaineNumeriqueTelFixe(trim($_POST["telDomicile"]),10,10)==false)
  || trim($_POST["nomUrgence"])=="" || chaineTexte(trim($_POST["nomUrgence"]),2,40)==false ||
   trim($_POST["prenomUrgence"])=="" || chaineTexte(trim($_POST["prenomUrgence"]),2,40)==false ||
   trim($_POST["telUrgence"])=="" || chaineNumeriqueTelFixe(trim($_POST["telUrgence"]),10,10)==false
  ){
	header("Location: adulte-2.php");
	$_SESSION["Erreur"]="erreurDiv";
}else{$_SESSION["Erreur"]=""; unset($_SESSION["pageProvenance"]); }
	
}
//echo var_dump($_SESSION);
//var_dump($_SESSION["Photo"]["name"]);
//var_dump($_SESSION["compteur"]); 
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription en ligne  - Adulte - step3</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/inputFile.js"></script>
<script type="text/javascript" src="js/modalEffects.js"></script>
</head>
<body>
	<div id="<?php echo $_SESSION["Erreur"]?>">
		<?php if($_SESSION["Erreur"]=="erreurDiv"){
					
					echo "Veuillez vérifier les champs du formulaire";
					//echo "<span class='close'>X</span>" ;
		} 
		?>
	</div>
	<div class="modal-bg-flou none"></div>
	<?php include_once("modalReglement.php"); ?>
	<?php include_once("modalLicence.php"); ?>
	<header>
		<h1>
			
			<span>INSCRIPTION<br><?php echo $anneeInscription ;?></span>

		</h1>
	</header>
	<main class="mainForm">
		<section>
			<div class="Pastille">
				Adulte
			</div>
		</section>
		<form id="form" action="confirmation.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="pageProvenance" value="adulte-3">
		<section class="form">
			<p class="file">
				<input type="file" name="photo" id="photo"  value="<?php echo $_SESSION["Photo"]["name"]; ?>">
				<label for="photo" class="<?php if(isset($_SESSION["Photo"]["name"]) && ( $_SESSION["Photo"]["name"]!="" && $_SESSION["PhotoExtention"]==false)){echo "styleErreurFile";}elseif(isset($_SESSION["Photo"]) && $_SESSION["PhotoExtention"]==true){echo "correctFile";} ?>">
					<?php 
					
					    if($_SESSION["Photo"]["name"]==""){echo "Sélectioner une photo";}
						elseif( $_SESSION["Photo"]["name"]!="" && isset($_SESSION["PhotoExtention"]) && $_SESSION["PhotoExtention"]==false)
						{echo "Sélectioner une photo au bon format";} 
						elseif ( $_SESSION["Photo"]["name"]!="" && isset($_SESSION["PhotoExtention"]) && $_SESSION["PhotoExtention"]==true) 
						{echo "Fichier Correct";} 
					
					?>	
				</label>	
			</p>
			<p class="file">
				<input type="file" name="certificat" id="certificat" accept=".jpg,.jpeg,.png,.pdf" value="<?php echo $_SESSION["Certificat"]["name"]; ?>">
				<label for="certificat" class="<?php if(isset($_SESSION["Certificat"]["name"]) && ( $_SESSION["Certificat"]["name"]!="" && $_SESSION["CertificatExtention"]==false)){echo "styleErreurFile";}elseif(isset($_SESSION["Certificat"]) && $_SESSION["CertificatExtention"]==true){echo "correctFile";} ?>">
					<?php 
					
					    if($_SESSION["Certificat"]["name"]==""){echo "Sélectioner un certificat médical";}
						elseif( $_SESSION["Certificat"]["name"]!="" && isset($_SESSION["CertificatExtention"]) && $_SESSION["CertificatExtention"]==false)
						{echo "Sélectioner un certificat médical au bon format";} 
						elseif ( $_SESSION["Certificat"]["name"]!="" && isset($_SESSION["CertificatExtention"]) && $_SESSION["CertificatExtention"]==true) 
						{echo "Fichier Correct";} 
					
					?>	
				</label>	
			</p>
			<p class="radio">
				<input type="checkbox" name="droitImage" id="droitImage" value="Oui" <?php if($_SESSION["DroitImage"]=="Oui"){ echo "checked";} ?>>
				<label for="droitImage"><span></span></label>
				<label for="droitImage">En cochant cette case, je refuse que mes photos soient 
					diffusées sur les différents supports de communication 
					du club (site internet, facebook, etc)
				</label>
			</p>
			<p class="radio">
				<input type="checkbox" name="reglement" id="reglement" value="Oui" <?php if($_SESSION["Reglement"]=="Oui"){ echo "checked";} ?>>
				<label for="reglement"><span></span></label>
				<label>Je certifie avoir pris connaissance du <span class="modal reglement">règlement intérieur</span> 
					et j’accepte les conditions
				</label>
			</p>
			<p class="radio">
				<input type="checkbox" name="obtentionLIcence" id="obtentionLIcence" value="Oui" <?php if($_SESSION["ObtentionLIcence"]=="Oui"){ echo "checked";} ?>>
				<label for="obtentionLIcence"><span></span></label>
				<label>Je m’engage à réaliser les démarches nécessaires auprès
					de la FFTDA pour <span class="modal licence">obtenir ma licence</span>
				</label>
			</p>
			<p class="radio">
				<input type="checkbox" name="offrePartenaire" id="offrePartenaire" value="Oui" <?php if($_SESSION["OffrePartenaire"]=="Oui"){ echo "checked";} ?>>
				<label for="offrePartenaire"><span></span></label>
				<label for="offrePartenaire">J’accepte de recevoir les offres de nos partenaires 
					commerciaux
				</label>
			</p>
		</section>
		<section class="submit">
			<input type="submit" name="valider" value="Valider" >
		</section>
		</form>
		<section class="sectionTimeLine">
			<ol class="timeline">
    <li class="timeline__step done">
        <input class="timeline__step-radio" id="trigger1{{identifier}}" name="trigger{{identifier}}" type="radio">
        <i class="timeline__step-marker">1</i>
    </li>
    <li class="timeline__step done">
        <input class="timeline__step-radio" id="trigger2{{identifier}}" name="trigger{{identifier}}" type="radio">
        <i class="timeline__step-marker">2</i>
    </li>
    <li class="timeline__step">
        <input class="timeline__step-radio" id="trigger3{{identifier}}" name="trigger{{identifier}}" type="radio">
        <i class="timeline__step-marker">3</i>
    </li>
</ol>
		</section>
	</main>
</body>
</html>
