<div class="container-fluid">
	
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Primera Impresion</h1>
    </div>
	
	<div class="row">
		<div class="col-8 offset-2 mb-5 ">
        
	<script>
			// window.onload = function() {
			// 	if (window.jQuery) {
			// 		alert("SIP" + $.fn.jquery);
			// 	} else {
			// 		alert("NO");
			// 	}
			// }
			$( function() {
    			$("#datepickor").datepicker({
					dateFormat: 'yy/mm/dd',
					minDate: 0
				});
				
  			});
  	</script>			
			
	
			 <?php 
				$tituloboton="Agregar";
				$destino="agregar.php";
				$titulo="PRIMER CONTACTO CON LA EMPRESA";
				
				//$idcontactoinicial="";
				$idempresa="";
				$idusuario="";
				$nombre="";
				$apellido="";
				$fecha="";
				$descripcion="";
				$id="";
				if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="select * from contactoinicial where idcontactoinicial='$id' ";
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);
					if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
						$tituloboton="Modificar";
						$destino="modificar.php";
						$titulo="MODIFICAR PRIMER CONTACTO CON LA EMPRESA";
						//$idcontactoinicial=$row['idcontactoinicial'];
						$idempresa=$row['idempresa'];
						$nombre=$row['nombre'];
						$apellido=$row['apellido'];
						$idusuario=$row['idusuario'];
						$fecha=$row['fecha'];
						$descripcion=$row['descripcion'];
					}
				}


				?>
				
				
				 <form action="backend/primerContacto/<?php echo $destino ?>" method="post">
				 	<input type="hidden" name="id" value="<?php echo $id?>">
				  <div class="card text-center">
					  	
					  <div  class="card-header bg-secondary text-white border-bottom-info" >
						  <b><?php echo $titulo ?></b>
					  </div>
						  
					 			 <!-- probando el align-items-center-->
					  <div class="card-body align-items-center">
						  
						  
						<div class="form-group-row d-flex justify-content-end">
						  <!--  el for--> 
							<label for="fecha" class="col-form-label"><b>Fecha</b></label>
							<div class="col-3">
								<input type="text"  class="form-control" id="datepickor" name="fecha" value="<?php echo $fecha ?>" placeholder="aa/mm/dd" required>
							</div>
					   </div> 
						  
						  <hr>
					   <div class="form-group row d-flex justify-content-center">
					  	<!--  el for--> 
						<label for="empresa" class="col-4 col-form-label"><b>Empresa</b></label>
						<div class="col-8">
							<select name="empresa" id="empresa" class="form-control" required>
								<!-- OBTIENE LOS DATOS DE LAS EMPRESAS EN EL COMBO -->
								<?php include_once("backend/combos/empresas.php") 	?>
							</select>
						</div>	
					
					  </div>
						  <div class="form-group row d-flex justify-content-center">
							  <label for="auditor" class="col-4 col-form-label"><b>Auditor Lider</b></label>
							  <div class="col-8">
									<select name="auditor" id="auditor" class="form-control" required>

										<!-- OBTIENE LOS DATOS DE LAS EMPRESAS EN EL COMBO -->
										<?php include_once("backend/combos/auditorlider.php") 	?>

									</select>
								</div>
						  </div>
						  <hr>
						  
						  <label><b>Ingrese nombre y apellido de una persona por parte de la organizacion que estuvo en la primera reunion.</b>
						   </label>
						  
							<hr>
						  
					   <div class="form-group row d-flex justify-content-center">
					  	<!--  el for--> 
						   <label for="nombre" class="col-4 col-form-label"><b>Nombre</b></label>
						<div class="col-8">
							
							<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" onkeypress="return sololetras(event)" required>
						</div>
						    
					  </div>
						  <div class="form-group row d-flex justify-content-center">
							  <label for="apellido" class="col-4 col-form-label"><b>Apellido</b></label>
							 <div class="col-8">
								
								<input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido ?>" onkeypress="return sololetras(event)" required>
							</div>	
						  </div>
						  
					<hr class="border-bottom-info">
						  
		  
					   <div class="form-group row">
					  	<!--  el for--> 
				
						<div class="col-12 ">
							<label for="descripcion" class="col-4 col-form-label"><b>DESCRIPCION</b></label>

							 <textarea type="text" class="form-control" id="descripcion" name="descripcion" rows="6" required><?php echo $descripcion ?></textarea>
						  
						</div>
					  </div>							  
					  
					<?php  
						if(isset($_SESSION['mensaje'])){
							if($_SESSION['tm']==1){
							
								echo "<h6 class='alert alert-success text-center'> ".$_SESSION['mensaje']."</h6>"; 
							}
							
							if($_SESSION['tm']==0){
								
								echo "<h6 class='alert alert-danger text-center'> ".$_SESSION['mensaje']."</h6>"; 
							}
							unset($_SESSION['mensaje']);  //al actualizar la pagina se borra el mensaje 
						}

						
					?>
						  
						  
						  
					  </div><!-- CIERRE DIV BODY-->
					  <!-- BOTONES -->
					  
					  <div class="card-footer text-muted">
						<!-- BOTOM CANCELAR QUE SE VERA DENTRO DE MODIFICAR-->
						<?php if(isset($_GET['id'])){?>
						<a href="../../sistema.php?pag=pim" class="btn btn-dark border-bottom-danger">Cancelar</a>

						<?php }else{?> 
						<button type="reset"   class="btn btn-dark border-bottom-danger ">Limpiar</button>
						<?php }?>




						<button type="submit"   class="btn btn-dark border-bottom-success"><?php echo $tituloboton ?></button>


					  </div> <!-- cierre botones card-footer-->				  
					  
				  </div> <!-- cierre div para el border del formulario card text-center -->

				</form>
			 </div>		
	
	</div>

</div>