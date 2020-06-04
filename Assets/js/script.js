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
		$j("#voltar").css("display", "");
	 }

	$j("#cod").keydown(function(event){ // Entrar apertando enter
	 	var tecla = event.keyCode;
	 	var text = $j('#cod').val();	
	 	if (tecla == 13 && text == "teste") {
	 		$j("#credencial").css("display", "none");
			$j("#corpo").css("display", "");
			$j("#div_inicial").css("display", "none");
			$j("#pesquisa").css("display", "");
			$j("#voltar").css("display", "");
			$j("#retorno").css("display", "");
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
			$j("#voltar").css("display", "");
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
	$j("#corpo").on('click',".ruas",function(){
		var letra = $j(this).attr('id');
		var dados="funcao=carregarRua&letra="+letra;
		$j.ajax({
			type:'POST',
			dataType:"html",
			async: false,
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

	$j('#corpo').on("click",".tbl_paletes td",function(){
		var id = $j(this).attr("id");
		var empty = $j(this).data("ativo");
		if(empty != "cancel"){
			$j.ajax({
			type:'POST',
			dataType:"html",
			async: false,
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
	
	$j('#voltar').on("click",function(){
		var botao = $j(this);
			$j.ajax({
			type:'POST',
			dataType:"html",
			async: false,
			url:'script.php',
			data:"funcao=carregarRuas",
			success:function(resp){
				$j('#corpo').html(resp);

			},
			error:function(){
				console.log("error no ajax");
			}
		});
		$j("#palavraChave_txt").val("");
		
	});
	$j('#corpo').on("submit",".formAddProd",function(aux){
		aux.preventDefault();
		var form = $j(this);
		var dados = form.serialize();
		dados +="&id="+form.prop("id").substr(3);;
		dados +="&funcao=addProduto"; 
		$j.ajax({
			type:'POST',
			dataType:"html",
			async: false,
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
	$j("#corpo").on("click", "#btnEntrada",function(){
		var valor = prompt("Quantidade de entrada:");
		var valor = valor.replace(/[-]+/g, '');
		if(valor != null){
			var id = $j(this).parent().parent().prop("id");
			id.substr(3);
			$j.ajax({
				type:'POST',
				dataType:"html",
				async: false,
				url:'script.php',
				data:"funcao=entrada&id="+id+"&qtd="+valor,
				success:function(resp){
					$j('#corpo').html(resp);

				},
				error:function(){
					console.log("error no ajax");
				}
			});
		}
		
	});
	$j("#corpo").on("click", "#btnSaida",function(){
		var valor = prompt("Quantidade de saída:");
		var valor = valor.replace(/[-]+/gi, '');
		var qtd = $j(this).parent().parent().find(".qtd").html();
		if((valor != null) && (valor <= qtd)){
			var id = $j(this).parent().parent().prop("id");
			id.substr(3);
			$j.ajax({
				type:'POST',
				dataType:"html",
				async: false,
				url:'script.php',
				data:"funcao=saida&id="+id+"&qtd="+valor,
				success:function(resp){
					$j('#corpo').html(resp);
				},
				error:function(){
					console.log("error no ajax");
				}
			})
		}else{
			alert("Valor inválido!");
		}
		;
	});
	$j("#corpo").on("click", "#btnDeleta",function(){
		var valor = confirm("Deseja deletar?");
		if (valor) {
			var id = $j(this).parent().parent().prop("id");
			id.substr(3);
			$j.ajax({
				type:'POST',
				dataType:"html",
				async: false,
				url:'script.php',
				data:"funcao=deleta&id="+id,
				success:function(resp){
					$j('#corpo').html(resp);
				},
				error:function(){
					console.log("error no ajax");
				}
			});
		}
		
	});

	$j("#corpo").on("submit", ".alterar_prod",function(aux){
		aux.preventDefault();
		var form = $j(this);
		var dados = form.serialize();
		dados +="&id="+form.prop("id").substr(3);
		dados +="&funcao=alteraProduto"; 
		$j.ajax({
				type:'POST',
				dataType:"html",
				async: false,
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
	$j("#btnPesquisar").on("click",function(){
		var palavraChave = $j("#palavraChave_txt").val().trim();
		if (palavraChave.length > 0) {
			$j.ajax({
				type:'POST',
				dataType:"html",
				async: false,
				url:'script.php',
				data:"funcao=pesquisa&chave="+palavraChave,
				success:function(resp){
					$j('#corpo').html(resp);
				},
				error:function(){
					console.log("error no ajax");
				}
			});
		}
	});

	$j("#palavraChave_txt").keydown(function(event){ // Entrar apertando enter
	 	var tecla = event.keyCode;	
	 	var palavraChave = $j("#palavraChave_txt").val();
	 	if (tecla == 13) {
	 		$j.ajax({
				type:'POST',
				dataType:"html",
				async: false,
				url:'script.php',
				data:"funcao=pesquisa&chave="+palavraChave,
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