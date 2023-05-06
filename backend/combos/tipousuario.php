<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT * from tipousuarios";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idtipousuario'];
	?>


	<option value="<?php echo $row['idtipousuario']?>" <?php if($idtipousuario==$ide){ ?> selected
	<?php }?></option><?php echo $row['nombre']?></option>

	<?php } ?>