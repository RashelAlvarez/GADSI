<?php 
session_start(); //habilitar session
if(isset($_POST['estatus']) and isset($_POST['nombre'])){
	include_once("../../config/conexi.php");
	$id=mysqli_real_escape_string($linki, $_POST['id']);
	//$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	$idestatus=mysqli_real_escape_string($linki, $_POST['estatus']);
	$idtipousuario=mysqli_real_escape_string($linki, $_POST['tipousuario']);
	$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
	$apellido=mysqli_real_escape_string($linki, $_POST['apellido']);
	$correo=mysqli_real_escape_string($linki, $_POST['correo']);
	$clave=mysqli_real_escape_string($linki, $_POST['clave']);
	$imagen=mysqli_real_escape_string($linki, $_POST['imagen']);

	$wsqli="SELECT * FROM usuarios WHERE nombre='$nombre' AND idusuario<>'$id'";
	
	//$wsqli="select * from empresas where nombre='$nombre'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="<b>Error!!</b> El usuario ". $nombre. " ya existe";
		$_SESSION['tm']=0;
		
	}else{
		$wsqli="UPDATE usuarios SET 
		idestatus='$idestatus',
		idtipousuario='$idtipousuario',
		nombre='$nombre',
		apellido='$apellido',
		correo='$correo',
		clave='$clave',
		imagen='$imagen'
		
		 
		where idusuario='$id'";
		
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="El usuario ". $nombre. " Fue MODIFICADO con exito";
		$_SESSION['tm']=1;
		
		
	}
	
	
	
	
}else{
	$_SESSION['mensaje']="<b>Error!!</b> FORMULARIO SIN DATOS, DEBE LLENARLOS.";
	$_SESSION['tm']=0;
}
$url="location: ../../sistema.php?pag=usu";
header($url);
?>