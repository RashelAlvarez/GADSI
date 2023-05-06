<?php //require_once("vistas/parte_superior.php") ?>

        <!-- Begin Page Content -->
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Definición de Controles</h1>
          </div>

         

          <div class="row">
			  
			<div class="col-7 offset-3 mb-5">
			 <?php 
				$tituloboton="Agregar";
				$destino="agregar.php";
				$titulo="FORMULARIO DE CONTROLES";
				 
				$dominio="";
				$objetivo="";
				$nombre="";
			 
				$id="";
				if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="select * from controles where idcontrol='$id' ";
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);
					if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
						$tituloboton="Modificar";
						$destino="modificar.php";
						$titulo="MODIFICAR CONTROLES";
						 
						$dominio=$row['dominio'];
					 	$objetivo=$row['objetivo'];
						$nombre=$row['nombre'];
						 
					}
				}


				?>
				
				
				 <form action="backend/controles/<?php echo $destino ?>" method="post">
				 	<input type="hidden" name="id" value="<?php echo $id?>">
				  <div class="card text-center ">
					  <div class="card-header bg-secondary text-white border-bottom-info">
						  <b><?php echo $titulo ?></b>
					  </div>
					 
					  <div class="card-body">
						  
						  
					   <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="dominio" class="col-4 col-form-label"><b>Dominio</b></label>
						<div class="col-6">
						  <input type="text" class="form-control" id="dominio" name="dominio" value="<?php echo $dominio ?>" required>
							
						</div>
					  </div>
						  
					   <div class="form-group row">
					  	<!--  el for--> 
						<label for="objetivo" class="col-4 col-form-label"><b>Objetivo</b></label>
						<div class="col-6">
							<input type="text" class="form-control" id="objetivo" name="objetivo" value="<?php echo $objetivo ?>" required>
						 
							
						</div>
					  </div>
						  
					   <div class="form-group row">
					  	<!--  el for--> 
						<label for="rif" class="col-4 col-form-label"><b>Nombre</b></label>
						<div class="col-6">
							<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" required>
							
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
						<a href="sistema.php?pag=con" class="btn btn-dark border-bottom-danger">Cancelar</a>

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
              <h6 class="m-0 font-weight-bold text-white">Información de los controles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th scope="col">ID</th>
                      <th scope="col">Dominio</th>
                      <th scope="col">Objetivo</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
					
               
					
                 <tbody> 
					 <?php
							$wsqli="SELECT * FROM controles ";
							$result = $linki->query($wsqli);
							if($linki->errno) die($linki->error);
							while($row = $result->fetch_array()){
								$id=$row['idcontrol'];
								$dom=$row['dominio'];
								$obj=$row['objetivo'];
								$nom=$row['nombre'];
								 
								
					?>						 
					 
					 
                    <tr>
                      <td><?php echo $row['idcontrol']?></td>
                      <td><?php echo $row['dominio']?></td>
                      <td><?php echo $row['objetivo']?></td>
                      <td><?php echo $row['nombre']?></td>
					  
					<td>

						<a href="sistema.php?pag=con&id=<?php echo $id ?>" class="btn btn-dark border-bottom-success btn-sm ">Modificar</a>


						<!--<a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
					  title="<?php //echo '<center>Seguro que desea eliminar este registro:<h4>'.$nom.'</h4><center>' ?>" 
					  href="backend/controles/eliminar.php?id=<?php //echo $id ?>">Eliminar</a>-->

					  
      	 
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

<?php require_once("vistas/parte_inferior.php") ?>