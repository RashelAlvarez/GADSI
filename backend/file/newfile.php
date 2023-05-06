<?php //require_once("vistas/parte_superior.php") ?>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
 <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
 
 <?php 
               
                $destino="agregar.php";
               
                 
                 
                $filename="";
                $description="";
                $is_public="";
             
                $idusuario="";  
                
                $created_at="";
                $idempresa="";
                $idauditoria="";
                 
                $id="";
                if(isset($_GET['id'])){

                    $id=$_GET['id'];
                    $wsqli="select * from file where idfile='$id' ";
                    $result = $linki->query($wsqli);
                    if($linki->errno) die($linki->error);
                    if($row=$result->fetch_array()){ //se debe colocar aca dentro, para evitar que el usuario coloque en el link un ID diferente.
                       // $tituloboton="Modificar";
                       // $destino="modificar.php";
                      //  $titulo="MODIFICAR ACTIVO";
                        
                        $filename=$row['filename'];
                        
                        $description=$row['description'];
                        $is_public=$row['is_public'];
                        
                        $idusuario=$row['user_id'];
                      
                        $created_at=$row['created_at'];
                        $idempresa=$row['idempresa'];
                        $idauditoria=$row['idauditoria'];
                         
                    }
                }


                ?>

<!--<?php


  /*  $my_user_id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from user where id=$my_user_id");
    while ($row=mysqli_fetch_array($query)) {
        $fullname = $row['fullname'];
        $email = $row['email'];
        $profile_pic = $row['image'];
        $created_at = $row['created_at'];
    }*/
?>-->


<?php
   // $folders = mysqli_query($con, "select * from file where user_id=$my_user_id and is_folder=1 and folder_id is NULL order by created_at desc");
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
 <div class="row"> <!-- NUEVO-->
	 <div class="col-md-6 offset-3 mb-5"> <!--  NUEVO -->
 
    <!--<div class="content-wrapper">--> <!-- Content Wrapper. Contains page content -->
        <!--<section class="content-header">--><!-- Content Header (Page header) -->
            <!--<h1>Nuevo Archivo</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Nuevo Archivo</li>
            </ol>
        </section>-->
		 
		<div class="card text-center "> <!--  NUEVO -->
			
        <!--<section class="content">--><!-- Main content -->
            <!--<div class="row"> --><!-- Small boxes (Stat box) -->
                <!--<div class="col-md-6 col-md-offset-3">-->
                    <!--<div class="box box-primary">--> <!-- general form elements -->
						
                        <div class="card-header bg-secondary text-white border-bottom-info"> <!--  NUEVO -->
                            <h5 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Cargar Nueva Evidencia</h5>
                        </div><!-- /.box-header -->
						
						
                        <form name="form1" role="form" action="backend/file/<?php echo $destino ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $id?>"><!-- form start -->
                            <div class="card-body">
							<?php  
                                if(isset($_SESSION['mensaje'])){
                                    if($_SESSION['tm']==1){
                                    
                                        echo "<h6 class='alert alert-success text-center'> ".$_SESSION['mensaje']."</h6>"; 
                                    }
                                    
                                   
                                    unset($_SESSION['mensaje']);  //al actualizar la pagina se borra el mensaje 
                                }

                      
                            ?>
                            <hr>
                          
                                <label class="text-center">Seleccione la empresa y la fecha de auditoria en caso de ingresar evidencias.
                                </label>
                          
                            <hr>
                        <div class="form-group row">
                          <!--  el for--> 
                            

                            <label for="Auditoria" class="col-4 col-form-label">Empresa</label>
                            <div class="col-6">
                                <select class="form-control" name="idempresa" onChange="crearM(this.value)">
                                    <option value="-1">Seleccione</option>
                                
                                 <?php 

                                    $wsqli="select * from empresas order by nombre";
                                    $result = $linki->query($wsqli);
                                    if($linki->errno) die($linki->error);
                                    while($row = $result->fetch_array()){   
                                    
                                ?>
                                <option value="<?php echo $row['idempresa'] ?>" ><?php echo $row['nombre'] ?></option>
                                <?php }?>
                                    
                                </select>
                                 

                            </div>
                      </div>
                     
                     <div class="form-group row">
                      <!--  el for--> 
                        <label for="fecha" class="col-4 col-form-label">Fecha</label>
                        <div class="col-6">
                            <select class="form-control" name="idauditoria">
                                <option value="-1">Seleccione</option>
                            </select>
                        </div>
                      </div>



                                <div class="form-group row">
                                    <label>Descripción del hallazgo</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Escriba la descripción de la evidencia" value="<?php echo $description ?>" required></textarea>
                                </div>
								
                                <div class="form-group row">
									
                                    <label>Carpeta</label>
                                    <select class="form-control" name="folder_id" required>
                                     
                                       <?php include_once("backend/combos/folder.php")    ?>
                                    </select>
                                </div>
								<!-- 
                                <div class="form-group">
                                    <span class="btn btn-my-button btn-file" style="width: 100%; margin-top: 5px;">
                                        Selecionar Archivo<input type="file" name="filename">
                                    </span>
                                </div> 
								-->
			<!-- DESDE ACA VIENE EL EROR DEL CONSTRUCTOR-->					
                                
                                <div class="form-group">
                                    <span class="btn btn-my-button btn-file" style="width: 100%; margin-top: 5px;">
                                        Selecionar Archivo<input type="file" name="filename" required>
                                    </span>
                                </div>
								
                                <div class="form-group">
                                    <div class="checkbox icheck">
                                       <!-- <label>
                                            <input type="checkbox" name="is_public" value="<?php //echo $is_public ?>"> &nbsp;Archivo Publico
                                        </label>-->
                                    </div>
                                </div>
								
                            </div><!-- /.box-body -->
							
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Subir archivo</button>
                            </div>


                 
							
                        </form>
			
			
                    <!--</div>--><!-- /.box -->
                <!--</div>-->
           <!-- </div> -->  <!-- /.row -->
       <!-- </section> -->
    <!--</div>--><!-- /.content -->
			
			
			
		 </div> <!--card --> 
	 </div> <!-- cierre col-7-->
</div><!-- CIERRE DIV CLASS ROW -->
<!-- <script src="js/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<script src="js/plugins/iCheck/icheck.js"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
            });
          });
        </script>
<?php //require_once("vistas/parte_inferior.php") ?>
