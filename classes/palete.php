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
			$dadosAll = $this->PDO->query("SELECT * FROM tbl_ruas INNER JOIN tbl_paletes ON tbl_ruas.id_rua = tbl_paletes.fk_id_rua;");
			foreach ($this->$dadosAll as $value) {
				array_push($id_palete, $value['id_palete']); // eu esqva fazendo de um jeito nada logico, agr vou  fazer no esquema kkk
			}
		}

	}
?>