<?php //require_once("vistas/parte_superior.php") ?>
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
 <div class="row"> 
	<div class="col-md-6 offset-3 mb-5"> 
	 <div class="card text-center">
	 
    <!--<div class="content-wrapper">--><!-- Content Wrapper. Contains page content -->
		
        <!--<section class="content-header">--><!-- Content Header (Page header) -->
            <!--<h1>Nueva Carpeta</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Nueva Carpeta</li>
            </ol>
        </section>-->
		
        <!--<section class="content">--><!-- Main content -->
            <!--<div class="row">--><!-- Small boxes (Stat box) -->
                <!--<div class="col-md-6 col-md-offset-3">-->
                    <!--<div class="box box-primary">--><!-- general form elements -->

            <?php 
               
                $destino="agregar.php";
               
                 
                 
                $filename="";
                $description="";
                $is_public="";
             
                $idusuario="";  
                
                $created_at="";

                 
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
                        
                         
                    }
                }


                ?>
					
                        <div class="card-header bg-secondary text-white border-bottom-info">

                            <h5 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Nueva Carpeta</h5>
                        </div><!-- /.box-header -->
					
                        <form role="form" action="backend/folder/<?php echo $destino ?>" method="post" enctype="multipart/form-data"><!-- form start -->
                            <input type="hidden" name="id" value="<?php echo $id?>">
							<!-- card-body PARA QUE ME CENTRE LAS COSAS  -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="filename" class="form-control" id="filename" placeholder="Nombre de la carpeta" value="<?php echo $filename ?>" required>
                                </div>
                                <div class="form-group row">
                                    <label>Descripción</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Descripción ..." value="<?php echo $description ?>" required></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox" name="is_public" value="<?php echo $is_public ?>"> &nbsp;Archivo Publico
                                        </label>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
							
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Crear Carpeta</button>
                            </div>
                        </form>
                  <!--</div>--><!-- /.box -->
                <!--</div>-->
            <!--</div>--><!-- /.row -->
        <!--</section>-->
    <!--</div>--><!-- /.content -->
		 
		 
		</div> <!-- CIERRE CARD-->
	 </div> <!--col-7 offset-3 mb-5 -->
</div>  <!-- cierre div row principal -->
<?php require_once("vistas/parte_inferior.php") ?>