<div id="id<?php echo $value['id_produto']; ?>" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom modal-sm"> <!-- modal alterar produto -->
    <div class="w3-container modall">
      <span onclick="document.getElementById('id<?php echo $value['id_produto']; ?>').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
      <form class="alterar_prod form-group" id="alt<?php echo $value['id_produto'];?>" style="margin-top:350px;">
          <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome_txt" placeholder="LN39G" value="<?php echo $value['nome']; ?>" required="required" class="form-control">
          </div>
            <br>
            <label>Marca</label>
            <select name="marca_slc" class="form-control">
                <option value="NULL" <?php echo ($value['marca']==NULL?"selected":""); ?> >Nenhuma</option> 
                <option value="LG" <?php echo ($value['marca']=="LG"?"selected":""); ?> >LG</option>
                <option value="Samsung" <?php echo ($value['marca']=="Samsung"?"selected":""); ?> >Samsung</option>
                <option value="Philco" <?php echo ($value['marca']=="Philco"?"selected":""); ?> >Philco</option>
                <option value="Phillips" <?php echo ($value['marca']=="Phillips"?"selected":""); ?> >Phillips</option>
                <option value="Sony" <?php echo ($value['marca']=="Sony"?"selected":""); ?> >Sony</option>
                <option value="CCE" <?php echo ($value['marca']=="CCE"?"selected":""); ?> >CCE</option>
                <option value="AOC" <?php echo ($value['marca']=="AOC"?"selected":""); ?> >AOC</option>
                <option value="Panasony" <?php echo ($value['marca']=="Panasony"?"selected":""); ?> >Panasony</option>
                <option value="TCL" <?php echo ($value['marca']=="TCL"?"selected":""); ?> >TCL</option>
                <option value="Outros" <?php echo ($value['marca']=="Outros"?"selected":""); ?> >Outros</option>
            </select>
            <br>
            <label>Estado</label>
            <div class="form-check">
		          <label class="form-check-label">
              <input type="checkbox" name="estado1" value="Normal" <?php echo(in_array("Normal", $estados)?"checked":""); ?> > Normal
		          </label>
            </div>
            
            <div class="form-check">
		          <label class="form-check-label">
              <input type="checkbox" name="estado2" value="NF" <?php echo(in_array("NF", $estados)?"checked":""); ?> > NF
		          </label>
            </div>
            
            <div class="form-check">
		          <label class="form-check-label">
              <input type="checkbox" name="estado3" value="Tela_boa" <?php echo(in_array("Tela boa", $estados)?"checked":""); ?> > Tela boa
		          </label>
            </div>
            
            <div class="form-check">
		          <label class="form-check-label">
              <input type="checkbox" name="estado4" value="Na_caixa" <?php echo(in_array("Na caixa", $estados)?"checked":""); ?> > Na caixa
		          </label>
		        </div>
            
            <br>

            <label>categoria</label>
            <select name="categoria_slc" class="form-control">
                <option value="NULL" <?php echo ($categoria_formatado=="NULL"?"selected":""); ?> >Nenhuma</option> 
                <option value="TV" <?php echo ($categoria_formatado=="TV"?"selected":""); ?> >TV</option>
                <option value="LED" <?php echo ($categoria_formatado=="LED"?"selected":""); ?> >LED</option>
                <option value="PLACAS" <?php echo ($categoria_formatado=="PLACAS"?"selected":""); ?> >PLACAS</option>
                <option value="AUTO_FALANTE" <?php echo ($categoria_formatado=="AUTO FALANTE"?"selected":""); ?> >AUTO FALANTE</option>
                <option value="OUTROS" <?php echo ($categoria_formatado=="OUTROS"?"selected":""); ?> >OUTROS</option>
            </select>
            <br>
            <label>Status</label>

            <div class="form-check">
  		        <label class="form-check-label">
              <input type="radio" name="status<?php echo $value['id_produto']; ?>" value="0" <?php echo ($value['status']?"":"checked"); ?> > Em estoque
  		        </label>
            </div>

            <div class="form-check">
  		        <label class="form-check-label">
              <input type="radio" name="status<?php echo $value['id_produto']; ?>" value="1" <?php echo ($value['status']?"checked":""); ?> > Desmontando
  		        </label>
            </div>
            
            <br>

            <div class="form-group">
  			      <label>Quantidade:</label>
              <input type="number" name="qtd_txt" required="required" value="<?php echo $value['quantidade']; ?>" class="form-control" min="1" step="1">
            </div>
            
            
            <br>
            <input type="submit" value="Confirmar" name="enviar_btn" class="btn btn-info">
      </form>
    </div>
  </div>
</div>