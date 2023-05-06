
 <!----------------------- CONTENIDO DE LA PAGINA ---------------------------->
 <!------------------ SE MODIFICO EL ACCESO A LAS PAGINAS -------------------->
 <!----- CADA FORMULARIO SE ENCUENTRA EN LA CARPETA CORRESPONDIENTE DENTRO DEL BACKEND ----->
 <!---- DEBES IR A LA SECCION DEL MENU Y CAMBIAR LA RUTA por ejemplo href=sistema.php?pag=emp ----->

<?php 
	session_start(); 

	if (!isset($_SESSION['idu'])){
		header("Location: login.php");
	}

	include_once("config/conexi.php"); 	

	$idt = $_SESSION['idt'];
	if($idt == "1"){
		include_once("vistas/parte_superior.php");
	} elseif($idt == "2"){
		include_once("vistas/parte_superior2.php");
	} elseif($idt == "3"){
		include_once("vistas/parte_superior3.php");
	}
	
	if(!isset($_GET['pag'])){
		//echo 'AQUILSA';
		if($idt == "1" || $idt == "2"){
			include_once("container.php");
		} elseif($idt == "3"){
			include_once("container2.php");
		}
	} else { //de lo contrario el modulo que seleccione redirige la pagina
		//echo 'ACALSA';
		$pag = $_GET['pag'];

		# Auditor Lider
		if($pag=='audi'){
			if(!isset($_SESSION['idt']) || ($_SESSION['idt'] != '2' && $_SESSION['idt'] != '1')){
				die('Acceso denegado');
			}
			include_once("backend/auditorias/frmAuditoria.php");
		}

		if($pag=='emp'){
			if(!isset($_SESSION['idt']) || ($_SESSION['idt'] != '2' && $_SESSION['idt'] != '1')){
				die('Acceso denegado');
			}
			include_once("backend/empresas/frmEmpresa.php");
		}
		if($pag=='con'){ 
		if(!isset($_SESSION['idt']) || ($_SESSION['idt'] != '2' && $_SESSION['idt'] != '1')){
				die('Acceso denegado');
			} 
		include_once("backend/controles/frmControles.php");
		}

		if($pag=='verusu') { 
			if(!isset($_SESSION['idt']) || ($_SESSION['idt'] != '2' && $_SESSION['idt'] != '1')){
				die('Acceso denegado');
			}
		include_once("backend/usuarios/verUsuarios.php");
		}
		if($pag=='fia'){ 
			if(!isset($_SESSION['idt']) || ($_SESSION['idt'] != '2' && $_SESSION['idt'] != '1')){
				die('Acceso denegado');
			}
		 include_once("backend/informeAuditoria/frmInformeAuditoria.php");
		}
		if($pag=='per') { 
			if(!isset($_SESSION['idt']) || ($_SESSION['idt'] != '2' && $_SESSION['idt'] != '1')){
				die('Acceso denegado');
			}
		include_once("backend/usuarios/frmPermisos.php");
		}
		
		##############################################################################################################
		# Administrador
		if($pag=='usu'){
			if(!isset($_SESSION['idt']) || $_SESSION['idt'] != '1'){
				die('Acceso denegado');
			}
			include_once("backend/usuarios/frmUsuario.php");
		}
		
		if($pag=='pim'){
			if(!isset($_SESSION['idt']) || ($_SESSION['idt'] != '2' && $_SESSION['idt'] != '1')){
				die('Acceso denegado');
			}
			include_once("backend/primerContacto/primeraImpresion.php");
		}
		
		if($pag=='rec'){
			if(!isset($_SESSION['idt']) || ($_SESSION['idt'] != '2' && $_SESSION['idt'] != '1')){
				die('Acceso denegado');
			}
			include_once("backend/recomendaciones/frmRecomendaciones.php");
		}
		if($pag=='fol'){
			if(!isset($_SESSION['idt']) || ($_SESSION['idt'] != '2' && $_SESSION['idt'] != '1')){
				die('Acceso denegado');
			}
			include_once("backend/folder/newfolder.php");
		}

		
		# Todos
		if($pag=='act')  include_once("backend/activos/frmActivos.php");
		if($pag=='ame')  include_once("backend/amenazas/frmAmenazas.php");
		if($pag=='nri')  include_once("backend/riesgos/frmNivelRiesgo.php");
		if($pag=='econ')  include_once("backend/evaluacionControles/frmEvaluacionControles.php");
		if($pag=='ma')  include_once("backend/riesgos/matriz.php");
		if($pag=='mac')  include_once("backend/evaluacionControles/matriz.php");
		if($pag=='perfil')  include_once("backend/usuarios/perfil.php");
		
		if($pag=='fil')  include_once("backend/file/newfile.php");
		if($pag=='my')  include_once("backend/file/myfiles.php");
		if($pag=='efi')  include_once("backend/file/editfile.php");
		if($pag=='arc')  include_once("backend/file/file.php");
		if($pag=='del')  include_once("action/delfile.php");
		if($pag=='sha')  include_once("shared.php");
		if($pag=='gro')  include_once("grafico.php");
		if($pag=='gra')  include_once("grafica1.php");
		if($pag=='sch')  include_once("backend/riesgos/schwartz.php");
		
	}

	include_once("vistas/parte_inferior.php");

	//include_once("backend/codificar.php")
?>
	 
		