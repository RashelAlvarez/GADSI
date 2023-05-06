<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT auditoria.idauditoria, auditoria.fechai as fechai from auditoria";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idauditoria'];
	?>


	<option value="<?php echo $row['idauditoria']?>" <?php if($idauditoria==$ide){ ?> selected
	<?php }?></option><?php echo $row['fechai']?></option>

	<?php } ?>