<?php 
session_start();
include_once("../parametres.php");
include_once("class/connexion_bdd.php");
include_once("class/class_backoffice_structure.php");

$enfant_adherent=new enfant_adherent;
$enfant_adherent->ChargerFormEnfant($_GET["ref_structure"],$_GET["ref_adherent"]);

$responsable_legal_adherent= new responsable_legal_adherent;
$responsable_legal_adherent->ChargerFormResponsable($_GET["ref_structure"],$_GET["ref_responsable"]);

$contact_responsable_legal_adherent= new contact_responsable_legal_adherent;
$contact_responsable_legal_adherent->ChargerFormResponsable($_GET["ref_structure"],$_GET["ref_responsable"]);

$equipement_adherent=new equipement_adherent;
$equipement_adherent->ChargerFormEnfant($_GET["ref_structure"],$_GET["ref_adherent"]);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Back Office Inscription Online - Modifier Adherent - <?php echo $nom_structure; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_responsive.css">
<script src="js/jquery.js"></script>
<script src="js/menu.js"></script> 
<script src="js/inputFile.js"></script> 
<script src="js/modalEffects.js"></script> 
<script src="js/AgeCheckLieuEntrainement.js"></script>
<script src="js/AgeSelectNbCoursSemaine.js"></script>
</head>
<body>
	<div class="modal-bg-flou none"></div>
	<div class="globalNav">
		<nav class="nav">
			<span class="menu"> <img src="img/btn-menu.png"> </span>
			<h1>DASHBOARD</h1>
 		</nav>
	</div>
	<div class="menuCenter">
		<div class="contenu">
			<?php include_once("menu.php");?>
		</div>
	</div>
	<header>
		<h1>
			<strong>INSCRIPTION-ONLINE</strong><br>
			<span class="Upper">BACK OFFICE <?php echo $nom_structure; ?></span>
		</h1>
	</header>
	<main>
		<?php include_once("modalAgeLieuEntrainement.php"); ?>
		<section>
			<div class="Pastille">
				Modifier
			</div>
		</section>
		<form id="formModifierAttente" action="oblig/modifier.php" method="post" autocomplete enctype="multipart/form-data">
		<input type="hidden" name="page-provenance-back-office" value="modifier-adherent">
		<input type="hidden" name="anneeInscription" value="<?php $anneeExplode=explode("/",$anneeInscription);  echo $anneeExplode[0] ;?>">
		<input type="hidden" name="ref_structure" value="<?php echo $_GET["ref_structure"] ;?>">
		<input type="hidden" name="ref_adherent" value="<?php echo $_GET["ref_adherent"] ;?>">
		<input type="hidden" name="ref_responsable" value="<?php echo $_GET["ref_responsable"] ;?>">
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Info
				</div>
			</section>
			<section class="conteneur conteneur-form form">
				Sexe:&nbsp;&nbsp;
				<input type="radio" name="titreEnfant" id="Monsieur" value="Monsieur" <?php if(isset($_SESSION["TitreEnfant"]) && $_SESSION["TitreEnfant"]=="Monsieur"){echo "checked";}else if ($enfant_adherent->titre_enfant_adherent=="Monsieur"){echo "checked";}?> ><label for="Monsieur"><span></span>Garçon</label>&nbsp;&nbsp;
				<input type="radio" name="titreEnfant" id="Madame" value="Madame" <?php if(isset($_SESSION["TitreEnfant"]) && $_SESSION["TitreEnfant"]=="Madame"){echo "checked";}else if ($enfant_adherent->titre_enfant_adherent=="Madame"){echo "checked";}?>><label for="Madame"><span></span>Fille</label><br>
				<input type="text" name="prenomEnfant" placeholder="Prénom" value="<?php if(isset($_SESSION["PrenomEnfant"])){echo $_SESSION["PrenomEnfant"];}else{echo $enfant_adherent->prenom_enfant_adherent;} ?>" class="<?php if(isset($_SESSION["PrenomEnfant"]) && ($_SESSION["PrenomEnfant"]=="" || chaineTexte($_SESSION["PrenomEnfant"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomEnfant" placeholder="Nom" value="<?php if(isset($_SESSION["NomEnfant"])){echo $_SESSION["NomEnfant"];}else{echo $enfant_adherent->nom_enfant_adherent;} ?>" class="<?php if(isset($_SESSION["NomEnfant"]) && ($_SESSION["NomEnfant"]=="" || chaineTexte($_SESSION["NomEnfant"],2,40)==false)){echo "styleErreur";} ?>">
				<input data-index="1" type="text" name="naissanceEnfant" placeholder="Date de naissance (10/06/2008)" value="<?php if(isset($_SESSION["NaissanceEnfant"])){echo $_SESSION["NaissanceEnfant"];}else{echo $enfant_adherent->naissance_enfant_adherent;} ?>" class="naissanceEnfant <?php if(isset($_SESSION["NaissanceEnfant"]) && ($_SESSION["NaissanceEnfant"]=="" || chaineDate($_SESSION["NaissanceEnfant"])==false)){echo "styleErreur";} ?>">
			</section>
		</section>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Responsable
				</div>
			</section>
			<section class="conteneur conteneur-form form">
				Civilité:&nbsp;&nbsp;
				<input type="radio" name="titreResponsable" id="MonsieurResponsable" value="Monsieur" <?php if(isset($_SESSION["TitreResponsable"]) && $_SESSION["TitreResponsable"]=="Monsieur"){echo "checked";}else if ($responsable_legal_adherent->titre_responsable_legal=="Monsieur"){echo "checked";}?>><label for="MonsieurResponsable"><span></span>M</label>&nbsp;&nbsp;
				<input type="radio" name="titreResponsable" id="MadameResponsable" value="Madame" <?php if(isset($_SESSION["TitreResponsable"]) && $_SESSION["TitreResponsable"]=="Madame"){echo "checked";}else if ($responsable_legal_adherent->titre_responsable_legal=="Madame"){echo "checked";}?>><label for="MadameResponsable"><span></span>Mme</label><br>
				<input type="text" name="nomResponsable" placeholder="Nom (responsable légal)" value="<?php if(isset($_SESSION["NomResponsable"])){echo $_SESSION["NomResponsable"];}else{echo $responsable_legal_adherent->nom_responsable_legal;} ?>" class="<?php if(isset($_SESSION["NomResponsable"]) && ($_SESSION["NomResponsable"]=="" || chaineTexte($_SESSION["NomResponsable"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="prenomResponsable" placeholder="Prénom (responsable légal)" value="<?php if(isset($_SESSION["PrenomResponsable"])){echo $_SESSION["PrenomResponsable"];}else{echo $responsable_legal_adherent->prenom_responsable_legal;} ?>" class="<?php if(isset($_SESSION["PrenomResponsable"]) && ($_SESSION["PrenomResponsable"]=="" || chaineTexte($_SESSION["PrenomResponsable"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="naissanceResponsable" placeholder="Date de naissance (10/06/1990)" value="<?php if(isset($_SESSION["NaissanceResponsable"])){echo $_SESSION["NaissanceResponsable"];}else{echo $responsable_legal_adherent->naissance_responsable_legal;} ?>" class="<?php if(isset($_SESSION["NaissanceResponsable"]) && ($_SESSION["NaissanceResponsable"]=="" || chaineDate($_SESSION["NaissanceResponsable"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="telPortableResponsable" placeholder="Téléphone portable (responsable légal)" value="<?php if(isset($_SESSION["TelPortableResponsable"])){echo $_SESSION["TelPortableResponsable"];}else{echo $contact_responsable_legal_adherent->tel_portable_responsable_legal;} ?>" class="<?php if(isset($_SESSION["TelPortableResponsable"]) && ( $_SESSION["TelPortableResponsable"]=="" || chaineNumeriqueTelMobile($_SESSION["TelPortableResponsable"],10,10)==false)){echo "styleErreur";} ?>">
				<input type="text" name="mailResponsable" placeholder="Mail (responsable légal)" value="<?php if(isset($_SESSION["MailResponsable"])){echo $_SESSION["MailResponsable"];}else{echo $contact_responsable_legal_adherent->mail_responsable_legal;} ?>" class="<?php if(isset($_SESSION["MailResponsable"]) && ($_SESSION["MailResponsable"]=="" || chaineEmail($_SESSION["MailResponsable"])==false)){echo "styleErreur";} ?>">
			</section>
		</section>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Entraînement
				</div>
			</section>
			<section class="conteneur conteneur-form form">
				<select data-index="1" name="niveauEntrainement" class="niveauEntrainement <?php if(isset($_SESSION["NiveauEntrainement"]) && $_SESSION["NiveauEntrainement"]==""){echo "styleErreurSelect";} ?>">
					<option data-index="1" value="" <?php if(isset($_SESSION["NiveauEntrainement"]) && $_SESSION["NiveauEntrainement"]==""){echo "selected";}else if ($enfant_adherent->niveau_enfant_adherent==""){echo "selected";}?>>Niveau</option>
					<option class="displayNone" data-index="1" value="ToutNiveau" <?php if(isset($_SESSION["NiveauEntrainement"]) && $_SESSION["NiveauEntrainement"]=="ToutNiveau"){echo "selected";}else if ($enfant_adherent->niveau_enfant_adherent=="ToutNiveau"){echo "selected";}?>>Tout niveau</option>
					<option class="displayNone" data-index="1" value="Competiteur" <?php if(isset($_SESSION["NiveauEntrainement"]) && $_SESSION["NiveauEntrainement"]=="Competiteur"){echo "selected";}else if ($enfant_adherent->niveau_enfant_adherent=="Competiteur"){echo "selected";}?>>Compétiteur</option>
				</select>	
				<select name="nbCoursSemaineEnfant" class="nbCoursSemaine <?php if(isset($_SESSION["NbCoursSemaineEnfant"]) && $_SESSION["NbCoursSemaineEnfant"]==""){echo "styleErreurSelect";} ?>">
					<option value="" <?php if(isset($_SESSION["NbCoursSemaineEnfant"]) && $_SESSION["NbCoursSemaineEnfant"]==""){echo "selected";}else if ($enfant_adherent->nombre_cours_semaine_efant_adherent==""){echo "selected";}?>>Nombre de cours par semaine</option>
					<option class="displayNone" value="1" <?php if(isset($_SESSION["NbCoursSemaineEnfant"]) && $_SESSION["NbCoursSemaineEnfant"]=="1"){echo "selected";}else if ($enfant_adherent->nombre_cours_semaine_efant_adherent=="1"){echo "selected";}?>>1</option>
					<option class="displayNone" value="2" <?php if(isset($_SESSION["NbCoursSemaineEnfant"]) && $_SESSION["NbCoursSemaineEnfant"]=="2"){echo "selected";}else if ($enfant_adherent->nombre_cours_semaine_efant_adherent=="2"){echo "selected";}?>>2</option>
					<option class="displayNone" value="3" <?php if(isset($_SESSION["NbCoursSemaineEnfant"]) && $_SESSION["NbCoursSemaineEnfant"]=="3"){echo "selected";}else if ($enfant_adherent->nombre_cours_semaine_efant_adherent=="3"){echo "selected";}?>>3</option>
					<option class="displayNone" value="4" <?php if(isset($_SESSION["NbCoursSemaineEnfant"]) && $_SESSION["NbCoursSemaineEnfant"]=="4"){echo "selected";}else if ($enfant_adherent->nombre_cours_semaine_efant_adherent=="4"){echo "selected";}?>>4</option>
					<option class="displayNone" value="5" <?php if(isset($_SESSION["NbCoursSemaineEnfant"]) && $_SESSION["NbCoursSemaineEnfant"]=="5"){echo "selected";}else if ($enfant_adherent->nombre_cours_semaine_efant_adherent=="5"){echo "selected";}?>>5</option>
				</select>
				
				<input type="text" name="entrainement"  readonly  placeholder="Choisissez vos créneaux horaires" value=""  class="lieuEntrainement <?php if( isset($_SESSION["entrainementChoixEnfant"]) && $_SESSION["entrainementChoixEnfant"]==false){echo "styleErreur";} ?>">
				<input type="hidden" name="entrainement_choix1_enfant" value="<?php if(isset($_SESSION["Entrainement_choix1_enfant"])){echo $_SESSION["Entrainement_choix1_enfant"];}?>" class="choix_1">	
				<input type="hidden" name="entrainement_choix2_enfant" value="<?php if(isset($_SESSION["Entrainement_choix2_enfant"])){echo $_SESSION["Entrainement_choix2_enfant"];}?>" class="choix_2">	
	
			</section>
		</section>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Pièces jointe
				</div>
			</section>
			<section class="conteneur conteneur-form form">
				<p class="file">
				<input type="file" name="photoEnfant" id="photoEnfant"  value="<?php echo $_SESSION["PhotoEnfant"]["name"]; ?>">
				<label for="photoEnfant" class="<?php if(isset($_SESSION["PhotoEnfant"]["name"]) && ( $_SESSION["PhotoEnfant"]["name"]!="" && $_SESSION["PhotoExtentionEnfant"]==false)){echo "styleErreurFile";}elseif(isset($_SESSION["PhotoEnfant"]) && $_SESSION["PhotoExtentionEnfant"]==true){echo "correctFile";} ?>">
					<?php 
					
					    if($_SESSION["PhotoEnfant"]["name"]==""){echo "Sélectioner une photo";}
						elseif( $_SESSION["PhotoEnfant"]["name"]!="" && isset($_SESSION["PhotoExtentionEnfant"]) && $_SESSION["PhotoExtentionEnfant"]==false)
						{echo "Mauvais format";} 
						elseif ( $_SESSION["PhotoEnfant"]["name"]!="" && isset($_SESSION["PhotoExtentionEnfant"]) && $_SESSION["PhotoExtentionEnfant"]==true) 
						{echo "Fichier Correct";} 
					
					?>	
				</label>	
				</p>
				<p class="file">
					<input type="file" name="certificatEnfant" id="certificatEnfant" accept=".jpg,.jpeg,.png,.pdf" value="<?php echo $_SESSION["CertificatEnfant"]["name"]; ?>">
					<label for="certificatEnfant" class="<?php if(isset($_SESSION["CertificatEnfant"]["name"]) && ( $_SESSION["CertificatEnfant"]["name"]!="" && $_SESSION["CertificatExtentionEnfant"]==false)){echo "styleErreurFile";}elseif(isset($_SESSION["CertificatEnfant"]) && $_SESSION["CertificatExtentionEnfant"]==true){echo "correctFile";} ?>">
						<?php 

							if($_SESSION["CertificatEnfant"]["name"]==""){echo "Sélectioner un certificat médical";}
							elseif( $_SESSION["CertificatEnfant"]["name"]!="" && isset($_SESSION["CertificatExtentionEnfant"]) && $_SESSION["CertificatExtentionEnfant"]==false)
							{echo "Mauvais format";} 
							elseif ( $_SESSION["CertificatEnfant"]["name"]!="" && isset($_SESSION["CertificatExtentionEnfant"]) && $_SESSION["CertificatExtentionEnfant"]==true) 
							{echo "Fichier Correct";} 

						?>	
					</label>	
				</p>
			</section>
		</section>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Équipement
				</div>
			</section>
			<section class="conteneur conteneur-form form">
				<select name="equipementDobok" class="<?php if(isset($_SESSION["EquipementDobok"]) && $_SESSION["EquipementDobok"]==""){echo "styleErreurSelect";} ?>">
				    <option value="" <?php if(isset($_SESSION["EquipementDobok"]) && $_SESSION["EquipementDobok"]==""){echo "selected";}else if (empty($equipement_adherent->dobok)){echo "selected";}?>>Aucun dobok</option>
					<?php
					foreach($tarifDobok as $key=>$value){
						foreach($value as $key2=>$value2){ 
							foreach($value2 as $key3=>$value3){ 
								if(is_array($value3)){
								   foreach($value3 as $key4=>$value4){ ?>
									   <option value="<?php echo $value4.":".$value[2]["EquipementName"].":".$value[1]["Marque"].":".$value[0]["prix"]; ?>" <?php if(isset($_SESSION["EquipementDobok"]) && $_SESSION["EquipementDobok"]==""){echo "selected";}else if ($equipement_adherent->dobok==$value4){echo "selected";}?> ><?php echo $value4." : ".$value[0]["prix"]."€"?></option>
								  <?php }
							   } 
							}
						}
					}
					
				  ?>
				</select>		
			</section>
		</section>
		<section class="action">
				<div class="inline-block colRight">
					<input type="submit" name="modifier" value="Modifier">
				</div>
				<div class="colClear"></div>
		</section>
		</form>
	</main>
</body>
</html>
