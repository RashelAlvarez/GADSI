 <?php 
include("config/conexi.php");
?>


<script>
function crearM3(id) 
{ 
    document.form2.idauditoria1.length=0;
    document.form2.idauditoria1.options[0] = new Option("--- Seleccione una opción ---","","defaultSelected","-1");
    var indice=0; 
    <?php 
      
    

        $wsqli="SELECT * FROM auditoria order by fechai";
        $result = $linki->query($wsqli);
        if($linki->errno) die($linki->error);
        while($row = $result->fetch_array()){
     ?>
    
                if (id=="<?php echo $row['idempresa']?>")
                {
                    document.form2.idauditoria1.options[indice] = new Option("<?php echo $row['fechai']?>","<?php echo $row['idauditoria']?>");
                    indice++;
                }       
            <?php
            }
       
    ?>
}
function crearM2(id) 
{ 
    document.form2.idauditoria2.length=0;
    document.form2.idauditoria2.options[0] = new Option("--- Seleccione una opción ---","","defaultSelected","-1");
    var indice=0; 
    <?php 
      
    

        $wsqli="SELECT * FROM auditoria order by fechai";
        $result = $linki->query($wsqli);
        if($linki->errno) die($linki->error);
        while($row = $result->fetch_array()){
     ?>
    
                if (id=="<?php echo $row['idempresa']?>")
                {
                    document.form2.idauditoria2.options[indice] = new Option("<?php echo $row['fechai']?>","<?php echo $row['idauditoria']?>");
                    indice++;
                }       
            <?php
            }
       
    ?>
}
</script>


<?php
if(isset($_GET['idempresa2'])){
    $idempresa2=$_GET['idempresa2'];
    $idauditoria1=$_GET['idauditoria1'];
	$idauditoria2=$_GET['idauditoria2'];

}else{
    $idempresa2=1;
    $idauditoria1=1;
	$idauditoria2=1;
}

$titulo="Comparación de auditorías de nivel de riesgo";
$titulo2="Nivel riesgo por cantidad de activos ";
$fecha=date('d/m/Y');
$fechas="Fecha : ".$fecha;
$wsqli="SELECT nivel_riesgo.riesgo as rn, COUNT(*) as na from nivel_riesgo 
INNER JOIN activos on nivel_riesgo.idactivo=activos.idactivo 
INNER JOIN auditoria on activos.idauditoria=auditoria.idauditoria 
where auditoria.idempresa=$idempresa2
AND nivel_riesgo.idauditoria=$idauditoria1 
GROUP by nivel_riesgo.riesgo";

$result=$linki->query($wsqli);
if($linki->errno) die($linki->error);
/*$wsql="SELECT *,sum(cantidad) as cantidad FROM certificadodelote inner join estatus on certificadodelote.idestatus=estatus.idestatus $filtro group by certificadodelote.idestatus ";*/

$wsqli2="SELECT nivel_riesgo.riesgo as rn, COUNT(*) as na 
from nivel_riesgo INNER JOIN activos on nivel_riesgo.idactivo=activos.idactivo 
INNER JOIN auditoria on activos.idauditoria=auditoria.idauditoria 
where auditoria.idempresa=$idempresa2 AND nivel_riesgo.idauditoria=$idauditoria2 
GROUP by nivel_riesgo.riesgo";
$result2=$linki->query($wsqli2);
if($linki->errno) die($linki->error);
 
$vc2[]="";
$m=0;
while($row2 = $result2->fetch_array()){
   
    $vc2[$m]=$row2['na'];
    $m++;
}






$vn[]="";
$vc[]="";
$i=0;
while($row = $result->fetch_array()){
    $vn[$i]=utf8_encode($row['rn']);
    $vc[$i]=$row['na'];
    $i++;
}



?>


 <!-- comentar el script de  -->
        
		<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container1',
                type: 'line'
            },
            title: {
                text: '<?php echo $titulo ?>'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
            <?php 
                for ($j=0;$j<$i;$j++){
            
            echo "'".$vn[$j]."',";
             }?>
            
            /* categories = ['MSIE', 'Firefox', 'Chrome', 'Safari', 'Opera'],*/
            ]
            },
            yAxis: {
                title: {
                    text: 'Cantidad de activos'
                }
            },
            tooltip: {
                enabled: false,
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'°C';
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Auditoría1',
                data: [
             <?php
                for ($j=0;$j<$i;$j++){
                    echo "{";
                    echo "y:".$vc[$j].",";
                     
                    echo "},";
                }
                ?>
                
                
                ]
            },
             {
                name: 'Auditoría2',
                data: [ 
                <?php
                for ($n=0;$n<$m;$n++){
                    echo "{";
                    echo "y:".$vc2[$n].",";
                     
                    echo "},";
                }
                ?>]
            }

            ]
        });
    });
    
});
		</script>
	 
	 
<script src="graficos/highcharts.js"></script>
<script src="graficos/modules/exporting.js"></script>

<div class="container-fluid">
        
    <div id="container1" style="min-width:100%; height: 400px; margin: 0 auto; margin-bottom: 20px"></div>
</div>

 
