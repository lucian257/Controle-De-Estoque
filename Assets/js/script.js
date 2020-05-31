var $j = jQuery.noConflict();
$j(document).ready(function(){ // carregar pagina primeiro

	var hours = 5; // Reset when storage is more than 24hours
	var now = new Date().getTime();
	var setupTime = localStorage.getItem('setupTime');
	
	if (typeof localStorage.status =="undefined" || (now-setupTime > hours*60*60*1000) ){
			    
		localStorage.clear()
		localStorage.setItem('setupTime', now);
			
		$j("#corpo").css("display", "none");
		$j("#div_inicial").css("display", "");
	 }else if (typeof localStorage.status && setupTime != null) {

		localStorage.setItem('setupTime', now)
			
	 	$j("#credencial").css("display", "none");
		$j("#corpo").css("display", "");
		$j("#retorno").css("display", "");
		$j("#div_inicial").css("display", "none");
		$j("#pesquisa").css("display", "");
	 }

	$j("#cod").keydown(function(event){ // Entrar apertando enter

	 	var tecla = event.keyCode;
	 	var text = $j('#cod').val();	
	 	if (tecla == 13 && text == "teste") {
	 		$j("#credencial").css("display", "none");
			$j("#corpo").css("display", "");
			$j("#div_inicial").css("display", "none");
			$j("#pesquisa").css("display", "");
			localStorage.setItem('setupTime', now);
	 		localStorage.setItem("status", "ativo");
	 	}else if (tecla == 13 && text != "teste") {
	 		alert("Errado");
	 	}
	 });

	$j('#enter').bind('click', function(){ // Entrar apertando o botao 
		var text = $j('#cod').val();
		if (text == "teste") {
			$j("#credencial").css("display", "none");
			$j("#corpo").css("display", "");
			$j("#retorno").css("display", "");
			$j("#div_inicial").css("display", "none");
			$j("#pesquisa").css("display", "");
			localStorage.setItem('setupTime', now);
			localStorage.setItem("status", "ativo");
		}
	});

	$j('#retorno').bind('click', function(){ // Icone de voltar
		localStorage.removeItem("status");
		window.location.href = window.location.href;
		
	})
	$j(".ruas").bind('click',function(){
		var letra = $j(this).attr('id');
		var dados="funcao=carregarRua&letra="+letra;
		$j.ajax({
			type:'POST',
			url:'script.php',
			data:dados,
			success:function(resp){
				$j('#corpo').html(resp);
			},
			error:function(){
				console.log("error no ajax");
			}
		});
	});
	$j('#btnVoltar').bind('click',function(){
		alert("ceeerto");
		$j.ajax({
			type:'POST',
			url:'script.php',
			data:"funcao=carregarRuas",
			success:function(resp){
				$j('#corpo').html(resp);
			},
			error:function(){
				console.log("error no ajax");
			}
		});
	});

	$j('.tbl_paletes td').bind("click",function(){
		var id = $j(this).attr("id");
		if(id != "cancel"){
			$j.ajax({
			type:'POST',
			url:'script.php',
			data:"funcao=carregarPalete&id="+id,
			success:function(resp){
				$j('#corpo').html(resp);
			},
			error:function(){
				console.log("error no ajax");
			}
			});
		}
		
	});


});