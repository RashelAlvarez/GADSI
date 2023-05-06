<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT impacto.idimpacto, impacto.nombre as ni from impacto";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idimpacto'];
	?>


	<option value="<?php echo $row['idimpacto']?>" <?php if($idimpacto==$ide){ ?> selected
	<?php }?></option><?php echo $row['ni']?></option>

	<?php } ?>