$(buscar_datos());
function buscar_datos(consulta){
$.ajax({
url:'pdfcita.php',
type:'POST',
dataType:'html',
data:{consulta:consulta},
})
.done(function(respuesta){
 $("#datos2").html(respuesta);
})
.fail(function(){
    console.log("error");
})
}
$(document).on('keyup','#caja_busqueda',function(){
var valor = $(this).val();
if (valor !="") {
	buscar_datos(valor);

}else{
	buscar_datos();
}
});
$(document).ready( function () {
    $('#datables').DataTable();
} );