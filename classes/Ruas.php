<?php 
	class ruas extends loadInterface{
		private $dadosRuas =[];

		public function __CONSTRUCT($bd){
			$this->PDO = $bd;
			//carregar e guarda dados da tabela ruas em $dadosRuas
			$sql = $this->PDO->query("SELECT * FROM tbl_ruas");
			$this->dadosRuas = $sql->fetchALL(PDO::FETCH_ASSOC);
		}
		public function getLetras(){
			//retorna todas as Letras em um array
			$letras =[];
			foreach ($this->dadosRuas as $value) {
				array_push($letras, $value['letra']);
			}
			return $letras;
		}
		public function getQtdColunas($rua){
			//retorna a quantidade de colunas de uma certa rua
			$letrasAll = $this->getLetras(); 
			$id = array_search($rua, $letrasAll);
			return $this->dadosRuas[$id]["qtd_coluna"];
		}	
		public function getQtdAndar($rua){
			//retorna a quantidade de andares de uma certa rua
			$letrasAll = $this->getLetras(); 
			$id = array_search($rua, $letrasAll);
			return $this->dadosRuas[$id]["qtd_andar"];
		}
		public function getIdRua($rua){
			$letrasAll = $this->getLetras(); 
			$id = array_search($rua, $letrasAll);
			return $this->dadosRuas[$id]["id_rua"];
		}
		public function loadALL(){
			$letras = $this->getLetras();
			$this->loadAllRuas($letras);
		}
	}

?>