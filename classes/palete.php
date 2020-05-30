<?php 
	class palete extends loadInterface{
		private $dadosPaletes=[];

		public function __CONSTRUCT($bd){
			$this->PDO = $bd;
			//carregar e guarda dados da tabela ruas em $dadosRua
			$sql = $this->PDO->query("SELECT * FROM tbl_paletes");
			$this->dadosPaletes = $sql->fetchALL(PDO::FETCH_ASSOC);
		}

		//public function getIdpalete($x){
			// Pega o id de todos os paletes
		//	foreach ($this->dadosPaletes as $value) { PEGANDO ATRAVES DO CLICK(DESNECESSARIO)
		//		array_push($x, $value['id_palete']);
		//	}
		//	return $id_palete;
		}

		public function getDados(){
			// Pega todos os andares
			$letras = $this->getLetras();
			$dadosAll = $this->PDO->query("SELECT * FROM tbl_ruas INNER JOIN tbl_paletes ON tbl_ruas.id_rua = tbl_paletes.fk_id_rua WHERE tbl_ruas.letra = $letras;");
			$qtd_Coluna = $dadosAll	["qtd_coluna"];
			$qtd_andar = $dadosAll["qtd_andar"];
			$this->loadRua($id_palete);
		}

	}
?>