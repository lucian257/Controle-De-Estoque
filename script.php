<?php 
	require("config.php");
	function carregarRua($rua,$PDO){
		$objPaletes = new paletes($PDO);
		$objRuas = new ruas($PDO);
		$idRua = $objRuas->getIdRua($rua);
		$paletesRua = $objPaletes->getPaletesRua($idRua);
		$auxRuas= $objRuas->getDataRua($rua);
		$objPaletes->loadAllPaletes($paletesRua,$auxRuas);
		$_SESSION['rua'] = $idRua;
	}
	function carregarRuas($PDO){
		$objRuas = new ruas($PDO);
		$objRuas->loadAll();
	}
	function carregarPalete($id,$PDO){
		if(str_split($id)[0] == 'v'){
			$info = explode("?", $id);
			$and_col = explode(":", $info[1]);
			$_SESSION["andar"]=$and_col[0];
			$_SESSION["coluna"]=$and_col[1];
			$id=$info[0];
		}else{
			$_SESSION['id_palete']=$id;
		}

		$objProdutos = new produtos($PDO);
		$objProdutos->loadProdutos($id);
	}
	function addProduto($PDO){
		$nome = filter_input(INPUT_POST, 'nome_txt', FILTER_SANITIZE_STRING);
		$marca = filter_input(INPUT_POST, 'marca_slc', FILTER_SANITIZE_STRING);
		$categoria = filter_input(INPUT_POST, 'categoria_slc', FILTER_SANITIZE_STRING);
		$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);
		$qtd = filter_input(INPUT_POST, 'qtd_txt', FILTER_SANITIZE_NUMBER_INT);
		$id = $_POST['id'];
		$estado =[];
		for ($i=1; $i <= 4; $i++) { 
			if (isset($_POST['estado'.$i])) {
				array_push($estado, $_POST['estado'.$i]);
			}
		}
		if (str_split($id)[0] == 'v') {			
			$objPaletes = new paletes($PDO);
			$id=$objPaletes->setPalete($_SESSION['andar'],$_SESSION['coluna'],$_SESSION['rua']);
		}
		$objProdutos = new produtos($PDO);
		$objProdutos->addNewProduto($nome,$marca,$estado,$categoria,$status,$qtd,$id);
		carregarPalete($id,$PDO);
		
	}
	function entradaProd($PDO){
		$idProd = $_POST['id'];
		$objProdutos= new produtos($PDO);
		$objProdutos->entradaProdutos($idProd,$_POST['qtd']);
		carregarPalete($_SESSION['id_palete'],$PDO);
	}
	function saidaProd($PDO){
		$idProd = $_POST['id'];
		$objProdutos= new produtos($PDO);
		$objProdutos->saidaProdutos($idProd,$_POST['qtd']);
		carregarPalete($_SESSION['id_palete'],$PDO);
	}
	function deleteProd($PDO){
		$idProd = $_POST['id'];
		$objProdutos= new produtos($PDO);
		$objProdutos->deletaProdutos($idProd);
		carregarPalete($_SESSION['id_palete'],$PDO);
	}
	function alteraProd($PDO){
		$nome = filter_input(INPUT_POST, 'nome_txt', FILTER_SANITIZE_STRING);
		$marca = filter_input(INPUT_POST, 'marca_slc', FILTER_SANITIZE_STRING);
		$categoria = filter_input(INPUT_POST, 'categoria_slc', FILTER_SANITIZE_STRING);
		$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);
		$qtd = filter_input(INPUT_POST, 'qtd_txt', FILTER_SANITIZE_NUMBER_INT);
		$idProd = $_POST['id'];
		
		$objProdutos= new produtos($PDO);
		$objProdutos->alteraProdutos($idProd, $nome, $marca, $estado, $categoria, $status, $qtd, $idPalete);
		carregarPalete($_SESSION['id_palete'],$PDO);
	}

	if (isset($_POST['funcao']) && $_POST['funcao']!= NULL) {
		if ($_POST['funcao']=="carregarRua"){
			$letra = $_POST['letra'];
			carregarRua($letra, $PDO);
		}else if ($_POST['funcao']=="carregarRuas") {
			carregarRuas($PDO);
		}else if($_POST['funcao']=="carregarPalete"){
			$id=$_POST['id'];
			carregarPalete($id,$PDO);
		}else if($_POST['funcao']=="addProduto"){
			addProduto($PDO);
		}else if($_POST['funcao']=="entrada"){
			entradaProd($PDO);
		}else if($_POST['funcao']=="saida"){
			saidaProd($PDO);
		}else if($_POST['funcao']=="deleta"){
			deleteProd($PDO);
		}
	}else{
		echo "funcao indefinida!";
	}
	

?>