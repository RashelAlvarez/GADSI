<?php
	session_start();
	include_once("../../config/conexi.php");

if(!empty($_POST)){
	$id=$_POST["id"];
	$file=mysqli_query($linki, "select * from file where idfile=$id");
	while ($rowc=mysqli_fetch_array($file)) {
		$code=$rowc['code'];
	}

	$user_id= $_SESSION["idu"];
	$file_id = $_POST["id"];
	$comment= $_POST["comment"];
	$created_at = "NOW()";

	$sql = "insert into comment (comment,file_id,user_id,created_at) ";
	$sql .= "value (\"$comment\",\"$file_id\",$user_id,$created_at)";

	$query=mysqli_query($linki, $sql);
	if ($query) {
		header("location: ../../sistema.php?pag=arc&code=$code");
	} else {
		print "<script>alert(\"Hubo un error al agregar tu comentario\")</script>";
		print "<script>window.location=\"myfiles.php\"</script>";
	}
	
}

?>