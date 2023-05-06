
<?php 
include("config/conexi.php");
//$wsql=$_SESSION['wsql'];

//$wsql="SELECT * FROM certificadodelote inner join material on certificadodelote.idmaterial=material.idmaterial $filtro";
$titulo="Nivel riesgo";
$titulo2="Nivel riesgo por cantidad de activos ";
$fecha=date('d/m/Y');
$fechas="Fecha : ".$fecha;
$wsqli="SELECT empresas.nombre as ne, activos.nombre as nactivo, (integridad.valor+confidencialidad.valor+disponibilidad.valor)/3 as promedio  from activos
INNER JOIN empresas on activos.idempresa=empresas.idempresa
INNER JOIN integridad on activos.idintegridad=integridad.idintegridad
INNER JOIN confidencialidad on activos.idconfidencialidad=confidencialidad.idconfidencialidad
INNER JOIN disponibilidad on activos.idisponibilidad=disponibilidad.idisponibilidad";
$result=$linki->query($wsqli);
if($linki->errno) die($linki->error);
/*$wsql="SELECT *,sum(cantidad) as cantidad FROM certificadodelote inner join estatus on certificadodelote.idestatus=estatus.idestatus $filtro group by certificadodelote.idestatus ";*/


$vn[]="";
$vc[]="";
$i=0;
while($row = $result->fetch_array()){
	//$vn[$i]=utf8_encode($row['rn']);
	$vc[$i]=$row['promedio'];
    
	$i++;
}
//mysql_close($link);
//mysql_free_result($result);
?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
        <!-- <script type="text/javascript"  src="graficos/jquery.min.js"></script> -->
		<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
    
         var colors = ['#F78C06', '#8bbc21', '#FD0000', '#910000', '#1aadce', 
   '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a', '#a6446a', '#22446a', '#22596a', '#28546a', '#96596a'],
            categories = ['BAJO','MEDIO','ALTO'
            
			/* categories = ['MSIE', 'Firefox', 'Chrome', 'Safari', 'Opera'],*/
			],
           name = '<?php echo $titulo2 ?>',
            data = [
			 <?php
				for ($j=1;$j<$i;$j++){
				
                   if ($vc[$j]<=3) {
                       # code...
                     echo "{";
                    echo "y:".$vc[$j].",";
                    echo "color: colors[$j],";
                    echo "},";
                   }

                   
				}
				?>
				
				
                ];
    
       

    
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: '<?php echo $titulo ?>'
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