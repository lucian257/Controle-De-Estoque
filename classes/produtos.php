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
	public function loadProdutos($idPalete){
		$produtos = $this->getProdutos($idPalete);
		$this->loadPalete($produtos,$idPalete);
	}
}
?>