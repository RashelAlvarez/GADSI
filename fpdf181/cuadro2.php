<?php
require('fpdf.php');

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
	//MEMBRETE QUE APARECERA EN TODAS LAS PAGINAS
		/*$this->cell(40,24,'',1,0,'C');
		$this->Image('../img/Gadsi.jpeg',11,17,39);
		$this->SetFont('Times','B',10);
		$this->cell(100,8,'SISTEMA DE GESTION DE AUDITORIAS ',1,0,'C');
		$this->SetFont('Times','',10);
		$this->cell(50,8,'Auditor:',1,1);
				
		$this->SetX(50);
		$this->SetFont('Times','B',10);
		$this->cell(100,8,'DE LOS SISTEMAS DE INFORMACION ',1,0,'C');
		$this->SetFont('Times','',10);
		$this->cell(50,8,'F. Inicio',1,1);

		$this->SetX(50);
		$this->SetFont('Times','B',12);
		$this->cell(100,8,'INFORME FINAL',1,0,'C');
		$this->SetFont('Times','B',11);
		$this->cell(50,8,'Fecha Actual: '.$fecha,1,1);*/
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
	$this->cell(100,8,'REPORTE',1,1,'C');
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
//IMPORTANTE HACER EL LLAMADO DE LA BD ACA.
//include('../config/conexi.php');


			  
			  	// para el paginador
					//EMPRESA
					$pdf->SetFont('Times','B',10);
					//$pdf->SetFillColor(200,220,255);
					//$pdf->Cell(0,7,"EMPRESA",0,1,'c',true);
					$pdf->Ln(2);
					$pdf->SetFont('Times','B',10);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFillColor(79,78,77);

					//$pdf->Cell(5,7,'ID',0,0,'C',true);
					$pdf->Cell(30,7,'Fecha',0,0,'C',true);
					$pdf->Cell(30,7,'Horas',0,0,'C',true);
					$pdf->Cell(30,7,'H. Facturables',0,0,'C',true);
					$pdf->Cell(30,7,'Plan de H.',0,0,'C',true);
					$pdf->Cell(30,7,'Diferencia de H.',0,0,'C',true);
					$pdf->Cell(40,7,'Actividad',0,1,'C',true);
					$pdf->Ln(10);

					
					$pdf->Cell(48,7,'Proyecto',0,0,'C',true);
					$pdf->Cell(48,7,'Empleado',0,0,'C',true);
					$pdf->Cell(46,7,'Tipo',0,0,'C',true);
					$pdf->Cell(48,7,'Descripcion',0,1,'C',true);
					$pdf->SetTextColor(0,0,0);

					//$wsqli="SELECT empresas.idempresa, empresas.nombre as ne, empresas.rif as rif, empresas.direccion as ed,
					 //empresas.telefono as et from empresas 
					//WHERE idempresa=$idempresa";
						//$result = $linki->query($wsqli);
							//if($linki->errno) die($linki->error);
							//$i=0;
							//while($row = $result->fetch_array()){
							//	$i++;  
						$pdf->SetFont('Times','',10);

//ACA VAN LAS CELDAS, CON LAS MISMAS DIMENSIONES QUE TIENES ARRIBA
// UTILIZAR substr($row['ne'],0,40), EL 40 SIGNIFICA 40 CARACTERES MAXIMO, el $row te traes la variable de la BD.
                                   //30 de ancho, 10 de alto. 'C' de centrar.
						//$pdf->Cell(30,10,$row['Fecha'],0,0,'C');
						//$pdf->Cell(30,10,$row['hora'],0,0,'C');
						//$pdf->Cell(30,10,$row['hFacturables'],0,0,'C');
						//$pdf->Cell(30,10,$row['plandeH'],0,0,'C');
						//$pdf->Cell(30,10,$row['diferenciadeH'],0,0,'C');
													//termina en 1,1 para continuar abajo.
						//$pdf->Cell(40,10,($row['actividad']),1,1,'C');
						
						$pdf->Ln(10);
						//$pdf->Cell(48,10,$row['proyecto'],0,0,'C');
						//$pdf->Cell(48,10,$row['empleado'],0,0,'C');
						//$pdf->Cell(46,10,$row['tipo'],0,0,'C');
						//$pdf->Cell(48,10,$row['descripcion'],0,1,'C');
						
						
				  //}

				
				//190 entre 3 para que me de bien:
					//$pdf->Cell(190,0,'',1,1,'C'); esto es una linea negra.
					$pdf->Ln(10);

				//SI AÑADIRAS MAS TABLAS, DEBES COLOCARLAS JUSTO ACA DEBAJO.


//PARA IMPRIMIR, NO BORRAR, ESTO VA AL FINAL DE TODA LA PAGINA.
$pdf->Output();

?>