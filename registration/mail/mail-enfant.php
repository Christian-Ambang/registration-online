<?php   
	   session_start();
	   include_once("../parametresMail.php");
	   include_once("../parametres.php");

  		ob_start();
?>

<!DOCTYPE html>
<html lang="fr">
   <head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />     
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <style type="text/css">
    /* Forcer l'allignement du message dans hotmail */
    .ExternalClass { width:100%; }
    /* Pour �viter les changement de taille de texte sur mobile */
    body { -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }
    /* Pour supprimer les bordure sur les tableaux */
    table td { border-collaspse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; margin:0; padding:0; }
    img { margin:0; padding:0; }
	@media only screen and (max-width: 639px), (max-device-width: 639px) {
      *[class~=general] { width:320px!important; }
    }
    </style>
     <title>Fiche d'inscription Enfant</title>
   </head>
<body>
    <table bgcolor="#ffffff" width="1OO%" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td>
				<table class="general" bgcolor="#ffffff" width="640" align="center" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
					<tr>
						<td align="center" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;color:#000000;">
							<?php if(isset($_POST["NbEnfants"])){ ?>Si ce message ne s'affiche pas correctement <a href="<?php echo $URI ?>/mail/mail-enfant.php?mail=GET&<?php echo http_build_query($_POST); ?>" target="_blank" style="color:#000000">consultez-le ici</a><?php } ?>
						</td>
					</tr>
					<tr>
						<td height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
					<tr>
						<td>
							<?php/*==============Header==============*/?>
							<table  width="317" align="left" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td height="10" style="height:10px;font-size:1px;line-height:1px;">&nbsp;
										
									</td>
								</tr>
								<tr>
									<td>
										<table align="left" cellpadding="0" cellspacing="0" border="0">
											<tr>
												<td align="left">
													<img src="<?php echo $URI; ?>/mail/img/logo-header.jpg" width="150" height="150" style="display:block;border:0" alt="">													
												</td>
												<td width="10" style="width:10px;font-size:1px;line-height:1px;">&nbsp;
																									
												</td>
												<td align="left" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#000000">
													<strong style="font-size:15px;">TAEKWONDO&nbsp;</strong><br>
													<strong>Tel :</strong> <br>06 00 00 00 00<br>
													<strong>Email :</strong> <br> contact@gmail.com<br>
													<strong>Site internet :</strong> <br> www.club.fr											
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<?php/*==============Header==============*/?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="15" style="height:15px;font-size:1;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td bgcolor="#95A6C4" height="10" style="height:10px;font-size:1;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td bgcolor="#95A6C4" align="center" style="font-size:20px;font-family:Arial,Helvetica,sans-serif;color:#000000;">
				FICHE D'INSCRIPTION ENFANT
			</td>
		</tr>
		<tr>
			<td bgcolor="#95A6C4" height="10" style="height:10px;font-size:1;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td height="15" style="height:15px;font-size:1;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td>
				<table  width="317" align="left" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="15" style="width:15px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td style="font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong>R�f&eacute;rence: </strong>RF15KHK<br>
							<strong style="text-decoration:underline">Responsable l&eacute;gal</strong><br>
							<strong>Nom: </strong><?php if(isset($_POST["NomResponsable"])){echo utf8_decode($_POST["NomResponsable"]);}else if($_GET["mail"]="GET"){ echo utf8_decode($_GET["NomResponsable"]);}?><br>
							<strong>Pr&eacute;nom: </strong><?php if(isset($_POST["PrenomResponsable"])){echo utf8_decode($_POST["PrenomResponsable"]);}else if($_GET["mail"]="GET"){echo utf8_decode($_GET["PrenomResponsable"]);}?><br>
						</td>
					</tr>
				</table>
				<table  width="317" align="left" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="15" style="width:15px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td style="font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<br>
							<strong>Adresse: </strong><?php if(isset($_POST["AdresseResponsable"])){ echo utf8_decode($_POST["AdresseResponsable"]);}else if($_GET["mail"]=="GET"){echo $_GET["AdresseResponsable"];}?><br>
							<strong>Code postal: </strong><?php if(isset($_POST["CpResponsable"])){ echo utf8_decode($_POST["CpResponsable"]);}else if ($_GET["mail"]=="GET"){ echo $_GET["CpResponsable"]; }?><br>
							<strong>Ville: </strong><?php if(isset($_POST["VilleResponsable"])){ echo utf8_decode($_POST["VilleResponsable"]);} else if ($_GET["mail"]=="GET"){echo $_GET["VilleResponsable"];}?><br>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td>
				<table  width="317" align="left" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="15" style="width:15px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td style="font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong style="text-decoration: underline;">Contact Responsable</strong><br>
							<strong>Mail: </strong><?php if(isset($_POST["MailResponsable"])){echo utf8_decode($_POST["MailResponsable"]);}else if($_GET["mail"]=="GET"){echo $_GET["MailResponsable"];}?><br>
							<strong>T&eacute;l&eacute;phone portable: </strong><?php if(isset($_POST["TelPortableResponsable"])){ echo utf8_decode($_POST["TelPortableResponsable"]);} else if($_GET["mail"]=="GET"){echo $_GET["TelPortableResponsable"];}?><br>
							<strong>T&eacute;l&eacute;phone domicile: </strong><?php if(isset($_POST["TelDomicileResponsable"])){ echo utf8_decode($_POST["TelDomicileResponsable"]);} else if($_GET["mail"]=="GET"){echo $_GET["TelDomicileResponsable"];}?><br>
						</td>
					</tr>
					<tr>
						<td colspan="2" height="8" style="height:8px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
				</table>
				<table  width="317" align="left" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
					<tr><td></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td bgcolor="#DDDDDD" height="10" style="height:10px;font-size:1;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td bgcolor="#DDDDDD" align="center" style="font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#000000;">
				CR&Eacute;NEAUX&nbsp;HORAIRES CHOISIS
			</td>
		</tr>
		<tr>
			<td bgcolor="#DDDDDD" height="10" style="height:10px;font-size:1;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<?php if(isset($_POST["NbEnfants"]))
				{$nbEnfants=$_POST["NbEnfants"];}
			   else{$nbEnfants=$_GET["NbEnfants"];} 
		for($i=1;$i<=$nbEnfants;$i++) { ?>
		<?php/*=========Duplication bloc enfant=========*/?>
		<?php if($_POST["NiveauEntrainement".$i]=="ToutNiveau" || $_GET["NiveauEntrainement".$i]=="ToutNiveau"){ ?>
		<?php
			if($_POST["NiveauEntrainement".$i]=="ToutNiveau" || $_GET["NiveauEntrainement".$i]=="ToutNiveau"){
					/*===========Explode POST================*/
					if(isset($_POST["NiveauEntrainement".$i])){
					$trancheAgeExplode = explode(":",$_POST["Entrainement_choix1_enfant".$i]);
					$trancheAge = $trancheAgeExplode[0];
					$niveauPOST=$niveau[$trancheAge][$_POST["NiveauEntrainement".$i]];
					}
					/*===========Explode GET================*/
					if(isset($_GET["NiveauEntrainement".$i])){
					$trancheAgeExplodeGet = explode(":",$_GET["Entrainement_choix1_enfant".$i]);
					$trancheAgeGet = $trancheAgeExplodeGet[0];
					$niveauGET=$niveau[$trancheAgeGet][$_GET["NiveauEntrainement".$i]];
					}
					} 
		?>
		<tr>
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
			<?php if(isset($_POST["NomEnfant".$i])){?>
				Vous&nbsp;avez&nbsp;choisi&nbsp;d'inscrire votre enfant <strong><?php echo utf8_decode($_POST["NomEnfant".$i])." ".utf8_decode($_POST["PrenomEnfant".$i]); ?></strong> &agrave;&nbsp;<?php echo $_POST["NbCoursSemaineEnfant".$i]; ?>&nbsp;cours&nbsp;<?php echo $niveauPOST; ?>&nbsp;par&nbsp;semaine*.<br>
			<?php } else {?>
				Vous&nbsp;avez&nbsp;choisi&nbsp;d'inscrire votre enfant <strong><?php echo utf8_decode($_GET["NomEnfant".$i])." ".utf8_decode($_GET["PrenomEnfant".$i]); ?></strong> &agrave;&nbsp;<?php echo $_GET["NbCoursSemaineEnfant".$i]; ?>&nbsp;cours&nbsp;<?php echo $niveauGET; ?>&nbsp;par&nbsp;semaine*.<br>
			<?php } ?>
			</td>
		</tr>
		<tr>
			<td height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td>
				<table align="center" width="75%" cellpadding="0" cellspacing="0" border="0">
				<?php if($_POST["Entrainement_choix1_enfant".$i]!="" || $_GET["Entrainement_choix1_enfant".$i]!=""){ ?>
					<tr>
						<td width="85" align="left" valign="top" style="width:85px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong>&bull;&nbsp;CHOIX 1&nbsp;:</strong>
						</td>
						<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<?php 
								if(isset($_POST["Entrainement_choix1_enfant".$i])){
									$choix1 = explode(":", utf8_decode($_POST["Entrainement_choix1_enfant".$i]));
									echo $choix1[1]." - ".$choix1[2]." ".str_replace("/", "-",$choix1[3]);
								}else { 
									$choix1 = explode(":", utf8_decode($_GET["Entrainement_choix1_enfant".$i]));
									echo $choix1[1]." - ".$choix1[2]." ".str_replace("/", "-",$choix1[3]);
								}
								
							?> - <a href="<?php echo $acess[$choix1[1]]; ?>" target="_blank" style="text-decoration:underline;color:#000000">Acc&egrave;s</a>
						</td>
					</tr>
					<tr>
						<td colspan="3" height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
					<?php } ?>
					<?php if($_POST["Entrainement_choix2_enfant".$i]!="" || $_GET["Entrainement_choix2_enfant".$i]!=""){ ?>
					<tr>
						<td width="85" align="left" valign="top" style="width:85px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong>&bull;&nbsp;CHOIX 2&nbsp;:</strong>
						</td>
						<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<?php 
								if(isset($_POST["Entrainement_choix2_enfant".$i])){
									$choix2 = explode(":", utf8_decode($_POST["Entrainement_choix2_enfant".$i]));
									echo $choix2[1]." - ".$choix2[2]." ".str_replace("/", "-",$choix2[3]);
								}else { 
									$choix2 = explode(":", utf8_decode($_GET["Entrainement_choix2_enfant".$i]));
									echo $choix2[1]." - ".$choix2[2]." ".str_replace("/", "-",$choix2[3]);
								}
								
							 ?> - <a href="<?php echo $acess[$choix2[1]]; ?>" target="_blank" style="text-decoration:underline;color:#000000">Acc&egrave;s</a>						
						</td>
					</tr>
					<?php } ?>
				</table>
			</td>
		</tr>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<?php 
			
				if($_POST["NiveauEntrainement".$i]=="ToutNiveau" || $_GET["NiveauEntrainement".$i]=="ToutNiveau"){
					/*===========Explode POST================*/
					if(isset($_POST["NiveauEntrainement".$i])){
					$trancheAgeExplodeTarif = explode(":",$_POST["Entrainement_choix1_enfant".$i]);
					$trancheAgeTarif = $trancheAgeExplodeTarif[0];
					$TarifPOST=$tarif[$trancheAgeTarif][$_POST["NiveauEntrainement".$i]][$_POST["NbCoursSemaineEnfant".$i]];
					}
					/*===========Explode GET================*/
					if(isset($_GET["NiveauEntrainement".$i])){
					$trancheAgeExplodeTarifGET = explode(":",$_GET["Entrainement_choix1_enfant".$i]);
					$trancheAgeTarifGET = $trancheAgeExplodeTarifGET[0];
					$TarifGET=$tarif[$trancheAgeTarifGET][$_GET["NiveauEntrainement".$i]][$_GET["NbCoursSemaineEnfant".$i]];
					}
					} 
			?>
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
			<strong>Montant de sa cotisation : <?php if(isset($_POST["NiveauEntrainement".$i])){echo utf8_decode($TarifPOST);} else {echo utf8_decode($TarifGET);} ?> &euro;</strong><br>
			<span style="font-size:11px;line-height: 11px;"><?php if(isset($_POST["NiveauEntrainement".$i])){echo $modalitePayement[utf8_decode($TarifPOST)];}else{echo $modalitePayement[utf8_decode($TarifGET)];} ?></span>
			</td>
		</tr>
		<?php if( $_POST["Choix_Equipement_Dobok_enfant".$i]!="" || $_GET["Choix_Equipement_Dobok_enfant".$i]!=""){ ?>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<?php 
				if($_POST["ChoixEquipement"]!=""){
					$equipementExplode = explode(":",$_POST["Choix_Equipement_Dobok_enfant".$i]);
					$dobok = $equipementExplode[1]." ".$equipementExplode[2].": ".$equipementExplode[0]." � <strong>".$equipementExplode[3]." �</strong>"; 
					$equipementTarif += $equipementExplode[3];
				}else{
					$equipementExplode = explode(":",$_GET["Choix_Equipement_Dobok_enfant".$i]);
					$dobok = $equipementExplode[1]." ".$equipementExplode[2].": ".$equipementExplode[0]." � <strong>".$equipementExplode[3]." �</strong>"; 
					$equipementTarif += $equipementExplode[3];
				}
			?>
			
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
				<strong>�quipement souhait� :</strong> <br>
				-<?php echo $dobok ?>
			</td>
			
		</tr>
		<?php } ?>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td bgcolor="#DDDDDD" height="1" style="height:1px;font-size:1px;line-height:1px">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<?php if(isset($_POST["NiveauEntrainement".$i])){$sommeTarifs+=utf8_decode($TarifPOST);}else{ $sommeTarifs+=utf8_decode($TarifGET); } ?>
		<?php }else 
		if ($_POST["NiveauEntrainement".$i]=="Competiteur" || $_GET["NiveauEntrainement".$i]=="Competiteur"){ ?>
				<?php 
				/*===========Explode POST================*/
					if(isset($_POST["NiveauEntrainement".$i])){
					$trancheAge = AgeDate(9,15,$anneeInscription);
					$niveauPOST=$niveau[$trancheAge][$_POST["NiveauEntrainement".$i]];
					}
					/*===========Explode GET================*/
					if(isset($_GET["NiveauEntrainement".$i])){
					$trancheAgeGet = AgeDate(9,15,$anneeInscription);
					$niveauGET=$niveau[$trancheAgeGet][$_GET["NiveauEntrainement".$i]];
					}
				?>
		<tr>
				<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
				<?php if(isset($_POST["NomEnfant".$i])){?>
					Vous&nbsp;avez&nbsp;choisi&nbsp;d'inscrire votre enfant <strong><?php echo utf8_decode($_POST["NomEnfant".$i])." ".utf8_decode($_POST["PrenomEnfant".$i]); ?></strong> &agrave;&nbsp;<?php echo $_POST["NbCoursSemaineEnfant".$i]; ?>&nbsp;cours&nbsp;<?php echo $niveauPOST; ?>&nbsp;par&nbsp;semaine*.<br>
				<?php } else {?>
					Vous&nbsp;avez&nbsp;choisi&nbsp;d'inscrire votre enfant <strong><?php echo utf8_decode($_GET["NomEnfant".$i])." ".utf8_decode($_GET["PrenomEnfant".$i]); ?></strong> &agrave;&nbsp;<?php echo $_GET["NbCoursSemaineEnfant".$i]; ?>&nbsp;cours&nbsp;<?php echo $niveauGET; ?>&nbsp;par&nbsp;semaine*.<br>
				<?php } ?>
				</td>
		</tr>
		<tr>
			<td height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td>
				<table align="center" width="317" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<?php if(isset($_POST["NomEnfant".$i])){forEachTroisAgeMail($horaireEnfantMail,"Competiteur",$acess);} ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<?php 
			
					/*===========Explode POST================*/
					if(isset($_POST["NiveauEntrainement".$i])){
					$trancheAgeTarif = AgeDate(9,15,$anneeInscription);
					$TarifPOST=$tarif[$trancheAgeTarif][$_POST["NiveauEntrainement".$i]][$_POST["NbCoursSemaineEnfant".$i]];
					}
					/*===========Explode GET================*/
					if(isset($_GET["NiveauEntrainement".$i])){
					$trancheAgeTarifGET = AgeDate(9,15,$anneeInscription);
					$TarifGET=$tarif[$trancheAgeTarifGET][$_GET["NiveauEntrainement".$i]][$_GET["NbCoursSemaineEnfant".$i]];
					}
			?>
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
			<strong>Montant de sa cotisation : <?php if(isset($_POST["NiveauEntrainement".$i])){echo utf8_decode($TarifPOST);} else {echo utf8_decode($TarifGET);} ?> &euro;</strong><br>
			<span style="font-size:11px;line-height: 11px;"><?php if(isset($_POST["NiveauEntrainement".$i])){echo $modalitePayement[utf8_decode($TarifPOST)];}else{echo $modalitePayement[utf8_decode($TarifGET)];} ?></span>
			</td>
		</tr>
		<?php if( $_POST["Choix_Equipement_Dobok_enfant".$i]!="" || $_GET["Choix_Equipement_Dobok_enfant".$i]!=""){ ?>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<?php 
				if($_POST["ChoixEquipement"]!=""){
					$equipementExplode = explode(":",$_POST["Choix_Equipement_Dobok_enfant".$i]);
					$dobok = $equipementExplode[1]." ".$equipementExplode[2].": ".$equipementExplode[0]." � <strong>".$equipementExplode[3]." �</strong>"; 
					$equipementTarif += $equipementExplode[3];
				}else{
					$equipementExplode = explode(":",$_GET["Choix_Equipement_Dobok_enfant".$i]);
					$dobok = $equipementExplode[1]." ".$equipementExplode[2].": ".$equipementExplode[0]." � <strong>".$equipementExplode[3]." �</strong>"; 
					$equipementTarif += $equipementExplode[3];
				}
			?>
			
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
				<strong>�quipement souhait� :</strong> <br>
				-<?php echo $dobok ?>
			</td>
			
		</tr>
		<?php } ?>
		
		<tr>
			<td height="20" style="height:20px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td bgcolor="#DDDDDD" height="1" style="height:1px;font-size:1px;line-height:1px">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td height="20" style="height:20px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<?php if(isset($_POST["NiveauEntrainement".$i])){$sommeTarifs+=utf8_decode($TarifPOST);}else{ $sommeTarifs+=utf8_decode($TarifGET); } ?>
		<?php } //Fin competiteur ?>
		<?php/*=========Duplication bloc enfant=========*/?>
		<? } ?>
		<tr>
			<td height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
			<strong>Montant total : <?php echo $sommeTarifs+$equipementTarif; ?> &euro;</strong><br>
			</td>
		</tr>
		<tr>
			<td height="3" style="height:3px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td align="center" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;color:#000000;">
				Sont aussi accept&eacute;s les coupons sport ANCV, les esp�ces et&nbsp;les&nbsp;Ch&egrave;ques&nbsp;vacances.<br>
				Aucun remboursement de cotisation sera effectu� en cours de saison.
			</td>
		</tr>
		<tr>
			<td height="10" style="height:10px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td bgcolor="#DDDDDD" height="1" style="height:1px;font-size:1px;line-height:1px">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td height="20" style="height:20px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td align="center" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#000000">
				Chaque pratiquant devra faire sa&nbsp;demande&nbsp;de&nbsp;licence&nbsp;directement <br>sur <a href="http://licence-web-fftda.logoss-consulting.com" target="_blank" style="color:#000000;">le site internet de la FFTDA</a>, muni des codes suivants&nbsp;:
			</td>
		</tr>
		<tr>
			<td height="10" style="height:10px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td>
				<table bgcolor="#F3F3F3" align="center" width="200" style="width:200px;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td height="30" style="height:30px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
					<tr>
						<td width="200" align="center" style="width:200px;font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong>identifiant:</strong><br> 
							00000000000<br>
							<br>
							<strong>Mot de passe:</strong><br>
							00000000000
						</td>
					</tr>
					<tr>
						<td height="30" style="height:30px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td>
				<table align="center" width="70%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="10" align="left" valign="top" style="width:10px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<?php if(isset($_POST["DroitImageResponsable"])){$droit=$_POST["DroitImageResponsable"];}else{$droit=$_GET["DroitImageResponsable"];} if($droit=="Oui") { ?>
							<strong style="font-size:16px;color:#7FD080">&#10003;</strong>
							<?php } else { ?>
							<strong style="font-size:16px;color:#E55255">&#10008;</strong>
							<?php } ?>
						</td>
						<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							A accept&eacute; le droit &agrave; l'image.						
						</td>
					</tr>
					<tr>
						<td colspan="3" height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
					<tr>
						<td width="10" align="left" valign="top" style="width:10px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<?php if(isset($_POST["ReglementResponsable"])){$reglement=$_POST["ReglementResponsable"];}else{$reglement=$_GET["ReglementResponsable"];} 
							if($reglement=="Oui") { ?>
							<strong style="font-size:16px;color:#7FD080">&#10003;</strong>
							<?php } else { ?>
							<strong style="font-size:16px;color:#E55255">&#10008;</strong>
							<?php } ?>						</td>
						<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							Certifie avoir pris connaisance du r&eacute;glement int&eacute;rieur.						
						</td>
					</tr>
					<tr>
						<td colspan="3" height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
					<tr>
						<td width="10" align="left" valign="top" style="width:10px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<?php if(isset($_POST["ObtentionLIcenceResponsable"])){$licence=$_POST["ObtentionLIcenceResponsable"];}else{$licence=$_GET["ObtentionLIcenceResponsable"];} if($licence=="Oui") { ?>
							<strong style="font-size:16px;color:#7FD080">&#10003;</strong>
							<?php } else { ?>
							<strong style="font-size:16px;color:#E55255">&#10008;</strong>
							<?php } ?>
						</td>
						<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							S'engage &agrave; faire le n&eacute;c&eacute;ssaire pour obtenir sa licence.						
						</td>
					</tr>
					<tr>
						<td colspan="3" height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
					<tr>
						<td width="10" align="left" valign="top" style="width:10px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<?php if(isset($_POST["OffrePartenaireResponsable"])){$partenaire=$_POST["OffrePartenaireResponsable"];}else{$partenaire=$_GET["OffrePartenaireResponsable"];} if($partenaire=="Oui") { ?>
							<strong style="font-size:16px;color:#7FD080">&#10003;</strong>
							<?php } else { ?>
							<strong style="font-size:16px;color:#E55255">&#10008;</strong>
							<?php } ?>						
						</td>
						<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							Accepte de recevoir les offres des partenaires						
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="20" style="height:20px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td>
				<table align="right" width="317" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td align="center">
							<?php $data= urlencode("app.php?id=ref"); ?>
							<img src = "<?php echo "https://api.qrserver.com/v1/create-qr-code/?data=$data&amp;size=150x150"; ?>" alt = " " style="display:block;border:0" title = "" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="20" style="height:20px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td align="left" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;color:#000000">
				*Attention, le nombre de places &eacute;tant limit&eacute;, seul le r&egrave;glement de la cotisation annuelle validera les cr&eacute;neaux s&eacute;lectionn&eacute;s.
			</td>
		</tr>
		<tr>
			<td height="20" style="height:20px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td align="left" style="font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#000000">
				<strong style="text-decoration:underline">Suivez-nous sur</strong>:<br>
				<a href="https://www.facebook.com" target="_blank" style="text-decoration:none; color:#000000"><img src="<?php echo $URI ?>/mail/img/facebook.png" width="27" height="27" style="border:0" alt=""></a>&nbsp;
				<a href="https://www.instagram.com" target="_blank" style="text-decoration:none; color:#000000"><img src="<?php echo $URI ?>/mail/img/instagram.png" width="27" height="27" style="border:0" alt=""></a>&nbsp;
				<a href="#" target="_blank" style="text-decoration:none; color:#000000"><img src="<?php echo $URI ?>/mail/img/linkedin.png" width="27" height="27" style="border:0" alt=""></a>&nbsp;
				<a href="https://www.club.fr" target="_blank" style="text-decoration:none; color:#000000"><img src="<?php echo $URI ?>/mail/img/site-web.png" width="27" height="27" style="border:0" alt=""></a>
			</td>
		</tr>
		<tr>
			<td height="20" style="height:20px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
	</table>
<?php 
	$recup=ob_get_clean();
	echo rewrite_pages($recup,$caractereType1);
?>