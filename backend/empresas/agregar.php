<?php 
session_start(); //habilitar session
if(isset($_POST['rif']) && isset($_POST['nombre'])){
	include_once("../../config/conexi.php");
	 
	//$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
	$rif=mysqli_real_escape_string($linki, $_POST['rif']);
	$direccion=mysqli_real_escape_string($linki, $_POST['direccion']);
	$telefono=mysqli_real_escape_string($linki, $_POST['telefono']);
	date_default_timezone_set('America/Caracas');
	$fecha = date('Y-m-d');
	 
	 
	
	$wsqli="select * from empresas where nombre='$nombre'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="<b>Error!!</b> La empresa ". $nombre. " ya existe";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="INSERT INTO empresas
		(nombre, 
		rif, 
		direccion, 
		telefono,
		fecha) VALUES 
		('$nombre',
		'$rif',
		'$direccion',
		'$telefono',
		'$fecha')";
		
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']=" La empresa [". $nombre. "] Fue agregado con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=emp";
header($url);
?>