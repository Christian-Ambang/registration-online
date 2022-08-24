<?php
define( "PARAM_hote" , "" );
define( "PARAM_port" , "" );
define( "PARAM_nom_bdd" , "" );
define( "PARAM_utilisateur" , "" );
define( "PARAM_mot_passe" , "" );

class connexionBDD{
	
	public $connexion;

	function __construct(){
		try { 
			$this->connexion = new PDO( 'mysql:host=' .PARAM_hote. ';port=' .PARAM_port. ';dbname=' .PARAM_nom_bdd, PARAM_utilisateur, PARAM_mot_passe,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			}  
			catch (PDOException $erreur) 
			{
				echo "Erreur : " . $erreur->getMessage();
				die();
			}
	}
	
	public function ChargerForm($valeur){
		$bindage["ref_structure"]=$valeur;
		$tableBDD = get_class($this);
		$req = $this->connexion->prepare("SELECT * FROM $tableBDD WHERE ref_structure = :ref_structure");
		$req->execute($bindage);
		$result=$req->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $cle=>$val){
			foreach($val as $attr=>$value){
				$this->$attr=$value;
			}
		}
	}
	
}
