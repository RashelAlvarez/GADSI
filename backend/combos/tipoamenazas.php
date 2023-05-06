<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT * FROM tipoamenazas ";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idtipoamenazas'];
	?>


	<option value="<?php echo $row['idtipoamenazas']?>" <?php if($idtipoamenazas==$ide){ ?> selected
	<?php }?></option><?php echo $row['descripcion']?></option>

	<?php } ?>