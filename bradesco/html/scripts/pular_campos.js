function pulacampo(idobj, idproximo)
{
var str = new String(document.getElementById(idobj).value);
var mx = new Number(document.getElementById(idobj).maxLength);
if (str.length == mx)
{
document.getElementById(idproximo).focus();
}
}