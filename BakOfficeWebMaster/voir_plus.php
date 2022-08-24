<?php include_once("parametres.php"); 
include_once("connexion_bdd.php");
include_once("class/class_webmaster.php");
$webmaster=new webmaster;
$result=$webmaster->Charger($_GET["ref_structure"]);
session_destroy();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Back Office Webmaster - Voir</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/menu.js"></script>
<script src="js/modal.js"></script>
</head>
<body>
	<div id="<?php if(isset($_GET["Message-Webmaster"])){echo $_GET["Message-Webmaster"];}else if (isset($_GET["Erreur-Webmaster"])){echo $_GET["Erreur-Webmaster"];}?>">
		<?php
			if($_GET["Message-Webmaster"]=="suppressionValide"){
			       echo "Suppression prise en compte";		
		}
		?>
	</div>
	<div class="modalStructure-global">
		<div class="modalStructure">
			<div class="modalite">Voulez vous vraiment désactiver cette structure, cela aura pour conséquence de mettre sa page en operation terminé ( ajout d'un .htacces )</div>
			<div class="button-global">
				<div class="button1 button"><a href="etat.php?page-provenance=voir&etat=<?php echo $result[0]["etat"]; ?>&ref_structure-supp=<?php echo $_GET["ref_structure"]; ?>" target="_self">Oui</a></div>
				<div class="button2 button">Non</div>
				<div class="both"></div>
			</div>
		</div>
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
	<main>
		<section>
			<div class="Pastille">
				Administrateur
			</div>
		</section>
		<section class="conteneur">
			<table class="voir_plus" cellpadding="0" cellspacing="5" border="0">
				<?php $voir_plus= new voir_plus;
					  $voir_plus->tabData($_GET["ref_structure"]);
				?>
			</table>
		</section>
		<section class="action">
			<div class="Pastille inline-block colRight">
				<a href="form-modifier?ref_structure-modif=<?php echo $_GET["ref_structure"]; ?>" target="_self">Modifier</a>
			</div>
			<div class="Pastille modal inline-block colRight">
				<?php if($result[0]["etat"]=="passif"){echo "Activer";}else{echo "Désactiver";} ?>
			</div>
			<div class="clear"></div>
		</section>
	</main>
</body>
</html>
