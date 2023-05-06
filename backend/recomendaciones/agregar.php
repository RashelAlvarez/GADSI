<?php 
session_start(); //habilitar session
if(isset($_POST['idempresa']) && isset($_POST['idauditoria'])){
	include_once("../../config/conexi.php");
			
	$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
 	$idauditoria=mysqli_real_escape_string($linki, $_POST['idauditoria']);
 
	$descripcion=mysqli_real_escape_string($linki, $_POST['descripcion']);
 
	
	$wsqli="SELECT recomendaciones.idempresa, recomendaciones.idauditoria from recomendaciones where idempresa='$idempresa' and idauditoria='$idauditoria' ";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="Las recomendaciones de la empresa y la auditoria seleccionada ya existe";
		$_SESSION['tm']=0;
	}else{
		$wsqli="INSERT INTO recomendaciones
		(idempresa, 
		idauditoria, 
		descripcion) VALUES 
		('$idempresa',
		'$idauditoria',
		'$descripcion')";
		//echo $wsqli;
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']=" El registro fue agregado con exito";
		$_SESSION['tm']=1;
		
		
	}
		
}
$url="location: ../../sistema.php?pag=rec";
header($url);
?>