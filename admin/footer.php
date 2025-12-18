
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0
  </div>
  <strong>&copy; <?php echo date('Y'); ?></strong> - RS.St.Elisabeth Bekasi
</footer>




</div>


<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>

<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../assets/bower_components/raphael/raphael.min.js"></script>
<script src="../assets/bower_components/morris.js/morris.min.js"></script>

<script src="../assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>


<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="../assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

<script src="../assets/bower_components/moment/min/moment.min.js"></script>
<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>

<script src="../assets/dist/js/adminlte.min.js"></script>

<script src="../assets/dist/js/pages/dashboard.js"></script>

<script src="../assets/dist/js/demo.js"></script>
<script src="../assets/bower_components/ckeditor/ckeditor.js"></script>


<?php
include '../koneksi.php';
$tahun_ini = date('Y');     
?>

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

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
    }).datepicker("setDate", new Date());

    $('.datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd',
    });

  });

  
   let audioUnlocked = false;
  const sound = document.getElementById('notifSound');

  function unlockAudio(){
    if(audioUnlocked) return;

    sound.play().then(()=>{
      sound.pause();
      sound.currentTime = 0;
      audioUnlocked = true;
      console.log('🔓 Audio unlocked');
    }).catch(()=>{});
  }

  // cukup 1x klik / tekan keyboard
  document.addEventListener('click', unlockAudio, { once:true });
  document.addEventListener('keydown', unlockAudio, { once:true });

  /* =============================
     🔔 NOTIF AJAX
  ============================== */
  let lastTotal = null;

  function cekNotif(){
    $.ajax({
      url: 'cek_notif.php',
      type: 'GET',
      success: function(res){

        let total = parseInt(res);

        // update badge
        $('.messages-menu .label-danger').text(total);
        $('.messages-menu .header')
          .text('Anda Memiliki ' + total + ' Tiket Layanan');

        // load pertama → jangan bunyi
        if(lastTotal === null){
          lastTotal = total;
          return;
        }

        // tiket baru → bunyi 1x
        if(total > lastTotal && audioUnlocked){
          sound.currentTime = 0;
          sound.play().catch(()=>{});
        }

        lastTotal = total;
      }
    });
  }

  // cek pertama kali
  cekNotif();

  // cek tiap 5 detik
  setInterval(cekNotif, 5000);

  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  



</script>
</body>
</html>
