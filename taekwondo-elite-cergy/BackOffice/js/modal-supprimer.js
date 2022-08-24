$( document ).ready(function() {
	//var heightMenu = $(".globalNav").height();
	
	
	$(".supprimer").on("click",function(){
			var heightDocument=$(document).height();
			var scrollTop = $(window).scrollTop()+150;

			$(".modalStructure-global-supprimer").show();
			$(".modalStructure-supprimer").show();
			$(".modalStructure-supprimer").css("margin-top",scrollTop);
			$(".modalStructure-global-supprimer").css("height",heightDocument);

	});
	
	$(".modalStructure-global-supprimer").on("click",function(){
			$(".modalStructure-global-supprimer").hide();
			$(".modalStructure-supprimer").hide();
	});
	
	$(".button2-supprimer").on("click",function(){
			$(".modalStructure-global-supprimer").hide();
			$(".modalStructure-supprimer").hide();
	});
	
	
});