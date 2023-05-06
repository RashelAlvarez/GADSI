<?php 
session_start(); //habilitar session
if(isset($_POST['riesgo']) and isset($_POST['control'])){
	include_once("../../config/conexi.php");
	 
	//$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	$idcontrol=mysqli_real_escape_string($linki, $_POST['control']);
	$idnivelriesgo=mysqli_real_escape_string($linki, $_POST['riesgo']);
	$frecuencia=mysqli_real_escape_string($linki, $_POST['frecuencia']);
	$tipocontrol=mysqli_real_escape_string($linki, $_POST['tipocontrol']);
	$automatizacion=mysqli_real_escape_string($linki, $_POST['automatizacion']);
 

	 
	
	$wsqli="select * from evaluar_controles where idnivelriesgo='$idnivelriesgo'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="<b>Error!!</b> La evaluacion de este  ". $idnivelriesgo. " ya existe";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="INSERT INTO evaluar_controles
		(idcontrol, 
		idnivelriesgo, 
		frecuencia, 
		tipocontrol,
		automatizacion) VALUES 
		('$idcontrol',
		'$idnivelriesgo',
		'$frecuencia',
		'$tipocontrol',
		'$automatizacion')";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']=" La evaluacion del riesgo [". $idnivelriesgo. "] Fue agregado con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=econ";
header($url);
?>