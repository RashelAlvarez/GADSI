<?php 
	session_start(); 

	if(!isset($_SESSION['user_id'])){
		header("Location: login.php"); //para irme de una pagina a otra en PHP
	} else {
		include_once("sistema.php");
		// include_once("config/conexi.php"); 
		// require_once("vistas/parte_superior.php") 
	}
	
?>
