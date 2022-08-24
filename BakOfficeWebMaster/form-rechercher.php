<?php session_start();include_once("parametres.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Back Office Webmaster - Recherche</title>
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
		<form id="formOfficeWebmaster" action="recherche-resultat.php" method="post" autocomplete enctype="multipart/form-data">
			<input type="hidden" name="pageProvenance-Webmaster" value="creer">
			<section class="form">
				<input type="text" name="ref_structure" placeholder="Référence structure" value="" class="">
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
				<select name="etat" class="<?php if(isset($_SESSION["Etat"]) && $_SESSION["Etat"]==""){echo "styleErreurSelect";} ?>">
					<option value="" <?php if($_SESSION["Specialite"]==""){echo "selected";} ?>>État</option>
					<option value="actif" <?php if($_SESSION["Specialite"]=="Taekwondo"){echo "selected";} ?>>Actif</option>
					<option value="passif" <?php if($_SESSION["Specialite"]=="Taekwondo"){echo "selected";} ?>>Passif</option>
				</select>
				<br>
				<br>
				<input type="text" name="nom" placeholder="Nom" value="">
				<input type="text" name="prenom" placeholder="Prenom" value="">
				
				<!--<input type="text" name="prenomDirigeant" placeholder="Prenom dirigeant" value="<?php echo $_SESSION["PrenomDirigeant"] ?>" class="<?php //if(isset($_SESSION["PrenomDirigeant"]) && ($_SESSION["PrenomDirigeant"]=="" || chaineTexte($_SESSION["PrenomDirigeant"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomDirigeant" placeholder="Nom dirigeant" value="<?php echo $_SESSION["NomDirigeant"] ?>" class="<?php //if(isset($_SESSION["NomDirigeant"]) && ($_SESSION["NomDirigeant"]=="" || chaineTexte($_SESSION["NomDirigeant"],2,40)==false)){echo "styleErreur";} ?>">
				-->
				<br>
				<br>
				<input type="text" name="prenomAdministrateur" placeholder="Prenom administrateur" value="<?php echo $_SESSION["PrenomAdministrateur"] ?>" class="<?php if(isset($_SESSION["PrenomAdministrateur"]) && ($_SESSION["PrenomAdministrateur"]=="" || chaineTexte($_SESSION["PrenomAdministrateur"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomAdministrateur" placeholder="Nom administrateur" value="<?php echo $_SESSION["NomAdministrateur"] ?>" class="<?php if(isset($_SESSION["NomAdministrateur"]) && ($_SESSION["NomAdministrateur"]=="" || chaineTexte($_SESSION["NomAdministrateur"],2,40)==false)){echo "styleErreur";} ?>">
				<br>
				<br>
				<input type="text" name="prenomResponsableData" placeholder="Prenom responsable data" value="<?php echo $_SESSION["PrenomResponsableData"] ?>" class="<?php if(isset($_SESSION["PrenomResponsableData"]) && ($_SESSION["PrenomResponsableData"]=="" || chaineTexte($_SESSION["PrenomResponsableData"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomResponsableData" placeholder="Nom responsable data" value="<?php echo $_SESSION["NomResponsableData"] ?>" class="<?php if(isset($_SESSION["NomResponsableData"]) && ($_SESSION["NomResponsableData"]=="" || chaineTexte($_SESSION["NomResponsableData"],2,40)==false)){echo "styleErreur";} ?>">
			
			</section>
			<section class="submit">
				<input type="submit" name="rechercher" value="Rechercher">
			</section>
		</form>
	</main>
</body>
</html>
