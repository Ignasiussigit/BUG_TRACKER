<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tiket
      <small>Data Tiket</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tiket</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">


        <div class="box box-success">

          <div class="box-header">
            <!-- <h3 class="box-title">Tiket</h3>  -->

            <!-- <div class="pull-left" style="width:250px">
              <div class="form-group" style="display: flex;">
                <label>Filter Unit</label>
                <select class="form-control" id="filterUnit">
                  <option value="">Semua Unit</option>
                  <option value="RAJAL-POLI SPESIALIS">RAJAL-POLI SPESIALIS</option>
                  <option value="RAJAL-POLI UMUM">RAJAL-POLI UMUM</option>
                  <option value="RANAP">RANAP</option>
                  <option value="LABORATORIUM">LABORATORIUM</option>
                  <option value="RADIOLOGI">RADIOLOGI</option>
                  <option value="FISIOTERAPI">FISIOTERAPI</option>
                  <option value="FARMASI">FARMASI</option>
                  <option value="KEBIDANAN">KEBIDANAN</option>
                  <option value="GIZI">GIZI</option>
                </select>
              </div>
            </div> -->
            
            <div class="pull-left" style="width:250px; margin-right:5px;">
              <div class="form-group">
                <label>Filter Unit</label>
                <select class="form-control" id="filterUnit">
                  <option value="">== Semua Unit ==</option>
                        <option value="RAJAL-POLI SPESIALIS">RAJAL-POLI SPESIALIS</option>
                          <option value="RAJAL-POLI UMUM">RAJAL-POLI UMUM</option>
                          <option value="RANAP">RANAP</option>
                          <option value="IGD">IGD</option>
                          <option value="OK">OK</option>
                          <option value="HD">HD</option>
                          <option value="LABORATORIUM">LABORATORIUM</option>
                          <option value="RADIOLOGI">RADIOLOGI</option>
                          <option value="FISIOTERAPI">FISOTERAPI</option>
                          <option value="FARMASI">FARMASI</option>
                          <option value="KEBIDANAN">KEBIDANAN</option>
                          <option value="KEUANGAN">KEUANGAN</option>
                          <option value="ADMINISTRASI">ADMINISTRASI</option>
                          <option value="BAGIAN-UMUN">BAGIAN-UMUN</option>
                          <option value="CASEMIX">CASEMIX</option>
                          <option value="REKAM-MEDIK">REKAM-MEDIK</option>
                          <option value="GIZI">GIZI</option>
                </select>
              </div>
            </div>

            <div class="pull-left" style="width:250px; margin-right:5px;">
              <div class="form-group">
                <label>Filter Status</label>
                <select class="form-control" id="filterStatus">
                  <option value="">== Semua Status ==</option>
                  <option value="Open">Open</option>
                  <option value="Pending">Pending</option>
                  <option value="Progress">Progress</option>
                  <option value="Close">Close</option>
                </select>
              </div>
            </div>

            <div class="pull-left" style="width:250px">
              <div class="form-group">
                <label>Filter Urgency</label>
                <select class="form-control" id="filterUrgency">
                  <option value="">== Semua Urgency ==</option>
                  <option value="High">High</option>
                  <option value="Medium">Medium</option>
                  <option value="Low">Low</option>
                </select>
              </div>
            </div>
         
          </div>

          <div class="box-body">
           
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <!-- jika ingin memunculkan search/pencarian bisa buka komentar th dan di bagian footer.php(teknisi) bisa dibuka juka komentar-nya -->
                  <tr>
                    <th width="1%">NO</th>
                    <th>NOMOR TIKET</th>                    
                    <th>TANGGAL PENGAJUAN</th>                    
                    <th>TANGGAL PENYELESAIAN</th> 
                    <th>DEVELOPER</th>                   
                    <th>URGENCY</th>                                        
                    <th>JUDUL</th>
                    <th>UNIT</th>    
                    <th>STATUS </th>                
                    <th width="12%">UPDATE</th>
                    <th>&nbsp;</th>                                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;                  
                  // $data = mysqli_query($koneksi,"SELECT * FROM pengaduan, user where pengaduan_user=user_id order by pengaduan_tanggal desc");
                  $data = mysqli_query($koneksi,"
                    SELECT 
                      p.*,
                      u.user_nama,
                      a.admin_nama
                    FROM pengaduan p
                    JOIN user u ON p.pengaduan_user = u.user_id
                    LEFT JOIN admin a ON p.pengaduan_teknisi = a.admin_id
                    ORDER BY p.pengaduan_tanggal DESC
                  ");

                  while($d = mysqli_fetch_array($data)){                    
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>                      
                      <td><?php echo $d['pengaduan_nomor']; ?></td>                    
                      <td><?php echo date('d-m-Y h:i:s', strtotime($d['pengaduan_tanggal'])); ?></td>                    
                      <td><?php if($d['pengaduan_tanggal_penyelesaian']!=""){echo date('d-m-Y h:i:s', strtotime($d['pengaduan_tanggal_penyelesaian']));}else{}  ?></td>
                      
                      <!-- TEKNISI -->
                        <td>
                          <?php
                          echo $d['admin_nama'] ? $d['admin_nama'] : '<i>Belum ditangani</i>';
                          ?>
                        </td>

                        <td><?php 
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
                        } ?></td>
                        <td>
                          <?php echo $d['pengaduan_judul']; ?>
                        </td>

                        <td>
                          <?php echo $d['pengaduan_email']; ?>
                        </td>
                        
                                   
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
                      <td>
                       <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#updateStatus<?php echo $d['pengaduan_id'] ?>">
                        <i class="fa fa-edit"></i> Update Status
                      </button>
                        
                         <!-- Modal Update Status -->
                         <form action="tiket_status.php" method="post">
                          <div class="modal fade" id="updateStatus<?php echo $d['pengaduan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <h5 class="modal-title">Update Status Tiket</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                                <div class="modal-body">
                                  <input type="hidden" name="id" value="<?php echo $d['pengaduan_id']; ?>">

                                  <div class="form-group" style="width: 100%;">
                                    <label style="width: 100%;">Status</label>
                                    <select name="status" style="width: 100%;" class="form-control" required>
                                      <option value="">- Pilih Status -</option>
                                      <option value="Open" <?php if($d['pengaduan_status']=="Open"){echo "selected";} ?>>Open</option>
                                      <option value="Pending" <?php if($d['pengaduan_status']=="Pending"){echo "selected";} ?>>Pending</option>
                                      <option value="Progress" <?php if($d['pengaduan_status']=="Progress"){echo "selected";} ?>>Progress</option>
                                      <option value="Close" <?php if($d['pengaduan_status']=="Close"){echo "selected";} ?>>Close</option>
                                    </select>
                                  </div>

                                  <div class="form-group" style="width: 100%;">
                                    <label style="width: 100%;">Keterangan</label>
                                    <textarea name="keterangan_status" style="width: 100%;" class="form-control" rows="3" placeholder="Keterangan status..."><?php echo $d['pengaduan_keterangan_selesai']; ?></textarea>
                                  </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                              </div>
                            </div>
                          </div>
                        </form>

                      </td>
                      <td>
                       

                         <a href="tiket_detail.php?id=<?php echo $d['pengaduan_id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a>

                         <!-- modal hapus -->
                         <div class="modal fade" id="hapusTiket<?php echo $d['pengaduan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                              </div>
                              <div class="modal-body">

                                <p>Apakah Anda akan menghapus tiket ini  ?</p>                                

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <a class="btn btn-danger btn-sm" href="tiket_hapus.php?id=<?php echo $d['pengaduan_id'] ?>"><i class="fa fa-check"></i> Ya, Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>


                        <form action="tiket_update.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="editTiket<?php echo $d['pengaduan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Tiket </h5>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group" style="width:100%">
                                  <label>Judul <small style="color:red">*</small> </label>
                                   <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['pengaduan_id']; ?>"> 
                                  <input type="text" name="judul" style="width:100%" value="<?php echo $d['pengaduan_judul'] ?>" required="required" class="form-control">
                                </div>  
                                <div class="form-group" style="width:100%">
                                  <label>Keterangan <small style="color:red">*</small> </label>
                                  <textarea class="form-control" style="width:100%" name="keterangan" placeholder="Keterangan"><?php echo $d['pengaduan_keterangan'] ?></textarea>
                                 
                                </div>                   

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <button type="submit"  class="btn btn-primary">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>




                        
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
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>