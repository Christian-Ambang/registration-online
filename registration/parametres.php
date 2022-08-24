<?php  
session_start();
if(isset($_GET["ini"])){unset($_SESSION);}
//A charger grace a la base Administrateur saison
$anneeInscription="2020/2021";
// A renseigner manuellement 
$URI="https://www.site-club.com/inscriptions";
$URI_SERVEUR="/www/inscription";
// A renseigner manuellement 
$ref_structure="ec8dd693";
//Structure name
$nom_structure="Nom club";
//$BDDtest[] = array ("Nom"=>"Christian","Email"=>"test@mr-ambang.com");
//$BDDtest[] = array ("Nom"=>"Daniel","Email"=>"test2@mr-ambang.com");
//var_dump($_SERVER['HTTP_REFERER']);
function chaineNumerique ($valeur,$minChaine,$maxChaine){
	$numerique=ctype_digit($valeur);
	$nbNumerique=strlen($valeur);
	if($numerique==true && $nbNumerique >= $minChaine && $nbNumerique <= $maxChaine){
		$chaineValide=true;
	}else {$chaineValide=false;}
	return($chaineValide);
}

function chaineNumeriqueCp ($valeur,$minChaine,$maxChaine){
	$numerique=ctype_digit($valeur);
	$nbNumerique=strlen($valeur);
	if($numerique==true && ($nbNumerique == $minChaine || $nbNumerique == $maxChaine)){
		$chaineValide=true;
	}else {$chaineValide=false;}
	return($chaineValide);
}

function chaineTexte ($valeur,$minChaine,$maxChaine) {
	
	$chaineTransforme = str_replace(array(
	'Á' , 'À' , 'Â' , 'Ä' , 'Å' , 'Ã' , 'Ç' , 'É' , 'È' , 'Ê' , 'Ë' , 'Í' , 'Ì' , 'Î' , 'Ï' , 'Ñ' , 'Ó' , 'Ò' , 'Ô' , 'Ö' , 'Õ' , 'Ø' , 'Š' , 'Ú' , 'Ù' , 'Û' , 'Ü' , 'Ý' , 'Ÿ' , 'Ž' , 'Ð' , 'Þ' , 
	'á' , 'à' , 'â' , 'ä' , 'å' , 'ã' , 'ç' , 'é' , 'è' , 'ê' , 'ë' , 'í' , 'ì' , 'î' , 'ï' , 'ñ' , 'ó' , 'ò' , 'ô' , 'ö' , 'õ' , 'ø' , 'š' , 'ú' , 'ù' , 'û' , 'ü' , 'ý' , 'ÿ' , 'ž' , '&' , 'ð' , 
	'þ' , 'ß' , 'æ' , 'œ' , 'Æ' , 'Œ' , '-' , "'"," "
	),'',$valeur);
	
	$alpha=ctype_alpha($chaineTransforme);
	$nbAlpha=strlen($valeur);
	if($alpha==true && $nbAlpha >= $minChaine && $nbAlpha <= $maxChaine){
		$chaineValide=true;
	}else {$chaineValide=false;}
	return($chaineValide);

}

function chaineDate ($valeur){
	$numeriqueTransforme = str_replace ("/","",$valeur);
	$numerique=ctype_digit($numeriqueTransforme);
	$nbNumerique=strlen($numeriqueTransforme);
	$jour=substr($numeriqueTransforme,0,2);
	$mois=substr($numeriqueTransforme,2,2);
	$annee=substr($numeriqueTransforme,4,4);
	$dateCheck = checkdate ($mois,$jour,$annee);
	if($numerique==true && $nbNumerique == 8 && $dateCheck==true){
		$chaineValide=true;
	}else {$chaineValide=false;}
	return($chaineValide);
	
}

function stopSQL ($valeur){
$retour="";
$restriction = array('*','+',';','&&','||',' AND ',' OR ',' SELECT ',' WHERE ',' DELETE ',' INSERT ',' UPDATE ',' FROM ',' DISTINCT ',' ORDER BY ',' IN ',' NULL ',' LIKE ',' AS ',' UPPER ',' LOWER ',' BETWEEN ',' EXISTS ',' UNION ',' INTERSECT ',' MINUS ',' COUNT ',' SUM ',' AVG ',' MAX ',' MIN ',' CREATE TABLE ',' ALTER TABLE ',' DROP TABLE ',' CONSTRAINT ',' PRIMARY KEY ', ' UNIQUE ', ' FOREIGN KEY ', ' CHECK ',' CREATE VIEW ',' DROP VIEW ',' GRANT ',' REVOKE ',);
foreach($restriction as $value){
$retour.=strpos($valeur, $value);
}
if ($retour==""){$chaineValide=true;}else{$chaineValide=false;}
return($chaineValide);
}

function chaineEmail ($valeur){
	$regex_mail = "/^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/";
	$regMail=preg_match($regex_mail, $valeur);
	if($regMail==true){$chaineValide=true;}else{$chaineValide=false;}
	return($chaineValide);
}

function checkInscription ($email,$nom){

	$return=true;
	return($return);
}


function chaineNumeriqueTelMobile ($valeur,$minChaine,$maxChaine){
	$chaineTransforme = str_replace (array('.',' '),'',$valeur);
	$debutChaineTel=substr($valeur,0,2);
	$numerique=ctype_digit($chaineTransforme);
	$nbNumerique=strlen($chaineTransforme);
	if($numerique==true && $nbNumerique >= $minChaine && $nbNumerique <= $maxChaine && ($debutChaineTel=="06" || $debutChaineTel=="07")){
		$chaineValide=true;
	} else {$chaineValide=false;}
	return($chaineValide);
}

function chaineNumeriqueTelFixe ($valeur,$minChaine,$maxChaine){
	$chaineTransforme = str_replace (array('.',' '),'',$valeur);
	$debutChaineTel=substr($valeur,0,1);
	$numerique=ctype_digit($chaineTransforme);
	$nbNumerique=strlen($chaineTransforme);
	if($numerique==true && $nbNumerique >= $minChaine && $nbNumerique <= $maxChaine && $debutChaineTel=="0"){
		$chaineValide=true;
	} else {$chaineValide=false;}
	return($chaineValide);
}


function uploadFichier ($name,$dossier,$nameFichier,$arrayExtentionOblig,$compteur,$URI){
			// Création du dossier si il n'existe pas
			$dossierPhotos = $URI."/".$dossier;
				
			 if(!is_dir($dossierPhotos)){
				   mkdir($dossierPhotos, 0777, true);
				}
			
			// Création du nom de fichier
			 $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ' ,' ');
	         $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y','');
			 $extentionPhotos= new SplFileInfo (basename($_FILES["$name"]['name']));
			 $extention		 =$extentionPhotos->getExtension();
			 $testExtention = in_array(strtolower($extention),$arrayExtentionOblig);
			 
			 if($testExtention == true && $compteur < 1){
				 	 $fichierPhotos = str_ireplace($search, $replace, uniqid($nameFichier."_").".".$extention);
						 if(move_uploaded_file($_FILES["$name"]['tmp_name'], $dossierPhotos."/". $fichierPhotos)==false) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
						 {
							$retourUpload="bad";
							 
						 }else{$retourUpload="ok";$fichierName=$fichierPhotos;}	
			 }else { $retourUpload=false; }
			 
			
			 $retour=array($retourUpload,$fichierName,$testExtention);
				
			 return ($retour);
}


/*=============Tableau Tarifs==========================*/
//Adultes tarif
$tarif["adultes"]=array("1"=>"195","5"=>"270","pdf"=>"planning-previsionnel.pdf");
$tarif["self_defense"]=array("1"=>"195","2"=>"270","pdf"=>"planning-previsionnel.pdf",);
$tarif["competition_adultes"]=array("1"=>"360","3"=>"360","pdf"=>"planning-previsionnel.pdf",);
//Enfants tarif
$tarif[AgeDate(4,4,$anneeInscription)]["ToutNiveau"]=array("1"=>"195","pdf"=>"planning-previsionnel.pdf");
$tarif[AgeDate(5,6,$anneeInscription)]["ToutNiveau"]=array("1"=>"195","2"=>"270","pdf"=>"planning-previsionnel.pdf",);
$tarif[AgeDate(7,8,$anneeInscription)]["ToutNiveau"]=array("2"=>"270","pdf"=>"planning-previsionnel.pdf",);
$tarif[AgeDate(7,11,$anneeInscription)]["ToutNiveau"]=array("2"=>"270","pdf"=>"planning-previsionnel.pdf",);
$tarif[AgeDate(7,12,$anneeInscription)]["ToutNiveau"]=array("2"=>"270","pdf"=>"planning-previsionnel.pdf",);
$tarif[AgeDate(9,11,$anneeInscription)]["ToutNiveau"]=array("2"=>"270","pdf"=>"planning-previsionnel.pdf",);
$tarif[AgeDate(12,15,$anneeInscription)]["ToutNiveau"]=array("2"=>"270","pdf"=>"planning-previsionnel.pdf",);
$tarif[AgeDate(9,15,$anneeInscription)]["Competiteur"]=array("3"=>"360","pdf"=>"planning-previsionnel.pdf",);
/*=============Tableau Tarifs==========================*/


/*=============Tableau Horaires========================*/
/*Enfant*/
$niveauEntrainement1="ToutNiveau";
$niveauEntrainement2="Competiteur";

$horaireEnfant[]=array(AgeDate(4,4,$anneeInscription)=>
					   array(
							array(
							   "lieu"=>array("Vauréal (Toupets)"),
							   "niveau"=>array($niveauEntrainement1),
							   "Mercredi"=>array("14h45/15h15"),
							  ),
						)
					  );

$horaireEnfant[]=array(AgeDate(5,6,$anneeInscription)=>
					 array(
						array(
						   "lieu"=>array("Moulin à vent"),
						   "niveau"=>array($niveauEntrainement1),
						   "Mardi"=>array("18h00/18h45"),
						   "Jeudi"=>array("18h00/18h45"),
						   "Samedi"=>array("13h30/14h15","14h00/14h45"),
						  ),
						 array(
						   "lieu"=>array("Les Grès"),
						   "niveau"=>array($niveauEntrainement1),
						   "Jeudi"=>array("18h00/18h45"),
						  ),
						 array(
							 "lieu"=>array("lieux 4"),
							 "niveau"=>array($niveauEntrainement1),
							 "Mardi"=>array("17h15/18h00"),
						 ),
						 array(
							 "lieu"=>array("Vauréal (Toupets)"),
							 "niveau"=>array($niveauEntrainement1),
							 "Mercredi"=>array("15h15/16h00"),
						 ),
						array(
							 "lieu"=>array("lieux 5"),
							 "niveau"=>array($niveauEntrainement1),
							 "Mardi"=>array("18h00/18h45"),
							 "Vendredi"=>array("18h00/18h45"),
						 ),
						)
					  );
/*7/8ans*/
$horaireEnfant[]=array(AgeDate(7,8,$anneeInscription)=>array( 
					array(
					   "lieu"=>array("Moulin à vent"),
					   "niveau"=>array($niveauEntrainement1),
					   "Lundi"=>array("18h00/19h00"),
					   "Mercredi"=>array("17h00/18h00"),
					   "Vendredi"=>array("18h00/19h00"),
					  ),
				    array(
					   "lieu"=>array("lieux 5"),
					   "niveau"=>array($niveauEntrainement1),
					   "Mardi"=>array("18h45/19h45"),
					   "Jeudi"=>array("18h00/19h00"),
				 	 ),
				));
/*7/11ans*/
$horaireEnfant[]=array(AgeDate(7,11,$anneeInscription)=>array(
					array(
					   "lieu"=>array("Les Grès"),
					   "niveau"=>array($niveauEntrainement1),
					   "Jeudi"=>array("18h45/19h45"),
					  ),
					array(
					   "lieu"=>array("lieux 4"),
					   "niveau"=>array($niveauEntrainement1),
					   "Mardi"=>array("18h00/19h00"),
					   "Vendredi"=>array("18h00/19h00"),
					  ),
				 	array(
					   "lieu"=>array("Vauréal (Toupets)"),
					   "niveau"=>array($niveauEntrainement1),
					   "Mercredi"=>array("16h00/17h00"),
					  ),
					array(
					   "lieu"=>array("Vauréal (Bussie)"),
					   "niveau"=>array($niveauEntrainement1),
					   "Vendredi"=>array("17h30/18h30"),
					  ),
				));

/*9/11ans*/
$horaireEnfant[]=array(AgeDate(9,11,$anneeInscription)=>array(
					array(
					   "lieu"=>array("Moulin à vent"),
					   "niveau"=>array($niveauEntrainement1),
					   "Mardi"=>array("18h45/19h45"),
					   "Mercredi"=>array("18h00/19h00"),
					   "Jeudi"=>array("18h45/19h45"),
					   "Vendredi"=>array("19h00/20h00"),
					  ),
				 	array(
					   "lieu"=>array("lieux 5"),
					   "niveau"=>array($niveauEntrainement1),
					   "Jeudi"=>array("19h00/20h00"),
					   "Vendredi"=>array("18h45/19h45"),
					  ),
				));
/*ados*/
$horaireEnfant[]=array(AgeDate(12,15,$anneeInscription)=>array(
					array(
					   "lieu"=>array("Moulin à vent"),
					   "niveau"=>array($niveauEntrainement1),
					   "Lundi"=>array("19h00/20h00"),
					   "Mercredi"=>array("19h00/20h00"),
					  ),
					array(
					   "lieu"=>array("lieux 4"),
					   "niveau"=>array($niveauEntrainement1),
					   "Mardi"=>array("19h00/20h00"),
					   "Vendredi"=>array("19h00/20h00"),
					  ),
				 	array(
					   "lieu"=>array("Vauréal (Toupets)"),
					   "niveau"=>array($niveauEntrainement1),
					   "Mercredi"=>array("17h00/18h00"),
					  ),
					array(
					   "lieu"=>array("Vauréal (Bussie)"),
					   "niveau"=>array($niveauEntrainement1),
					   "Vendredi"=>array("18h30/19h30"),
					  ),
					array(
					   "lieu"=>array("lieux 5"),
					   "niveau"=>array($niveauEntrainement1),
					   "Mardi"=>array("19h45/20h45"),
					   "Vendredi"=>array("19h45/20h45"),
					  ),
				));

/*compétitions jeune*/
$horaireEnfant[]=array(AgeDate(9,15,$anneeInscription)=>array(
					array(
					   "lieu"=>array("Moulin à vent"),
					   "niveau"=>array($niveauEntrainement2),
					   "Samedi"=>array("12h30/14h00"),
					  ),
					array(
					   "lieu"=>array("Les Grès"),
					   "niveau"=>array($niveauEntrainement2),
					   "Lundi"=>array("18h30/20h00"),
					   "Mercredi"=>array("18h00/19h30"),
					  ),
				 	array(
					   "lieu"=>array("Vauréal (Bussie)"),
					   "niveau"=>array($niveauEntrainement2),
					   "Mardi"=>array("18h00/19h30"),
					  ),
				));




/*adultes*/
$horaire[]=array( "adultes"=>
					array(
					   "lieu"=>array("Moulin à vent"),
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
				);

/*compétitions adultes*/
$horaire[]=array( "competition_adultes"=>
				 	array(
					   "lieu"=>array("Moulin à vent"),
					   "Samedi"=>array("12h30/14h00"),
					  ),
					array(
					   "lieu"=>array("Les Grès"),
					   "Lundi"=>array("20h00/21h30"),
					   "Mercredi"=>array("20h00/21h30"),
					  ),
				);


/*Body Taek Fit*/
$horaire[]=array( "self_defense"=>
					array(
					   "lieu"=>array("Moulin à vent"),
					   "Jeudi"=>array("20h30/21h30"),
					   "Samedi"=>array("12h30/13h30"),
					  ),
				);


/*=============Tableau Horaires========================*/


/*=================Fonction forEach===============*/
function forEachTrois($tableau){
	$niveau=key($tableau);
	foreach($tableau as $key=>$value){
		echo "<strong style='text-decoration:underline;'>".$tableau[$key]["lieu"][0].":</strong>";
		
		foreach($value as $key2=>$value2){
				foreach($value2 as $key3=>$value3){
					if($key2!="lieu" && $niveau=="self_defense"){
					?>
					<p class="radio">
						<input type="checkbox" name="lieuEntrainement" id="<?php echo "lieuEntrainement_".$niveau."_".$key.$key2.$key3; ?>" value="<?php echo $niveau.":".$tableau[$key]["lieu"][0].":".$key2.":".$value3;?>" <?php if($_SESSION["lieuEntrainement"]==$tableau[$key]["lieu"][0].":".$value3){ echo "checked";} ?>>
						<label for="<?php echo "lieuEntrainement_".$niveau."_".$key.$key2.$key3; ?>"><span></span></label>
						<label for="<?php echo "lieuEntrainement_".$niveau."_".$key.$key2.$key3; ?>">
						<?php echo $key2.": ".$value3; ?>
							<span class=""></span>
						</label>
					</p>
				<?php	} else if($key2!="lieu" && ($niveau=="adultes" || $niveau=="competition_adultes")){ ?>
						<p class="radio">
						<?php echo $key2.": ".$value3; ?>
						</p>
					<?php }

				}
		}
	} 
}
/*=================Fonction forEach===============*/

/*==========Fonction forEach Age Horaire=============*/
function forEachTroisAge($tableau,$dateNaissance,$niveauEntrainement){

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
			echo "<strong style='text-decoration:underline;'>".key($value).":</strong>";
			foreach($value as $key2=>$value2){
				foreach($value2 as $key3=>$value3){
						foreach($value3 as $key4=>$value4){
							$niveau=$value3["trancheAge"][0];
				if($key4!="lieu" && $key4!="niveau" && $key4!="trancheAge"){
							foreach($value4 as $key5=>$value5){ ?>
							<?php if($niveauEntrainement!="Competiteur"){ ?>
								<p class="radio">
									<input type="checkbox" name="lieuEntrainement" id="<?php echo "lieuEntrainement_".str_replace("/", "_", $niveau)."_".$key.$key3.$key4.$key5; ?>" value="<?php echo $niveau.":".$value3["lieu"][0].":".$key4.":".$value5;?>" <?php if($_SESSION["lieuEntrainement"]==$niveau.":".$value3["lieu"][0].":".$key4.":".$value5){ echo "checked";} ?>>
									<label for="<?php echo "lieuEntrainement_".str_replace("/", "_", $niveau)."_".$key.$key3.$key4.$key5; ?>"><span></span></label>
									<label for="<?php echo "lieuEntrainement_".str_replace("/", "_", $niveau)."_".$key.$key3.$key4.$key5; ?>">
									<?php echo $key4.": ".$value5; ?>
										<span class=""></span>
									</label>
								</p>
								<?php }else { ?>
								<p class="radio">
									<label>
									<?php echo $key4.": ".$value5; ?>
									</label>
								</p>
								<?php } ?>
					<?php	}
				}			


					  }
					} 
				}
			}
		
}
/*==========Fonction forEach Age Horaire=============*/


/*==============Fonction ForEach Horaires Info==============*/
function forEachTroisInfo($tableau){
	$niveau=key($tableau);
	foreach($tableau as $key=>$value){
		echo "<strong style='text-decoration:underline;'>".$tableau[$key]["lieu"][0].":</strong>";
		
		foreach($value as $key2=>$value2){
				foreach($value2 as $key3=>$value3){
					if($key2!="lieu"){
					?>
					<p class="radio">
						<?php echo $key2.": ".$value3; ?>
					</p>
				<?php	}

				}
		}
	} 
}
/*==============Fonction ForEach Horaires Info==============*/

/*=================Fonction Age===================*/
function Age($date_naissance)
                {
                    $arr1 = explode('/', $date_naissance);
                    $arr2 = explode('/', date('d/m/Y'));
                        
                    if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[0] <= $arr2[0])))
                    return $arr2[2] - $arr1[2];

                    return $arr2[2] - $arr1[2] - 1;
                }

function AgeDate($age1,$age2,$annee){
	$anneeExplode= explode("/",$annee);
	$annee=$anneeExplode[0];
	$anneeMax=$annee-$age1;
	$anneeMin=$annee-$age2;
	return "$anneeMax/$anneeMin";
}
/*=================Fonction Age===================*/

/*===============Tarifs Doboks====================*/
$tarifDobok[]=[["prix"=>30],["Marque"=>"doubleY"],["EquipementName"=>"Dobok"],["ValeurSelect"=>"La tenue de Taekwondo"],["Taile"=>["100 cm","110 cm","120 cm","130 cm","140 cm"]],["className"=>"Dobok"]];
$tarifDobok[]=[["prix"=>35],["Marque"=>"doubleY"],["EquipementName"=>"Dobok"],["ValeurSelect"=>"La tenue de Taekwondo"],["Taile"=>["150 cm","160 cm","170 cm","180 cm","190 cm","200 cm","210 cm"]],["className"=>"Dobok"]];
/*===============Tarifs Doboks====================*/

/*=============function select Doboks=============*/
function equipementTarif ($tableau){
	
	echo "<strong class='modal_sous_titre'>".$tableau[0][2]["EquipementName"].":</strong> (Achat facultatif)<br>";
	echo "<select class=".$tableau[0][5]["className"]." name=".$tableau[0][2]["EquipementName"].">";
	echo "<option value=''>".$tableau[0][3]["ValeurSelect"]."</option>";
	foreach($tableau as $key=>$value){
		foreach($value as $key2=>$value2){ 
			foreach($value2 as $key3=>$value3){ 
			    if(is_array($value3)){
			       foreach($value3 as $key4=>$value4){ ?>
			           <option value="<?php echo $value4.":".$value[2]["EquipementName"].":".$value[1]["Marque"].":".$value[0]["prix"]; ?>"><?php echo $value4." : ".$value[0]["prix"]."€"?></option>
			      <?php }
			   } 
			}
		}
	}
	echo "</select>";
}
/*=============function select Doboks=============*/