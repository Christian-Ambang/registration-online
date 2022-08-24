<?php session_start();include_once("parametres.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Back Office Webmaster - Créer</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/menu.js"></script>
</head>
<body>
	<div id="<?php echo $_SESSION["Erreur-Webmaster"]?>">
		<?php if($_SESSION["Erreur-Webmaster"]=="erreurDiv"){
					
					echo "Veuillez vérifier les champs du formulaire";
					//echo "<span class='close'>X</span>" ;
		} elseif ($_SESSION["Erreur-Webmaster"]=="erreurDivInscription"){
					echo "Vous etes déja inscrit";
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
		<form id="formOfficeWebmaster" action="creer-confirmation.php" method="post" autocomplete enctype="multipart/form-data">
			<input type="hidden" name="pageProvenance-Webmaster" value="creer">
			<section class="form">
				<input type="text" name="nomStructure" placeholder="Nom de la structure" value="<?php echo $_SESSION["NomStructure"] ?>" class="<?php if(isset($_SESSION["NomStructure"]) && ($_SESSION["NomStructure"]=="" || stopSQL($_SESSION["NomStructure"])==false)){echo "styleErreur";} ?>">
				<select name="specialite" class="<?php if(isset($_SESSION["Specialite"]) && $_SESSION["Specialite"]==""){echo "styleErreurSelect";} ?>">
					<option value="" <?php if($_SESSION["Specialite"]==""){echo "selected";} ?>>Spécialité</option>
					<option value="Taekwondo" <?php if($_SESSION["Specialite"]=="Taekwondo"){echo "selected";} ?>>Taekwondo</option>
				</select>
				<select name="statutJuridique" class="<?php if(isset($_SESSION["StatutJuridique"]) && $_SESSION["StatutJuridique"]==""){echo "styleErreurSelect";} ?>">
					<option value="" <?php if($_SESSION["StatutJuridique"]==""){echo "selected";} ?>>Statut Juridique</option>
					<option value="Association" <?php if($_SESSION["StatutJuridique"]=="Association"){echo "selected";} ?>>Association</option>
					<option value="SARL" <?php if($_SESSION["StatutJuridique"]=="SARL"){echo "selected";} ?>>SARL</option>
					<option value="SA" <?php if($_SESSION["StatutJuridique"]=="SA"){echo "selected";} ?>>SA</option>
					<option value="EIRL" <?php if($_SESSION["StatutJuridique"]=="EIRL"){echo "selected";} ?>>EIRL</option>
					<option value="EURL" <?php if($_SESSION["StatutJuridique"]=="EURL"){echo "selected";} ?>>EURL</option>
				</select>
				<input type="text" name="siret" placeholder="Siret" value="<?php echo $_SESSION["Siret"] ?>" class="<?php if(isset($_SESSION["Siret"]) && ($_SESSION["Siret"]=="" || chaineNumerique($_SESSION["Siret"],14,14)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				Civilité:&nbsp;&nbsp;
				<input type="radio" name="titreDirigeant" id="MonsieurDirigeant" value="Monsieur" <?php if($_SESSION["TitreDirigeant"]=="Monsieur"){echo "checked";}?>><label for="MonsieurDirigeant"><span></span>M</label>&nbsp;&nbsp;
				<input type="radio" name="titreDirigeant" id="MadameDirigeant" value="Madame" <?php if($_SESSION["TitreDirigeant"]=="Madame"){echo "checked";}?>><label for="MadameDirigeant"><span></span>Mme</label><br>
				<input type="text" name="prenomDirigeant" placeholder="Prenom dirigeant" value="<?php echo $_SESSION["PrenomDirigeant"] ?>" class="<?php if(isset($_SESSION["PrenomDirigeant"]) && ($_SESSION["PrenomDirigeant"]=="" || chaineTexte($_SESSION["PrenomDirigeant"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomDirigeant" placeholder="Nom dirigeant" value="<?php echo $_SESSION["NomDirigeant"] ?>" class="<?php if(isset($_SESSION["NomDirigeant"]) && ($_SESSION["NomDirigeant"]=="" || chaineTexte($_SESSION["NomDirigeant"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="emailDirigeant" placeholder="Email dirigeant" value="<?php echo $_SESSION["EmailDirigeant"] ?>" class="<?php if(isset($_SESSION["EmailDirigeant"]) && ($_SESSION["EmailDirigeant"]=="" || chaineEmail($_SESSION["EmailDirigeant"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="telDirigeant" placeholder="Téléphone dirigeant" value="<?php echo $_SESSION["TelDirigeant"] ?>" class="<?php if(isset($_SESSION["TelDirigeant"]) && ( $_SESSION["TelDirigeant"]=="" || chaineNumeriqueTelFixe($_SESSION["TelDirigeant"],10,10)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				Civilité:&nbsp;&nbsp;
				<input type="radio" name="titreAdministrateur" id="MonsieurAdministrateur" value="Monsieur" <?php if($_SESSION["TitreAdministrateur"]=="Monsieur"){echo "checked";}?>><label for="MonsieurAdministrateur"><span></span>M</label>&nbsp;&nbsp;
				<input type="radio" name="titreAdministrateur" id="MadameAdministrateur" value="Madame" <?php if($_SESSION["TitreAdministrateur"]=="Madame"){echo "checked";}?>><label for="MadameAdministrateur"><span></span>Mme</label><br>
				<input type="text" name="prenomAdministrateur" placeholder="Prenom administrateur" value="<?php echo $_SESSION["PrenomAdministrateur"] ?>" class="<?php if(isset($_SESSION["PrenomAdministrateur"]) && ($_SESSION["PrenomAdministrateur"]=="" || chaineTexte($_SESSION["PrenomAdministrateur"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomAdministrateur" placeholder="Nom administrateur" value="<?php echo $_SESSION["NomAdministrateur"] ?>" class="<?php if(isset($_SESSION["NomAdministrateur"]) && ($_SESSION["NomAdministrateur"]=="" || chaineTexte($_SESSION["NomAdministrateur"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="emailAdministrateur" placeholder="Email administrateur" value="<?php echo $_SESSION["EmailAdministrateur"] ?>" class="<?php if(isset($_SESSION["EmailAdministrateur"]) && ($_SESSION["EmailAdministrateur"]=="" || chaineEmail($_SESSION["EmailAdministrateur"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="telAdministrateur" placeholder="Téléphone administrateur" value="<?php echo $_SESSION["TelAdministrateur"] ?>" class="<?php if(isset($_SESSION["TelAdministrateur"]) && ( $_SESSION["TelAdministrateur"]=="" || chaineNumeriqueTelFixe($_SESSION["TelAdministrateur"],10,10)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				Civilité:&nbsp;&nbsp;
				<input type="radio" name="titreResponsableData" id="MonsieurResponsableData" value="Monsieur" <?php if($_SESSION["TitreResponsableData"]=="Monsieur"){echo "checked";}?>><label for="MonsieurResponsableData"><span></span>M</label>&nbsp;&nbsp;
				<input type="radio" name="titreResponsableData" id="MadameResponsableData" value="Madame" <?php if($_SESSION["TitreResponsableData"]=="Madame"){echo "checked";}?>><label for="MadameResponsableData"><span></span>Mme</label><br>
				<input type="text" name="prenomResponsableData" placeholder="Prenom responsable data" value="<?php echo $_SESSION["PrenomResponsableData"] ?>" class="<?php if(isset($_SESSION["PrenomResponsableData"]) && ($_SESSION["PrenomResponsableData"]=="" || chaineTexte($_SESSION["PrenomResponsableData"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomResponsableData" placeholder="Nom responsable data" value="<?php echo $_SESSION["NomResponsableData"] ?>" class="<?php if(isset($_SESSION["NomResponsableData"]) && ($_SESSION["NomResponsableData"]=="" || chaineTexte($_SESSION["NomResponsableData"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="emailResponsableData" placeholder="Email responsable data" value="<?php echo $_SESSION["EmailResponsableData"] ?>" class="<?php if(isset($_SESSION["EmailResponsableData"]) && ($_SESSION["EmailResponsableData"]=="" || chaineEmail($_SESSION["EmailResponsableData"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="telResponsableData" placeholder="Téléphone responsable data" value="<?php echo $_SESSION["TelResponsableData"] ?>" class="<?php if(isset($_SESSION["TelResponsableData"]) && ( $_SESSION["TelResponsableData"]=="" || chaineNumeriqueTelFixe($_SESSION["TelResponsableData"],10,10)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				<input type="text" name="uri" placeholder="URI" value="<?php echo $_SESSION["Uri"] ?>" class="<?php if(isset($_SESSION["Uri"]) && ($_SESSION["Uri"]=="" || stopSQL($_SESSION["Uri"],2,40)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				Option:<br>
				<p class="radio">
					<input type="checkbox" name="qrCode" id="qrCode" value="Oui" <?php if($_SESSION["QrCode"]=="Oui"){ echo "checked";} ?>>
					<label for="qrCode"><span></span></label>
					<label for="qrCode"> QR code </label>
				</p>
				<p class="radio">
					<input type="checkbox" name="optionMail" id="optionMail" value="Oui" <?php if($_SESSION["OptionMail"]=="Oui"){ echo "checked";} ?>>
					<label for="optionMail"><span></span></label>
					<label for="optionMail"> Mails Groupés </label>
				</p>
				<p class="radio">
					<input type="checkbox" name="messageWhatsapp" id="messageWhatsapp" value="Oui" <?php if($_SESSION["MessageWhatsapp"]=="Oui"){ echo "checked";} ?>>
					<label for="messageWhatsapp"><span></span></label>
					<label for="messageWhatsapp"> Message Whatsapp </label>
				</p>
				<p class="radio">
					<input type="checkbox" name="sms" id="sms" value="Oui" <?php if($_SESSION["Sms"]=="Oui"){ echo "checked";} ?>>
					<label for="sms"><span></span></label>
					<label for="sms"> SMS </label>
				</p>
				<p class="radio">
					<input type="checkbox" name="googleCalendar" id="googleCalendar" value="Oui" <?php if($_SESSION["GoogleCalendar"]=="Oui"){ echo "checked";} ?>>
					<label for="googleCalendar"><span></span></label>
					<label for="googleCalendar"> Google Calendar </label>
				</p>
			</section>
			<section class="submit">
				<input type="submit" name="creer" value="Créer">
			</section>
		</form>
	</main>
</body>
</html>
