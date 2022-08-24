<?php  
session_start();

if(isset($_GET["ini"])){unset($_SESSION);}
$URI="/BakOfficeWebMaster";

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
	/*$retourEmail="";
	foreach($BDDtest as $key=>$value){
		$retourEmail.=strpos($email, $BDDtest[$key]["Email"]);
	}
	if ($retourEmail==""){$chaineValideEmail=true;}else{$chaineValideEmail=false;}
	
	
	$retourNom="";
	foreach($BDDtest as $key=>$value){
		$retourNom.=strpos($nom, $BDDtest[$key]["Nom"]);
	}
	if ($retourNom==""){$chaineValideNom=true;}else{$chaineValideNom=false;}

	if ($chaineValideEmail==true && $chaineValideNom==true){$chaineValide=true;}else{$chaineValide=false;}
	
	return($chaineValide);*/
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


function uploadFichier ($name,$dossier,$nameFichier,$arrayExtentionOblig,$compteur){
			// Création du dossier si il n'existe pas
			$dossierPhotos = $dossier;
				
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

function Genere_Password($size)
{
    // Initialisation des caractères utilisables
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

    for($i=0;$i<$size;$i++)
    {
        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
    }
		
    return $password;
}