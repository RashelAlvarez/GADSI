<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT amenazas.idamenaza, amenazas.descripcion as da from amenazas";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idamenaza'];
	?>


	<option value="<?php echo $row['idamenaza']?>" <?php if($idamenaza==$ide){ ?> selected
	<?php }?></option><?php echo $row['da']?></option>

	<?php } ?>