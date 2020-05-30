var $j = jQuery.noConflict();
$j(document).ready(function(){ // carregar pagina primeiro
	
	if (typeof localStorage.status =="undefined"){
		$j("#corpo").css("display", "none");
	 }else if (typeof localStorage.status) {
	 	$j("#credencial").css("display", "none");
		$j("#corpo").css("display", "");
		$j("#retorno").css("display", "");
		$j("#div_inicial").css("display", "none")
	 }

	$j("#cod").keydown(function(event){

	 	var tecla = event.keyCode;
	 	var text = $j('#cod').val();	
	 	if (tecla == 13 && text == "teste") {
	 		$j("#credencial").css("display", "none");
			 $j("#corpo").css("display", "");
			 $j("#div_inicial").css("display", "none")
	 		localStorage.setItem("status", "ativo");
	 	}else if (tecla == 13 && text != "teste") {
	 		alert("Errado");
	 	}
	 });

	$j('#enter').bind('click', function(){
		var text = $j('#cod').val();
		if (text == "teste") {
			$j("#credencial").css("display", "none");
			$j("#corpo").css("display", "");
			$j("#retorno").css("display", "");
			$j("#div_inicial").css("display", "none")
			localStorage.setItem("status", "ativo");
		}
	});

	$j('#retorno').bind('click', function(){
		localStorage.removeItem("status");
		window.location.href = window.location.href;
		
	})


});