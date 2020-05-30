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
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
	<script type="text/javascript" ></script>
</head>
<body>
	
	<img src="assets/images/return.png" alt="" width="50px" style= "margin:10px; display:none" id="retorno">
	<div class="container">
	<div id="div_inicial" style="display: none;">
	<h3 style="text-align:center;position:relative; top:40px;">Credencial</h3>
		<div id="credencial">
			<input id="cod" type="text" value="teste" name="codigo" class="codigo form-control" style="width:40%;">
			<button id="enter" class="btn btn-sm">Entrar</button>
		</div>
		</div>
		<!--        div         -->
		<div id="corpo" class= "conteudo" style="display:none">
			<!--
			<input type='text' placeholder='Ex: UN43NU7100AG' class='pesquisar'>
			<input type='submit' value='Procurar' class = 'botao' >	
			-->
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
