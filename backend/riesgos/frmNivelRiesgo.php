<?php //require_once("../storage/riesgos/vistas/parte_superior.php") ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Nivel de Riesgo</h1>
          </div>

       
          <div class="row">
			  
			<div class="col-7 offset-3 mb-5">
			 <?php 
				$tituloboton="Agregar";
				$destino="agregar.php";
				$titulo="CALCULO NIVEL DE RIESGO";
				$idprobabilidad="";
				$idimpacto="";
				$idactivo="";
				$idamenaza="";
				$idauditoria="";
				//$fecha="";
			 
				$id="";
				if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="select * from nivel_riesgo where idnivelriesgo='$id' ";
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);
					if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
						$tituloboton="Modificar";
						$destino="modificar.php";
						$titulo="MODIFICAR NIVEL RIESGO";
						$idprobabilidad=$row['idprobabilidad'];
						$idimpacto=$row['idimpacto'];
					 	$idactivo=$row['idactivo'];
					 	$idamenaza=$row['idamenaza'];
					 	$idauditoria=$row['idauditoria'];
						//$fecha=$row['fechai'];
					}
				}


				?>
				
				<script>
function crearM(id) 
{ 
	document.form1.idactivo.length=0;
	document.form1.idactivo.options[0] = new Option("--- Seleccione una opción ---","","defaultSelected","-1");
	var indice=0; 
	<?php 
	    //include_once('config/conexi.php');
	    $linki = new mysqli("localhost", "root", "", "auditorias");
		$linki->query("SET CHARACTER SET utf8");
		if (mysqli_connect_errno()) {
			die("No se puede conectar a la base de datos:" . mysqli_connect_error());
		} 
	

	    $wsqli="SELECT * FROM activos order by nombre";
	    $result = $linki->query($wsqli);
	    if($linki->errno) die($linki->error);
	    while($row = $result->fetch_array()){
     ?>
	
                if (id=="<?php echo $row['idauditoria']?>")
                {
                    document.form1.idactivo.options[indice] = new Option("<?php echo $row['nombre']?>",
					"<?php echo $row['idactivo']?>");
                    indice++;
                }
				
            <?php
            }
       
	?>
}
</script>
				 <form name="form1" action="backend/riesgos/<?php echo $destino ?>" method="post">
				 	<input type="hidden" name="id" value="<?php echo $id?>">
				  <div class="card text-center ">
					  <div class="card-header bg-secondary text-white border-bottom-info">
						  <b><?php echo $titulo ?></b>
					  </div>
					 
					  <div class="card-body">
						  
						
					  	<div class="form-group row">
					  	<!--  el for--> 
						<label for="fechai" class="col-4 col-form-label"><b>Fecha Inicio Auditoria</b></label>
						<div class="col-6">
							  <select name="idauditoria" onChange="crearM(this.value)" class="form-control" required>
								<option value="-1">Seleccione</option>
								  
									<?php 

									$wsqli="SELECT auditoria.idauditoria, empresas.nombre as nombre, fechai from auditoria 
									INNER JOIN empresas ON auditoria.idempresa=empresas.idempresa
									order by idauditoria";
									$result = $linki->query($wsqli);
									if($linki->errno) die($linki->error);
									while($row = $result->fetch_array()){
										$ide=$row['idauditoria'];
								?>
								<option value="<?php echo $row['idauditoria'] ?>" <?php if($ide==$idauditoria){?>selected <?php }?>  ><?php echo $row['nombre'] ?>  <?php echo $row['fechai'] ?></option>
								<?php }?>

								
							</select>								  
					 		<!-- OBTIENE LOS DATOS DE LAS PROBABILIDADES EN EL COMBO -->
					 		<!--<?php //include_once("backend/combos/auditorias.php") 	?>-->
					 		
					 	<!--</select>-->
							
						</div>
					  </div>

						<div class="form-group row">
					  	<!--  el for--> 
						<label for="activo" class="col-4 col-form-label"><b>Activo</b></label>
							
						<div class="col-6">
							<select class="form-control" name="idactivo" >
								<option value="-1">Seleccione</option>


								<!-- OBTIENE LOS DATOS DE LOS ACTIVOS EN EL COMBO -->
								<!--<?php //include_once("backend/combos/activos.php") 	?>-->


							</select>
							
						</div>

							
					  </div>

					  <div class="form-group row">
					  	<!--  el for--> 
						<label for="amenaza" class="col-4 col-form-label"><b>Amenaza</b></label>
						<div class="col-6">
							  <select name="amenaza" id="amenaza" class="form-control" required>

					 		<!-- OBTIENE LOS DATOS DE LAS PROBABILIDADES EN EL COMBO -->
					 		<?php include_once("backend/combos/amenazas.php") 	?>
					 		
					 	</select>
							
						</div>
					  </div>

					   <div class="form-group row mt-2">
					  	<!--  el for--> 
						<label for="probabilidad" class="col-4 col-form-label"><b>Probabilidad</b></label>
						<input type="hidden" name="id" value="<?php echo $id?>">
						<div class="col-6">
						  <select name="probabilidad" id="probabilidad" class="form-control" required>

					 		<!-- OBTIENE LOS DATOS DE LAS PROBABILIDADES EN EL COMBO -->
					 		<?php include_once("backend/combos/probabilidad.php") 	?>
					 		
					 	</select>
							
						</div>
					  </div>
						  
					   <div class="form-group row">
					  	<!--  el for--> 
						<label for="impacto" class="col-4 col-form-label"><b>Impacto</b></label>
						<div class="col-6">
							  <select name="impacto" id="impacto" class="form-control" required>

					 		<!-- OBTIENE LOS DATOS DE IMPACTO EN EL COMBO -->
					 		<?php include_once("backend/combos/impacto.php") 	?>
					 		
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
						<a href="sistema.php?pag=nri" class="btn btn-dark border-bottom-danger">Cancelar</a>

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
              <h6 class="m-0 font-weight-bold text-white">Niveles de Riesgo</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-secondary text-white">
                      <th scope="col">ID</th>
                      <th scope="col">Activo</th>
                       
                      <th scope="col">Tipo activo</th>
                      <th scope="col">Empresa</th>
					  <th scope="col">Fecha</th>
                      <th scope="col">Amenaza</th>
                      <th scope="col">Tipo Amenaza</th>
                      <th scope="col">Impacto</th>
                      <th scope="col">Probabilidad</th>
                      
                      
                      <th scope="col">Riesgo</th>
					  <th scope="col">Acciones</th>
                    </tr>
                  </thead>
					
                
					
                 <tbody>
					 <?php
							$wsqli="SELECT empresas.idempresa, empresas.nombre as empresa, auditoria.idauditoria, auditoria.fechai as fechai, nivel_riesgo.idnivelriesgo as idni, nivel_riesgo.idactivo, activos.nombre as activo, tipoactivos.nombre as tipoa, amenazas.descripcion as amenaza, tipoamenazas.descripcion as tipoamenaza, impacto.nombre as impacto, probabilidad.nombre as probabilidad, nivel_riesgo.riesgo as riesgo from empresas 
							INNER JOIN auditoria on auditoria.idempresa=empresas.idempresa 
							INNER JOIN nivel_riesgo on nivel_riesgo.idauditoria=auditoria.idauditoria 
							INNER JOIN activos on activos.idactivo=nivel_riesgo.idactivo 
							INNER JOIN tipoactivos on tipoactivos.idtipoactivo=activos.idtipoactivo 
							INNER JOIN amenazas on amenazas.idamenaza=nivel_riesgo.idamenaza 
							INNER JOIN tipoamenazas on tipoamenazas.idtipoamenazas=amenazas.idtipoamenazas 
							INNER JOIN impacto on impacto.idimpacto=nivel_riesgo.idimpacto 
							INNER JOIN probabilidad on probabilidad.idprobabilidad=nivel_riesgo.idprobabilidad  ";
							$result = $linki->query($wsqli);
							if($linki->errno) die($linki->error);
							while($row = $result->fetch_array()){
								$id=$row['idni'];
								$na=$row['activo'];
								
								$ta=$row['tipoa'];
								$emp=$row['empresa'];
								$fecha=$row['fechai'];
								$ame=$row['amenaza'];
								$tipoame=$row['tipoamenaza'];
								$imp=$row['impacto'];
								$pro=$row['probabilidad'];
								//aqui no se si esto va.. pero lo coloque para probar guiandome de
								// frmMarcas del curso.
								
								$ri=$row['riesgo'];
					?>						 
					 
                    <tr>
                      <td><?php echo $row['idni']?></td>
                      <td><?php echo $row['activo']?></td>
                  
                      <td><?php echo $row['tipoa']?></td>
                      <td><?php echo $row['empresa']?></td>
					  <td><?php echo $row['fechai']?></td>
                      <td><?php echo $row['amenaza']?></td>
                      <td><?php echo $row['tipoamenaza']?></td>
                      <td><?php echo $row['impacto']?></td>
                      <td><?php echo $row['probabilidad']?></td>
                      
                      <td><?php echo $row['riesgo']?></td>
					<td>
						<!--<a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
					  title="<?php //echo '<center>Seguro que desea eliminar este registro:<h4>'.$na.'</h4><center>' ?>" 
					  href="eliminar.php?id=<?php //echo $id ?>">Eliminar</a>-->

					  <a href="sistema.php?pag=nri&id=<?php echo $id ?>" class="btn btn-dark border-bottom-success btn-sm ">Modificar</a>
      	 				
      	 				<a href="sistema.php?pag=ma&id=<?php echo $id ?>" class="btn btn-dark border-bottom-warning btn-sm mt-1">Matriz</a>
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


   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> -->
  </script>
  <script type="text/javascript" src="../js/nivelriesgo.js"></script>
 
