<?php //require_once("vistas/parte_superior.php") ?>
 
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Permisos de Usuarios</h1>
          </div>

          

          <div class="row">
			  
			<div class="col-7 offset-3 mb-5">
			 <?php 
				
			 	$tituloboton="Agregar";
				$destino="agregarPermisos.php";
				$titulo="OTORGAR PERMISOS DE USUARIO";
				 
			 
				 
				
				
				$id="";
				$idusuario="";
				$idmodulos="";
				$ver="";
				$editar="";
				$crear="";
				$eliminar="";
				if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="select * from permisos_modulos where idpermisos='$id' ";
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);
					if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
						$tituloboton="Modificar";
						$destino="modificar.php";
						$titulo="MODIFICAR USUARIO";
						
						$idusuario=$row['idusuario'];
						 
					 
					 	$idmodulos=$row['idmodulos'];
						$ver=$row['ver'];
						$editar=$row['editar'];
						$crear=$row['crear'];
						$eliminar=$row['eliminar'];
					}
				}

				 
				?>
				
				
				 <form action="backend/usuarios/<?php echo $destino ?>" method="post">
				 	<input type="hidden" name="id" value="<?php echo $id?>">
				  <div class="card text-center ">
					  	  
					  <div href="#collapseCardExample" class="card-header bg-secondary text-white border-bottom-info d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
						 <?php echo $titulo ?>
					  </div>
						  
					  


					  <div class="card-body collapse show" id="collapseCardExample">
						  
						 
					  	<div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="usuario" class="col-4 col-form-label">Usuario</label>
						<div class="col-6">
							<select name="usuario" id="usuario" class="form-control" required>
									<?php include_once("backend/combos/usuario.php") ?>
								

								</select>
						 
							
						</div>
					  </div>

					   <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="modulo" class="col-4 col-form-label">Modulo</label>
						<div class="col-6">
							<select name="modulo" id="modulo" class="form-control" required>
									<?php include_once("backend/combos/modulo.php") ?>
								

								</select>
						 
							
						</div>
					  </div>


 					<div class="form-group">
                        <div class="checkbox icheck">
                              <label>
                                    <input type="checkbox" name="ver" value="<?php echo $ver ?>"> &nbsp;Ver
                             </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox icheck">
                              <label>
                                    <input type="checkbox" name="editar" value="<?php echo $editar ?>"> &nbsp;Editar
                             </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox icheck">
                              <label>
                                    <input type="checkbox" name="crear" value="<?php echo $crear ?>"> &nbsp;Crear
                             </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox icheck">
                              <label>
                                    <input type="checkbox" name="eliminar" value="<?php echo $eliminar ?>"> &nbsp;Eliminar
                             </label>
                        </div>
                    </div>


					
					   
					   
						  
						  
					  
						  
					  </div><!-- CIERRE DIV BODY-->
					  <!-- BOTONES -->
					  
					  <div class="card-footer text-muted">
						<!-- BOTOM CANCELAR QUE SE VERA DENTRO DE MODIFICAR-->
						<?php if(isset($_GET['id'])){?>
						<a href="sistema.php?pag=per" class="btn btn-dark border-bottom-danger">Cancelar</a>

						<?php }else{?> 
						<button type="reset"   class="btn btn-dark border-bottom-danger ">Cancelar</button>
						<?php }?>




						<button type="submit"   class="btn btn-dark border-bottom-success">Agregar</button>


					  </div> <!-- cierre botones card-footer-->				  
					  
				  </div> <!-- cierre div para el border del formulario card text-center -->

				</form>
			 </div>
			  
          <!-- DataTale  -->
          <div class="card shadow mb-4 col-12">
            <div class="card-header py-3 bg-secondary border-bottom-info">
              <h6 class="m-0 font-weight-bold text-white">Permisos de Usuarios</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-secondary text-white">
                     
                       
                      <th scope="col">Correo</th>
                        
                      <th scope="col">Modulo</th>
                      <th scope="col">Ver</th>
                      <th scope="col">Editar</th>
					  <th scope="col">Crear</th>
					  <th scope="col">Eliminar</th>
					  <th scope="col">Acciones</th>
					  
                    </tr>
                  </thead>
					
                 
					
                 <tbody>
					 <?php
							$wsqli="SELECT permisos_modulos.idpermisos as ip,usuarios.correo as cu, modulos.nombre as nm, ver, editar, crear,eliminar from permisos_modulos inner join usuarios on permisos_modulos.idusuario=usuarios.idusuario inner join modulos on permisos_modulos.idmodulos=modulos.idmodulos  ";
							$result = $linki->query($wsqli);
							if($linki->errno) die($linki->error);
							while($row = $result->fetch_array()){
								 
								
								$usu=$row['cu'];
								 
								$mo=$row['nm'];
								$ve=$row['ver'];
								$edi=$row['editar'];
								$cre=$row['crear'];
								$eli=$row['eliminar'];
								//aqui no se si esto va.. pero lo coloque para probar guiandome de
								// frmMarcas del curso.
								 
	

								
					?>						 
					 
					 
                    <tr>
                      
                      
                      <td><?php echo $row['cu']?></td>
                   
                      <td><?php echo $row['nm']?></td>
                      <td><?php echo $row['ver']?></td>
                      <td><?php echo $row['editar']?></td>
					  <td><?php echo $row['crear']?></td>
					  <td><?php echo $row['eliminar']?></td>
					   
					<td>

						

						 
					<a href="sistema.php?pag=per&id=<?php echo $id ?>" class="btn btn-dark border-bottom-success btn-sm ">Modificar</a>

						<a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
					  title="<?php echo '<center>¿Seguro que desea eliminar este registro?<center>' ?>" 
					  href="backend/usuarios/eliminarPermisos.php?id=<?php echo $id ?>">Eliminar</a>

					  
      	 
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
        


<?php require_once("vistas/parte_inferior.php") ?>