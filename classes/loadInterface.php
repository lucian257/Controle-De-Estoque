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
		echo "<table class='table tbl_paletes'>";
		$andar = $rua["qtd_andar"];
		$coluna = $rua["qtd_coluna"];
		$virtual = 1;
		$grupoCelula = [];
		for ($i=$andar; $i >= 1; $i--) {
			echo "<tr>";
			for ($n=1; $n <= $coluna; $n++) { 
				if($n == 1){
					echo "<td id='cancel'> Andar $i </td>";
				
				 }
				
				$id = 0;
				foreach ($allPaletes as $key => $value) {
					if ($i == $value["andar"] && $n == $value["coluna"] ) {
						$id = $value["id_palete"];
						$id_array = $key;
						break;
					}
				}
				if($id == 0){
					//PALETE SEM ITENS
					echo "<td id='v$virtual' >$i - $n</td>";
					$virtual++;
				}else{
					if ($allPaletes[$id_array]["vazio"] == 1) {
						//PALETE INEXITENTE
						echo "<td id='$id'>&nbsp;</td>";
					}else{
						if ($allPaletes[$id_array]["celula"] == 0) {
							//PALETE COM PRODUTOS
							echo "<td id='$id'>$i - $n</td>";
						}else{
							if (!in_array($allPaletes[$id_array]["celula"], $grupoCelula)) {
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
								//PALETE AGRUPADO
								echo "<td id='$id' colspan='$colM' rowspan='$andM' >$i - $n</td>";

							}
						}
						
					}
				}
			}
			echo "</tr>";
		}
		echo "<tr>";
		for ($i=1; $i <= $coluna ; $i++) { 
			if($i == 1){
					echo "<td id='cancel'>&nbsp;</td>";
				}
			?>
				<td id='cancel'>
					coluna <?php echo $i; ?>
				</td>
			
		<?php }
		echo "</tr>";
		echo "</table>";
	}
	protected function loadPalete($allProdutos,$idPalete){ 
		//carrega todos os produtos de um patele
		//echo "<pre>";
		//echo print_r($allProdutos);
		include("include/modalProdutos.php");
		?>
		<button onclick="document.getElementById('id01').style.display='block'"
class="w3-btn w3-ripple w3-green">Adicionar produto</button>
		<?php
		echo "
		<table class='tbl_produtos'>
			<tr>
	    		<th>Nome</th>
	    		<th>Marca</th>
	    		<th>Categoria</th>
	    		<th>Estado</th>
	    		<th>Quantidade</th>
	    		<th>Status</th>
	    		<th>Ação</th>
	  		</tr>
		";
		foreach ($allProdutos as $value){ ?>
			<tr>
				<td><?php echo $value['nome']; ?><td>
				<td><?php echo ($value['marca']==NULL?"Sem Marca":$value['marca']); ?><td>
				<td><?php echo ($value['categoria']==NULL?"Indefinida":$value['categoria']); ?><td>
				<td><?php echo ($value['estado']==NULL?"Indefinido":$value['estado']); ?><td>
				<td><?php echo $value['quantidade']; ?><td>
				<td><?php echo $value['status']; ?><td>
				<td>
					<button>Entrada</button>
					<button>Saída</button>
					<button>Alterar</button>
					<button>Deletar</button>
				<td>
			<tr>
		<?php }

		echo "</table>";
	}
	protected function loadProduct(){
		//carrega todos os dados de um produto
	}
}
?>
