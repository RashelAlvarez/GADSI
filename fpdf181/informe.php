<?php
require('fpdf.php');
include('../config/conexi.php');
if(isset($_GET['idempresa'])){
    $idempresa=$_GET['idempresa'];
    $idauditoria=$_GET['idauditoria'];

}else{
    $idempresa=1;
    $idauditoria=1;
}

class PDF extends FPDF
{
//Cabecera de página
function Header()
{
	//Logo
	//$this->Image('../img/Gadsi.png',10,8,33);
	//Arial bold 15
	$this->SetFillColor(255,255,255);
	$this->Rect(0,0,220,40,'F');
	$this->SetFont('Times','B',12);
	$fecha=date('d/m/Y');
	//$this->SetY(-2);
		$this->cell(40,24,'',1,0,'C');
		$this->Image('../img/Gadsi.jpeg',11,17,39);
		$this->SetFont('Times','B',10);
		$this->cell(100,8,'SISTEMA DE GESTION DE AUDITORIAS ',1,0,'C');
		$this->SetFont('Times','',10);
			
		
	
		$this->cell(50,8,'Auditor:',1,1);
				
		$this->SetX(50);
		$this->SetFont('Times','B',10);
		$this->cell(100,8,'DE LOS SISTEMAS DE INFORMACION ',1,0,'C');
		$this->SetFont('Times','',10);
		/*$wsqli8="SELECT auditoria.idauditoria, auditoria.fechai as fechai from auditoria 
		where auditoria.idauditoria=$idauditoria";
		$result = $linki->query($wsqli8);
			if($linki->errno) die($linki->error);
			$i=0;
			while($row = $result->fetch_array()){
				$i++; */ 


		$this->cell(50,8,'Fecha I: ',1,1);
			//}
		$this->SetX(50);
		$this->SetFont('Times','B',12);
		$this->cell(100,8,'INFORME FINAL',1,0,'C');
		$this->SetFont('Times','B',11);
		$this->cell(50,8,'Fecha Actual: '.$fecha,1,1);
	//Movernos a la derecha
	//Título
	
	
	//$this->Ln(5);
	/*$this->Cell(120);
	$this->Cell(70,10,'Fecha : '.$fecha,0,0,'C');
	$this->SetFont('Arial','B',20);
	$this->Ln(15);
	$this->Cell(60);
	$this->Cell(70,10,'INFORME FINAL',0,0,'C');
	//Salto de línea*/
	$this->Ln(10);
	// enca
	



    //$this->Cell(60,5,'nombre',1,1,'C');
	//$this->Cell(60,5,'Dirección',1,1,'C');
	

	//Salto de línea
	//$this->Ln(20);
	
	
}
	
	
	
	

//Pie de página
function Footer()
{
	
	//Posición: a 1,5 cm del final
	$this->Ln(1);
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',10);
	//Número de página
	//    EJES: X,Y
	//30,184,163
	$this->SetFillColor(255,255,255);
	$this->Rect(0,280,220,20,'F');
	$this->Cell(0,15,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',8);




					//Primer Contacto
					$pdf->SetFont('Times','B',10);
					$pdf->SetFillColor(200,220,255);
					$pdf->Cell(0,7,"PRIMER CONTACTO",0,1,'c',true);
					$pdf->Ln(2);
					$pdf->SetFont('Times','B',10);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFillColor(79,78,77);
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFont('Times','B',10);
					$pdf->SetX(15);
					$pdf->Cell(190,7,utf8_decode('Datos de una persona que estuvo presente durante la primera reunión.'),0,1,'C');
					//$pdf->Cell(45,7,'',0,0,'C');
					$pdf->SetX(55);
					$pdf->SetTextColor(255,255,255);
					$pdf->Cell(40,7,'Nombre',0,0,'C',true);
					$pdf->Cell(40,7,'Apellido',0,0,'C',true);
					$pdf->Cell(30,7,utf8_decode('Fecha de Reunión'),0,1,'C',true);
					
					//$pdf->Cell(45,7,'',0,0,'C');
					$pdf->SetX(55);
					

					$wsqli5="SELECT auditoria.idauditoria, contactoinicial.descripcion as dc, contactoinicial.nombre as ne, contactoinicial.apellido as ap, contactoinicial.fecha as fecha from auditoria INNER JOIN contactoinicial on auditoria.idcontactoinicial=contactoinicial.idcontactoinicial where auditoria.idauditoria='$idauditoria' and auditoria.idempresa='$idempresa'";
						$result = $linki->query($wsqli5);
							if($linki->errno) die($linki->error);
							$i=0;
							while($row = $result->fetch_array()){
								$i++;  
						$pdf->SetFont('Times','',10);
						$pdf->SetTextColor(0,0,0);
						//$pdf->Cell(5,10,$row['idempresa'],0,0,'C');
						$pdf->Cell(40,10,utf8_decode($row['ne']),0,0,'C');
						$pdf->Cell(40,10,utf8_decode($row['ap']),0,0,'C');
						$pdf->Cell(30,10,$row['fecha'],0,1,'C');
						$pdf->Cell(45,0,'',0,0,'C');		
						$pdf->Cell(110,0,'',1,1,'C');		
								
						$pdf->Ln(2);
						$pdf->SetFont('Times','B',10);
						$pdf->SetTextColor(255,255,255);
						$pdf->Cell(190,7,utf8_decode('Descripcion'),0,1,'C',true);
						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Times','',10);
						$pdf->SetFillColor(255,255,255);
						$pdf->MultiCell(0,6,utf8_decode($row['dc']),0,1,'C',true);
						
						
						//$pdf->Cell(60,5,($row['correo']),1,1,'L');
						//$pdf->Cell(60,5,utf8_decode($row['direccion']),1,1,'C');
				  }

				
				//190 entre 3 para que me de bien:
					$pdf->Cell(190,0,'',1,1,'C');
					
					$pdf->SetTextColor(0,0,0);
					$pdf->Ln(10);

//CIERRE P.CONTACTO ############################################################################################
			  	// para el paginador
					//EMPRESA
					$pdf->SetFont('Times','B',10);
					$pdf->SetFillColor(200,220,255);
					$pdf->Cell(0,7,"EMPRESA",0,1,'c',true);
					$pdf->Ln(2);
					$pdf->SetFont('Times','B',10);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFillColor(79,78,77);

					//$pdf->Cell(5,7,'ID',0,0,'C',true);
					$pdf->Cell(40,7,'Nombre',0,0,'C',true);
					$pdf->Cell(20,7,'Rif',0,0,'C',true);
					$pdf->Cell(108,7,utf8_decode('Dirección'),0,0,'C',true);
					$pdf->Cell(22,7,'Telefono',0,1,'C',true);
					$pdf->SetTextColor(0,0,0);

					$wsqli="SELECT empresas.idempresa, empresas.nombre as ne, empresas.rif as rif, empresas.direccion as ed,
					 empresas.telefono as et from empresas 
					WHERE idempresa=$idempresa";
						$result = $linki->query($wsqli);
							if($linki->errno) die($linki->error);
							$i=0;
							while($row = $result->fetch_array()){
								$i++;  
						$pdf->SetFont('Times','',10);
						//$pdf->Cell(5,10,$row['idempresa'],0,0,'C');
						$pdf->Cell(40,10,utf8_decode(substr($row['ne'],0,40)),0,0,'C');
						$pdf->Cell(20,10,$row['rif'],0,0,'C');
						$pdf->Cell(108,10,utf8_decode($row['ed']),0,0,'C');
						$pdf->Cell(22,10,$row['et'],0,1,'C');
						
						//$pdf->Cell(60,5,($row['correo']),1,1,'L');
						//$pdf->Cell(60,5,utf8_decode($row['direccion']),1,1,'C');
				  }

				
				//190 entre 3 para que me de bien:
					$pdf->Cell(190,0,'',1,1,'C');
					$pdf->Ln(10);

					
//CIERRE EMPRESA ############################################################################################
					//AUDITORIA
					$pdf->SetFont('Times','B',10);
					$pdf->SetFillColor(200,220,255);
					$pdf->Cell(0,7,"AUDITORIA",0,1,'L', true);
					$pdf->Ln(2);
					$pdf->SetFont('Times','B',10);

					$pdf->SetTextColor(255,255,255);
					$pdf->SetFillColor(79,78,77);
					//$pdf->SetX(17);
					//$pdf->Cell(32,5,'Auditor',0,1,'C',true);
					//$pdf->Cell(5,10,'ID',0,0,'C',true);
					$pdf->Cell(20,7,'Nombre',0,0,'C',true);
					$pdf->Cell(20,7,'Apellido',0,0,'C',true);
					//$pdf->Cell(30,10,'Empresa',0,0,'C',true);
					//$pdf->Cell(10,10,'Estatus',0,0,'C',true);
					$pdf->Cell(110,7,'Descripcion',0,0,'C',true);
					$pdf->Cell(20,7,'F.Inicio',0,0,'C',true);
					$pdf->Cell(20,7,'F. Final',0,1,'C',true);
					//$pdf->Cell(18,10,'F.Informe',0,1,'C',true);
					//$pdf->SetFont('Times','',8);
					$pdf->SetTextColor(0,0,0);
					
					$wsqli2="SELECT auditoria.idauditoria, estatus.nombre as nes, empresas.nombre as ne, usuarios.nombre as nu, 
					usuarios.apellido as au, auditoria.descripcion as dc, 
					auditoria.fechai as fechai, auditoria.fechaf as fechaf from auditoria
					INNER JOIN usuarios ON auditoria.idusuario=usuarios.idusuario
					INNER JOIN empresas ON auditoria.idempresa=empresas.idempresa
					INNER JOIN estatus ON auditoria.idestatus=estatus.idestatus
					WHERE auditoria.idauditoria=$idauditoria";
					$result = $linki->query($wsqli2);
						if($linki->errno) die($linki->error);
						$i=0;
						while($row = $result->fetch_array()){
							$i++; 
							$pdf->SetFont('Times','',10);
							//$pdf->Cell(5,15,$row['idauditoria'],0,0,'C');
							$pdf->Cell(20,15,utf8_decode($row['nu']),0,0,'C');
							$pdf->Cell(20,15,utf8_decode($row['au']),0,0,'C');
							//$pdf->Cell(30,15,utf8_decode($row['ne']),0,0,'C');
							//$pdf->Cell(10,15,utf8_encode($row['nes']),0,0,'C');
							$pdf->Cell(110,15,utf8_decode(substr($row['dc'],0,80)),0,0,'C');
							$pdf->Cell(20,15,$row['fechai'],0,0,'C');
							$pdf->Cell(20,15,$row['fechaf'],0,1,'C');
							//$pdf->Cell(18,15,$row['fi'],0,1,'C');
							

								//$pdf->Cell(60,5,($row['correo']),1,1,'L');
								//$pdf->Cell(60,5,utf8_decode($row['direccion']),1,1,'C');
						  }
					$pdf->Cell(190,0,'',1,1,'C');
					//$pdf->Cell(190,5,'Total de Auditorias: '.$i,1,1,'C');
					$pdf->Ln(10);
//CIERE AUDITORIA ###########################################################################################
					//ACTIVOS

					$pdf->SetFont('Times','B',10);
					$pdf->SetFillColor(200,220,255);
					$pdf->Cell(0,7,"ACTIVOS",0,1,'L', true);
					$pdf->Ln(2);
					$pdf->SetFont('Times','B',9);	  		
					
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFillColor(79,78,77);
					//$pdf->Cell(5,5,'ID',0,0,'C',true);
					//$pdf->Cell(19,5,'Empresa',1,0,'C',true);
					$pdf->Cell(24,7,'Tipo de Activo',1,0,'C',true);
					$pdf->Cell(13,7,'Estatus',1,0,'C',true);
					$pdf->Cell(29,7,'Nombre',1,0,'C',true);
					$pdf->Cell(43,7,'Descripcion',1,0,'C',true);
					$pdf->Cell(23,7,'Responsable',1,0,'C',true);
					$pdf->Cell(24,7,'Confidencialidad',1,0,'C',true);
					$pdf->SetFont('Times','B',8);
					$pdf->Cell(15,7,'Integridad',1,0,'C',true);
					$pdf->Cell(19,7,'Disponibilidad',1,1,'C',true);
					$pdf->SetFont('Times','',8);
					$pdf->SetTextColor(0,0,0);
				
			$wsqli3="SELECT activos.idactivo, empresas.nombre as nempresa, activos.idauditoria as idauditoria, tipoactivos.nombre as tipoa, estatus.nombre as ne, activos.nombre as na, activos.descripcion as da, activos.responsable as ar, confidencialidad.nombre as nc, integridad.nombre as ni, disponibilidad.nombre as nd from activos 
			INNER JOIN auditoria ON activos.idauditoria=auditoria.idauditoria
            INNER JOIN empresas ON auditoria.idempresa=empresas.idempresa
			INNER JOIN tipoactivos ON activos.idtipoactivo=tipoactivos.idtipoactivo 
			INNER JOIN estatus ON activos.idestatus=estatus.idestatus 
			INNER JOIN confidencialidad ON activos.idconfidencialidad=confidencialidad.idconfidencialidad 
			INNER JOIN integridad ON activos.idintegridad=integridad.idintegridad 
			INNER JOIN disponibilidad ON activos.idisponibilidad=disponibilidad.idisponibilidad
			WHERE activos.idauditoria=$idauditoria
			ORDER BY tipoa";
			$result = $linki->query($wsqli3);
			if($linki->errno) die($linki->error);
			$i=0;
			while($row = $result->fetch_array()){
			
					$i++;  
					$pdf->SetFont('Times','',9);
					//$pdf->Cell(5,5,$row['idactivo'],1,0,'C');
					//$pdf->Cell(19,5,substr($row['nempresa'],0,15),1,0,'C');
					$pdf->Cell(24,5,substr($row['tipoa'],0,14),1,0,'C');
					$pdf->Cell(13,5,$row['ne'],1,0,'C');
					$pdf->Cell(29,5,utf8_decode($row['nempresa']),1,0,'C');
					$pdf->Cell(43,5,utf8_decode(substr($row['da'],0,25)),1,0,'C');
					$pdf->Cell(23,5,$row['ar'],1,0,'C');
					$pdf->Cell(24,5,$row['nc'],1,0,'C');
					$pdf->Cell(15,5,$row['ni'],1,0,'C');
					$pdf->Cell(19,5,($row['nd']),1,1,'C');
				
					//$pdf->Cell(60,5,($row['correo']),1,1,'L');
					//$pdf->Cell(60,5,utf8_decode($row['direccion']),1,1,'C');
			  }
				
				//$pdf->Cell(190,5,'Total Activos: '.$i,1,1,'C');
				$pdf->Ln(10);
//CIERRE ACTIVOS ############################################################################################
			//RIESGOS
				
					
					//$pdf->AddPage();
					$pdf->SetFont('Times','B',10);
					$pdf->SetFillColor(200,220,255);
					$pdf->Cell(0,7,"RIESGOS",0,1,'L', true);
					$pdf->Ln(2);
					$pdf->SetFont('Times','B',10);

					//$pdf->SetX(25);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFillColor(79,78,77);

					//$pdf->Cell(5,7,'ID',1,0,'C',true);
					$pdf->Cell(40,7,'Probabilidad',1,0,'C',true);
					$pdf->Cell(40,7,'Impacto',1,0,'C',true);
					$pdf->Cell(70,7,'Activo',1,0,'C',true);
					$pdf->Cell(40,7,'Riesgo',1,1,'C',true);
					$pdf->SetFont('Times','',8);
					$pdf->SetTextColor(0,0,0);

					$wsqli4="SELECT nivel_riesgo.idnivelriesgo, impacto.nombre as ni, probabilidad.nombre as np, activos.nombre as na, riesgo from nivel_riesgo
					INNER JOIN probabilidad ON nivel_riesgo.idprobabilidad=probabilidad.idprobabilidad 
					INNER JOIN impacto ON nivel_riesgo.idimpacto=impacto.idimpacto 
					INNER JOIN activos ON nivel_riesgo.idactivo=activos.idactivo
					where nivel_riesgo.idauditoria=$idauditoria
					ORDER BY riesgo";
						$result = $linki->query($wsqli4);
							if($linki->errno) die($linki->error);
							$i=0;
							while($row = $result->fetch_array()){
								$i++; 
								$pdf->SetFont('Times','',10);
								//$pdf->SetX(25);
								//$pdf->Cell(5,7,$row['idnivelriesgo'],1,0,'C');
								$pdf->Cell(40,7,$row['np'],1,0,'C');
								$pdf->Cell(40,7,$row['ni'],1,0,'C');
								$pdf->Cell(70,7,utf8_decode($row['na']),1,0,'C');
								$pdf->Cell(40,7,$row['riesgo'],1,1,'C');
								
						
						//$pdf->Cell(60,5,($row['correo']),1,1,'L');
						//$pdf->Cell(60,5,utf8_decode($row['direccion']),1,1,'C');
				  }

				
				//190 entre 3 para que me de bien:
					$pdf->SetX(25);
					//$pdf->Cell(165,5,'Total de Empresas: '.$i,1,1,'C');
					$pdf->Ln(10);






//CIERRE RIESGOS ############################################################################################
					//HALLAZGOS
					$pdf->SetFont('Times','B',12);
					$pdf->SetFillColor(200,220,255);
					$pdf->Cell(0,7,"HALLAZGOS",0,1,'C', true);
					$pdf->Ln(2);
					$pdf->SetFont('Times','B',10);

					//$pdf->SetX(25);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFillColor(79,78,77);
					//$pdf->Cell(190,7,'Descripcion',0,1,'C',true);
					$pdf->SetTextColor(0,0,0);

					$wsqli6="SELECT idfile, filename as fn, description as dcp, idempresa, idauditoria from file 
					where idempresa='$idempresa' and idauditoria='$idauditoria'";
					$result = $linki->query($wsqli6);
							if($linki->errno) die($linki->error);
							$i=0;
							while($row = $result->fetch_array()){
								$i++; 
								$pdf->SetFont('Times','',10);
								$pdf->SetFillColor(255,255,255);
								//$pdf->Cell(30,6,'En la Evidencia: ',1,0,'C');
								//$pdf->SetX(-60);
								$pdf->MultiCell(0,6,"En la Evidencia: ".$row['fn'],'T',0,'L');
								$pdf->MultiCell(0,6,utf8_decode('Se encontró lo siguiente:  '.$row['dcp']),'B',1,'C',true);
								//$pdf->Image('../backend/storage/data/2/IMG_2605.jpg',30,80,39);
							}
					$pdf->Cell(190,0,'',1,1,'C');
					$pdf->Ln(5);

//CIERRE HALLAZGOS ##########################################################################################					
					//Recomendaciones
					$pdf->SetFont('Times','B',12);
					$pdf->SetFillColor(200,220,255);
					$pdf->Cell(0,7,"RECOMENDACIONES",0,1,'C', true);
					$pdf->Ln(2);
					$pdf->SetFont('Times','B',10);

					//$pdf->SetX(25);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFillColor(79,78,77);

					//$pdf->Cell(190,7,'Descripcion',0,1,'C',true);
				
					
					$pdf->SetTextColor(0,0,0);
					$pdf->Cell(190,7,utf8_decode('SE RECOMIENDA REVISAR DE PRIMERA INSTANCIA ESTOS ACTIVOS MÁS CRÍTICOS:'),0,1,'L');

					$wsqli7="SELECT nivel_riesgo.idnivelriesgo, activos.nombre as na, riesgo from nivel_riesgo
					INNER JOIN activos ON nivel_riesgo.idactivo=activos.idactivo
					where nivel_riesgo.idauditoria=$idauditoria and riesgo='EXTREMO'";
						$result = $linki->query($wsqli7);
							if($linki->errno) die($linki->error);
							$i=0;
							while($row = $result->fetch_array()){
								$i++; 
								$pdf->SetFont('Times','',10);
								$pdf->SetFillColor(255,255,255);
								
								$pdf->Cell(130,7,utf8_decode($row['na']),0,0,'L');
								$pdf->Cell(60,7,"Con un Nivel de Riesgo: ".$row['riesgo'],0,1,'L');
								//$pdf->MultiCell(0,6,utf8_decode($row['dc']),0,1,'C',true);
								
						
						//$pdf->Cell(60,5,($row['correo']),1,1,'L');
						//$pdf->Cell(60,5,utf8_decode($row['direccion']),1,1,'C');
				  }
				  $pdf->Cell(190,0,'',1,1,'C');
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(190,7,utf8_decode('SE RECOMIENDA REVISAR DE SEGUNDA INSTANCIA ESTOS ACTIVOS MÁS CRÍTICOS:'),0,1,'L');
					$pdf->SetFont('Times','',10);
					$wsqli8="SELECT nivel_riesgo.idnivelriesgo, activos.nombre as na, riesgo from nivel_riesgo
					INNER JOIN activos ON nivel_riesgo.idactivo=activos.idactivo
					where nivel_riesgo.idauditoria=$idauditoria and riesgo='ALTO'";
						$result = $linki->query($wsqli8);
							if($linki->errno) die($linki->error);
							$i=0;
							while($row = $result->fetch_array()){
								$i++; 
								$pdf->SetFont('Times','',10);
								$pdf->SetFillColor(255,255,255);
								
								$pdf->Cell(130,7,utf8_decode($row['na']),0,0,'L');
								$pdf->Cell(60,7,"Con un Nivel de Riesgo: ".$row['riesgo'],0,1,'L');
								//$pdf->MultiCell(0,6,utf8_decode($row['dc']),0,1,'C',true);
								
						
						//$pdf->Cell(60,5,($row['correo']),1,1,'L');
						//$pdf->Cell(60,5,utf8_decode($row['direccion']),1,1,'C');
				  }
				  $pdf->Cell(190,0,'',1,1,'C');
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(190,7,utf8_decode('FINALMENTE:'),0,1,'L');
					$pdf->SetFont('Times','',10);
					$wsqli4="SELECT idempresa,idauditoria,descripcion as dc from recomendaciones where idempresa='$idempresa' and idauditoria='$idauditoria'";
						$result = $linki->query($wsqli4);
							if($linki->errno) die($linki->error);
							$i=0;
							while($row = $result->fetch_array()){
								$i++; 
								$pdf->SetFont('Times','',10);
								$pdf->SetFillColor(255,255,255);
								//$pdf->Cell(5,7,$row['idnivelriesgo'],1,0,'C');
								$pdf->MultiCell(0,6,utf8_decode($row['dc']),0,1,'C',true);
								
						
						//$pdf->Cell(60,5,($row['correo']),1,1,'L');
						//$pdf->Cell(60,5,utf8_decode($row['direccion']),1,1,'C');
				  }
				  $pdf->Cell(190,0,'',1,1,'C');




$pdf->Output();

?>
