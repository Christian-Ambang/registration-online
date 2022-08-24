<?php  
	   session_start();
	   include_once("../parametres.php");
?>

<!DOCTYPE html>
<html lang="fr">
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
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
     <title>Fiche d'inscription</title>
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
							Si ce message ne s'affiche pas correctement <a href="<?php echo $URI ?>/mail/mail-dirigeant.php" target="_blank" style="color:#000000">consultez-le ici</a>
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
							<table  width="317" align="left" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td height="25" style="height:25px;font-size:1px;line-height:1px;">
										&nbsp;
									</td>
								</tr>
								<tr>
									<td>
										<table width="60%" align="center" cellpadding="0" cellspacing="0" border="0">
											<tr>
												<td width="10" align="left" valign="top" style="width:10px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
													<strong style="font-size:16px;color:#7FD080">&check;</strong>
												</td>
												<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;

												</td>
												<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
													Cotisation						
												</td>
											</tr>
											<tr>
												<td colspan="3" height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;

												</td>
											</tr>
											<tr>
												<td width="10" align="left" valign="top" style="width:10px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
													<strong style="font-size:16px;color:#7FD080">&check;</strong>
												</td>
												<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;

												</td>
												<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
													Certificat						
												</td>
											</tr>
											<tr>
												<td colspan="3" height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;

												</td>
											</tr>
											<tr>
												<td width="10" align="left" valign="top" style="width:10px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
													<strong style="font-size:16px;color:#E55255">&cross;</strong>
												</td>
												<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;

												</td>
												<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
													Photo						
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
							<strong>R&eacute;f&eacute;rence:</strong><?php $_SESSION["Nom"];?><br>
							<strong style="text-decoration:underline">Responsable l&eacute;gal</strong><?php $_SESSION["Nom"];?><br>
							<strong>Nom:</strong><?php $_SESSION["Nom"];?><br>
							<strong>Pr&eacute;nom:</strong><?php $_SESSION["Prenom"];?><br>
						</td>
					</tr>
				</table>
				<table  width="317" align="left" style="width:317px;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="15" style="width:15px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td style="font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<br>
							<strong>Adresse:</strong><?php $_SESSION["Nom"];?><br>
							<strong>Code postal:</strong><?php $_SESSION["Prenom"];?><br>
							<strong>Ville:</strong><?php $_SESSION["Naissance"];?><br>
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
							<strong style="text-decoration: underline;">Contact Responsable</strong><?php $_SESSION["Nom"];?><br>
							<strong>Mail:</strong><?php $_SESSION["Mail"];?><br>
							<strong>T&eacute;l&eacute;phone portable:</strong><?php $_SESSION["Naissance"];?><br>
							<strong>T&eacute;l&eacute;phone domicile:</strong><?php $_SESSION["Prenom"];?><br>
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
							<strong style="text-decoration: underline;">Contact en cas d'urgence</strong><?php $_SESSION["Nom"];?><br>
							<strong>Nom :</strong><?php $_SESSION["Nom"];?><br>
							<strong>Pr&eacute;nom:</strong><?php $_SESSION["Prenom"];?><br>
							<strong>T&eacute;l&eacute;phone portable:</strong><?php $_SESSION["Naissance"];?><br>
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
				VOS PR&Eacute;F&Eacute;RENCES DES CR&Eacute;NEAUX&nbsp;HORAIRES
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
		<?php/*=========Duplication bloc enfant=========*/?>
		<tr>
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
			Vous&nbsp;avez&nbsp;choisi&nbsp;d'inscrire votre enfant Nom Pr&eacute;nom &agrave;&nbsp;2&nbsp;cours&nbsp;baby&nbsp;par&nbsp;semaine*.<br>
			</td>
		</tr>
		<tr>
			<td height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td>
				<table align="center" width="80%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="80" align="left" valign="top" style="width:80px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong>&bull;&nbsp;CHOIX 1&nbsp;:</strong>
						</td>
						<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							lieu 1 - Vendredi 19h00/20h00 - <a href="#" target="_blank" style="color:#000000">Acc&egrave;s</a>
						</td>
					</tr>
					<tr>
						<td colspan="3" height="5" style="height:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
					</tr>
					<tr>
						<td width="80" align="left" valign="top" style="width:80px;font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							<strong>&bull;&nbsp;CHOIX 2&nbsp;:</strong>
						</td>
						<td width="5" style="width:5px;font-size:1px;line-height:1px;">&nbsp;
							
						</td>
						<td align="left" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
							lieu 1 - Vendredi 19h00/20h00 - <a href="#" target="_blank" style="color:#000000">Acc&egrave;s</a>
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
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
			<strong>Montant de sa cotisation : 270 &euro;</strong><br>
			<span style="font-size:11px;line-height: 11px;">Payable en 3 fois par ch&egrave;ques de 90 &euro; &agrave;&nbsp;l'ordre&nbsp;de&nbsp;&laquo;&nbsp;tkd&nbsp;&nbsp;&raquo;</span>
			</td>
		</tr>
		<?php/*=========Duplication bloc enfant=========*/?>
		<tr>
			<td height="10" style="height:10px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td align="center" style="font-size:15px;font-family:Arial,Helvetica,sans-serif;color:#000000">
			<strong>Montant total des cotisations: 270 &euro;</strong><br>
			</td>
		</tr>
		<tr>
			<td height="3" style="height:3px;font-size:1px;line-height:1px;">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td align="center" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;color:#000000;">
				Sont aussi accept&eacute;s les coupons sport ANCV et&nbsp;les&nbsp;Ch&egrave;ques&nbsp;vacances
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
						<td align="center" style="font-size:17px;font-family:Arial,Helvetica,sans-serif;color:#000000">
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
							<strong style="font-size:16px;color:#7FD080">&check;</strong>
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
							<strong style="font-size:16px;color:#7FD080">&check;</strong>
						</td>
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
							<strong style="font-size:16px;color:#7FD080">&check;</strong>
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
							<strong style="font-size:16px;color:#E55255">&cross;</strong>
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
							<img src = "https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $data ?>&amp;size=150x150" alt = " " style="display:block;border:0" title = "" />
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
	</table>