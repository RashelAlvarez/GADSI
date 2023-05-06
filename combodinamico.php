
<?php 
include("config/conexi.php");
//$wsql=$_SESSION['wsql'];

//$wsql="SELECT * FROM certificadodelote inner join material on certificadodelote.idmaterial=material.idmaterial $filtro";


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>combo dinamicos</title>
<script>
function crearM(id) 
{ 
	document.form1.idmodelo.length=0;
	document.form1.idmodelo.options[0] = new Option("--- Seleccione una opción ---","","defaultSelected","-1");
	var indice=0; 
	<?php 
	  
	

	    $wsqli="SELECT * FROM auditoria order by fechai";
	    $result = $linki->query($wsqli);
	    if($linki->errno) die($linki->error);
	    while($row = $result->fetch_array()){
     ?>
	
                if (id=="<?php echo $row['idempresa']?>")
                {
                    document.form1.idmodelo.options[indice] = new Option("<?php echo $row['fechai']?>","<?php echo $row['idauditoria']?>");
                    indice++;
                }		
            <?php
            }
       
	?>
}
</script>
</head>

<body>
 
<h1>Combo dinamicos</h1>
<form name="form1">
<select class="form-control" name="idmarca" onChange="crearM(this.value)">
	<option value="-1">Seleccione</option>
    <?php 

        $wsqli="select * from empresas order by nombre";
        $result = $linki->query($wsqli);
	    if($linki->errno) die($linki->error);
	    while($row = $result->fetch_array()){	
    ?>
	<option value="<?php echo $row['idempresa'] ?>" ><?php echo $row['nombre'] ?></option>
	<?php }?>
</select>


<select class="form-control" name="idmodelo">
	<option value="-1">Seleccione</option>
</select>
</form>

</body>
</html>