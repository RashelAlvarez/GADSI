

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Activos</h1>
          </div>

         
			
			

          <div class="row">
			  
			<!--<div>-->

			 
			  
			<div class="col-7 offset-3 mb-5">
				
			 <?php 
				$tituloboton="Agregar";
				$destino="agregar.php";
				$titulo="FORMULARIO ACTIVOS";
				$idactivo="";
				$idauditoria="";
				$idtipoactivo="";
				$idestatus="";
				$nombre="";
				$descripcion="";
				$responsable="";
				$idconfidencialidad="";
				$idintegridad="";
				$idisponibilidad="";
				$idempresa="";
				$codigo="";
				 
				$id="";
				if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="select * from activos where idactivo='$id' ";
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);
					if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
						$tituloboton="Modificar";
						$destino="modificar.php";
						$titulo="MODIFICAR ACTIVO";
						$idactivo=$row['idactivo'];
						$idauditoria=$row['idauditoria'];
						$idtipoactivo=$row['idtipoactivo'];
						$idestatus=$row['idestatus'];
						$nombre=$row['nombre'];
					 	$descripcion=$row['descripcion'];
						$responsable=$row['responsable'];
						$idconfidencialidad=$row['idconfidencialidad'];
						$idintegridad=$row['idintegridad'];
						$idisponibilidad=$row['idisponibilidad'];
						$idempresa=$row['idempresa'];
						$codigo=$row['codigo'];
						 
					}
				}


				?>
				<script>
				function crearM(id) 
				{ 
				    document.form1.idauditoria.length=0;
				    document.form1.idauditoria.options[0] = new Option("--- Seleccione una opción ---","","defaultSelected","-1");
				    var indice=0; 
				    <?php 
				      
				    

				        $wsqli="SELECT * FROM auditoria order by fechai";
				        $result = $linki->query($wsqli);
				        if($linki->errno) die($linki->error);
				        while($row = $result->fetch_array()){
				     ?>
				    
				                if (id=="<?php echo $row['idempresa']?>")
				                {
				                    document.form1.idauditoria.options[indice] = new Option("<?php echo $row['fechai']?>","<?php echo $row['idauditoria']?>");
				                    indice++;
				                }       
				            <?php
				            }
				       
				    ?>
				}
				</script>
				
				 <form name="form1" action="backend/activos/<?php echo $destino ?>" method="post">
				 	<input type="hidden" name="id" value="<?php echo $id?>">
				  <div class="card text-center ">
					  
					  <div href="#collapseCardExample" class="card-header bg-secondary text-white border-bottom-info d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
						  <b><?php echo $titulo ?></b>
					  </div>
					 
					  <div class="card-body collapse show" id="collapseCardExample">
					  	  
					  <div class="form-group row">
					  <!--  el for--> 
						<label for="Auditoria" class="col-4 col-form-label"><b>Empresa</b></label>
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
					 
 					 <div class="form-group row">
					  <!--  el for--> 
						<label for="fecha" class="col-4 col-form-label"><b>Fecha</b></label>
						<div class="col-6">
							<select class="form-control" name="idauditoria">
							    <option value="-1">Seleccione</option>
							</select>
						</div>
					  </div>
 
						  
					 <div class="form-group row">
					  <!--  el for--> 
						<label for="tipoactivo" class="col-4 col-form-label"><b>Tipo de Activo</b></label>
						<div class="col-6">
							<select name="tipoactivo" id="tipoactivo" class="form-control" required>
								
					 		<!-- OBTIENE LOS DATOS DE LOS TIPO DE ACTIVO EN EL COMBO -->
								<?php include_once("backend/combos/tipoactivo.php") ?>
								
							</select>
						</div>
					  </div>
					  
					  <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="nombre" class="col-4 col-form-label"><b>Nombre</b></label>
						<div class="col-6">
							<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" required>
							
						</div>
					  </div>
						  
					  <div class="form-group row">
						  <!--  el for--> 
							<label for="estatus" class="col-4 col-form-label"><b>Estatus</b></label>
							<div class="col-6">
								<select name="estatus" id="estatus" class="form-control" required>
									
									<!-- OBTIENE LOS DATOS DEL ESTATUS EN EL COMBO -->		
									<?php include_once("backend/combos/estatus.php") ?>
									
								</select>
							</div>
					   </div> 
						  
						 <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="codigo" class="col-4 col-form-label"><b>Código</b></label>
						<div class="col-6">
							<input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $codigo ?>" required>
							
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
						  
					   <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="responsable" class="col-4 col-form-label"><b>Responsable</b></label>
						<div class="col-6">
							  <input type="text" class="form-control" id="responsable" name="responsable" value="<?php echo $responsable ?>" required>
							
						</div>
					  </div>						  
						  
					 <div class="form-group row">
					  <!--  el for--> 
						<label for="confidencialidad" class="col-4 col-form-label"><b>Confidencialidad</b></label>
						<div class="col-6">
							<select name="confidencialidad" id="confidencialidad" class="form-control" required>
								
								<!-- OBTIENE LOS DATOS DE LOS VALORES EN EL COMBO -->		
								<?php include_once("backend/combos/confidencialidad.php") ?>

							</select>
						</div>
					  </div>
						  
					 <div class="form-group row">
					  <!--  el for--> 
						<label for="integridad" class="col-4 col-form-label"><b>Integridad</b></label>
						<div class="col-6">
							<select name="integridad" id="integridad" class="form-control" required>
								
								<!-- OBTIENE LOS DATOS DE LOS VALORES EN EL COMBO -->		
								<?php include_once("backend/combos/integridad.php") ?>
								
							</select>
						</div>
					  </div>						  
						  
					 <div class="form-group row">
					  <!--  el for--> 
						<label for="disponibilidad" class="col-4 col-form-label"><b>Disponibilidad</b></label>
						<div class="col-6">
							<select name="disponibilidad" id="disponibilidad" class="form-control" required>
								
								<!-- OBTIENE LOS DATOS DE LOS VALORES EN EL COMBO -->		
								<?php include_once("backend/combos/disponibilidad.php") ?>

							</select>
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
						<a href="sistema.php?pag=act" class="btn btn-dark border-bottom-danger">Cancelar</a>

						<?php }else{?> 
						<button type="reset"   class="btn btn-dark border-bottom-danger ">Cancelar</button>
						<?php }?> 




						<button type="submit"   class="btn btn-dark border-bottom-success"><?php echo $tituloboton ?></button>


					  </div> <!-- cierre botones card-footer-->				  
					  
				  </div> <!-- cierre div para el border del formulario card text-center -->

				</form>
			 </div> <!-- CIERRE col-7 offset-3 mb-5 -->
			  
          <!-- DataTale  -->
          <div class="card shadow mb-4 col-12">
            <div class="card-header py-3 bg-secondary border-bottom-info">
              <h6 class="m-0 font-weight-bold text-white">Activos de la Empresa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th scope="col">ID</th>

                      <th scope="col">Empresa</th>
                      <th scope="col">Fecha de auditoria</th>
                      <th scope="col">Tipo de Activo</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Estatus</th>
                      
					  <th scope="col">Descripcion</th>
					  <th scope="col">Responsable</th>
					  <th scope="col">Confidencialidad</th>
					  <th scope="col">Integridad</th>
					  <th scope="col">Disponibilidad</th>
					  <th scope="col">Acciones</th>
                    </tr>
                  </thead>
					
                 <!-- <tfoot>
                    <tr class="bg-gray-400 text-dark">
                      <th>ID</th>
                      <th>Empresa</th>
                      <th>Tipo de Activo</th>
                      <th>Estatus</th>
                      <th>Nombre</th>
					  <th>Descripcion</th>
					  <th>Responsable</th>
					  <th>Confidencialidad</th>
					  <th>Integridad</th>
					  <th>Disponibilidad</th>
					  <th>Acciones</th>
                    </tr>
                  </tfoot> -->
					
                 <tbody>
					 <?php
						$wsqli="SELECT activos.idactivo,empresas.nombre as en,auditoria.fechai, tipoactivos.nombre as tipoa, estatus.nombre as ne, activos.nombre as na, activos.descripcion as da, activos.responsable as ar, confidencialidad.nombre as nc, integridad.nombre as ni, disponibilidad.nombre as nd 
						from activos 
						INNER JOIN auditoria on activos.idauditoria=auditoria.idauditoria 
						INNER JOIN empresas on activos.idempresa=empresas.idempresa 
						INNER JOIN tipoactivos ON activos.idtipoactivo=tipoactivos.idtipoactivo 
						INNER JOIN estatus ON activos.idestatus=estatus.idestatus 
						INNER JOIN confidencialidad ON activos.idconfidencialidad=confidencialidad.idconfidencialidad 
						INNER JOIN integridad ON activos.idintegridad=integridad.idintegridad 
						INNER JOIN disponibilidad ON activos.idisponibilidad=disponibilidad.idisponibilidad  ";
						$result = $linki->query($wsqli);
						if($linki->errno) die($linki->error);
						while($row = $result->fetch_array()){
							$id=$row['idactivo'];
							$nom=$row['na'];
							$descrip=$row['da'];
							//aqui no se si esto va.. pero lo coloque para probar guiandome de
							// frmMarcas del curso.
							$respon=$row['ar'];
							
								
					?>						 
					 	<?php
						$idconfidencialidad=$row['nc'];
						$idintegridad=$row['ni'];
						$idisponibilidad=$row['nd'];
						switch ($idconfidencialidad) {
							case 'Muy Bajo': $color = '#25C325'; break;
							case 'Bajo': $color = '#F7F02E'; break;
							case 'Medio': $color = '#F98E03'; break;
							case 'Alto': $color = '#FC0505'; break;
							case 'Muy Alto': $color = '#BF0606'; break;
						
								break;
						}
						switch ($idintegridad) {
							case 'Muy Bajo': $color2 = '#25C325'; break;
							case 'Bajo': $color2 = '#F7F02E'; break;
							case 'Medio': $color2 = '#F98E03'; break;
							case 'Alto': $color2 = '#FC0505'; break;
							case 'Muy Alto': $color2 = '#BF0606'; break;
						
								break;
						}
						switch ($idisponibilidad) {
							case 'Muy Bajo': $color3 = '#25C325'; break;
							case 'Bajo': $color3 = '#F7F02E'; break;
							case 'Medio': $color3 =  '#F98E03'; break;
							case 'Alto': $color3 = '#FC0505'; break;
							case 'Muy Alto': $color3 = '#BF0606'; break;
						
								break;
						}

						?>
                    <tr>
                      <td><?php echo $row['idactivo']?></td>
                      <td><?php echo $row['en']?></td>
                      <td><?php echo $row['fechai']?></td>
                      <td><?php echo $row['tipoa']?></td>
                       <td><?php echo $row['na']?></td>
                      <td><?php echo $row['ne']?></td>
					 
					  <td><?php echo $row['da']?></td>
					  <td><?php echo $row['ar']?></td>
					  <td style="background-color: <?php echo $color ?>; color: #FFFFFF;"><?php echo $row['nc']?></td>
					  <td style="background-color: <?php echo $color2 ?>; color: #FFFFFF;"><?php echo $row['ni']?></td>
					  <td style="background-color: <?php echo $color3 ?>; color: #FFFFFF;"><?php echo $row['nd']?></td>
					<td>

					
						 
						<a href="sistema.php?pag=act&id=<?php echo $id ?>" class="btn btn-dark border-bottom-success btn-sm ">Modificar</a>

						<!--<a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
					  title="<?php //echo '<center>Seguro que desea eliminar este registro:<h4>'.$nom.'</h4><center>' ?>" 
					  href="backend/activos/eliminar.php?id=<?php //echo $id ?>">Eliminar</a>-->

					  
      	 
      				</td>
                    </tr>
					 
					 <?php } ?>
				 </tbody>
				</table>
              </div>
            </div>
          </div> <!-- FIN DATA TABLE-->
			  		
               
										
						
					
					<!--<div role="tabpanel" class="tab-pane" id="tablero">


					</div>-->
			  
			  	</div> <!-- tab content SI SE DESEA AGREGAR MAS REJILLAS, VAN ANTES DE ESTE DIV-->
			  
			  </div> <!-- row -->
			  
			  
          

         <!-- </div>

        </div>
        <!-- /.container-fluid -->

