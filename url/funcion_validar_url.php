<?php	
	$valor = $_POST['variable_input'];
    function filtroUrl($valor){
        if(trim($valor) == ''){
			echo 'No has introducido ningun valor<br>';
            return false;
        }else{
            if (!filter_var($valor, FILTER_VALIDATE_URL)) {
				echo 'La direccion introducida no es valida<br>';
                return false;
            }
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$valor)) {
				echo 'La direccion introducida no es valida<br>';
                return false;
            }else{
				echo 'Direccion valida<br>';
                return true;
            }
        }
    }
	if (!filtroUrl($valor)) {	
        echo 'URL incorrecta';
	}else {
		echo 'La URL '.$valor.' es correcta';
	}		
?>
