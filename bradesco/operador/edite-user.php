<h1 style="font-size:2.5em;color:#fff;text-align:center;">
	<i class="fa fa-cogs"></i> &nbsp;Alterar Senha.
</h1>

<form action="acesso.php?pag=meus-dados" method="post" class="pass_form">
	<label for="new_pass">
		<span>Nova Senha</span>
		<input type="password" name="n_pass" id="n_pass" placeholder="Nova Senha" class="pass_input">
	</label>
	<label for="new_pass">
		<span>Confirmar Senha</span>
		<input type="password" name="nn_pass" id="nn_pass" placeholder="Repita a nova senha" class="pass_input">
	</label>
	<input type="hidden" name="sender_pass" value="go_now">
	<input type="submit" name="enviar" id="enviar" value="Alterar Senha" class="pass_input btn">
	<div class="clear"></div>
</form>

<?php 

if(isset($_POST['sender_pass']) && $_POST['sender_pass'] == 'go_now'):

	$NewPass = $_POST['n_pass'];
	$NNewPass = $_POST['nn_pass'];

	if(strlen($NewPass) < 6):
		echo '<script>alert("A senha informada deve conter pelo menos 6 caracteres.\nTente novamente!");</script>';
	elseif($NewPass != $NNewPass):
		echo '<script>alert("O Campo Confirmar Senha está diferente do campo Nova Senha.\nTente novamente!");</script>';
	else:

		$senha = md5($NewPass);
		$OpIdNow = $_SESSION['OpId'];

		$tabela = 'usuarios';
		$values = "senha = '$senha'";
		$cond = "WHERE id = '$OpIdNow'";
		$SendPass = update($conn, $tabela, $values, $cond);
		$ForceLogoff = update($conn, 'usuarios', "status = '0'", "WHERE id = '$OpIdNow'");

		if($SendPass && $ForceLogoff):
			unset($_SESSION['OpLogin']);
			unset($_SESSION['OpPass']);
			unset($_SESSION['OpId']);
			unset($_SESSION['OpNivel']);
			echo '<script>alert("Senha alterada com sucesso.\nEfetue Login novamente");</script>';
			echo '<script>window.location.href="acesso.php"</script>';
		else:
			echo '<script>alert("Não foi possível alterar sua senha.\nTente novamente!");</script>';
			echo '<script>window.location.href="acesso.php?pag=meus-dados"</script>';
		endif;		
	endif;	

endif;

?>