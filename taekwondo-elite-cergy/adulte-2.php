<?php 
		session_start();
		if($_POST["pageProvenance"]!=""){$_SESSION["pageProvenance"]=$_POST["pageProvenance"];}
		include_once("parametres.php");
if(isset($_POST["pageProvenance"]) && $_POST["pageProvenance"]=="adulte" ){
$_SESSION["Titre"]=trim($_POST["titre"]);
$_SESSION["Nom"]=trim($_POST["nom"]);
$_SESSION["Prenom"]=trim($_POST["prenom"]);
$_SESSION["Naissance"]=trim($_POST["naissance"]);
$_SESSION["Niveau"]=trim($_POST["niveau"]);
$_SESSION["NbCoursSemaine"]=trim($_POST["nbCoursSemaine"]);
$_SESSION["Adresse"]=trim($_POST["adresse"]);
$_SESSION["Cp"]=trim($_POST["cp"]);
$_SESSION["Ville"]=trim($_POST["ville"]);
$_SESSION["Mail"]=trim($_POST["mail"]);
$_SESSION["Entrainement_choix1"]=trim($_POST["entrainement_choix1"]);
$_SESSION["Entrainement_choix2"]=trim($_POST["entrainement_choix2"]);
	
$_SESSION["Choix_Equipement_Dobok"]=$_POST["choix_Equipement_Dobok"];
$_SESSION["ChoixEquipementTotal"]=$_POST["choixEquipementTotal"];
$_SESSION["ChoixEquipement"].=$_POST["choixEquipementTotal"];

/*==========Choix Créneaux==========*/
			$_SESSION["entrainementChoix"]=false;
			if($_POST["entrainement_choix1"]=="" || $_POST["entrainement_choix2"]=="" && $_POST["niveau"]=="self_defense")
			{$_SESSION["entrainementChoix"]=false;}else 
			if($_POST["entrainement_choix1"]!="" && $_POST["entrainement_choix2"]!="" && $_POST["niveau"]=="self_defense")
			{$_SESSION["entrainementChoix"]=true;}	

			if(($_POST["entrainement_choix1"]=="" && $_POST["entrainement_choix2"]=="") && ($_POST["niveau"]=="adultes" || $_POST["niveau"]=="competition_adultes"))
			{$_SESSION["entrainementChoix"]=true;}
/*==========Choix Créneaux==========*/
	

if (trim($_POST["titre"])=="" || trim($_POST["nom"])=="" || trim($_POST["prenom"])=="" ||
   trim($_POST["naissance"])=="" || trim($_POST["niveau"])=="" ||
   trim($_POST["nbCoursSemaine"]) =="" ||	trim($_POST["adresse"])=="" ||trim( $_POST["cp"])==""||
	trim($_POST["ville"])=="" || trim($_POST["mail"])=="" || 
    chaineNumeriqueCp(trim($_POST["cp"]),3,5)==false ||
	chaineTexte(trim($_POST["nom"]),2,40)==false || chaineTexte(trim($_POST["prenom"]),2,40)==false ||
	chaineTexte(trim($_POST["ville"]),5,80)==false || chaineDate(trim($_POST["naissance"]))==false || stopSQL(trim($_POST["adresse"]))==false || 
	chaineEmail(trim($_POST["mail"]))==false || $_SESSION["entrainementChoix"]==false
   ){

header("Location: adulte.php");
$_SESSION["Erreur"]="erreurDiv";
$_SESSION["ChoixEquipement"]="";
	}elseif(checkInscription($_POST["Mail"],$_POST["Nom"])==false){
//header("Location: adulte.php");
	$_SESSION["Erreur"]="erreurDivInscription";
	//$_SESSION["Erreur"]="";
}
else{$_SESSION["Erreur"]=""; unset($_SESSION["pageProvenance"]);}
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription en ligne  - Adulte - step2</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="<?php echo $_SESSION["Erreur"]?>">
		<?php if($_SESSION["Erreur"]=="erreurDiv"){
					
					echo "Veuillez vérifier les champs du formulaire";
					//echo "<span class='close'>X</span>" ;
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
				Adulte
			</div>
		</section>
		<form id="form" action="adulte-3.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="pageProvenance" value="adulte-2">
		<section class="form">
				<input type="text" name="telPortable" placeholder="Téléphone portable" value="<?php echo $_SESSION["TelPortable"] ?>" class="<?php if(isset($_SESSION["TelPortable"]) && ( $_SESSION["TelPortable"]=="" || chaineNumeriqueTelMobile($_SESSION["TelPortable"],10,10)==false)){echo "styleErreur";} ?>">
				<input type="text" name="telDomicile" placeholder="Téléphone domicile" value="<?php echo $_SESSION["TelDomicile"] ?>" class="<?php if(isset($_SESSION["TelDomicile"]) && ( $_SESSION["TelDomicile"]!="" && chaineNumeriqueTelFixe($_SESSION["TelDomicile"],10,10)==false)){echo "styleErreur";} ?>">
				<input type="text" name="nomUrgence" placeholder="Nom (contact d’urgence)" value="<?php echo $_SESSION["NomUrgence"] ?>" class="<?php if(isset($_SESSION["NomUrgence"]) && ($_SESSION["NomUrgence"]=="" || chaineTexte($_SESSION["NomUrgence"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="prenomUrgence" placeholder="Prénom (contcat d’urgence)" value="<?php echo $_SESSION["PrenomUrgence"] ?>" class="<?php if(isset($_SESSION["PrenomUrgence"]) && ($_SESSION["PrenomUrgence"]=="" || chaineTexte($_SESSION["PrenomUrgence"],2,40)==false)){echo "styleErreur";} ?>">
				<input type="text" name="telUrgence" placeholder="Téléphone (contact d’urgence)" value="<?php echo $_SESSION["TelUrgence"] ?>" class="<?php if(isset($_SESSION["TelUrgence"]) && ( $_SESSION["TelUrgence"]=="" || chaineNumeriqueTelFixe($_SESSION["TelUrgence"],10,10)==false)){echo "styleErreur";} ?>">
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
