<?php 
session_start(); //habilitar session
if(isset($_POST['idactivo'])){
	include_once("../../config/conexi.php");
	 
	//$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	$idamenaza=mysqli_real_escape_string($linki, $_POST['amenaza']);
	$idprobabilidad=mysqli_real_escape_string($linki, $_POST['probabilidad']);
	$idimpacto=mysqli_real_escape_string($linki, $_POST['impacto']);
	$idactivo=mysqli_real_escape_string($linki, $_POST['idactivo']);
	//probando:
	$idauditoria=mysqli_real_escape_string($linki, $_POST['idauditoria']);
	$riesgo="No calculado";
	 
	 
	
	$wsqli="select * from nivel_riesgo where idactivo='$idactivo'";
	//echo $wsqli;
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="A este activo ya se le calculo el nivel de riesgo";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="INSERT INTO nivel_riesgo
		(idamenaza,
		idprobabilidad, 
		idimpacto, 
		idactivo,
		riesgo,
		idauditoria) VALUES 
		('$idamenaza',
		'$idprobabilidad',
		'$idimpacto',
		'$idactivo',
		'$riesgo',
		'$idauditoria')";
		//echo ($wsqli);
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']=" El Calculo de [". $idactivo. "] Fue agregado con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=nri";
header($url);
?>