<?php 
session_start(); //habilitar session
if(isset($_POST['nombre']) and isset($_POST['rif'])){
	include_once("../../config/conexi.php");
	$id=mysqli_real_escape_string($linki, $_POST['id']);
	//$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
	$rif=mysqli_real_escape_string($linki, $_POST['rif']);
	$direccion=mysqli_real_escape_string($linki, $_POST['direccion']);
	$telefono=mysqli_real_escape_string($linki, $_POST['telefono']);//limpieza de una posible inyeccion
	$wsqli="SELECT * FROM empresas WHERE nombre='$idtipoamenazas' AND idempresa<>'$id'";
		//echo $wsqli;
	//$wsqli="select * from empresas where nombre='$nombre'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="<b>Error!!</b> La Empresa ". $nombre. " ya existe";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="UPDATE empresas SET 
		nombre='$nombre',
		rif='$rif',
		direccion='$direccion',
		telefono='$telefono'
		
		 
		where idempresa='$id'";
		
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="La Empresa ". $nombre. " Fue MODIFICADA con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=emp";
header($url);
?>