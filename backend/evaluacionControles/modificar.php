<?php 
session_start(); //habilitar session
if(isset($_POST['idnivelriesgo'])){
	include_once("../../config/conexi.php");
	$id=mysqli_real_escape_string($linki, $_POST['id']);
	$idcontrol=mysqli_real_escape_string($linki, $_POST['control']);
	$idnivelriesgo=mysqli_real_escape_string($linki, $_POST['riesgo']);
	$frecuencia=mysqli_real_escape_string($linki, $_POST['frecuencia']);
	 $tipocontrol=mysqli_real_escape_string($linki, $_POST['tipocontrol']);
	 $automatizacion=mysqli_real_escape_string($linki, $_POST['automatizacion']);

	$wsqli="SELECT * FROM evaluar_controles WHERE idnivelriesgo='$idnivelriesgo' AND idevaluarcontroles<>'$id'";

	//$wsqli="select * from empresas where nombre='$nombre'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="<b>Error!!</b> El calculo de ". $idnivelriesgo. " ya existe";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="UPDATE evaluar_controles SET 
		idcontrol='$idcontrol',
		idnivelriesgo='$idnivelriesgo',
		frecuencia='$frecuencia',
		tipocontrol='$tipocontrol',
		automatizacion='$automatizacion'
		
		
		 
		where idevaluarcontroles='$id'";
		
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="El calculo de ". $idnivelriesgo. " Fue MODIFICADO con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=econ";
header($url);
?>