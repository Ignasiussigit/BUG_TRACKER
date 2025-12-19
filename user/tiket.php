<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tiket Saya
      <small>Data Tiket Saya</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tiket Saya</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-success">
          
          <div class="box-header">
            <h3 class="box-title">Tiket Saya</h3> 
            <div class="btn-group pull-right">
              <div class="pull-left">  
               <button type="button" class="btn btn-primary btn-sm margin-r-5" data-toggle="modal" data-target="#exampleModal1">
                 Penjelasan
              </button>   
               <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Buat Tiket Baru
              </button>
              
              <!-- Modal -->
            <form action="tiket_act.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h5 class="modal-title" id="exampleModalLabel">Buat Tiket Baru</h5>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Urgency <small style="color:red">*</small> </label>
                        <select class="form-control" name="urgency" required>
                          <option value="">-pilih-</option>
                          <option value="High">High</option>
                          <option value="Medium">Medium</option>
                          <option value="Low">Low</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Unit-SubUnit <small style="color:red">*</small> </label>
                        <select class="form-control" name="email" required>
                          <option value="">-pilih-</option>
                          <option value="RAJAL-POLI SPESIALIS">RAJAL-POLI SPESIALIS</option>
                          <option value="RAJAL-POLI UMUM">RAJAL-POLI UMUM</option>
                          <option value="RANAP">RANAP</option>
                          <option value="LABORATORIUM">LABORATORIUM</option>
                          <option value="RADIOLOGI">RADIOLOGI</option>
                          <option value="FISIOTERAPI">FISOTERAPI</option>
                          <option value="FARMASI">FARMASI</option>
                          <option value="KEBIDANAN">KEBIDANAN</option>
                          <option value="GIZI">GIZI</option>
                        </select>
                      </div>  
                      <!-- <div class="form-group">
                        <label>Email <small style="color:red">*</small> </label>
                        <input type="email" name="email" required="required" placeholder="email@email.com" class="form-control">
                      </div> -->

                      <!-- <div class="form-group">
                        <label>Departemen <small style="color:red">*</small> </label>
                        <input type="text" name="departemen" required="required" placeholder="Ditujukan ke pada bagian (SIMRS)" class="form-control">
                      </div> -->
                      <div class="form-group">
                        <label>Departemen <small style="color:red">*</small> </label>
                        <select class="form-control" name="departement" required>
                          <option value="">-pilih-</option>
                          <option value="SIMRS">SIMRS</option>
                        </select>
                      </div>  
                      <div class="form-group">
                        <label>Judul <small style="color:red">*</small> </label>
                        <input type="text" name="judul" required="required" placeholder="Judul Tiket" class="form-control">
                      </div>  
                      <div class="form-group">
                        <label>Keterangan <small style="color:red">*</small> </label>
                        <textarea class="form-control" id="summernote" name="keterangan" placeholder="Jelaskan permasalahan-nya ..."></textarea>
                      </div> 
                      <div class="form-group">
                        <label>Gambar </label>
                        <input type="file" name="gambar" class="form-control">
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

            <!-- MODAL PENJELASAN -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title" id="exampleModalLabel">URGENCY</h4>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <button class="btn btn-danger">High</button>
                        <!-- <label>Urgency <small style="color:red"></small> </label> -->
                        <p>Masalah yang sangat kritis, biasanya mengganggu fungsi utama atau keseluruhan sistem, dan harus segera diperbaiki.</p>
                        <button class="btn btn-warning">Medium</button>
                        <p>Masalah dengan dampak sedang, tidak langsung merusak fungsi utama tetapi tetap mempengaruhi pengalaman pengguna atau kinerja sistem.</p>
                        <button class="btn btn-success">Low</button>
                        <p>Masalah kecil, biasanya terkait dengan tampilan, fitur kecil, atau masalah yang jarang terjadi dan tidak mengganggu operasi utama.Masalah minor, biasanya terkait dengan tampilan, fitur kecil, atau masalah yang jarang terjadi dan tidak mengganggu operasi utama.</p>

                        <h4 class="modal-title" id="exampleModalLabel">STATUS</h4>
                        <button class="btn btn-danger">Open</button>
                        <p>Bug baru dilaporkan dan belum ditindaklanjuti.</p>
                        <button class="btn btn-warning">Pending</button>
                        <p>Bug sedang menunggu konfirmasi atau persetujuan lebih lanjut, atau menunggu sumber daya untuk diperbaiki.</p>
                        <button class="btn btn-primary">Progress</button>
                        <p>Bug sedang dalam proses perbaikan atau penyelidikan.</p>
                        <button class="btn btn-success">Close</button>
                        <p>Bug sudah diperbaiki dan masalah telah selesai.</p>
                      </div>   
                       
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>


            </div>          
          </div>

          <div class="box-body">
           
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>                    
                    <th>NOMOR TIKET</th>                    
                    <th>TANGGAL PENGAJUAN</th>                    
                    <th>TANGGAL PENYELESAIAN</th>
                    <th>DEVELOPER</th>                    
                    <th>URGENCY</th>                                        
                    <th>JUDUL</th>                                        
                    <th>STATUS</th>                    
                    <th width="12%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $saya = $_SESSION['id'];
                  // $data = mysqli_query($koneksi,"SELECT * FROM pengaduan where pengaduan_user='$saya' order by pengaduan_tanggal desc");
                  $data = mysqli_query($koneksi,"
                    SELECT 
                      p.*,
                      a.admin_nama
                    FROM pengaduan p
                    LEFT JOIN admin a 
                      ON p.pengaduan_teknisi = a.admin_id
                    WHERE p.pengaduan_user = '$saya'
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
                        <td><?php echo $d['pengaduan_judul']; ?></td>
                          
                      <td>
                        <?php 
                        if($d['pengaduan_status']=="Open"){
                          echo '<span class="label label-danger">Open</span>';
                        }elseif($d['pengaduan_status']=="Pending"){
                          echo '<span class="label label-warning">Pending</span>';
                        }elseif($d['pengaduan_status']=="Progress"){
                          echo '<span class="label label-primary">Progress</span>';
                        }elseif($d['pengaduan_status']=="Close"){
                          echo '<span class="label label-success">Close</span>';
                        }
                        ?>

                      </td>                               
                      <td>
                        <?php 
                        if($d['pengaduan_status']=="Open" || $d['pengaduan_status']=="Open"){
                          ?>
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editTiket<?php echo $d['pengaduan_id'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>


                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusTiket<?php echo $d['pengaduan_id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          <?php
                        }
                         ?>

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

                        <!-- MODAL EDIRT -->
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
                                    <label>Urgency <small style="color:red">*</small> </label>
                                    <select class="form-control" name="urgency" style="width:100%" required>
                                      <option value="">-pilih-</option>
                                      <option <?php if($d['pengaduan_urgency']=="High"){echo "selected='selected'";} ?> value="High">High</option>
                                      <option <?php if($d['pengaduan_urgency']=="Medium"){echo "selected='selected'";} ?> value="Medium">Medium</option>
                                      <option <?php if($d['pengaduan_urgency']=="Low"){echo "selected='selected'";} ?> value="Low">Low</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Unit-SubUnit <small style="color:red">*</small> </label>
                                    <br>
                                    <select class="form-control" name="email" required>
                                      <option value="">-pilih-</option>
                                      <option <?php if($d['pengaduan_email']=="RAJAL-POLI SPESIALIS"){echo "selected='selected'";} ?> value="RAJAL-POLI SPESIALIS">RAJAL-POLI SPESIALIS</option>
                                      <option <?php if($d['pengaduan_email']=="RAJAL-POLI UMUM"){echo "selected='selected'";} ?> value="RAJAL-POLI UMUM">RAJAL-POLI UMUM</option>
                                      <option <?php if($d['pengaduan_email']=="RANAP"){echo "selected='selected'";} ?> value="RANAP">RANAP</option>
                                      <option <?php if($d['pengaduan_email']=="LABORATORIUM"){echo "selected='selected'";} ?> value="LABORATORIUM">LABORATORIUM</option>
                                      <option <?php if($d['pengaduan_email']=="RADIOLOGI"){echo "selected='selected'";} ?> value="RADIOLOGI">RADIOLOGI</option>
                                      <option <?php if($d['pengaduan_email']=="FISOTERAPI"){echo "selected='selected'";} ?> value="FISOTERAPI">FISOTERAPI</option>
                                      <option <?php if($d['pengaduan_email']=="FARMASI"){echo "selected='selected'";} ?> value="FARMASI">FARMASI</option>
                                      <option <?php if($d['pengaduan_email']=="KEBIDANAN"){echo "selected='selected'";} ?> value="KEBIDANAN">KEBIDANAN</option>
                                      <option <?php if($d['pengaduan_email']=="GIZI"){echo "selected='selected'";} ?> value="GIZI">GIZI</option>
                                    </select>
                                  </div>  
                                  <!-- <div class="form-group" style="width:100%">
                                    <label>Email <small style="color:red">*</small> </label>
                                    <input type="email" name="email" required="required" value="<?php echo $d['pengaduan_email'] ?>" style="width:100%" placeholder="email@email.com" class="form-control">
                                  </div> -->

                                  <!-- <div class="form-group" style="width:100%">
                                    <label>Departemen <small style="color:red">*</small> </label>
                                    <input type="text" name="departemen" required="required" value="<?php echo $d['pengaduan_departemen'] ?>" style="width:100%" placeholder="Ditujukan ke pada bagian (IT,ENG & etc)" class="form-control">
                                  </div> -->

                                  <div class="form-group">
                                    <label>Departemen <small style="color:red">*</small> </label>
                                    <br>
                                    <select class="form-control" name="departemen" required>
                                      <option value="">-pilih-</option>
                                      <option <?php if($d['pengaduan_departemen']=="SIMRS"){echo "selected='selected'";} ?> style="width:100%" value="SIMRS">SIMRS</option>
                                    </select>
                                  </div>  

                                  <div class="form-group" style="width:100%">
                                    <label>Judul <small style="color:red">*</small> </label>
                                    <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['pengaduan_id']; ?>"> 
                                    <input type="text" name="judul" style="width:100%" value="<?php echo $d['pengaduan_judul'] ?>" required="required" class="form-control">
                                  </div>  
                                  <div class="form-group" style="width:100%">
                                    <label>Keterangan <small style="color:red">*</small> </label>
                                    <textarea class="form-control summernote" style="width:100%" name="keterangan" placeholder="Keterangan"><?php echo $d['pengaduan_keterangan'] ?></textarea>
                                  </div>                   
                                  <div class="form-group" style="width:100%">
                                    <label>Gambar </label>
                                    <input type="file" name="gambar" style="width:100%" class="form-control">
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