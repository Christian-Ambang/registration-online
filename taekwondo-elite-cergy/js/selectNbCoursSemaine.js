$( document ).ready(function() {
var	nbCoursSemaine = [];
nbCoursSemaine.push([1,"adultes","self_defense","tkd1erAge","baby"]);
nbCoursSemaine.push([2,"self_defense","baby","enfant_1","enfant_2","enfant_3","enfant_4","enfant_5","ados"]);
nbCoursSemaine.push([3,"competition_adultes","competition_jeunes"]);
nbCoursSemaine.push([5,"adultes"]);
	
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
		
});
	
		
$(".niveau,.niveau option").on("change click select",function(){
		var niveau = $(this).val();
		var indexNiveau = $(this).attr("data-index")-1;

		optionAll[indexNiveau].detach();
		
		for(var i=0;nbCoursSemaine.length>i;i++){
			if($.inArray(niveau, nbCoursSemaine[i]) > -1){
			var optionSearch = optionAllDetach[indexNiveau].filter("option[value="+nbCoursSemaine[i][0]+"]");
			select[indexNiveau].append(optionSearch);		
			}
		}
	});
});
