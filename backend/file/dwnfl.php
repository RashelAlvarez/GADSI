<?php
include_once("../../config/conexi.php");

$id_code=$_GET["code"];
$file = mysqli_query($linki,"select * from file where code=\"$id_code\"");

while ($rows=mysqli_fetch_array($file)) {
	$filename=$rows['filename'];
	$user_id=$rows['user_id'];
	$is_folder=$rows['is_folder'];
}

$url = "../storage/data/".$user_id."/";


if(!$is_folder){
	$fullurl=$url.$filename;
header("Content-Disposition: attachment; filename=$filename");
readfile($fullurl); 

}



?>