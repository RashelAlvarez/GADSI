<?php 
session_start(); //habilitar session
if(isset($_POST['estatus']) and isset($_POST['empresa'])){
	include_once("../../config/conexi.php");
	$id=mysqli_real_escape_string($linki, $_POST['id']);
	$idauditoria=mysqli_real_escape_string($linki, $_POST['idauditoria']);
	$idtipoactivo=mysqli_real_escape_string($linki, $_POST['tipoactivo']); //
	$idestatus=mysqli_real_escape_string($linki, $_POST['estatus']);
	$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
	$descripcion=mysqli_real_escape_string($linki, $_POST['descripcion']);
	$responsable=mysqli_real_escape_string($linki, $_POST['responsable']);
	$idconfidencialidad=mysqli_real_escape_string($linki, $_POST['confidencialidad']);
	$idintegridad=mysqli_real_escape_string($linki, $_POST['integridad']);
	$idisponibilidad=mysqli_real_escape_string($linki, $_POST['disponibilidad']);
	$codigo=mysqli_real_escape_string($linki, $_POST['codigo']);
	$wsqli="SELECT * FROM activos WHERE nombre='$nombre' AND idactivo<>'$id'";
	
	//$wsqli="select * from empresas where nombre='$nombre'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="<b>Error!!</b> Ya existe el activo". $nombre. " definidio en la empresa".$idempresa."";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="UPDATE activos SET idauditoria='$idauditoria',
		idtipoactivo='$idtipoactivo',
		idestatus='$idestatus',
		idempresa='$idempresa',
		nombre='$nombre',
		descripcion='$descripcion',
		responsable='$responsable',
		idconfidencialidad='$idconfidencialidad',
		idintegridad='$idintegridad',
		idisponibilidad='$idisponibilidad',
		codigo='$codigo' 
		WHERE idactivo='$id'";

		
		//echo($wsqli);
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="El activo ". $nombre. " Fue MODIFICADO con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=act";
header($url);
?>