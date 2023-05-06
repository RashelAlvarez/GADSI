<?php 
session_start(); //habilitar session
if(isset($_POST['estatus']) and isset($_POST['empresa'])){
	include_once("../../config/conexi.php");
	$id=mysqli_real_escape_string($linki, $_POST['id']);
	$idempresa=mysqli_real_escape_string($linki, $_POST['empresa']);
	$idestatus=mysqli_real_escape_string($linki, $_POST['estatus']);
	 
	$descripcion=mysqli_real_escape_string($linki, $_POST['descripcion']);
	$fechai=mysqli_real_escape_string($linki, $_POST['fechai']);
	$fechaf=mysqli_real_escape_string($linki, $_POST['fechaf']);
	$observaciones=mysqli_real_escape_string($linki, $_POST['observaciones']);
	$idcontactoinicial=mysqli_real_escape_string($linki, $_POST['idcontactoinicial']);

	$wsqli="SELECT * FROM auditoria WHERE idempresa='$idempresa' AND idauditoria<>'$id'";
	//echo $wsqli;
	//$wsqli="select * from empresas where nombre='$nombre'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="<b>Error!!</b> Ya existe una auditoria de ". $idempresa. " ";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="UPDATE auditoria SET 
		idempresa='$idempresa',
		idestatus='$idestatus',
		descripcion='$descripcion',
		fechai='$fechai',
		fechaf='$fechaf',
		observaciones='$observaciones',
		idcontactoinicial$idcontactoinicial'
		
		 
		where idauditoria='$id'";
		//echo($wsqli);
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="La auditoria ". $id. " Fue MODIFICADO con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=audi";
header($url);
?>