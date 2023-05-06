<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT * from tipoactivos order by nombre";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idtipoactivo'];
	?>


	<option value="<?php echo $row['idtipoactivo']?>" <?php if($idtipoactivo==$ide){ ?> selected
	<?php }
			?></option><?php echo $row['nombre']?></option>

	<?php } ?>