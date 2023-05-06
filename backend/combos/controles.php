<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT controles.idcontrol, controles.nombre as nc from controles";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idcontrol'];
	?>


	<option value="<?php echo $row['idcontrol']?>" <?php if($idcontrol==$ide){ ?> selected
	<?php }?></option><?php echo $row['nc']?></option>

	<?php } ?>