        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="justify-content-between mb-4">
			  
            <h1 class="h3 mb-1 text-gray-800 text-teal ">Tablero</h1>
			  
			<div class="d-sm-flex align-items-center justify-content-end mb-4">
				
			 <a href="sistema.php?pag=pim" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-1"><i class="fas fa-download fa-sm text-white-50"></i> Primera Impresión</a> 
				
			<a href="sistema.php?pag=rec" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-1"><i class="fas fa-download fa-sm text-white-50"></i> Recomendaciones Finales</a> 
				
            <a href="sistema.php?pag=fia" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
			  </div>
          </div>
    <!-- ATAJOS RAPIDOS -->
			<!--
		 <div class="row no-gutters align-items-center mb-4 shadow"> 
			<div class="col-12 ">
				<div class="card ">
					<div class="card-body">
						<div class="row">
							<!--
							<?php //include_once("config/conexi.php")
							
							?>-->
							<!-- DOCUMENTOS -->
			<!--
							<div class="col-xs-6 col-md-3 text-center">

								<input type="text" value="50" class="circle" data-width="100" data-height="100" data-fgColor="#000CF9">
								
								<div class="mt-1">
								<a href="#" class="font-weight-bold text-primary text-uppercase mt-1 ">Documentos <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div><!-- CIERRE DOCUMENTOS -->

							  <!-- HALLAZGOS -->
			<!--
							<div class="col-xs-6 col-md-3 text-center">
							 <input type="text" value="12" class="circle" data-width="100" data-height="100"  data-fgColor="#00F93B">
								
								<div class="mt-1">	
							 <a href="#" class="font-weight-bold text-success text-uppercase mt-1">Hallazgos <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>	<!-- CIERRE HALLAZGOS-->

							  <!-- USUARIOS REGISTRADOS -->
			<!--
							<div class="col-xs-6 col-md-3   text-center">
								<!--<?php 
									//$idusuario="";
									//$wsqli="SELECT COUNT(*) as usuarios from usuarios";
									//$result = $linki->query($wsqli);
									//if($linki->errno) die($linki->error);
									//if($row=$result->fetch_array()){
										//$idusuario=$row['usuarios'];
								
										//}
								
								?>-->
			<!--
								
							  <input type="text" value="<?php// echo $idusuario ?>" class="circle" data-width="100" data-height="100"  data-fgColor="#00E5F9">
								
								<div class="mt-1">
							  <a href="#" class="font-weight-bold text-info text-uppercase mt-1">USUARIOS REGISTRADOS <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>	<!-- CIERRE USUARIOS REGISTRADOS -->			  

							<!-- AUDITORIAS -->
			<!--
							<div class="col-xs-6 col-md-3  text-center">
								<!--<?php 
									//$idauditoria="";
									//$wsqli="SELECT COUNT(*) as auditorias from auditoria";
									//$result = $linki->query($wsqli);
									//if($linki->errno) die($linki->error);
									//if($row=$result->fetch_array()){
										//$idauditoria=$row['auditorias'];
								
										//}
								
								?>	-->							
				<!--				
							 <input type="text" value="<?php //echo $idauditoria?>" class="circle" data-width="100" data-height="100"  data-fgColor="#F9000F">
								<div class="mt-1">
							 <a href="#" class="font-weight-bold text-danger text-uppercase mt-1">Auditorias <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div><!--CIERRE AUDITORIAS -->			  
						
				<!--		
						</div>
					</div>
		  			<!--<div class="row no-gutters align-items-center mb-4"></div>-->
			<!--
				</div>
		 	</div> <!-- cierre segundo div -->
			<!--
		</div> 	<!-- cierre row DE ATAJOS RAPIDOS -->
			
          <!-- Content Row -->
			<!--  SEGUNDO ATAJOS RAPIDOS-->
          <div class="row">

	
            <!-- Documentos -->
            <div class="col-xl-3 6 mb-4">
              <div class="card border-left-primary  shadow h-100 py-2"> 
                <div class="card-body">
					
                  <div class="row no-gutters align-items-center"> 
					  
                    <div class="col mr-2">
						
						<div class="text-center">
							<?php 
									$idfile="";
									$wsqli="SELECT COUNT(*) as documentos from file";
									$result = $linki->query($wsqli);
									if($linki->errno) die($linki->error);
									if($row=$result->fetch_array()){
										$idfile=$row['documentos'];
								
										}
								
							?>
							
						  <input type="text" value="<?php echo $idfile?>" class="circle" data-width="70" data-height="70" data-fgColor="#000CF9">

						  <div class="knob-label font-weight-bold text-primary text-uppercase mt-2">Documentos</div>
						</div>
						
                      <!--<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Documentos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>	 -->
						
                    </div>
					  
					  <!-- ICONO -->
                    <!--<div class="col-auto">
                      <i class="fas fa-file fa-4x "></i>
                    </div> -->
					  
                  </div>
					
                </div> <!-- cierre body -->
				  <a href="sistema.php?pag=my" class="text-center">Más Información  <i class="fa fa-arrow-circle-right"></i></a>
              </div>	
            </div> <!-- CIERRE DEL FICHERO -->

            <!-- Hallazgos -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success  shadow h-100 py-2"> 
                <div class="card-body">
                  <div class="row no-gutters align-items-center"> 
                    <div class="col mr-2">
						
						<div class="text-center">
							<?php 
								$folder="";
								$wsqli="SELECT COUNT(folder_id) as hallazgos from file
								WHERE folder_id=3";
								$result = $linki->query($wsqli);
								if($linki->errno) die($linki->error);
								if($row=$result->fetch_array()){
									$folder=$row['hallazgos'];

									}

							?>					
						  <input type="text" value="<?php echo $folder?>" class="circle" data-width="70" data-height="70"  data-fgColor="#00F93B"  >

						  <div class="knob-label font-weight-bold text-success text-uppercase mt-2">Hallazgos</div>
						</div>
						
						
                      <!--<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Hallazgos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>	-->
                    </div>
					  <!-- ICONO -->
                    <!--<div class="col-auto">
                      <i class="fas fa-lightbulb fa-4x "></i>
                    </div>-->
                  </div>
                </div> <!-- cierre body -->
				  <a href="sistema.php?pag=my&folder=kURAsw-HP1mM" class="text-success text-center">Más Información  <i class="fa fa-arrow-circle-right"></i></a>
              </div>	
            </div>

            <!-- Usuarios -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2"> 
                <div class="card-body">
                  <div class="row no-gutters align-items-center"> 
                    <div class="col mr-2">
						
						<div class="text-center">
								<?php 
									$idusuario="";
									$wsqli="SELECT COUNT(*) as usuarios from usuarios";
									$result = $linki->query($wsqli);
									if($linki->errno) die($linki->error);
									if($row=$result->fetch_array()){
										$idusuario=$row['usuarios'];
								
										}
								
								?>							
							
						  <input type="text" value="<?php echo $idusuario ?>" class="circle" data-width="70" data-height="70"  data-fgColor="#00E5F9"  >

						  <div class="knob-label font-weight-bold text-info text-uppercase mt-2">USUARIOS REGISTRADOS</div>
						</div>
						
                      <!--<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Usuarios Registrados</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">10</div> -->
						
						
                    </div>
					  <!-- ICONO -->
                    <!--<div class="col-auto">
                      <i class="fas fa-user fa-4x "></i>
                    </div>-->
                  </div>
                </div> <!-- cierre body -->
				  
				  <?php 
				  	$idt = $_SESSION['idt'];
					if($idt == "1"){?>
				  		<a href="sistema.php?pag=usu" class="text-info text-center">Más Información  <i class="fa fa-arrow-circle-right"></i></a>
				  <?php 
					} elseif($idt == "2"){?>
					 <a href="sistema.php?pag=verusu" class="text-info text-center">Más Información  <i class="fa fa-arrow-circle-right"></i></a>
				  <?php
					}
				  ?>

              </div>	
            </div>			  
			  
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
						
						<div class="text-center">
								<?php 
									$idauditoria="";
									$wsqli="SELECT COUNT(*) as auditorias from auditoria";
									$result = $linki->query($wsqli);
									if($linki->errno) die($linki->error);
									if($row=$result->fetch_array()){
										$idauditoria=$row['auditorias'];
								
										}
								
								?>								
							
						  <input type="text" value="<?php echo $idauditoria ?>" class="circle" data-width="70" data-height="70"  data-fgColor="#F9000F"  >

						  <div class="knob-label font-weight-bold text-danger text-uppercase mt-2">Auditorías</div>
						</div>
						  
                       <!-- <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div> -->
						
                      </div>
                    </div>
					
                   <!-- <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div> -->
					
                  </div>
				  	<a href="sistema.php?pag=audi" class="text-danger text-center">Más Información  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div> <!-- CIERRE SEGUNDO ATAJO RAPIDO-->

			  
			  
          </div> <!-- CIERRE CONTAINER FLUID-->

		
<!--##########################################################################################################-->

          <!-- Content Row -->
<div>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a href="#tablero" class="nav-link active" role="tab" data-toggle="tab">Tablero</a>
  </li>
  <li class="nav-item">
    <a href="#graficas" class="nav-link" role="tab" data-toggle="tab">Gráfica</a>
  </li>
  <!--<li class="nav-item">
    <a class="nav-link" href="#" data-toggle="tab">Encuesta</a>
  </li> -->
</ul>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active"  id="tablero"><?php require_once("frontend/tabUno.php") ?></div>
		<div role="tabpanel" class="tab-pane"  id="graficas"><?php require_once("frontend/tabDos.php")?></div>
		<!--<div role="tabpanel" class="tab-pane active" id="tablero"></div>-->
	
	</div>
</div>
