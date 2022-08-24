$( document ).ready(function() { 
var i = 0;	
	
/*==================Fonction Modal==============*/	
function modal (value){
	$("body").on("click","."+value,function(){
	//$("."+value).on("click",function(){
			
		
		
	/*==========Position modal========*/
		//var heightWindows =$(window).height();
		var scrollTop = $(window).scrollTop();
		$("#"+value+"Modal").css("top",scrollTop-100);
	/*==========Position modal========*/	
	
		
	/*==========Height modal bg=======*/	
		var heightBody = $("body").height();
		var heightModal= $("#"+value+"Modal").height();
		$(".modal-bg-flou").css("height",heightBody+scrollTop+200);
	/*==========Height modal bg=======*/	
		
	i=0;
	$(".modal-bg-flou,#"+value+"Modal").show();
	var p4 = $("#"+value+"Modal .modal-container .btn").parent().find(".page");
	if(p4.length>1){
		p4.addClass("none");
		p4.eq(0).removeClass("none");
		$(".modal-container .btn").css("padding","10px 0");
		$(".modal-container .btn").html("Suivant");	
	} else { p4.eq(0).removeClass("none"); $("#"+value+"Modal .modal-container .btn").html("<div class='Fermer'>Fermer</div>");	$(".modal-container .btn").css("padding",0);}
	});

}
	
/*==================Fonction Modal==============*/	
	

/*===============Réglement===============*/

modal("reglement");	

/*===============Réglement===============*/

/*===============Licence===============*/

modal("licence");

/*===============Licence===============*/	
	
	
/*===============Lieu Entrainement===============*/

modal("lieuEntrainement");

/*===============Lieu Entrainement===============*/	
	
/*===============Lieu Entrainement Info===============*/

modal("lieuEntrainementInfo");

/*===============Lieu Entrainement Info===============*/
	
	
/*===============Mentions Légales===============*/

modal("mentionsLegales");

/*===============Mentions Légales===============*/
	
	
/*===============Mentions Légales===============*/

modal("CGU");

/*===============Mentions Légales===============*/
	
/*===============Erreur===============*/

modal("erreur");

/*===============Erreur===============*/	

	
/*============Choix equipement========*/
modal("choixEquipement");	
/*============Choix equipement========*/	
	
/*===============Hide Modal==============*/
$(".modal-bg-flou").on("click",function(){
	$(".modal-bg-flou,.modal-bg-container").hide();
});
/*===============Hide Modal==============*/

/*============Fonctionement Modal========*/
$(".modal-container .btn").on("click",function(){
	var	p = $(this).parent().find(".page");
	if($(".modal-container .btn").html()=="Suivant"){
		p.addClass("none");
		p.eq(i+1).removeClass("none");
	}
	
	if(p.length>i+1){i++;}
				
	if( p.eq(p.length-1).hasClass("none") == false ){		
		$(".modal-container .btn").html("<div class='Fermer'>Fermer</div>");
		$(".modal-container .btn").css("padding",0);
		i=0;
	}			
});
		
$(".modal-container .btn").on("click",".Fermer",function(){	
	$(".modal-bg-flou,.modal-bg-container").hide();	
});
/*============Fonctionement Modal========*/
});
