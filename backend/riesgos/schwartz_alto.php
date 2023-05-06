<?php
include_once("../../config/conexi.php");


$empresa= $_REQUEST["empresa"];
$auditoria=$_REQUEST["auditoria"];
 
 
?>

<?php

    echo "A continuación se muestra los activos que estan en el nivel de riesgo alto: ";
	$wsqli="SELECT nivel_riesgo.idauditoria, activos.nombre as na, nivel_riesgo.riesgo from nivel_riesgo inner join activos on nivel_riesgo.idactivo=activos.idactivo where nivel_riesgo.riesgo='ALTO' and nivel_riesgo.idauditoria='$auditoria' and activos.idempresa='$empresa' ";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	while($row = $result->fetch_array()){
	?>

	<ul>
		<li><?php echo $row['na']?></li>
	</ul>


	<?php }  





?>