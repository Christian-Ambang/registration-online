<?php 

class structure extends connexionBDD {
	public $id;
	public $ref_structure;
		
	public function Get_id(){
		return $this ->id;
	}
	
	public function Get_ref_structure(){
		return $this ->ref_structure;
	}
	
	public function Set_id (){
		
		$req = $this->connexion->prepare("SELECT COUNT(*) AS ID FROM structure");
		$req->execute();
		$numero = $req->fetch(PDO::FETCH_ASSOC);
		$this ->id = $numero["ID"];
	}
	
	public function Set_ref_structure ($valeur,$specialite){
		$increment=$valeur+1;
		$substr=substr($specialite,0,1);
		$ref=$increment.$substr.uniqid();
		$req1 = $this->connexion->prepare("INSERT INTO structure (ref_structure) VALUES (:ref)");
		$req2 = $this->connexion->prepare("INSERT INTO info (ref_structure) VALUES (:ref)");
		$req3 = $this->connexion->prepare("INSERT INTO dirigeant (ref_structure) VALUES (:ref)");
		$req4 = $this->connexion->prepare("INSERT INTO administrateur (ref_structure) VALUES (:ref)");
		$req5 = $this->connexion->prepare("INSERT INTO responsable_data (ref_structure) VALUES (:ref)");
		$req6 = $this->connexion->prepare("INSERT INTO option_check (ref_structure) VALUES (:ref)");
		$req7 = $this->connexion->prepare("INSERT INTO webmaster (ref_structure) VALUES (:ref)");
		$bindage["ref"]=$ref;
		$req1->execute($bindage);
		$req2->execute($bindage);
		$req3->execute($bindage);
		$req4->execute($bindage);
		$req5->execute($bindage);
		$req6->execute($bindage);
		$req7->execute($bindage);
		$this->ref_structure=$ref;
	}
	
	public function Charger(){
		$req = $this->connexion->prepare("SELECT ref_structure FROM structure");
		$req->execute();
		$tableau_ref = $req->fetchAll();
		return $tableau_ref;
	}
	
}

class info extends connexionBDD {

	  public $ref_structure;	
	  public $nom;	
	  public $specialite;	
	  public $uri;	
	  public $statut_juridique;	
	  public $siret;
		  
	  public function Ajouter(){
		  
		 $bindage["nom"]=$this->nom;
		 $bindage["specialite"]=$this->specialite;
		 $bindage["uri"]=$this->uri; 
		 $bindage["statut_juridique"]=$this->statut_juridique;
		 $bindage["siret"]=$this->siret;
		 $bindage["ref_structure"]=$this->ref_structure;
		 $req = $this->connexion->prepare("UPDATE info SET nom=:nom, specialite=:specialite, uri=:uri,  statut_juridique=:statut_juridique, siret=:siret  WHERE ref_structure=:ref_structure");
		 $req->execute($bindage);
		 
	  }
	
	 public function Charger($valeur){
		 $bindage["ref_structure"]=$valeur;
		 $req = $this->connexion->prepare("SELECT * FROM info WHERE ref_structure=:ref_structure");
		 $req->execute($bindage);
		 $tableau = $req->fetchAll(PDO::FETCH_ASSOC);
		 return $tableau;
	 }
	
	public function Modifier($valeur){
		 $bindage["nom"]=$this->nom;
		 $bindage["specialite"]=$this->specialite;
		 $bindage["uri"]=$this->uri; 
		 $bindage["statut_juridique"]=$this->statut_juridique;
		 $bindage["siret"]=$this->siret;
		 $bindage["ref_structure"]=$valeur;
		 $req = $this->connexion->prepare("UPDATE info SET nom=:nom, specialite=:specialite, uri=:uri,  statut_juridique=:statut_juridique, siret=:siret  WHERE ref_structure=:ref_structure");
		 $req->execute($bindage);
	  }

}

class dirigeant extends connexionBDD {
	
	public $ref_structure;
	public $titre;	
	public $prenom;	
	public $nom;
	public $email;	
	public $telephone;
	
	public function Ajouter (){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["titre"]=$this->titre;
		$bindage["prenom"]=$this->prenom;
		$bindage["nom"]=$this->nom;
		$bindage["email"]=$this->email;
		$bindage["telephone"]=$this->telephone;
		
		$req = $this->connexion->prepare("UPDATE dirigeant SET titre=:titre, prenom=:prenom, nom=:nom,  email=:email, telephone=:telephone  WHERE ref_structure=:ref_structure");
		$req->execute($bindage);
	}
	
	public function Charger($valeur){
		 $bindage["ref_structure"]=$valeur;
		 $req = $this->connexion->prepare("SELECT * FROM dirigeant WHERE ref_structure=:ref_structure");
		 $req->execute($bindage);
		 $tableau = $req->fetchAll(PDO::FETCH_ASSOC);
		 return $tableau;
	 }
	
	public function Modifier ($valeur){
		$bindage["ref_structure"]=$valeur;
		$bindage["titre"]=$this->titre;
		$bindage["prenom"]=$this->prenom;
		$bindage["nom"]=$this->nom;
		$bindage["email"]=$this->email;
		$bindage["telephone"]=$this->telephone;
		
		$req = $this->connexion->prepare("UPDATE dirigeant SET titre=:titre, prenom=:prenom, nom=:nom,  email=:email, telephone=:telephone  WHERE ref_structure=:ref_structure");
		$req->execute($bindage);
	}
	
}

class administrateur extends connexionBDD {
	
	public $ref_structure;	
	public $titre;
	public $prenom;
	public $nom;	
	public $email;	
	public $telephone;	
	public $login;	
	public $mdp;
	public $droit;
	
	public function Ajouter(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["titre"]=$this->titre;
		$bindage["prenom"]=$this->prenom;
		$bindage["nom"]=$this->nom;
		$bindage["email"]=$this->email;
		$bindage["telephone"]=$this->telephone;
		$bindage["login"]=$this->login;
		$bindage["mdp"]=$this->mdp;
		$bindage["droit"]=$this->droit;
		
		$req = $this->connexion->prepare("UPDATE administrateur SET titre=:titre, prenom=:prenom, nom=:nom,  email=:email, telephone=:telephone, login=:login, mdp=:mdp, droit=:droit  WHERE ref_structure=:ref_structure");
		$req->execute($bindage);
	}
	
	public function Charger($valeur){
		 $bindage["ref_structure"]=$valeur;
		 $req = $this->connexion->prepare("SELECT * FROM administrateur WHERE ref_structure=:ref_structure");
		 $req->execute($bindage);
		 $tableau = $req->fetchAll(PDO::FETCH_ASSOC);
		 return $tableau;
	 }
	
	public function Modifier($valeur){
		$bindage["ref_structure"]=$valeur;
		$bindage["titre"]=$this->titre;
		$bindage["prenom"]=$this->prenom;
		$bindage["nom"]=$this->nom;
		$bindage["email"]=$this->email;
		$bindage["telephone"]=$this->telephone;
		
		$req = $this->connexion->prepare("UPDATE administrateur SET titre=:titre, prenom=:prenom, nom=:nom,  email=:email, telephone=:telephone  WHERE ref_structure=:ref_structure");
		$req->execute($bindage);
	}
	
	
}


class responsable_data extends connexionBDD {
	 
	public $ref_structure;	
	public $titre;	
	public $prenom;	
	public $nom;
	public $email;	
	public $telephone;
	
	public function Ajouter(){
		$bindage["ref_structure"]=$this->ref_structure;
		$bindage["titre"]=$this->titre;
		$bindage["prenom"]=$this->prenom;
		$bindage["nom"]=$this->nom;
		$bindage["email"]=$this->email;
		$bindage["telephone"]=$this->telephone;
		
		$req = $this->connexion->prepare("UPDATE responsable_data SET titre=:titre, prenom=:prenom, nom=:nom,  email=:email, telephone=:telephone WHERE ref_structure=:ref_structure");
		$req->execute($bindage);
	}
	
	public function Charger($valeur){
		 $bindage["ref_structure"]=$valeur;
		 $req = $this->connexion->prepare("SELECT * FROM responsable_data WHERE ref_structure=:ref_structure");
		 $req->execute($bindage);
		 $tableau = $req->fetchAll(PDO::FETCH_ASSOC);
		 return $tableau;
	 }
	
	public function Modifier($valeur){
		$bindage["ref_structure"]=$valeur;
		$bindage["titre"]=$this->titre;
		$bindage["prenom"]=$this->prenom;
		$bindage["nom"]=$this->nom;
		$bindage["email"]=$this->email;
		$bindage["telephone"]=$this->telephone;
		
		$req = $this->connexion->prepare("UPDATE responsable_data SET titre=:titre, prenom=:prenom, nom=:nom,  email=:email, telephone=:telephone WHERE ref_structure=:ref_structure");
		$req->execute($bindage);
	}
}


class option_check extends connexionBDD {
	
	public $ref_structure;	
	public $qrcode;	
	public $mail_groupe;	
	public $message_whatsapp;	
	public $sms;	
	public $google_calendar;
	
	public function Ajouter(){
	$bindage["ref_structure"]=$this->ref_structure;
	$bindage["qrcode"]=$this->qrcode;
	$bindage["mail_groupe"]=$this->mail_groupe;
	$bindage["message_whatsapp"]=$this->message_whatsapp;	
	$bindage["sms"]=$this->sms;	
	$bindage["google_calendar"]=$this->google_calendar;
	
	$req = $this->connexion->prepare("UPDATE option_check SET qrcode=:qrcode, mail_groupe=:mail_groupe, message_whatsapp=:message_whatsapp, sms=:sms,  google_calendar=:google_calendar WHERE ref_structure=:ref_structure");
	$req->execute($bindage);
	}
	
	public function Charger($valeur){
		 $bindage["ref_structure"]=$valeur;
		 $req = $this->connexion->prepare("SELECT * FROM option_check WHERE ref_structure=:ref_structure");
		 $req->execute($bindage);
		 $tableau = $req->fetchAll(PDO::FETCH_ASSOC);
		 return $tableau;
	 }
	
	public function Modifier($valeur){
	$bindage["ref_structure"]=$valeur;
	$bindage["qrcode"]=$this->qrcode;
	$bindage["mail_groupe"]=$this->mail_groupe;
	$bindage["message_whatsapp"]=$this->message_whatsapp;	
	$bindage["sms"]=$this->sms;	
	$bindage["google_calendar"]=$this->google_calendar;
	
	$req = $this->connexion->prepare("UPDATE option_check SET qrcode=:qrcode, mail_groupe=:mail_groupe, message_whatsapp=:message_whatsapp, sms=:sms,  google_calendar=:google_calendar WHERE ref_structure=:ref_structure");
	$req->execute($bindage);
	}
}

class webmaster extends connexionBDD {
		public $ref_structure;	
		public $date_creation;	
		public $date_derniere_modif;	
		public $etat;
		public $email;
		public $login;	
		public $mdp;	
		public $droit;
	
		public function Ajouter(){
			$bindage["ref_structure"]=$this->ref_structure;
			$bindage["date_creation"]=$this->date_creation;
			$bindage["etat"]=$this->etat;
			$bindage["email"]=$this->email;
			$bindage["login"]=$this->login;
			$bindage["mdp"]=$this->mdp;
			$bindage["droit"]=$this->droit;
			$req = $this->connexion->prepare("UPDATE webmaster SET date_creation=:date_creation, etat=:etat, email=:email,  login=:login, mdp=:mdp, droit=:droit WHERE ref_structure=:ref_structure");
			$req->execute($bindage);
		}
	
		public function Charger($valeur){
		 $bindage["ref_structure"]=$valeur;
		 $req = $this->connexion->prepare("SELECT * FROM webmaster WHERE ref_structure=:ref_structure");
		 $req->execute($bindage);
		 $tableau = $req->fetchAll(PDO::FETCH_ASSOC);
		 return $tableau;
	 	}
	
		public function Modifier($valeur){
			$bindage["ref_structure"]=$valeur;
			$bindage["date_derniere_modif"]=$this->date_derniere_modif;
			$req = $this->connexion->prepare("UPDATE webmaster SET date_derniere_modif=:date_derniere_modif WHERE ref_structure=:ref_structure");
			$req->execute($bindage);
		}
	
		public function Etat($valeur){
			$bindage["ref_structure"]=$valeur;
			$bindage["etat"]=$this->etat;
			$bindage["date_derniere_modif"]=$this->date_derniere_modif;
			$req = $this->connexion->prepare("UPDATE webmaster SET etat=:etat, date_derniere_modif=:date_derniere_modif WHERE ref_structure=:ref_structure");
			$req->execute($bindage);		
		}
	

}

class voir extends connexionBDD {
	
	public function tabData(){
	 $ref_structure= new structure;
	 $ref=$ref_structure->Charger();
	 $info= new info();
	 $administrateur= new administrateur;
	 $webmaster =  new webmaster;
	 foreach($ref as $key=>$value){ 
	 $info_charger=$info->Charger($value["ref_structure"]);
	 $administrateur_charger=$administrateur->Charger($value["ref_structure"]);
	 $webmaster_charger=$webmaster->Charger($value["ref_structure"]);
	 ?>
		 <tr class="corps">
			<td><?php echo $value["ref_structure"]; ?></td>
			<td><?php foreach($info_charger as $key=>$value){echo $value["statut_juridique"];}?></td>
			<td><?php foreach($info_charger as $key=>$value){echo $value["nom"];}?></td>
			<td><?php foreach($webmaster_charger as $key=>$value){echo $value["etat"];}?></td>
			<td><?php foreach($info_charger as $key=>$value){echo $value["uri"];}?></td>
			<td><?php foreach($administrateur_charger as $key=>$value){echo $value["nom"]." ".$value["prenom"];}?></td>
			<td><?php foreach($administrateur_charger as $key=>$value){echo $value["email"];}?></td>
			<td><a href="<?php foreach($info_charger as $key=>$value){echo $URI."/".$value["specialite"]."/".$value["uri"]."/app.php";}?>">accèder</a></td>
			<td><a href="<?php echo "voir_plus.php?ref_structure=".$value["ref_structure"]; ?>">+</a></td>
		</tr>
	<? } 	
	} 
}

class voir_plus extends connexionBDD {
	public function tabData($valeur){
		$info=new info;
		foreach($info->Charger($valeur) as $key=>$value){
			foreach($value as $cle=>$val){ echo "<tr><td>$cle</td><td>$val</td></tr>"; }
		}
		
		$dirigeant=new dirigeant;
		foreach($dirigeant->Charger($valeur) as $key=>$value){
			foreach($value as $cle=>$val){ if($cle!="id" && $cle!="ref_structure"){echo "<tr><td>$cle Dirigeant</td><td>$val</td></tr>";} }
		}
		
		$administrateur=new administrateur;
		foreach($administrateur->Charger($valeur) as $key=>$value){
			foreach($value as $cle=>$val){ if($cle!="id" && $cle!="ref_structure"){echo "<tr><td>$cle Admin</td><td>$val</td></tr>";} }
		}
		
		$responsable_data=new responsable_data;
		foreach($responsable_data->Charger($valeur) as $key=>$value){
			foreach($value as $cle=>$val){ if($cle!="id" && $cle!="ref_structure"){echo "<tr><td>$cle Data Resp</td><td>$val</td></tr>";} }
		}
		
		$option_check=new option_check;
		foreach($option_check->Charger($valeur) as $key=>$value){
			foreach($value as $cle=>$val){ if($cle!="id" && $cle!="ref_structure"){echo "<tr><td>$cle</td><td>$val</td></tr>";} }
		}
		
		$webmaster=new webmaster;
		foreach($webmaster->Charger($valeur) as $key=>$value){
			foreach($value as $cle=>$val){ if($cle=="etat" || $cle=="date_creation" || $cle=="date_derniere_modif"){echo "<tr><td>$cle</td><td>$val</td></tr>";} }
		}
	}
}

class recherche extends connexionBDD {
	
	public $nom_structure;	
	public $specialite;	
	public $statut_juridique;	
	public $siret;
	public $etat;
	
	public $nom;	
	public $prenom;	

	
	public function Charger(){
		
		$bindage["nom_structure"]=$this->nom_structure;
		$bindage["specialite"]=$this->specialite;
		$bindage["statut_juridique"]=$this->statut_juridique;
		$bindage["siret"]=$this->siret;
		$bindage["etat"]=$this->etat;
		$bindage["nom"]=$this->nom;
		$bindage["prenom"]=$this->prenom;
			
		$req_string="SELECT info.ref_structure,webmaster.ref_structure,dirigeant.ref_structure,administrateur.ref_structure,responsable_data.ref_structure FROM info,webmaster,dirigeant,administrateur,responsable_data WHERE	   
       	       ( info.nom=:nom_structure OR :nom_structure ='' )
		   AND ( info.specialite=:specialite  OR :specialite  ='' )
		   AND ( info.statut_juridique=:statut_juridique  OR :statut_juridique  ='' )
		   AND ( info.siret=:siret  OR :siret  ='' )
		   AND (( webmaster.etat=:etat  OR :etat  ='' )
		   OR  ( administrateur.nom=:nom  OR :nom  ='' ) 
		   OR  ( responsable_data.nom=:nom  OR :nom  ='' )
		   OR  ( dirigeant.prenom=:prenom  OR :prenom  ='' )
		   OR  ( administrateur.prenom=:prenom  OR :prenom  ='' ) 
		   OR  ( responsable_data.prenom=:prenom  OR :prenom  ='' ))
		   GROUP BY info.ref_structure,webmaster.ref_structure,dirigeant.ref_structure,administrateur.ref_structure,responsable_data.ref_structure";
		
		$req = $this->connexion->prepare($req_string);
		$req->execute($bindage);
		$tableau = $req->fetchAll(PDO::FETCH_ASSOC);
		return $tableau;		
	}		

}
