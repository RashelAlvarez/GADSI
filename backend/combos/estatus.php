<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT * from estatus";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idestatus'];
	?>


	<option value="<?php echo $row['idestatus']?>" <?php if($idestatus==$ide){ ?> selected
	<?php }?></option><?php echo $row['nombre']?></option>

	<?php } ?>