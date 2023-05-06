<!-- Content Row -->
<div class="row">

  <div class="col-lg-12 mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Grafica de Progreso</h6>
        </div>  
    </div>
  </div>

  <div class="container col-lg-12">
    <div class="gantt-container" style="overflow: auto;">
      <svg id="gantt"></svg>
    </div>
  </div>
	
</div>

<script type="text/javascript">
<?php 
  $fecha_actual = date("Y-m-d H:i:s");

  $query = "SELECT idauditoria as id, empresas.nombre as nomb, fechai, fechaf, descripcion from auditoria
  INNER JOIN empresas on auditoria.idempresa=empresas.idempresa";
  $result = $linki->query($query);
  if($linki->errno) die($linki->error);
?>
var tasks = [
  <?php foreach($result as $row){ 

    echo "{
        id :'" . $row['id'] . "',
        name : '" . "Auditoría N° " .$row['id']."- ". $row['nomb'] . "',
        start :'" .  $row['fechai'] . "',
        end :'" . $row['fechaf'] . "',
        progress :'',
        dependencies :'',
        custom_class :'',
        color: '#1B76BB',
        bgColor: '#1B76BB',
        
    },";
  }
  ?>
];

$(document).ready(function(){
  var gantt_chart = new Gantt("#gantt", tasks);
  // var gantt_chart = new Gantt("#gantt", tasks, {
  //   custom_popup_html: function (task){
  //     const end_date = task._end.format('D MMM');
  //     return `
  //       <div class="details-container">
  //         <h5>${task.name}</h5>
  //         <p>Expected to finish by ${end_date}</p>
  //         <p>${task.progress}% completed!</p>
  //       </div>
  //     `;
  //   },
  //   on_click: function(task){
  //     console.log(task);
  //   },
  //   on_date_change: function(task, start, end){
  //     console.log(task, start, end);
  //   },
  //   on_progress_change: function(task, progress){
  //     console.log(task, progress);
  //   },
  //   on_view_change: function(mode){
  //     console.log(mode);
  //   }
  // });

  // $(".btn-group").on(
  //   "click", "button", function(){
  //     $btn = $(this);
  //     var mode = $btn.text();
  //     gantt_chart.change_view_mode(mode);
  //     $btn.parent().find('button').removeClass('active');
  //     $btn.addClass('active');
  //   }
  // );

  gantt_chart.change_view_mode('Month');
});

</script>
