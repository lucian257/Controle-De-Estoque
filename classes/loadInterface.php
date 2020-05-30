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
		echo "<pre>";
		print_r($allPaletes);

	}
	protected function loadPalete(){
		//carrega todos os produtos de um patele
	}
	protected function loadProduct(){
		//carrega todos os dados de um produto
	}
}
?>