<?php session_start();
include_once("../../parametres.php");
include_once("../class/connexion_bdd.php");
include_once("../class/class_backoffice_structure.php");
if(isset($_POST["page-provenance-back-office"]) && $_POST["page-provenance-back-office"]=="modifier-adherent"){
					
				/*ENFANT*/
				$_SESSION["TitreEnfant"]=$_POST["titreEnfant"];
				$_SESSION["NomEnfant"]=trim($_POST["nomEnfant"]);
				$_SESSION["PrenomEnfant"]=trim($_POST["prenomEnfant"]);
				$_SESSION["NaissanceEnfant"]=trim($_POST["naissanceEnfant"]);
				$_SESSION["NiveauEntrainement"]=trim($_POST["niveauEntrainement"]);
				$_SESSION["NbCoursSemaineEnfant"]=$_POST["nbCoursSemaineEnfant"];
				$_SESSION["Entrainement_choix1_enfant"]=$_POST["entrainement_choix1_enfant"];
				$_SESSION["Entrainement_choix2_enfant"]=$_POST["entrainement_choix2_enfant"];
				$_SESSION["Choix_Equipement_Dobok_enfant"]=$_POST["choix_Equipement_Dobok_enfant"];
				$_SESSION["ChoixEquipementTotal"]=$_POST["choixEquipementTotal"];
				$_SESSION["ChoixEquipement"].=$_POST["choixEquipementTotal"];
				/*ENFANT*/
	
				/*RESPONSABLE*/
				$_SESSION["TitreResponsable"]=trim($_POST["titreResponsable"]);
				$_SESSION["NomResponsable"]=trim($_POST["nomResponsable"]);
				$_SESSION["PrenomResponsable"]=trim($_POST["prenomResponsable"]);
				$_SESSION["NaissanceResponsable"]=trim($_POST["naissanceResponsable"]);
				$_SESSION["MailResponsable"]=trim($_POST["mailResponsable"]);
				$_SESSION["TelPortableResponsable"]=trim($_POST["telPortableResponsable"]);
				/*RESPONSABLE*/
	
				/*EQUIPEMENT*/
				$_SESSION["EquipementDobok"]=$_POST["equipementDobok"];
				/*EQUIPEMENT*/
		
				/*==========Input file name photo=================*/
						$_SESSION["PhotoEnfant"]=$_FILES["photoEnfant"];
						//uploadFichier(name input, name dossier, name fichier, extentions autorisés)
						$photo = uploadFichier("photoEnfant","uploadPhotos",$_POST["nomEnfant"],array('jpg','png','jpeg'),$_SESSION["compteurEnfant"],$URI_SERVEUR);		

						// Verification du bon upload de l'image
						$_SESSION["PhotoStatuUploadEnfant"]=$photo[0];
						if($_SESSION["PhotoStatuUploadEnfant"]=="ok"){$e=1;
						// Le nom du fichier final sur le serveur
							$_SESSION["PhotoFichierNameEnfant"]=$photo[1];

															   }
						$_SESSION["compteurEnfant"]= $_SESSION["compteurEnfant"]+$e;
						
						// Test de l'extention du fichier
						$_SESSION["PhotoExtentionEnfant"]= $photo[2];
				/*==========Input file name photo=================*/
				
				/*==========Input file name Certificat=================*/
						$_SESSION["CertificatEnfant"]=$_FILES["certificatEnfant"];
						//uploadFichier(name input, name dossier, name fichier, extentions autorisés)
						$certificat = uploadFichier("certificatEnfant","uploadCertificat",$_POST["nomEnfant"],array('jpg','png','jpeg','pdf'),$_SESSION["compteurCertificatEnfant"],$URI_SERVEUR);		
						// Verification du bon upload de l'image
						$_SESSION["CertificatStatuUploadEnfant"]=$certificat[0];
						if($_SESSION["CertificatStatuUploadEnfant"]=="ok"){$e=1;
						// Le nom du fichier final sur le serveur
						$_SESSION["CertificatFichierNameEnfant"]=$certificat[1];
																	}
						$_SESSION["compteurCertificatEnfant"]= $_SESSION["compteurCertificatEnfant"]+$e;
						// Le nom du fichier final sur le serveur
						//$_SESSION["CertificatFichierNameEnfant".$i]=$certificat[1];
						// Test de l'extention du fichier
						$_SESSION["CertificatExtentionEnfant"]= $certificat[2];
			/*==========Input file name Certificat=================*/
			
			/*==========Choix Créneaux==========*/
				
				$_SESSION["entrainementChoixEnfant"]=false;
				$explodeNaissance=explode("/",$_POST["naissanceEnfant"]);
				$inscription=explode("/",$anneeInscription);
				$age=$inscription[0]-$explodeNaissance[2];
				
				if($_POST["niveauEntrainement"]=="Competiteur"){
					$_SESSION["entrainementChoixEnfant"]=true;
				}else if($age==4){
					if($_POST["entrainement_choix1_enfant"]!="" && $_POST["entrainement_choix2_enfant"]=="")
					{$_SESSION["entrainementChoixEnfant"]=true;}
				} else {
					if($_POST["entrainement_choix1_enfant"]=="" && $_POST["entrainement_choix2_enfant"]=="")
					{$_SESSION["entrainementChoixEnfant"]=false;}
					
					if($_POST["entrainement_choix1_enfant"]!="" && $_POST["entrainement_choix2_enfant"]!="")
					{$_SESSION["entrainementChoixEnfant"]=true;}
				}
				
			/*==========Choix Créneaux==========*/
				
				if( $_POST["titreEnfant"]=="" || trim($_POST["nomEnfant"])=="" || trim($_POST["prenomEnfant"])=="" || trim($_POST["naissanceEnfant"])=="" || 
				  	$_POST["niveauEntrainement"]=="" || $_POST["nbCoursSemaineEnfant"]=="" || 
				  	chaineTexte(trim($_POST["nomEnfant"]),2,40)==false || chaineTexte(trim($_POST["prenomEnfant"]),2,40)==false || chaineDate(trim($_POST["naissanceEnfant"]))==false
				  	|| trim($_POST["titreResponsable"])=="" || trim($_POST["nomResponsable"])=="" || trim($_POST["prenomResponsable"])=="" ||
   					trim($_POST["naissanceResponsable"])=="" || chaineTexte(trim($_POST["nomResponsable"]),2,40)==false || chaineTexte(trim($_POST["prenomResponsable"]),2,40)==false ||
				   	chaineDate(trim($_POST["naissanceResponsable"]))==false || trim($_POST["mailResponsable"])=="" || trim($_POST["telPortableResponsable"])=="" || chaineNumeriqueTelMobile(trim($_POST["telPortableResponsable"]),10,10)==false ||
				    chaineEmail($_POST["mailResponsable"])==false
				  ) 
				 {
					header("Location: ../modifier-adherent.php?ref_structure=".$_POST["ref_structure"]."&ref_adherent=".$_POST["ref_adherent"]."&ref_responsable=".$_POST["ref_responsable"]);
					$_SESSION["Erreur"]="erreurDiv";
					$_SESSION["ChoixEquipement"]="";
					$injection=false; 

				 }else{
					header("Location: ../voir-plus-attente.php?ref_structure=".$_POST["ref_structure"]."&ref_adherent=".$_POST["ref_adherent"]."&ref_responsable=".$_POST["ref_responsable"]);
					$injection=true; 
					$_SESSION["Erreur"]="";
					session_destroy();
					  }
	
				if($injection==true){
					$enfant_adherent= new enfant_adherent;
					$enfant_adherent->ref_structure=$_POST["ref_structure"];
					$enfant_adherent->ref_adherent=$_POST["ref_adherent"];
					$enfant_adherent->suppression_enfant_adherent="false";
					
					$result=$enfant_adherent->Charger();
					
					$enfant_adherent->titre_enfant_adherent=$_SESSION["TitreEnfant"];
					$enfant_adherent->nom_enfant_adherent=$_SESSION["NomEnfant"];
					$enfant_adherent->prenom_enfant_adherent=$_SESSION["PrenomEnfant"];
					$enfant_adherent->naissance_enfant_adherent=$_SESSION["NaissanceEnfant"];
					$enfant_adherent->niveau_enfant_adherent=$_SESSION["NiveauEntrainement"];
					$enfant_adherent->nombre_cours_semaine_efant_adherent=$_SESSION["NbCoursSemaineEnfant"];
					if($result[0]["entrainement_choix1_enfant_adherent"]!=$_SESSION["Entrainement_choix1_enfant"] && $_SESSION["Entrainement_choix1_enfant"]!=""){$enfant_adherent->entrainement_choix1_enfant_adherent=$_SESSION["Entrainement_choix1_enfant"];}else{$enfant_adherent->entrainement_choix1_enfant_adherent=$result[0]["entrainement_choix1_enfant_adherent"];}
					if($result[0]["entrainement_choix2_enfant_adherent"]!=$_SESSION["Entrainement_choix2_enfant"] && $_SESSION["Entrainement_choix2_enfant"]!=""){$enfant_adherent->entrainement_choix2_enfant_adherent=$_SESSION["Entrainement_choix2_enfant"];}else{$enfant_adherent->entrainement_choix2_enfant_adherent=$result[0]["entrainement_choix2_enfant_adherent"];}
					if($result[0]["photo_enfant_adherent"]!=$_SESSION["PhotoFichierNameEnfant"] && $_SESSION["PhotoFichierNameEnfant"]!=""){$enfant_adherent->photo_enfant_adherent=$_SESSION["PhotoFichierNameEnfant"];}else{$enfant_adherent->photo_enfant_adherent=$result[0]["photo_enfant_adherent"];}
					if($result[0]["certificat_enfant_adherent"]!=$_SESSION["CertificatFichierNameEnfant"] && $_SESSION["CertificatFichierNameEnfant"]!=""){$enfant_adherent->certificat_enfant_adherent=$_SESSION["CertificatFichierNameEnfant"];}else{$enfant_adherent->certificat_enfant_adherent=$result[0]["certificat_enfant_adherent"];}
					$enfant_adherent->Modifier();
					
					$responsable_legal_adherent=new responsable_legal_adherent;
					$responsable_legal_adherent->ref_structure=$_POST["ref_structure"];
					$responsable_legal_adherent->ref_responsable_legal=$_POST["ref_responsable"];
					$responsable_legal_adherent->suppression_responsable_legal="false";
					
					$resultResponsable=$responsable_legal_adherent->Charger();
					
					$responsable_legal_adherent->titre_responsable_legal=$_SESSION["TitreResponsable"];
					$responsable_legal_adherent->prenom_responsable_legal=$_SESSION["PrenomResponsable"];
					$responsable_legal_adherent->nom_responsable_legal=$_SESSION["NomResponsable"];
					$responsable_legal_adherent->naissance_responsable_legal=$_SESSION["NaissanceResponsable"];
					
					$responsable_legal_adherent->nombre_enfant_responsable_legal=$resultResponsable[0]["nombre_enfant_responsable_legal"];
					$responsable_legal_adherent->date_suppression_responsbale_legal=$resultResponsable[0]["date_suppression_responsbale_legal"];
					$responsable_legal_adherent->Modifier();
					
					$contact_responsable_legal_adherent= new contact_responsable_legal_adherent;
					$contact_responsable_legal_adherent->ref_structure=$_POST["ref_structure"];
					$contact_responsable_legal_adherent->ref_responsable_legal=$_POST["ref_responsable"];
					$resultContactResponsable=$contact_responsable_legal_adherent->Charger();	
					
					$contact_responsable_legal_adherent->mail_responsable_legal=$_SESSION["MailResponsable"];
					$contact_responsable_legal_adherent->tel_portable_responsable_legal=$_SESSION["TelPortableResponsable"];
					$contact_responsable_legal_adherent->tel_fixe_responsable_legal=$resultContactResponsable[0]["tel_fixe_responsable_legal"];
					$contact_responsable_legal_adherent->Modifier();
					
					$equipement_adherent=new equipement_adherent;
					$equipement_adherent->ref_structure=$_POST["ref_structure"];
					$equipement_adherent->ref_adherent=$_POST["ref_adherent"];
					
					$resultEquipement=$equipement_adherent->Charger();
					
					$equipement_adherent->etat_dobok="Non distribue";
					$equipementTaille=explode(":",$_SESSION["EquipementDobok"]);
					$equipement_adherent->dobok=$equipementTaille[0];

					if(!empty($resultEquipement)){
					$equipement_adherent->Modifier();}else{
					$equipement_adherent->Ajouter();
					}
					
					if($_SESSION["EquipementDobok"]==""){
						$equipement_adherent->Supprimer();
					}
				}
			 
}