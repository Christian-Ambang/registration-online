<?php  
	   if(isset($_GET["page-provenance"]) && $_GET["page-provenance"]=="voir"){
	   include_once("connexion_bdd.php");
	   include_once("class/class_webmaster.php");
	   if(isset($_GET["etat"]) && $_GET["etat"]=="passif"){$etat="actif";}else{$etat="passif";}
	   $webmaster=new webmaster;
	   $webmaster->etat=$etat;
	   $webmaster->date_derniere_modif=date("Y-m-d");
	   $webmaster->Etat($_GET["ref_structure-supp"]);
	   header("Location: voir_plus.php?Message-Webmaster=suppressionValide&ref_structure=".$_GET["ref_structure-supp"]);
	  }