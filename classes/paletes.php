<?php 
	class paletes extends loadInterface{
		private $dadosPaletes=[];

		public function __CONSTRUCT($bd){
			$this->PDO = $bd;
			//carregar e guarda os registros da tabela paletes em $dadosPaletes
			$sql = $this->PDO->query("SELECT * FROM tbl_paletes");
			$this->dadosPaletes = $sql->fetchALL(PDO::FETCH_ASSOC);
		}
		public function getPaletesRua($idRua){
			// Pega todos os paletes cadastrados de uma rua junto com os dados da rua
			$sql = $this->PDO->query("SELECT * FROM tbl_ruas INNER JOIN tbl_paletes ON tbl_ruas.id_rua = tbl_paletes.fk_id_rua WHERE tbl_ruas.id_rua = $idRua");
			$dadosALL = $sql->fetchALL(PDO::FETCH_ASSOC);
			return $dadosAll;
		}
		public function loadAllPaletes($dados){
			$this->loadRua($dataRua,$dataPaletes);
		}

	}
?>