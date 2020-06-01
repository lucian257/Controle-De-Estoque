<div id="id01" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
      <form id="<?php echo $idPalete; ?>">
      	<label>Nome</label>
      	<input type="text" name="nome_txt">
      	<br>
      	<label>Marca</label>
      	<select name="marca_slc">
      		<option value="null">Selecione</option> 
  			<option value="valor2">Valor 2</option>
  			<option value="valor3">Valor 3</option>
      	</select>
      	<br>
      	<label>Estado</label>
      	<select name="estado_slc">
      		<option value="null">Selecione</option> 
  			<option value="valor2">Valor 2</option>
  			<option value="valor3">Valor 3</option>
      	</select>
      	<br>
      	<label>categoria</label>
      	<select name="categoria_slc">
      		<option value="null">Selecione</option> 
  			<option value="valor2">Valor 2</option>
  			<option value="valor3">Valor 3</option>
      	</select>
      	<br>
      	<label>Quantidade</label>
      	<input type="number" name="qtd_txt">
      	<br>
      	<input id="btnAddProd" type="button" value="Confirmar" name="enviar_btn">
      </form>
    </div>
  </div>
</div>