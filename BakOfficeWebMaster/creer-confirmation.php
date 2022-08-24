<?php session_start(); include_once("parametres.php");
if(isset($_POST["pageProvenance-Webmaster"]) && $_POST["pageProvenance-Webmaster"]=="creer"){

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
header("Location: form-creer.php");
$_SESSION["Erreur-Webmaster"]="erreurDiv";
}else{
$mail=true;
$_SESSION["Erreur-Webmaster"]="";
include_once("connexion_bdd.php");
include_once("class/class_webmaster.php");

$id_structure=new structure();
$id_structure->Set_id();
$id=$id_structure->Get_id();

$ref_structure=new structure();
$ref_structure->Set_ref_structure($id,$_SESSION["Specialite"]);
$ref=$ref_structure->Get_ref_structure();
	
$info= new info();
$info->ref_structure=$ref;
$info->nom=$_SESSION["NomStructure"];
$info->specialite=$_SESSION["Specialite"];
$info->uri=$_SESSION["Uri"];
$info->statut_juridique=$_SESSION["StatutJuridique"];
$info->siret=$_SESSION["Siret"];
$info->Ajouter();
	
$dirigeant= new dirigeant();
$dirigeant->ref_structure=$ref;
$dirigeant->titre=$_SESSION["TitreDirigeant"];
$dirigeant->prenom=$_SESSION["PrenomDirigeant"];
$dirigeant->nom=$_SESSION["NomDirigeant"];
$dirigeant->email=$_SESSION["EmailDirigeant"];
$dirigeant->telephone=$_SESSION["TelDirigeant"];
$dirigeant->Ajouter();
	
$administrateur= new administrateur();
$administrateur->ref_structure=$ref;
$administrateur->titre=$_SESSION["TitreAdministrateur"];
$administrateur->prenom=$_SESSION["PrenomAdministrateur"];
$administrateur->nom=$_SESSION["NomAdministrateur"];
$administrateur->email=$_SESSION["EmailAdministrateur"];
$administrateur->telephone=$_SESSION["TelAdministrateur"];
$administrateur->login=ucfirst(strtolower(str_replace(" ","",$_SESSION["NomAdministrateur"]))).Genere_Password(3);
$administrateur->mdp=Genere_Password(5);
$administrateur->droit="1";
$administrateur->Ajouter();
	
$responsable_data= new responsable_data();
$responsable_data->ref_structure=$ref;
$responsable_data->titre=$_SESSION["TitreResponsableData"];
$responsable_data->prenom=$_SESSION["PrenomResponsableData"];
$responsable_data->nom=$_SESSION["NomResponsableData"];
$responsable_data->email=$_SESSION["EmailResponsableData"];
$responsable_data->telephone=$_SESSION["TelResponsableData"];
$responsable_data->Ajouter();
	
$option_check=new option_check();
$option_check->ref_structure=$ref;
$option_check->qrcode=$_SESSION["QrCode"];
$option_check->mail_groupe=$_SESSION["OptionMail"];
$option_check->message_whatsapp=$_SESSION["MessageWhatsapp"];
$option_check->sms=$_SESSION["Sms"];
$option_check->google_calendar=$_SESSION["GoogleCalendar"];
$option_check->Ajouter();
	

$webmaster= new webmaster();
$webmaster->ref_structure=$ref;	
$webmaster->date_creation=date("Y-m-d");	
$webmaster->etat="actif";	
$webmaster->email="contact@mail.com";	
$webmaster->login="Ambang-webmaster";	
$webmaster->mdp="@Webmaster2020";	
$webmaster->droit="0";
$webmaster->Ajouter();
session_destroy();
}
	
	
}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Back Office Webmaster - Créer - confirmation</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/menu.js"></script>
</head>
<body>
	<div class="globalNav">
		<nav class="nav">
			<span class="menu"> <img src="img/btn-menu.png"> </span>
			<h1>DASHBOARD</h1>
 		</nav>
	</div>
	<div class="menuCenter">
		<div class="contenu">
			<?php include_once("menu.php");?>
		</div>
	</div>
	<header>
		<h1>
			<strong>INSCRIPTION-ONLINE</strong><br>
			<span>BAKC OFFICE WEBMASTER</span>
		</h1>
	</header>
	<main class="mainConfirmation">
		<section>
			<div class="Pastille">
				Administrateur
			</div>
		</section>
		<section class="confirmation">
			<p>La structure <?php echo $_SESSION["StatutJuridique"]." ".$_SESSION["NomStructure"];?> a bien été enregistré sous la ref: <?php echo $ref; ?></p>
		</section>
	</main>
</body>
</html>
