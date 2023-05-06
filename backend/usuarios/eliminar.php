<?php 
session_start(); //habilitar session
if(isset($_GET['id'])){ //si viene un ID entro al codigo
	include_once("../../config/conexi.php");
	$id=mysqli_real_escape_string($linki, $_GET['id']);//necesito saber cual es el ID y se filtra con  mysqli_real_escape
	
	$wsqli="delete from usuarios where idusuario='$id'"; //variable mas importante
	$result = $linki->query($wsqli);
	//echo($wsqli);

//####################################################################################
	if($linki->errno){ //errno: Numero de Error
		$_SESSION['mensaje']="<b>Error!!</b> el usuario NO SE PUEDE ELIMINAR";
		$_SESSION['tm']=0;
	}else{
		$_SESSION['mensaje']="<b>Error!!</b> el usuario FUE ELIMINADO con exito";
		$_SESSION['tm']=1;
	}
//####################################################################################
	
	
}
$url="location: ../../sistema.php?pag=usu";
header($url); //esto sirve para que se devuelva a la pagina

?>