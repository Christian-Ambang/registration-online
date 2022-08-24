<?php 
include_once("../parametres.php");
include_once("class/connexion_bdd.php");
include_once("class/class_backoffice_structure.php");

if(isset($_GET["page-provenance-back-office"]) && $_GET["page-provenance-back-office"]=="voir-plus-attente"){
	$enfant_adherent = new enfant_adherent;
	$enfant_adherent->ref_structure=$_GET["ref_structure"];
	$enfant_adherent->ref_adherent=$_GET["ref_adherent"];
	$enfant_adherent->date_suppression_enfant_adherent=date("Y-m-d");
	$enfant_adherent->Supprimer();
	header("Location: voir-attente.php");
}