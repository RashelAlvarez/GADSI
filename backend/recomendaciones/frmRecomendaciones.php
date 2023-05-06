

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Recomendaciones</h1>
          </div>

 
          <div class="row">
			  
			<!--<div>-->

	  
			<div class="col-10 offset-1 mb-5">
				
			 <?php 
				$tituloboton="Agregar";
				$destino="agregar.php";
				$titulo="RECOMENDACIONES";
			 
				$idauditoria="";
			 
		 
		 
				$descripcion="";
		  
				$idempresa="";
	 
				 
				$id="";
				if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="select * from recomendaciones where idrecomendaciones='$id' ";
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);
					if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
						$tituloboton="Modificar";
						$destino="modificar.php";
						$titulo="MODIFICAR ACTIVO";
						$idactivo=$row['idactivo'];
						$idauditoria=$row['idauditoria'];
				 
					 	$descripcion=$row['descripcion'];
						$responsable=$row['responsable'];
			 
						$idempresa=$row['idempresa'];
			 
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
				
				 <form name="form1" action="backend/recomendaciones/<?php echo $destino ?>" method="post">
				 	<input type="hidden" name="id" value="<?php echo $id?>">
				  <div class="card text-center ">
					  
					  <div  class="card-header bg-secondary text-white border-bottom-info d-block card-header py-3" >
						  <?php echo $titulo ?>
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
						    <option value="<?php echo $row['idempresa'] ?>"><?php echo $row['nombre'] ?></option>
						    <?php }?>
								
							</select>
							 

						</div>
					  </div>
					 
 					 <div class="form-group row">
					  <!--  el for--> 
						<label for="fecha" class="col-4 col-form-label"><b>Fecha</b></label>
						<div class="col-6">
							<select class="form-control" name="idauditoria" required>
							    <option value="-1" >Seleccione</option>
							</select>
						</div>
					  </div>
 
						  
					<hr class="border-bottom-info">
						  
						  <div class="form-group row">
						  <!--  el for--> 
							
							<div class="col-12">
							<label for="descripcion" class="col-4 col-form-label"><b>Descripción</b></label>
							  <textarea type="text" class="form-control" id="descripcion" maxlength="500" rows="15" name="descripcion" value="<?php echo $descripcion ?>" required></textarea>
								
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
			  
         
			  		
               
										
						
					
					<!--<div role="tabpanel" class="tab-pane" id="tablero">


					</div>-->
			  
			  	</div> <!-- tab content SI SE DESEA AGREGAR MAS REJILLAS, VAN ANTES DE ESTE DIV-->
			  
			  </div> <!-- row -->
			  
			  
          

         <!-- </div>

        </div>
        <!-- /.container-fluid -->

