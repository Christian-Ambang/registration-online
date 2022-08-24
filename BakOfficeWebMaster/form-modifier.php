<?php session_start();include_once("parametres.php"); 
include_once("connexion_bdd.php");
include_once("class/class_webmaster.php");
include_once("champs_oblig.php");
$info = new info;
$info->ChargerForm($_GET["ref_structure-modif"]);

$dirigeant = new dirigeant;
$dirigeant->ChargerForm($_GET["ref_structure-modif"]);

$administrateur = new administrateur;
$administrateur->ChargerForm($_GET["ref_structure-modif"]);

$responsable_data = new responsable_data;
$responsable_data->ChargerForm($_GET["ref_structure-modif"]);

$option_check = new option_check;
$option_check->ChargerForm($_GET["ref_structure-modif"]);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Back Office Webmaster - Modifier</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/menu.js"></script>
</head>
<body>
	<div id="<?php if(isset($_SESSION["Erreur-Webmaster"])){echo $_SESSION["Erreur-Webmaster"];}else if (isset($_GET["Erreur-Webmaster"])){echo $_GET["Erreur-Webmaster"];}?>">
		<?php if($_SESSION["Erreur-Webmaster"]=="erreurDiv"){
					
					echo "Veuillez vérifier les champs du formulaire";
					//echo "<span class='close'>X</span>" ;
		} elseif ($_SESSION["Erreur-Webmaster"]=="erreurDivInscription"){
					echo "Vous etes déja inscrit";
		} elseif($_GET["Erreur-Webmaster"]=="modificationValide"){
			       echo "Modifications correctement enregistrées";		
		}
		?>
	</div>
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
			<span>BAKC OFFICE WEBMASTER</span>
		</h1>
	</header>
	<main class="mainForm">
		<section>
			<div class="Pastille">
				Administrateur
			</div>
		</section>
		<form id="formOfficeWebmaster" action="form-modifier.php" method="post" autocomplete enctype="multipart/form-data">
			<input type="hidden" name="pageProvenance-Webmaster" value="modifier">
			<input type="hidden" name="ref_structure-modif" value="<?php echo $_GET["ref_structure-modif"]?>">
			<section class="form">
				<input type="text" name="nomStructure" placeholder="Nom de la structure" value="<?php if (isset($_SESSION["NomStructure"])){echo $_SESSION["NomStructure"];}else{ echo $info->nom;} ?>" class="<?php if(isset($_SESSION["NomStructure"]) && ($_SESSION["NomStructure"]=="" || stopSQL($_SESSION["NomStructure"])==false)){echo "styleErreur";} ?>">
				<select name="specialite" class="<?php if(isset($_SESSION["Specialite"]) && $_SESSION["Specialite"]==""){echo "styleErreurSelect";} ?>">
					<option value="" <?php if(isset($_SESSION["Specialite"]) && $_SESSION["Specialite"]==""){echo "selected";}else if(!isset($_SESSION["Specialite"]) && $info->specialite==""){echo "selected";} ?>>Spécialité</option>
					<option value="Taekwondo" <?php if(isset($_SESSION["Specialite"]) && $_SESSION["Specialite"]=="Taekwondo"){echo "selected";}else if(!isset($_SESSION["Specialite"]) && $info->specialite=="Taekwondo"){echo "selected";} ?>>Taekwondo</option>
				</select>
				<select name="statutJuridique" class="<?php if(isset($_SESSION["StatutJuridique"]) && $_SESSION["StatutJuridique"]==""){echo "styleErreurSelect";} ?>">
					<option value="" <?php if(isset($_SESSION["StatutJuridique"]) && $_SESSION["StatutJuridique"]==""){echo "selected";}else if(!isset($_SESSION["StatutJuridique"]) && $info->statut_juridique==""){echo "selected";} ?>>Statut Juridique</option>
					<option value="Association" <?php if(isset($_SESSION["StatutJuridique"]) && $_SESSION["StatutJuridique"]=="Association"){echo "selected";}else if(!isset($_SESSION["StatutJuridique"]) && $info->statut_juridique=="Association"){echo "selected";} ?>>Association</option>
					<option value="SARL" <?php if(isset($_SESSION["StatutJuridique"]) && $_SESSION["StatutJuridique"]=="SARL"){echo "selected";}else if(!isset($_SESSION["StatutJuridique"]) && $info->statut_juridique=="SARL"){echo "selected";} ?>>SARL</option>
					<option value="SA" <?php if(isset($_SESSION["StatutJuridique"]) && $_SESSION["StatutJuridique"]=="SA"){echo "selected";}else if(!isset($_SESSION["StatutJuridique"]) && $info->statut_juridique=="SA"){echo "selected";} ?>>SA</option>
					<option value="EIRL" <?php if(isset($_SESSION["StatutJuridique"]) && $_SESSION["StatutJuridique"]=="EIRL"){echo "selected";}else if(!isset($_SESSION["StatutJuridique"]) && $info->statut_juridique=="EIRL"){echo "selected";} ?>>EIRL</option>
					<option value="EURL" <?php if(isset($_SESSION["StatutJuridique"]) && $_SESSION["StatutJuridique"]=="EURL"){echo "selected";}else if(!isset($_SESSION["StatutJuridique"]) && $info->statut_juridique=="EURL"){echo "selected";} ?>>EURL</option>
				</select>
				<input type="text" name="siret" placeholder="Siret" value="<?php if (isset($_SESSION["Siret"])){echo $_SESSION["Siret"];}else{ echo $info->siret;} ?>" class="<?php if(isset($_SESSION["Siret"]) && ($_SESSION["Siret"]=="" || chaineNumerique($_SESSION["Siret"],14,14)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				Civilité:&nbsp;&nbsp;
				<input type="radio" name="titreDirigeant" id="MonsieurDirigeant" value="Monsieur" <?php if(isset($_SESSION["TitreDirigeant"]) && $_SESSION["TitreDirigeant"]=="Monsieur"){echo "checked";}else if ($dirigeant->titre=="Monsieur"){echo "checked";}?>><label for="MonsieurDirigeant"><span></span>M</label>&nbsp;&nbsp;
				<input type="radio" name="titreDirigeant" id="MadameDirigeant" value="Madame" <?php if(isset($_SESSION["TitreDirigeant"]) && $_SESSION["TitreDirigeant"]=="Madame"){echo "checked";}else if ($dirigeant->titre=="Madame"){echo "checked";}?>><label for="MadameDirigeant"><span></span>Mme</label><br>
				<input type="text" name="prenomDirigeant" placeholder="Prenom dirigeant" value="<?php if (isset($_SESSION["PrenomDirigeant"])){echo $_SESSION["PrenomDirigeant"];}else{ echo $dirigeant->prenom;} ?>" class="<?php if(isset($_SESSION["PrenomDirigeant"]) && ($_SESSION["PrenomDirigeant"]=="" || chaineTexte($_SESSION["PrenomDirigeant"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomDirigeant" placeholder="Nom dirigeant" value="<?php if (isset($_SESSION["NomDirigeant"])){echo $_SESSION["NomDirigeant"];}else{ echo $dirigeant->nom;} ?>" class="<?php if(isset($_SESSION["NomDirigeant"]) && ($_SESSION["NomDirigeant"]=="" || chaineTexte($_SESSION["NomDirigeant"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="emailDirigeant" placeholder="Email dirigeant" value="<?php if (isset($_SESSION["EmailDirigeant"])){echo $_SESSION["EmailDirigeant"];}else{ echo $dirigeant->email;} ?>" class="<?php if(isset($_SESSION["EmailDirigeant"]) && ($_SESSION["EmailDirigeant"]=="" || chaineEmail($_SESSION["EmailDirigeant"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="telDirigeant" placeholder="Téléphone dirigeant" value="<?php if (isset($_SESSION["TelDirigeant"])){echo $_SESSION["TelDirigeant"];}else{ echo $dirigeant->telephone;} ?>" class="<?php if(isset($_SESSION["TelDirigeant"]) && ( $_SESSION["TelDirigeant"]=="" || chaineNumeriqueTelFixe($_SESSION["TelDirigeant"],10,10)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				Civilité:&nbsp;&nbsp;
				<input type="radio" name="titreAdministrateur" id="MonsieurAdministrateur" value="Monsieur" <?php if(isset($_SESSION["TitreAdministrateur"]) && $_SESSION["TitreAdministrateur"]=="Monsieur"){echo "checked";}else if ($administrateur->titre=="Monsieur"){echo "checked";}?>><label for="MonsieurAdministrateur"><span></span>M</label>&nbsp;&nbsp;
				<input type="radio" name="titreAdministrateur" id="MadameAdministrateur" value="Madame" <?php if(isset($_SESSION["TitreAdministrateur"]) && $_SESSION["TitreAdministrateur"]=="Madame"){echo "checked";}else if ($administrateur->titre=="Madame"){echo "checked";}?>><label for="MadameAdministrateur"><span></span>Mme</label><br>
				<input type="text" name="prenomAdministrateur" placeholder="Prenom administrateur" value="<?php if (isset($_SESSION["PrenomAdministrateur"])){echo $_SESSION["PrenomAdministrateur"];}else{ echo $administrateur->prenom;} ?>" class="<?php if(isset($_SESSION["PrenomAdministrateur"]) && ($_SESSION["PrenomAdministrateur"]=="" || chaineTexte($_SESSION["PrenomAdministrateur"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomAdministrateur" placeholder="Nom administrateur" value="<?php if (isset($_SESSION["NomAdministrateur"])){echo $_SESSION["NomAdministrateur"];}else{ echo $administrateur->nom;} ?>" class="<?php if(isset($_SESSION["NomAdministrateur"]) && ($_SESSION["NomAdministrateur"]=="" || chaineTexte($_SESSION["NomAdministrateur"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="emailAdministrateur" placeholder="Email administrateur" value="<?php if (isset($_SESSION["EmailAdministrateur"])){echo $_SESSION["EmailAdministrateur"];}else{ echo $administrateur->email;} ?>" class="<?php if(isset($_SESSION["EmailAdministrateur"]) && ($_SESSION["EmailAdministrateur"]=="" || chaineEmail($_SESSION["EmailAdministrateur"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="telAdministrateur" placeholder="Téléphone administrateur" value="<?php if (isset($_SESSION["TelAdministrateur"])){echo $_SESSION["TelAdministrateur"];}else{ echo $administrateur->telephone;} ?>" class="<?php if(isset($_SESSION["TelAdministrateur"]) && ( $_SESSION["TelAdministrateur"]=="" || chaineNumeriqueTelFixe($_SESSION["TelAdministrateur"],10,10)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				Civilité:&nbsp;&nbsp;
				<input type="radio" name="titreResponsableData" id="MonsieurResponsableData" value="Monsieur" <?php if(isset($_SESSION["MonsieurResponsableData"]) && $_SESSION["MonsieurResponsableData"]=="Monsieur"){echo "checked";}else if ($responsable_data->titre=="Monsieur"){echo "checked";}?>><label for="MonsieurResponsableData"><span></span>M</label>&nbsp;&nbsp;
				<input type="radio" name="titreResponsableData" id="MadameResponsableData" value="Madame" <?php if(isset($_SESSION["MonsieurResponsableData"]) && $_SESSION["MonsieurResponsableData"]=="Madame"){echo "checked";}else if ($responsable_data->titre=="Madame"){echo "checked";}?>><label for="MadameResponsableData"><span></span>Mme</label><br>
				<input type="text" name="prenomResponsableData" placeholder="Prenom responsable data" value="<?php if (isset($_SESSION["PrenomResponsableData"])){echo $_SESSION["PrenomResponsableData"];}else{ echo $responsable_data->prenom;} ?>" class="<?php if(isset($_SESSION["PrenomResponsableData"]) && ($_SESSION["PrenomResponsableData"]=="" || chaineTexte($_SESSION["PrenomResponsableData"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomResponsableData" placeholder="Nom responsable data" value="<?php if (isset($_SESSION["NomResponsableData"])){echo $_SESSION["NomResponsableData"];}else{ echo $responsable_data->nom;} ?>" class="<?php if(isset($_SESSION["NomResponsableData"]) && ($_SESSION["NomResponsableData"]=="" || chaineTexte($_SESSION["NomResponsableData"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="emailResponsableData" placeholder="Email responsable data" value="<?php if (isset($_SESSION["EmailResponsableData"])){echo $_SESSION["EmailResponsableData"];}else{ echo $responsable_data->email;} ?>" class="<?php if(isset($_SESSION["EmailResponsableData"]) && ($_SESSION["EmailResponsableData"]=="" || chaineEmail($_SESSION["EmailResponsableData"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="telResponsableData" placeholder="Téléphone responsable data" value="<?php if (isset($_SESSION["TelResponsableData"])){echo $_SESSION["TelResponsableData"];}else{ echo $responsable_data->telephone;} ?>" class="<?php if(isset($_SESSION["TelResponsableData"]) && ( $_SESSION["TelResponsableData"]=="" || chaineNumeriqueTelFixe($_SESSION["TelResponsableData"],10,10)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				<input type="text" name="uri" placeholder="URI" value="<?php if (isset($_SESSION["Uri"])){echo $_SESSION["Uri"];}else{ echo $info->uri;} ?>" class="<?php if(isset($_SESSION["Uri"]) && ($_SESSION["Uri"]=="" || stopSQL($_SESSION["Uri"],2,40)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				Option:<br>
				<p class="radio">
					<input type="checkbox" name="qrCode" id="qrCode" value="Oui" <?php if(isset($_SESSION["QrCode"]) && $_SESSION["QrCode"]=="Oui"){ echo "checked";}elseif(!isset($_SESSION["QrCode"]) && $option_check->qrcode=="Oui"){echo "checked";} ?>>
					<label for="qrCode"><span></span></label>
					<label for="qrCode"> QR code </label>
				</p>
				<p class="radio">
					<input type="checkbox" name="optionMail" id="optionMail" value="Oui" <?php if(isset($_SESSION["OptionMail"]) && $_SESSION["OptionMail"]=="Oui"){ echo "checked";}elseif(!isset($_SESSION["OptionMail"]) && $option_check->mail_groupe=="Oui"){echo "checked";} ?>>
					<label for="optionMail"><span></span></label>
					<label for="optionMail"> Mails Groupés </label>
				</p>
				<p class="radio">
					<input type="checkbox" name="messageWhatsapp" id="messageWhatsapp" value="Oui" <?php if(isset($_SESSION["MessageWhatsapp"]) && $_SESSION["MessageWhatsapp"]=="Oui"){ echo "checked";}elseif(!isset($_SESSION["MessageWhatsapp"]) && $option_check->message_whatsapp=="Oui"){echo "checked";} ?>>
					<label for="messageWhatsapp"><span></span></label>
					<label for="messageWhatsapp"> Message Whatsapp </label>
				</p>
				<p class="radio">
					<input type="checkbox" name="sms" id="sms" value="Oui" <?php if(isset($_SESSION["Sms"]) && $_SESSION["Sms"]=="Oui"){ echo "checked";}elseif(!isset($_SESSION["Sms"]) && $option_check->sms=="Oui"){echo "checked";} ?>>
					<label for="sms"><span></span></label>
					<label for="sms"> SMS </label>
				</p>
				<p class="radio">
					<input type="checkbox" name="googleCalendar" id="googleCalendar" value="Oui" <?php if(isset($_SESSION["GoogleCalendar"]) && $_SESSION["GoogleCalendar"]=="Oui"){ echo "checked";}elseif(!isset($_SESSION["GoogleCalendar"]) && $option_check->google_calendar=="Oui"){echo "checked";} ?>>
					<label for="googleCalendar"><span></span></label>
					<label for="googleCalendar"> Google Calendar </label>
				</p>
			</section>
			<section class="submit">
				<input type="submit" name="modifier" value="Modifier">
			</section>
		</form>
	</main>
</body>
</html>
