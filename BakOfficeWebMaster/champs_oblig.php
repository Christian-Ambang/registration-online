<?php session_start(); include_once("parametres.php");

if(isset($_POST["pageProvenance-Webmaster"]) && $_POST["pageProvenance-Webmaster"]=="modifier"){

$_SESSION["NomStructure"]=$_POST["nomStructure"];
$_SESSION["Specialite"]=$_POST["specialite"];
$_SESSION["StatutJuridique"]=$_POST["statutJuridique"];
$_SESSION["Siret"]=$_POST["siret"];
$_SESSION["TitreDirigeant"]=$_POST["titreDirigeant"];
$_SESSION["PrenomDirigeant"]=$_POST["prenomDirigeant"];
$_SESSION["NomDirigeant"]=$_POST["nomDirigeant"];
$_SESSION["EmailDirigeant"]=$_POST["emailDirigeant"];
$_SESSION["TelDirigeant"]=$_POST["telDirigeant"];
$_SESSION["TitreAdministrateur"]=$_POST["titreAdministrateur"];
$_SESSION["PrenomAdministrateur"]=$_POST["prenomAdministrateur"];
$_SESSION["NomAdministrateur"]=$_POST["nomAdministrateur"];
$_SESSION["EmailAdministrateur"]=$_POST["emailAdministrateur"];
$_SESSION["TelAdministrateur"]=$_POST["telAdministrateur"];
$_SESSION["TitreResponsableData"]=$_POST["titreResponsableData"];
$_SESSION["PrenomResponsableData"]=$_POST["prenomResponsableData"];
$_SESSION["NomResponsableData"]=$_POST["nomResponsableData"];
$_SESSION["EmailResponsableData"]=$_POST["emailResponsableData"];
$_SESSION["TelResponsableData"]=$_POST["telResponsableData"];
$_SESSION["Uri"]=$_POST["uri"];
if(!isset($_POST["qrCode"])){$_SESSION["QrCode"]="Non";}else{$_SESSION["QrCode"]=$_POST["qrCode"];}
if(!isset($_POST["optionMail"])){$_SESSION["OptionMail"]="Non";}else{$_SESSION["OptionMail"]=$_POST["optionMail"];}
if(!isset($_POST["messageWhatsapp"])){$_SESSION["MessageWhatsapp"]="Non";}else{$_SESSION["MessageWhatsapp"]=$_POST["messageWhatsapp"];}
if(!isset($_POST["sms"])){$_SESSION["Sms"]="Non";}else{$_SESSION["Sms"]=$_POST["sms"];}
if(!isset($_POST["googleCalendar"])){$_SESSION["GoogleCalendar"]="Non";}else{$_SESSION["GoogleCalendar"]=$_POST["googleCalendar"];}

if( $_POST["nomStructure"] == "" 
   || stopSQL($_POST["nomStructure"])==false 
   || $_POST["specialite"] =="" 
   || $_POST["statutJuridique"]=="" 
   || $_POST["siret"]=="" 
   || chaineNumerique($_POST["siret"],14,14)==false 
   || $_POST["titreDirigeant"]=="" 
   || $_POST["prenomDirigeant"]=="" 
   || chaineTexte($_POST["prenomDirigeant"],2,40)==false 
   || $_POST["nomDirigeant"]=="" 
   || chaineTexte($_POST["nomDirigeant"],2,40)==false 
   || $_POST["emailDirigeant"]=="" 
   || chaineEmail($_POST["emailDirigeant"])==false 
   || $_POST["telDirigeant"]=="" 
   || chaineNumeriqueTelFixe($_POST["telDirigeant"],10,10)==false 
   || $_POST["titreAdministrateur"]=="" 
   || $_POST["prenomAdministrateur"]=="" 
   || chaineTexte($_POST["prenomAdministrateur"],2,40)==false 
   || $_POST["nomAdministrateur"]=="" 
   || chaineTexte($_POST["nomAdministrateur"],2,40)==false 
   || $_POST["emailAdministrateur"]=="" 
   || chaineEmail($_POST["emailAdministrateur"])==false 
   || $_POST["telAdministrateur"]=="" 
   || chaineNumeriqueTelFixe($_POST["telAdministrateur"],10,10)==false 
   || $_POST["titreResponsableData"] ==""
   || $_POST["prenomResponsableData"]=="" 
   || chaineTexte($_POST["prenomResponsableData"],2,40)==false 
   || $_POST["nomResponsableData"]=="" 
   || chaineTexte($_POST["nomResponsableData"],2,40)==false 
   || $_POST["emailResponsableData"]=="" 
   || chaineEmail($_POST["emailResponsableData"])==false 
   || $_POST["telResponsableData"]=="" 
   || chaineNumeriqueTelFixe($_POST["telResponsableData"],10,10)==false 
   || $_POST["uri"]=="" 
   || stopSQL($_POST["uri"],2,40)==false 
   || !isset($_POST["qrCode"]) 
   || !isset($_POST["optionMail"])  
  ) 
{
$_SESSION["Erreur-Webmaster"]="erreurDiv";
header("Location: form-modifier.php?ref_structure-modif=".$_POST["ref_structure-modif"]);
}else{
include_once("connexion_bdd.php");
include_once("class/class_webmaster.php");
header("Location: form-modifier.php?Erreur-Webmaster=modificationValide&ref_structure-modif=".$_POST["ref_structure-modif"]);
$info= new info;
$info->nom=$_POST["nomStructure"];	
$info->specialite=$_POST["specialite"];	
$info->uri=$_POST["uri"];	
$info->statut_juridique=$_POST["statutJuridique"];	
$info->siret=$_POST["siret"];	
$info->Modifier($_POST["ref_structure-modif"]);

$dirigeant= new dirigeant;
$dirigeant->titre=$_POST["titreDirigeant"];
$dirigeant->prenom=$_POST["prenomDirigeant"];
$dirigeant->nom=$_POST["nomDirigeant"];
$dirigeant->email=$_POST["emailDirigeant"];
$dirigeant->telephone=$_POST["telDirigeant"];
$dirigeant->Modifier($_POST["ref_structure-modif"]);

$administrateur= new administrateur;
$administrateur->titre=$_POST["titreAdministrateur"];
$administrateur->prenom=$_POST["prenomAdministrateur"];
$administrateur->nom=$_POST["nomAdministrateur"];
$administrateur->email=$_POST["emailAdministrateur"];
$administrateur->telephone=$_POST["telAdministrateur"];
$administrateur->Modifier($_POST["ref_structure-modif"]);

$responsable_data= new responsable_data;
$responsable_data->titre=$_POST["titreResponsableData"];
$responsable_data->prenom=$_POST["prenomResponsableData"];
$responsable_data->nom=$_POST["nomResponsableData"];
$responsable_data->email=$_POST["emailResponsableData"];
$responsable_data->telephone=$_POST["telResponsableData"];
$responsable_data->Modifier($_POST["ref_structure-modif"]);
	
$option_check= new option_check;	
$option_check->qrcode=$_SESSION["QrCode"];
$option_check->mail_groupe=$_SESSION["OptionMail"];
$option_check->message_whatsapp=$_SESSION["MessageWhatsapp"];
$option_check->sms=$_SESSION["Sms"];
$option_check->google_calendar=$_SESSION["GoogleCalendar"];
$option_check->Modifier($_POST["ref_structure-modif"]);	
	
$webmaster= new webmaster;
$webmaster->date_derniere_modif=date("Y-m-d");
$webmaster->Modifier($_POST["ref_structure-modif"]);	
session_destroy();
} 
}