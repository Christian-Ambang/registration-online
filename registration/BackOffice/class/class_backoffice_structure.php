<?php

class administrateur extends connexionBDD { 
	public $ref_structure;
	public $saison_courante;
	
	public function Get_saison_courante(){
		return $this->saison_courante;
	}
	
	public function Set_saison_courante() {
		$bindage["ref_structure"]=$this->ref_structure;
		$req = $this->connexion->prepare("SELECT saison AS saison_courante FROM administrateur WHERE ref_structure=:ref_structure");
		$req->execute($bindage);
		$result=$req->fetch(PDO::FETCH_ASSOC);
		$this->saison_courante=$result["saison_courante"];
	}
} 

class inscription_adherent extends connexionBDD {
 	  
		public $ref_structure;	
		public $type_adherent;	
		public $saison_adherent;	
		public $etat_adherent;	
		public $ref_adherent;	
		public $date_inscription_adherent;	
		public $date_validation_adherent;	
	
		public function Charger_ref_adherent_Attente($type,$etat){
			$bindage["ref_structure"]=$this->ref_structure;
			$bindage["type_adherent"]=$type;
			$bindage["saison_adherent"]=$this->saison_adherent;
			$bindage["etat_adherent"]=$etat;
			
			$req = $this->connexion->prepare("SELECT ref_adherent FROM inscription_adherent WHERE ref_structure=:ref_structure AND etat_adherent=:etat_adherent AND saison_adherent=:saison_adherent AND type_adherent=:type_adherent ORDER BY ref_adherent DESC");
			$req->execute($bindage);
			$result=$req->fetchAll(PDO::FETCH_ASSOC);
				return $result;
		}
	
		public function Inscrire_Adherent(){
			$bindage["ref_structure"]=$this->ref_structure;
			$bindage["ref_adherent"]=$this->ref_adherent;
			$bindage["saison_adherent"]=$this->saison_adherent;
			$bindage["etat_adherent"]="Inscrit";
			$bindage["date_validation_adherent"]=$this->date_validation_adherent;
			
			$req = $this->connexion->prepare("UPDATE inscription_adherent SET etat_adherent=:etat_adherent, date_validation_adherent=:date_validation_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent AND saison_adherent=:saison_adherent ");
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

	public function Charger(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$bindage["suppression_enfant_adherent"]=$this->suppression_enfant_adherent;
			
		$req = $this->connexion->prepare("SELECT * FROM enfant_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent AND suppression_enfant_adherent=:suppression_enfant_adherent");
		$req->execute($bindage);
		$result=$req->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function Modifier(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$bindage["titre_enfant_adherent"]=$this->titre_enfant_adherent;
		$bindage["nom_enfant_adherent"]=$this->nom_enfant_adherent;
		$bindage["prenom_enfant_adherent"]=$this->prenom_enfant_adherent;
		$bindage["naissance_enfant_adherent"]=$this->naissance_enfant_adherent;
		$bindage["niveau_enfant_adherent"]=$this->niveau_enfant_adherent;
		$bindage["nombre_cours_semaine_efant_adherent"]=$this->nombre_cours_semaine_efant_adherent;
		$bindage["entrainement_choix1_enfant_adherent"]=$this->entrainement_choix1_enfant_adherent;
		$bindage["entrainement_choix2_enfant_adherent"]=$this->entrainement_choix2_enfant_adherent;
		$bindage["photo_enfant_adherent"]=$this->photo_enfant_adherent;	
		$bindage["certificat_enfant_adherent"]=$this->certificat_enfant_adherent;
		
		$req = $this->connexion->prepare("UPDATE enfant_adherent SET titre_enfant_adherent=:titre_enfant_adherent, nom_enfant_adherent=:nom_enfant_adherent, prenom_enfant_adherent=:prenom_enfant_adherent,  naissance_enfant_adherent=:naissance_enfant_adherent, niveau_enfant_adherent=:niveau_enfant_adherent, nombre_cours_semaine_efant_adherent=:nombre_cours_semaine_efant_adherent,entrainement_choix1_enfant_adherent=:entrainement_choix1_enfant_adherent, entrainement_choix2_enfant_adherent=:entrainement_choix2_enfant_adherent, photo_enfant_adherent=:photo_enfant_adherent, certificat_enfant_adherent=:certificat_enfant_adherent  WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
		$req->execute($bindage);
	}
	
	public function Supprimer(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$bindage["suppression_enfant_adherent"]="true";
		$bindage["date_suppression_enfant_adherent"]=$this->date_suppression_enfant_adherent;
		
		$req = $this->connexion->prepare("UPDATE enfant_adherent SET suppression_enfant_adherent=:suppression_enfant_adherent, date_suppression_enfant_adherent=:date_suppression_enfant_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
		$req->execute($bindage);
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
	public $date_suppression_responsbale_legal;

	public function Charger(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_responsable_legal"]=$this->ref_responsable_legal;
		$bindage["suppression_responsable_legal"]=$this->suppression_responsable_legal;
		
		$req = $this->connexion->prepare("SELECT * FROM responsable_legal_adherent WHERE ref_structure=:ref_structure AND ref_responsable_legal=:ref_responsable_legal AND suppression_responsable_legal=:suppression_responsable_legal");
		$req->execute($bindage);
		$result=$req->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function Modifier(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_responsable_legal"]=$this->ref_responsable_legal;
		$bindage["suppression_responsable_legal"]=$this->suppression_responsable_legal;
		$bindage["titre_responsable_legal"]=$this->titre_responsable_legal;
		$bindage["prenom_responsable_legal"]=$this->prenom_responsable_legal;
		$bindage["nom_responsable_legal"]=$this->nom_responsable_legal;
		$bindage["naissance_responsable_legal"]=$this->naissance_responsable_legal;
		$bindage["nombre_enfant_responsable_legal"]=$this->nombre_enfant_responsable_legal;
		$bindage["date_suppression_responsbale_legal"]=$this->date_suppression_responsbale_legal;
		
		$req = $this->connexion->prepare("UPDATE responsable_legal_adherent SET titre_responsable_legal=:titre_responsable_legal,prenom_responsable_legal=:prenom_responsable_legal,nom_responsable_legal=:nom_responsable_legal,naissance_responsable_legal=:naissance_responsable_legal,nombre_enfant_responsable_legal=:nombre_enfant_responsable_legal,date_suppression_responsbale_legal=:date_suppression_responsbale_legal   WHERE ref_structure=:ref_structure AND ref_responsable_legal=:ref_responsable_legal AND suppression_responsable_legal=:suppression_responsable_legal");
		$req->execute($bindage);
	}
	
}


class contact_responsable_legal_adherent extends connexionBDD {

	public $ref_structure;	
	public $ref_responsable_legal;	
	public $mail_responsable_legal;	
	public $tel_portable_responsable_legal;	
	public $tel_fixe_responsable_legal;
	
	public function Charger(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_responsable_legal"]=$this->ref_responsable_legal;
		
		$req = $this->connexion->prepare("SELECT * FROM contact_responsable_legal_adherent WHERE ref_structure=:ref_structure AND ref_responsable_legal=:ref_responsable_legal");
		$req->execute($bindage);
		$result=$req->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function Modifier(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_responsable_legal"]=$this->ref_responsable_legal;		
		$bindage["mail_responsable_legal"]=$this->mail_responsable_legal;		
		$bindage["tel_portable_responsable_legal"]=$this->tel_portable_responsable_legal;		
		$bindage["tel_fixe_responsable_legal"]=$this->tel_fixe_responsable_legal;		
		
		$req = $this->connexion->prepare("UPDATE contact_responsable_legal_adherent SET mail_responsable_legal=:mail_responsable_legal,tel_portable_responsable_legal=:tel_portable_responsable_legal,tel_fixe_responsable_legal=:tel_fixe_responsable_legal WHERE ref_structure=:ref_structure AND ref_responsable_legal=:ref_responsable_legal");
		$req->execute($bindage);
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
	
	public function Charger(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$bindage["suppression_adulte_adherent"]=$this->suppression_adulte_adherent;
			
		$req = $this->connexion->prepare("SELECT * FROM adulte_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent AND suppression_adulte_adherent=:suppression_adulte_adherent");
		$req->execute($bindage);
		$result=$req->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function Modifier(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
		$bindage["titre_adulte_adherent"]=$this->titre_adulte_adherent;
		$bindage["nom_adulte_adherent"]=$this->nom_adulte_adherent;
		$bindage["prenom_adulte_adherent"]=$this->prenom_adulte_adherent;
		$bindage["naissance_adulte_adherent"]=$this->naissance_adulte_adherent;
		$bindage["niveau_adulte_adherent"]=$this->niveau_adulte_adherent;
		$bindage["nb_cours_semaine_adulte_adherent"]=$this->nb_cours_semaine_adulte_adherent;
		$bindage["entrainement_choix1_adulte_adherent"]=$this->entrainement_choix1_adulte_adherent;
		$bindage["entrainement_choix2_adulte_adherent"]=$this->entrainement_choix2_adulte_adherent;
		$bindage["photo_adulte_adherent"]=$this->photo_adulte_adherent;	
		$bindage["certificat_adulte_adherent"]=$this->certificat_adulte_adherent;
		
		$req = $this->connexion->prepare("UPDATE adulte_adherent SET titre_adulte_adherent=:titre_adulte_adherent, nom_adulte_adherent=:nom_adulte_adherent, prenom_adulte_adherent=:prenom_adulte_adherent,  naissance_adulte_adherent=:naissance_adulte_adherent, niveau_adulte_adherent=:niveau_adulte_adherent, nb_cours_semaine_adulte_adherent=:nb_cours_semaine_adulte_adherent,entrainement_choix1_adulte_adherent=:entrainement_choix1_adulte_adherent, entrainement_choix2_adulte_adherent=:entrainement_choix2_adulte_adherent, photo_adulte_adherent=:photo_adulte_adherent, certificat_adulte_adherent=:certificat_adulte_adherent  WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
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
	
	public function Charger(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["ref_adherent"]=$this->ref_adherent;
			
		$req = $this->connexion->prepare("SELECT * FROM contact_adulte_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
		$req->execute($bindage);
		$result=$req->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}


class equipement_adherent extends connexionBDD {
		
		public $ref_structure;
		public $ref_adherent;
		public $dobok;
		public $etat_dobok;
	
		public function Charger(){
			$bindage["ref_structure"]=$this->ref_structure;
			$bindage["ref_adherent"]=$this->ref_adherent;

			$req = $this->connexion->prepare("SELECT * FROM equipement_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
			$req->execute($bindage);
			$result=$req->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
	
		public function Modifier(){
			$bindage["ref_structure"]=$this->ref_structure;
			$bindage["ref_adherent"]=$this->ref_adherent;
			$bindage["dobok"]=$this->dobok;
			$bindage["etat_dobok"]=$this->etat_dobok;
		
			$req = $this->connexion->prepare("UPDATE equipement_adherent SET dobok=:dobok,etat_dobok=:etat_dobok WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
			$req->execute($bindage);
		}
	
		public function Ajouter(){
			$bindage["ref_structure"]=$this->ref_structure;
			$bindage["ref_adherent"]=$this->ref_adherent;
			$bindage["dobok"]=$this->dobok;
			$bindage["etat_dobok"]=$this->etat_dobok;
		
			$req = $this->connexion->prepare("INSERT INTO equipement_adherent (ref_structure,ref_adherent,dobok,etat_dobok) VALUES (:ref_structure,:ref_adherent,:dobok,:etat_dobok)");
			$req->execute($bindage);
		}
	
	  public function Supprimer(){
		  $bindage["ref_structure"]=$this->ref_structure;
		  $bindage["ref_adherent"]=$this->ref_adherent;
	 
	  	  $req = $this->connexion->prepare("DELETE FROM equipement_adherent WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
		  $req->execute($bindage);
	  }
	
	  public function Distribue(){
		  	$bindage["ref_structure"]=$this->ref_structure;
			$bindage["ref_adherent"]=$this->ref_adherent;
			$bindage["etat_dobok"]=$this->etat_dobok;
		
			$req = $this->connexion->prepare("UPDATE equipement_adherent SET etat_dobok=:etat_dobok WHERE ref_structure=:ref_structure AND ref_adherent=:ref_adherent");
			$req->execute($bindage);
	  }
	
} 


class voir_attente extends connexionBDD {
	public function tabDataEnfant($ref_structure){
		$administrateur=new administrateur;
		$administrateur->ref_structure=$ref_structure;
		$administrateur->Set_saison_courante();
		$saison_courante=$administrateur->Get_saison_courante();
			
		$inscription_adherent=new inscription_adherent;
		$inscription_adherent->ref_structure= $ref_structure;
		$inscription_adherent->saison_adherent= $saison_courante;
		$resultat=$inscription_adherent->Charger_ref_adherent_Attente("enfant","En attente");
			
		$enfant_adherent=new enfant_adherent;
		$enfant_adherent->ref_structure=$ref_structure;
		$enfant_adherent->suppression_enfant_adherent="false";
		$i=1;
		
		$equipement_adherent=new equipement_adherent;
		$equipement_adherent->ref_structure=$ref_structure;
		
		$rechercher=["ToutNiveau","Competiteur"];
		$remplacer=["Tout niveau","Compétiteur"];
		
		foreach($resultat as $key=>$value){
				$enfant_adherent->ref_adherent=$value["ref_adherent"];
				$result=$enfant_adherent->Charger();
			
				$equipement_adherent->ref_adherent=$value["ref_adherent"];	
				$result2=$equipement_adherent->Charger();	
			
		if(!empty($result)){
		?>	
			<tr class="corps">
			<td><?php echo $i++; ?></td>
			<td><?php echo $result[0]["ref_adherent"]; ?></td>
			<td><?php echo $result[0]["titre_enfant_adherent"]; ?></td>
			<td><?php echo $result[0]["nom_enfant_adherent"]; ?></td>
			<td><?php echo $result[0]["prenom_enfant_adherent"]; ?></td>
			<td><?php echo $result[0]["naissance_enfant_adherent"]; ?></td>
			<td><?php echo str_replace($rechercher,$remplacer,$result[0]["niveau_enfant_adherent"]); ?></td>
			<td><?php echo $result[0]["entrainement_choix1_enfant_adherent"]; ?></td>
			<td><?php echo $result[0]["entrainement_choix2_enfant_adherent"]; ?></td>
			<td><?php if(empty($result2)){echo "Aucun";}else{echo "Oui";} ?></td>
			<td><?php echo $result[0]["ref_responsable_legal"]; ?></td>
			<td><a href="voir-plus-attente.php?ref_structure=<?php echo $result[0]["ref_structure"]; ?>&ref_adherent=<?php echo $result[0]["ref_adherent"]; ?>&ref_responsable=<?php echo $result[0]["ref_responsable_legal"] ?>" target="_self">+</a></td>
			</tr>
		<?php 
			}
		}
	}
	
	public function tabDataAdulte($ref_structure){
		$administrateur=new administrateur;
		$administrateur->ref_structure=$ref_structure;
		$administrateur->Set_saison_courante();
		$saison_courante=$administrateur->Get_saison_courante();
			
		$inscription_adherent=new inscription_adherent;
		$inscription_adherent->ref_structure= $ref_structure;
		$inscription_adherent->saison_adherent= $saison_courante;
		$resultat=$inscription_adherent->Charger_ref_adherent_Attente("adulte","En attente");
			
		$adulte_adherent=new adulte_adherent;
		$adulte_adherent->ref_structure=$ref_structure;
		$adulte_adherent->suppression_adulte_adherent="false";
		$i=1;
		
		$equipement_adherent=new equipement_adherent;
		$equipement_adherent->ref_structure=$ref_structure;
		
		$rechercher=["self_defense","adultes","competition_adultes"];
		$remplacer=["Self défense","Adultes","Compétition adultes"];
		
		foreach($resultat as $key=>$value){
				$adulte_adherent->ref_adherent=$value["ref_adherent"];
				$result=$adulte_adherent->Charger();
			
				$equipement_adherent->ref_adherent=$value["ref_adherent"];	
				$result2=$equipement_adherent->Charger();	
			
		if(!empty($result)){
		?>	
			<tr class="corps">
			<td><?php echo $i++; ?></td>
			<td><?php echo $result[0]["ref_adherent"]; ?></td>
			<td><?php echo $result[0]["titre_adulte_adherent"]; ?></td>
			<td><?php echo $result[0]["nom_adulte_adherent"]; ?></td>
			<td><?php echo $result[0]["prenom_adulte_adherent"]; ?></td>
			<td><?php echo $result[0]["naissance_adulte_adherent"]; ?></td>
			<td><?php echo str_replace($rechercher,$remplacer,$result[0]["niveau_adulte_adherent"]); ?></td>
			<td><?php echo str_replace($rechercher,$remplacer,$result[0]["entrainement_choix1_adulte_adherent"]); ?></td>
			<td><?php echo str_replace($rechercher,$remplacer,$result[0]["entrainement_choix2_adulte_adherent"]); ?></td>
			<td><?php if(empty($result2)){echo "Aucun";}else{echo "Oui";} ?></td>
			<td><a href="voir-plus-attente-adulte.php?ref_structure=<?php echo $result[0]["ref_structure"]; ?>&ref_adherent=<?php echo $result[0]["ref_adherent"]; ?>" target="_self">+</a></td>
			</tr>
		<?php 
			}
		}
	}
}


class voir_plus_attente extends connexionBDD {
	
	public function tabDataEnfantVoirPLusInfo ($ref_structure,$ref_adherent){
		$enfant_adherent = new enfant_adherent;
		$enfant_adherent->ref_structure=$ref_structure;
		$enfant_adherent->ref_adherent=$ref_adherent;
		$enfant_adherent->suppression_enfant_adherent="false";
		$result=$enfant_adherent->Charger(); ?>
		<tr><td>Titre:</td><td><?php echo $result[0]["titre_enfant_adherent"]; ?></td></tr>
		<tr><td>Prénom:</td><td><?php echo $result[0]["prenom_enfant_adherent"]; ?></td></tr>
		<tr><td>Nom:</td><td><?php echo $result[0]["nom_enfant_adherent"]; ?></td></tr>
		<tr><td>Naissance:</td><td><?php echo $result[0]["naissance_enfant_adherent"]; ?></td></tr>
	<?php } 
	
	public function tabDataEnfantVoirPLusResponsable ($ref_structure,$ref_responsable){
		$responsable_legal_adherent = new responsable_legal_adherent;
		$responsable_legal_adherent->ref_structure=$ref_structure;
		$responsable_legal_adherent->ref_responsable_legal=$ref_responsable;
		$responsable_legal_adherent->suppression_responsable_legal="false";
		$result=$responsable_legal_adherent->Charger(); 
		$contact_responsable_legal_adherent= new contact_responsable_legal_adherent;
		$contact_responsable_legal_adherent->ref_structure=$ref_structure;
		$contact_responsable_legal_adherent->ref_responsable_legal=$ref_responsable;
		$resultContact=$contact_responsable_legal_adherent->Charger();
		?>
		<tr><td>Titre:</td><td><?php echo $result[0]["titre_responsable_legal"]; ?></td></tr>
		<tr><td>Prénom:</td><td><?php echo $result[0]["prenom_responsable_legal"]; ?></td></tr>
		<tr><td>Nom:</td><td><?php echo $result[0]["nom_responsable_legal"]; ?></td></tr>
		<tr><td>Naissance:</td><td><?php echo $result[0]["naissance_responsable_legal"]; ?></td></tr>
		<tr><td>Tel:</td><td><?php echo $resultContact[0]["tel_portable_responsable_legal"]; ?></td></tr>
		<tr><td>Mail:</td><td><?php echo $resultContact[0]["mail_responsable_legal"]; ?></td></tr>
	<?php } 

	
	public function tabDataEnfantVoirPLusEntrainement ($ref_structure,$ref_adherent){
		$enfant_adherent = new enfant_adherent;
		$enfant_adherent->ref_structure=$ref_structure;
		$enfant_adherent->ref_adherent=$ref_adherent;
		$enfant_adherent->suppression_enfant_adherent="false";
		$result=$enfant_adherent->Charger(); ?>
		<tr><td>Niveau:</td><td><?php echo $result[0]["niveau_enfant_adherent"]; ?></td></tr>
		<tr><td>Cours semaine:</td><td><?php echo $result[0]["nombre_cours_semaine_efant_adherent"]; ?></td></tr>
		<tr><td>choix 1:</td><td><?php $choix1explode=explode(":",$result[0]["entrainement_choix1_enfant_adherent"]); echo $choix1explode[0]."<br>".$choix1explode[1]."<br>".$choix1explode[2]." ".$choix1explode[3]; ?></td></tr>
		<tr><td>choix 2:</td><td><?php $choix2explode=explode(":",$result[0]["entrainement_choix2_enfant_adherent"]); echo $choix2explode[0]."<br>".$choix2explode[1]."<br>".$choix2explode[2]." ".$choix2explode[3]; ?></td></tr>
	<?php }
	
	public function tabDataEnfantVoirPLusPieces ($ref_structure,$ref_adherent){
		$enfant_adherent = new enfant_adherent;
		$enfant_adherent->ref_structure=$ref_structure;
		$enfant_adherent->ref_adherent=$ref_adherent;
		$enfant_adherent->suppression_enfant_adherent="false";
		$result=$enfant_adherent->Charger(); ?>
		<tr><td><?php if($result[0]["photo_enfant_adherent"]==""){echo "Photo en Attente.";}else{ ?><img src="../uploadPhotos/<?php  echo $result[0]["photo_enfant_adherent"];?>" alt=" "><?php } ?></td></tr>
		<tr><td><?php if($result[0]["certificat_enfant_adherent"]==""){echo "Certificat médical en Attente.";}else{ ?><img src="../uploadCertificat/<?php echo $result[0]["certificat_enfant_adherent"];?>" alt=" "><?php } ?></td></tr>
	<?php }
	
		public function tabDataEnfantVoirPLusEquipement ($ref_structure,$ref_adherent){ 
		$equipement_adherent = new equipement_adherent;
		$equipement_adherent->ref_structure=$ref_structure;
		$equipement_adherent->ref_adherent=$ref_adherent;
		$result=$equipement_adherent->Charger();
		?>
		<tr><td>Dobok:</td><td><?php if(empty($result)){echo "Aucun";} else { echo $result[0]["dobok"]; } ?></td></tr>
		<?php }

	
	/*===================Adulte=================*/
	public function tabDataAdulteVoirPLusInfo ($ref_structure,$ref_adherent){
		$adulte_adherent = new adulte_adherent;
		$adulte_adherent->ref_structure=$ref_structure;
		$adulte_adherent->ref_adherent=$ref_adherent;
		$adulte_adherent->suppression_adulte_adherent="false";
		$result=$adulte_adherent->Charger(); ?>
		<tr><td>Titre:</td><td><?php echo $result[0]["titre_adulte_adherent"]; ?></td></tr>
		<tr><td>Prénom:</td><td><?php echo $result[0]["prenom_adulte_adherent"]; ?></td></tr>
		<tr><td>Nom:</td><td><?php echo $result[0]["nom_adulte_adherent"]; ?></td></tr>
		<tr><td>Naissance:</td><td><?php echo $result[0]["naissance_adulte_adherent"]; ?></td></tr>
	<?php }
	
	
	public function tabDataAdulteVoirPLusContact ($ref_structure,$ref_adherent){
		$contact_adulte_adherent = new contact_adulte_adherent;
		$contact_adulte_adherent->ref_structure=$ref_structure;
		$contact_adulte_adherent->ref_adherent=$ref_adherent;
		$result=$contact_adulte_adherent->Charger(); ?>
		<tr><td>Tél mobile:</td><td><?php echo $result[0]["tel_portable_adulte_adherent"]; ?></td></tr>
		<tr><td>Tél fixe:</td><td><?php echo $result[0]["tel_fixe_adulte_adherent"]; ?></td></tr>
		<tr><td>Mail:</td><td><?php echo $result[0]["mail_adulte_adherent"]; ?></td></tr>
		<tr><td>Nom urgence:</td><td><?php echo $result[0]["nom_urgence_adulte_adherent"]; ?></td></tr>
		<tr><td>Tél urgence:</td><td><?php echo $result[0]["tel_urgence_adulte_adherent"]; ?></td></tr>
	<?php } 
	
	
	public function tabDataAdulteVoirPLusEntrainement ($ref_structure,$ref_adherent){
		$adulte_adherent = new adulte_adherent;
		$adulte_adherent->ref_structure=$ref_structure;
		$adulte_adherent->ref_adherent=$ref_adherent;
		$adulte_adherent->suppression_adulte_adherent="false";
		$result=$adulte_adherent->Charger(); ?>
		<tr><td>Niveau:</td><td><?php echo $result[0]["niveau_adulte_adherent"]; ?></td></tr>
		<tr><td>Cours semaine:</td><td><?php echo $result[0]["nb_cours_semaine_adulte_adherent"]; ?></td></tr>
		<tr><td>choix 1:</td><td><?php $choix1explode=explode(":",$result[0]["entrainement_choix1_adulte_adherent"]); echo $choix1explode[0]."<br>".$choix1explode[1]."<br>".$choix1explode[2]." ".$choix1explode[3]; ?></td></tr>
		<tr><td>choix 2:</td><td><?php $choix2explode=explode(":",$result[0]["entrainement_choix2_adulte_adherent"]); echo $choix2explode[0]."<br>".$choix2explode[1]."<br>".$choix2explode[2]." ".$choix2explode[3]; ?></td></tr>
	<?php }
	
	public function tabDataAdulteVoirPLusPieces ($ref_structure,$ref_adherent){
		$adulte_adherent = new adulte_adherent;
		$adulte_adherent->ref_structure=$ref_structure;
		$adulte_adherent->ref_adherent=$ref_adherent;
		$adulte_adherent->suppression_adulte_adherent="false";
		$result=$adulte_adherent->Charger(); ?>
		<tr><td><?php if($result[0]["photo_adulte_adherent"]==""){echo "Photo en Attente.";}else{ ?><img src="../uploadPhotos/<?php  echo $result[0]["photo_adulte_adherent"];?>" alt=" "><?php } ?></td></tr>
		<tr><td><?php if($result[0]["certificat_adulte_adherent"]==""){echo "Certificat médical en Attente.";}else{ ?><img src="../uploadCertificat/<?php echo $result[0]["certificat_adulte_adherent"];?>" alt=" "><?php } ?></td></tr>
	<?php }
	
		public function tabDataAdulteVoirPLusEquipement ($ref_structure,$ref_adherent){ 
		$equipement_adherent = new equipement_adherent;
		$equipement_adherent->ref_structure=$ref_structure;
		$equipement_adherent->ref_adherent=$ref_adherent;
		$result=$equipement_adherent->Charger();
		?>
		<tr><td>Dobok:</td><td><?php if(empty($result)){echo "Aucun";} else { echo $result[0]["dobok"]; } ?></td></tr>
		<?php }

	
}


class voir_inscrit extends connexionBDD {
	public function tabDataEnfant($ref_structure){
		$administrateur=new administrateur;
		$administrateur->ref_structure=$ref_structure;
		$administrateur->Set_saison_courante();
		$saison_courante=$administrateur->Get_saison_courante();
			
		$inscription_adherent=new inscription_adherent;
		$inscription_adherent->ref_structure= $ref_structure;
		$inscription_adherent->saison_adherent= $saison_courante;
		$resultat=$inscription_adherent->Charger_ref_adherent_Attente("enfant","Inscrit");
			
		$enfant_adherent=new enfant_adherent;
		$enfant_adherent->ref_structure=$ref_structure;
		$enfant_adherent->suppression_enfant_adherent="false";
		$i=1;
		
		$equipement_adherent=new equipement_adherent;
		$equipement_adherent->ref_structure=$ref_structure;
		
		foreach($resultat as $key=>$value){
				$enfant_adherent->ref_adherent=$value["ref_adherent"];
				$result=$enfant_adherent->Charger();
			
				$equipement_adherent->ref_adherent=$value["ref_adherent"];	
				$result2=$equipement_adherent->Charger();	
			
		if(!empty($result)){
		?>	
			<tr class="corps">
			<td><?php echo $i++; ?></td>
			<td><?php echo $result[0]["ref_adherent"]; ?></td>
			<td><?php echo $result[0]["titre_enfant_adherent"]; ?></td>
			<td><?php echo $result[0]["nom_enfant_adherent"]; ?></td>
			<td><?php echo $result[0]["prenom_enfant_adherent"]; ?></td>
			<td><?php echo $result[0]["naissance_enfant_adherent"]; ?></td>
			<td><?php echo $result[0]["niveau_enfant_adherent"]; ?></td>
			<td><?php echo $result[0]["entrainement_choix1_enfant_adherent"]; ?></td>
			<td><?php echo $result[0]["entrainement_choix2_enfant_adherent"]; ?></td>
			<td><?php if(empty($result2)){echo "Aucun";}else{echo "Oui";} ?></td>
			<td><?php echo $result[0]["ref_responsable_legal"]; ?></td>
			<td><a href="voir-plus.php?page-provenance-back-office=voir-inscrit&ref_structure=<?php echo $result[0]["ref_structure"]; ?>&ref_adherent=<?php echo $result[0]["ref_adherent"]; ?>&ref_responsable=<?php echo $result[0]["ref_responsable_legal"] ?>" target="_self">+</a></td>
			</tr>
		<?php 
			}
		}
	} 
}
