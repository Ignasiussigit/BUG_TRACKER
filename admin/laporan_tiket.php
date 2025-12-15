<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan Tiket</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Filter Laporan Tiket</h3>
          </div>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">
                <div class="col-md-3">

                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>
                </div>

                <div class="col-md-2">

                  <div class="form-group">
                    <input style="margin-top: 26px" type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Data Tiket</h3>
          </div>
          <div class="box-body">

            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
              $tgl_dari = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['tanggal_dari']));
              $tgl_sampai = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['tanggal_sampai']));              
              ?>

              <div class="row">
                <div class="col-lg-6">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">DARI TANGGAL</th>
                      <th width="1%">:</th>
                      <td><?php echo $tgl_dari; ?></td>
                    </tr>
                    <tr>
                      <th>SAMPAI TANGGAL</th>
                      <th>:</th>
                      <td><?php echo $tgl_sampai; ?></td>
                    </tr>                    
                  </table>
                  
                </div>
              </div>

              <!-- <a href="laporan_penjualan_pdf.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a> -->
              <a href="laporan_tiket_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-file-excel-o"></i> &nbsp PRINT</a>
              <div class="table-responsive">

                <table class="table table-bordered table-striped" id="table-datatable">
                  <thead>
                    <tr>                                        
                      <th width="1%">NO</th>                    
                      <th>NOMOR TIKET</th>                    
                      <th>TANGGAL PENGAJUAN</th>                    
                      <th>TANGGAL PENYELESAIAN</th>                    
                      <th>URGENCY</th>                                        
                      <th>JUDUL</th>                                        
                      <th>STATUS</th>        
                      <th>TINDAKAN</th>        
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $no=1;
                    $data = mysqli_query($koneksi,"SELECT * FROM pengaduan, user where pengaduan_user=user_id and date(pengaduan_tanggal)>='$tgl_dari' and date(pengaduan_tanggal)<='$tgl_sampai' order by pengaduan_tanggal desc");          
                  
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
                      <td><?php echo $d['pengaduan_keterangan_selesai'] ?></td>


                    </tr>
                    <?php
                   

                  }
                  ?>
                </tbody>                
              </table>



            </div>

            <?php 
          }else{
            ?>

            <div class="alert alert-info text-center">
              Silahkan Filter Laporan Terlebih Dulu.
            </div>

            <?php
          }
          ?>

        </div>
      </div>
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>