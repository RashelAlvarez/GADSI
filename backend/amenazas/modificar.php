<?php 
session_start(); //habilitar session
if(isset($_POST['tipoamenazas']) and isset($_POST['descripcion'])){
	include_once("../../config/conexi.php");
	$id=mysqli_real_escape_string($linki, $_POST['id']);
	 
	$idtipoamenazas=mysqli_real_escape_string($linki, $_POST['tipoamenazas']);
	 
	$descripcion=mysqli_real_escape_string($linki, $_POST['descripcion']);

	$wsqli="SELECT * FROM amenazas WHERE descripcion='$descripcion' AND idamenaza<>'$id'";
	 
	//$wsqli="select * from empresas where nombre='$nombre'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="<b>Error!!</b> La amenaza". $descripcion. " ya existe";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="UPDATE amenazas SET 
		idtipoamenazas='$idtipoamenazas',
		 
		descripcion='$descripcion'
		
		
		 
		where idamenaza='$id'";
	
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="La amenaza ". $descripcion. " Fue MODIFICADO con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=ame";
header($url);
?>