<?php
session_start();
include '../koneksi.php';

$id = $_GET['id'];

$chat = mysqli_query($koneksi,"
  SELECT c.*, u.user_nama, u.user_foto, a.admin_nama, a.admin_foto
  FROM pengaduan_chat c
  LEFT JOIN user u ON c.pc_user = u.user_id AND c.pc_level='User'
  LEFT JOIN admin a ON c.pc_user = a.admin_id AND c.pc_level='Teknisi'
  WHERE c.pc_pengaduan='$id'
  ORDER BY c.pc_waktu ASC
");

while($c = mysqli_fetch_assoc($chat)){
?>

<?php if($c['pc_level']=="User"){ ?>
<div class="direct-chat-msg">
  <div class="direct-chat-info clearfix">
    <span class="direct-chat-name pull-left"><?= $c['user_nama']; ?></span>
    <span class="direct-chat-timestamp pull-right">
      <?= date('d-m-Y H:i:s', strtotime($c['pc_waktu'])); ?>
    </span>
  </div>
<!-- bawah ini poto user -->
  <img class="direct-chat-img"
       src="../gambar/user/519881351_user.png">

  <div class="direct-chat-text">
    <?= nl2br(htmlspecialchars($c['pc_isi'])); ?>

    <?php if($c['pc_user'] == $_SESSION['id']){ ?>
        <a href="tiket_pesan_hapus.php?id=<?= $c['pc_id']; ?>"
        class="pull-right text-danger"
        style="margin-left:10px">x</a>
    <?php } ?>
</div>

</div>

<?php } else { ?>
<div class="direct-chat-msg right">
  <div class="direct-chat-info clearfix">
    <span class="direct-chat-name pull-right"><?= $c['admin_nama']; ?></span>
    <span class="direct-chat-timestamp pull-left">
      <?= date('d-m-Y H:i:s', strtotime($c['pc_waktu'])); ?>
    </span>
  </div>

<!-- bawah ini poto teknisi -->
  <img class="direct-chat-img"src="../gambar/user/519881351_user.png">

  <div class="direct-chat-text">
    <?= nl2br(htmlspecialchars($c['pc_isi'])); ?>
  </div>
</div>
<?php } ?>

<?php } ?>
