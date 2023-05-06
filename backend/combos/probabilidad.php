<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT probabilidad.idprobabilidad, probabilidad.nombre as np from probabilidad";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idprobabilidad'];
	?>


	<option value="<?php echo $row['idprobabilidad']?>" <?php if($idprobabilidad==$ide){ ?> selected
	<?php }?></option><?php echo $row['np']?></option>

	<?php } ?>