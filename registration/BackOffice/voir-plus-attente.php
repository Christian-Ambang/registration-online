<?php include_once("../parametres.php");
include_once("class/connexion_bdd.php");
include_once("class/class_backoffice_structure.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Back Office Inscription Online - Voir plus inscription en attente - <?php echo $nom_structure; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_responsive.css">
<script src="js/jquery.js"></script>
<script src="js/menu.js"></script> 
<script src="js/modal.js"></script>
<script src="js/modal-supprimer.js"></script>
</head>
<div class="modalStructure-global modalStructure-global-inscrire">
	<div class="modalStructure modalStructure-inscrire">
		<div class="modalite modalite-inscrire">Voulez-vous vraiment inscrire cet adhérent ?</div>
		<div class="button-global">
			<div class="button1 button button1-inscrire"><a href="inscrire_adherent.php?page-provenance-back-office=voir-plus-attente&ref_structure=<?php echo $_GET["ref_structure"]; ?>&ref_adherent=<?php echo $_GET["ref_adherent"]; ?>&ref_responsable=<?php echo $_GET["ref_responsable"]; ?>" target="_self">Oui</a></div>
			<div class="button2 button button2-inscrire">Non</div>
			<div class="both"></div>
		</div>
	</div>
</div>
<div class="modalStructure-global modalStructure-global-supprimer">
	<div class="modalStructure modalStructure-supprimer">
		<div class="modalite modalite-supprimer">Voulez-vous vraiment supprimer cet adhérent ?</div>
		<div class="button-global">
			<div class="button1 button button1-supprimer"><a href="supprimer-adherent.php?page-provenance-back-office=voir-plus-attente&ref_structure=<?php echo $_GET["ref_structure"]; ?>&ref_adherent=<?php echo $_GET["ref_adherent"]; ?>&ref_responsable=<?php echo $_GET["ref_responsable"]; ?>" target="_self">Oui</a></div>
			<div class="button2 button button2-supprimer">Non</div>
			<div class="both"></div>
		</div>
	</div>
</div>
	
<body>
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
		<section>
			<div class="Pastille">
				En attente
			</div>
		</section>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Info
				</div>
			</section>
			<section class="conteneur">
				<table class="voir_plus" cellpadding="0" cellspacing="5" border="0">
					<?php 
					$voir_plus_attente=new voir_plus_attente;
					$voir_plus_attente->tabDataEnfantVoirPLusInfo($_GET["ref_structure"],$_GET["ref_adherent"]);
					?>
				</table>
			</section>
		</section>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Responsable
				</div>
			</section>
			<section class="conteneur">
				<table class="voir_plus" cellpadding="0" cellspacing="5" border="0">
					<?php 
					$voir_plus_attente=new voir_plus_attente;
					$voir_plus_attente->tabDataEnfantVoirPLusResponsable($_GET["ref_structure"],$_GET["ref_responsable"]);
					?>
				</table>
			</section>
		</section>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Entraînement
				</div>
			</section>
			<section class="conteneur">
				<table class="voir_plus" cellpadding="0" cellspacing="5" border="0">
					<?php 
					$voir_plus_attente=new voir_plus_attente;
					$voir_plus_attente->tabDataEnfantVoirPLusEntrainement($_GET["ref_structure"],$_GET["ref_adherent"]);
					?>
				</table>
			</section>
		</section>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Pièces jointe
				</div>
			</section>
			<section class="conteneur">
				<table class="voir_plus_pieces" cellpadding="0" cellspacing="5" border="0">
					<?php 
					$voir_plus_attente=new voir_plus_attente;
					$voir_plus_attente->tabDataEnfantVoirPLusPieces($_GET["ref_structure"],$_GET["ref_adherent"]);
					?>
				</table>
			</section>
		</section>
		<section class="inline-block-voir_plus">
			<section>
				<div class="Pastille Pastille-Border">
					Équipement
				</div>
			</section>
			<section class="conteneur">
				<table class="voir_plus" cellpadding="0" cellspacing="5" border="0">
					<?php 
					$voir_plus_attente=new voir_plus_attente;
					$voir_plus_attente->tabDataEnfantVoirPLusEquipement($_GET["ref_structure"],$_GET["ref_adherent"]);
					?>
				</table>
			</section>
		</section>
		<section class="action">
				<div class="Pastille inline-block colRight">
					<a href="modifier-adherent.php?ref_structure=<?php echo $_GET["ref_structure"]; ?>&ref_adherent=<?php echo $_GET["ref_adherent"]?>&ref_responsable=<?php echo $_GET["ref_responsable"]; ?>" target="_self">Modifier</a>
				</div>
				<div class="Pastille modal inscrire inline-block colRight">
					Inscrire
				</div>
				<div class="Pastille modal supprimer inline-block colRight">
					Supprimer
				</div>
				<div class="colClear"></div>
		</section>
	</main>
</body>
</html>
