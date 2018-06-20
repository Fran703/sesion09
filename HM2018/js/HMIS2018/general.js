setInterval('reloj()', 1000);

$('.probabilidadRiesgo').change(function(){
  var probabilidadRiesgo = $('.probabilidadRiesgo > input').val();
  $('#probabilidadRiesgoValor').html(probabilidadRiesgo);
});

//RELOJ
function reloj (){  
    var ahora = new Date(); 
   	var hora = ahora.getHours(); 
   	var minuto = ahora.getMinutes(); 
   	var segundo = ahora.getSeconds(); 

   	var str_segundo = new String (segundo);        
   	if (str_segundo.length === 1){segundo = "0" + segundo;} 
      	 
   	var str_minuto = new String (minuto); 
   	if (str_minuto.length === 1) {minuto = "0" + minuto;}
      	 
   	var str_hora = new String (hora); 
   	if (str_hora.length === 1) {hora = "0" + hora;} 
      	 
   	var horaCompleta = hora + ":" + minuto + ":" + segundo;  

    $(".reloj").html(horaCompleta);  

 } 