<?php  
	   session_start();
	   if($_POST["pageProvenance"]!=""){$_SESSION["pageProvenance"]=$_POST["pageProvenance"];}
	   include_once("parametresMail.php");
	   include_once("parametres.php");
if(isset($_POST["pageProvenance"]) && $_POST["pageProvenance"]=="enfant-3"){
			
			for ($i=1;$i<=$_SESSION["NbEnfants"];$i++){
				
				$_SESSION["TitreEnfant".$i]=$_POST["titreEnfant".$i];
				$_SESSION["NomEnfant".$i]=trim($_POST["nomEnfant".$i]);
				$_SESSION["PrenomEnfant".$i]=trim($_POST["prenomEnfant".$i]);
				$_SESSION["NaissanceEnfant".$i]=trim($_POST["naissanceEnfant".$i]);
				$_SESSION["NiveauEntrainement".$i]=trim($_POST["niveauEntrainement".$i]);
				$_SESSION["NbCoursSemaineEnfant".$i]=$_POST["nbCoursSemaineEnfant".$i];
				$_SESSION["Entrainement_choix1_enfant".$i]=$_POST["entrainement_choix1_enfant".$i];
				$_SESSION["Entrainement_choix2_enfant".$i]=$_POST["entrainement_choix2_enfant".$i];
				$_SESSION["Choix_Equipement_Dobok_enfant".$i]=$_POST["choix_Equipement_Dobok_enfant".$i];
				$_SESSION["ChoixEquipementTotal".$i]=$_POST["choixEquipementTotal".$i];
				$_SESSION["ChoixEquipement"].=$_POST["choixEquipementTotal".$i];
				
				/*==========Input file name photo=================*/
						$_SESSION["PhotoEnfant".$i]=$_FILES["photoEnfant".$i];
						//uploadFichier(name input, name dossier, name fichier, extentions autorisés)
						$photo = uploadFichier("photoEnfant".$i,"uploadPhotos",$_POST["nomEnfant".$i],array('jpg','png','jpeg'),$_SESSION["compteurEnfant".$i],$URI_SERVEUR);		

						// Verification du bon upload de l'image
						$_SESSION["PhotoStatuUploadEnfant".$i]=$photo[0];
						if($_SESSION["PhotoStatuUploadEnfant".$i]=="ok"){$e=1;
						// Le nom du fichier final sur le serveur
							$_SESSION["PhotoFichierNameEnfant".$i]=$photo[1];

															   }
						$_SESSION["compteurEnfant".$i]= $_SESSION["compteurEnfant".$i]+$e;
						// Le nom du fichier final sur le serveur
						//$_SESSION["PhotoFichierNameEnfant".$i]=$photo[1];
						// Test de l'extention du fichier
						$_SESSION["PhotoExtentionEnfant".$i]= $photo[2];
				/*==========Input file name photo=================*/
				
				/*==========Input file name Certificat=================*/
						$_SESSION["CertificatEnfant".$i]=$_FILES["certificatEnfant".$i];
						//uploadFichier(name input, name dossier, name fichier, extentions autorisés)
						$certificat = uploadFichier("certificatEnfant".$i,"uploadCertificat",$_POST["nomEnfant".$i],array('jpg','png','jpeg','pdf'),$_SESSION["compteurCertificatEnfant".$i],$URI_SERVEUR);		
						// Verification du bon upload de l'image
						$_SESSION["CertificatStatuUploadEnfant".$i]=$certificat[0];
						if($_SESSION["CertificatStatuUploadEnfant".$i]=="ok"){$e=1;
						// Le nom du fichier final sur le serveur
						$_SESSION["CertificatFichierNameEnfant".$i]=$certificat[1];
																	}
						$_SESSION["compteurCertificatEnfant".$i]= $_SESSION["compteurCertificatEnfant".$i]+$e;
						// Le nom du fichier final sur le serveur
						//$_SESSION["CertificatFichierNameEnfant".$i]=$certificat[1];
						// Test de l'extention du fichier
						$_SESSION["CertificatExtentionEnfant".$i]= $certificat[2];
			/*==========Input file name Certificat=================*/
			
			/*==========Choix Créneaux==========*/
				
				$_SESSION["entrainementChoixEnfant".$i]=false;
				$explodeNaissance=explode("/",$_POST["naissanceEnfant".$i]);
				$inscription=explode("/",$anneeInscription);
				$age=$inscription[0]-$explodeNaissance[2];
				
				if($_POST["niveauEntrainement".$i]=="Competiteur"){
					$_SESSION["entrainementChoixEnfant".$i]=true;
				}else if($age==4){
					if($_POST["entrainement_choix1_enfant".$i]!="" && $_POST["entrainement_choix2_enfant".$i]=="")
					{$_SESSION["entrainementChoixEnfant".$i]=true;}
				} else {
					if($_POST["entrainement_choix1_enfant".$i]=="" && $_POST["entrainement_choix2_enfant".$i]=="")
					{$_SESSION["entrainementChoixEnfant".$i]=false;}
					
					if($_POST["entrainement_choix1_enfant".$i]!="" && $_POST["entrainement_choix2_enfant".$i]!="")
					{$_SESSION["entrainementChoixEnfant".$i]=true;}
				}
				
			/*==========Choix Créneaux==========*/
				
				if( $_POST["titreEnfant".$i]=="" || trim($_POST["nomEnfant".$i])=="" || trim($_POST["prenomEnfant".$i])=="" || trim($_POST["naissanceEnfant".$i])=="" || 
				  	$_POST["niveauEntrainement".$i]=="" || $_POST["nbCoursSemaineEnfant".$i]=="" || $_SESSION["entrainementChoixEnfant".$i]==false ||
				  	chaineTexte(trim($_POST["nomEnfant".$i]),2,40)==false || chaineTexte(trim($_POST["prenomEnfant".$i]),2,40)==false || chaineDate(trim($_POST["naissanceEnfant".$i]))==false
				  ) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				 {
					header("Location: enfant-3.php");
					$_SESSION["Erreur"]="erreurDiv";
					$_SESSION["ChoixEquipement"]="";
					$injection=false; 

				 }else{unset($_SESSION["pageProvenance"],$_POST["pageProvenance"]);
					  $mail=true;
					  $injection=true; 
					  $_SESSION["Erreur"]="";
					  }
			}
			//mettre la fonction mail dans la condition injection et faire passer en session la ref $ref_responsable
			if($mail==true && $_SESSION["Erreur"]!="erreurDiv"){mail_confirmation("enfant",$URI,$_SESSION,$caractereType2,$caractereType1);}
			
			if($injection==true && $_SESSION["Erreur"]==""){
				include_once("class/connexion_bdd.php");
				include_once("class/class_enfant.php");
				$ref_responsable_legal_adherent= new ref_responsable_legal_adherent;
				$ref_responsable_legal_adherent->creation_ref_responsable_legal($ref_structure);
				$ref_responsable=$ref_responsable_legal_adherent->Get_ref_responsable_legal();
				
				$responsable_legal_adherent=new responsable_legal_adherent;
				$responsable_legal_adherent->ref_structure=$ref_structure;
				$responsable_legal_adherent->ref_responsable_legal=$ref_responsable;
				$responsable_legal_adherent->titre_responsable_legal=$_SESSION["TitreResponsable"];
				$responsable_legal_adherent->prenom_responsable_legal=$_SESSION["PrenomResponsable"];
				$responsable_legal_adherent->nom_responsable_legal=$_SESSION["NomResponsable"];
				$responsable_legal_adherent->naissance_responsable_legal=$_SESSION["NaissanceResponsable"];
				$responsable_legal_adherent->nombre_enfant_responsable_legal=$_SESSION["NbEnfants"];
				$responsable_legal_adherent->suppression_responsable_legal="false";
				$responsable_legal_adherent->Ajouter();
				
				$adresse_responsable_legal_adherent=new adresse_responsable_legal_adherent;
				$adresse_responsable_legal_adherent->ref_structure=$ref_structure;
				$adresse_responsable_legal_adherent->ref_responsable_legal=$ref_responsable;
				$adresse_responsable_legal_adherent->adresse_responsable_legal=$_SESSION["AdresseResponsable"];
				$adresse_responsable_legal_adherent->cp_responsable_legal=$_SESSION["CpResponsable"];
				$adresse_responsable_legal_adherent->ville_responsable_legal=$_SESSION["VilleResponsable"];
				$adresse_responsable_legal_adherent->Ajouter();
				
				$contact_responsable_legal_adherent=new contact_responsable_legal_adherent;
				$contact_responsable_legal_adherent->ref_structure=$ref_structure;
				$contact_responsable_legal_adherent->ref_responsable_legal= $ref_responsable;
				$contact_responsable_legal_adherent->mail_responsable_legal= $_SESSION["MailResponsable"];
				$contact_responsable_legal_adherent->tel_portable_responsable_legal= $_SESSION["TelPortableResponsable"];
				$contact_responsable_legal_adherent->tel_fixe_responsable_legal= $_SESSION["TelDomicileResponsable"];
				$contact_responsable_legal_adherent->Ajouter();
				
				$option_check_responsable_legal_adherent=new option_check_responsable_legal_adherent;
				$option_check_responsable_legal_adherent->ref_structure=$ref_structure;
				$option_check_responsable_legal_adherent->ref_responsable_legal= $ref_responsable;
				$option_check_responsable_legal_adherent->droit_image_responsable_legal=$_SESSION["DroitImageResponsable"];
				$option_check_responsable_legal_adherent->reglement_responsable_legal=$_SESSION["ReglementResponsable"];
				$option_check_responsable_legal_adherent->licence_fftda_responsable_legal=$_SESSION["ObtentionLIcenceResponsable"];
				$option_check_responsable_legal_adherent->offre_partenaire_responsable_legal=$_SESSION["OffrePartenaireResponsable"];
				$option_check_responsable_legal_adherent->Ajouter();
				
				for ($i=1;$i<=$_SESSION["NbEnfants"];$i++){
				$ref_adherent_enfant=new ref_adherent_enfant;
				$ref_adherent_enfant->Set_id();
				$adherentID=$ref_adherent_enfant->Get_id();
				$ref_adherent_enfant->creation_ref_adherent($ref_structure,$adherentID,$ref_responsable);
				
				$ref_adherent=$ref_adherent_enfant->Get_ref_adherent();
				
				$enfant_adherent= new enfant_adherent;
				$enfant_adherent->ref_structure= $ref_structure;
				$enfant_adherent->ref_responsable_legal= $ref_responsable;
				$enfant_adherent->ref_adherent = $ref_adherent;
				$enfant_adherent->titre_enfant_adherent= $_SESSION["TitreEnfant".$i];
				$enfant_adherent->prenom_enfant_adherent= $_SESSION["PrenomEnfant".$i];
				$enfant_adherent->nom_enfant_adherent= $_SESSION["NomEnfant".$i];
				$enfant_adherent->naissance_enfant_adherent= $_SESSION["NaissanceEnfant".$i];
				$enfant_adherent->niveau_enfant_adherent= $_SESSION["NiveauEntrainement".$i];
				$enfant_adherent->nombre_cours_semaine_efant_adherent= $_SESSION["NbCoursSemaineEnfant".$i];
				$enfant_adherent->entrainement_choix1_enfant_adherent= $_SESSION["Entrainement_choix1_enfant".$i];
				$enfant_adherent->entrainement_choix2_enfant_adherent= $_SESSION["Entrainement_choix2_enfant".$i];
				$enfant_adherent->photo_enfant_adherent= $_SESSION["PhotoFichierNameEnfant".$i];
				$enfant_adherent->certificat_enfant_adherent= $_SESSION["CertificatFichierNameEnfant".$i];
				$enfant_adherent->suppression_enfant_adherent= "false";
				$enfant_adherent->Ajouter();
					
				$inscription_adherent= new inscription_adherent;
				$inscription_adherent->ref_structure=$ref_structure;
				$inscription_adherent->ref_adherent=$ref_adherent;
				$inscription_adherent->saison_adherent=$anneeInscription;
				$inscription_adherent->etat_adherent="En attente";
				$inscription_adherent->date_inscription_adherent=date("Y-m-d");
				$inscription_adherent->Ajouter();
				
				if($_SESSION["Choix_Equipement_Dobok_enfant".$i]!=""){
					$equipement_adherent= new equipement_adherent;
					$equipement_adherent->ref_structure=$ref_structure;
					$equipement_adherent->ref_adherent=$ref_adherent;
					$equipement_adherent->Ajouter_ref_equipement_adherent();
					
					$tailleEquipement= explode(":",$_SESSION["Choix_Equipement_Dobok_enfant".$i]);
					$equipement_adherent->dobok=$tailleEquipement[0];
					$equipement_adherent->etat_dobok="Non distribue";
					$equipement_adherent->AjouterDobok();
				}	
				
				}
			}
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription en ligne  - Enfant - confirmation</title>
<link rel="stylesheet" href="css/style.css">
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
				Enfant(s)
			</div>
		</section>
		<section class="confirmation">
			<p>
				Bonjour <?php echo $_SESSION["TitreResponsable"]." ".$_SESSION["NomResponsable"] ?>,<br>
				<br>
				L'incription a bien été prise en compte<br>
				sous la référence : <strong><?php echo $ref_responsable ?></strong><br><br>
				Vous allez recevoir un récapitulatif à cette adresse email :
				<strong><?php echo $_SESSION["MailResponsable"] ?></strong><br>
				<span class="FS12">(Vérifiez également vos courriers indésirables)</span>
				<br><br>
				<?php $sommeTarifs=0;?>
				<?php for($i=1;$i<=$_SESSION["NbEnfants"];$i++){ ?>
			
					Tarif pour <?php echo $_SESSION["NbCoursSemaineEnfant".$i]?> cours par semaine pour <?php echo $_SESSION["PrenomEnfant".$i] ?>&nbsp;:
				<strong>
				<?php 
					if($_SESSION["NiveauEntrainement".$i]!="Competiteur"){
					$trancheAgeExplode = explode(":",$_SESSION["Entrainement_choix1_enfant".$i]);
					$trancheAge = $trancheAgeExplode[0];
					echo $tarif[$trancheAge][$_SESSION["NiveauEntrainement".$i]][$_SESSION["NbCoursSemaineEnfant".$i]];
					} 
					else 
					{
						$trancheAge = AgeDate(9,15,$anneeInscription);
					echo $tarif[$trancheAge][$_SESSION["NiveauEntrainement".$i]][$_SESSION["NbCoursSemaineEnfant".$i]] ;
					} 
				?> €
				</strong>
				<br>
				<br>
				<?php 
					$equipementExplode = explode(":",$_SESSION["Choix_Equipement_Dobok_enfant".$i]);
					if($_SESSION["Choix_Equipement_Dobok_enfant".$i]!=""){ ?>
					Équipement souhaité : <br>
					-<?php echo $equipementExplode[1]." ".$equipementExplode[2].": ".$equipementExplode[0]." à <strong>".$equipementExplode[3]." €</strong>"; ?>
					<br>
					<br>
				<?php } ?>
				
				<?php $sommeTarifs+=$tarif[$trancheAge][$_SESSION["NiveauEntrainement".$i]][$_SESSION["NbCoursSemaineEnfant".$i]]; ?>
				<?php $sommeTarifsEquipement+=$equipementExplode[3] ?>
				<?php } ?> 
				<?php  $somme=$sommeTarifs+$sommeTarifsEquipement;	 if($_SESSION["NbEnfants"]>1 || $_SESSION["ChoixEquipement"]!=""){  echo "<strong>Total: ".$somme." €</strong><br><br>"; } ?>
				<span><a href="pdf/<?php echo $tarif[AgeDate(4,4,$anneeInscription)]["ToutNiveau"]["pdf"] ;?>" target="_blank"><img src="img/icon-pdf.png" width="24" height="24" alt="" align="left" style="margin-right:10px">Voir le planning prévisionnel et les lieux d’entrainements en <strong style="text-decoration: underline">cliquant ici</strong></a>.</span>
				<br>
				<br>
				Toute inscription sera finalisée uniquement à réception du réglement 
				de la cotisation par chèque, coupon sport, espèce ou chèque vacances (ANCV) auprès du dirigeant.<br>
				<br>Aucun remboursement de cotisation sera effectué en cours de saison.
				<br><br><strong>Attention, étant donné un nombre de place limitées. Seul le règlement de la cotisation annuelle validera les créneaux sélectionnés.</strong> <br>
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
