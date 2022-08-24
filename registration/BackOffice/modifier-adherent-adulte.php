<?php 
session_start();
include_once("../parametres.php");
include_once("class/connexion_bdd.php");
include_once("class/class_backoffice_structure.php");

$adulte_adherent=new adulte_adherent;
$adulte_adherent->ChargerFormEnfant($_GET["ref_structure"],$_GET["ref_adherent"]);

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
<script src="js/checkLieuEntrainement.js"></script>
<script src="js/selectNbCoursSemaine.js"></script>
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
		<?php //include_once("modalAgeLieuEntrainement.php"); ?>
		<section>
			<div class="Pastille">
				Modifier
			</div>
		</section>
		<form id="formModifierAttente" action="oblig/modifier-adulte.php" method="post" autocomplete enctype="multipart/form-data">
		<input type="hidden" name="page-provenance-back-office" value="modifier-adherent-adulte">
		<input type="hidden" name="anneeInscription" value="<?php $anneeExplode=explode("/",$anneeInscription);  echo $anneeExplode[0] ;?>">
		<input type="hidden" name="ref_structure" value="<?php echo $_GET["ref_structure"] ;?>">
		<input type="hidden" name="ref_adherent" value="<?php echo $_GET["ref_adherent"] ;?>">
		<?php include_once("../modalLieuEntrainement.php"); ?>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Info
				</div>
			</section>
			<section class="conteneur conteneur-form form">
				Sexe:&nbsp;&nbsp;
				<input type="radio" name="titreAdulte" id="Monsieur" value="Monsieur" <?php if(isset($_SESSION["TitreAdulte"]) && $_SESSION["TitreAdulte"]=="Monsieur"){echo "checked";}else if ($adulte_adherent->titre_adulte_adherent=="Monsieur"){echo "checked";}?> ><label for="Monsieur"><span></span>Garçon</label>&nbsp;&nbsp;
				<input type="radio" name="titreAdulte" id="Madame" value="Madame" <?php if(isset($_SESSION["TitreAdulte"]) && $_SESSION["TitreAdulte"]=="Madame"){echo "checked";}else if ($adulte_adherent->titre_adulte_adherent=="Madame"){echo "checked";}?>><label for="Madame"><span></span>Fille</label><br>
				<input type="text" name="prenomAdulte" placeholder="Prénom" value="<?php if(isset($_SESSION["PrenomAdulte"])){echo $_SESSION["PrenomAdulte"];}else{echo $adulte_adherent->prenom_adulte_adherent;} ?>" class="<?php if(isset($_SESSION["PrenomAdulte"]) && ($_SESSION["PrenomAdulte"]=="" || chaineTexte($_SESSION["PrenomAdulte"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomAdulte" placeholder="Nom" value="<?php if(isset($_SESSION["NomAdulte"])){echo $_SESSION["NomAdulte"];}else{echo $adulte_adherent->nom_adulte_adherent;} ?>" class="<?php if(isset($_SESSION["NomAdulte"]) && ($_SESSION["NomAdulte"]=="" || chaineTexte($_SESSION["NomAdulte"],2,40)==false)){echo "styleErreur";} ?>">
				<input data-index="1" type="text" name="naissanceAdulte" placeholder="Date de naissance (10/06/2008)" value="<?php if(isset($_SESSION["NaissanceAdulte"])){echo $_SESSION["NaissanceAdulte"];}else{echo $adulte_adherent->naissance_adulte_adherent;} ?>" class="naissanceAdulte <?php if(isset($_SESSION["NaissanceAdulte"]) && ($_SESSION["NaissanceAdulte"]=="" || chaineDate($_SESSION["NaissanceAdulte"])==false)){echo "styleErreur";} ?>">
			</section>
		</section>	
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Contact
				</div>
			</section>
			<section class="conteneur conteneur-form form">
				<input type="text" name="telPortable" placeholder="Téléphone portable" value="<?php if(isset($_SESSION["TelPortableResponsable"])){echo $_SESSION["TelPortableResponsable"];}else{echo $contact_responsable_legal_adherent->tel_portable_responsable_legal;} ?>" class="<?php if(isset($_SESSION["TelPortableResponsable"]) && ( $_SESSION["TelPortableResponsable"]=="" || chaineNumeriqueTelMobile($_SESSION["TelPortableResponsable"],10,10)==false)){echo "styleErreur";} ?>">
				<input type="text" name="telDomicile" placeholder="Téléphone domicile" value="<?php if(isset($_SESSION["TelPortableResponsable"])){echo $_SESSION["TelPortableResponsable"];}else{echo $contact_responsable_legal_adherent->tel_portable_responsable_legal;} ?>" class="<?php if(isset($_SESSION["TelPortableResponsable"]) && ( $_SESSION["TelPortableResponsable"]=="" || chaineNumeriqueTelMobile($_SESSION["TelPortableResponsable"],10,10)==false)){echo "styleErreur";} ?>">
				<input type="text" name="mail" placeholder="Mail" value="<?php if(isset($_SESSION["MailResponsable"])){echo $_SESSION["MailResponsable"];}else{echo $contact_responsable_legal_adherent->mail_responsable_legal;} ?>" class="<?php if(isset($_SESSION["MailResponsable"]) && ($_SESSION["MailResponsable"]=="" || chaineEmail($_SESSION["MailResponsable"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomUrgence" placeholder="Nom (contact d’urgence)" value="<?php if(isset($_SESSION["NomResponsable"])){echo $_SESSION["NomResponsable"];}else{echo $responsable_legal_adherent->nom_responsable_legal;} ?>" class="<?php if(isset($_SESSION["NomResponsable"]) && ($_SESSION["NomResponsable"]=="" || chaineTexte($_SESSION["NomResponsable"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="telUrgence" placeholder="Téléphone (contact d’urgence)" value="<?php if(isset($_SESSION["PrenomResponsable"])){echo $_SESSION["PrenomResponsable"];}else{echo $responsable_legal_adherent->prenom_responsable_legal;} ?>" class="<?php if(isset($_SESSION["PrenomResponsable"]) && ($_SESSION["PrenomResponsable"]=="" || chaineTexte($_SESSION["PrenomResponsable"],2,40)==false)){echo "styleErreur";} ?>">
			</section>
		</section>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Entraînement
				</div>
			</section>
			<section class="conteneur conteneur-form form">
				<select data-index="1" name="niveau" class="niveau <?php if(isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]==""){echo "styleErreurSelect";} ?>">
					<option data-index="1" value="" <?php if(isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]==""){echo "selected";}else if ($adulte_adherent->niveau_adulte_adherent==""){echo "selected";}?>>Niveau</option>
					<option class="displayNone" data-index="1" value="adultes" <?php if(isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]=="adultes"){echo "selected";}else if ($adulte_adherent->niveau_adulte_adherent=="adultes"){echo "selected";}?>>Loisir&nbsp;&nbsp;(&Agrave; partir de <?php $annee=explode("/",$anneeInscription); echo $annee[0]-15 ; ?>)</option>
					<option class="displayNone" data-index="1" value="competition_adultes" <?php if(isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]=="competition_adultes"){echo "selected";}else if ($adulte_adherent->niveau_adulte_adherent=="competition_adultes"){echo "selected";}?>>Compétition&nbsp;&nbsp;(Sélection des coachs)</option>
					<option class="displayNone" data-index="1" value="self_defense" <?php if(isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]=="self_defense"){echo "selected";}else if ($adulte_adherent->niveau_adulte_adherent=="self_defense"){echo "selected";}?>>Body Taek Fit</option>
				</select>	
				<select name="nbCoursSemaineAdulte" class="nbCoursSemaine <?php if(isset($_SESSION["NbCoursSemaineAdulte"]) && $_SESSION["NbCoursSemaineAdulte"]==""){echo "styleErreurSelect";} ?>">
					<option value="" <?php if(isset($_SESSION["NbCoursSemaineAdulte"]) && $_SESSION["NbCoursSemaineAdulte"]==""){echo "selected";}else if ($adulte_adherent->nb_cours_semaine_adulte_adherent==""){echo "selected";}?>>Nombre de cours par semaine</option>
					<option class="displayNone" value="1" <?php if(isset($_SESSION["NbCoursSemaineAdulte"]) && $_SESSION["NbCoursSemaineAdulte"]=="1"){echo "selected";}else if ($adulte_adherent->nb_cours_semaine_adulte_adherent=="1"){echo "selected";}?>>1</option>
					<option class="displayNone" value="2" <?php if(isset($_SESSION["NbCoursSemaineAdulte"]) && $_SESSION["NbCoursSemaineAdulte"]=="2"){echo "selected";}else if ($adulte_adherent->nb_cours_semaine_adulte_adherent=="2"){echo "selected";}?>>2</option>
					<option class="displayNone" value="3" <?php if(isset($_SESSION["NbCoursSemaineAdulte"]) && $_SESSION["NbCoursSemaineAdulte"]=="3"){echo "selected";}else if ($adulte_adherent->nb_cours_semaine_adulte_adherent=="3"){echo "selected";}?>>3</option>
					<option class="displayNone" value="4" <?php if(isset($_SESSION["NbCoursSemaineAdulte"]) && $_SESSION["NbCoursSemaineAdulte"]=="4"){echo "selected";}else if ($adulte_adherent->nb_cours_semaine_adulte_adherent=="4"){echo "selected";}?>>4</option>
					<option class="displayNone" value="5" <?php if(isset($_SESSION["NbCoursSemaineAdulte"]) && $_SESSION["NbCoursSemaineAdulte"]=="5"){echo "selected";}else if ($adulte_adherent->nb_cours_semaine_adulte_adherent=="5"){echo "selected";}?>>5</option>
				</select>
				
				<input type="text" name="entrainement"  readonly  placeholder="Choisissez vos créneaux horaires" value=""  class="lieuEntrainement <?php if( isset($_SESSION["entrainementChoixAdulte"]) && $_SESSION["entrainementChoixAdulte"]==false){echo "styleErreur";} ?>">
				<input type="hidden" name="entrainement_choix1" value="<?php if(isset($_SESSION["Entrainement_choix1"])){echo $_SESSION["Entrainement_choix1"];}?>" class="choix_1">	
				<input type="hidden" name="entrainement_choix2" value="<?php if(isset($_SESSION["Entrainement_choix2"])){echo $_SESSION["Entrainement_choix2"];}?>" class="choix_2">	
	
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
				<input type="file" name="photoAdulte" id="photoAdulte"  value="<?php echo $_SESSION["PhotoAdulte"]["name"]; ?>">
				<label for="photoAdulte" class="<?php if(isset($_SESSION["PhotoAdulte"]["name"]) && ( $_SESSION["PhotoAdulte"]["name"]!="" && $_SESSION["PhotoExtentionAdulte"]==false)){echo "styleErreurFile";}elseif(isset($_SESSION["PhotoAdulte"]) && $_SESSION["PhotoExtentionAdulte"]==true){echo "correctFile";} ?>">
					<?php 
					
					    if($_SESSION["PhotoAdulte"]["name"]==""){echo "Sélectioner une photo";}
						elseif( $_SESSION["PhotoAdulte"]["name"]!="" && isset($_SESSION["PhotoExtentionAdulte"]) && $_SESSION["PhotoExtentionAdulte"]==false)
						{echo "Mauvais format";} 
						elseif ( $_SESSION["PhotoAdulte"]["name"]!="" && isset($_SESSION["PhotoExtentionAdulte"]) && $_SESSION["PhotoExtentionAdulte"]==true) 
						{echo "Fichier Correct";} 
					
					?>	
				</label>	
				</p>
				<p class="file">
					<input type="file" name="certificatAdulte" id="certificatAdulte" accept=".jpg,.jpeg,.png,.pdf" value="<?php echo $_SESSION["CertificatAdulte"]["name"]; ?>">
					<label for="certificatAdulte" class="<?php if(isset($_SESSION["CertificatAdulte"]["name"]) && ( $_SESSION["CertificatAdulte"]["name"]!="" && $_SESSION["CertificatExtentionAdulte"]==false)){echo "styleErreurFile";}elseif(isset($_SESSION["CertificatAdulte"]) && $_SESSION["CertificatExtentionAdulte"]==true){echo "correctFile";} ?>">
						<?php 

							if($_SESSION["CertificatAdulte"]["name"]==""){echo "Sélectioner un certificat médical";}
							elseif( $_SESSION["CertificatAdulte"]["name"]!="" && isset($_SESSION["CertificatExtentionAdulte"]) && $_SESSION["CertificatExtentionAdulte"]==false)
							{echo "Mauvais format";} 
							elseif ( $_SESSION["CertificatAdulte"]["name"]!="" && isset($_SESSION["CertificatExtentionAdulte"]) && $_SESSION["CertificatExtentionAdulte"]==true) 
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
