<?php 
	require('config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ínicio</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/w3.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
	<script type="text/javascript" ></script>
</head>
<body>
	<div class="container">

	<div id="div_inicial" style="display: none;">
	<h3 style="text-align:center;position:relative; top:40px;">Credencial</h3>
		<div id="credencial">
			<input id="cod" type="text" value="teste" name="codigo" class="codigo form-control" style="width:40%;">
			<button id="enter" class="btn btn-sm">Entrar</button>
		</div>
		</div>
<svg id="retorno" disabled="false" style="display: none; position: relative; top: 122px; left:70px" class="bi bi-box-arrow-left flechinha" width="3em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.354 11.354a.5.5 0 0 0 0-.708L1.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
  <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H2a.5.5 0 0 0 0 1h9a.5.5 0 0 0 .5-.5z"/>
  <path fill-rule="evenodd" d="M14 13.5a1.5 1.5 0 0 0 1.5-1.5V4A1.5 1.5 0 0 0 14 2.5H7A1.5 1.5 0 0 0 5.5 4v1.5a.5.5 0 0 0 1 0V4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5H7a.5.5 0 0 1-.5-.5v-1.5a.5.5 0 0 0-1 0V12A1.5 1.5 0 0 0 7 13.5h7z"/>
</svg>

		<div id="pesquisa" style="display: none;">



			<input id="palavraChave_txt" type='text' placeholder ='Digite a palavra-chave...' class='pesquisar'>
			<input id="btnPesquisar" type='button' value='Pesquisar' class = 'botao' >	
		</div>
		
		<svg id="voltar" class="bi bi-arrow-return-left" width="3em" height="3em" viewBox="0 0 16 16" 		fill="currentColor" xmlns="http://www.w3.org/2000/svg">

  			<path fill-rule="evenodd" d="M5.854 5.646a.5.5 0 0 1 0 .708L3.207 9l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
  			<path fill-rule="evenodd" d="M13.5 2.5a.5.5 0 0 1 .5.5v4a2.5 2.5 0 0 1-2.5 2.5H3a.5.5 0 0 1 0-1h8.5A1.5 1.5 0 0 0 13 7V3a.5.5 0 0 1 .5-.5z"/>
		</svg>
		<div>
			<label>Marca</label>
        	<select id="flt_marca" name="flt_marca_txt">
        	<option value="null">Nenhuma</option> 
    			<option value="LG">LG</option>
    			<option value="Samsung">Samsung</option>
    			<option value="Philco">Philco</option>
    			<option value="Phillips">Phillips</option>
    			<option value="Sony">Sony</option>
    			<option value="CCE">CCE</option>
    			<option value="AOC">AOC</option>
    			<option value="Panasony">Panasony</option>
    			<option value="TCL">TCL</option>
    			<option value="Outros">Outros</option>
      	</select>
      	<label>Estado</label>
      	<input type="checkbox" name="estado1" value="Normal" checked="checked">Normal
      	<input type="checkbox" name="estado2" value="NF">NF
      	<input type="checkbox" name="estado3" value="Tela_boa">Tela boa
      	<input type="checkbox" name="estado4" value="Na_caixa">Na caixa
      	<label>categoria</label>
      	<select name="categoria_slc">
      		<option value="null">Nenhuma</option> 
  			<option value="TV" selected="selected">TV</option>
  			<option value="LED">LED</option>
  			<option value="PLACAS">PLACAS</option>
  			<option value="AUTO_FALANTE">AUTO FALANTE</option>
  			<option value="OUTROS">OUTROS</option>
      	</select>
      	<label>Status</label>
      	<input type="radio" name="status" value="0" checked="checked">Em estoque
      	<input type="radio" name="status" value="1">Desmontando
		</div>
		<!--        div         -->
		<div id="corpo" class= "conteudo" style="display:none">
			
			<?php 	
				$ruas = new ruas($PDO); 
				$ruas->loadALL();

			?>
		</div>
		
	</div>

	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>
