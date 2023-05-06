<option value="">--Seleccione una opción--</option>
					 		
	<?php 

		$wsqli="SELECT modulos.idmodulos, modulos.nombre as nm from modulos";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idmodulos'];
	?>


	<option value="<?php echo $row['idmodulos']?>" <?php if($idmodulos==$ide){ ?> selected
	<?php }?></option><?php echo $row['nm']?></option>

	<?php } ?>