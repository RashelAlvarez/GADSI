<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
          </div>

       <div class="row">	

		<div class="card shadow mb-4 col-12">
            <div class="card-header py-3 bg-secondary border-bottom-info">
              <h6 class="m-0 font-weight-bold text-white">Usuarios Registrados</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
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
								
								$idusuario=$row['idusu'];
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

						<!--<a class="btn btn-dark border-bottom-danger btn-sm eliminar_dato" 
					  title="<?php //echo '<center>Seguro que desea eliminar este registro:<h4>'.$nom.' '.$ape.'</h4><center>' ?>" 
					  href="backend/usuarios/eliminar.php?id=<?php //echo $id ?>">Eliminar</a>-->

					  
      	 
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