<?php //require_once("vistas/parte_superior.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
 	 <h1 class="h3 mb-0 text-gray-800">Informe de Auditoria</h1>
	</div>

       
	<div class="row">
		<div class="col-7 offset-3 mb-5">
			<?php
			$destino="informe.php";
			$titulo="GENERAR INFORME DE AUDITORIA";
			$tituloboton="Generar"




			?>


			<form name="form1" action="fpdf181/<?php echo $destino ?>" method="get">
			
				<div class="card text-center ">

					<div class="card-header bg-secondary text-white border-bottom-info">
						<?php echo $titulo ?>
					</div>

					<div class="card-body">
						
						<div class="form-group row mt-2">
							<label for="nombre" class="col-4 col-form-label">Empresa</label>
							<div class="col-6">
								<select class="form-control" name="idempresa" onChange="crearM(this.value)">
									<option value="-1">Seleccione</option>
									<?php 

										$wsqli="select * from empresas order by nombre";
										$result = $linki->query($wsqli);
										if($linki->errno) die($linki->error);
										while($row = $result->fetch_array()){	
									?>
									<option value="<?php echo $row['idempresa'] ?>" ><?php echo $row['nombre'] ?></option>
									<?php }?>
								</select>
							</div>
						</div>
						
						
						<div class="form-group row mt-2">
							<label for="nombre" class="col-4 col-form-label">Fecha de Auditoria</label>
							<div class="col-6">
								
							<select class="form-control" name="idauditoria" >
								<option value="-1">Seleccione</option>


								<!-- OBTIENE LOS DATOS DE LOS ACTIVOS EN EL COMBO -->
								<?php include_once("backend/informeAuditoria/generaInforme.php") 	?>


							</select>
								
								
							</div>
						</div>
					
					</div>
					<div class="card-footer">
							<button type="submit" class="btn btn-dark border-bottom-success" target="_blank"><?php echo $tituloboton ?></button>
					</div>				
					
				</div>
				

			</form>
		</div>
			  
	  
		
	</div> <!-- DIV DEL ROW PRINCIPAL-->

</div><!-- /.container-fluid -->

        
        
 
<?php require_once("vistas/parte_inferior.php") ?>