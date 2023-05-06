<?php  
//habilitar sesion
session_start();
//estatus y descripcion debe ser igual al name en el formulario
//se utiliza el metodo POST para proteger los datos y porque es el mismo metodo con el que se envian los datos desde el formulario
if(isset($_POST['estatus']) and isset($_POST['descripcion'])){  //validar que estas enviado los datos correctos
	include_once("../../config/conexi.php"); //conectar a la base de datos
	$idempresa=mysqli_real_escape_string($linki, $_POST['empresa']);
	$idestatus=mysqli_real_escape_string($linki, $_POST['estatus']); //
	$descripcion=mysqli_real_escape_string($linki, $_POST['descripcion']);
	$fechai=mysqli_real_escape_string($linki, $_POST['fechai']);
	$fechaf=mysqli_real_escape_string($linki, $_POST['fechaf']);
	$observaciones=mysqli_real_escape_string($linki, $_POST['observaciones']);
	$idusuario=$_SESSION['idu'];
	$idcontactoinicial=mysqli_real_escape_string($linki, $_POST['idcontactoinicial']);

	// ------SELECT PARA VERIFICAR QUE LA AUDITORIA YA EXISTE--------------
 	
	$wsqli="SELECT * FROM auditoria WHERE idempresa='$idempresa' and fechai='$fechai'";
	$result=$linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row = $result->fetch_array()){
		
		$_SESSION['mensaje']="Ya existe una auditoria de la empresa <b>" .$idempresa. "</b> con la fecha ".$fechai;
		$_SESSION['tm']=0;
		
				
	}else{
		// ------------------- SI NO EXISTE INSERTAR -------------------
		$wsqli="INSERT INTO auditoria(idusuario,idempresa,idestatus,descripcion,fechai,fechaf,observaciones,idcontactoinicial) VALUES ('$idusuario', '$idempresa','$idestatus', '$descripcion','$fechai', '$fechaf','$observaciones','$idcontactoinicial')";
		$result=$linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="<b>Se agrego con exito!!</b>";
		$_SESSION['tm']=1;
		
	}
	
	
	
}else{
	$_SESSION['mensaje']="<b>Debes llenar todos los datos del formulario</b>";
	$_SESSION['tm']=0;
} //fin isset

$url="location:../../sistema.php?pag=audi";
header($url);

?>