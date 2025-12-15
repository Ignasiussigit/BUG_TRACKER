<?php include 'header.php'; ?>

<div class="content-wrapper">


  <!-- menu kotak -->

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">        
       <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $admin = mysqli_query($koneksi,"select * from admin where admin_level='Admin'");            
            ?>
            <h3 style="font-weight: bolder"><?php echo mysqli_num_rows($admin) ?></h3>
            <p>Jumlah admin</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="admin.php" class="small-box-footer">Info Lengkap <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-teal">
          <div class="inner">
            <?php 
            $teknisi = mysqli_query($koneksi,"select * from admin where admin_level='Teknisi'");  
            $p = mysqli_fetch_assoc($teknisi);
            ?>
            <h3 style="font-weight: bolder"><?php echo mysqli_num_rows($teknisi); ?></h3>
            <p>Jumlah teknisi</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="teknisi.php" class="small-box-footer">Info Lengkap <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $user = mysqli_query($koneksi,"select * from user");
            $p = mysqli_fetch_assoc($user);
            ?>
            <h3 style="font-weight: bolder"><?php echo mysqli_num_rows($user); ?></h3>
            <p>Jumlah user</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="user.php" class="small-box-footer">Info Lengkap <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <?php 
            $helpdesk = mysqli_query($koneksi,"select * from pengaduan");
            $p = mysqli_fetch_assoc($helpdesk);
            ?>
            <h3 style="font-weight: bolder"><?php echo mysqli_num_rows($helpdesk); ?></h3>
            <p>Jumlah Tiket</p>
          </div>
          <div class="icon">
            <i class="ion ion-clipboard"></i>
          </div>
          <a href="tiket.php" class="small-box-footer">Info Lengkap <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </section>

  </div>

  
  <div class="row">
    <section class="col-lg-12">
     <div class="col-xs-12 col-md-12">
      <div class="box box-success">
       <div class="box-header">
        <h3 class="box-title">5 Tiket Terbaru</h3>
      </div>
      <div class="box-body">

        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
               <th width="1%">NO</th>                    
               <th>NOMOR TIKET</th>                    
               <th>TANGGAL PENGAJUAN</th>                    
               <th>TANGGAL PENYELESAIAN</th>                    
               <th>URGENCY</th>                                        
               <th>JUDUL</th>                                        
               <th>STATUS</th>                   
             </tr>
           </thead>
           <tbody>
            <?php 
            $no=1;
            $data = mysqli_query($koneksi,"SELECT * FROM pengaduan order by pengaduan_tanggal desc LIMIT 5");
            while($d = mysqli_fetch_array($data)){                    
              ?>
              <tr>
                <td><?php echo $no++; ?></td>                      
                <td><?php echo $d['pengaduan_nomor']; ?></td>                    
                <td><?php echo date('d-m-Y h:i:s', strtotime($d['pengaduan_tanggal'])); ?></td>                    
                <td><?php if($d['pengaduan_tanggal_penyelesaian']!=""){echo date('d-m-Y h:i:s', strtotime($d['pengaduan_tanggal_penyelesaian']));}else{}  ?></td>   
                <td>
                  <?php 
                  if($d['pengaduan_urgency']=="High"){
                    ?>
                    <span class="label label-danger"><?php echo $d['pengaduan_urgency'] ?></span>
                    <?php
                  }elseif ($d['pengaduan_urgency']=="Medium") {
                    ?>
                    <span class="label label-warning"><?php echo $d['pengaduan_urgency'] ?></span>
                    <?php
                  }elseif ($d['pengaduan_urgency']=="Low") {
                    ?>
                    <span class="label label-success"><?php echo $d['pengaduan_urgency'] ?></span>
                    <?php
                  }
                  ?>

                </td>                  
                <td><?php echo $d['pengaduan_judul']; ?></td>                    
                <td>
                  <?php 
                  if($d['pengaduan_status']=="Open"){
                    ?>
                    <span class="label label-danger"><?php echo $d['pengaduan_status'] ?></span>
                    <?php
                  }elseif ($d['pengaduan_status']=="Pending") {
                    ?>
                    <span class="label label-warning"><?php echo $d['pengaduan_status'] ?></span>
                    <?php
                  }elseif ($d['pengaduan_status']=="Progress") {
                    ?>
                    <span class="label label-primary"><?php echo $d['pengaduan_status'] ?></span>
                    <?php
                  }elseif ($d['pengaduan_status']=="Close") {
                    ?>
                    <span class="label label-success"><?php echo $d['pengaduan_status'] ?></span>
                    <?php
                  }
                  ?>

                </td>                    

              </tr>
              <?php

            }
            ?>
          </tbody>               
        </table>
      </div>
    </div>

  </div>

</div>



</section>
</div>
</section>

</div>





<?php include 'footer.php'; ?>