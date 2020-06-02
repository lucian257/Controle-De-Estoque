<?php
class produtos extends loadInterface{
	private $dadosProdutos=[];

	public function __CONSTRUCT($bd){
		$this->PDO = $bd;
		//carregar e guarda os registros da tabela produtos em $dadosProdutos
		$sql = $this->PDO->query("SELECT * FROM tbl_produtos");
		$this->dadosProdutos = $sql->fetchALL(PDO::FETCH_ASSOC);
	}
	public function getProdutos($idPalete){
		//pega todos os produtos de um palete
		$arrayProd=[];
		foreach ($this->dadosProdutos as $value) {
			if($value['fk_id_palete'] == $idPalete){
				array_push($arrayProd, $value);
			}
		}
		 return $arrayProd;

	}
	public function entradaProdutos($id,$qtd){
		$sql = $this->PDO->query("UPDATE tbl_produtos SET quantidade=quantidade+$qtd WHERE id_produto=$id");
	}
	public function saidaProdutos($id,$qtd){
		$sql = $this->PDO->query("UPDATE tbl_produtos SET quantidade=quantidade-$qtd WHERE id_produto=$id");
	}
	public function deletaProdutos($id){
		$this->PDO->query("SET foreign_key_checks = 0");
		$sql = $this->PDO->query("DELETE FROM tbl_produtos WHERE id_produto = $id");
		$this->PDO->query("SET foreign_key_checks = 1");
	}

	public function addNewProduto($nome,$marca,$estado,$categoria,$status,$qtd,$idPalete){
		$sqlestado = implode("/", $estado);
		$sql = $this->PDO->query("INSERT INTO tbl_produtos(nome, marca, estado, categoria, status, quantidade, fk_id_palete) VALUES ('$nome','$marca', '$sqlestado', '$categoria', $status, $qtd, $idPalete)");
	}

	public function alteraProduto($id, $nome,$marca,$estado,$categoria,$status,$qtd,$idPalete){
		$sqlestado = implode("/", $estado);
		$sql = $this->PDO->query("UPDATE tbl_produtos SET nome=$nome, marca=$marca,estado=estado, categoria=$categoria, quantidade=$qtd,status=$status,fk_id_palete=$idPalete WHERE id_produto = $id");
	}

	public function loadProdutos($idPalete){
		$produtos = $this->getProdutos($idPalete);
		$this->loadPalete($produtos,$idPalete);
	}
}
?>