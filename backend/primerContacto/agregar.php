<?php 
session_start(); //habilitar session
if(isset($_POST['empresa']) && isset($_POST['fecha'])){
	include_once("../../config/conexi.php");
	 
	//$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	
	$idempresa=mysqli_real_escape_string($linki, $_POST['empresa']);
	$idusuario=mysqli_real_escape_string($linki, $_POST['auditor']);
	$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
	$apellido=mysqli_real_escape_string($linki, $_POST['apellido']);
	$descripcion=mysqli_real_escape_string($linki, $_POST['descripcion']);
	$fecha=mysqli_real_escape_string($linki, $_POST['fecha']);
	
	 
	
	$wsqli="select contactoinicial.idempresa, contactoinicial.fecha from contactoinicial where idempresa='$idempresa' and fecha='$fecha'";
	
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="El primer contacto de la empresa ". $idempresa. " con fecha ".$fecha."  <b>ya existe</b> ";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="INSERT INTO contactoinicial
		(idempresa, 
		nombre, 
		apellido, 
		idusuario,
		fecha,
		descripcion) VALUES 
		('$idempresa',
		'$nombre',
		'$apellido',
		'$idusuario',
		'$fecha',
		'$descripcion')";
		
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']=" La empresa [". $nombre. "] Fue agregado con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=pim";
header($url);
?>