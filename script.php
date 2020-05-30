<?php 
	require("config.php");
	function carregarRua($rua){
		$objPaletes = new paletes($PDO);
		$objRuas = new ruas($PDO);
		$idRua = $objRuas->getIdRua($rua);
		$paletesRua = $objPaletes->getPaletesRua($idRua);
		$objPaletes->loadAllPaletes($paletesRua);
	}
	function carregarRuas($id){
		
	}
	if (isset($_POST['funcao']) && $_POST['funcao']!= NULL) {
		if ($_POST['funcao']=="carregarRua") {
			$letra = $_POST['letra'];
			carregarRua($letra);
		}
	}else{
		echo "funcao indefinida!";
	}
	

?>