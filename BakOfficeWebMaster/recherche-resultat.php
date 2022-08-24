<?php include_once("parametres.php"); 
include_once("connexion_bdd.php");
include_once("class/class_webmaster.php");

$recherche=new recherche;
$recherche->nom_structure=$_POST["nomStructure"];
$recherche->specialite=$_POST["specialite"];
$recherche->statut_juridique=$_POST["statutJuridique"];
$recherche->siret=$_POST["siret"];
$recherche->etat=$_POST["etat"];
$recherche->nom=$_POST["nom"];
$recherche->prenom=$_POST["prenom"];
$result=$recherche->Charger();
//var_dump($_POST);
var_dump($result);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Back Office Webmaster - Résultat recherche</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
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
			<span>BAKC OFFICE WEBMASTER</span>
		</h1>
	</header>
	<main>
		<section>
			<div class="Pastille">
				Administrateur
			</div>
		</section>
		<section class="tabData">
			<table class="mobile" cellpadding="0" cellspacing="0" border="0">
				<tr class="entete">
					<td>Rèf</td>
					<td>Statut</td>
					<td>Structure</td>
					<td>Etat</td>
					<td>URI</td>
					<td>Admin</td>
					<td>Email</td>
					<td>dashboard</td>
					<td width="10" style="width:10px;">&nbsp;</td>
				</tr>
				<?php 
					
				?>
			</table>
		</section>
	</main>
</body>
</html>
