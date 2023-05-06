 
<?php //require_once("vistas/parte_superior.php") ;
  
?> 

<?php 

$file = null;
//$idusuario=""; //esto no estaba
 
if(isset($_GET["code"]) && $_GET["code"]!=""){
 
     $id=$_GET["code"];
    $file= mysqli_query($linki,"SELECT * from file where code=\"$id\"");
	 

    while ($row=mysqli_fetch_array($file)) {
        $file_id=$row['idfile'];
        $is_public=$row['is_public'];
        $idusuario=$row['user_id'];//esto lo cambie por 'user_id'
        $code=$row['code'];
        $filename=$row['filename'];
        $description=$row['description'];
        $created_at=$row['created_at'];
        $folder_id=$row['folder_id'];
       

    }
}


?>
 
<div class="row"> <!--row nuevo-->
    <div class="col-md-6 offset-3 mb-5 card text-center">
         
            <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
                <section class="content-header"><!-- Content Header (Page header) -->
                    <div class="card-header bg-secondary text-white border-bottom-info"> <!--  NUEVO -->
                    <h4>Archivo <small><?php //echo $filename;?></small> </h4>
                    </div>
                    <?php if(isset($_SESSION["idu"])):?>
                    <ol class="breadcrumb">
                        
                               
                        <?php
                            if($folder_id!=null){
                                $f = mysqli_query($linki,"select * from file where idfile=$folder_id");

                                    while ($g=mysqli_fetch_array($f)) {
                                        $f_code=$g['code'];
                                        $f_filename=$g['filename'];
                                    }

                                    echo '<li class="active"><a href="sistema.php?pag=my&folder='.$f_code.'"><i class="fa fa-folder-open"></i> '.$f_filename.'</a></li>';
                            }
                        ?>
                    </ol>
                    <?php endif; ?>
                </section>
                <section class="content"><!-- Main content -->
                    <div class="row"><!-- Small boxes (Stat box) -->
                        <div class="col-lg-12">
                            <div class=" btn-group  pull-right mt-4 mr-2 mb-2">  <!------ BOTON DE DESCARGA---- -->
                                <a href="backend/file/dwnfl.php?code=<?php echo $code;?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar</a>
                            </div>

                            <script>
                                function copiarAlPortapapeles(id_elemento) {
                                var aux = document.createElement("input");
                                aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
                                document.body.appendChild(aux);
                                aux.select();
                                document.execCommand("copy");
                                document.body.removeChild(aux);
                                }

                            </script>
                            <?php
                              // $url=$_SERVER["HTTP_HOST"]."/belbox/file.php?code=".$_GET['code'];

                            ?>
                           <!-- <div  class="btn-group  pull-right mt-4 mr-2 mb-2">
                               <input type="hidden" value="<?php echo $url?>" id="copy">
                                <p style="display: none;" id="copy"><?php echo $url?></p>
                                <a onclick="copiarAlPortapapeles('copy')" class="btn btn-default"><i class="fa fa-link"></i> Copiar enlace</a>                           
                            </div> -->  <!------ BOTON DE COPIAR LINK---- -->
                                <br>
                            <?php if($file==null):?>
                            <h1>404</h1>
                            <?php else:?>
                                <br>
                            <div class="nombre_archivo">
                                <?php echo '<b>Evidencia encontrada:</b> '.$filename;?> 
                            </div>
                            <?php endif;?>
                           <br><br><p><?php echo '<b>Descripcion del hallazgo: </b>'.$description; ?></p><br>
                           <p class="text-muted text-right"><i class="fa fa-clock"></i> <?php echo 'Archivo publicado: '. $created_at;?></p>
                            <br><br>
                            <?php 

                                $comments = mysqli_query($linki, "select * from comment where file_id=".$file_id);
                                $count=mysqli_num_rows($comments);
                                ?>
                                
                            <div class="box box-success"><!-- small box -->
                                <div class="box-header col-md-6">
                                    <i class="fa fa-comments"></i>
                                    <h3 class="box-title">Comentarios (<?php echo $count?>)</h3>
                                </div>
                                <?php if($count>0):?>
                                <div class="box-body chat col-md-8" id="chat-box">
                                    <div class="item"><!-- chat item -->
                                    <?php foreach($comments as $com): ?>
                                        <?php

                                        $com_user_id=$com['user_id'];
                                        $commm=mysqli_query($linki,"select * from comment where user_id=$com_user_id");
                                        while ($usi=mysqli_fetch_array($commm)) {
                                            $userd=$usi['user_id'];

                                        }
                                        $userss=mysqli_query($linki,"select * from usuarios where idusuario=$userd");
                                            while($com2=mysqli_fetch_array($userss)){
                                                $profile_pic=$com2['image'];
                                                $fullname=$com2['correo'];
                                            }
                                        ?>
                                        <div class="col-md-6">
                                            <img src="img/profiles/<?php echo $profile_pic; ?>" alt="user image" class="offline" width="40">
                                        </div>
                                        
                                        <p class="message">
                                                <small class="text-muted pull-right"><i class="fa fa-clock"></i> <!-- 5:15 --><?php echo $com['created_at'];?></small>
                                            <a href="#" class="name">
                                                <?php echo $fullname;  ?>
                                            </a>
                                            <?php echo $com['comment'];?>
                                        </p>
                                       <?php endforeach; ?> 
                                    </div><!-- /.item -->
                                </div><!-- /.chat -->
                               <?php endif;?> 
                                <div class="box-footer">
                                <form method="post" action="backend/file/addfilecomment.php">
                                    <div class="input-group">
                                        <input type="hidden" value="<?php echo $file_id?>" name="id">
                                        <input name="comment" required class="form-control" placeholder="Escribe un comentario...">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-comments"></i></button>
                                        </div>
                                    </div>
                                   </form> 
                                </div>
                            </div>

                        <?php if($file!=null):?>

                        <?php else:?>
                            <div class="jumbotron">
                            <h2>No hay archivos</h2>
                            <p>No se encontraron archivos en la carpeta actual.</p>
                            </div>
                        <?php endif;?>


                            
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                </section>
            </div><!-- /.content -->
    
  </div><!-- <div class="col-md-6 offset-3 mb-5"> -->
</div> <!-- CIERRE DIV CLASS ROW-->

<?php //require_once("vistas/parte_inferior.php") ?>