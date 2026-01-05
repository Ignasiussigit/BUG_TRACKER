<!DOCTYPE html>
<html>
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../gambar/sistem/logo.png">
  <title>TIKET-DEVELOPER </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php   
  include '../koneksi.php';
  session_start();
  if($_SESSION['status'] != "teknisi_logedin"){
    header("location:../login.php?alert=belum_login");
  }
  ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<!-- notif teknisi -->
   <audio id="notifSound" preload="auto">
    <source src="../assets/sound/voice.mp3" type="audio/mpeg">
  </audio>
<!-- akhir notif teknisi -->
 
  <div class="wrapper">

    <header class="main-header">
      <a href="index.php" class="logo">
        <span class="logo-mini"><b>BUG TRACKER </b> </span>
        <span class="logo-lg"><b>BUG TRACKER </b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">


            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php 
                $id = $_SESSION['id'];
                $profil = mysqli_query($koneksi,"select * from admin where admin_id='$id'");
                $profil = mysqli_fetch_assoc($profil);
                if($profil['admin_foto'] == ""){ 
                  ?>
                  <img src="../gambar/sistem/user.png" class="user-image">
                <?php }else{ ?>
                  <img src="../gambar/user/<?php echo $profil['admin_foto'] ?>" class="user-image">
                <?php } ?>
                <span class="hidden-xs"><?php echo $profil['admin_nama']; ?> - Teknisi</span>
              </a>
            </li>

            <li class="dropdown messages-menu">
              <?php 
              $pengaduan = mysqli_query($koneksi,"select * from pengaduan where pengaduan_status='Open' or pengaduan_status='Pending'");
              ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-globe"></i>
                <span class="label label-danger"><?php echo mysqli_num_rows($pengaduan) ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Anda Memiliki <?php echo mysqli_num_rows($pengaduan)  ?> Tiket Layanan</li>
                <li>

                  <ul class="menu">
                    <?php 
                    while($da = mysqli_fetch_array($pengaduan)){
                      ?>
                      <li>
                        <a href="tiket.php">                                              
                          <p><?php echo $da['pengaduan_judul'] ?> | <?php echo $da['pengaduan_status'] ?></p>
                        </a>
                      </li>
                      <?php
                    }
                    ?>                   
                  </ul>
                </li>
                <li class="footer"><a href="tiket.php">Lihat Semua</a></li>
              </ul>
            </li>          
            <li>
              <a href="logout.php"><i class="fa fa-sign-out"></i> LOGOUT</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <?php            
            if($profil['admin_foto'] == ""){ 
              ?>
              <img src="../gambar/sistem/user.png" class="img-circle">
            <?php }else{ ?>
              <img src="../gambar/user/<?php echo $profil['admin_foto'] ?>" class="img-circle" style="max-height:45px">
            <?php } ?>
          </div>
          <div class="pull-left info">
            <p><?php echo $profil['admin_nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li>
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
            </a>
          </li>

          <li>
            <a href="ruangan.php">
              <i class="fa fa-folder"></i> <span>TAMBAH RUANGAN</span>
            </a>
          </li>

          <li>
            <a href="tiket.php">
              <i class="fa fa-calendar"></i> <span>TIKET</span>
            </a>
          </li>


          <li>
            <a href="gantipassword.php">
              <i class="fa fa-lock"></i> <span>GANTI PASSWORD</span>
            </a>
          </li>





          <li>
            <a href="logout.php">
              <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
            </a>
          </li>
          
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
