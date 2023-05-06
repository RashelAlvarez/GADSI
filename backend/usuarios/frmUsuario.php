
<?php //require_once("vistas/parte_superior.php") ?>


	<script>
			
	function sololetras(e) {

	    key=e.keyCode || e.which;
	    teclado=String.fromCharCode(key).toLowerCase();
	    letras="qwertyuiopasdfghjklñzxcvbnm ";
	    especiales="8-37-38-46-164";
	    teclado_especial=false;

	    for(var i in especiales){
	        if(key==especiales[i]){
	            teclado_especial=true;
	            break;
	        }
	    }

	 
	    if(letras.indexOf(teclado)==-1 && !teclado_especial){
	        return false;

	        }
	    }
	</script>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
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
				$titulo="REGISTRAR USUARIO";
				
				$idestatus="";
				$idtipousuario="";
				$nombre="";
				$apellido="";
				$correo="";
				$clave="";
				$id="";
				if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="select * from usuarios where idusuario='$id' ";
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);
					if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
						$tituloboton="Modificar";
						$destino="modificar.php";
						$titulo="MODIFICAR USUARIO";
						
						$idestatus=$row['idestatus'];
					 	$idtipousuario=$row['idtipousuario'];
						$nombre=$row['nombre'];
						$apellido=$row['apellido'];
						$correo=$row['correo'];
						$clave=$row['clave'];
					}
				}


				?>
				
				
				 <form action="backend/usuarios/<?php echo $destino ?>" method="post">
				 	<input type="hidden" name="id" value="<?php echo $id?>">
				  <div class="card text-center ">
					  	  
					  <div href="#collapseCardExample" class="card-header bg-secondary text-white border-bottom-info d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
						  <b><?php echo $titulo ?></b>
					  </div>
						  
					  
					  <div class="card-body collapse show" id="collapseCardExample">
						  
						  
					   <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="nombre" class="col-4 col-form-label"><b>Nombre</b></label>
						<div class="col-6">
							<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" onkeypress="return sololetras(event)" required>
						 
							
						</div>
					  </div>
						  
					   <div class="form-group row">
					  	<!--  el for--> 
						<label for="apellido" class="col-4 col-form-label"><b>Apellido</b></label>
						<div class="col-6">
							<input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido ?>"  onkeypress="return sololetras(event)" required>
						
							
						</div>
					  </div>
			
					  <div class="form-group row">
						  <!--  el for--> 
							<label for="estatus" class="col-4 col-form-label"><b>Estatus</b></label>
							<div class="col-6">
								<select name="estatus" id="estatus" class="form-control" required>
									<?php include_once("backend/combos/estatus.php") ?> 
							
								</select>
							</div>
					   </div> 
						  
					  <div class="form-group row">
						  <!--  el for--> 
							<label for="tipousuario" class="col-4 col-form-label"><b>Tipo de Usuario</b></label>
							<div class="col-6">
								<select name="tipousuario" id="tipousuario" class="form-control" required>
									<?php include_once("backend/combos/tipousuario.php") ?>
								

								</select>
							</div>
					   </div> 						  
						  
					 <div class="form-group row">
					  	<!--  el for--> 
						<label for="correo" class="col-4 col-form-label"><b>Correo</b></label>
						<div class="col-6">
							<input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo ?>" required>
						 
							
						</div>
					  </div>
						  
						  
					   <div class="form-group row">
					  	<!--  el for--> 
						<label for="clave" class="col-4 col-form-label"><b>Contraseña</b></label>
						<div class="col-6">
							<input type="password" class="form-control" id="clave" name="clave" value="<?php echo $clave ?>" required>
						  
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

						  if(isset($_SESSION['admin'])){
						echo "<div class='alert alert-danger'> ".$_SESSION['admin']."</div>";  
						unset($_SESSION['admin']); //para borrar el mensaje cuando recargues la pagina

					  }
				?>					  
						    
					  </div><!-- CIERRE DIV BODY-->
					  <!-- BOTONES -->
					  
					  <div class="card-footer text-muted">
						<!-- BOTOM CANCELAR QUE SE VERA DENTRO DE MODIFICAR-->
						<?php if(isset($_GET['id'])){?>
						<a href="sistema.php?pag=usu" class="btn btn-dark border-bottom-danger">Cancelar</a>

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
              <h6 class="m-0 font-weight-bold text-white">Usuarios Registrados</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-secondary text-white">
                    	<th scope="col">Img</th>
                    
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido</th>
                      <th scope="col">Estatus</th>
                      <th scope="col">Tipo de Usuario</th>
					  <th scope="col">Correo</th>
					  <th scope="col">Contraseña</th>
					  <th scope="col">Acciones</th>
                    </tr>
                  </thead>
					
                  <!--<tfoot>
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
                  </tfoot> -->
					
                 <tbody>
					 <?php
							$wsqli="SELECT  usuarios.idusuario as idusu, usuarios.image as iu, estatus.nombre as estatus, tipousuarios.nombre as tipou, usuarios.nombre as nom, usuarios.apellido as ape, usuarios.correo as correo, usuarios.clave as clave from usuarios
							INNER JOIN estatus on usuarios.idestatus=estatus.idestatus
							INNER JOIN tipousuarios on usuarios.idtipousuario=tipousuarios.idtipousuario";
							$result = $linki->query($wsqli);
							if($linki->errno) die($linki->error);
							while($row = $result->fetch_array()){
								
								$id=$row['idusu'];
								$nom=$row['nom'];
								$ape=$row['ape'];
								//aqui no se si esto va.. pero lo coloque para probar guiandome de
								// frmMarcas del curso.

								$tipousuario=$row['tipou'];
								

								/*$wsqli2="select * from usuarios where idusuario='$idusuario' limit 1";
								$result2 = $linki->query($wsqli2);
								if($linki->errno) die($linki->error);*/


								//$idf=0;
								
								//if para mostrar una sola imagen en la publicacion del producto
								//if($row>0) 
								$idf=$row['iu'];
								 
										
					?>						 
					 
					 
                    <tr>
                    <td>
                    	<img src="img/profiles/<?php echo $idf; ?>" alt="user image" class="offline" width="70"></td>
                   
                      <td><?php echo $row['nom']?></td>
                      <td><?php echo $row['ape']?></td>
                      <td><?php echo $row['estatus']?></td>
					  <td><?php echo $row['tipou']?></td>
					  <td><?php echo $row['correo']?></td>
					  <td><?php echo $row['clave']?></td>
					<td>

						 

						<a href="sistema.php?pag=usu&id=<?php echo $id ?>" class="btn btn-dark border-bottom-success btn-sm ">Modificar</a>

						<a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
					  title="<?php echo '<center>Seguro que desea eliminar este registro:<h4>'.$nom.' '.$ape.'</h4><center>' ?>" 
					  href="backend/usuarios/eliminar.php?id=<?php echo $id ?>">Eliminar</a>

					  
      	 
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
        


