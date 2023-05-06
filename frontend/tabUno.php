<div class="row">

  <div class="col-xl-6 col-lg-7 ">
      <div class="card shadow mb-4">
      <div class="col-12">
      <form name="form1">
          <select class="form-control-inline" name="idempresa" onChange="crearM(this.value)">
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
                <select class="form-control-inline" name="idauditoria">
                    <option value="-1">Seleccione</option>
                </select>
                <input type="submit"  value="Enviar">
         

      </form>
          </div>
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
      
          <?php include_once("grafica1.php") ?>
      </div>
    </div>
  </div>

  
  
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
          
                <!-- Card Header - Dropdown -->
                                      <!-- py-3 d-flex flex-row align-items-center justify-content-between -->
                <div class="card-header ">
                  <h6 class="m-0 font-weight-bold text-primary">Grafica de Comparación</h6>
                   <form name="form2">
                        <select class="form-control-inline" name="idempresa2" onChange="crearM3(this.value), crearM2(this.value)">
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
                        <select class="form-control-inline" name="idauditoria1">
                            <option value="-1">Seleccione</option>
                        </select>
                        <select class="form-control-inline" name="idauditoria2">
                            <option value="-1">Seleccione</option>
                        </select>
                        <input type="submit"  value="Enviar">
                    </form>

                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
                          
                          <?php include_once("grafico.php") ?>
                      </div>
                   
            
                </div>

                <!-- Card Body -->

                <!--<div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>-->





              </div>
            </div>

            





          </div>

