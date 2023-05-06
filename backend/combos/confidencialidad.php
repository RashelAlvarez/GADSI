<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT * from confidencialidad order by valor";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idconfidencialidad'];
	?>


	<option value="<?php echo $row['valor']?>" <?php if($idconfidencialidad==$ide){ ?> selected
	<?php }?></option><?php echo $row['nombre']?></option>

	<?php } ?>