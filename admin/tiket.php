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
            <h3 class="box-title">Tiket</h3> 

            <div class="btn-group pull-right">  
              

            </div>          
          </div>

          <div class="box-body">
           
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>                    
                    <th>NOMOR TIKET</th>                    
                    <th>USER</th>                    
                    <th>DEPARTEMEN</th>                    
                    <th>TANGGAL PENGAJUAN</th>                    
                    <th>TANGGAL PENYELESAIAN</th>                    
                    <th>URGENCY</th>                                        
                    <th>JUDUL</th>                                        
                    <th>STATUS</th>                    
                    <th width="12%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;                  
                  $data = mysqli_query($koneksi,"SELECT * FROM pengaduan, user where pengaduan_user=user_id order by pengaduan_tanggal desc");
                  while($d = mysqli_fetch_array($data)){                    
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>                      
                      <td><?php echo $d['pengaduan_nomor']; ?></td>                    
                      <td><?php echo $d['user_nama']; ?></td>                    
                      <td><?php echo $d['user_departemen']; ?></td>                    
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
                      <td>
                       
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editTiket<?php echo $d['pengaduan_id'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>


                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusTiket<?php echo $d['pengaduan_id'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>
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
                                    <label>Urgency <small style="color:red">*</small> </label>
                                    <select class="form-control" name="urgency" style="width:100%" required>
                                      <option value="">-pilih-</option>
                                      <option <?php if($d['pengaduan_urgency']=="High"){echo "selected='selected'";} ?> value="High">High</option>
                                      <option <?php if($d['pengaduan_urgency']=="Medium"){echo "selected='selected'";} ?> value="Medium">Medium</option>
                                      <option <?php if($d['pengaduan_urgency']=="Low"){echo "selected='selected'";} ?> value="Low">Low</option>
                                    </select>
                                  </div>  
                                  <!-- <div class="form-group" style="width:100%">
                                    <label>Unit <small style="color:red">*</small> </label>
                                    <input type="email" name="email" required="required" value="<?php echo $d['pengaduan_email'] ?>" style="width:100%" placeholder="email@email.com" class="form-control">
                                  </div>
                                  <div class="form-group" style="width:100%">
                                    <label>Departemen <small style="color:red">*</small> </label>
                                    <input type="text" name="departemen" required="required" value="<?php echo $d['pengaduan_departemen'] ?>" style="width:100%" placeholder="Ditujukan ke pada bagian (IT,ENG & etc)" class="form-control">
                                  </div> -->

                                  <div class="form-group" style="width:100%">
                                    <label>Unit-SubUnit <small style="color:red">*</small> </label>
                                    <br>
                                    <select class="form-control" style="width:100%" name="email" required>
                                      <option value="">-pilih-</option>
                                      <option <?php if($d['pengaduan_email']=="RAJAL-POLI SPESIALIS"){echo "selected='selected'";} ?> value="RAJAL-POLI SPESIALIS">RAJAL-POLI SPESIALIS</option>
                                      <option <?php if($d['pengaduan_email']=="RAJAL-POLI UMUM"){echo "selected='selected'";} ?> value="RAJAL-POLI UMUM">RAJAL-POLI UMUM</option>
                                      <option <?php if($d['pengaduan_email']=="RANAP"){echo "selected='selected'";} ?> value="RANAP">RANAP</option>
                                      <option <?php if($d['pengaduan_email']=="IGD"){echo "selected='selected'";} ?> value="IGD">IGD</option>
                                      <option <?php if($d['pengaduan_email']=="OK"){echo "selected='selected'";} ?> value="OK">OK</option>
                                      <option <?php if($d['pengaduan_email']=="HD"){echo "selected='selected'";} ?> value="HD">HD</option>
                                      <option <?php if($d['pengaduan_email']=="LABORATORIUM"){echo "selected='selected'";} ?> value="LABORATORIUM">LABORATORIUM</option>
                                      <option <?php if($d['pengaduan_email']=="RADIOLOGI"){echo "selected='selected'";} ?> value="RADIOLOGI">RADIOLOGI</option>
                                      <option <?php if($d['pengaduan_email']=="FISOTERAPI"){echo "selected='selected'";} ?> value="FISOTERAPI">FISOTERAPI</option>
                                      <option <?php if($d['pengaduan_email']=="FARMASI"){echo "selected='selected'";} ?> value="FARMASI">FARMASI</option>
                                      <option <?php if($d['pengaduan_email']=="KEBIDANAN"){echo "selected='selected'";} ?> value="KEBIDANAN">KEBIDANAN</option>
                                      <option <?php if($d['pengaduan_email']=="KEUANGAN"){echo "selected='selected'";} ?> value="KEUANGAN">KEUANGAN</option>
                                      <option <?php if($d['pengaduan_email']=="ADMINISTRASI"){echo "selected='selected'";} ?> value="ADMINISTRASI">ADMINISTRASI</option>
                                      <option <?php if($d['pengaduan_email']=="BAGIAN-UMUM"){echo "selected='selected'";} ?> value="BAGIAN-UMUM">BAGIAN-UMUM</option>
                                      <option <?php if($d['pengaduan_email']=="CASEMIX"){echo "selected='selected'";} ?> value="CASEMIX">CASEMIX</option>
                                      <option <?php if($d['pengaduan_email']=="REKAM-MEDIK"){echo "selected='selected'";} ?> value="REKAM-MEDIK">REKAM-MEDIK</option>
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

                                  <div class="form-group" style="width:100%">
                                    <label>Departemen <small style="color:red">*</small> </label>
                                    <br>
                                    <select class="form-control" style="width:100%" name="departemen" required>
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