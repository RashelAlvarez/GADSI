<?php  
//habilitar sesion
session_start();
//estatus y nombre debe ser igual al name en el formulario
if(isset($_POST['dominio']) and isset($_POST['nombre'])){  //validar que estas enviado los datos correctos
	include_once("../../config/conexi.php"); //conectar a la base de datos
	$id=mysqli_real_escape_string($linki, $_POST['id']);

	$dominio=mysqli_real_escape_string($linki, $_POST['dominio']); //
	$objetivo=mysqli_real_escape_string($linki, $_POST['objetivo']);
	$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
 	
	$wsqli="SELECT * FROM controles WHERE nombre='$nombre' AND idcontrol<>'$id'";
	$result=$linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row = $result->fetch_array()){
		
		$_SESSION['mensaje']="<b>Error!!</b>La categoria <b>" .$nombre. "</b> ya existe";
		$_SESSION['tm']=0;
		
				
	}else{
		
		$wsqli="UPDATE controles SET dominio='$dominio',
										objetivo='$objetivo',
										nombre='$nombre'
										where idcontrol='$id'";
							
		$result=$linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="<b>Se modifico con exito!!</b>El control <b>" .$nombre. "</b> ";
		$_SESSION['tm']=1;
		
	}
	
	
	
}else{
	$_SESSION['mensaje']="<b>Debes llenar todos los datos del formulario</b>";
	$_SESSION['tm']=0;
} //fin isset

$url="location:../../sistema.php?pag=con";
header($url);

?>