$( document ).ready(function() {
	$(".nav .menu,.nav h1").click(function() {
			//var heightWindow=$(document).height()-$(".nav").innerHeight();
			var heightWindow=$(document).height();
			var heightMenu = $(".globalNav").height();
			$(".contenu").css("height",heightWindow+heightMenu);
			
			$(".contenu").slideToggle(3000);		
			$(".contenu .menu").slideToggle(3000);		
			//$(".contenu").css("min-height","0px");
			var MenuShow = $(".contenu .menu").attr("style");
		
		if(	$(".nav .menu img").attr("src") == "img/btn-menu.png" ){
		   	$(".nav .menu img").attr("src","img/btn-menu-close.png");
		   } else if ($(".nav .menu img").attr("src") == "img/btn-menu-close.png" ) {
		   	$(".nav .menu img").attr("src","img/btn-menu.png");
		   }
		
		
		if(	$(".nav .menu img").attr("src") == "../img/btn-menu.png" ){
		   	$(".nav .menu img").attr("src","../img/btn-menu-close.png");
		   } else if ($(".nav .menu img").attr("src") == "../img/btn-menu-close.png") {
		   	$(".nav .menu img").attr("src","../img/btn-menu.png");
		   }
		
	});

});