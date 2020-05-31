<?php 
class loadInterface{
	protected $PDO;

	protected function loadAllRuas($letras){
		//carrega todas as ruas
		foreach ($letras as  $value) { ?>
			<div class="ruas" id="<?php echo $value; ?>">
				<?php  echo "RUA ".$value; ?>
			</div>
			<br>
		<?php }
	}
	protected function loadRua($rua,$allPaletes){
		//carrega todos os paletes de uma rua
		//echo "<pre>";
		//print_r($allPaletes);
		echo "<table >";
		$andar = $rua["qtd_andar"];
		$coluna = $rua["qtd_coluna"];
		$grupoCelula = [];
		$x = "15px;";
		for ($i=$andar; $i >= 1; $i--) {
			echo "<tr style='border:1px black solid'>";
			for ($n=1; $n <= $coluna; $n++) { 
				$id = 0;
				foreach ($allPaletes as $key => $value) {
					if ($i == $value["andar"] && $n == $value["coluna"] ) {
						$id = $value["id_palete"];
						$id_array = $key;
						break;
					}
				}

				if ($id == 0) {
					// criar html do palete vazio
					echo "<td style='border:1px black solid'>$i - $n</td>";
				}else{
					

					if ($allPaletes[$id_array]["vazio"] == 1) {
						// html do palete inexistente
						echo "<td>&nbsp;</td>";
					}else{
						if ($allPaletes[$id_array]["celula"] == 0) {
							// monta O HTML MESMO do bang uffa
							echo "<td style='border:1px black solid'>$i - $n</td>";
						}else{
							if (!in_array($allPaletes[$id_array]["celula"], $grupoCelula)) {
								// trotos
								array_push($grupoCelula, $allPaletes[$id_array]["celula"]);
								$andarMax = $allPaletes[$id_array]["andar"];
								$andarMin = $allPaletes[$id_array]["andar"];
								$colunaMax = $allPaletes[$id_array]["coluna"];
								$colunaMin = $allPaletes[$id_array]["coluna"];

								// o mundo é feito por gambiarras
								foreach ($allPaletes as $value) {
									if ($allPaletes[$id_array]["celula"] == $value["celula"]) {
										if ($value["andar"] > $andarMax) {
											$andarMax = $value["andar"];
										}else if ($value["andar"] < $andarMin) {
											$andarMin = $value["andar"];
										}

										if ($value["coluna"] > $colunaMax) {
											$colunaMax = $value["coluna"];
										}else if ($value["coluna"] < $colunaMin) {
											$colunaMin = $value["coluna"];
										}


									
									}
								}
								$colM=($colunaMax-$colunaMin)+1;
								$andM=($andarMax-$andarMin)+1;
								echo "<td style='border:1px black solid' colspan='$colM' rowspan='$andM'>$i - $n</td>";

							}
						}
						
					}
				}
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	protected function loadPalete(){
		//carrega todos os produtos de um patele
	}
	protected function loadProduct(){
		//carrega todos os dados de um produto
	}
}
?>