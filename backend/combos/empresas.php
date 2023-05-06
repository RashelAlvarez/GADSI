<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT * from  empresas order by nombre";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idempresa'];
	?>


	<option value="<?php echo $row['idempresa']?>" <?php if($idempresa==$ide){ ?> selected
	<?php }?></option><?php echo $row['nombre']?></option>

	<?php } ?>