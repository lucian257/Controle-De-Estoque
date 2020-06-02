<div id="id<?php echo $value['id_produto']; ?>" class="w3-modal">
  <div class="w3-modal-content"> <!-- modal alterar produto -->
    <div class="w3-container">
      <span onclick="document.getElementById('id<?php echo $value['id_produto']; ?>').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
      <form id="alt<?php echo $value['id_produto']; ?>">
        <label>Nome</label>
        <input type="text" name="nome_txt" placeholder="LN39G" value="<?php echo $value['nome']; ?>" required="required">
        <br>
        <label>Marca</label>
        <select name="marca_slc">
            <option value="null" <?php echo ($value['marca']==NULL?"selected":""); ?> >Nenhuma</option> 
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
        <input type="checkbox" name="estado1" value="Normal" <?php echo(in_array("Normal", $estados)?"checked":""); ?> >Normal
        <input type="checkbox" name="estado2" value="NF" <?php echo(in_array("NF", $estados)?"checked":""); ?> >NF
        <input type="checkbox" name="estado3" value="Tela_boa" <?php echo(in_array("Tela boa", $estados)?"checked":""); ?> >Tela boa
        <input type="checkbox" name="estado4" value="Na_caixa" <?php echo(in_array("Na caixa", $estados)?"checked":""); ?> >Na caixa
        <br>
        <label>categoria</label>
        <select name="categoria_slc">
            <option value="null" <?php echo ($categoria_formatado==NULL?"selected":""); ?> >Nenhuma</option> 
            <option value="TV" <?php echo ($categoria_formatado=="TV"?"selected":""); ?> >TV</option>
            <option value="LED" <?php echo ($categoria_formatado=="LED"?"selected":""); ?> >LED</option>
            <option value="PLACAS" <?php echo ($categoria_formatado=="PLACAS"?"selected":""); ?> >PLACAS</option>
            <option value="AUTO_FALANTE" <?php echo ($categoria_formatado=="AUTO FALANTE"?"selected":""); ?> >AUTO FALANTE</option>
            <option value="OUTROS" <?php echo ($categoria_formatado=="OUTROS"?"selected":""); ?> >OUTROS</option>
        </select>
        <br>
        <label>Status</label>
        <input type="radio" name="status<?php echo $value['id_produto']; ?>" value="0" <?php echo ($value['status']?"":"checked"); ?> >Em estoque
        <input type="radio" name="status<?php echo $value['id_produto']; ?>" value="1" <?php echo ($value['status']?"checked":""); ?> >Desmontando
        <br>
        <label>Quantidade</label>
        <input type="number" name="qtd_txt" required="required" value="<?php echo $value['quantidade']; ?>">
        <br>
        <input class="btnConfirmAlt" type="button" value="Confirmar" name="enviar_btn">
      </form>
    </div>
  </div>
</div>