<?php
	session_start();

	include_once("../../config/conexi.php");
	include_once("class.upload.php");

 
	if(isset($_SESSION["idu"]) and isset($_POST['description'])){ 

	$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
	$code = "";
	for($i=0;$i<12;$i++){
	    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
	}

	$code= $code;
	$is_public = isset($_POST["is_public"])?1:0;
	$folder_id = $_POST["folder_id"]!="" ? $_POST["folder_id"]:"NULL";
	$is_folder = 0;

	$idusuario=$_SESSION['idu'];
	$description=mysqli_real_escape_string($linki, $_POST['description']);
	$idempresa=mysqli_real_escape_string($linki, $_POST['idempresa']);
	$idauditoria=mysqli_real_escape_string($linki, $_POST['idauditoria']);
	date_default_timezone_set('America/Caracas');
	$created_at = date('Y-m-d H:m:s');


	$handle = new Upload($_FILES['filename']);
	if ($handle->uploaded) {
		$url="../storage/data/".$_SESSION["idu"];
		$handle->Process($url);
		if($handle->processed){
	    $filename = $handle->file_dst_name;

	    $wsqli="INSERT INTO file(code,filename,description,is_public,is_folder,user_id,folder_id,created_at,idempresa,idauditoria) VALUES ('$code', '$filename','$description','$is_public',$is_folder, '$idusuario','$folder_id','$created_at','$idempresa','$idauditoria')";
	    $result=$linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="<b>Se agrego con exito!!</b>";
		$_SESSION['tm']=1;




	 }




	}
}

$url="location:../../sistema.php?pag=fil";
header($url);
?>