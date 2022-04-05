
function validacpf(){
 
var i;
 
s = document.form.cpf.value;
 
var c = s.substr(0,9);
 
var dv = s.substr(9,2);
 
var d1 = 0;
 
for (i = 0; i < 9; i++)
 
{
 
d1 += c.charAt(i)*(10-i);
 
}
 
if (d1 == 0){
alert("CPF digitado invalido!")
document.getElementById("cpf").value = "";
document.form.cpf.focus();
return false;
 
}
 
d1 = 11 - (d1 % 11);
 
if (d1 > 9) d1 = 0;
 
if (dv.charAt(0) != d1)
 
{
alert("CPF digitado invalido!")
document.getElementById("cpf").value = "";
document.form.cpf.focus();
return false;
 
}
 
 
d1 *= 2;
 
for (i = 0; i < 9; i++)
 
{
 
d1 += c.charAt(i)*(11-i);
 
}
 
d1 = 11 - (d1 % 11);
 
if (d1 > 9) d1 = 0;
 
if (dv.charAt(1) != d1)
 
{
 
alert("CPF digitado invalido!")
document.getElementById("cpf").value = "";
document.form.cpf.focus();
return false;
 
}
 
return true;
 
}
