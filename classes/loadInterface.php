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
					echo "<td id='cancel' data-ativo='cancel'> Andar $i </td>";
				
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
					echo "<td id='v$virtual?$i:$n' >$n - $i</td>";

					$virtual++;
				}else{
					if ($allPaletes[$id_array]["vazio"] == 1) {
						//PALETE INEXITENTE
						echo "<td id='$id' data-ativo='cancel' style='background:transparent; border:0px; box-shadow: 0px 0px 0px;' >&nbsp;</td>";
					}else{
						if ($allPaletes[$id_array]["celula"] == 0) {
							//PALETE COM PRODUTOS
							echo "<td id='$id'>$n - $i</td>";
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
								echo "<td id='$id' colspan='$colM' rowspan='$andM' >$n - $i</td>";

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
					echo "<td id='cancel' data-ativo='cancel' style='background:transparent; border:0px; box-shadow: 0px 0px 0px;' >&nbsp;</td>";
				}
			?>
				<td id='cancel' data-ativo='cancel'>
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
		if ($allProdutos != false) {
			include("include/modalAddProdutos.php");
		foreach ($allProdutos as $value){ 
			$estado_formatado = str_replace("_", " ", $value['estado']);
            $estados = explode("/", $estado_formatado);
			include("include/modalAltProdutos.php");
		}
		?>
		<button onclick="document.getElementById('addmodal').style.display='block'"
class="w3-btn w3-ripple w3-green bt_add">Adicionar novo produto</button>
	<div class="acaoCheck" style="display: none;color: white"> 
		<label id="lblQtd"></label>
		<button id="btnEntradaCHK" class="btn btn-success">Entrada</button>
		<button id="btnSaidaCHK" class="btn btn-info">Saída</button>
		<button id="btnDeletaCHK" class="btn btn-danger">Deletar</button>
	</div>
		<?php
		echo "
		<table class='table tbl_produtos table-bordered'>
			<tr class='cabeçalho'>
				<th><input type='checkbox' id='chk_all' data-chk='all' class='checks'>
  				<label for='todos'>todos</label></th>
	    		<th>Nome</th>
	    		<th>Marca</th>
	    		<th>Estado</th>
	    		<th>Quantidade</th>
	    		<th>Status</th>
	    		<th colspan='4'>Ação</th>
	  		</tr>
		";
		//echo "<pre>";
		//print_r($allProdutos);
		foreach ($allProdutos as $value){ 
			$estado_formatado = str_replace("_", " ", $value['estado']);
            $estados = explode("/", $estado_formatado);
			?>
			<tr id="<?php echo $value['id_produto']; ?>" class="valores">
				<td><input type='checkbox' data-chk='<?php echo $value['id_produto']; ?>' class='checks'></td>
				<td><?php echo $value['nome']; ?></td>
				<td  id="marcaT"><?php echo $value['marca']; ?></td>
				<td><?php echo ($estado_formatado==""?"Indefinido":$estado_formatado); ?></td>
				<td class="qtd"><?php echo $value['quantidade']; ?></td>
				<td><?php echo ($value['status']?"Desmontando":"Em estoque"); ?></td>
				<td class="botoes_ac">
					<button id="btnEntrada" class="btn btn-success bt">Entrada</button>
				</td>
				<td class="botoes_ac">	
					<button id="btnSaida" class="btn btn-info bt">Saída</button>
				</td>
				<td class="botoes_ac">	
					<button onclick="document.getElementById('id<?php echo $value['id_produto']; ?>').style.display='block'" id="btnAlterar" class="btn btn-warning bt">Alterar</button>
				</td>
				<td class="botoes_ac">
					<button id="btnDeleta" class="btn btn-danger bt">Deletar</button>
				</td>
			</tr>
		<?php }

		echo "</table>";
		}else{
			include("include/modalAddProdutos.php");
			?><button onclick="document.getElementById('addmodal').style.display='block'"
class="w3-btn w3-ripple w3-green bt_add" >Adicionar novo produto</button>
			<h2 class="sem_prod"  >Não há nenhum produto!</h2><?php
			}
	}
	protected function loadPesquisa($dados){
		//carrega pesquisa
		if ($dados != false) {
			foreach ($dados as $value) {
			$estado_formatado = str_replace("_", " ", $value['estado']);
            $estados = explode("/", $estado_formatado);
            $categoria_formatado = str_replace("_", " ", $value['categoria']);
			include("include/modalAltProdutos.php");
		} ?>
		<div class="acaoCheck" style="display: none;color: white"> 
			<label></label>
			<button id="btnEntradaCHK" class="btn btn-success">Entrada</button>
			<button id="btnSaidaCHK" class="btn btn-info">Saída</button>
			<button id="btnDeletaCHK" class="btn btn-danger">Deletar</button>
		</div>
		<?php
		echo "
		<table class='table tbl_produtos table-bordered' style='color:white'>
			<tr class='cabeçalho'>
				<th><input type='checkbox' id='chk_all' data-chk='all' class='checks'>
  				<label for='todos'>todos</label></th>
				<th>Rua</th>
	    		<th>Coluna</th>
	    		<th>Andar</th>
	    		<th>Nome</th>
	    		<th>Marca</th>
	    		<th>Estado</th>
	    		<th>Quantidade</th>
	    		<th>Status</th>
	    		<th colspan='4'>Ação</th>
	  		</tr>
		";
		foreach ($dados as $value) {
			$estado_formatado = str_replace("_", " ", $value['estado']);
            $estados = explode("/", $estado_formatado);
			$ruas=["A","B","C","D","E","F"];
			?>
			<tr id="<?php echo $value['id_produto']; ?>" class="valores">
				<td><input type='checkbox' data-chk='<?php echo $value['id_produto']; ?>' class='checks'></td>
				<td><?php echo $ruas[$value['fk_id_rua']-1]; ?></td>
				<td><?php echo $value['coluna']; ?></td>
				<td><?php echo $value['andar']; ?></td>
				<td><?php echo $value['nome']; ?></td>
				<td><?php echo $value['marca']; ?></td>
				<td><?php echo ($estado_formatado=="NULL"?"Indefinido":$estado_formatado); ?></td>
				<td class="qtd"><?php echo $value['quantidade']; ?></td>
				<td><?php echo ($value['status']?"Desmontando":"Em estoque"); ?></td>
				<td class="botoes_ac">
					<button id="btnEntrada" class="btn btn-success bt">Entrada</button>
				</td>
				<td class="botoes_ac">	
					<button id="btnSaida" class="btn btn-info bt">Saída</button>
				</td>
				<td class="botoes_ac">	
					<button onclick="document.getElementById('id<?php echo $value['id_produto']; ?>').style.display='block'" id="btnAlterar" class="btn btn-warning bt">Alterar</button>
				</td>
				<td class="botoes_ac">
					<button id="btnDeleta" class="btn btn-danger bt">Deletar</button>
				</td>
			</tr>
		<?php }

		echo "</table>";
		}else{
			echo "<h2 style='color:#fff; text-align:center; position: relative; top:20px;'>Não existe esse registro no sistema</h2>";
		}

		 
	}
}
?>
