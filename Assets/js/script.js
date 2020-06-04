var $j = jQuery.noConflict();
$j(document).ready(function(){ // carregar pagina primeiro #6495ED #6495ED

	var hours = 5; // Reset when storage is more than 24hours
	var now = new Date().getTime();
	var setupTime = localStorage.getItem('setupTime');
	var pesquisaNome = 0;
	var selected = [];
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
		if(pesquisaNome == 0){
			var dados = form.serialize();
			dados +="&id="+form.prop("id").substr(3);
			dados +="&funcao=addProduto&categoria_slc=TV"; 
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
			
		}else{
			var id = form.prop("id").substr(3);
			var valor = $j("#qtd_txt2").val();
			$j.ajax({
				type:'POST',
				dataType:"html",
				async: false,
				url:'script.php',
				data:"funcao=entrada&id="+pesquisaNome+"&qtd="+valor,
				success:function(resp){
					$j('#corpo').html(resp);

				},
				error:function(){
					console.log("error no ajax");
				}
			});
		}
		pesquisaNome=0;
		
		
	});
	$j("#corpo").on("keydown","#txtNome",function(){
		$j(".velhoRest").css("display", "none");
		$j(".novoRest").css("display", "none");
		$j("#btnNome").css("display", "block");
	});
	$j("#corpo").on("click","#btnNome",function(){
		$j(".modall").css("height", 700)
		$j(this).css("display", "none");
		var nome = $j("#txtNome").val();
		var palete = $j(".formAddProd").prop("id").substr(3);
		$j.ajax({
			type:'POST',
			dataType:"text",
			async: false,
			url:'script.php',
			data:"funcao=existeNome&nome="+nome+"&palete="+palete,
			success:function(resp){
				if (resp) {
					pesquisaNome = resp;
					$j(".velhoRest").css("display", "block");
					$j("#qtd_txt2").removeAttr("disabled");
					$j("#qtd_txt").prop("disabled","disabled");
				}else{
					pesquisaNome = 0;
					$j(".novoRest").css("display", "block");
					$j("#qtd_txt2").prop("disabled","disabled");
					$j("#qtd_txt").removeAttr("disabled");
				}
				
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
		var valor = parseInt(prompt("Quantidade de saída:"), 10);
		var qtd = parseInt($j(this).parent().parent().find(".qtd").html(), 10);
		
		if(!Number.isNaN(valor)){
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
				alert("Valor inválido ou maior que quantidade!");
			}
		}
		
		
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
		dados +="&funcao=alteraProduto&categoria_slc=TV"; 
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
		}else{
			$j('#corpo').html("<h2 style='color:#dedede;'>Não encontrado!</h2>");
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



	$j("#corpo").on("change",".checks",function(){
		var valor = $j(this).data("chk");
		if(valor=="all"){
			if($j(this).is(':checked')){
				selected = [];
				$j(".checks").each(function(chave,iten){
					$j(iten).prop("checked","checked");
					if (iten.dataset.chk != "all") {
						selected.push(parseInt(iten.dataset.chk,10));
					}
				});
			}else{
				$j(".checks").each(function(chave,iten){
					$j(iten).prop("checked",false);
				});
				selected = [];
			}
			
		}else{
			if ($j(this).is(':checked')) {
				selected.push(valor);
			}else{
				selected.splice(selected.indexOf(valor), 1);	
				$j("#chk_all").prop("checked",false);
			}
		}
		if (selected.length > 0) {
			$j(".acaoCheck").css("display","");
			$j("#lblQtd").html("("+selected.length+")");
		}else{
			$j(".acaoCheck").css("display","none");
		}
		
			
	});

	$j("#corpo").on("click", "#btnEntradaCHK",function(){
		var valor = prompt("Quantidade de entrada:");
		var valor = valor.replace(/[-]+/g, '');
		if(valor != null){
			var id = selected;
			$j.ajax({
				type:'POST',
				dataType:"html",
				async: false,
				url:'script.php',
				data:"funcao=multiEntrada&id="+id+"&qtd="+valor,
				success:function(resp){
					$j('#corpo').html(resp);
					selected = [];
				},
				error:function(){
					console.log("error no ajax");
				}
			});
		}
		
	});
	$j("#corpo").on("click", "#btnSaidaCHK",function(){
		var valor = parseInt(prompt("Quantidade de saída:"), 10);
		var menor = -1;
		var elements = $j(".valores");
		elements.each(function(chave,iten){
			var id = parseInt($j(iten).prop("id"),10);
			if (selected.indexOf(id) != -1) {
				var qtd = parseInt($j(iten).find(".qtd").html(),10);
				if (menor == -1) {
					menor = qtd;
				}else{
					if (qtd < menor) {
						menor = qtd;
					}
				}
			}

			
		});
				
		if(!Number.isNaN(valor)){
			if((valor != null) && (valor <= menor)){
				var id = selected;
				$j.ajax({
					type:'POST',
					dataType:"html",
					async: false,
					url:'script.php',
					data:"funcao=multiSaida&id="+id+"&qtd="+valor,
					success:function(resp){
						$j('#corpo').html(resp);
						selected = [];
					},
					error:function(){
						console.log("error no ajax");
					}
				})
			}else{
				alert("Valor inválido ou maior que quantidade!");
			}
		}
		
		
	});

	$j("#corpo").on("click", "#btnDeletaCHK",function(){
		var valor = confirm("Deseja deletar "+selected.length+" produtos selecionados?");
		if (valor) {
			var id = selected;
			$j.ajax({
				type:'POST',
				dataType:"html",
				async: false,
				url:'script.php',
				data:"funcao=multiDeleta&id="+id,
				success:function(resp){
					$j('#corpo').html(resp);
					selected = [];
				},
				error:function(){
					console.log("error no ajax");
				}
			});
		}
		
	});

});