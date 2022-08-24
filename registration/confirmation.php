<?php  
	   session_start();
	   if($_POST["pageProvenance"]!=""){$_SESSION["pageProvenance"]=$_POST["pageProvenance"];}
	   include_once("parametresMail.php");		
	   include_once("parametres.php");
if(isset($_POST["pageProvenance"]) && $_POST["pageProvenance"]=="adulte-3" ){
			//$_SESSION["compteur"]= $_SESSION["compteur"] + $_POST["compteurForm"];
			/*==========Input file name photo=================*/
			$_SESSION["Photo"]=$_FILES['photo'];
			//uploadFichier(name input, name dossier, name fichier, extentions autorisés)
			$photo = uploadFichier("photo","uploadPhotos",$_SESSION["Nom"],array('jpg','png','jpeg'),$_SESSION["compteur"],$URI_SERVEUR);		
	
			// Verification du bon upload de l'image
			$_SESSION["PhotoStatuUpload"]=$photo[0];
			if($_SESSION["PhotoStatuUpload"]=="ok"){$i=1;
			// Le nom du fichier final sur le serveur
				$_SESSION["PhotoFichierName"]=$photo[1];

												   }
			$_SESSION["compteur"]= $_SESSION["compteur"]+$i;
			// Le nom du fichier final sur le serveur
			//$_SESSION["PhotoFichierName"]=$photo[1];
			
			// Test de l'extention du fichier
			$_SESSION["PhotoExtention"]= $photo[2];
			/*==========Input file name photo=================*/

	
			/*==========Input file name Certificat=================*/
			$_SESSION["Certificat"]=$_FILES["certificat"];
			//uploadFichier(name input, name dossier, name fichier, extentions autorisés)
			$certificat = uploadFichier("certificat","uploadCertificat",$_SESSION["Nom"],array('jpg','png','jpeg','pdf'),$_SESSION["compteurCertificat"],$URI_SERVEUR);		
	
			// Verification du bon upload de l'image
			$_SESSION["CertificatStatuUpload"]=$certificat[0];
			if($_SESSION["CertificatStatuUpload"]=="ok"){$i=1;
			// Le nom du fichier final sur le serveur
			$_SESSION["CertificatFichierName"]=$certificat[1];
														}
			$_SESSION["compteurCertificat"]= $_SESSION["compteurCertificat"]+$i;
			// Le nom du fichier final sur le serveur
			//$_SESSION["CertificatFichierName"]=$certificat[1];
			
			// Test de l'extention du fichier
			$_SESSION["CertificatExtention"]= $certificat[2];
			/*==========Input file name Certificat=================*/
	
			if(isset($_POST["droitImage"])){$_SESSION["DroitImage"]=$_POST["droitImage"];}else{$_SESSION["DroitImage"]="Non";}
			if(isset($_POST["reglement"])){$_SESSION["Reglement"]=$_POST["reglement"];}else{$_SESSION["Reglement"]="Non";}
			if(isset($_POST["obtentionLIcence"])){$_SESSION["ObtentionLIcence"]=$_POST["obtentionLIcence"];}else{$_SESSION["ObtentionLIcence"]="Non";}
			if(isset($_POST["offrePartenaire"])){$_SESSION["OffrePartenaire"]=$_POST["offrePartenaire"];}else{$_SESSION["OffrePartenaire"]="Non";}
	
			if( $_POST["reglement"] =="" || $_POST["obtentionLIcence"] =="" ) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			 {
				header("Location: adulte-3.php");
			    $_SESSION["Erreur"]="erreurDiv";
				$injection=false; 

			 }else{
				unset($_SESSION["pageProvenance"],$_POST["pageProvenance"]);
				$mail=true;
				$_SESSION["Erreur"]="";
				$injection=true; 
			}
			if($mail==true && $_SESSION["Erreur"]!="erreurDiv"){mail_confirmation("adulte",$URI,$_SESSION,$caractereType2,$caractereType1);}
			
			if($injection==true && $_SESSION["Erreur"]==""){
				include_once("class/connexion_bdd.php");
				include_once("class/class_adulte.php");
				$ref_adherent_adulte= new ref_adherent_adulte;
				$ref_adherent_adulte->Set_id();
				$adherentID=$ref_adherent_adulte->Get_id();
				$ref_adherent_adulte->creation_ref_adherent($ref_structure,$adherentID);
				$ref_adherent=$ref_adherent_adulte->Get_ref_adherent();
				
				$adulte_adherent= new adulte_adherent;
				$adulte_adherent->ref_structure=$ref_structure;
				$adulte_adherent->ref_adherent=$ref_adherent;
				$adulte_adherent->titre_adulte_adherent=$_SESSION["Titre"];
				$adulte_adherent->prenom_adulte_adherent=$_SESSION["Prenom"];
				$adulte_adherent->nom_adulte_adherent=$_SESSION["Nom"];
				$adulte_adherent->naissance_adulte_adherent=$_SESSION["Naissance"];
				$adulte_adherent->niveau_adulte_adherent=$_SESSION["Niveau"];
				$adulte_adherent->nb_cours_semaine_adulte_adherent=$_SESSION["NbCoursSemaine"];
				$adulte_adherent->entrainement_choix1_adulte_adherent=$_SESSION["Entrainement_choix1"];
				$adulte_adherent->entrainement_choix2_adulte_adherent=$_SESSION["Entrainement_choix2"];
				$adulte_adherent->photo_adulte_adherent=$_SESSION["PhotoFichierName"];
				$adulte_adherent->certificat_adulte_adherent=$_SESSION["CertificatFichierName"];
				$adulte_adherent->suppression_adulte_adherent="false";
				$adulte_adherent->Ajouter();
				
				$inscription_adherent= new inscription_adherent;
				$inscription_adherent->ref_structure=$ref_structure;
				$inscription_adherent->ref_adherent=$ref_adherent;
				$inscription_adherent->saison_adherent=$anneeInscription;
				$inscription_adherent->etat_adherent="En attente";
				$inscription_adherent->date_inscription_adherent=date("Y-m-d");
				$inscription_adherent->Ajouter();

				$contact_adulte_adherent= new contact_adulte_adherent;
				$contact_adulte_adherent->ref_structure=$ref_structure;
				$contact_adulte_adherent->ref_adherent=$ref_adherent;
				$contact_adulte_adherent->mail_adulte_adherent=$_SESSION["Mail"];
				$contact_adulte_adherent->tel_portable_adulte_adherent=$_SESSION["TelPortable"];
				$contact_adulte_adherent->tel_fixe_adulte_adherent=$_SESSION["TelDomicile"];
				$contact_adulte_adherent->nom_urgence_adulte_adherent=$_SESSION["NomUrgence"];
				$contact_adulte_adherent->prenom_urgence_adulte_adherent=$_SESSION["PrenomUrgence"];
				$contact_adulte_adherent->tel_urgence_adulte_adherent=$_SESSION["TelUrgence"];
				$contact_adulte_adherent->Ajouter();
				
				$adresse_adulte_adherent= new adresse_adulte_adherent;
				$adresse_adulte_adherent->ref_structure=$ref_structure;
				$adresse_adulte_adherent->ref_adherent=$ref_adherent;
				$adresse_adulte_adherent->adresse_adulte_adherent=$_SESSION["Adresse"];
				$adresse_adulte_adherent->cp_adulte_adherent=$_SESSION["Cp"];
				$adresse_adulte_adherent->ville_adulte_adherent=$_SESSION["Ville"];
				$adresse_adulte_adherent->Ajouter();
				
				$option_check_adulte_adherent= new option_check_adulte_adherent;
				$option_check_adulte_adherent->ref_structure=$ref_structure;
				$option_check_adulte_adherent->ref_adherent=$ref_adherent;
				$option_check_adulte_adherent->droit_image_adulte_adherent=$_SESSION["DroitImage"];
				$option_check_adulte_adherent->reglement_adulte_adherent=$_SESSION["Reglement"];
				$option_check_adulte_adherent->licence_fftda_adulte_adherent=$_SESSION["ObtentionLIcence"];
				$option_check_adulte_adherent->offre_partenaire_adulte_adherent=$_SESSION["OffrePartenaire"];
				$option_check_adulte_adherent->Ajouter();
			
				if($_SESSION["Choix_Equipement_Dobok"]!=""){
					$equipement_adherent= new equipement_adherent;
					$equipement_adherent->ref_structure=$ref_structure;
					$equipement_adherent->ref_adherent=$ref_adherent;
					$equipement_adherent->Ajouter_ref_equipement_adherent();
					
					$tailleEquipement= explode(":",$_SESSION["Choix_Equipement_Dobok"]);
					$equipement_adherent->dobok=$tailleEquipement[0];
					$equipement_adherent->etat_dobok="Non distribue";
					$equipement_adherent->AjouterDobok();
				}
			}
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription en ligne  - Adulte - confirmation</title>
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/inputFile.js"></script>
</head>
<body>
	<header>
		<h1>
			
			<span>INSCRIPTION<br><?php echo $anneeInscription ;?></span>

		</h1>
	</header>
	<main class="mainConfirmation">
		<section>
			<div class="Pastille">
				Adulte
			</div>
		</section>
		<section class="confirmation">
			<p>
				Bonjour <?php echo $_SESSION["Prenom"] ?>,<br>
				<br>
				Votre incription a bien été prise en compte<br>
				sous la référence : <strong><?php echo $ref_adherent; ?></strong><br><br>
				Vous allez recevoir un récapitulatif à cette adresse email :
				<strong><?php echo $_SESSION["Mail"] ?></strong><br>
				<span class="FS12">(Vérifiez également vos courriers indesirables)</span>
				<br><br>
				<?php 
					echo "Tarif pour ".$_SESSION["NbCoursSemaine"]." cours par semaine :";
				?>
				<strong>
				<?php echo $tarif[$_SESSION["Niveau"]][$_SESSION["NbCoursSemaine"]] ; ?> €
				</strong>				
				<br>
				<br>
				<?php 
					$equipementExplode = explode(":",$_SESSION["Choix_Equipement_Dobok"]);
					if($_SESSION["Choix_Equipement_Dobok"]!=""){ ?>
					Équipement souhaité : <br>
					-<?php echo $equipementExplode[1]." ".$equipementExplode[2].": ".$equipementExplode[0]." à <strong>".$equipementExplode[3]." €</strong>"; ?>
					<br>
					<br>
					<strong>Total: <?php $somme=$tarif[$_SESSION["Niveau"]][$_SESSION["NbCoursSemaine"]]+$equipementExplode[3]; echo $somme ?> €</strong><br><br>
				<?php } ?>
				<span><a href="pdf/<?php echo $tarif[$_SESSION["Niveau"]]["pdf"] ;?>" target="_blank"><img src="img/icon-pdf.png" width="24" height="24" alt="" align="left" style="margin-right:10px">Voir le planning prévisionnel et les lieux d’entrainements en <strong style="text-decoration: underline">cliquant ici</strong></a>.</span>
				<br>
				<br>
				Toute inscription sera finalisée uniquement à réception du réglement 
				de la cotisation par chèque, coupon sport, espèce ou chèque vacances (ANCV) auprès du dirigeant.<br>
				<br>Aucun remboursement de cotisation sera effectué en cours de saison.
				<br><br><strong>Attention, étant donné un nombre de place limitées. Seul le règlement de la cotisation annuelle validera les créneaux sélectionnés.</strong>				
			</p>
			<p class="reseaux colRight">
				<span>Suis-nous sur :</span><br>
				<a href="https://www.instagram.com" target="_blank" style="border: 0"><img src="img/icon-instagram.png" width="26" height="26" alt=""></a>
				<a href="https://www.facebook.com" target="_blank" style="border: 0"><img src="img/icon-facebook.png" width="26" height="26" alt=""></a>
				<a href="#" target="_blank" style="border: 0"><img src="img/icon-linkedin.png" width="26" height="26" alt=""></a>
				<a href="https://www.club.fr" target="_blank" style="border: 0"><img src="img/icon-web.png" width="26" height="26" alt=""></a>
			</p>
			<p class="colClear"></p>
		</section>
	</main>
</body>
</html>
