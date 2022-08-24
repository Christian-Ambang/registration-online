<?php 

class ref_adherent_adulte extends connexionBDD {
	public $id;
	public $ref_structure;
	public $ref_adherent;	
	public $date_creation_adherent;
	
	public function Get_id (){
		  return $this ->id;
	}
	
	public function Set_id (){
		
		$req = $this->connexion->prepare("SELECT COUNT(*) AS ID FROM adherent");
		$req->execute();
		$numero = $req->fetch(PDO::FETCH_ASSOC);
		$this ->id = $numero["ID"];
   }
	
   public function Get_ref_adherent (){
		return $this->ref_adherent;
   }
	
   public function creation_ref_adherent($valeur_structure,$idAdherent){
		$incrementID=$idAdherent+1;
		$substrStructure=substr($valeur_structure,0,2);
		$substrUniqId=substr(uniqid(),9,3);
		$ref=$substrStructure.$incrementID."A".$substrUniqId;
		$bindageAdherent["ref_structure"]=$valeur_structure;
		$bindageAdherent["ref_adherent"]=$ref;
		$bindageAdherent["date_creation_adherent"]=date("Y-m-d");
		$req = $this->connexion->prepare("INSERT INTO adherent (ref_structure,ref_adherent,date_creation_adherent) VALUES (:ref_structure,:ref_adherent,:date_creation_adherent)");
		$req->execute($bindageAdherent);
	   
	    $bindageAdulte["ref_structure"]=$valeur_structure;
		$bindageAdulte["ref_adherent"]=$ref;
		$req2 = $this->connexion->prepare("INSERT INTO adulte_adherent (ref_structure,ref_adherent) VALUES (:ref_structure,:ref_adherent)");
		$req2->execute($bindageAdulte);
	   
	    $bindageInscription["ref_structure"]=$valeur_structure;
		$bindageInscription["ref_adherent"]=$ref; 
		$req3 = $this->connexion->prepare("INSERT INTO inscription_adherent (ref_structure,ref_adherent) VALUES (:ref_structure,:ref_adherent)");
		$req3->execute($bindageInscription);
   
	    $bindageContact["ref_structure"]=$valeur_structure;
		$bindageContact["ref_adherent"]=$ref; 
		$req4 = $this->connexion->prepare("INSERT INTO contact_adulte_adherent (ref_structure,ref_adherent) VALUES (:ref_structure,:ref_adherent)");
		$req4->execute($bindageContact);
	   
	   	$bindageAdresse["ref_structure"]=$valeur_structure;
		$bindageAdresse["ref_adherent"]=$ref; 
		$req4 = $this->connexion->prepare("INSERT INTO adresse_adulte_adherent (ref_structure,ref_adherent) VALUES (:ref_structure,:ref_adherent)");
		$req4->execute($bindageAdresse);
	   
	   	$bindageOption["ref_structure"]=$valeur_structure;
		$bindageOption["ref_adherent"]=$ref; 
		$req5 = $this->connexion->prepare("INSERT INTO option_check_adulte_adherent (ref_structure,ref_adherent) VALUES (:ref_structure,:ref_adherent)");
		$req5->execute($bindageOption);

   		$this->ref_adherent=$ref;
   }

}

class adulte_adherent extends connexionBDD {
	
	public $ref_structure; 	
	public $ref_adherent; 	
	public $titre_adulte_adherent; 	
	public $prenom_adulte_adherent; 	
	public $nom_adulte_adherent; 	
	public $naissance_adulte_adherent; 	
	public $niveau_adulte_adherent; 	
	public $nb_cours_semaine_adulte_adherent; 	
	public $entrainement_choix1_adulte_adherent; 	
	public $entrainement_choix2_adulte_adherent; 	
	public $photo_adulte_adherent; 	
	public $certificat_adulte_adherent; 	
	public $suppression_adulte_adherent;
	public $date_suppression_adulte_adherent;
	
	public function Ajouter(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$bindage["titre_adulte_adherent"]=$this->titre_adulte_adherent;
		$bindage["prenom_adulte_adherent"]=$this->prenom_adulte_adherent;
		$bindage["nom_adulte_adherent"]=$this->nom_adulte_adherent;
		$bindage["naissance_adulte_adherent"]=$this->naissance_adulte_adherent;
		$bindage["niveau_adulte_adherent"]=$this->niveau_adulte_adherent;
		$bindage["nb_cours_semaine_adulte_adherent"]=$this->nb_cours_semaine_adulte_adherent;
		$bindage["entrainement_choix1_adulte_adherent"]=$this->entrainement_choix1_adulte_adherent;
		$bindage["entrainement_choix2_adulte_adherent"]=$this->entrainement_choix2_adulte_adherent;
		$bindage["photo_adulte_adherent"]=$this->photo_adulte_adherent;
		$bindage["certificat_adulte_adherent"]=$this->certificat_adulte_adherent;
		$bindage["suppression_adulte_adherent"]=$this->suppression_adulte_adherent;
		$req = $this->connexion->prepare("UPDATE adulte_adherent SET titre_adulte_adherent=:titre_adulte_adherent, prenom_adulte_adherent=:prenom_adulte_adherent, nom_adulte_adherent=:nom_adulte_adherent, naissance_adulte_adherent=:naissance_adulte_adherent, niveau_adulte_adherent=:niveau_adulte_adherent, nb_cours_semaine_adulte_adherent=:nb_cours_semaine_adulte_adherent, entrainement_choix1_adulte_adherent=:entrainement_choix1_adulte_adherent, entrainement_choix2_adulte_adherent=:entrainement_choix2_adulte_adherent, photo_adulte_adherent=:photo_adulte_adherent, certificat_adulte_adherent=:certificat_adulte_adherent, suppression_adulte_adherent=:suppression_adulte_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
		$req->execute($bindage);	
	}
	
}

class inscription_adherent extends connexionBDD {
	public $ref_structure; 	
	public $ref_adherent;
	public $type_adherent;
	public $saison_adherent; 	
	public $etat_adherent; 	
	public $date_inscription_adherent; 	
	public $date_validation_adherent;
	
	public function Ajouter(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$bindage["type_adherent"]="adulte";
		$bindage["saison_adherent"]=$this->saison_adherent;
		$bindage["etat_adherent"]=$this->etat_adherent;
		$bindage["date_inscription_adherent"]=$this->date_inscription_adherent;
		$req = $this->connexion->prepare("UPDATE inscription_adherent SET type_adherent=:type_adherent, saison_adherent=:saison_adherent, etat_adherent=:etat_adherent, date_inscription_adherent=:date_inscription_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
		$req->execute($bindage);
	}
}

class contact_adulte_adherent extends connexionBDD {
	public $ref_structure; 	
	public $ref_adherent; 	
	public $mail_adulte_adherent; 	
	public $tel_portable_adulte_adherent; 	
	public $tel_fixe_adulte_adherent; 	
	public $nom_urgence_adulte_adherent; 	
	public $prenom_urgence_adulte_adherent; 	
	public $tel_urgence_adulte_adherent;
	
	public function Ajouter(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$bindage["mail_adulte_adherent"]=$this->mail_adulte_adherent;
		$bindage["tel_portable_adulte_adherent"]=$this->tel_portable_adulte_adherent;
		$bindage["tel_fixe_adulte_adherent"]=$this->tel_fixe_adulte_adherent;
		$bindage["nom_urgence_adulte_adherent"]=$this->nom_urgence_adulte_adherent;
		$bindage["prenom_urgence_adulte_adherent"]=$this->prenom_urgence_adulte_adherent;
		$bindage["tel_urgence_adulte_adherent"]=$this->tel_urgence_adulte_adherent;
		$req = $this->connexion->prepare("UPDATE contact_adulte_adherent SET mail_adulte_adherent=:mail_adulte_adherent, tel_portable_adulte_adherent=:tel_portable_adulte_adherent, tel_fixe_adulte_adherent=:tel_fixe_adulte_adherent, nom_urgence_adulte_adherent=:nom_urgence_adulte_adherent, 	prenom_urgence_adulte_adherent=:prenom_urgence_adulte_adherent, tel_urgence_adulte_adherent=:tel_urgence_adulte_adherent  WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
		$req->execute($bindage);	
	}
}


class adresse_adulte_adherent extends connexionBDD {
	public $ref_structure; 	
	public $ref_adherent; 	
	public $adresse_adulte_adherent; 	
	public $cp_adulte_adherent; 	
	public $ville_adulte_adherent; 
	
	public function Ajouter(){
	$bindage["ref_structure"]=$this->ref_structure;
	$bindage["ref_adherent"]=$this->ref_adherent;
	$bindage["adresse_adulte_adherent"]=$this->adresse_adulte_adherent;
	$bindage["cp_adulte_adherent"]=$this->cp_adulte_adherent;
	$bindage["ville_adulte_adherent"]=$this->ville_adulte_adherent;
	$req = $this->connexion->prepare("UPDATE adresse_adulte_adherent SET adresse_adulte_adherent=:adresse_adulte_adherent, cp_adulte_adherent=:cp_adulte_adherent, ville_adulte_adherent=:ville_adulte_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
	$req->execute($bindage);
	}
}

class option_check_adulte_adherent extends connexionBDD {
	
	public $ref_structure; 	
	public $ref_adherent; 	
	public $droit_image_adulte_adherent; 	
	public $reglement_adulte_adherent; 	
	public $licence_fftda_adulte_adherent; 	
	public $offre_partenaire_adulte_adherent; 	
	
	public function Ajouter(){
	$bindage["ref_structure"]=$this->ref_structure;
	$bindage["ref_adherent"]=$this->ref_adherent;
	$bindage["droit_image_adulte_adherent"]=$this->droit_image_adulte_adherent;
	$bindage["reglement_adulte_adherent"]=$this->reglement_adulte_adherent;
	$bindage["licence_fftda_adulte_adherent"]=$this->licence_fftda_adulte_adherent;
	$bindage["offre_partenaire_adulte_adherent"]=$this->offre_partenaire_adulte_adherent;
	$req = $this->connexion->prepare("UPDATE option_check_adulte_adherent SET droit_image_adulte_adherent=:droit_image_adulte_adherent, reglement_adulte_adherent=:reglement_adulte_adherent, licence_fftda_adulte_adherent=:licence_fftda_adulte_adherent, offre_partenaire_adulte_adherent=:offre_partenaire_adulte_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
	$req->execute($bindage);	
	}	
}

class equipement_adherent extends connexionBDD {
	
	public $ref_structure; 	
	public $ref_adherent; 	
	public $dobok; 	
	public $etat_dobok; 
	
	public function Ajouter_ref_equipement_adherent(){
		
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$req = $this->connexion->prepare("INSERT INTO equipement_adherent (ref_structure,ref_adherent) VALUES (:ref_structure,:ref_adherent)");
		$req->execute($bindage);
	}
	
	public function AjouterDobok(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$bindage["dobok"]=$this->dobok;
		$bindage["etat_dobok"]=$this->etat_dobok;
		$req = $this->connexion->prepare("UPDATE equipement_adherent SET dobok=:dobok, etat_dobok=:etat_dobok WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
		$req->execute($bindage);
	}
		
}