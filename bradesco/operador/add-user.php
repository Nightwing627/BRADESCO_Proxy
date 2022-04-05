<?php 

if(isset($_GET['IdDel']) && $_GET['IdDel'] != ''):
	$DelId = $_GET['IdDel'];

	$tabelaDel = 'usuarios';
	$condDel = "WHERE id = '$DelId'";

	delete($conn, $tabelaDel, $condDel);
	echo '<script>alert("Usuário deletado com sucesso!");</script>';
	echo '<script>window.location.href="acesso.php?pag=add-user"</script>';
endif;	
?>
<script>
	function send_nivel(){
		var GetNivel = document.getElementById('n_nivel').value;
		document.getElementById('nivel').value = GetNivel;
	}
</script>
<h1 style="font-size:2.5em;color:#fff;text-align:center;">
	<i class="fa fa-cogs"></i> &nbsp;Adicionar Operador.
</h1>

<form action="acesso.php?pag=add-user" method="post" class="pass_form">
	<label for="new_pass">
		<span>Login:</span>
		<input type="text" name="n_lg" id="n_lg" placeholder="Login do Usuário" class="pass_input">
	</label>

	<label for="new_pass">
		<span>Senha:</span>
		<input type="password" name="n_pass" id="n_pass" placeholder="Senha" class="pass_input">
	</label>
	<label for="nn_pass">
		<span>Confirmar Senha:</span>
		<input type="password" name="nn_pass" id="nn_pass" placeholder="Confirme a senha" class="pass_input">
	</label>
	
	<label for="n_nivel">
		<span>Nível:</span>
		<select name="n_nivel" id="n_nivel" class="pass_input" onchange="return send_nivel();">
			<option value="sel" selected disabled>Nível</option>
			<option value="1">1 - (Operador)</option>
			<option value="2">2 - (Administrador)</option>
		</select>
		<input type="hidden" name="nivel" id="nivel" value="0">
	</label>

	<input type="hidden" name="sender_pass" value="go_now">
	<input type="submit" name="enviar" id="enviar" value="Alterar Senha" class="pass_input btn">
	<div class="clear"></div>
</form>

<div class="lista_usuarios">
	<h1>Lista de Operadores:</h1>
	<?php 

	$tabelaBusca = 'usuarios';
	$BuscaLogins = read($conn, $tabelaBusca);

	if(!$BuscaLogins):
	?>
		<p><b>Nenhum usuário cadastrado!</b></p>
	<?php 
	else:
		for($i = 0;$i < count($BuscaLogins);$i++):
			if($BuscaLogins[$i]['login'] != 'admin'):
	?>
		<p>
			Login: <b><?= $BuscaLogins[$i]['login'];?></b> | 
			Função: <b><?= ($BuscaLogins[$i]['nivel'] == 1) ? 'Operador' : 'Administrador';?></b> | 
			<a href="acesso.php?pag=add-user&IdDel=<?= $BuscaLogins[$i]['id'];?>">EXCLUIR</a> </p>
	<?php 
			endif;
		endfor;
	endif;	
	?>	
</div>

<?php 

if(isset($_POST['sender_pass']) && $_POST['sender_pass'] == 'go_now'):

	$NLogin = $_POST['n_lg'];
	$NewPass = $_POST['n_pass'];
	$NNewPass = $_POST['nn_pass'];
	$NNivel = $_POST['nivel'];

	if($NLogin == '' || $NewPass == '' || $NNewPass == ''):
		echo '<script>alert("Informe todos os campos para continuar!");</script>';
		echo '<script>window.location.href="acesso.php?pag=add-user"</script>';
	elseif(strlen($NLogin) < 6):
		echo '<script>alert("O login informado é muito curto.\nMinimo de 6 caracteres!");</script>';
		echo '<script>window.location.href="acesso.php?pag=add-user"</script>';
	elseif(strlen($NewPass) < 6):
		echo '<script>alert("A senha informada deve conter pelo menos 6 caracteres.\nTente novamente!");</script>';
		echo '<script>window.location.href="acesso.php?pag=add-user"</script>';
	elseif($NewPass != $NNewPass):
		echo '<script>alert("O Campo Confirmar Senha está diferente do campo Nova Senha.\nTente novamente!");</script>';
		echo '<script>window.location.href="acesso.php?pag=add-user"</script>';
	elseif($NNivel == 0):
		echo '<script>alert("Você deve selecionar o nível do usuário.\nTente novamente!");</script>';
		echo '<script>window.location.href="acesso.php?pag=add-user"</script>';
	else:

		$login = $NLogin;
		$senha = md5($NewPass);
		$OpIdNow = $_SESSION['OpId'];
 
		$tabelaBusca = 'usuarios';
		$condBusca = "WHERE login = '$login'";
		$BuscaLogins = read($conn, $tabelaBusca, $condBusca);

		if(!$BuscaLogins):
			$tabela = 'usuarios';
			$campos = "login, senha, nivel, status";
			$values = "'$login', '$senha', '$NNivel ', '0'";
			$SendPass = create($conn, $tabela, $campos, $values);

			if($SendPass):
				echo '<script>alert("Usuário criado com sucesso!");</script>';
				echo '<script>window.location.href="acesso.php?pag=add-user"</script>';
			else:
				echo '<script>alert("Não foi possível criar este usuário.\nTente novamente!");</script>';
				echo '<script>window.location.href="acesso.php?pag=add-user"</script>';
			endif;
		else:
			echo '<script>alert("Não foi possível criar este usuário.\nLogin já existe!");</script>';
			echo '<script>window.location.href="acesso.php?pag=add-user"</script>';
		endif;	

				
	endif;	

endif;

?>