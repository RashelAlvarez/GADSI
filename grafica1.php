
<?php 
include("config/conexi.php");
//$wsql=$_SESSION['wsql'];

//$wsql="SELECT * FROM certificadodelote inner join material on certificadodelote.idmaterial=material.idmaterial $filtro";


?>
<script>
function crearM(id) 
{ 
    document.form1.idauditoria.length=0;
    document.form1.idauditoria.options[0] = new Option("--- Seleccione una opción ---","","defaultSelected","-1");
    var indice=0; 
    <?php 
      
    

        $wsqli="SELECT * FROM auditoria order by fechai";
        $result = $linki->query($wsqli);
        if($linki->errno) die($linki->error);
        while($row = $result->fetch_array()){
     ?>
    
                if (id=="<?php echo $row['idempresa']?>")
                {
                    document.form1.idauditoria.options[indice] = new Option("<?php echo $row['fechai']?>","<?php echo $row['idauditoria']?>");
                    indice++;
                }       
            <?php
            }
       
    ?>
}
</script>



<?php

if(isset($_GET['idempresa'])){
    $idempresa=$_GET['idempresa'];
    $idauditoria=$_GET['idauditoria'];

}else{
    $idempresa=1;
    $idauditoria=1;
}

$titulo="Nivel riesgo";
$titulo2="Nivel riesgo por cantidad de activos ";
$fecha=date('d/m/Y');
$fechas="Fecha : ".$fecha;
$wsqli="SELECT nivel_riesgo.riesgo as rn, COUNT(*) as na from nivel_riesgo 
INNER JOIN activos on nivel_riesgo.idactivo=activos.idactivo 
INNER JOIN auditoria on activos.idauditoria=auditoria.idauditoria 
where auditoria.idempresa=$idempresa
 
AND nivel_riesgo.idauditoria=$idauditoria 
GROUP by nivel_riesgo.riesgo";

$result=$linki->query($wsqli);
if($linki->errno) die($linki->error);
/*$wsql="SELECT *,sum(cantidad) as cantidad FROM certificadodelote inner join estatus on certificadodelote.idestatus=estatus.idestatus $filtro group by certificadodelote.idestatus ";*/






$vn[]="";
$vc[]="";
$i=0;
while($row = $result->fetch_array()){
    $vn[$i]=utf8_encode($row['rn']);
    $vc[$i]=$row['na'];
    $i++;
}
//mysql_close($link);
//mysql_free_result($result);
?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Nivel riesgo</title>

        <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
        <!-- <script type="text/javascript"  src="graficos/jquery.min.js"></script> -->
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
    
         var colors = ['#F78C06', '#8bbc21', '#FD0000', '#910000', '#1aadce', 
   '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a', '#a6446a', '#22446a', '#22596a', '#28546a', '#96596a'],
            categories = [
            <?php 
                for ($j=0;$j<$i;$j++){
            
            echo "'".$vn[$j]."',";
             }?>
            
            /* categories = ['MSIE', 'Firefox', 'Chrome', 'Safari', 'Opera'],*/
            ],
           name = '<?php echo $titulo2 ?>',
            data = [
             <?php
                for ($j=0;$j<$i;$j++){
                    echo "{";
                    echo "y:".$vc[$j].",";
                    echo "color: colors[$j],";
                    echo "},";
                }
                ?>
                
                
                ];
    
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: '<?php echo $titulo?>'
            },
            subtitle: {
                text: '<?php echo $fechas ?>'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Cantidad de activos'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y;
                        }
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    var point = this.point,
                        s = this.x +':<b>'+ this.y;
                    if (point.drilldown) {
                       // s += 'Click to view '+ point.category +' versions';
                    } else {
                       // s += 'Click to return to browser brands';
                    }
                    return s;
                }
            },
            series: [{
                name: name,
                data: data,
                color: 'white'
            }],
            exporting: {
                enabled: false
            }
        });
    });
    
});
        </script>
    </head>
    <body>
<script src="graficos/highcharts.js"></script>
<script src="graficos/modules/exporting.js"></script>
        
<div class="container-fluid">
        
    <div id="container" style="min-width:100%; height: 400px; margin: 0 auto; margin-bottom: 20px"></div>
</div>