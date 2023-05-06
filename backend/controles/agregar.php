<?php 
session_start(); //habilitar session
if(isset($_POST['dominio']) and isset($_POST['nombre'])){
	include_once("../../config/conexi.php");
	 
	//$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	$dominio=mysqli_real_escape_string($linki, $_POST['dominio']);
	$objetivo=mysqli_real_escape_string($linki, $_POST['objetivo']);
	$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
	 

	 
	
	$wsqli="select * from controles where nombre='$nombre'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="<b>Error!!</b> El control ". $nombre. " ya existe";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="INSERT INTO controles
		(dominio, 
		objetivo, 
		nombre) VALUES 
		('$dominio',
		'$objetivo',
		'$nombre')";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']=" El control [". $nombre. "] Fue agregado con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=con";
header($url);
?>