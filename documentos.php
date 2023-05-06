<?php require_once("vistas/parte_superior.php") ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Documentos</h1>
          </div>

          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
           <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
           <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
           <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example -->
           <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>

          <div class="row">
			  
			<div class="col-7 offset-3 mb-5">
			 <?php 
				$tituloboton="Agregar";
				?>
				
				
				 <form>
				  <div class="card text-center ">
					  	  
					  <div href="#collapseCardExample" class="card-header bg-secondary text-white border-bottom-info d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
						  ANEXAR DOCUMENTOS
					  </div>
						  
					  
					  <div class="card-body collapse show" id="collapseCardExample">
						  
						  
					   <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="archivo" class="col-4 col-form-label">Archivo</label>
						<div class="col-6">
							<input type="file" class="custom-file-input" id="archivo" name="archivo" lang="es">
							<label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
						  <!-- <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" required> -->
							
						</div>
					  </div>
						  

						  
						  <div class="form-group row">
						  <!--  el for--> 
							<label for="descripcion" class="col-4 col-form-label">Descripcion</label>
							<div class="col-6">
							  <input type="text" class="form-control" id="descripcion" name="descripcion">
							  <!-- <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion ?>" required> -->
								
							</div>
						  </div>					   
					  
						  
					  </div><!-- CIERRE DIV BODY-->
					  <!-- BOTONES -->
					  
					  <div class="card-footer text-muted">
						<!-- BOTOM CANCELAR QUE SE VERA DENTRO DE MODIFICAR-->
						<!-- <?php if(isset($_GET['id'])){?> -->
						<a href="sistema.php" class="btn btn-dark border-bottom-danger">Cancelar</a>

						<!-- <?php }else{?> -->
						<button type="reset"   class="btn btn-dark border-bottom-danger ">Cancelar</button>
						<!-- <?php }?> -->




						<button type="submit"   class="btn btn-dark border-bottom-success"><?php echo $tituloboton ?></button>


					  </div> <!-- cierre botones card-footer-->				  
					  
				  </div> <!-- cierre div para el border del formulario card text-center -->

				</form>
			 </div>
			  
          <!-- DataTale  -->
         <!-- <div class="card shadow mb-4 col-12">
            <div class="card-header py-3 bg-secondary border-bottom-info">
              <h6 class="m-0 font-weight-bold text-white">Auditores Registrados</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Estatus</th>
                      <th>Tipo de Usuario</th>
					  <th>Correo</th>
					  <th>Contraseña</th>
					  <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="bg-gray-400 text-dark">
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Estatus</th>
                      <th>Tipo de Usuario</th>
					  <th>Correo</th>
					  <th>Contraseña</th>
					  <th>Acciones</th>
                    </tr>
                  </tfoot>
                 <tbody>
                    <tr>
                      <td>1</td>
                      <td>Oneill</td>
                      <td>Moreno</td>
                      <td>Activo</td>
					  <td>Auditor</td>
					  <td>oneill@gmail.com</td>
					  <td>1234</td>
					<td><a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
					  title="<?php echo '<center>Seguro que desea eliminar este registro:<h4>'.$nom.'</h4><center>' ?>" 
					  href="backend/productos/eliminar.php?id=<?php echo $id ?>">Eliminar</a>

					  <a href="sistema.php?pag=pro&id=<?php echo $id ?>" class="btn btn-dark border-bottom-success btn-sm ">Modificar</a>
      	 
      				</td>
                    </tr>
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
        


<?php require_once("vistas/parte_inferior.php") ?>