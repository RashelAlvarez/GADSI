 
<!--<script type="text/javascript" src="../../js/html2canvas.js"></script>------ESTE ESCRIPT SIRVE PARA CONVERTIR UN DIV EN IMAGEN--><head>
	 <link rel="stylesheet" href="css/gra/schwartz.css">
 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 
 
	 
</head>
 
<script>
function crearM(id) 
{ 
    document.form4.auditoria.length=0;
    document.form4.auditoria.options[0] = new Option("--- Seleccione una opción ---","","defaultSelected","-1");
    var indice=0; 
    <?php 
      
    

        $wsqli="SELECT * FROM auditoria order by fechai";
        $result = $linki->query($wsqli);
        if($linki->errno) die($linki->error);
        while($row = $result->fetch_array()){
     ?>
    
                if (id=="<?php echo $row['idempresa']?>")
                {
                    document.form4.auditoria.options[indice] = new Option("<?php echo $row['fechai']?>","<?php echo $row['idauditoria']?>");
                    indice++;
                }       
            <?php
            }
       
    ?>
}


$(document).on('ready',function(){

  $('#schwartz').click(function(){
     // $('#datos').html('<center>Espere por favor.. <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></center>');
    var url = "backend/riesgos/schwartz_bajo.php";                                      

    $.ajax({                        
       type: "GET",                 
       url: url,                    
       data: $("#form4").serialize(),
       success: function(data)            
       {
        
         $('#idbajo').html(data);   
     /*    $('#datos').fadeIn(1000).html('');
          sleep(1000);*/
       }
     });
  });
});

//-----SCRIPT PARA EL LOADER--------------
$(document).on('ready',function(){

  $('#schwartz').click(function(){
      $('#datos').html('<center>Espere por favor.. <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></center>');
                                     

    $.ajax({                        
                           
       data: $("#form4").serialize(),
       success: function(data)            
       {
        
      
         $('#datos').fadeIn(1000).html('');
          sleep(1000);
        
       }
     });
  });
});

function sleep(milisegundos) {
  var comienzo = new Date().getTime();
  while (true) {
    if ((new Date().getTime() - comienzo) > milisegundos)
      break;
  }
}
//-----------------------------------------------

$(document).on('ready',function(){

  $('#schwartz').click(function(){
    var url = "backend/riesgos/schwartz_moderado.php";                                      

    $.ajax({                        
       type: "GET",                 
       url: url,                    
       data: $("#form4").serialize(),
       success: function(data)            
       {
         $('#idmoderado').html(data);           
       }
     });
  });
});


 


$(document).on('ready',function(){

  $('#schwartz').click(function(){
    var url = "backend/riesgos/schwartz_alto.php";                                      

    $.ajax({                        
       type: "GET",                 
       url: url,                    
       data: $("#form4").serialize(),
       success: function(data)            
       {
         $('#idalto').html(data);           
       }
     });
  });
});


$(document).on('ready',function(){

  $('#schwartz').click(function(){
    var url = "backend/riesgos/schwartz_extremo.php";                                      

    $.ajax({                        
       type: "GET",                 
       url: url,                    
       data: $("#form4").serialize(),
       success: function(data)            
       {
         $('#idextremo').html(data);           
       }
     });
  });
});
</script>

 
<div class="container-fluid">



 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Escenario Schwartz de riesgos</h1>
    </div>



    <div class="col-7 offset-3  contenedor" id="imagen">
        <form name="form4" id="form4" method="get" >
          <label><b>Empresa:</b></label>
          <select class="form-control-inline" name="empresa" id="empresa" onChange="crearM(this.value)">
            <option value="-1">Seleccione</option>
                <?php 

                    $wsqli="select * from empresas order by nombre";
                    $result = $linki->query($wsqli);
                  if($linki->errno) die($linki->error);
                  while($row = $result->fetch_array()){ 
                    
                ?>
              <option value="<?php echo $row['idempresa'] ?>" ><?php echo $row['nombre'] ?></option>
              <?php }?>
          </select>
                <label><b>Fecha de auditoria:</b></label>
                <select class="form-control-inline" name="auditoria" id="auditoria">
                    <option value="-1">Seleccione</option>
                </select>
                <button type="button"  id="schwartz">Enviar</button>
                <div id='datos'></div>

        </form>
      <br>
    	<div class="table-responsive  ">
		
			<table class="table table-bordered   table-hover escenario" border="1"  >
	    		
	    		<tr>
	    		<td class="text-center ri" rowspan="4"><p><b>Peor escenario</b></p></td>
	    		<td class="text-center re" colspan="2"><b>Mayor probabilidad de continuidad de negocio</b></td>
	    		<td class="text-center rie" rowspan="4"><p><b>Mejor escenario</b></p></td></tr>
	    		<td class="text-center r2" type="button"  data-toggle="modal" data-target="#moderado">MODERADO</td>
	    		<td class="text-center r1" type="button"  data-toggle="modal" data-target="#bajo">BAJO</td>
	    		<tr><td class="text-center r4" type="button"  data-toggle="modal" data-target="#extremo">EXTREMO</td>
	    		<td class="text-center r3" type="button"  data-toggle="modal" data-target="#alto">ALTO</td>
	    		<tr><td class="text-center ro" colspan="2"><b>Menor probabilidad de continuidad de negocio</b></td></tr></tr>
	    		

	    	</table>


		</div>

	</div>



</div> <!--cierre del container-fluid-->
 
<?php 
if(isset($_GET['empresa'])){
    $empresa=$_GET['empresa'];
    $auditoria=$_GET['auditoria'];
 

}else{
    $empresa=1;
    $auditoria=1;
 
}

?>


 
<!--------------------------------------------- MODAL  ---------------------------------->
<div class="modal fade" id="bajo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="idbajo">
 

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>
  </div>
</div>
<!------------------------------------------------MODAL--------------------------------------------------------->

<div class="modal fade" id="moderado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  id="idmoderado" >
 



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------MODAL-------------------------------------------------------------->
<div class="modal fade" id="alto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="idalto" >
 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>
  </div>
</div>
<!------------------------------------------------MODAL-------------------------------------------------------------------->

<div class="modal fade" id="extremo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="idextremo" >
 



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>
  </div>
</div>




<!----------------------------------EL SIGUIENTE SCRIPT SIRVE PARA CONVERTIR UN DIV EN IMAGEN Y DESCARGAR ---------------------------------------
<button type="button" class="btn btn-primary col-3 offset-4 " id="boton-descarga">Descargar gráfico de schwartz</button>
 
<script>
	function downloadCanvas(canvasId, filename) {
    // Obteniendo la etiqueta la cual se desea convertir en imagen
    var domElement = document.getElementById(canvasId);
 
    // Utilizando la función html2canvas para hacer la conversión
    html2canvas(domElement, {
        onrendered: function(domElementCanvas) {
            // Obteniendo el contexto del canvas ya generado
            var context = domElementCanvas.getContext('2d');
 
            // Creando enlace para descargar la imagen generada
            var link = document.createElement('a');
            link.href = domElementCanvas.toDataURL("image/png");
            link.download = filename;
 
            // Chequeando para browsers más viejos
            if (document.createEvent) {
                var event = document.createEvent('MouseEvents');
                // Simulando clic para descargar
                event.initMouseEvent("click", true, true, window, 0,
                    0, 0, 0, 0,
                    false, false, false, false,
                    0, null);
                link.dispatchEvent(event);
            } else {
                // Simulando clic para descargar
                link.click();
            }
        }
    });
}
 
// Haciendo la conversión y descarga de la imagen al presionar el botón
$('#boton-descarga').click(function() {
    downloadCanvas('imagen', 'imagen.png');
});

</script>
--------------------------------------------------------------------------------------------------------------------------------------->

 