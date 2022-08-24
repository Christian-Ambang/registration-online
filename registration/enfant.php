<?php 
	   session_start(); 
	   include_once("parametres.php");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription en ligne  - Enfant</title>
<link rel="stylesheet" href="css/style.css">
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
		<form id="formEnfant" action="enfant-2.php" method="post" autocomplete enctype="multipart/form-data">
		<input type="hidden" name="pageProvenance" value="enfant">
		<section class="form">
			
				Civilité:&nbsp;&nbsp;
				<input type="radio" name="titreResponsable" id="Monsieur" value="Monsieur" <?php if($_SESSION["TitreResponsable"]=="Monsieur"){echo "checked";}?>><label for="Monsieur"><span></span>M</label>&nbsp;&nbsp;
				<input type="radio" name="titreResponsable" id="Madame" value="Madame" <?php if($_SESSION["TitreResponsable"]=="Madame"){echo "checked";}?>><label for="Madame"><span></span>Mme</label><br>
				<input type="text" name="nomResponsable" placeholder="Nom (responsable légal)" value="<?php echo $_SESSION["NomResponsable"] ?>" class="<?php if(isset($_SESSION["NomResponsable"]) && ($_SESSION["NomResponsable"]=="" || chaineTexte($_SESSION["NomResponsable"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="prenomResponsable" placeholder="Prénom (responsable légal)" value="<?php echo $_SESSION["PrenomResponsable"] ?>" class="<?php if(isset($_SESSION["PrenomResponsable"]) && ($_SESSION["PrenomResponsable"]=="" || chaineTexte($_SESSION["PrenomResponsable"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="naissanceResponsable" placeholder="Date de naissance (10/06/1990)" value="<?php echo $_SESSION["NaissanceResponsable"] ?>" class="<?php if(isset($_SESSION["NaissanceResponsable"]) && ($_SESSION["NaissanceResponsable"]=="" || chaineDate($_SESSION["NaissanceResponsable"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="adresseResponsable" placeholder="Adresse" value="<?php echo $_SESSION["AdresseResponsable"] ?>" class="<?php if(isset($_SESSION["AdresseResponsable"]) && ($_SESSION["AdresseResponsable"]=="" || stopSQL($_SESSION["AdresseResponsable"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="cpResponsable" placeholder="Code postal" class="inline m5 <?php if(isset($_SESSION["CpResponsable"]) && ($_SESSION["CpResponsable"]=="" || chaineNumeriqueCp($_SESSION["CpResponsable"],3,5)==false)){echo "styleErreurInline";} ?>" value="<?php echo $_SESSION["CpResponsable"] ?>" >
				<input type="text" name="villeResponsable" placeholder="Ville" class="inline <?php if(isset($_SESSION["VilleResponsable"]) && ($_SESSION["VilleResponsable"]=="" || chaineTexte($_SESSION["VilleResponsable"],5,80)==false)){echo "styleErreurInline";} ?>" value="<?php echo $_SESSION["VilleResponsable"] ?>">
				<select name="nbEnfants" class="<?php if(isset($_SESSION["NbEnfants"]) && $_SESSION["NbEnfants"]==""){echo "styleErreurSelect";} ?>">
					<option value="" <?php if($_SESSION["NbEnfants"]==""){echo "selected";} ?>>Nombre d’enfant à inscrire</option>
					<option value="1" <?php if($_SESSION["NbEnfants"]=="1"){echo "selected";} ?>>1</option>
					<option value="2" <?php if($_SESSION["NbEnfants"]=="2"){echo "selected";} ?>>2</option>
					<option value="3" <?php if($_SESSION["NbEnfants"]=="3"){echo "selected";} ?>>3</option>
					<option value="4" <?php if($_SESSION["NbEnfants"]=="4"){echo "selected";} ?>>4</option>
					<option value="5" <?php if($_SESSION["NbEnfants"]=="5"){echo "selected";} ?>>5</option>
				</select>	
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
        <i class="timeline__step-marker next">2</i>
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
