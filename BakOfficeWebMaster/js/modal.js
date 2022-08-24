$( document ).ready(function() {
	var heightDocument=$(document).height();
	$(".modalStructure-global").css("height",heightDocument);
	var scrollTop = $(window).scrollTop()+150;
	$(".modalStructure").css("margin-top",scrollTop);
	
	$(".modal").on("click",function(){
			$(".modalStructure-global").show();
			$(".modalStructure").show();
	});
	
	$(".modalStructure-global").on("click",function(){
			$(".modalStructure-global").hide();
			$(".modalStructure").hide();
	});
	
	$(".button2").on("click",function(){
			$(".modalStructure-global").hide();
			$(".modalStructure").hide();
	});
	
	
});