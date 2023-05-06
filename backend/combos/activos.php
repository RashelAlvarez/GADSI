
<script>
function crearM(id) 
{ 
	document.form1.idactivo.length=0;
	document.form1.idactivo.options[0] = new Option("--- Seleccione una opción ---","","defaultSelected","-1");
	var indice=0; 
	<?php 
	    //include_once('config/conexi.php');
	    $linki = new mysqli("localhost", "root", "", "auditorias");
		$linki->query("SET CHARACTER SET utf8");
		if (mysqli_connect_errno()) {
			die("No se puede conectar a la base de datos:" . mysqli_connect_error());
		} 
	

	    $wsqli="SELECT * FROM activos order by idauditoria";
	    $result = $linki->query($wsqli);
	    if($linki->errno) die($linki->error);
	    while($row = $result->fetch_array()){
     ?>
	
                if (id=="<?php echo $row['idauditoria']?>")
                {
                    document.form1.idactivo.options[indice] = new Option("<?php echo $row['nombre']?>","<?php echo $row['descripcion']?>");
                    indice++;
                }
				
            <?php
            }
       
	?>
}
</script>





<!--<option value="">Seleccione una opcion</option>
					 		
	<?php 

		$wsqli="SELECT activos.idactivo, activos.nombre as na from activos";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$ide=$row['idactivo'];
	?>


	<option value="<?php echo $row['idactivo']?>" <?php if($idactivo==$ide){ ?> selected
	<?php }?></option><?php echo $row['na']?></option>

	<?php } ?>-->