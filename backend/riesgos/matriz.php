<?php //require_once("../storage/riesgos/vistas/parte_superior.php") ?>
<link rel="stylesheet" href="css/estilos.css">
 <div class="container-fluid">


 	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Matriz de Riesgo</h1>
     </div>

    <?php
          	
    		$id="";
    		$x="";
    		$y="";
          	if(isset($_GET['id'])){

					$id=$_GET['id'];
					$wsqli="SELECT probabilidad.valor as vp, impacto.valor as vi from nivel_riesgo INNER JOIN probabilidad ON nivel_riesgo.idprobabilidad=probabilidad.idprobabilidad INNER JOIN impacto ON nivel_riesgo.idimpacto=impacto.idimpacto WHERE idnivelriesgo='$id' ";
					$result = $linki->query($wsqli);
					
				
					if($linki->errno) die($linki->error);
				 	if($row=$result->fetch_array()){
						$x=$row['vp'];
						$y=$row['vi'];

						//echo($x);
						//echo($y);

						$listado = array(  
				    //  Se accede a los elementos como: [índice][clave]

				    1 =>  array( 1 => 1, 2=> 2,  3=> 3,  4=> 4,   5=> 5),
				    2 =>  array( 1 => 2, 2=> 4,  3=> 6,  4=> 8,   5=> 10),
				    3 =>  array( 1 => 3, 2=> 6,  3=> 9,  4=> 12,  5=> 15),
				    4 =>  array( 1 => 4, 2=> 8,  3=> 12, 4=> 16,  5=> 20),
				    5 =>  array( 1 => 5, 2=> 10, 3=> 15, 4=> 20,  5=> 25),
				     );
				     ?>
	<table class="matriz">
     

    
    
    
    
				  <?php
				  //for para imprimir la matriz
				  $verifica=false;
				  
				    for ($i=1; $i <6; $i++) { ?>
				  <tr > 
				      <?php for ($j=1; $j <6 ; $j++) { ?>
				        
				  <td>
				  	

				      <?php 


				      if ($i==$x) { //si el valor se encuentra en la matriz imprimir
				               if ($j==$y) { ?>
				                <?php if ($listado[$i][$j]<=4) { ?>
				                    <div class="nivel_riesgo_bajo">
				                      
				                      <?php   echo $listado[$i][$j] ;
				                      $nivel='BAJO';
				                      $texto='El nivel de riesgo es '.$nivel.' es un nivel aceptable para la organizacion';
				                       ?>

				                    </div>
				                      
				                     
				                    
				                   
				             <?php 
				             	$fila=$i; //obtengo la posicion de la fila
				                 $columna=$j; //obtengo la posicion de la columna
				                 $verifica=true;
				                 $resultado= $listado[$i][$j];

				                 

				              }elseif ($listado[$i][$j]<=9) { ?>
				              	  <div class="nivel_riesgo_medio">
				                      
				                      <?php   echo $listado[$i][$j] ;
				                      $nivel='MODERADO';
				                       $texto='El nivel de riesgo es '.$nivel.' se puede reducir o aceptar el riesgo';
				                       ?>

				                    </div>
				                      
				            
				                   
				                    
				                    
				                   
				             <?php

				             	 
				               }elseif ($listado[$i][$j]<=16) { ?>
				            		 <div class="nivel_riesgo_alto">
				                      
				                      <?php   echo $listado[$i][$j] ;
				                      $nivel='ALTO';
				                       $texto='El nivel de riesgo es '.$nivel.' se recomienda aplicar controles para reducir el nivel de riesgo';
				                       ?>

				                    </div>

				              
				                   
				             <?php  }elseif ($listado[$i][$j]>16) { ?>
				              
				                 <div class="nivel_riesgo_extremo">
				                      
				                      <?php   echo $listado[$i][$j] ; 
				                      $nivel='EXTREMO';
				                       $texto='ALERTA!! .. SE REQUIERE DE MAXIMA PRIORIDAD. El nivel de riesgo es '.$nivel.' es necesario aplicar controles para reducir el nivel de riesgo';
				                      ?>

				                    </div>

			 
				                
				                      
				                     
				                    
				                   
				             <?php  }



				             $resultado= $listado[$i][$j];
				             $wsqli2="UPDATE nivel_riesgo 
				             SET riesgo='$nivel'
				             WHERE idnivelriesgo='$id'";
				             $result2 = $linki->query($wsqli2);
							if($linki->errno) die($linki->error);
				             ?>
				            



				           <?php 


				               }else{ //si no se encuentra imprimir 0
											//-------------------------------------IMPRIME LOS COLORES DE LA CELDA
				             if ($listado[$i][$j]<=4) { ?>
				                    <div class="nivel_bajo">
				                      
				                      <?php   echo $listado[$i][$j] ;
				                       
				                       ?>
				                       
				                    </div>
				                      
				                     
				       
				            <?php  }elseif ($listado[$i][$j]<=9) { ?>
				              	  <div class="nivel_medio">
				                      
				                      <?php   echo $listado[$i][$j] ;
				                  
				                       ?>

				                    </div>
				                      
				            
				                   
				                    
				                    
				                   
				             <?php

				             	 
				               }elseif ($listado[$i][$j]<=16) { ?>
				            		 <div class="nivel_alto">
				                      
				                      <?php   echo $listado[$i][$j] ;
				                    
				                       ?>

				                    </div>

				              
				                   
				             <?php  }elseif ($listado[$i][$j]>16) { ?>
				              
				                 <div class="nivel_extremo">
				                      
				                      <?php   echo $listado[$i][$j] ; 
				                      
				                      ?>

				                    </div>

			 
				                
				                      
				                     
				                    
				                   
				             <?php  }  
				           }
				               
				               
				           
				              
				            
				           }else{ //si no se encuentra imprimir 0
				           			//-----------------------------------------IMPRIME LOS COLORES DE LA CELDA
				       
            				 if ($listado[$i][$j]<=4) { ?>
				                    <div class="nivel_bajo">
				                      
				                      <?php   echo   $listado[$i][$j];
				                       
				                       ?>
				                       
				                    </div>
				                      
				                     
				       
				            <?php  }elseif ($listado[$i][$j]<=9) { ?>
				              	  <div class="nivel_medio">
				                      
				                      <?php   echo $listado[$i][$j] ;
				                
				                       ?>

				                    </div>
				                      
				            
				                   
				                    
				                    
				                   
				             <?php

				             	 
				               } elseif ($listado[$i][$j]<=16) { ?>
				            		 <div class="nivel_alto">
				                      
				                      <?php   echo $listado[$i][$j] ;
				                     
				                       ?>

				                    </div>

				              
				                   
				             <?php  }elseif ($listado[$i][$j]>16) { ?>
				              
				                 <div class="nivel_extremo">
				                      
				                      <?php   echo $listado[$i][$j] ; 
				                    
				                      ?>

				                    </div>

			 
				                
				                      
				                     
				                    
				                   
				             <?php  } 
				           } ?>
				  </td> 
				        
				  <?php      } ?>
				  </tr> 


				  <?php    }

				    

				   

				   
				  ?>



		<tr>
						       
		    <th>Insignificante</th>
		    <th>Menor</th>
		    <th>Serio</th>
		    <th>Desastroso</th>
		    <th>Catastrofico</th>
		

 

		</tr>

	
				 

	</table>

						 
						   
		 				 
	<table class="criterio_p" >
						   
		<tr class="criterio_p1"><th class="criterio_p1" >Muy Improbable</th></tr>
 	    <th class="criterio_p2">Improbable</th>
		<tr class="criterio_p3"><th class="criterio_p3" >Posible</th></tr>			     
     	<th class="criterio_p4" >Muy probable</th>
		<tr class="criterio_p5"><th class="criterio_p5">Casi Seguro</th></tr>
		<th class="criterio_p6" > </th>
						   

	</table> 

						 
	<table class="leyenda">
						   
	  <tr  class="leyenda_titulo">	    
	  <th class="leyenda_titulo">Leyenda</th>
	  </tr>
      <td class="leyenda_bajo">Bajo</td>
      <tr class="leyenda_moderado"><td class="leyenda_moderado">Moderado</td></tr>
      <td class="leyenda_alto">Alto</td>
      <tr class="leyenda_extremo"><td class="leyenda_extremo">Extremo</td></tr>

    </table>
						 
    		<!-- Button trigger modal -->
<div class="col text-center ">
<button type="button" class="btn btn-info mt-1" data-toggle="modal" data-target="#exampleModal">
  Mas informacion
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mas informacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $texto;  ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

			<?php	} ?>
			<?php	} ?>
	 
 </div>


 