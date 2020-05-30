<?php 
	class palete extends loadInterface{
		private $dadosPaletes=[];

		public function __CONSTRUCT($bd){
			$this->PDO = $bd;
			//carregar e guarda dados da tabela ruas em $dadosRua
			$sql = $this->PDO->query("SELECT * FROM tbl_paletes");
			$this->dadosPaletes = $sql->fetchALL(PDO::FETCH_ASSOC);
		}

	}
?>