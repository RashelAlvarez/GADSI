<?php
	session_start();

	include_once("../../config/conexi.php");


if(isset($_POST['filename']) and isset($_POST['description'])){ 

	$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
	$code = "";
	for($i=0;$i<12;$i++){
	    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
	}

	$code= $code;
	$filename=mysqli_real_escape_string($linki, $_POST['filename']);
	$description=mysqli_real_escape_string($linki, $_POST['description']);
	$is_folder=1;
	$is_public = isset($_POST["is_public"])?1:0;
	$idusuario=$_SESSION['idu'];
	 date_default_timezone_set('America/Caracas');
	$created_at = date('Y-m-d H:m:s');
   
 

	// ------SELECT PARA VERIFICAR QUE LA CARPETA YA EXISTE--------------


	$wsqli="SELECT * FROM file WHERE filename='$filename' and idfile='$id'";
	$result=$linki->query($wsqli);
	if($linki->errno) die($linki->error);
	if($row = $result->fetch_array()){
		
		print "<script>alert(\"La carpeta ya existe\")</script>";
		
				
	}else{
		// ------------------- SI NO EXISTE INSERTAR -------------------
		$wsqli="INSERT INTO file(code,filename,description,is_public,is_folder,user_id,created_at) VALUES ('$code', '$filename','$description',$is_public, '$is_folder','$idusuario','$created_at')";
		
	 
		$result=$linki->query($wsqli);
		if($linki->errno) die($linki->error);
		//print "<script>alert(\"Carpeta creada con exito\")</script>";
		//print "<script>window.location=\"../newfolder.php\"</script>";
		 
	}
	 



	

 /*   $sql = "insert into file (code,filename,description,is_folder,is_public,user_id,created_at) ";
	$sql .= "value (\"$code\",\"$filename\",\"$description\",1,$is_public,$user_id,NOW())";

	$query = mysqli_query($con, $sql);
	if ($query) {
		print "<script>alert(\"Carpeta creada con exito\")</script>";
			print "<script>window.location=\"../newfolder.php\"</script>";
	} else {
		print "<script>alert(\"Hubo un error al crear la carpeta\")</script>";
			print "<script>window.location=\"../newfolder.php\"</script>";
	}*/
	

}

$url="location:../../sistema.php?pag=fol";
header($url);

?>