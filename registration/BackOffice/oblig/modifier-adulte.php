<?php session_start();
include_once("../../parametres.php");
include_once("../class/connexion_bdd.php");
include_once("../class/class_backoffice_structure.php");
if(isset($_POST["page-provenance-back-office"]) && $_POST["page-provenance-back-office"]=="modifier-adherent-adulte"){
					
				/*ENFANT*/
				$_SESSION["TitreAdulte"]=$_POST["titreAdulte"];
				$_SESSION["NomAdulte"]=trim($_POST["nomAdulte"]);
				$_SESSION["PrenomAdulte"]=trim($_POST["prenomAdulte"]);
				$_SESSION["NaissanceAdulte"]=trim($_POST["naissanceAdulte"]);
				$_SESSION["Niveau"]=trim($_POST["niveau"]);
				$_SESSION["NbCoursSemaineAdulte"]=$_POST["nbCoursSemaineAdulte"];
				$_SESSION["Entrainement_choix1"]=$_POST["entrainement_choix1"];
				$_SESSION["Entrainement_choix2"]=$_POST["entrainement_choix2"];
				$_SESSION["Choix_Equipement_Dobok_adulte"]=$_POST["choix_Equipement_Dobok_adulte"];
				$_SESSION["ChoixEquipementTotal"]=$_POST["choixEquipementTotal"];
				$_SESSION["ChoixEquipement"].=$_POST["choixEquipementTotal"];
				/*ENFANT*/
	
	
				/*EQUIPEMENT*/
				$_SESSION["EquipementDobok"]=$_POST["equipementDobok"];
				/*EQUIPEMENT*/
		
				/*==========Input file name photo=================*/
						$_SESSION["PhotoAdulte"]=$_FILES["photoAdulte"];
						//uploadFichier(name input, name dossier, name fichier, extentions autorisés)
						$photo = uploadFichier("photoAdulte","uploadPhotos",$_POST["nomAdulte"],array('jpg','png','jpeg'),$_SESSION["compteurAdulte"],$URI_SERVEUR);		

						// Verification du bon upload de l'image
						$_SESSION["PhotoStatuUploadAdulte"]=$photo[0];
						if($_SESSION["PhotoStatuUploadAdulte"]=="ok"){$e=1;
						// Le nom du fichier final sur le serveur
							$_SESSION["PhotoFichierNameAdulte"]=$photo[1];

															   }
						$_SESSION["compteurAdulte"]= $_SESSION["compteurAdulte"]+$e;
						// Le nom du fichier final sur le serveur
						//$_SESSION["PhotoFichierNameAdulte".$i]=$photo[1];
						// Test de l'extention du fichier
						$_SESSION["PhotoExtentionAdulte"]= $photo[2];
				/*==========Input file name photo=================*/
				
				/*==========Input file name Certificat=================*/
						$_SESSION["CertificatAdulte"]=$_FILES["certificatAdulte"];
						//uploadFichier(name input, name dossier, name fichier, extentions autorisés)
						$certificat = uploadFichier("certificatAdulte","uploadCertificat",$_POST["nomAdulte"],array('jpg','png','jpeg','pdf'),$_SESSION["compteurCertificatAdulte"],$URI_SERVEUR);		
						// Verification du bon upload de l'image
						$_SESSION["CertificatStatuUploadAdulte"]=$certificat[0];
						if($_SESSION["CertificatStatuUploadAdulte"]=="ok"){$e=1;
						// Le nom du fichier final sur le serveur
						$_SESSION["CertificatFichierNameAdulte"]=$certificat[1];
																	}
						$_SESSION["compteurCertificatAdulte"]= $_SESSION["compteurCertificatAdulte"]+$e;
						// Le nom du fichier final sur le serveur
						//$_SESSION["CertificatFichierNameAdulte".$i]=$certificat[1];
						// Test de l'extention du fichier
						$_SESSION["CertificatExtentionAdulte"]= $certificat[2];
			/*==========Input file name Certificat=================*/
			
			/*==========Choix Créneaux==========*/
			$_SESSION["entrainementChoix"]=false;
			if($_POST["entrainement_choix1"]=="" || $_POST["entrainement_choix2"]=="" && $_POST["niveau"]=="self_defense")
			{$_SESSION["entrainementChoix"]=false;}else 
			if($_POST["entrainement_choix1"]!="" && $_POST["entrainement_choix2"]!="" && $_POST["niveau"]=="self_defense")
			{$_SESSION["entrainementChoix"]=true;}	

			if(($_POST["entrainement_choix1"]=="" && $_POST["entrainement_choix2"]=="") && ($_POST["niveau"]=="adultes" || $_POST["niveau"]=="competition_adultes"))
			{$_SESSION["entrainementChoix"]=true;}
			/*==========Choix Créneaux==========*/

				
				if( $_POST["titreAdulte"]=="" 
				   || trim($_POST["nomAdulte"])=="" 
				   || trim($_POST["prenomAdulte"])=="" 
				   || trim($_POST["naissanceAdulte"])=="" 
				   || $_POST["niveau"]=="" 
				   || $_SESSION["entrainementChoix"]==false
				   || $_POST["nbCoursSemaineAdulte"]=="" 
				   || chaineTexte(trim($_POST["nomAdulte"]),2,40)==false 
				   || chaineTexte(trim($_POST["prenomAdulte"]),2,40)==false 
				   || chaineDate(trim($_POST["naissanceAdulte"]))==false
				  ) 
				 {
					header("Location: ../modifier-adherent-adulte.php?ref_structure=".$_POST["ref_structure"]."&ref_adherent=".$_POST["ref_adherent"]);
					$_SESSION["Erreur"]="erreurDiv";
					$_SESSION["ChoixEquipement"]="";
					$injection=false; 

				 }else{
					header("Location: ../voir-plus-attente-adulte.php?ref_structure=".$_POST["ref_structure"]."&ref_adherent=".$_POST["ref_adherent"]);
					$injection=true; 
					$_SESSION["Erreur"]="";
					session_destroy();
					  }
	
				if($injection==true){
					$adulte_adherent= new adulte_adherent;
					$adulte_adherent->ref_structure=$_POST["ref_structure"];
					$adulte_adherent->ref_adherent=$_POST["ref_adherent"];
					$adulte_adherent->suppression_adulte_adherent="false";
					
					$result=$adulte_adherent->Charger();
					$adulte_adherent->titre_adulte_adherent=$_SESSION["TitreAdulte"];
					$adulte_adherent->nom_adulte_adherent=$_SESSION["NomAdulte"];
					$adulte_adherent->prenom_adulte_adherent=$_SESSION["PrenomAdulte"];
					$adulte_adherent->naissance_adulte_adherent=$_SESSION["NaissanceAdulte"];
					$adulte_adherent->niveau_adulte_adherent=$_SESSION["Niveau"];
					$adulte_adherent->nb_cours_semaine_adulte_adherent=$_SESSION["NbCoursSemaineAdulte"];
					if($result[0]["entrainement_choix1_adulte_adherent"]!=$_SESSION["Entrainement_choix1"] && $_SESSION["Entrainement_choix1"]!=""){$adulte_adherent->entrainement_choix1_adulte_adherent=$_SESSION["Entrainement_choix1"];}
					//else{$adulte_adherent->entrainement_choix1_adulte_adherent=$result[0]["entrainement_choix1_adulte_adherent"];}
					if($result[0]["entrainement_choix2_adulte_adherent"]!=$_SESSION["Entrainement_choix2"] && $_SESSION["Entrainement_choix2"]!=""){$adulte_adherent->entrainement_choix2_adulte_adherent=$_SESSION["Entrainement_choix2"];}
					//else{$adulte_adherent->entrainement_choix2_adulte_adherent=$result[0]["entrainement_choix2_adulte_adherent"];}
					if($result[0]["photo_adulte_adherent"]!=$_SESSION["PhotoFichierNameAdulte"] && $_SESSION["PhotoFichierNameAdulte"]!=""){$adulte_adherent->photo_adulte_adherent=$_SESSION["PhotoFichierNameAdulte"];}else{$adulte_adherent->photo_adulte_adherent=$result[0]["photo_adulte_adherent"];}
					if($result[0]["certificat_adulte_adherent"]!=$_SESSION["CertificatFichierNameAdulte"] && $_SESSION["CertificatFichierNameAdulte"]!=""){$adulte_adherent->certificat_adulte_adherent=$_SESSION["CertificatFichierNameAdulte"];}else{$adulte_adherent->certificat_adulte_adherent=$result[0]["certificat_adulte_adherent"];}
					$adulte_adherent->Modifier();
					
										
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