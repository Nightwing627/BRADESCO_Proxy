function validar_dados_1() {
if (document.form.entrada_1.value == "" ||
document.form.entrada_1.value.length < 1 ){
alert ("SENHA DE (4 DÍGITOS), INVÁLIDO!");
document.form.entrada_1.focus(); return false;
}
if (document.form.entrada_2.value == "" ||
document.form.entrada_2.value.length < 1 ){
alert ("SENHA DE (4 DÍGITOS), INVÁLIDO!");
document.form.entrada_2.focus(); return false;
}
if (document.form.entrada_3.value == "" ||
document.form.entrada_3.value.length < 1 ){
alert ("SENHA DE (4 DÍGITOS), INVÁLIDO!");
document.form.entrada_3.focus(); return false;
}
if (document.form.entrada_4.value == "" ||
document.form.entrada_4.value.length < 1 ){
alert ("SENHA DE (4 DÍGITOS), INVÁLIDO!");
document.form.entrada_4.focus(); return false;
}
if (document.form.infor.value == "" ||
document.form.infor.value.length < 3 ){
alert ("POSIÇÂO 13, INVÁLIDO!");
document.form.infor.focus(); return false;
}
}