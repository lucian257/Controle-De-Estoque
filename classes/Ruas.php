<?php 
	class Ruas{
		private $dados =[];

		public function __CONSTRUCT($PDO){
			$sql = $PDO->query("SELECT * FROM tbl_ruas");
			$this->dados = $sql->fetchALL(PDO::FETCH_ASSOC);
		}
		public function getLetras(){
			$letras =[];
			foreach ($this->dados as $value) {
				array_push($letras, $value['letra']);
			}
			return $letras;
		}
	}

?>