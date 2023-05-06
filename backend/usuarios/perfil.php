 <?php //require_once("vistas/parte_superior.php") ?>
<div class="row">
	<div class="col-xl-6 col-lg-7">
		<div class="card shadow mb-4 ml-4 mr-4">
			<h4 class="text-center mt-3">FOTO</h4>


			 <?php include_once("config/conexi.php") ?>
			 <?php include_once("sistema.php") ?>

			 <div class="col-12">
				<div class="image view view-first">
					<img class="thumb-image" style="width: 100%; display: block;" src="images/profiles/<?php echo $profile_pic ?>" alt="image">
				</div>
				 
			  </div>
			<div class="col-12 mt-2 text-center ">
 				<span class="btn btn-my-button btn-file" style="width: 250px; margin-top: 5px;">
						<form method="post" id="formulario" enctype="multipart/form-data">
						Cambiar Imagen de perfil: <input type="file" name="file">
						</form>
				  </span>
						<div id="respuesta"></div>
						<br>
			</div>				

		</div>

	</div> <!-- CIERRE DIV CONTAINER-FLUID-->

	<div class="col-xl-6 col-lg-7">
		<div class="card shadow mb-4 ml-4 mr-4">
			<?php 
			$titulo="PERFIL";
			$tituloboton="Actualizar";
			?>
			<form action="backend/usuarios/<?php echo $destino ?>" method="post">
				 	<input type="hidden" name="id" value="<?php echo $id?>">
				  <div class="card text-center ">
					  	
					  <!-- <div href="#collapseCardExample" class="card-header bg-secondary text-white border-bottom-info d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
						  <?php //echo $titulo ?>
					  </div>
-->
					  <div class="card-header bg-secondary text-white border-bottom-info d-block card-header py-3 mb-2">
						  <b><?php echo $titulo ?></b>
					  </div>
						  
					 
					   <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="nombre" class="col-4 col-form-label">Nombre</label>
						<div class="col-6">
							<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" onkeypress="return sololetras(event)" required>
						 
							
						</div>
					  </div>
						  
					   <div class="form-group row">
					  	<!--  el for--> 
						<label for="apellido" class="col-4 col-form-label">Apellido</label>
						<div class="col-6">
							<input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido ?>"  onkeypress="return sololetras(event)" required>
						
							
						</div>
					  </div>
			
					  <div class="form-group row">
						  <!--  el for--> 
							<label for="estatus" class="col-4 col-form-label">Estatus</label>
							<div class="col-6">
								<select name="estatus" id="estatus" class="form-control" required>
									<?php include_once("backend/combos/estatus.php") ?> 
							
								</select>
							</div>
					   </div> 
						  
					  <div class="form-group row">
						  <!--  el for--> 
							<label for="tipousuario" class="col-4 col-form-label">Tipo de Usuario</label>
							<div class="col-6">
								<select name="tipousuario" id="tipousuario" class="form-control" required>
									<?php include_once("backend/combos/tipousuario.php") ?>
								

								</select>
							</div>
					   </div> 						  
						  
					 <div class="form-group row">
					  	<!--  el for--> 
						<label for="correo" class="col-4 col-form-label">Correo</label>
						<div class="col-6">
							<input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo ?>" required>
						 
							
						</div>
					  </div>
						  
						  
					   <div class="form-group row">
					  	<!--  el for--> 
						<label for="clave" class="col-4 col-form-label">Contraseña</label>
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
						    
					  <!-- CIERRE DIV BODY-->
					  <!-- BOTONES -->
					  
					  <div class="card-footer text-muted">
						<!-- BOTOM CANCELAR QUE SE VERA DENTRO DE MODIFICAR-->
						<?php if(isset($_GET['id'])){?>
						<a href="sistema.php?pag=usu" class="btn btn-dark border-bottom-danger">Cancelar</a>

						<?php }else{?> 
						<!--<button type="reset"   class="btn btn-dark border-bottom-danger ">Cancelar</button>-->
						<?php }?>




						<button type="submit"   class="btn btn-dark border-bottom-success"><?php echo $tituloboton ?></button>


					  </div> <!-- cierre botones card-footer-->				  
					  
				  </div> <!-- cierre div para el border del formulario card text-center -->

				</form>
			



		</div> <!-- CIERRE CARD SHADOW -->

	</div> <!-- CIERRE DIV CONTAINER-FLUID-->	
	
</div> <!-- CIERRE DIV ROW -->



















 <?php require_once("vistas/parte_inferior.php") ?>