<?php 
include('../_functions/functions.php');
$display_error = 'none';

if(isset($_POST['sender']) && $_POST['sender'] == 'Acessar'):

	$Log = addslashes($_POST['login_op']);
	$Pas = addslashes($_POST['senha_op']);
	$senha = md5($Pas);

	$tabela = 'usuarios';
	$cond = "WHERE login = '$Log' AND senha = '$senha'";
	$ReadUser = read($conn, $tabela, $cond);

	if($ReadUser[0]['login'] == $Log && $ReadUser[0]['senha'] == $senha):

		$_SESSION['OpLogin'] = $Log;
		$_SESSION['OpPass'] = $senha;
		$_SESSION['OpId'] = $ReadUser[0]['id'];

		$UserLogadoId = $ReadUser[0]['id'];
		update($conn, 'usuarios', "status = '1'", "WHERE id = '$UserLogadoId'");

		header('Location: acesso.php');
		
	else:
		$display_error = 'block';
	endif;	
endif;	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Operador Brada 1.0</title>
	<link rel="stylesheet" href="../_fonts/_fonts.css">
	<link rel="stylesheet" href="../_styles/operador.css">
	<link rel="stylesheet" href="../_styles/font-awesome.css">
	<script src="../_jscripts/jquery.js"></script>
	<script src="../_jscripts/jmask.js"></script>
	<script src="../_jscripts/operador.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
</head>
<body class="person_index">

	<div class="box_login">
		<div class="block_logo">
			<i class="fa fa-globe"></i>
			<h1>PAINEL DE CONTROLE</h1>
		</div><!-- block_logo -->

		<div class="block_error" style="display:<?= $display_error;?>;">
			Dados incorrtos!
		</div>

		<div class="block_panel">
			<form action="" method="post" onsubmit="return check_login();">
				<label for="login_op">
					<span class="icon_lg"><i class="fa fa-user-circle"></i></span>
					<input type="text" name="login_op" id="login_op" placeholder="Usuário" class="start_input" autocomplete="off" value="<?php echo (isset($_POST['login_op'])) ? $_POST['login_op'] : ''; ?>">
				</label>

				<div class="clear"><br></div>

				<label for="senha_op">
					<span class="icon_lg"><i class="fa fa-lock"></i></span>
					<input type="password" name="senha_op" id="senha_op" placeholder="Senha" class="start_input" autocomplete="off">
				</label>
				
				<input type="submit" name="sender" id="sender" value="Acessar" class="start_btn">

				<a href="#" class="last_pass">Esqueceu sua senha?</a>
			</form>
		</div><!-- block_panel -->

	</div><!-- box_login -->
	<div class="copy">&copy; <?= date('Y');?> - Nenhum direito reservado.</div>

</body>
</html>