
$( document ).ready(function() { 
	
	
	$( ".file" ).click(function() {
		$(this).find("input[type=file]").on('change', function() {
			$(this).next("label").addClass("fileOk");
			$(this).next("label").html("Fichier selectionné");
		});
		
	});

});

/*$( document ).ready(function() { 

$( "input[type=file]" ).change(function() {
  		var valueFIle= $("input[type=file]").val();
		if(valueFIle!=""){
			$(this).find("label").addClass("fileOk");
		}
	});

});*/