
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="gambar/sistem/logo.png">
    <title>Helpdesk</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="bg-gray">
  <div class="container">
    <div class="login-box">

      <center>      
        <br/>
        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "gagal"){
            echo "<div class='alert alert-danger'><b>DAFTAR GAGAL</b><br> Username Sudah Terdaftar</div>";
          } 
        }
        ?>
      </center>

      <div class="login-box-body">
        <br>
        <h4 class="text-center login-box-msg text-bold">
          DAFTAR BUG TRACKER <br> RS.ST.ELISABETH BEKASI
        </h4>        

        <p class="text-bold">DAFTAR USER</p>

        <form action="daftar_user_act.php" method="POST">

          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="nama" name="nama" required="required" autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <select class="form-control" name="departemen" required>
              <option value="">-Pilih Bagian-</option>
              <option value="RAJAL-POLI UMUM">RAJAL-POLI UMUM</option>
              <option value="RAJAL-POLI SPESIALIS">RAJAL-POLI SPESIALIS</option>
              <option value="RANAP">RANAP</option>
              <option value="UGD">UGD</option>
              <option value="LABORATORIUM">LABORATORIUM</option>
              <option value="RADIOLOGI">RADIOLOGI</option>
              <option value="FISIOTERAPI">FISIOTERAPI</option>
              <option value="FARMASI">FARMASI</option>
              <option value="KEBIDANAN">KEBIDANAN</option>
              <option value="REKAM MEDIK">REKAM MEDIK</option>
              <option value="CASEMIX">CASEMIX</option>
            </select>
          </div>

          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username" required="required" autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>


          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>


          <div class="row">
            <div class="col-lg-12">
              <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-check"></i> &nbsp; DAFTAR</button> 
              <a class="btn btn-success btn-block" href="login_user.php"><i class="fa fa-user"></i> &nbsp; LOGIN</a>            
              <a class="btn btn-danger btn-block" href="index.php"><i class="fa fa-arrow-left"></i> &nbsp; KEMBALI</a>            
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>


  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
