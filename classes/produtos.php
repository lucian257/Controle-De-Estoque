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
		$this->PDO->query("UPDATE tbl_produtos SET quantidade=quantidade+$qtd WHERE id_produto=$id");
		$this->PDO->query("INSERT INTO tbl_registros(data, tipo, fk_id_produto) VALUES (Now(), '0', '$id') ");
	}
	public function saidaProdutos($id,$qtd){
		$this->PDO->query("UPDATE tbl_produtos SET quantidade=quantidade-$qtd WHERE id_produto=$id");
		$this->PDO->query("INSERT INTO tbl_registros(data, tipo, fk_id_produto) VALUES (Now(), '1', '$id') ");
		$this->testaQtd($id);
	}
	private function testaQtd($id){
		$sql = $this->PDO->query("SELECT quantidade FROM tbl_produtos WHERE id_produto=$id");
		$qtd = $sql->fetch();
		if ($qtd['quantidade'] == 0) {
			$this->PDO->query("SET foreign_key_checks = 0");
			$this->PDO->query("DELETE FROM tbl_produtos WHERE id_produto = $id");
			$this->PDO->query("SET foreign_key_checks = 1");
		}
	}
	public function deletaProdutos($id){
		$this->PDO->query("SET foreign_key_checks = 0");
		$this->PDO->query("DELETE FROM tbl_produtos WHERE id_produto = $id");
		$this->PDO->query("SET foreign_key_checks = 1");
	}

	public function addNewProduto($nome,$marca,$estado,$categoria,$status,$qtd,$idPalete){
		$sqlestado = implode("/", $estado);
		$this->PDO->query("INSERT INTO tbl_produtos(nome, marca, estado, categoria, status, quantidade, fk_id_palete) VALUES ('$nome','$marca', '$sqlestado', '$categoria', $status, $qtd, $idPalete)");
	}

	public function alteraProduto($id, $nome,$marca,$estado,$categoria,$status,$qtd){
		$sqlestado = implode("/", $estado);
		$this->PDO->query("SET foreign_key_checks = 0");
		$this->PDO->query("UPDATE tbl_produtos SET nome='$nome', marca='$marca',estado='$sqlestado', categoria='$categoria', quantidade=$qtd, status=$status WHERE id_produto = $id");
		$this->PDO->query("SET foreign_key_checks = 1");
	}
	public function pesquisaBD($nome){
		$sql= $this->PDO->query("SELECT * FROM tbl_produtos INNER JOIN tbl_paletes ON tbl_produtos.fk_id_palete = tbl_paletes.id_palete WHERE (tbl_produtos.nome LIKE '%$nome%') OR (tbl_produtos.marca LIKE '%$nome%') OR (tbl_produtos.estado LIKE '%$nome%') OR (tbl_produtos.categoria LIKE '%$nome%')");
		return $sql->fetchALL(PDO::FETCH_ASSOC);
	}
	public function loadProdutos($idPalete){
		$produtos = $this->getProdutos($idPalete);
		$this->loadPalete($produtos,$idPalete);
	}
	public function loadSearch($dados){
		$this->loadPesquisa($dados);
	}
}
?>