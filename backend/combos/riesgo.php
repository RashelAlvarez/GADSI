<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT nivel_riesgo.idnivelriesgo, activos.nombre as act, empresas.nombre as ne, auditoria.fechai as fecha  from nivel_riesgo
		INNER JOIN activos ON nivel_riesgo.idactivo=activos.idactivo
		INNER JOIN auditoria ON  nivel_riesgo.idauditoria=auditoria.idauditoria
		INNER JOIN empresas on empresas.idempresa=auditoria.idempresa
		ORDER BY ne";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idnivelriesgo'];
	?>


	<option value="<?php echo $row['idnivelriesgo']?>" <?php if($idnivelriesgo==$ide){ ?> selected
	<?php }?></option><?php echo $row['act']?> - <?php echo $row['ne']?> - <?php echo $row['fecha'] ?></option>

	<?php } ?>