<?php include_once("parametres.php");

$datePOST = explode("/",$_POST["anneeNaissance"]);
$anneeNaissance = $datePOST[2]; 

$tableauPush = [];

foreach($horaireEnfant as $cle=>$value){

$filtered = array_filter(
    $horaireEnfant[$cle],
    function ($val, $key) use ($anneeNaissance) {
		
		$explodeDate=explode("/",$key);
		if($anneeNaissance<=$explodeDate[0] && $anneeNaissance>=$explodeDate[1]){
			return $val;
		}	
				
	}
    ,
    ARRAY_FILTER_USE_BOTH
	); 

if(!empty($filtered)){array_push($tableauPush,$filtered);}
}


forEachTroisAge($tableauPush,$_POST["anneeNaissance"],$_POST["niveau"]);
