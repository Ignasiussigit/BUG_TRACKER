
    <footer>
       <!-- <div class="bg-white py-5 border">
            <div class="container">
                <div class="row justify-content-center text-center">
                  <a class="navbar-brand mb-3" href="index.php"><img style="height:70px; width:70px" src="gambar/sistem/logo.png" alt=""></a> <br>                  

                </div>
            </div>
        </div> -->
        <!-- <br> -->
        <br>
        <nav class=" bg-white border shadow-sm p-3 bawah">
            <h3 class="text-center m-0 small fw-semibold">&copy; RS.St.Elisabeth Bekasi</a></h3>
        </nav>
    </footer>

    <!-- Js Plugins -->
    <script src="assets2/js/jquery.min.js"></script>
    <script src="assets2/js/popper.min.js"></script>
    <script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets2/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<!-- <script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</body>






<script>
  $(document).ready(function(){



    $('#table-datatable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      "pageLength": 50
    });

    $('#table-datatable-produk').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      "pageLength": 10
    });


  });




</script>


</html>