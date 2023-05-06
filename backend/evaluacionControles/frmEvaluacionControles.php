

<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Evaluación de Controles</h1>
          </div>

          <div class="row">

          	<div class="col-8 offset-3 mb-5">
          		<?php 
				$tituloboton="Agregar";
				$destino="agregar.php";
				$titulo="FORMULARIO EVALUACIÓN DE CONTROLES";
				$idcontrol="";
				$idnivelriesgo="";
				$frecuencia="";
				$tipocontrol="";
				$automatizacion="";
				$id="";
				if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="select * from evaluar_controles where idevaluarcontroles='$id' ";
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);
					if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
						$tituloboton="Modificar";
						$destino="modificar.php";
						$titulo="MODIFICAR EVALUACIÓN DE CONTROLES";
						$idcontrol=$row['idcontrol'];
						$idnivelriesgo=$row['idnivelriesgo'];
						$frecuencia=$row['frecuencia'];
						$tipocontrol=$row['tipocontrol'];
						$automatizacion=$row['automatizacion'];
					}
				}


				?>

				<form action="backend/evaluacionControles/<?php echo $destino ?>" method="post">
					<input type="hidden" name="id" value="<?php echo $id?>">
					<div class="card text-center ">
						<div class="card-header bg-secondary text-white border-bottom-info">
						  <b><?php echo $titulo ?></b>
					  </div>
					  <div class="card-body">
					  	 
					   

					  <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="control" class="col-4 col-form-label"><b>Control</b></label>
						<div class="col-6">
						 	<select name="control" id="control" class="form-control" required>
						 	<?php include_once("backend/combos/controles.php") 	?></select>
							
						</div>
					  </div>

					  <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="riesgo" class="col-4 col-form-label"><b>Riesgo</b></label>
						<div class="col-6">
						 	<select name="riesgo" id="riesgo" class="form-control" required>
						 	<?php include_once("backend/combos/riesgo.php") 	?></select>
							
						</div>
					  </div>


					  	 <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="frecuencia" class="col-4 col-form-label"><b>Frecuencia</b></label>
						<div class="col-2">
						 	<input type="radio" name="frecuencia" value="Permanente" <?php if($frecuencia=='Permanente') echo "checked"?>> Permanente<br>
						</div>
						<div class="col-2">
    						<input type="radio" name="frecuencia"  value="Periodico" <?php if($frecuencia=='Periodico') echo "checked"?>>  Periodico<br>
						</div>
						<div class="col-2">
   						 	<input type="radio" name="frecuencia"  value="Ocasional" <?php if($frecuencia=='Ocasional') echo "checked"?>>  Ocasional 
							
						</div>
					  </div>

					  <div class="form-group row mt-2 ">
					  	<!--  el for--> 
						<label for="tipocontrol" class="col-4 col-form-label"><b>Tipo Control</b></label>
						<div class="col-2">
						 	<input type="radio" name="tipocontrol" value="Preventivo" <?php if($tipocontrol=='Preventivo') echo "checked"?>> Preventivo<br>
						 </div>
						 <div class="col-2">
    						<input type="radio" name="tipocontrol" value="Correctivo" <?php if($tipocontrol=='Correctivo') echo "checked"?>>  Correctivo<br>
   						 	  
							
						 </div>
					  </div>

					  <div class="form-group row mt-2 justify-content-start">
					  	<!--  el for--> 
						<label for="automatizacion" class="col-4 col-form-label"><b>Automatización</b></label>
						<div class="col-2">
						 	<input type="radio" name="automatizacion"  value="Manual" <?php if($automatizacion=='Manual') echo "checked"?>> Manual<br>
						 </div>
						  <div class="col-2">
    						<input type="radio" name="automatizacion"  value="Automatizado" <?php if($automatizacion=='Automatizado') echo "checked"?>>  Automatizado<br>
   		
						</div>
					  </div>


					  </div>
					  <div class="card-footer text-muted">
					  	<?php if(isset($_GET['id'])){?>
						<a href="sistema.php?pag=econ" class="btn btn-dark border-bottom-danger">Cancelar</a>

						<?php }else{?> 
						<button type="reset"   class="btn btn-dark border-bottom-danger ">Cancelar</button>
						<?php }?>




						<button type="submit"   class="btn btn-dark border-bottom-success"><?php echo $tituloboton ?></button>
					  </div>
					</div>



				</form>



          	</div>

          	       <!-- DataTale  -->
          <div class="card shadow mb-4 col-12">
            <div class="card-header py-3 bg-secondary border-bottom-info">
              <h6 class="m-0 font-weight-bold text-white">Evaluación de los controles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th scope="col">ID</th>
                      <th scope="col">Activo</th>
					  <th scope="col">Empresa</th>
					  <th scope="col">Fecha I</th>
                      <th scope="col">Control</th>
                      <th scope="col">Frecuencia</th>
                      <th scope="col">Tipo Control</th>
                      <th scope="col">Automatización</th>
                       
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
					
               
					
                 <tbody> 
					 <?php
	
							$wsqli="SELECT evaluar_controles.idevaluarcontroles as ie, activos.nombre as activo,empresas.nombre as empresa, auditoria.fechai as fechai,  controles.nombre as nc, frecuencia, tipocontrol, automatizacion from evaluar_controles
							INNER JOIN controles ON evaluar_controles.idcontrol=controles.idcontrol
							INNER JOIN nivel_riesgo on evaluar_controles.idnivelriesgo=nivel_riesgo.idnivelriesgo
							INNER JOIN activos on activos.idactivo=nivel_riesgo.idactivo
							INNER JOIN auditoria on auditoria.idauditoria=nivel_riesgo.idauditoria
							INNER JOIN empresas on empresas.idempresa=auditoria.idempresa";
							$result = $linki->query($wsqli);
							if($linki->errno) die($linki->error);
							while($row = $result->fetch_array()){
								$id=$row['ie'];
								$activo=$row['activo'];
								$empresa=$row['empresa'];
								$fechai=$row['fechai'];
								$con=$row['nc'];
								$fre=$row['frecuencia'];
								$tipo=$row['tipocontrol'];
								$automatizacion=$row['automatizacion'];
								 
								 
								
					?>						 
					 
					 
                    <tr>
                      <td><?php echo $row['ie']?></td>
                      <td><?php echo $row['activo']?></td>
					  <td><?php echo $row['empresa']?></td>
					  <td><?php echo $row['fechai']?></td>
                      <td><?php echo $row['nc']?></td>
                      <td><?php echo $row['frecuencia']?></td>
                      <td><?php echo $row['tipocontrol']?></td>
					  <td><?php echo $row['automatizacion']?></td>
					 
					<td>

						<a href="sistema.php?pag=econ&id=<?php echo $id ?>" class="btn btn-dark border-bottom-success btn-sm ">Modificar</a>


						<!--<a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
					  title="<?php //echo '<center>Seguro que desea eliminar este registro:<h4>'.$idni.'</h4><center>' ?>" 
					  href="backend/evaluacionControles/eliminar.php?id=<?php //echo $id ?>">Eliminar</a>-->

					  <a href="sistema.php?pag=mac&id=<?php echo $id ?>" class="btn btn-dark border-bottom-warning btn-sm ">Matriz</a>
      	 
      				</td>
                    </tr>
					 
					 <?php } ?>
				 </tbody> 
				</table>
              </div>
            </div>
          </div> <!-- FIN DATA TABLE-->








          </div>

	</div>
