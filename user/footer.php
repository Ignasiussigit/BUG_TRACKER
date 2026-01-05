

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

<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>


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

  // PULGIN SUMMERNOTE
  
  // $(document).ready(function() {
  //   $('#summernote').summernote({
  //     placeholder: 'jelaskan permasalahannya',
  //     height: 180,
  //   });
  // });

  // $('#summernote').summernote({
  //       placeholder: 'Jelaskan permasalahan nya',
  //       tabsize: 2,
  //       height: 100
  //     });

  // SUMMERNOTE UNTUK "BUAT TIKET BARU"
  $(document).ready(function () {
  $('#summernote').summernote({
    height: 150,
    placeholder: 'Jelaskan permasalahan secara detail...',
    toolbar: [
      ['style', ['bold', 'italic', 'underline']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['color', ['color']],
      ['insert', ['link','picture']],
      ['view', ['codeview']]
    ]
  });
});

// menggunakan ini saja ketika didalam 1 codingan harus menuliskan 2 id itu tidak bisa
  // $('.summernote').summernote({
  //   height: 180,
  //   placeholder: 'Jelaskan permasalahan secara detail...',
  //   toolbar: [
  //     ['style', ['bold', 'italic', 'underline']],
  //     ['para', ['ul', 'ol', 'paragraph']],
  //     ['insert', ['link','Picture']],
  //     ['view', ['codeview']]
  //   ]
  // });

  // SUMMERNOTE UNTUK EDIT TIKET
  $('.modal').on('shown.bs.modal', function () {
    $(this).find('.summernote').each(function () {
      if (!$(this).next('.note-editor').length) {
        $(this).summernote({
          height: 150
        });
      }
    });
  });

  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  
// bagian chat real-time di tiket_detail.php (user)
let tiketId = <?= $d['pengaduan_id']; ?>;
let chatInterval = null;
let typing = false;

function loadChat(scroll=true){
  $.get('tiket_chat_ajax.php', { id: tiketId }, function(html){
    $('#chatBox').html(html);
    if(scroll){
      $('#chatBox').scrollTop($('#chatBox')[0].scrollHeight);
    }
  });
}

function startChat(){
  if(chatInterval === null){
    chatInterval = setInterval(loadChat, 3000);
  }
}

function stopChat(){
  if(chatInterval !== null){
    clearInterval(chatInterval);
    chatInterval = null;
  }
}

// submit pesan via ajax
$('#formChat').on('submit', function(e){
  e.preventDefault();

  let pesan = $('#pesan').val().trim();
  if(pesan === '') return;

  $.post('tiket_pesan.php', $(this).serialize(), function(){
    $('#pesan').val('');
    loadChat(true);
  });
});

// pause refresh saat ngetik
$('#pesan').on('focus', stopChat);
$('#pesan').on('blur', startChat);

// init
$(document).ready(function(){
  loadChat();
  startChat();
});


</script>
</body>
</html>
