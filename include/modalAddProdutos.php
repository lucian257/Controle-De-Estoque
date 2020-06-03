<div id="addmodal" class="w3-modal">
  <div class="w3-modal-content "> <!-- modal adicionar um novo produto -->
    <div class="w3-container">
      <span onclick="document.getElementById('addmodal').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
      <form class="formAddProd" id="add<?php echo $idPalete; ?>">
      	<label>Nome</label>
      	<input type="text" name="nome_txt" placeholder="LN39G" required="required">
      	<br>
      	<label>Marca</label>
      	<select name="marca_slc">
      		<option value="null">Nenhuma</option> 
  			<option value="LG">LG</option>
  			<option value="Samsung">Samsung</option>
  			<option value="Philco">Philco</option>
  			<option value="Phillips">Phillips</option>
  			<option value="Sony">Sony</option>
  			<option value="CCE">CCE</option>
  			<option value="AOC">AOC</option>
  			<option value="Panasony">Panasony</option>
  			<option value="TCL">TCL</option>
  			<option value="Outros">Outros</option>
      	</select>
      	<br>
      	<label>Estado</label>
      	<input type="checkbox" name="estado1" value="Normal" checked="checked">Normal
      	<input type="checkbox" name="estado2" value="NF">NF
      	<input type="checkbox" name="estado3" value="Tela_boa">Tela boa
      	<input type="checkbox" name="estado4" value="Na_caixa">Na caixa
      	<br>
      	<label>categoria</label>
      	<select name="categoria_slc">
      		<option value="null">Nenhuma</option> 
  			<option value="TV" selected="selected">TV</option>
  			<option value="LED">LED</option>
  			<option value="PLACAS">PLACAS</option>
  			<option value="AUTO_FALANTE">AUTO FALANTE</option>
  			<option value="OUTROS">OUTROS</option>
      	</select>
      	<br>
      	<label>Status</label>
      	<input type="radio" name="status" value="0" checked="checked">Em estoque
      	<input type="radio" name="status" value="1">Desmontando
      	<br>
      	<label>Quantidade</label>
      	<input type="number" name="qtd_txt" value="0" required="required">
      	<br>
      	<input id="btnAddProd" type="submit" value="Confirmar" name="enviar_btn">
      </form>
    </div>
  </div>
</div>

