<option value="">--Seleccione una opción--</option>
					 		
	<?php 

		$wsqli="SELECT usuarios.idusuario, usuarios.correo as nc from usuarios";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idusuario'];
	?>


	<option value="<?php echo $row['idusuario']?>" <?php if($idusuario==$ide){ ?> selected
	<?php }?></option><?php echo $row['nc']?></option>

	<?php } ?>