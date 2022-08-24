<?php

class ref_responsable_legal_adherent extends connexionBDD {
 		public $ref_structure;	
	    public $ref_responsable_legal;
	 
		public function Get_ref_responsable_legal (){
		  return $this ->ref_responsable_legal;
		}
	 
	 	public function creation_ref_responsable_legal($valeur_structure){
		$req = $this->connexion->prepare("SELECT COUNT(*) AS ID FROM responsable_legal_adherent");
		$req->execute();
		$numero = $req->fetch(PDO::FETCH_ASSOC);
		$idResponsableIncrement=$numero["ID"]+1;
		$substrStructure=substr($valeur_structure,0,2);
		$substrUniqId=substr(uniqid(),9,3);
		$ref=$substrStructure.$idResponsableIncrement."R".$substrUniqId;

		$bindage["ref_structure"]=$valeur_structure;
		$bindage["ref_responsable_legal"]=$ref;
		$req = $this->connexion->prepare("INSERT INTO responsable_legal_adherent (ref_structure,ref_responsable_legal) VALUES (:ref_structure,:ref_responsable_legal)");
		$req->execute($bindage);
			
		$req2 = $this->connexion->prepare("INSERT INTO adresse_responsable_legal_adherent (ref_structure,ref_responsable_legal) VALUES (:ref_structure,:ref_responsable_legal)");
		$req2->execute($bindage);
			
		$req3 = $this->connexion->prepare("INSERT INTO contact_responsable_legal_adherent (ref_structure,ref_responsable_legal) VALUES (:ref_structure,:ref_responsable_legal)");
		$req3->execute($bindage);
			
		$req4 = $this->connexion->prepare("INSERT INTO option_check_responsable_legal_adherent (ref_structure,ref_responsable_legal) VALUES (:ref_structure,:ref_responsable_legal)");
		$req4->execute($bindage);
			
		$this->ref_responsable_legal=$ref;
	}
	 
 }


 class ref_adherent_enfant extends connexionBDD {
	 public $id;
	 public $ref_structure;
	 public $ref_responsable_legal;
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
	 
	 public function creation_ref_adherent($valeur_structure,$idAdherent,$ref_responsable){
		$incrementID=$idAdherent+1;
		$substrStructure=substr($valeur_structure,0,2);
		$substrUniqId=substr(uniqid(),9,3);
		$ref=$substrStructure.$incrementID."A".$substrUniqId;
		$bindageAdherent["ref_structure"]=$valeur_structure;
		$bindageAdherent["ref_adherent"]=$ref;
		$bindageAdherent["date_creation_adherent"]=date("Y-m-d");
		$req = $this->connexion->prepare("INSERT INTO adherent (ref_structure,ref_adherent,date_creation_adherent) VALUES (:ref_structure,:ref_adherent,:date_creation_adherent)");
		$req->execute($bindageAdherent);
		$this->ref_adherent=$ref;
		
		$bindageEnfant["ref_structure"]=$valeur_structure;
		$bindageEnfant["ref_responsable_legal"]= $ref_responsable;
		$bindageEnfant["ref_adherent"]=$ref;
		$req2 = $this->connexion->prepare("INSERT INTO enfant_adherent (ref_structure,ref_responsable_legal,ref_adherent) VALUES (:ref_structure,:ref_responsable_legal,:ref_adherent)");
		$req2->execute($bindageEnfant);
		
		$bindageInscription["ref_structure"]=$valeur_structure;
		$bindageInscription["ref_adherent"]=$ref; 
		$req3 = $this->connexion->prepare("INSERT INTO inscription_adherent (ref_structure,ref_adherent) VALUES (:ref_structure,:ref_adherent)");
		$req3->execute($bindageInscription); 
	 } 
 }

class responsable_legal_adherent extends connexionBDD {
	
	public $ref_structure;	
	public $ref_responsable_legal;
	public $titre_responsable_legal; 	
	public $prenom_responsable_legal;	
	public $nom_responsable_legal;	
	public $naissance_responsable_legal; 	
	public $nombre_enfant_responsable_legal; 	
	public $suppression_responsable_legal;
	
	public function Ajouter(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_responsable_legal"]=$this->ref_responsable_legal;
		$bindage["titre_responsable_legal"]=$this->titre_responsable_legal;
		$bindage["prenom_responsable_legal"]=$this->prenom_responsable_legal;
		$bindage["nom_responsable_legal"]=$this->nom_responsable_legal;
		$bindage["naissance_responsable_legal"]=$this->naissance_responsable_legal;
		$bindage["nombre_enfant_responsable_legal"]=$this->nombre_enfant_responsable_legal;
		$bindage["suppression_responsable_legal"]=$this->suppression_responsable_legal;
		$req = $this->connexion->prepare("UPDATE responsable_legal_adherent SET titre_responsable_legal=:titre_responsable_legal, prenom_responsable_legal=:prenom_responsable_legal, nom_responsable_legal=:nom_responsable_legal, naissance_responsable_legal=:naissance_responsable_legal, nombre_enfant_responsable_legal=:nombre_enfant_responsable_legal, suppression_responsable_legal=:suppression_responsable_legal   WHERE ref_structure=:ref_structure AND ref_responsable_legal=:ref_responsable_legal");
		$req->execute($bindage);
	}
}

class enfant_adherent extends connexionBDD {
	
	public $ref_structure;	
	public $ref_responsable_legal;	
	public $ref_adherent;	
	public $titre_enfant_adherent;	
	public $prenom_enfant_adherent;	
	public $nom_enfant_adherent;	
	public $naissance_enfant_adherent;	
	public $niveau_enfant_adherent;	
	public $nombre_cours_semaine_efant_adherent;	
	public $entrainement_choix1_enfant_adherent;	
	public $entrainement_choix2_enfant_adherent;	
	public $photo_enfant_adherent;	
	public $certificat_enfant_adherent;	
	public $suppression_enfant_adherent;
	public $date_suppression_enfant_adherent;
	
	public function Ajouter(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_responsable_legal"]=$this->ref_responsable_legal;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$bindage["titre_enfant_adherent"]=$this->titre_enfant_adherent;
		$bindage["prenom_enfant_adherent"]=$this->prenom_enfant_adherent;
		$bindage["nom_enfant_adherent"]=$this->nom_enfant_adherent;
		$bindage["naissance_enfant_adherent"]=$this->naissance_enfant_adherent;
		$bindage["niveau_enfant_adherent"]=$this->niveau_enfant_adherent;
		$bindage["nombre_cours_semaine_efant_adherent"]=$this->nombre_cours_semaine_efant_adherent;
		$bindage["entrainement_choix1_enfant_adherent"]=$this->entrainement_choix1_enfant_adherent;
		$bindage["entrainement_choix2_enfant_adherent"]=$this->entrainement_choix2_enfant_adherent;
		$bindage["photo_enfant_adherent"]=$this->photo_enfant_adherent;
		$bindage["certificat_enfant_adherent"]=$this->certificat_enfant_adherent;
		$bindage["suppression_enfant_adherent"]=$this->suppression_enfant_adherent;
		$req = $this->connexion->prepare("UPDATE enfant_adherent SET titre_enfant_adherent=:titre_enfant_adherent,	prenom_enfant_adherent=:prenom_enfant_adherent,	nom_enfant_adherent=:nom_enfant_adherent, naissance_enfant_adherent=:naissance_enfant_adherent,	niveau_enfant_adherent=:niveau_enfant_adherent,	nombre_cours_semaine_efant_adherent=:nombre_cours_semaine_efant_adherent, entrainement_choix1_enfant_adherent=:entrainement_choix1_enfant_adherent,	entrainement_choix2_enfant_adherent=:entrainement_choix2_enfant_adherent, photo_enfant_adherent=:photo_enfant_adherent,	certificat_enfant_adherent=:certificat_enfant_adherent,	suppression_enfant_adherent=:suppression_enfant_adherent  WHERE ref_structure=:ref_structure AND ref_responsable_legal=:ref_responsable_legal AND ref_adherent=:ref_adherent");
		$req->execute($bindage);
	}
}

class adresse_responsable_legal_adherent extends connexionBDD {
	
	public $ref_structure; 	
	public $ref_responsable_legal; 	
	public $adresse_responsable_legal; 	
	public $cp_responsable_legal; 	
	public $ville_responsable_legal;
	
	public function Ajouter(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_responsable_legal"]=$this->ref_responsable_legal;
		$bindage["adresse_responsable_legal"]=$this->adresse_responsable_legal;
		$bindage["cp_responsable_legal"]=$this->cp_responsable_legal;
		$bindage["ville_responsable_legal"]=$this->ville_responsable_legal;
		$req = $this->connexion->prepare("UPDATE adresse_responsable_legal_adherent SET adresse_responsable_legal=:adresse_responsable_legal, cp_responsable_legal=:cp_responsable_legal, ville_responsable_legal=:ville_responsable_legal WHERE ref_structure=:ref_structure AND ref_responsable_legal=:ref_responsable_legal");
		$req->execute($bindage);
	}
	
}

class contact_responsable_legal_adherent extends connexionBDD {
	
	public $ref_structure; 	
	public $ref_responsable_legal; 	
	public $mail_responsable_legal; 	
	public $tel_portable_responsable_legal; 	
	public $tel_fixe_responsable_legal;
	
	public function Ajouter(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_responsable_legal"]=$this->ref_responsable_legal;
		$bindage["mail_responsable_legal"]=$this->mail_responsable_legal;
		$bindage["tel_portable_responsable_legal"]=$this->tel_portable_responsable_legal;
		$bindage["tel_fixe_responsable_legal"]=$this->tel_fixe_responsable_legal;
		$req = $this->connexion->prepare("UPDATE contact_responsable_legal_adherent SET mail_responsable_legal=:mail_responsable_legal,	tel_portable_responsable_legal=:tel_portable_responsable_legal, tel_fixe_responsable_legal=:tel_fixe_responsable_legal  WHERE ref_structure=:ref_structure AND ref_responsable_legal=:ref_responsable_legal");
		$req->execute($bindage);
	}
}

class option_check_responsable_legal_adherent extends connexionBDD {
	
	public $ref_structure; 	
	public $ref_responsable_legal; 	
	public $droit_image_responsable_legal; 	
	public $reglement_responsable_legal; 	
	public $licence_fftda_responsable_legal; 	
	public $offre_partenaire_responsable_legal; 
	
	public function Ajouter(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_responsable_legal"]=$this->ref_responsable_legal;
		$bindage["droit_image_responsable_legal"]=$this->droit_image_responsable_legal;
		$bindage["reglement_responsable_legal"]=$this->reglement_responsable_legal;
		$bindage["licence_fftda_responsable_legal"]=$this->licence_fftda_responsable_legal;
		$bindage["offre_partenaire_responsable_legal"]=$this->offre_partenaire_responsable_legal;
		$req = $this->connexion->prepare("UPDATE option_check_responsable_legal_adherent SET droit_image_responsable_legal=:droit_image_responsable_legal, reglement_responsable_legal=:reglement_responsable_legal, licence_fftda_responsable_legal=:licence_fftda_responsable_legal, offre_partenaire_responsable_legal=:offre_partenaire_responsable_legal WHERE ref_structure=:ref_structure AND ref_responsable_legal=:ref_responsable_legal");
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
		$bindage["type_adherent"]="enfant";
		$bindage["saison_adherent"]=$this->saison_adherent;
		$bindage["etat_adherent"]=$this->etat_adherent;
		$bindage["date_inscription_adherent"]=$this->date_inscription_adherent;
		$req = $this->connexion->prepare("UPDATE inscription_adherent SET type_adherent=:type_adherent, saison_adherent=:saison_adherent, etat_adherent=:etat_adherent, date_inscription_adherent=:date_inscription_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
		$req->execute($bindage);
	}
}