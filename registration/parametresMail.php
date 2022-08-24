<?php include_once("parametres.php");

/*===========Tableau corespondance================*/
$niveau[AgeDate(4,4,$anneeInscription)]["ToutNiveau"]="Taekwondo 1er age";
$niveau[AgeDate(5,6,$anneeInscription)]["ToutNiveau"]="Baby";
$niveau[AgeDate(7,8,$anneeInscription)]["ToutNiveau"]="Enfant";
$niveau[AgeDate(7,11,$anneeInscription)]["ToutNiveau"]="Enfant";
$niveau[AgeDate(7,12,$anneeInscription)]["ToutNiveau"]="Enfant";
$niveau[AgeDate(9,11,$anneeInscription)]["ToutNiveau"]="Enfant";
$niveau[AgeDate(12,15,$anneeInscription)]["ToutNiveau"]="Ados";
$niveau[AgeDate(9,15,$anneeInscription)]["Competiteur"]="Comp�tition jeunes";

$niveau["adultes"]="Loisir";
$niveau["competition_adultes"]="Comp�titions adultes";
$niveau["self_defense"]="Body Taek Fit";

$acess["lieux 2"]="https://goo.gl/maps/PYpNBYUzimMMG4BeA";
$acess["lieux 1"]="https://goo.gl/maps/iptETafHisHndGkH8";
$acess["lieux 5"]="https://goo.gl/maps/9JG8eFsSgtTKnd3m9";
$acess["lieux 4"]="https://goo.gl/maps/rUoyoaBL6XUVe7ih7";
$acess["Vaur�al (Toupets)"]="https://goo.gl/maps/NzfR32JHxRVmwmof6";
$acess["lieux 3"]="https://goo.gl/maps/Rbo55A7XjnTAaWgV6";

$modalitePayement["195"]="Payable en 2 fois par ch�ques de 100 � et de 95 � � l'ordre de club";
$modalitePayement["270"]="Payable en 3 fois par ch�ques de 90 � � l'ordre de club";
$modalitePayement["360"]="Payable en 4 fois par ch�ques de 90 � � l'ordre de club";
/*===========Tableau corespondance================*/

/*=============Fonction r��criture des caract�re======*/
$caractereType1 = array(
	
		"�" => "&eacute;", 
		"�" => "&Eacute;",
		"�" => "&egrave;",
		"�" => "&Egrave;",
		"�" => "&ecirc;",
		"�" => "&Ecirc;",
		"�" => "&Euml;",
		"�" => "&euml;",
		"�" => "&agrave;",
		"�" => "&Agrave;",
		"�" => "&aacute;",
		"�" => "&Aacute;",
		"�" => "&acirc;",
		"�" => "&Acirc;",
		"�" => "&Auml;",
		"�" => "&auml;",
		"�" => "&ucirc;",
		"�" => "&Ucirc;",
		"�" => "&uuml;",
		"�" => "&Uuml;",
		"�" => "&icirc;",
		"�" => "&Icirc;",
		"�" => "&Iuml;",
		"�" => "&iuml;",
		"�" => "&ocirc;",
		"�" => "&Ocirc;",
		"�" => "&Ouml;",
		"�" => "&ouml;",
		"�" => "&oelig;",
		"�" => "&OElig;",
		"�" => "&aelig;",
		"�" => "&AElig;",
		"�" => "&Ccedil;",
		"�" => "&ccedil;",
		"�" => "'", 	
		"�" => "'", 
		"�" => "&laquo;",
		"�" => "&raquo;",
		"�" => "&mdash;",
		"�" => "&ndash;",
		"�" => "&sdot;",
		"�" => "&middot;",
		"�" => "&bull;",	
		"�" => "&euro;",
		"�" => "&hellip;",
		"�" => "&reg;",	
		"�" => "&copy;",
		"�" => "&trade;",
		"�" => "&deg;",	
		"�" => "&frac12;",
		"�" => "&frac14;",

	);

$caractereType2 = array(  
		//E
		"�" => "&#233;", 
		"�" => "&#201;",

		"�" => "&#232;",
		"�" => "&#200;",

		"�" => "&#234;",
		"�" => "&#202;",

		"�" => "&#203;",
		"�" => "&#235;",

		//A
		"�" => "&#224;",
		"�" => "&#192;",

		"�" => "&#225;",
		"�" => "&#193;",

		"�" => "&#196;",
		"�" => "&#228;",
		
		// "�" => "",
		// "�" => "",

		//U
		"�" => "&#251;",
		"�" => "&#219;",

		// "�" => "",
		// "�" => "",

		//I
		"�" => "&#238;",
		"�" => "&#206;",

		"�" => "&#207;",
		"�" => "&#239;",

		//O
		"�" => "&#244;",
		"�" => "&#212;",

		"�" => "&#214;",
		"�" => "&#246;",

		//double
		"�" => "&#156;",
		"�" => "&#140;",

		"�" => "&#230;",
		"�" => "&#198;",

		//C
		"�" => "&#199;",
		"�" => "&#231;",

		//guillemets
		"�" => "'",
		
		"�" => "&#171;",
		"�" => "&#187;",
		
		//autre elements
		"�" => "&#128;",
		"�" => "&#133;",
		"�" => "&#174;",
		"�" => "&#169;"
	);

function rewrite_caractere($str,$tableau,$encodage){
	$caractereISO=[];
	foreach($tableau as $key=>$value){
		$keyISO=mb_convert_encoding($key,$encodage);
		$valueISO=mb_convert_encoding($value,$encodage);
		$caractereISO[$keyISO]=$valueISO;
	}
	
	return strtr($str, $caractereISO);
}

function rewrite_pages($buffer,$tableau){
	
	$retour = strtr($buffer,$tableau);
	
	return $retour;
	
}

/*=============Fonction r��criture des caract�re======*/


/*============Fonction Affichage Cr�neau Horaire======*/
/*comp�titions jeune*/
$horaireEnfantMail[]=array(AgeDate(9,15,$anneeInscription)=>array(
					array(
					   "lieu"=>array("lieux 1"),
					   "niveau"=>array($niveauEntrainement2),
					   "Lundi"=>array("18h30/20h00"),
					   "Mercredi"=>array("18h00/19h30"),
					  ),
				 	array(
					   "lieu"=>array("lieux 2"),
					   "niveau"=>array($niveauEntrainement2),
					   "Samedi"=>array("12h30/14h00"),
					  ),
				 	array(
					   "lieu"=>array("lieux 3"),
					   "niveau"=>array($niveauEntrainement2),
					   "Mardi"=>array("18h00/19h30"),
					  ),
				));


function forEachTroisAgeMail($tableau,$niveauEntrainement,$acess){

	$tableauPush2=[];
	foreach($tableau as $key=>$value){
		foreach ($value as $key2=>$value2){	
			foreach($value2 as $key3=>$value3){
				foreach($value3 as $key4=>$value4){
				if(in_array($niveauEntrainement,$value4)==true){
					$merge = array_merge($value3, ["trancheAge"=>[$key2]]);
					array_push($tableauPush2,$merge);
					}
				  }
				}
			  }
			}
	
			//=========================================
			function dedoublenage($tableau_start, $key){
			$lieu=[];
			$lieu2=[];
			$horaire=[];
			foreach($tableau_start as $cle=>$value){
				array_push($lieu2,$value[$key][0]);
				$lieu2=array_unique($lieu2);
			}

			foreach($lieu2 as $cle2=>$value2){
				array_push($lieu,[$value2=>[]]);
			}


			foreach($lieu as $cle=>$value){
				foreach($tableau_start as $cle2=>$value2){
					if(is_array($lieu[$cle][$value2[$key][0]])){array_push($lieu[$cle][$value2[$key][0]],$value2);}	
				}			
			}


			return $lieu;
		}
		$tableauPush3 = dedoublenage($tableauPush2, 'lieu');

	
			//=========================================
			foreach($tableauPush3 as $key => $value){
			//echo "<strong style='text-decoration:underline;'>".key($value).":</strong><br>";
			$lieu=key($value);
			foreach($value as $key2=>$value2){
				foreach($value2 as $key3=>$value3){
						foreach($value3 as $key4=>$value4){
				if($key4!="lieu" && $key4!="niveau" && $key4!="trancheAge"){
							foreach($value4 as $key5=>$value5){ ?>
									<?php 
										$lieuAcces=$acess[$lieu];
										echo "<strong>".key($value)."</strong> - ".$key4." ".str_replace("/", "-",$value5)." - <a href='".$acess[$lieu]."' target='_blank' style='text-decoration:underline;color:#000000'>Acc&egrave;s</a><br>"; 
									?>
					<?php	}
				}			


					  }
					} 
				}
			}
	
}
/*============Fonction Affichage Cr�neau Horaire======*/


/*=================Fonction Horaire mail Adulte============*/
/*adultes*/
$horaireMail[]=array( "adultes"=> array(  
						array(
					   "lieu"=>array("lieux 2"),
					   "Lundi"=>array("20h00/21h30"),
					   "Mercredi"=>array("20h00/21h30"),
					   "Vendredi"=>array("20h00/21h30"),
					  ),
				 	array(
					   "lieu"=>array("lieux 4"),
					   "Mardi"=>array("20h30/22h00"),
					   "Vendredi"=>array("20h00/21h30"),
					  ),
				 	array(
					   "lieu"=>array("lieux 5"),
					   "Mardi"=>array("20h45/22h00"),
					   "Vendredi"=>array("20h45/22h00"),
					  ),
					),
				);

/*comp�titions adultes*/
$horaireMail[]=array( "competition_adultes"=> array(
						array(
					   "lieu"=>array("lieux 2"),
					   "Samedi"=>array("12h30/14h00"),
					  ),
					array(
					   "lieu"=>array("lieux 1"),
					   "Lundi"=>array("20h00/21h30"),
					   "Mercredi"=>array("20h00/21h30"),
					  ),
					),
				);

function forEachTroisMail($tableau,$niveauPost,$acess){
	
	foreach($tableau as $key=>$value){
		if(is_array($tableau[$key][$niveauPost])){
		foreach($tableau[$key][$niveauPost] as $key2=>$value2){
				foreach($value2 as $key3=>$value3)
					foreach($value3 as $key4=>$value4){
					 if($key3!="lieu"){ 
						 $lieu=$value2["lieu"][0];
						 echo "<strong>".$lieu."</strong> - ".$key3." ".str_replace("/","-",$value4)." - <a href='".$acess[$lieu]."' target='_blank' style='text-decoration:underline;color:#000000'>Acc&egrave;s</a><br>"; 
					 }
				}
		}
		}//if
	} 
}

/*=================Fonction Horaire mail Adulte============*/


/*===============Fonction Mail===================*/
function mail_confirmation($provenance,$URI,$session,$tableau1,$tableau2){
	 
	 $tableauDest=["contact@mail.com"];
	
	 if($provenance=="enfant"){
		 $nom=rewrite_caractere(utf8_decode($_SESSION["NomResponsable"]),$tableau1,"iso-8859-1");
		 array_push($tableauDest,$_SESSION["MailResponsable"]);
		 $sessionISO =  rewrite_pages(http_build_query($session),$tableau2);
		 // Cr�ation d'un flux
		 $options = array(
			  'http' => array(
			  'header'=>"Content-type: application/x-www-form-urlencoded\r\nAccept-language: en\r\n" . 
			   "Cookie: ".session_name()."=".session_id()."\r\n",   
			  'method' => 'POST', 
			  'content' => $sessionISO, 
			 ) 
			); 

		 $context = stream_context_create($options);
		 session_write_close(); 
		 // Acc�s � un fichier HTTP avec les ent�tes HTTP indiqu�s ci-dessus
		 $Html=file_get_contents("$URI/mail/mail-enfant.php",false, $context);	
	 }
	 else 
	 if($provenance=="adulte"){
		 $nom=rewrite_caractere(utf8_decode($_SESSION["Nom"]),$tableau1,"iso-8859-1");
		 array_push($tableauDest,$_SESSION["Mail"]);
		 $sessionISO =  rewrite_pages(http_build_query($session),$tableau2);
		 // Cr�ation d'un flux
		 $options = array(
			  'http' => array(
			  'header'=>"Content-type: application/x-www-form-urlencoded\r\nAccept-language: en\r\n" . 
			   "Cookie: ".session_name()."=".session_id()."\r\n",   
			  'method' => 'POST', 
			  'content' => $sessionISO, 
			 ) 
			); 

		 $context = stream_context_create($options);
		 session_write_close(); 
		 // Acc�s � un fichier HTTP avec les ent�tes HTTP indiqu�s ci-dessus
		 $Html=file_get_contents("$URI/mail/mail-adulte.php",false, $context);
	 }
	
	 //$to = "$dest";
     $objet = "Mon club 2020/2021: $nom";
     //$message = str_replace("[ Titre Nom ]","$formulePolitesse",$tagAutoreplyMessage);
     $message = "$Html";
     $headers[] = "MIME-Version: 1.0";
     $headers[] = "Content-type: text/html; charset=iso-8859-1";
     $headers[] = "From: \"Mon club\"<noreply@mail.com>" . "\r\n" .
     'Reply-To: noreply@mail.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

    foreach($tableauDest as $key=>$value){
		$to=$value;
		mail($to, $objet, $message, implode("\r\n", $headers));
	} 
	
}
/*===============Fonction Mail===================*/