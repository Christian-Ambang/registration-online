<?php 
include_once("../parametres.php");
include_once("class/connexion_bdd.php");
include_once("class/class_backoffice_structure.php");

if(isset($_GET["page-provenance-back-office"]) && $_GET["page-provenance-back-office"]=="voir-plus-attente"){
	$inscription_adherent = new inscription_adherent;
	$inscription_adherent->ref_structure=$_GET["ref_structure"];
	$inscription_adherent->ref_adherent=$_GET["ref_adherent"];
	$inscription_adherent->saison_adherent=$anneeInscription;
	$inscription_adherent->date_validation_adherent=date("Y-m-d");
	$inscription_adherent->Inscrire_Adherent();
	
	$equipement_adherent = new equipement_adherent;
	$equipement_adherent->ref_structure=$_GET["ref_structure"];
	$equipement_adherent->ref_adherent=$_GET["ref_adherent"];
	$equipement_adherent->etat_dobok="Distribue";
	$equipement_adherent->Distribue();
	
	header("Location: voir-inscrit.php");
}