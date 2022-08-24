<?php include_once("parametres.php"); ?>

<!--Modal Equipement-->
	<div id="choixEquipementModal" class="modal-bg-container none">
		<div class="modal-container modal-choixEquipement">
			<h3>ÉQUIPEMENTS</h3>
			<div class="page bloc">
				<section class="modaliteEquipent">
					Pour les doboks il est préférable de choisir 5 à 10 cm au dessus 
					de la taille de votre enfant.
				</section>
				<section class="equipement">
					<?php equipementTarif($tarifDobok); ?>
				</section>
			</div>
			<div class="btn">Suivant</div>
		</div>
	</div>
<!--Modal Equipement-->