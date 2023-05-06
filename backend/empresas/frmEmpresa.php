<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        	<h1 class="h3 mb-0 text-gray-800">Empresas</h1>
        </div>
<script>
	 //SOLO NUMEROS Y GUION
	function validar(e){
	  tecla = (document.all) ? e.keyCode : e.which;
	  tecla = String.fromCharCode(tecla)
	  return /^[0-9\-]+$/.test(tecla);

 
}
</script>
		
<script>
	$( function() {
	$("#datepickor").datepicker({
		dateFormat: 'yy/mm/dd',
		minDate: 0
		});
	});
</script>
		
        <div class="row"> 
			<div class="col-7 offset-3 mb-5">
				<?php 
					$tituloboton="Agregar";
					$destino="agregar.php";
					$titulo="FORMULARIO EMPRESA";
					
					$nombre="";
					$rif="";
					$direccion="";
					$telefono="";
					$fecha="";
					$id="";
					if(isset($_GET['id'])){

						$id=$_GET['id'];
						$wsqli="select * from empresas where idempresa='$id' ";
						$result = $linki->query($wsqli);
						if($linki->errno) die($linki->error);
						if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
							$tituloboton="Modificar";
							$destino="modificar.php";
							$titulo="MODIFICAR EMPRESA";
							$fecha=$row['fecha'];
							$nombre=$row['nombre'];
							$rif=$row['rif'];
							$direccion=$row['direccion'];
							$telefono=$row['telefono'];
						}
					}
				?>

				<form action="backend/empresas/<?php echo $destino ?>" method="post">
					<input type="hidden" name="id" value="<?php echo $id?>">
					<div class="card text-center ">
						<div class="card-header bg-secondary text-white border-bottom-info">
							<b><?php echo $titulo ?></b>
						</div>
						
						<div class="card-body">

							<div class="form-group row mt-2">
									<!--  el for--> 
									<label for="nombre" class="col-4 col-form-label"><b>Nombre</b></label>
									<div class="col-6">
										<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" required>
									</div>
								</div>
								
							<div class="form-group row">
									<!--  el for--> 
									<label for="direccion" class="col-4 col-form-label"><b>Direccion</b></label>
									<div class="col-6">
										<textarea type="text" class="form-control" id="direccion" name="direccion"  required><?php echo $direccion ?></textarea>
									</div>
							</div>
								
							<div class="form-group row">
									<!--  el for--> 
									<label for="rif" class="col-4 col-form-label"><b>RIF</b></label>
									<div class="col-6">
										<input type="text" class="form-control" id="rif" name="rif" value="<?php echo $rif ?>" pattern="^([VEJPGvejpg]{1})-([0-9]{8})-([0-9]{1}$)" title="Ejemplo: J-12345678-1" minlength="12" maxlength="12"   required>
									</div>
							</div>						  

						  <div class="form-group row">
						  
							<label for="fecha" class="col-4 col-form-label"><b>Fecha</b></label>
							<div class="col-6">
								<!-- <input type="text" id="datepicker" name="date" class="iconfa-calendar" value=""> -->
								<!--<input type="text" id="datepickor" class="form-control" value="">-->
								<input type="text"  class="form-control" id="datepickor" name="fecha" value="<?php echo $fecha ?>" placeholder="aa/mm/dd" required>
							</div>
						  </div>					
							
							<div class="form-group row">
									<!--  el for--> 
									<label for="telefono" class="col-4 col-form-label"><b>Teléfono</b></label>
									<div class="col-6">
										<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono ?>" onkeypress="return validar(event)" required>
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
							<?php if(isset($_GET['id'])){ ?>
								<a href="sistema.php?pag=emp" class="btn btn-dark border-bottom-danger">Cancelar</a>
							<?php } else { ?> 
								<button type="reset"   class="btn btn-dark border-bottom-danger ">Cancelar</button>
							<?php } ?>

							<button type="submit"   class="btn btn-dark border-bottom-success"><?php echo $tituloboton ?></button>
						</div> <!-- cierre botones card-footer-->				  
						
					</div> <!-- cierre div para el border del formulario card text-center -->

				</form>
			</div>
			  
          <!-- DataTale  -->
        	<div class="card shadow mb-4 col-12">
            	<div class="card-header py-3 bg-secondary border-bottom-info">
              		<h6 class="m-0 font-weight-bold text-white">Informacion de la Empresa</h6>
            	</div>
            	<div class="card-body">
              		<div class="table-responsive">
                		<table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
							<thead>
								<tr class="bg-secondary text-white">
									<th scope="col">ID</th>
									<th scope="col">Nombre</th>
									<th scope="col">RIF</th>
									<th scope="col">Direccion</th>
									<th scope="col">Teléfono</th>
									<th scope="col">Fecha</th>
									<th scope="col">Acciones</th>
								</tr>
							</thead>
						
							<tbody> 
								<?php
									$wsqli="SELECT empresas.idempresa, empresas.nombre as ne, empresas.rif as rif, empresas.direccion as ed, empresas.telefono as et, empresas.fecha as fe from empresas";
									$result = $linki->query($wsqli);
									if($linki->errno) die($linki->error);
									while($row = $result->fetch_array()){
										$id=$row['idempresa'];
										$nom=$row['ne'];
										$rif=$row['rif'];
										//aqui no se si esto va.. pero lo coloque para probar guiandome de
										// frmMarcas del curso.
										$dire=$row['ed'];
										$tele=$row['et'];
								?>
								<tr>
									<td><?php echo $row['idempresa']?></td>
									<td><?php echo $row['ne']?></td>
									<td><?php echo $row['rif']?></td>
									<td><?php echo $row['ed']?></td>
									<td><?php echo $row['et']?></td>
									<td><?php echo $row['fe']?></td>
									<td>
										<a href="sistema.php?pag=emp&id=<?php echo $id ?>" class="btn btn-dark border-bottom-success btn-sm ">Modificar</a>
										<!--<a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
										title="<?php //echo '<center>Seguro que desea eliminar este registro:<h5>'.$nom.'</h5><center>' ?>" 
										href="backend/empresas/eliminar.php?id=<?php //echo $id ?>">Eliminar</a>-->
									</td>
								</tr>
								<?php } ?>
				 			</tbody> 
						</table>
            	</div>
        	</div>
        </div> <!-- FIN DATA TABLE-->
    </div> <!-- DIV DEL ROW PRINCIPAL-->
</div> <!-- /.container-fluid -->

