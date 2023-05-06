<!<!DOCTYPE html>
<html>
<head>
	<title>Matriz</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

 

 <?php
    /*  $gente= array(
           array('nombre' => 'Luis', 'edad' => 14),  // $gente[0]
           array('nombre' => 'Silvia', 'edad' => 48) // $gente[1]
      );
      echo "{$gente[0]['nombre']} tiene una amiga de 
               {$gente[1]['edad']} años que se llama
               {$gente[1]['nombre']}";
 
           $gente= array(
           array('nombre' => 'Luis', 'edad' => 14),  // $gente[0]
           array('nombre' => 'Silvia', 'edad' => 48) // $gente[1]
      );
      echo "{$gente[0]['nombre']} tiene una amiga de 
               {$gente[1]['edad']} años que se llama
               {$gente[1]['nombre']}";
               echo "<br>";
               echo "<br>";
               echo "<br>";
	*/

    $encontrar= 10;  //BUSCAR EL NUMERO ASIGNADO EN LA MATRIZ
    echo 'BUSCA EN LA MATRIZ EL NUMERO => '.$encontrar.'';
	$listado = array(	
		//  Se accede a los elementos como: [índice][clave]

		'Casi Seguro'    => array( 5, 10,  15, 20, 25),
		'Muy Probable'   => array( 4,  8,  12, 16, 20),
		'Posible'        => array( 3,  6,  9,  12, 15),
		'Improbable'     => array( 2,  4,  6,  8,  10),
		'Muy Improbable' => array( 1,  2,  3,  4,  5),
	 
	);

	

 

/*
	foreach($listado as $fila)
	{
	    foreach($fila as $nombre)
	    {
		echo " $nombre ";
	    }
		
		echo "<br>";

	
		//echo $listado [0][0];
	}

*/
  ?>

  <!---- th SIRVE PARA COLOCAR EN NEGRITA EL TEXTO --->
  <!--- tr  SIRVE PARA DEFINIR FILAS--->
  <!--- td SIRVE PARA DEFINIR COLUMNAS -->
  <br>
  <table border="1">
  	
  	
  	<?php

  	//$longitud = count($listado,1); // contar el número de elementos que hay en la matriz $longitud 
	//echo($longitud);
	 
 	
 
 

  	//-------funcion foreach para nombrar los criterios de probabilidad por fila y colocarlos en negrita ------------
  	foreach ($listado as $fila => $valores) {
  		echo '<tr>';
  		echo '<th>'.$fila.'</th>';
		
		
  		
  		// funcion para imprimir y acceder a  los valores de la matrizz
  		foreach ($valores as $contenido) {
  			 
  			echo '<td>';
  			 

  		 //si el valor de la variable $encontrar existe
         if ($contenido==$encontrar) {
         	 	# code...
         	 	echo  "<font color=\"#FF000C\">".$contenido."</font><p>" ;
         	 	$posicioncontenido = array_search( $valores, $listado );
         	 	//	echo "La posición con la función array_search() es: <font color=\"#FF0000\">".$posicioncontenido."</font><p>";

  	 	 	 
         	 }else{
         	 	echo '0';
         	 }

  	 echo '</td>'; 

  		}

  	 

 		 echo "<br>";

  		echo '</tr>';

	
  		
  	}//fin foreach

 	
  
   //echo $listado [$posicioncontenido][4];
    //echo $listado[$posicioncontenido][2];echo "<br>";
  	?>


  	<tr>
  		<th></th>
  		<th>Insignificante</th>
  		<th>Menor</th>
  		<th>Serio</th>
  		<th>Desastroso</th>
  		<th>Catastrofico</th>
  	</tr>


  </table>







</body>
</html>



