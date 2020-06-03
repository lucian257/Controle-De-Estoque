<div id="addmodal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom modal-sm"> <!-- modal adicionar um novo produto -->
    <div class="w3-container modall">
      <span onclick="document.getElementById('addmodal').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
	  <form class="formAddProd form-group" id="add<?php echo $idPalete; ?>" style="margin-top:320px;">
	  <div class="form-group">
      	<label>Nome</label>
		  <input type="text" name="nome_txt" placeholder="LN39G" required="required" class="form-control">
     </div>
      	<br>
      	<label>Marca</label>
      	<select name="marca_slc" class="form-control">
      		<option value="NULL">Nenhuma</option> 
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
		  <label class="form-check-label">Estado</label>
		  <div class="form-check">
		  <label class="form-check-label">
		  <input type="checkbox" name="estado1" value="Normal" checked="checked" class="form-check-input">Normal
		  </label>
		  </div>

		  <div class="form-check">
		  <label class="form-check-label">
		  <input type="checkbox" name="estado2" value="NF" class="form-check-input">NF
		  </label>
		  </div>

		  <div class="form-check">
		  <label class="form-check-label">
		  <input type="checkbox" name="estado3" value="Tela_boa" class="form-check-input">Tela boa
		  </label>
		  </div>

		  <div class="form-check">
		  <label class="form-check-label">
		  <input type="checkbox" name="estado4" value="Na_caixa" class="form-check-input">Na caixa
		  </label>
		  </div>
      	
      	<br>
      	<label>categoria</label>
      	<select name="categoria_slc" class="form-control">
      		<option value="NULL">Nenhuma</option> 
  			<option value="TV" selected="selected">TV</option>
  			<option value="LED">LED</option>
  			<option value="PLACAS">PLACAS</option>
  			<option value="AUTO_FALANTE">AUTO FALANTE</option>
  			<option value="OUTROS">OUTROS</option>
      	</select>
      	<br>
		  <label>Status</label>
		  <div class="form-check">
  		<label class="form-check-label">
  			<input type="radio" name="status" value="0" checked="checked"> Em estoque
  		</label>
		</div>

		<div class="form-check">
  <label class="form-check-label">
  <input type="radio" name="status" value="1"> Desmontando
  </label>
		</div>
      	
		  <br>
		  <div class="form-group">
  			<label>Quantidade:</label>
  			<input min="1" step="1" type="number" name="qtd_txt" value="0" required="required" class="form-control">
		 </div>

      	<input id="btnAddProd" type="submit" value="Confirmar" name="enviar_btn" class="btn btn-info">
      </form>
    </div>
  </div>
</div>

