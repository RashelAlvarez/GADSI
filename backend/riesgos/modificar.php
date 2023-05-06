<?php 
session_start(); //habilitar session
if(isset($_POST['idactivo'])){
	include_once("../config/conexi.php");
	$id=mysqli_real_escape_string($linki, $_POST['id']);
	$idamenaza=mysqli_real_escape_string($linki, $_POST['amenaza']);
	$idprobabilidad=mysqli_real_escape_string($linki, $_POST['probabilidad']);
	$idimpacto=mysqli_real_escape_string($linki, $_POST['impacto']);
	$idactivo=mysqli_real_escape_string($linki, $_POST['idactivo']);
	//probando:
	$idauditoria=mysqli_real_escape_string($linki, $_POST['idauditoria']);
	 

	$wsqli="SELECT * FROM nivel_riesgo WHERE idactivo='$idactivo' AND idnivelriesgo<>'$id'";
	//echo $wsqli;
	//$wsqli="select * from empresas where nombre='$nombre'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="<b>Error!!</b> El calculo de ". $idactivo. " ya existe";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="UPDATE nivel_riesgo SET
		idamenaza='$idamenaza', 
		idprobabilidad='$idprobabilidad',
		idimpacto='$idimpacto',
		idactivo='$idactivo',
		idauditoria='$idauditoria'
		
		
		 
		where idnivelriesgo='$id'";
		//echo $wsqli;
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="El calculo de ". $idactivo. " Fue MODIFICADO con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=nri";
header($url);
?>