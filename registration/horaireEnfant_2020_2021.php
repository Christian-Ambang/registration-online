<?php include_once("parametres.php"); 
	
	echo "<h1>Saison ".$anneeInscription."</h1>";
	$age= explode('/',$anneeInscription);
	$ageAnnee=$age[0];
	foreach($horaireEnfant as $key=>$value){
		$ageAnnee2=explode('/',key($value));
		$age1=$ageAnnee-$ageAnnee2[0];
		$age2=$ageAnnee-$ageAnnee2[1];
		$concatAge=" (".$age1."/".$age2."ans)";
		echo "<hr><strong style='text-decoration:underline;color:red'>".key($value).$concatAge.":</strong><br>";
		foreach($value as $key2=>$value2){
			foreach($value2 as $key3=>$value3){
				echo "<hr>";
				foreach($value3 as $key4=>$value4){
					foreach($value4 as $key5=>$value5){
						echo $key4.": ".$value5."<br>";
					}	
				}	
			}
		}
	}