<?php

define( "PARAM_hote" , "mrambangwxonline.mysql.db" );
define( "PARAM_port" , "3306" );
define( "PARAM_nom_bdd" , "mrambangwxonline" );
define( "PARAM_utilisateur" , "mrambangwxonline" );
define( "PARAM_mot_passe" , "Moving77500" );

class connexionBDD{
	/*Connexion BDD*/
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
	/*Connexion BDD*/
	
}
