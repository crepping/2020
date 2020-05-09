var RelojID24 = null
var RelojEjecutandose24 = false
function DetenerReloj24 (){
if(RelojEjecutandose24)
clearTimeout(RelojID24)
RelojEjecutandose24 = false}
function MostrarHora24 () {
var ahora = new Date()
var horas = ahora.getHours()
var minutos = ahora.getMinutes()
var segundos = ahora.getSeconds()
var ValorHora
//establece las horas
if (horas < 10)
ValorHora
= "0" + horas
else
ValorHora = "" + horas
//establece los minutos
if (minutos < 10)
ValorHora += ":0" + minutos
else
ValorHora += ":" + minutos
//establece los segundos
if (segundos < 10)
ValorHora += ":0" + segundos
else
ValorHora += ":"
+ segundos
document.reloj24.digitos.value = ValorHora
//si se desea tener el reloj en la barra de estado, reemplazar la anterior por esta
//window.status = ValorHora
RelojID24 = setTimeout("MostrarHora24()",1000)
RelojEjecutandose24 = true
}
function IniciarReloj24 () {
DetenerReloj24()
MostrarHora24()
}
function ValidarSoloNumeros(){
	if((event.keycode < 48) || (event.keycode < 57 ))
		event.returnValue=false;
}
function txtNombre(){
	if((event.keycode != 48) && (event.keycode < 65 ) || (event.keycode > 90) && (event.keycode < 97) ||(event.keycode > 122))
		event.returnValue=false;
}
	
function Verificar($txtrut){ 
$cont=2;
$suma=0;
$largo=strlen($txtrut);
for ($i =largo;$i>0; $i--) {
	$suma=$suma+(substr($txtrut,$i-1,1)*$cont);
	$cont=$cont+1;
	if($cont==8){$cont=2;}
}
$digito=11-($suma%11);
if ($digito==10) {$digito="k";}
if ($digito==10) {$digito="0";}
return $digito;
}