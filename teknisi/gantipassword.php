<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Ganti Password
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-4 col-lg-offset-4">

        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "sukses"){
            echo "<div class='alert alert-success'>Password berhasil diganti!</div>";
          }elseif ($_GET['alert']=="gagal") {
            echo "<div class='alert alert-danger'>Password Lama Anda tidak sesuai</div>";
          }elseif ($_GET['alert']=="gagal_konfirmasi") {
            echo "<div class='alert alert-danger'>Password baru dan Konfirmasi Password Tidak sesuai</div>";
          }
        }
        ?>

        <div class="box box-success">

          <div class="box-header">
            <h3 class="box-title">Ganti Password</h3>
          </div>
          <div class="box-body">
            <form action="gantipassword_act.php" method="post">
              <div class="form-group">
                <label>Masukkan Password Lama</label>
                <input type="password" class="form-control" placeholder="Masukkan Password Lama .." name="password_lama" required="required" min="5">
              </div>
              <div class="form-group">
                <label>Masukkan Password Baru</label>
                <input type="password" class="form-control" placeholder="Masukkan Password Baru .." name="password_baru" required="required" min="5">
              </div>
               <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="password" class="form-control" placeholder="Konfirmasi Password Baru .." name="konfirmasi_baru" required="required" min="5">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
              </div>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>