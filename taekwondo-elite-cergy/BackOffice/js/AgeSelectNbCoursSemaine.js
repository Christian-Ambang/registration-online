$( document ).ready(function() {
	
function AgeDate(age1,age2,annee){
	var anneeMax= annee-age1;
	var anneeMin= annee-age2;
	return anneeMax+"/"+anneeMin;
}

	
function dateNaissance (date){
			var numeriqueTransforme = date.replace(/\//g,"");
			var numerique = $.isNumeric(numeriqueTransforme);
			var nbNumerique = numeriqueTransforme.toString();
			var dateExtrat = date.split("/");
			var jour = dateExtrat[0];
			var mois = dateExtrat[1];
			var annee = dateExtrat[2];
			var naissance = new Date(mois+"/"+jour+"/"+annee);

			if(numerique==true && nbNumerique.length == 8 && naissance!="Invalid Date"){
			//if(isNaN(numeriqueTransforme)==false && nbNumerique.length == 8 && naissance!="Invalid Date"){
				chaineValide=true;
			}else {
				chaineValide=false;
			}
			return chaineValide;
}
	
function ageComprisEntre (anneeValide,trancheAge){
	var trancheAgeExplode = trancheAge.split("/");
	var trancheMax =  trancheAgeExplode[0];
	var trancheMin =  trancheAgeExplode[1];
	
	var anneeValideExplode = anneeValide.split("/");
	var annee = anneeValideExplode[2];
	
	if(annee<=trancheMax && annee>=trancheMin){
		return true;
	}else{ 
		return false;
	}
}
	
var anneeInsciption = parseInt($("input[name=anneeInscription]").val()); 	
	
var	nbCoursSemaine = [];
nbCoursSemaine.push([1,"ToutNiveau",AgeDate(4,5,anneeInsciption)]);
nbCoursSemaine.push([2,"ToutNiveau",AgeDate(5,15,anneeInsciption)]);
nbCoursSemaine.push([3,"Competiteur",AgeDate(9,15,anneeInsciption)]);
	
optionAll = [];
optionAllSelected = [];
optionAllDetach = [];
selectAllSelected = [];
select=[];
	

var nbcoursSemaine = $(".nbCoursSemaine");
$.each(nbcoursSemaine,function(key,val){
		
		optionAll.push($(this).find(".displayNone"));
		
		optionAllSelected.push($(this).find(".displayNone:selected"));
		
		selectAllSelected.push(optionAllSelected[key].detach());
	
		optionAllDetach.push(optionAll[key].detach());
				
		select.push($(this));
		$(this).append(optionAllSelected[key].detach());
	
		/*Verification + popup erreur sur niveau et date naissance*/
			//$(this).on("click",function(){
	
			//});
		/*Verification + popup erreur*/
		
});

	
optionAllNiveau = [];
optionAllSelectedNiveau = [];
optionAllDetachNiveau = [];
selectAllSelectedNiveau = [];
selectNiveau=[];
	
var NiveauEntrainement = $(".niveauEntrainement");
$.each(NiveauEntrainement,function(key,val){
		optionAllNiveau.push($(this).find(".displayNone"));
		
		optionAllSelectedNiveau.push($(this).find(".displayNone:selected"));
		
		selectAllSelectedNiveau.push(optionAllSelectedNiveau[key].detach());
	
		optionAllDetachNiveau.push(optionAllNiveau[key].detach());
				
		selectNiveau.push($(this));
		$(this).append(optionAllSelectedNiveau[key].detach());

});	
	
		
$(".niveauEntrainement,.naissanceEnfant").on("change",function(){
//$(".niveauEntrainement").change(function(){
//$(".nbCoursSemaine").on("click",function(){
		/*=============Initialisation choix créneau horaire==============*/
			$(".choix_1").val("");
			$(".choix_2").val("");
		/*=============Initialisation choix créneau horaire==============*/
	
		var indexNiveau = $(this).attr("data-index")-1;
		optionAll[indexNiveau].detach();
		
		var dateVal = $(".naissanceEnfant").val();	
		var niveauVal = $(".niveauEntrainement").val();
	
		if(dateNaissance(dateVal)==true && niveauVal!=""){
			for(var i=0;nbCoursSemaine.length>i;i++){
			if(ageComprisEntre(dateVal,nbCoursSemaine[i][2])==true && niveauVal==nbCoursSemaine[i][1]){
				var optionSearch = optionAllDetach[indexNiveau].filter("option[value="+nbCoursSemaine[i][0]+"]");
				select[indexNiveau].append(optionSearch);
			}
		}
		}	
	});
	
	
$(".naissanceEnfant").on("change",function(){
		
		var indexNiveau = $(this).attr("data-index")-1;
		optionAllNiveau[indexNiveau].detach();
		
		var dateValNiveau = $(this).val();
		//=========== Proposition niveau selon année de naissance=======
		if(dateNaissance(dateValNiveau)==true){
			for(var i=0;nbCoursSemaine.length>i;i++){
				if(ageComprisEntre(dateValNiveau,nbCoursSemaine[i][2])){
					var optionSearchNiveau = optionAllDetachNiveau[indexNiveau].filter("option[value="+nbCoursSemaine[i][1]+"]");
					selectNiveau[indexNiveau].append(optionSearchNiveau);
				}
			}
		}
		//=========== Proposition niveau selon année de naissance=======

	});
	
	//Modal erreur
	 /*	//var parent = $(this).parent();
		var spanNiveauEntrainement = $(".spanNiveauEntrainement");
		$(spanNiveauEntrainement).on("click",function(){
			var dateErreur = $(this).parent().find(".naissanceEnfant").val();
			var niveauEntrainementDisabled = $(this).find(".niveauEntrainement");
			//$(this).css("z-index",500);
			//$(niveauEntrainementDisabled).css("z-index",-1);
			//var option = $(this).find("option");
			//console.log(dateErreur);
			//console.log(dateNaissance(dateErreur));
			if(dateNaissance(dateErreur)==false){
				$(this).addClass("erreur");
				$(niveauEntrainementDisabled).attr("disabled","disabled");
				$("#erreurModal .modalite").html("Veuillez d'abord renseigner une date de naissance valide.");
				}else
				{
				 $(this).removeClass("erreur");
				 $(niveauEntrainementDisabled).attr("disabled","");
				}
			}); */
		//Modal erreur
	
	
});
