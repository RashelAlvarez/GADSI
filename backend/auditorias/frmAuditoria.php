

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
				$("#datepickor2").datepicker({
					dateFormat: 'yy/mm/dd',
					minDate: 60
				});
  			});
  		</script>
		<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Auditorias</h1>
          </div>

          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
           <!-- <div class="col-xl-3 col-md-6 mb-4">
              
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
           <!-- <div class="col-xl-3 col-md-6 mb-4">
              
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
           <!-- <div class="col-xl-3 col-md-6 mb-4">
              
            </div> -->

            <!-- Pending Requests Card Example -->
           <!-- <div class="col-xl-3 col-md-6 mb-4">
             
            </div> -->
          </div>

          <div class="row">
			  
			<div class="col-7 offset-3 mb-5">
				
			 <?php 
				$tituloboton="Agregar";
				$destino="agregar.php";
				$titulo="FORMULARIO AUDITORIA";
				$idempresa="";
				$idestatus="";
				$descripcion="";
				$fechai="";
				$fechaf="";
				$observaciones="";
				$id="";
				$idcontactoinicial="";
				if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="select * from auditoria where idauditoria='$id' ";
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);
					if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
						$tituloboton="Modificar";
						$destino="modificar.php";
						$titulo="MODIFICAR AUDITORIA";
						$idempresa=$row['idempresa'];
						$idestatus=$row['idestatus'];
					 	$descripcion=$row['descripcion'];
						$fechai=$row['fechai'];
						$fechaf=$row['fechaf'];
						$observaciones=$row['observaciones'];
						$idcontactoinicial=$row['idcontactoinicial'];
						 
					}
				}


				?>
				<script>
					function crearM(id) 
					{ 
						document.form1.idcontactoinicial.length=0;
						document.form1.idcontactoinicial.options[0] = new Option("--- Seleccione una opción ---","","defaultSelected","-1");
						var indice=0; 
						<?php 



							$wsqli="SELECT * FROM contactoinicial order by fecha";
							$result = $linki->query($wsqli);
							if($linki->errno) die($linki->error);
							while($row = $result->fetch_array()){
						 ?>

									if (id=="<?php echo $row['idempresa']?>")
									{
										document.form1.idcontactoinicial.options[indice] = new Option("<?php echo $row['fecha']?>","<?php echo $row['idcontactoinicial']?>");
										indice++;
									}       
								<?php
								}

						?>
					}
				</script>				
				
				 <form name=form1 action="backend/auditorias/<?php echo $destino ?>" method="post">
				 	<input type="hidden" name="id" value="<?php echo $id?>">
				  <div class="card text-center ">
					  <div class="card-header bg-secondary text-white border-bottom-info">
						  <b><?php echo $titulo ?></b>
					  </div>
					 
					  <div class="card-body">
						 
						  
					<div class="form-group row">
					  <!--  el for--> 
						<label for="Auditoria" class="col-4 col-form-label"><b>Empresa</b></label>
						<div class="col-6">
							<select class="form-control" name="idempresa" onChange="crearM(this.value)" required>
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

					  <div class="form-group row">
					  <!--  el for--> 
						<label for="fecha" class="col-4 col-form-label"><b>Contacto inicial con el auditado</b></label>
						<div class="col-6">
							<select class="form-control" name="idcontactoinicial" required>
							    <option value="-1">Seleccione</option>
							</select>
						</div>
					  </div>
						  
						  
					   <div class="form-group row">
						  <!--  el for--> 
							<label for="estatus" class="col-4 col-form-label"><b>Estatus</b></label>
							<div class="col-6">
								<select name="estatus" id="estatus" class="form-control" required>
									
									<!-- OBTIENE LOS DATOS DEL ESTATUS EN EL COMBO -->
									<?php include_once("backend/combos/estatus.php")  ?> 
								 

								</select>
							</div>
					   </div>						  
						  
						  <div class="form-group row">
						  <!--  el for--> 
							<label for="descripcion" class="col-4 col-form-label"><b>Descripción</b></label>
							<div class="col-6">
							  <!--<input type="text" class="form-control" id="descripcion" name="descripcion"> -->
							  <textarea type="text" class="form-control" id="descripcion" name="descripcion" rows="4" required><?php echo $descripcion ?></textarea>
								
							</div>
						  </div>
						  
						  <div class="form-group row">
						  <!--  el for--> 
							<label for="fechai" class="col-4 col-form-label"><b>Fecha de Inicio</b></label>
							<div class="col-6">
								<!-- <input type="text" id="datepicker" name="date" class="iconfa-calendar" value=""> -->
								<!--<input type="text" id="datepickor" class="form-control" value="">-->
								<input type="text"  class="form-control" id="datepickor" name="fechai" value="<?php echo $fechai ?>" placeholder="aa/mm/dd" required>
							</div>
						  </div>
						  
						  <div class="form-group row">
						  <!--  el for--> 
							<label for="fechaf" class="col-4 col-form-label"><b>Fecha Final</b></label>
							<div class="col-6">
							  <input type="text" class="form-control" id="datepickor2" name="fechaf" value="<?php echo $fechaf ?>" placeholder="aa/mm/dd" required>
							 
								
							</div>
						  </div>

						   <div class="form-group row">
					 	  <!--  el for--> 
							<label for="observaciones" class="col-4 col-form-label"><b>Observaciones</b></label>
							<div class="col-6">
							
							  <textarea class="form-control" id="observaciones" name="observaciones" rows="4"  required>
							  	<?php echo $observaciones ?></textarea>
		    				</div>
				  			</div>
						  
						  <?php  
								if(isset($_SESSION['mensaje'])){
									echo "<h6 class='alert alert-success text-center'> ".$_SESSION['mensaje']."</h6>"; 
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
						<a href="sistema.php?pag=audi" class="btn btn-dark border-bottom-danger">Cancelar</a>

						<?php }else{?>
						<button type="reset"   class="btn btn-dark border-bottom-danger ">Cancelar</button>
						<?php }?> 




						<button type="submit"   class="btn btn-dark border-bottom-success"><?php echo $tituloboton ?></button>


					  </div> <!-- cierre botones card-footer-->				  
					  
				  </div> <!-- cierre div para el border del formulario card text-center -->

				</form>
			 </div>
			  
          <!-- DataTale  -->
          <div class="card shadow mb-4 col-12">
            <div class="card-header py-3 bg-secondary border-bottom-info">
              <h6 class="m-0 font-weight-bold text-white">Auditoria de la Empresa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th scope="col">ID</th>
					  <th scope="col">Nombre</th>
					   <th scope="col">Apellido</th>
                      <th scope="col">Empresa</th>
                      <th scope="col">Estatus</th>
                      <th scope="col">Descripción</th>
					  <th scope="col">Fecha de Inicio</th>
					  <th scope="col">Fecha Final</th>
					  <th scope="col">Observaciones</th>
					  <th scope="col">Acciones</th>
                    </tr>
                  </thead>
            
					
                 <tbody>
					 
					 <?php
							$wsqli="SELECT auditoria.idauditoria, estatus.nombre as nes, empresas.nombre as ne, usuarios.nombre as nu, usuarios.apellido as au, auditoria.descripcion as dc, auditoria.fechai as fechai, auditoria.fechaf as fechaf, auditoria.observaciones as ob from auditoria
							INNER JOIN usuarios ON auditoria.idusuario=usuarios.idusuario
							INNER JOIN empresas ON auditoria.idempresa=empresas.idempresa
							INNER JOIN estatus ON auditoria.idestatus=estatus.idestatus";
							$result = $linki->query($wsqli);
							if($linki->errno) die($linki->error);
							while($row = $result->fetch_array()){
								$id=$row['idauditoria'];
								$nom=$row['nu'];
								$ape=$row['au'];
								//aqui no se si esto va.. pero lo coloque para probar guiandome de
								// frmMarcas del curso.
								$des=$row['dc'];
								$fei=$row['fechai'];
								$fef=$row['fechaf'];
								$ob=$row['ob'];		
							 
								
					?>	
					 
                    <tr>
                      <td><?php echo $row['idauditoria']?></td>
                      <td><?php echo $row['nu']?></td>
                      <td><?php echo $row['au']?></td>
                      <td><?php echo $row['ne']?></td>
					  <td><?php echo $row['nes']?></td>
					  <td><?php echo $row['dc']?></td>
					  <td><?php echo $row['fechai']?></td>
					  <td><?php echo $row['fechaf']?></td>
					  <td><?php echo $row['ob']?></td>
					 
						
					<td>
						<!--<a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
					  title="<?php echo '<center>Seguro que desea eliminar este registro:<h4>'.$nom.'</h4><center>' ?>" 
					  href="backend/auditorias/eliminar.php?id=<?php echo $id ?>">Eliminar</a>-->

					  <a href="sistema.php?pag=audi&id=<?php echo $id ?>" class="btn btn-dark border-bottom-success btn-sm ">Modificar</a>
      	 
      				</td>
						
                    </tr>
					 <?php } ?>
				 </tbody>
				</table>
              </div>
            </div>
          </div> <!-- FIN DATA TABLE-->
			  
		
              </div> <!-- DIV DEL ROW PRINCIPAL-->

            </div><!-- /.container-fluid -->

          <!--</div>

        </div> -->
        

<!-- SI SALE ERROR: Syntax Error, unexpected $end. Es porque falta el < ?php } ?> antes del
</tbody>-->
