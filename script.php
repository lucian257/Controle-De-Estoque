<?php 
	require("config.php");
	function carregarRua($id){
		echo $id;
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