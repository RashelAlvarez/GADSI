<script>
function crearM(id) 
{ 
	document.form1.idauditoria.length=0;
	document.form1.idauditoria.options[0] = new Option("--- Seleccione una opción ---","","defaultSelected","-1");
	var indice=0; 
	<?php 
	    //include_once('config/conexi.php');
	    $linki = new mysqli("localhost", "root", "", "auditorias");
		$linki->query("SET CHARACTER SET utf8");
		if (mysqli_connect_errno()) {
			die("No se puede conectar a la base de datos:" . mysqli_connect_error());
		} 
	

	    $wsqli="SELECT * FROM auditoria order by idauditoria";
	    $result = $linki->query($wsqli);
	    if($linki->errno) die($linki->error);
	    while($row = $result->fetch_array()){
     ?>
	
                if (id=="<?php echo $row['idempresa']?>")
                {
                    document.form1.idauditoria.options[indice] = new Option("Fecha: <?php echo $row['fechaf']?>",
					"<?php echo $row['idauditoria']?>");
                    indice++;
                }		
            <?php
            }
       
	?>
}
</script>