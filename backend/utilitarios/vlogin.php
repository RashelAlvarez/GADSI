<?php

  if(isset($_SESSION['noexiste'])){
    echo "<div class='alert alert-danger'> ".$_SESSION['noexiste']."</div>";  
    unset($_SESSION['noexiste']); //para borrar el mensaje cuando recargues la pagina
  }

  if(isset($_SESSION['cuentainactiva'])){
    echo "<div class='alert alert-warning'> ".$_SESSION['cuentainactiva']."</div>";  
    unset($_SESSION['cuentainactiva']); //para borrar el mensaje cuando recargues la pagina
    
  }
        
?>