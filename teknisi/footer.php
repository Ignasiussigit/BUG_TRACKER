
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

<style>
  /* efek highlight tiket baru */
  .row-new {
    animation: newRowFlash 2.5s ease-in-out;
  }

  @keyframes newRowFlash {
    0%   { background-color: #fff3cd; } /* kuning muda */
    100% { background-color: transparent; }
  }
</style>

<?php
include '../koneksi.php';
$tahun_ini = date('Y');     
?>

<script>
  $(document).ready(function(){
// jika ingin memunculkan search/pencarian bisa buka komentar th di bagian tiket.php(teknisi) bisa dibuka juka komentar-nya
    $('#table-datatable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      "pageLength": 50
    });

  // untuk menampilkan notifikasi suara pada teknisi
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


  document.addEventListener('click', unlockAudio, { once:true });
  document.addEventListener('keydown', unlockAudio, { once:true });

  let lastTotal = null;

  function cekNotif(){
    $.ajax({
      url: 'cek_notif.php',
      type: 'GET',
      success: function(res){

        let total = parseInt(res);

        $('.messages-menu .label-danger').text(total);
        $('.messages-menu .header')
          .text('Anda Memiliki ' + total + ' Tiket Layanan');

        if(lastTotal === null){
          lastTotal = total;
          return;
        }

        if(total > lastTotal && audioUnlocked){
          sound.currentTime = 0;
          sound.play().catch(()=>{});
        }

        lastTotal = total;
      }
    });
  }
  cekNotif();
  setInterval(cekNotif, 5000);
  // akhir notifikasi suara pada teknisi
  
// fungsinya untuk filter unit pada tabel tiket teknisi
    $('#filterUnit').on('change', function () {
    var unit = $(this).val().toLowerCase();

    $('#table-datatable tbody tr').each(function () {
      var rowUnit = $(this).find('td:eq(7)').text().trim().toLowerCase();

      if (unit === '' || rowUnit === unit) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  // fungsinya untuk filter Status (Open,Pending,Progress,Close)
    $('#filterStatus').on('change', function () {
    var unit = $(this).val().toLowerCase();

    $('#table-datatable tbody tr').each(function () {
      var rowUnit = $(this).find('td:eq(8)').text().trim().toLowerCase();

      if (unit === '' || rowUnit === unit) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  // fungsinya untuk filter Urgency (High, Medium, Low)
    $('#filterUrgency').on('change', function () {
    var unit = $(this).val().toLowerCase();

    $('#table-datatable tbody tr').each(function () {
      var rowUnit = $(this).find('td:eq(5)').text().trim().toLowerCase();

      if (unit === '' || rowUnit === unit) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
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

  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  
// bagain auto refresh halaman teknisi

let refreshInterval = null;
let knownTicketIds = new Set();

function loadTiket(){
  let unit    = $('#filterUnit').val();
  let status  = $('#filterStatus').val();
  let urgency = $('#filterUrgency').val();
  let dari    = $('#filterTanggalDari').val();
  let sampai  = $('#filterTanggalSampai').val();

  $.ajax({
    url: 'tiket_ajax.php',
    type: 'GET',
    data: { unit, status, urgency, dari, sampai },
    success: function(html){

      let $temp = $('<tbody>' + html + '</tbody>');
      let newIds = [];

      $temp.find('tr[data-id]').each(function(){
        let id = $(this).attr('data-id');
        if(id && !knownTicketIds.has(id)){
          newIds.push(id);
        }
      });

      $('#tiketBody').html($temp.html());

      newIds.forEach(function(id){
        knownTicketIds.add(id);
        $('#tiketBody')
          .find('tr[data-id="'+id+'"]')
          .addClass('row-new');
      });

      $('#tiketBody').find('tr[data-id]').each(function(){
        knownTicketIds.add($(this).attr('data-id'));
      });
    }
  });
}

function startAutoRefresh(){
  if(refreshInterval === null){
    refreshInterval = setInterval(loadTiket, 5000);
  }
}

function stopAutoRefresh(){
  if(refreshInterval !== null){
    clearInterval(refreshInterval);
    refreshInterval = null;
  }
}

// ========================================
$(document).on('show.bs.modal', '.modal', stopAutoRefresh);

$(document).on('hidden.bs.modal', '.modal', startAutoRefresh);

$('#filterUnit, #filterStatus, #filterUrgency, #filterTanggalDari, #filterTanggalSampai')
  .on('change', function(){
    knownTicketIds = new Set();
    loadTiket();
});


$(document).ready(function(){
  loadTiket();
  startAutoRefresh();
});

// chat real-time 

(function(){

  // cek apakah halaman ini punya chat
  const chatBox = document.getElementById('chatBox');
  if(!chatBox) return;

  const tiketId = chatBox.dataset.tiketId;
  if(!tiketId) return;

  const formChat  = document.getElementById('formChat');
  const pesanInput = document.getElementById('pesan');

  let chatInterval = null;

  function loadChat(scroll=true){
    fetch('tiket_chat_ajax.php?id=' + tiketId)
      .then(res => res.text())
      .then(html => {
        chatBox.innerHTML = html;
        if(scroll){
          chatBox.scrollTop = chatBox.scrollHeight;
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

  // kirim pesan via ajax
  if(formChat){
    formChat.addEventListener('submit', function(e){
      e.preventDefault();

      if(!pesanInput.value.trim()) return;

      fetch('tiket_pesan.php', {
        method: 'POST',
        body: new FormData(formChat)
      }).then(() => {
        pesanInput.value = '';
        loadChat(true);
      });
    });
  }

  // pause refresh saat mengetik
  if(pesanInput){
    pesanInput.addEventListener('focus', stopChat);
    pesanInput.addEventListener('blur', startChat);
  }

  // init
  loadChat();
  startChat();

})();

</script>
</body>
</html>
