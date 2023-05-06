<option value="">Seleccione una opción</option>
					 		
	<?php 

		$wsqli="SELECT usuarios.idusuario, usuarios.nombre as nu, usuarios.apellido as ua, usuarios.idtipousuario from usuarios where idtipousuario=2";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idtipousuario'];
	?>


	<option value="<?php echo $row['idusuario']?>" <?php if($idusuario==$ide){ ?> selected
	<?php }?></option><?php echo $row['nu']?> <?php echo $row['ua']?></option>

	<?php } ?>