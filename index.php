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
	<script type="text/javascript" src="Assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="Assets/js/script.js"></script>
	<div class="container">

		<div id="credencial">
		<input id="cod" type="text" name="codigo">
		<button id="enter">Entrar</button>
		</div>

		<div id="corpo" class= "conteudo" style="display: none;">
			<input type='text' placeholder='Ex: UN43NU7100AG' class='pesquisar'>
			<input type='submit' value='Procurar' class = 'botao' >	
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
</body>
</html>
