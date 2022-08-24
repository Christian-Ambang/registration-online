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
     <title>Fiche d'inscription Adulte</title>
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
							<?php if(isset($_POST["Nom"])){?> Si ce message ne s'affiche pas correctement <a href="<?php echo $URI ?>/mail/mail-adulte.php?mail=GET&<?php echo http_build_query($_POST); ?>" target="_blank" style="color:#000000">consultez-le ici</a><?php } ?>
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
				FICHE D'INSCRIPTION ADULTE
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
							<strong>Nom: </strong><?php if(isset($_POST["Nom"])){echo utf8_decode($_POST["Nom"]);}else{echo utf8_decode($_GET["Nom"]);} ?><br>
							<strong>Pr&eacute;nom: </strong><?php if(isset($_POST["Prenom"])){echo utf8_decode($_POST["Prenom"]);}else{echo utf8_decode($_GET["Prenom"]);}?><br>
							<strong>Date de naissance:</strong><?php if(isset($_POST["Naissance"])){echo utf8_decode($_POST["Naissance"]);}else{echo utf8_decode($_GET["Naissance"]);} ?><br>
						</td>
					</tr>
				</table>
				<table  width="317" align="left" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="15" style="width:15px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td style="font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong>Age: </strong><?php if(isset($_POST["Naissance"])){echo Age(utf8_decode($_POST["Naissance"]))." ans";}else{echo Age(utf8_decode($_GET["Naissance"]))." ans";}?><br>
							<strong>Adresse: </strong><?php if(isset($_POST["Adresse"])){echo utf8_decode($_POST["Adresse"]);}else{echo utf8_decode($_GET["Adresse"]);}?><br>
							<strong>Code postal: </strong><?php if(isset($_POST["Cp"])){echo utf8_decode($_POST["Cp"]);}else{echo utf8_decode($_GET["Cp"]);}?><br>
							<strong>Ville: </strong><?php if(isset($_POST["Ville"])){echo utf8_decode($_POST["Ville"]);}else{echo utf8_decode($_GET["Ville"]);}?><br>
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
							<strong style="text-decoration: underline;">Contact</strong><br>
							<strong>Mail: </strong><?php if(isset($_POST["Mail"])){echo utf8_decode($_POST["Mail"]);}else{echo utf8_decode($_GET["Mail"]);}?><br>
							<strong>T&eacute;l&eacute;phone portable: </strong><?php if(isset($_POST["TelPortable"])){echo utf8_decode($_POST["TelPortable"]);}else{echo utf8_decode($_GET["TelPortable"]);}?><br>
							<strong>T&eacute;l&eacute;phone domicile: </strong><?php if(isset($_POST["TelDomicile"])){echo utf8_decode($_POST["TelDomicile"]);}else{echo utf8_decode($_GET["TelDomicile"]);}?><br>
						</td>
					</tr>
					<tr>
						<td colspan="2" height="8" style="height:8px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
				</table>
				<table  width="317" align="left" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="15" style="width:15px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td style="font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong style="text-decoration: underline;">Contact en cas d'urgence</strong><br>
							<strong>Nom:</strong> <?php if(isset($_POST["NomUrgence"])){echo utf8_decode($_POST["NomUrgence"]);}else{echo utf8_decode($_GET["NomUrgence"]);}?><br>
							<strong>Pr&eacute;nom:</strong> <?php if(isset($_POST["PrenomUrgence"])){echo utf8_decode($_POST["PrenomUrgence"]);}else{echo utf8_decode($_GET["PrenomUrgence"]);}?><br>
							<strong>T&eacute;l&eacute;phone:</strong> <?php if(isset($_POST["TelUrgence"])){echo utf8_decode($_POST["TelUrgence"]);}else{echo utf8_decode($_GET["TelUrgence"]);}?><br>
						</td>
					</tr>
					<tr>
						<td colspan="2" height="8" style="height:8px;font-size:1px;line-height:1px;">&nbsp;
							
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
		
		<?php/*=========Duplication bloc Adulte=========*/?>
		<tr>
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
			Vous&nbsp;avez&nbsp;choisi&nbsp;de participer �&nbsp;<?php if(isset($_POST["NbCoursSemaine"])){echo $_POST["NbCoursSemaine"];}else{echo $_GET["NbCoursSemaine"];} ?>&nbsp;cours&nbsp;<?php if(isset($_POST["Niveau"])){echo $niveau[$_POST["Niveau"]];}else{echo $niveau[$_GET["Niveau"]];} ?>&nbsp;par&nbsp;semaine*.<br>
			</td>
		</tr>
		<tr>
			<td height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<?php if($_POST["Niveau"]=="self_defense" || $_GET["Niveau"]=="self_defense"){ ?>
		<tr>
			<td>
				<table align="center" width="75%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="85" align="left" valign="top" style="width:85px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong>&bull;&nbsp;CHOIX 1&nbsp;:</strong>
						</td>
						<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<?php 
								if(isset($_POST["Entrainement_choix1"])){$choix1 = explode(":", utf8_decode($_POST["Entrainement_choix1"]));}else{$choix1 = explode(":", utf8_decode($_GET["Entrainement_choix1"]));}
								echo $choix1[1]." - ".$choix1[2]." ".str_replace("/", "-",$choix1[3]);
							?> - <a href="<?php echo $acess[$choix1[1]]; ?>" target="_blank" style="text-decoration:underline;color:#000000">Acc&egrave;s</a>
						</td>
					</tr>
					<tr>
						<td colspan="3" height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
					<tr>
						<td width="85" align="left" valign="top" style="width:85px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong>&bull;&nbsp;CHOIX 2&nbsp;:</strong>
						</td>
						<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<?php 
								if(isset($_POST["Entrainement_choix2"])){$choix2 = explode(":", utf8_decode($_POST["Entrainement_choix2"]));}else{$choix2 = explode(":", utf8_decode($_GET["Entrainement_choix2"]));}
								echo $choix2[1]." - ".$choix2[2]." ".str_replace("/", "-",$choix2[3]);
							?> - <a href="<?php echo $acess[$choix2[1]]; ?>" target="_blank" style="text-decoration:underline;color:#000000">Acc&egrave;s</a>						
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<?php }else{ ?>
		<tr>
			<td>
				<table align="center" width="317" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<?php if(isset($_POST["Niveau"])){forEachTroisMail($horaireMail,$_POST["Niveau"],$acess);}else{forEachTroisMail($horaireMail,$_GET["Niveau"],$acess);} ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
			<strong>Montant de votre cotisation : <?php if(isset($_POST["Niveau"])){echo utf8_decode($tarif[$_POST["Niveau"]][$_POST["NbCoursSemaine"]]);}else{echo utf8_decode($tarif[$_GET["Niveau"]][$_GET["NbCoursSemaine"]]);} ?> &euro;</strong><br>
			<span style="font-size:11px;line-height: 11px;"><?php if(isset($_POST["Niveau"])){echo $modalitePayement[utf8_decode($tarif[$_POST["Niveau"]][$_POST["NbCoursSemaine"]])];}else{echo $modalitePayement[utf8_decode($tarif[$_GET["Niveau"]][$_GET["NbCoursSemaine"]])];}?></span>
			</td>
		</tr>
		<?php if( $_POST["Choix_Equipement_Dobok"]!="" || $_GET["Choix_Equipement_Dobok"]!=""){ ?>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<?php 
				if($_POST["ChoixEquipement"]!=""){
					$equipementExplode = explode(":",$_POST["Choix_Equipement_Dobok"]);
					$dobok = $equipementExplode[1]." ".$equipementExplode[2].": ".$equipementExplode[0]." � <strong>".$equipementExplode[3]." �</strong>"; 
					$equipementTarif = $equipementExplode[3];
				}else{
					$equipementExplode = explode(":",$_GET["Choix_Equipement_Dobok"]);
					$dobok = $equipementExplode[1]." ".$equipementExplode[2].": ".$equipementExplode[0]." � <strong>".$equipementExplode[3]." �</strong>"; 
					$equipementTarif = $equipementExplode[3];
				}
			?>
			
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
				<strong>�quipement souhait� :</strong> <br>
				-<?php echo $dobok ?>
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
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
			<strong>Montant total : <?php if(isset($_POST["Niveau"])){echo $tarif[$_POST["Niveau"]][$_POST["NbCoursSemaine"]]+$equipementTarif;}else{echo $tarif[$_GET["Niveau"]][$_GET["NbCoursSemaine"]]+$equipementTarif;} ?> &euro;</strong><br>
			</td>
		</tr>
		<?php } ?>

		<?php/*=========Duplication bloc Adulte=========*/?>
		<tr>
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
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
			<td height="15" style="height:15px;font-size:1px;line-height:1px;">&nbsp;
				
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
							<?php if($_POST["DroitImage"]=="Oui" || $_GET["DroitImage"]=="Oui") { ?>
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
							<?php if($_POST["Reglement"]=="Oui" || $_GET["Reglement"]=="Oui") { ?>
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
							<?php if($_POST["ObtentionLIcence"]=="Oui" || $_GET["ObtentionLIcence"]=="Oui") { ?>
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
							<?php if($_POST["OffrePartenaire"]=="Oui" || $_GET["OffrePartenaire"]=="Oui") { ?>
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