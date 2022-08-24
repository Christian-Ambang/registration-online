<?php include_once("../parametres.php")?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Back Office Inscription Online - Accueil - <?php echo $nom_structure; ?></title>
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
	<main class="mainForm">
		<section >
		</section>
	</main>
</body>
</html>
