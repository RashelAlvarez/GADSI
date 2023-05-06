<?php //require_once("vistas/parte_superior.php") ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Amenazas</h1>
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
				$titulo="FORMULARIO AMENAZAS";
				 
				$idtipoamenazas="";
			 
				$descripcion="";
				$id="";
				if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="select * from amenazas where idamenaza='$id' ";
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);
					if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
						$tituloboton="Modificar";
						$destino="modificar.php";
						$titulo="MODIFICAR AMENAZAS";
						 
						$idtipoamenazas=$row['idtipoamenazas'];
					 
					 	$descripcion=$row['descripcion'];

					}
				}


				?>
				 <form action="backend/amenazas/<?php echo $destino ?>" method="post">
				 	<input type="hidden" name="id" value="<?php echo $id?>">
				  <div class="card text-center ">
					  <div class="card-header bg-secondary text-white border-bottom-info">
						  <b><?php echo $titulo ?></b>
					  </div>
					 
					  <div class="card-body">
						  
					  <div class="form-group row">
					  <!--  el for--> 
						<label for="tipoamenazas" class="col-4 col-form-label"><b>Tipo de Amenazas</b></label>
						<div class="col-6">
							<select name="tipoamenazas" id="tipoamenazas" class="form-control" required>
								<?php include_once("backend/combos/tipoamenazas.php") ?>
								
							</select>
						</div>
					  </div>
						  
					  						
						  
						  
					   <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="descripcion" class="col-4 col-form-label"><b>Descripción</b></label>
						<div class="col-6">
							<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion ?>" required>
						  
							
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
						<a href="sistema.php?pag=ame" class="btn btn-dark border-bottom-danger">Cancelar</a>

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
              <h6 class="m-0 font-weight-bold text-white">Definicion de Amenazas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th scope="col">ID</th>
                      <th scope="col">Tipo de Amenazas</th>
                      
                      <th scope="col">Descripción</th>
					  <th scope="col">Acciones</th>
                    </tr>
                  </thead>
					
                  <!--<tfoot>
                    <tr class="bg-gray-400 text-dark">
                      <th>ID</th>
                      <th>Tipo de Amenazas</th>
                      <th>Activo</th>
                      <th>Descripcion</th>
					  <th>Acciones</th>
                    </tr>
                  </tfoot> -->
					
                 <tbody>
					 <?php
							$wsqli="SELECT amenazas.idamenaza, tipoamenazas.descripcion as tipoa, amenazas.descripcion as descrip from amenazas
							INNER JOIN tipoamenazas ON amenazas.idtipoamenazas=tipoamenazas.idtipoamenazas";
							$result = $linki->query($wsqli);
							if($linki->errno) die($linki->error);
							while($row = $result->fetch_array()){
								$id=$row['idamenaza'];
								$tipoa=$row['tipoa'];
								 
								//aqui no se si esto va.. pero lo coloque para probar guiandome de
								// frmMarcas del curso.
								$des=$row['descrip'];
					?>						 
					 
                    <tr>
                      <td><?php echo $row['idamenaza']?></td>
                      <td><?php echo $row['tipoa']?></td>
                      
                      <td><?php echo $row['descrip']?></td>
					<td>

						<a href="sistema.php?pag=ame&id=<?php echo $id ?>" class="btn btn-dark border-bottom-success btn-sm ">Modificar</a>


						<!--<a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
					  title="<?php //echo '<center>Seguro que desea eliminar este registro:<h4>'.$des.'</h4><center>' ?>" 
					  href="backend/amenazas/eliminar.php?id=<?php //echo $id ?>">Eliminar</a>-->

					  
      	 
      				</td>
                    </tr>
					 <?php } ?>
				 </tbody>
				</table>
              </div>
            </div>
          </div> <!-- FIN DATA TABLE-->
			  
			<!--PARTE IZQUIEDA DE LA PANTALLA -->
           <!--[QUITAR\ <div class="col-lg-6">

              <!-- Default Card Example -->
             <!--[QUITAR] <div class="card mb-4">
                <div class="card-header">
                  Default Card Example
                </div>
                <div class="card-body">
                  This card uses Bootstrap's default styling with no utility classes added. Global styles are the only things modifying the look and feel of this default card example.
                </div>
              </div>

              <!-- Basic Card Example -->
              <!-- [QUITAR] <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                </div>
                <div class="card-body">
                  The styling for this basic card example is created by using default Bootstrap utility classes. By using utility classes, the style of the card component can be easily modified with no need for any custom CSS!
                </div>
              </div>

            </div>

            <div class="col-lg-6"> [/#/]-->

			  <!-- PARTE DERECHA DE LA PANTALLA -->
              <!-- Dropdown Card Example -->
             <!-- [QUITAR] <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- [QUITAR] <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div> -->
                <!-- Card Body [/#/]-->
                <!-- [QUITAR] <div class="card-body">
                  Dropdown menus can be placed in the card header in order to extend the functionality of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis icon in the card header can be clicked on in order to toggle a dropdown menu.
                </div>
              </div> [/#/]-->

              <!-- Collapsable Card Example -->
              <!-- [QUITAR] <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
               <!--[QUITAR] <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
                </a>
                <!-- Card Content - Collapse -->
                <!--[QUITAR]<div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                    This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                  </div>
                </div> [/#/]-->
              </div> <!-- DIV DEL ROW PRINCIPAL-->

            </div><!-- /.container-fluid -->

          <!--</div>

        </div> -->
        
