$( document ).ready(function() {
	//var heightMenu = $(".globalNav").height();
	
	
	$(".inscrire").on("click",function(){
			var heightDocument=$(document).height();
			var scrollTop = $(window).scrollTop()+150;

			$(".modalStructure-global-inscrire").show();
			$(".modalStructure-inscrire").show();
			$(".modalStructure-inscrire").css("margin-top",scrollTop);
			$(".modalStructure-global-inscrire").css("height",heightDocument);

	});
	
	$(".modalStructure-global-inscrire").on("click",function(){
			$(".modalStructure-global-inscrire").hide();
			$(".modalStructure-inscrire").hide();
	});
	
	$(".button2-inscrire").on("click",function(){
			$(".modalStructure-global-inscrire").hide();
			$(".modalStructure-inscrire").hide();
	});
	
	
});