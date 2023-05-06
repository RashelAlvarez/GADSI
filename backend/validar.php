<?php 
session_start(); //habilitar session

$url="Location: ../login.php";
if (!empty($_POST['correo'] && !empty($_POST['clave']))){
	if(isset($_POST['correo']) && isset($_POST['clave'])){
		include_once("../config/conexi.php");
		$correo = mysqli_real_escape_string($linki, $_POST['correo']);
		$clave = mysqli_real_escape_string($linki, $_POST['clave']);//limpieza de una posible inyeccion
		$wsqli = "select * from usuarios where correo='$correo' and clave='$clave'";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);

		if($row = $result->fetch_array()){
			if ($row['idestatus'] == 1) {
				$_SESSION['bienvenido'] = "Bienvenido " . $row['nombre'];
				$_SESSION['idu'] = $row['idusuario']; //IMPORTANTISIMOO 
				$_SESSION['idt'] = $row['idtipousuario']; //obtiene el idtipousuario de la bd y se lo asigna a la variable global session con un array llamado idt
				$_SESSION['user_id'] = $row['idusuario'];

				$url="Location: ../sistema.php";

			} else {
				$mensaje = $_SESSION['cuentainactiva'] = "Tu cuenta esta inactiva";
				$url="Location: ../login.php";
			}
		} else {
			$mensaje = $_SESSION['noexiste'] = "Correo o contraseña invalido";
		 
			// unset($_SESSION['noexiste']); //para borrar el mensaje cuando recargues la pagina
			unset($_SESSION['bienvenido']);
			unset($_SESSION['idu']);
			unset($_SESSION['idt']);
			//unset($_SESSION['idt']);
			$url="Location: ../login.php";	
		}

		$result->free_result();
		$linki->close();
	}
}

header($url);
?>