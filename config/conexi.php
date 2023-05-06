<?php
	// session_start();

	$dbhost = "localhost";
	$dbname = "auditorias"; 
	$dbuser = "root"; 
	$dbpass = ""; 
 
	$linki = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	$linki->query("SET CHARACTER SET utf8");
	if (mysqli_connect_errno()) {
		die("No se puede conectar a la base de datos:" . mysqli_connect_error());
	}
?>