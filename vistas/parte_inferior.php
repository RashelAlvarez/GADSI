	  
     </div> 

      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Rashel Alvarez y Bryan Tochon</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Estas seguro que quieres salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccionar Salir para desconectarte.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="backend/utilitarios/salir.php">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Core plugin JavaScript-->
  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/knob/jquery.knob.js"></script>
  <script>
    $(document).ready(function(){
      $(".circle").knob({
        "min":0,
        "max":100,
        "data-width":250,
        "data-height":250,
        "data-fgColor":"#e74c3c",
        "readOnly":true
        
      })
    })
  </script>
  
  <script src="js/datos/jquery.dataTables.min.js"></script>
  <script src="js/datos/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>







  <script type="text/javascript">
    $(document).ready(function(){
      $("a.eliminar_dato").click( function(e) {
        e.preventDefault();
        var url = this.href;
        var titulo = this.title;
        jConfirm(titulo,'¿Estas Seguro?', function(r) {
          if (r) 
              location.href = url;
        });
      });
    });
  </script>

  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#example').dataTable( {
        //ordering: false, me elimina el ordenamiento y la funcion de ordenar al darle clicl a los encabezados
        "order": [[ 0, "desc" ]],
        "language": {
          "sProcessing":   "Procesando...",
          "sLengthMenu":   "Mostrar _MENU_ registros",
          "sZeroRecords":  "No se encontraron resultados",
          "sInfo":         "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
          "sInfoEmpty":    "Mostrando desde 0 hasta 0 de 0 registros",
          "sInfoFiltered": "(filtrado de _MAX_ registros en total)",
          "sInfoPostFix":  "",
          "sSearch":       "Buscar:",
          "sUrl":          "",
          "oPaginate": {
            "sFirst":    "Primero",
            "sPrevious": "Anterior",
            "sNext":     "Siguiente",
            "sLast":     "Último"
          }
        }
        });
    });
  </script>

</body>

</html>
