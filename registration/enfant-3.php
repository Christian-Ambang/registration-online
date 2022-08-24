<?php 
session_start();
if($_POST["pageProvenance"]!=""){$_SESSION["pageProvenance"]=$_POST["pageProvenance"];}
include_once("parametres.php");
if(isset($_POST["pageProvenance"]) && $_POST["pageProvenance"]=="enfant-2"){
	
$_SESSION["MailResponsable"]=trim($_POST["mailResponsable"]);
$_SESSION["TelPortableResponsable"]=trim($_POST["telPortableResponsable"]);
$_SESSION["TelDomicileResponsable"]=trim($_POST["telDomicileResponsable"]);
if(isset($_POST["droitImageResponsable"])){$_SESSION["DroitImageResponsable"]=trim($_POST["droitImageResponsable"]);}else{$_SESSION["DroitImageResponsable"]="Non";}
if(isset($_POST["reglementResponsable"])){$_SESSION["ReglementResponsable"]=trim($_POST["reglementResponsable"]);}else{$_SESSION["ReglementResponsable"]="Non";}
if(isset($_POST["obtentionLIcenceResponsable"])){$_SESSION["ObtentionLIcenceResponsable"]=trim($_POST["obtentionLIcenceResponsable"]);}else{$_SESSION["ObtentionLIcenceResponsable"]="Non";}
if(isset($_POST["offrePartenaireResponsable"])){$_SESSION["OffrePartenaireResponsable"]=trim($_POST["offrePartenaireResponsable"]);}else{$_SESSION["OffrePartenaireResponsable"]="Non";}

if (
	trim($_POST["mailResponsable"])=="" || trim($_POST["telPortableResponsable"])=="" || $_POST["reglementResponsable"]=="" || $_POST["obtentionLIcenceResponsable"]=="" || chaineEmail($_POST["mailResponsable"])==false
   	|| chaineNumeriqueTelMobile(trim($_POST["telPortableResponsable"]),10,10)==false || (trim($_POST["telDomicileResponsable"])!="" && chaineNumeriqueTelFixe(trim($_POST["telDomicileResponsable"]),10,10)==false)
	){

header("Location: enfant-2.php");
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
<title>Inscription en ligne  - Enfant - step3</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/AgeSelectNbCoursSemaine.js"></script>
<script type="text/javascript" src="js/inputFile.js"></script>
<script type="text/javascript" src="js/selectEquipement.js"></script>
<script type="text/javascript" src="js/modalEffects.js"></script>
<script type="text/javascript" src="js/AgeCheckLieuEntrainement.js"></script>	
	

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
	<header>
		<h1>
			
			<span>INSCRIPTION<br><?php echo $anneeInscription ;?></span>
		</h1>
	</header>
	<main class="mainForm">
		<!--Début dupli-->
		<form id="formEnfant" action="confirmation-enfant.php" method="post" autocomplete enctype="multipart/form-data">
		<input type="hidden" name="pageProvenance" value="enfant-3">
		<input type="hidden" name="anneeInscription" value="<?php $anneeExplode=explode("/",$anneeInscription);  echo $anneeExplode[0] ;?>">
		<input type="hidden" name="nombreEnfant" value="<?php echo $_SESSION["NbEnfants"] ?>">
		<?php for($i=1;$i<=$_SESSION["NbEnfants"];$i++) { ?>
		<section>
			<div class="Pastille">
				Enfant (<?php echo $i ?>)
			</div>
		</section>
		<section class="form">
				<?php include_once("modalChoixEquipement.php"); ?>
				<?php include_once("modalAgeLieuEntrainement.php"); ?>
				<?php //include_once("modalErreur.php"); ?>
				Sexe:&nbsp;&nbsp;
				<input type="radio" name="titreEnfant<?php echo $i ?>" id="Monsieur<?php echo $i ?>" value="Monsieur" <?php if($_SESSION["TitreEnfant".$i]=="Monsieur"){echo "checked";}?>><label for="Monsieur<?php echo $i ?>"><span></span>Garçon</label>&nbsp;&nbsp;
				<input type="radio" name="titreEnfant<?php echo $i ?>" id="Madame<?php echo $i ?>" value="Madame" <?php if($_SESSION["TitreEnfant".$i]=="Madame"){echo "checked";}?>><label for="Madame<?php echo $i ?>"><span></span>Fille</label><br>
				<input type="text" name="nomEnfant<?php echo $i ?>" placeholder="Nom" value="<?php echo $_SESSION["NomEnfant".$i] ?>" class="<?php if(isset($_SESSION["NomEnfant".$i]) && ($_SESSION["NomEnfant".$i]=="" || chaineTexte($_SESSION["NomEnfant".$i],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="prenomEnfant<?php echo $i ?>" placeholder="Prénom" value="<?php echo $_SESSION["PrenomEnfant".$i] ?>" class="<?php if(isset($_SESSION["PrenomEnfant".$i]) && ($_SESSION["PrenomEnfant".$i]=="" || chaineTexte($_SESSION["PrenomEnfant".$i],2,40)==false)){echo "styleErreur";} ?>">
				<input data-index="<?php echo $i ?>" type="text" name="naissanceEnfant<?php echo $i ?>" placeholder="Date de naissance (10/06/2008)" value="<?php echo $_SESSION["NaissanceEnfant".$i] ?>" class="naissanceEnfant <?php if(isset($_SESSION["NaissanceEnfant".$i]) && ($_SESSION["NaissanceEnfant".$i]=="" || chaineDate($_SESSION["NaissanceEnfant".$i])==false)){echo "styleErreur";} ?>">
				<select data-index="<?php echo $i ?>" name="niveauEntrainement<?php echo $i ?>" class="niveauEntrainement <?php if(isset($_SESSION["NiveauEntrainement".$i]) && $_SESSION["NiveauEntrainement".$i]==""){echo "styleErreurSelect";} ?>">
					<option data-index="<?php echo $i ?>" value="" <?php if($_SESSION["NiveauEntrainement".$i]==""){echo "selected";} ?>>Niveau</option>
					<option class="displayNone" data-index="<?php echo $i ?>" value="ToutNiveau" <?php if($_SESSION["NiveauEntrainement".$i]=="ToutNiveau"){echo "selected";} ?>>Tout niveau</option>
					<option class="displayNone" data-index="<?php echo $i ?>" value="Competiteur" <?php if($_SESSION["NiveauEntrainement".$i]=="Competiteur"){echo "selected";} ?>>Compétiteur</option>
				</select>	
				<select name="nbCoursSemaineEnfant<?php echo $i ?>" class="nbCoursSemaine <?php if(isset($_SESSION["NbCoursSemaineEnfant".$i]) && $_SESSION["NbCoursSemaineEnfant".$i]==""){echo "styleErreurSelect";} ?>">
					<option value="" <?php if($_SESSION["NbCoursSemaineEnfant".$i]==""){echo "selected";} ?>>Nombre de cours par semaine</option>
					<option class="displayNone" value="1" <?php if($_SESSION["NbCoursSemaineEnfant".$i]=="1"){echo "selected";} ?>>1</option>
					<option class="displayNone" value="2" <?php if($_SESSION["NbCoursSemaineEnfant".$i]=="2"){echo "selected";} ?>>2</option>
					<option class="displayNone" value="3" <?php if($_SESSION["NbCoursSemaineEnfant".$i]=="3"){echo "selected";} ?>>3</option>
					<option class="displayNone" value="4" <?php if($_SESSION["NbCoursSemaineEnfant".$i]=="4"){echo "selected";} ?>>4</option>
					<option class="displayNone" value="5" <?php if($_SESSION["NbCoursSemaineEnfant".$i]=="5"){echo "selected";} ?>>5</option>
				</select>
				
				<input type="text" name="entrainement<?php echo $i ?>"  readonly  placeholder="Choisissez vos créneaux horaires" value=""  class="lieuEntrainement <?php if( isset($_SESSION["entrainementChoixEnfant".$i]) && $_SESSION["entrainementChoixEnfant".$i]==false){echo "styleErreur";} ?>">
				<input type="hidden" name="entrainement_choix1_enfant<?php echo $i ?>" value="<?php if(isset($_SESSION["Entrainement_choix1_enfant".$i])){echo $_SESSION["Entrainement_choix1_enfant".$i];}?>" class="choix_1">	
				<input type="hidden" name="entrainement_choix2_enfant<?php echo $i ?>" value="<?php if(isset($_SESSION["Entrainement_choix2_enfant".$i])){echo $_SESSION["Entrainement_choix2_enfant".$i];}?>" class="choix_2">	
			
				<input type="text" name="choixEquipement<?php echo $i ?>" readonly placeholder="Choisissez votre équipement" value="" class="choixEquipement">
				<input type="hidden" name="choixEquipementTotal<?php echo $i ?>"  value="<?php if(isset($_SESSION["ChoixEquipementTotal".$i]) && $_SESSION["ChoixEquipementTotal".$i]!=""){echo "True";}?>" class="choixEquipementTotal">
				<input type="hidden" name="choix_Equipement_Dobok_enfant<?php echo $i ?>" value="<?php if(isset($_SESSION["Choix_Equipement_Dobok_enfant".$i])){echo $_SESSION["Choix_Equipement_Dobok_enfant".$i];}?>" class="choixDobok">
			
				<p class="file">
				<input type="file" name="photoEnfant<?php echo $i ?>" id="photoEnfant<?php echo $i ?>"  value="<?php echo $_SESSION["PhotoEnfant".$i]["name"]; ?>">
				<label for="photoEnfant<?php echo $i ?>" class="<?php if(isset($_SESSION["PhotoEnfant".$i]["name"]) && ( $_SESSION["PhotoEnfant".$i]["name"]!="" && $_SESSION["PhotoExtentionEnfant".$i]==false)){echo "styleErreurFile";}elseif(isset($_SESSION["PhotoEnfant".$i]) && $_SESSION["PhotoExtentionEnfant".$i]==true){echo "correctFile";} ?>">
					<?php 
					
					    if($_SESSION["PhotoEnfant".$i]["name"]==""){echo "Sélectioner une photo";}
						elseif( $_SESSION["PhotoEnfant".$i]["name"]!="" && isset($_SESSION["PhotoExtentionEnfant".$i]) && $_SESSION["PhotoExtentionEnfant".$i]==false)
						{echo "Sélectioner une photo au bon format";} 
						elseif ( $_SESSION["PhotoEnfant".$i]["name"]!="" && isset($_SESSION["PhotoExtentionEnfant".$i]) && $_SESSION["PhotoExtentionEnfant".$i]==true) 
						{echo "Fichier Correct";} 
					
					?>	
				</label>	
				</p>
				<p class="file">
					<input type="file" name="certificatEnfant<?php echo $i ?>" id="certificatEnfant<?php echo $i ?>" accept=".jpg,.jpeg,.png,.pdf" value="<?php echo $_SESSION["CertificatEnfant".$i]["name"]; ?>">
					<label for="certificatEnfant<?php echo $i ?>" class="<?php if(isset($_SESSION["CertificatEnfant".$i]["name"]) && ( $_SESSION["CertificatEnfant".$i]["name"]!="" && $_SESSION["CertificatExtentionEnfant".$i]==false)){echo "styleErreurFile";}elseif(isset($_SESSION["CertificatEnfant".$i]) && $_SESSION["CertificatExtentionEnfant".$i]==true){echo "correctFile";} ?>">
						<?php 

							if($_SESSION["CertificatEnfant".$i]["name"]==""){echo "Sélectioner un certificat médical";}
							elseif( $_SESSION["CertificatEnfant".$i]["name"]!="" && isset($_SESSION["CertificatExtentionEnfant".$i]) && $_SESSION["CertificatExtentionEnfant".$i]==false)
							{echo "Sélectioner un certificat médical au bon format";} 
							elseif ( $_SESSION["CertificatEnfant".$i]["name"]!="" && isset($_SESSION["CertificatExtentionEnfant".$i]) && $_SESSION["CertificatExtentionEnfant".$i]==true) 
							{echo "Fichier Correct";} 

						?>	
					</label>	
				</p>		
		</section>
		<!--Fin dupli-->
		<? } ?>
		<section class="submit">
			<input type="submit" name="Valider" value="Valider">
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
