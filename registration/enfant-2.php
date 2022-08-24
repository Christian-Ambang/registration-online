<?php 
session_start();
if($_POST["pageProvenance"]!=""){$_SESSION["pageProvenance"]=$_POST["pageProvenance"];}
include_once("parametres.php");
if(isset($_POST["pageProvenance"]) && $_POST["pageProvenance"]=="enfant" ){
$_SESSION["TitreResponsable"]=trim($_POST["titreResponsable"]);
$_SESSION["NomResponsable"]=trim($_POST["nomResponsable"]);
$_SESSION["PrenomResponsable"]=trim($_POST["prenomResponsable"]);
$_SESSION["NaissanceResponsable"]=trim($_POST["naissanceResponsable"]);
$_SESSION["AdresseResponsable"]=trim($_POST["adresseResponsable"]);
$_SESSION["CpResponsable"]=trim($_POST["cpResponsable"]);
$_SESSION["VilleResponsable"]=trim($_POST["villeResponsable"]);
$_SESSION["NbEnfants"]=trim($_POST["nbEnfants"]);

if (trim($_POST["titreResponsable"])=="" || trim($_POST["nomResponsable"])=="" || trim($_POST["prenomResponsable"])=="" ||
   trim($_POST["naissanceResponsable"])==""  ||trim($_POST["adresseResponsable"])=="" ||trim( $_POST["cpResponsable"])==""||
	trim($_POST["villeResponsable"])=="" || trim($_POST["nbEnfants"])=="" ||
    chaineNumeriqueCp(trim($_POST["cpResponsable"]),3,5)==false ||
	chaineTexte(trim($_POST["nomResponsable"]),2,40)==false || chaineTexte(trim($_POST["prenomResponsable"]),2,40)==false ||
	chaineTexte(trim($_POST["villeResponsable"]),5,80)==false || chaineDate(trim($_POST["naissanceResponsable"]))==false || stopSQL(trim($_POST["adresseResponsable"]))==false
	
   ){

header("Location: enfant.php");
$_SESSION["Erreur"]="erreurDiv";

	}
else{$_SESSION["Erreur"]=""; unset($_SESSION["pageProvenance"]);}
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription en ligne  - Enfant - step2</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/modalEffects.js"></script>
</head>
<body>
	<div id="<?php echo $_SESSION["Erreur"]?>">
		<?php if($_SESSION["Erreur"]=="erreurDiv"){
					
					echo "Veuillez vérifier les champs du formulaire";
					//echo "<span class='close'>X</span>" ;
		} elseif ($_SESSION["Erreur"]=="erreurDivInscription"){
					echo "Vous etes déja inscrit";
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
				Enfant(s)
			</div>
		</section>
		<form id="formEnfant" action="enfant-3.php" method="post" autocomplete enctype="multipart/form-data">
		<input type="hidden" name="pageProvenance" value="enfant-2">
		<section class="form">
			<input type="text" name="mailResponsable" placeholder="Mail (responsable légal)" value="<?php echo $_SESSION["MailResponsable"] ?>" class="<?php if(isset($_SESSION["MailResponsable"]) && ($_SESSION["MailResponsable"]=="" || chaineEmail($_SESSION["MailResponsable"])==false)){echo "styleErreur";} ?>">
			<input type="text" name="telPortableResponsable" placeholder="Téléphone portable (responsable légal)" value="<?php echo $_SESSION["TelPortableResponsable"] ?>" class="<?php if(isset($_SESSION["TelPortableResponsable"]) && ( $_SESSION["TelPortableResponsable"]=="" || chaineNumeriqueTelMobile($_SESSION["TelPortableResponsable"],10,10)==false)){echo "styleErreur";} ?>">
			<input type="text" name="telDomicileResponsable" placeholder="Téléphone domicile (responsable légal)" value="<?php echo $_SESSION["TelDomicileResponsable"] ?>" class="<?php if(isset($_SESSION["TelDomicileResponsable"]) && ( $_SESSION["TelDomicileResponsable"]!="" && chaineNumeriqueTelFixe($_SESSION["TelDomicileResponsable"],10,10)==false)){echo "styleErreur";} ?>">
			<p class="radio">
				<input type="checkbox" name="droitImageResponsable" id="droitImageResponsable" value="Oui" <?php if($_SESSION["DroitImageResponsable"]=="Oui"){ echo "checked";} ?>>
				<label for="droitImageResponsable"><span></span></label>
				<label for="droitImageResponsable">En cochant cette case, je refuse que des photos de mon 
				enfant soient diffusées sur les différents supports de 
				communication du club (site internet, facebook, etc)
				</label>
			</p>
			<p class="radio">
				<input type="checkbox" name="reglementResponsable" id="reglementResponsable" value="Oui" <?php if($_SESSION["ReglementResponsable"]=="Oui"){ echo "checked";} ?>>
				<label for="reglementResponsable"><span></span></label>
				<label>Je certifie avoir pris connaissance du <span class="modal reglement">règlement intérieur</span> 
					et j’accepte les conditions
				</label>
			</p>
			<p class="radio">
				<input type="checkbox" name="obtentionLIcenceResponsable" id="obtentionLIcenceResponsable" value="Oui" <?php if($_SESSION["ObtentionLIcenceResponsable"]=="Oui"){ echo "checked";} ?>>
				<label for="obtentionLIcenceResponsable"><span></span></label>
				<label>Je m’engage à réaliser les démarches nécessaires auprès
					de la FFTDA pour <span class="modal licence">obtenir ma licence</span>
				</label>
			</p>
			<p class="radio">
				<input type="checkbox" name="offrePartenaireResponsable" id="offrePartenaireResponsable" value="Oui" <?php if($_SESSION["OffrePartenaireResponsable"]=="Oui"){ echo "checked";} ?>>
				<label for="offrePartenaireResponsable"><span></span></label>
				<label for="offrePartenaireResponsable">J’accepte de recevoir les offres de nos partenaires 
					commerciaux
				</label>
			</p>
		</section>
		<section class="submit">
			<input type="submit" name="suivant" value="Suivant">
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
					<i class="timeline__step-marker next">3</i>
				</li>
			</ol>
		</section>
	</main>
</body>
</html>
