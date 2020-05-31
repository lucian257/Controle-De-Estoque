<?php 
	require("config.php");
	function carregarRua($rua,$PDO){
		$objPaletes = new paletes($PDO);
		$objRuas = new ruas($PDO);
		$idRua = $objRuas->getIdRua($rua);
		$paletesRua = $objPaletes->getPaletesRua($idRua);
		$auxRuas= $objRuas->getDataRua($rua);
		$objPaletes->loadAllPaletes($paletesRua,$auxRuas);
	}
	function carregarRuas($PDO){
		$objRuas = new ruas($PDO);
		$objruas->loadAll();
	}
	if (isset($_POST['funcao']) && $_POST['funcao']!= NULL) {
		if ($_POST['funcao']=="carregarRua"){
			$letra = $_POST['letra'];
			carregarRua($letra, $PDO);
		}else if ($_POST['funcao']=="carregarRuas") {
			carregarRuas($PDO);
		}
	}else{
		echo "funcao indefinida!";
	}
	

?>