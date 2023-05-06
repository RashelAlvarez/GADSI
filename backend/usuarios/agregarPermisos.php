<?php 
session_start(); //habilitar session
if(isset($_POST['usuario']) and isset($_POST['modulo'])){
	include_once("../../config/conexi.php");
	 
	//$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	 
	$idusuario=mysqli_real_escape_string($linki, $_POST['usuario']);
	$idmodulos=mysqli_real_escape_string($linki, $_POST['modulo']);
	 
	$ver= isset($_POST["ver"])?1:0;
	$editar= isset($_POST["editar"])?1:0;
	$crear= isset($_POST["crear"])?1:0;
	$eliminar= isset($_POST["eliminar"])?1:0;
 

	  
	
	$wsqli="select * from permisos_modulos where idusuario='$idusuario' and idmodulos='$idmodulos'";
	 	 
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="Ya el usuario tiene permisos asignado en el modulo";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="INSERT INTO permisos_modulos
		(idusuario, 
		idmodulos, 
		ver, 
		editar,
		crear,
		eliminar) VALUES 
		('$idusuario',
		'$idmodulos',
		'$ver',
		'$editar',
		'$crear',
		'$eliminar')";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']=" Registro agregado con exito";
		$_SESSION['tm']=1;
		echo($wsqli);
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=per";
header($url);
?>