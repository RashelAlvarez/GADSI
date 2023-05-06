<?php  
//habilitar sesion
session_start();
//estatus y descripcion debe ser igual al name en el formulario
//se utiliza el metodo POST para proteger los datos y porque es el mismo metodo con el que se envian los datos desde el formulario
if(isset($_POST['tipoamenazas']) and isset($_POST['descripcion'])){  //validar que estas enviado los datos correctos
	include_once("../../config/conexi.php"); //conectar a la base de datos
	 
	$idtipoamenazas=mysqli_real_escape_string($linki, $_POST['tipoamenazas']);
 
	$descripcion=mysqli_real_escape_string($linki, $_POST['descripcion']);

	// ------SELECT PARA VERIFICAR QUE LA AUDITORIA YA EXISTE--------------
 	
	$wsqli="SELECT * FROM amenazas WHERE idtipoamenazas='$idtipoamenazas' and descripcion='$descripcion'";
	$result=$linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row = $result->fetch_array()){
		
		$_SESSION['mensaje']="<b>Error!!</b>La Amenaza <b>" .$descripcion. "</b> ya existe";
		$_SESSION['tm']=0;
		
				
	}else{
		// ------------------- SI NO EXISTE INSERTAR -------------------
		$wsqli="INSERT INTO amenazas(idtipoamenazas,descripcion) VALUES ('$idtipoamenazas', '$descripcion')";
		$result=$linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="<b>Se agrego con exito!!</b>";
		$_SESSION['tm']=1;
		
	}
	
	
	
}else{
	$_SESSION['mensaje']="<b>Debes llenar todos los datos del formulario</b>";
	$_SESSION['tm']=0;
} //fin isset

$url="location:../../sistema.php?pag=ame";
header($url);

?>