<?php 
	   session_start(); 
	   include_once("parametres.php");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription en ligne  - Adulte</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/selectNbCoursSemaine.js"></script>
<script type="text/javascript" src="js/modalEffects.js"></script>	
<script type="text/javascript" src="js/checkLieuEntrainement.js"></script>
<script type="text/javascript" src="js/selectEquipement.js"></script>

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
		<section>
			<div class="Pastille">
				Adulte
			</div>
		</section>
		<form id="form" action="adulte-2.php" method="post" autocomplete enctype="multipart/form-data">
		<input type="hidden" name="pageProvenance" value="adulte">
		<section class="form">
				<?php include_once("modalChoixEquipement.php"); ?>
				<?php include_once("modalLieuEntrainement.php"); ?>
				<?php include_once("modalMentionsLegales.php"); ?>
				<?php include_once("modalCGU.php"); ?>
				Civilité:&nbsp;&nbsp;
				<input type="radio" name="titre" id="Monsieur" value="Monsieur" <?php if($_SESSION["Titre"]=="Monsieur"){echo "checked";}?>><label for="Monsieur"><span></span>M</label>&nbsp;&nbsp;
				<input type="radio" name="titre" id="Madame" value="Madame" <?php if($_SESSION["Titre"]=="Madame"){echo "checked";}?>><label for="Madame"><span></span>Mme</label><br>
				<input type="text" name="nom" placeholder="Nom" value="<?php echo $_SESSION["Nom"] ?>" class="<?php if(isset($_SESSION["Nom"]) && ($_SESSION["Nom"]=="" || chaineTexte($_SESSION["Nom"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="prenom" placeholder="Prénom" value="<?php echo $_SESSION["Prenom"] ?>" class="<?php if(isset($_SESSION["Prenom"]) && ($_SESSION["Prenom"]=="" || chaineTexte($_SESSION["Prenom"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="naissance" placeholder="Date de naissance (10/06/1990)" value="<?php echo $_SESSION["Naissance"] ?>" class="<?php if(isset($_SESSION["Naissance"]) && ($_SESSION["Naissance"]=="" || chaineDate($_SESSION["Naissance"])==false)){echo "styleErreur";} ?>">	
			
				<input type="text" name="adresse" placeholder="Adresse" value="<?php echo $_SESSION["Adresse"] ?>" class="<?php if(isset($_SESSION["Adresse"]) && ($_SESSION["Adresse"]=="" || stopSQL($_SESSION["Adresse"])==false)){echo "styleErreur";} ?>">
				<input type="text" name="cp" placeholder="Code postal" class="inline m5 <?php if(isset($_SESSION["Cp"]) && ($_SESSION["Cp"]=="" || chaineNumeriqueCp($_SESSION["Cp"],3,5)==false)){echo "styleErreurInline";} ?>" value="<?php echo $_SESSION["Cp"] ?>" >
				<input type="text" name="ville" placeholder="Ville" class="inline <?php if(isset($_SESSION["Ville"]) && ($_SESSION["Ville"]=="" || chaineTexte($_SESSION["Ville"],5,80)==false)){echo "styleErreurInline";} ?>" value="<?php echo $_SESSION["Ville"] ?>">
				<input type="text" name="mail" placeholder="Mail" value="<?php echo $_SESSION["Mail"] ?>" class="<?php if(isset($_SESSION["Mail"]) && ($_SESSION["Mail"]=="" || chaineEmail($_SESSION["Mail"])==false)){echo "styleErreur";} ?>">
			
				<select name="niveau" data-index="1" class="niveau <?php if(isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]==""){echo "styleErreurSelect";} ?>">
					<option data-index="1" value="" <?php if($_SESSION["Niveau"]==""){echo "selected";} ?>>Niveau</option>
					<option data-index="1" value="adultes" <?php if($_SESSION["Niveau"]=="adultes"){echo "selected";} ?>>Loisir&nbsp;&nbsp;(&Agrave; partir de <?php $annee=explode("/",$anneeInscription); echo $annee[0]-15 ; ?>)</option>
					<option data-index="1" value="competition_adultes" <?php if($_SESSION["Niveau"]=="competition_adultes"){echo "selected";} ?>>Compétition&nbsp;&nbsp;(Sélection des coachs)</option>
					<option data-index="1" value="self_defense" <?php if($_SESSION["Niveau"]=="self_defense"){echo "selected";} ?>>Body Taek Fit</option>				
				</select>
				<select name="nbCoursSemaine" class="nbCoursSemaine <?php if(isset($_SESSION["NbCoursSemaine"]) && $_SESSION["NbCoursSemaine"]==""){echo "styleErreurSelect";} ?>">
					<option value="" <?php if($_SESSION["NbCoursSemaine"]==""){echo "selected";} ?>>Nombre de cours par semaine</option>
					<option class="displayNone" value="1" <?php if($_SESSION["NbCoursSemaine"]=="1"){echo "selected";} ?>>1</option>
					<option class="displayNone" value="2" <?php if($_SESSION["NbCoursSemaine"]=="2"){echo "selected";} ?>>2</option>
					<option class="displayNone" value="3" <?php if($_SESSION["NbCoursSemaine"]=="3"){echo "selected";} ?>>3</option>
					<option class="displayNone" value="4" <?php if($_SESSION["NbCoursSemaine"]=="4"){echo "selected";} ?>>4</option>
					<option class="displayNone" value="5" <?php if($_SESSION["NbCoursSemaine"]=="5"){echo "selected";} ?>>5</option>
				</select>
			
				<input type="text" name="entrainement"  readonly  placeholder="Choisissez vos créneaux horaires" value=""  class="lieuEntrainement <?php if( isset($_SESSION["entrainementChoix"]) && $_SESSION["entrainementChoix"]==false){echo "styleErreur";} ?>">
				<input type="hidden" name="entrainement_choix1" value="<?php if(isset($_SESSION["Entrainement_choix1"])){echo $_SESSION["Entrainement_choix1"];}?>" class="choix_1">	
				<input type="hidden" name="entrainement_choix2" value="<?php if(isset($_SESSION["Entrainement_choix2"])){echo $_SESSION["Entrainement_choix2"];}?>" class="choix_2">
		
				<input type="text" name="choixEquipement" readonly placeholder="Choisissez votre équipement" value="" class="choixEquipement">
				<input type="hidden" name="choixEquipementTotal"  value="<?php if(isset($_SESSION["ChoixEquipementTotal"]) && $_SESSION["ChoixEquipementTotal"]!=""){echo "True";}?>" class="choixEquipementTotal">
				<input type="hidden" name="choix_Equipement_Dobok" value="<?php if(isset($_SESSION["Choix_Equipement_Dobok"])){echo $_SESSION["Choix_Equipement_Dobok"];}?>" class="choixDobok">
		
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
		<section class="Mentions"> 
			<ul>
				<li class="CGU">CGU</li> - 
				<li class="mentionsLegales">Mentions légales</li>
			</ul>
		</section>
	</main>
</body>
</html>
