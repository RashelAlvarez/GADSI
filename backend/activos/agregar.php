<?php  
//habilitar sesion
session_start();
//estatus y descripcion debe ser igual al name en el formulario
//se utiliza el metodo POST para proteger los datos y porque es el mismo metodo con el que se envian los datos desde el formulario
if(isset($_POST['estatus']) and isset($_POST['nombre'])){  //validar que estas enviado los datos correctos
	include_once("../../config/conexi.php"); //conectar a la base de datos
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
	// ------SELECT PARA VERIFICAR QUE LA AUDITORIA YA EXISTE--------------
 	
	$wsqli="SELECT empresas.nombre as ne, activos.nombre, activos.idempresa, activos.codigo FROM activos 
	INNER JOIN empresas on activos.idempresa=empresas.idempresa 
	WHERE activos.nombre='$nombre' and activos.idempresa='$idempresa' and codigo='$codigo' and activos.idauditoria='$idauditoria' ";
 
	$result=$linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row = $result->fetch_array()){
		
		$_SESSION['mensaje']="El activo de la empresa ".$row['ne']." y el codigo ".$codigo. "de la auditoria seleccionada ya existe";
		$_SESSION['tm']=0;
		
				
	}else{
		// ------------------- SI NO EXISTE INSERTAR -------------------
		$wsqli="INSERT INTO activos(idauditoria,
		idtipoactivo,
		idestatus,
		idempresa,
		nombre,
		descripcion,
		responsable,
		idconfidencialidad,
		idintegridad,
		idisponibilidad,
		codigo) VALUES ('$idauditoria', 
		'$idtipoactivo',
		'$idestatus',
		'$idempresa', 
		'$nombre',
		'$descripcion',
		'$responsable',
		'$idconfidencialidad',
		'$idintegridad',
		'$idisponibilidad',
		codigo)";
	 
		$result=$linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="<b>Se agrego con exito!!</b>";
		$_SESSION['tm']=1;
		
	}
	
	
	
}else{
	$_SESSION['mensaje']="<b>Debes llenar todos los datos del formulario</b>";
	$_SESSION['tm']=0;
} //fin isset

$url="location:../../sistema.php?pag=act";
header($url);

?>