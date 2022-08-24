$(document).ready(function(){
	var equipement=["Dobok"];
	
	var choixEquipement = $(".choixEquipement");
	
	$.each(choixEquipement,function(){
		$(this).on("click",function(){
			inputChoixEquipement=$(this).parent().find(".choixEquipementTotal");
			$(".modal-choixEquipement .btn .Fermer").html("Enregistrer");
			for(var i=0;equipement.length>i;i++){
			equipementChoix = $(this).parent().find(".choix"+equipement[i]);
			equipementChoixVal = equipementChoix.val();
			equipementSelect.val(equipementChoixVal);
			}
		});
	});

	for(var i=0;equipement.length>i;i++){
		var equipementSelect = $("."+equipement[i]);
		$.each(equipementSelect,function(){
			$(this).on("change",function(){
				equipementSelectVal = equipementSelect.val();
				equipementChoix.val(equipementSelectVal);
				if(equipementSelectVal!=""){inputChoixEquipement.val("True");}else{inputChoixEquipement.val("");}
			});
		});
	}

	
});
