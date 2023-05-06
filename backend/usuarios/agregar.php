<?php 
session_start(); //habilitar session
if(isset($_POST['correo']) and isset($_POST['clave'])){
	include_once("../../config/conexi.php");
	 
	//$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	$idestatus=mysqli_real_escape_string($linki, $_POST['estatus']);
	$idtipousuario=mysqli_real_escape_string($linki, $_POST['tipousuario']);
	$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
	$apellido=mysqli_real_escape_string($linki, $_POST['apellido']);
	$correo=mysqli_real_escape_string($linki, $_POST['correo']);
	$clave=mysqli_real_escape_string($linki, $_POST['clave']);
	$default_profile="f1.png";
	 
	
	$wsqli="SELECT usuarios.correo, usuarios.clave, usuarios.idtipousuario from usuarios where correo='$correo'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row=$result->fetch_array()){
		$_SESSION['mensaje']="El Correo ". $correo. " <b>ya existe</b>";
		$_SESSION['tm']=0;
		
	}else{
		if(isset($_POST['tipousuario']) and ($row['idtipousuario'])=='1'){
			
		
		$wsqli="INSERT INTO usuarios
		(idestatus, 
		idtipousuario, 
		nombre, 
		apellido,
		correo,
		clave,
		image) VALUES 
		('$idestatus',
		'$idtipousuario',
		'$nombre',
		'$apellido',
		'$correo',
		'$clave',
		'$default_profile')";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']=" El correo [". $correo. "]Fue agregado con exito";
		$_SESSION['tm']=1;
		
		
	}else{
			$_SESSION['admin']="Ya existe un usuario administrador";
		}//else del SESSION ADMIN ya existe
	}//else del if fetch-array
}//if del correo y clave
$url="location: ../../sistema.php?pag=usu";
header($url);
?>