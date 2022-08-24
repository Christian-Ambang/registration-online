<?php include_once("../parametres.php");
include_once("class/connexion_bdd.php");
include_once("class/class_backoffice_structure.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Back Office Inscription Online - Voir inscription en attente - <?php echo $nom_structure; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_responsive.css">
<script src="js/jquery.js"></script>
<script src="js/menu.js"></script> 
</head>
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
				Inscrit
			</div>
		</section>
		<section class="tabData enfant">
			<div class="Pastille">
				Enfants
			</div>
			<table class="mobile" cellpadding="0" cellspacing="0" border="0">
				<tr class="entete">
					<td>id</td>
					<td>Réf</td>
					<td>Civilité</td>
					<td>Nom</td>
					<td>Prénom</td>
					<td>Naissance</td>
					<td>Niveau</td>
					<td>Choix&nbsp;1</td>
					<td>Choix&nbsp;2</td>
					<td>Équipement</td>
					<td>Responsable</td>
					<td width="10" style="width:10px;">&nbsp;</td>
				</tr>
				<?php $voir_inscrit= new voir_inscrit;
					  $voir_inscrit->tabDataEnfant($ref_structure);
				?>
			</table>
		</section>
		<section class="tabData adulte">
			<div class="Pastille">
				Adultes
			</div>
			<table class="mobile" cellpadding="0" cellspacing="0" border="0">
				<tr class="entete">
					<td>id</td>
					<td>Réf</td>
					<td>Civilité</td>
					<td>Nom</td>
					<td>Prénom</td>
					<td>Naissance</td>
					<td>Niveau</td>
					<td>Choix&nbsp;1</td>
					<td>Choix&nbsp;2</td>
					<td width="10" style="width:10px;">&nbsp;</td>
				</tr>
				<?php //$voir_attente= new voir_attente;
					  //$voir_attente->tabData();
				?>
			</table>
		</section>
	</main>
</body>
</html>
