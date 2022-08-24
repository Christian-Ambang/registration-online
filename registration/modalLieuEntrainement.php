<?php include_once("parametres.php"); ?>

<!--Modal Lieux Entrainement-->
	<div id="lieuEntrainementModal" class="modal-bg-container none">
		<div class="modal-container modal-lienEntrainement">
			<h3>Créneaux Horaires</h3>
			<div class="page bloc">
				<section class="modalite">
						Veuillez d'abord selectioner une tranche d'âge.
				</section>
				<?php foreach($horaire as $key =>$value){ ?>
								
						<section class="horaire <?php echo key($value) ?> none">
							<?php 
							forEachTrois($value); 
							?>
						</section>		
				
				<?php } ?>
				
			</div>
			<div class="btn">Suivant</div>
		</div>
	</div>
<!--Modal Lieux Entrainement-->