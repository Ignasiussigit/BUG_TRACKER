                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <!DOCTYPE html>
<html>
<head>  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BUG TRACKER</title>  
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
            echo "<div class='alert alert-danger'><b>LOGIN GAGAL</b><br> Username dan password tidak sesuai</div>";
          }else if($_GET['alert'] == "logout"){
            echo "<div class='alert alert-success'><b>TERIMA KASIH</b><br> Anda telah logout</div>";
          }else if($_GET['alert'] == "belum_login"){
            echo "<div class='alert alert-warning'>Silahkan login terlebih dulu</div>";
          } 
        }
        ?>
      </center>

      <div class="login-box-body">
        <br>
        <center>
          <img src="gambar/sistem/logo.png" style="width: 160px">
        </center>

        <br>
        <h4 class="text-center login-box-msg text-bold">
          BUG TRACKER   
        </h4>        

        <p class="text-bold">LOGIN ADMIN & TEKNISI</p>

        <form action="login_act.php" method="POST">

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
              <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-lock"></i> &nbsp; MASUK</button> 
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
