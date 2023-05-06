  <option value="" selected="selected">---Seleciona tu carpeta---</option>
					 		
	<?php 

		$wsqli="SELECT * from file where user_id and is_folder=1 and folder_id is NULL order by created_at desc ";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idfile'];
	?>


	<option value="<?php echo $row['idfile']?>" <?php if($id==$ide){ ?> selected
	<?php }?></option><?php echo $row['filename']?></option>

	<?php } ?>