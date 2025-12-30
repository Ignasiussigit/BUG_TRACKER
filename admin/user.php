<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      User
      <small>Data User</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-10 col-lg-offset-1">
        <div class="box box-success">

          <div class="box-header">
            <h3 class="box-title">User</h3>
            <div class="btn-group pull-right">  
             <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus"></i> &nbsp Tambah User
            </button>
          </div>

          <!-- Modal -->
            <form action="user_act.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Nama Lengkap <small style="color:red">*</small> </label>
                        <input type="text" name="nama" required="required" class="form-control" placeholder="Nama Lengkap ..">
                      </div>                   
                     
                       <div class="form-group">
                        <label>Kontak <small style="color:red">*</small></label>
                        <input type="number" name="kontak"  class="form-control" placeholder="kontak ..">
                      </div>
                      <!-- <div class="form-group">
                        <label>Email <small style="color:red">*</small></label>
                        <input type="email" name="email" required="required" class="form-control" placeholder="email ..">
                      </div> -->

                      <div class="form-group has-feedback">
                        <label>Unit <small style="color:red">*</small></label>
                        <select class="form-control" name="departemen" required>
                          <option value="">-Pilih Bagian-</option>
                          <option value="POLI RAJAL">POLI RAJAL</option>
                          <option value="RANAP">RANAP</option>
                          <option value="UGD">UGD</option>
                          <option value="OK">OK</option>
                          <option value="ICU">ICU</option>
                          <option value="LABORATORIUM">LABORATORIUM</option>
                          <option value="RADIOLOGI">RADIOLOGI</option>
                          <option value="REHAB MEDIS">REHAB MEDIS</option>
                          <option value="FARMASI">FARMASI</option>
                          <option value="KEBIDANAN">KEBIDANAN</option>
                          <option value="MCU">MCU</option>
                          <option value="PELAYANAN MEDIK">PELAYANAN MEDIK</option>
                          <option value="PERSONALIA">PERSONALIA</option>
                          <option value="SEKRETARIAT">SEKRETARIAT</option>
                          <option value="SIM">SIM</option>
                          <option value="MARKETING">MARKETING</option>
                          <option value="REKAM MEDIS">REKAM MEDIS</option>
                          <option value="CASEMIX">CASEMIX</option>
                          <option value="PIUTANG">PIUTANG</option>
                          <option value="PAJAK">PAJAK</option>
                          <option value="AKUNTANSI">AKUNTANSI</option>
                          <option value="KEUANGAN">KEUANGAN</option>
                          <option value="KABAG.ADMINISTRASI">KABAG.ADMINISTRASI</option>
                          <option value="ADMINISTRASI">ADMINISTRASI</option>
                          <option value="KASIR">KASIR</option>
                          <option value="TPP">TPP</option>
                          <option value="OFFICE">OFFICE</option>
                          <option value="GIZI">GIZI</option>
                          <option value="PETUGAS-UMUM">PETUGAS-UMUM</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Username <small style="color:red">*</small></label>
                        <input type="text" name="username" required="required" class="form-control" placeholder="username ..">
                      </div>

                      <div class="form-group">
                        <label>Password <small style="color:red">*</small></label>
                        <input type="password" name="password" required="required" class="form-control" placeholder="Password ..">
                      </div>                      
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control">
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>


        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
              <thead>
                <tr>
                  <th width="1%">NO</th>    
                  <th></th>
                  <th>USER_ID</th>                                  
                  <th>NAMA</th>                  
                  <th>EMAIL</th>                  
                  <th>DEPARTEMEN</th>                  
                  <th>KONTAK</th>                  
                  <th>USERNAME</th>                              
                  <th width="10%">OPSI</th>                              
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $data = mysqli_query($koneksi,"SELECT * FROM user");
                while($d = mysqli_fetch_array($data)){
                  $encrypted_id = base64_encode($d['user_id']);
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                      <center>
                        <?php if($d['user_foto'] == ""){ ?>
                          <img src="../gambar/sistem/user.png" style="width: 30px;height: auto">
                        <?php }else{ ?>
                          <img src="../gambar/user/<?php echo $d['user_foto'] ?>" style="width: 30px;height: auto">
                        <?php } ?>
                      </center>
                    </td>
                    <td><?php echo $d['user_id']; ?></td>
                    <td><?php echo $d['user_nama']; ?></td>
                    <td><?php echo $d['user_email']; ?></td>
                    <td><?php echo $d['user_departemen']; ?></td>
                    <td><?php echo $d['user_kontak']; ?></td>
                    <td><?php echo $d['user_username']; ?></td>                                    
                    <td>
                      
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAdmin<?php echo $d['user_id'] ?>">
                      <i class="fa fa-cog"></i>
                    </button>


                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#adminHapus<?php echo $d['user_id'] ?>">
                      <i class="fa fa-trash"></i>
                    </button>


                     <!-- modal hapus -->
                      <div class="modal fade" id="adminHapus<?php echo $d['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                            </div>
                            <div class="modal-body">

                              <p>Yakin ingin menghapus data Admin  ?</p>                              

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <a class="btn btn-danger btn-sm" href="user_hapus.php?id=<?php echo $d['user_id'] ?>"><i class="fa fa-check"></i> Ya, Hapus</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- edit -->
                       <form action="user_update.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="editAdmin<?php echo $d['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                              </div>
                              <div class="modal-body">

                              
                                <div class="form-group" style="width:100%">
                                  <label>Nama</label>
                                  <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['user_id']; ?>">                                 
                                  <input type="text" name="nama" required="required" class="form-control" placeholder="Nama Lengkap  .." value="<?php echo $d['user_nama']; ?>" style="width:100%">
                                </div>
                            

                                <div class="form-group" style="width:100%">
                                  <label>Kontak <small style="color:red">*</small></label>
                                  <input type="number" name="kontak" value="<?php echo $d['user_kontak'] ?>"  style="width:100%" class="form-control" placeholder="kontak ..">
                                </div>
                                <!-- <div class="form-group" style="width:100%">
                                  <label>Email <small style="color:red">*</small></label>
                                  <input type="email" name="email" style="width:100%" value="<?php echo $d['user_email'] ?>" class="form-control" placeholder="email ..">
                                </div> -->
                                <div class="form-group" style="width:100%">
                                  <label>Departemen <small style="color:red">*</small></label>
                                  <select class="form-control" style="width:100%" name="departemen" required>
                                    <option value="">-pilih-</option>
                                    <option <?php if($d['user_departemen']=="POLI RAJAL"){echo "selected='selected'";} ?> value="POLI RAJAL">POLI RAJAL</option>
                                    <option <?php if($d['user_departemen']=="RANAP"){echo "selected='selected'";} ?> value="RANAP">RANAP</option>
                                    <option <?php if($d['user_departemen']=="UGD"){echo "selected='selected'";} ?> value="UGD">UGD</option>
                                    <option <?php if($d['user_departemen']=="OK"){echo "selected='selected'";} ?> value="OK">OK</option>
                                    <option <?php if($d['user_departemen']=="ICU"){echo "selected='selected'";} ?> value="ICU">ICU</option>
                                    <option <?php if($d['user_departemen']=="LABORATORIUM"){echo "selected='selected'";} ?> value="LABORATORIUM">LABORATORIUM</option>
                                    <option <?php if($d['user_departemen']=="RADIOLOGI"){echo "selected='selected'";} ?> value="RADIOLOGI">RADIOLOGI</option>
                                    <option <?php if($d['user_departemen']=="REHAB MEDIS"){echo "selected='selected'";} ?> value="REHAB MEDIS">REHAB MEDIS</option>
                                    <option <?php if($d['user_departemen']=="FARMASI"){echo "selected='selected'";} ?> value="FARMASI">FARMASI</option>
                                    <option <?php if($d['user_departemen']=="KEBIDANAN"){echo "selected='selected'";} ?> value="KEBIDANAN">KEBIDANAN</option>
                                    <option <?php if($d['user_departemen']=="MCU"){echo "selected='selected'";} ?> value="MCU">MCU</option>
                                    <option <?php if($d['user_departemen']=="PELAYANAN MEDIK"){echo "selected='selected'";} ?> value="PELAYANAN MEDIK">PELAYANAN MEDIK</option>
                                    <option <?php if($d['user_departemen']=="PERSONALIA"){echo "selected='selected'";} ?> value="PERSONALIA">PERSONALIA</option>
                                    <option <?php if($d['user_departemen']=="SEKRETARIAT"){echo "selected='selected'";} ?> value="SEKRETARIAT">SEKRETARIAT</option>
                                    <option <?php if($d['user_departemen']=="SIM"){echo "selected='selected'";} ?> value="SIM">SIM</option>
                                    <option <?php if($d['user_departemen']=="MARKETING"){echo "selected='selected'";} ?> value="MARKETING">MARKETING</option>
                                    <option <?php if($d['user_departemen']=="REKAM MEDIS"){echo "selected='selected'";} ?> value="REKAM MEDIS">REKAM MEDIS</option>
                                    <option <?php if($d['user_departemen']=="CASEMIX"){echo "selected='selected'";} ?> value="CASEMIX">CASEMIX</option>
                                    <option <?php if($d['user_departemen']=="PIUTANG"){echo "selected='selected'";} ?> value="PIUTANG">PIUTANG</option>
                                    <option <?php if($d['user_departemen']=="PAJAK"){echo "selected='selected'";} ?> value="PAJAK">PAJAK</option>
                                    <option <?php if($d['user_departemen']=="AKUNTANSI"){echo "selected='selected'";} ?> value="AKUNTANSI">AKUNTANSI</option>
                                    <option <?php if($d['user_departemen']=="KEUANGAN"){echo "selected='selected'";} ?> value="KEUANGAN">KEUANGAN</option>
                                    <option <?php if($d['user_departemen']=="KABAG.ADMINISTRASI"){echo "selected='selected'";} ?> value="KABAG.ADMINISTRASI">KABAG.ADMINISTRASI</option>
                                    <option <?php if($d['user_departemen']=="ADMINISTRASI"){echo "selected='selected'";} ?> value="ADMINISTRASI">ADMINISTRASI</option>
                                    <option <?php if($d['user_departemen']=="KASIR"){echo "selected='selected'";} ?> value="KASIR">KASIR</option>
                                    <option <?php if($d['user_departemen']=="TPP"){echo "selected='selected'";} ?> value="TPP">TPP</option>
                                    <option <?php if($d['user_departemen']=="OFFICE"){echo "selected='selected'";} ?> value="OFFICE">OFFICE</option>
                                    <option <?php if($d['user_departemen']=="GIZI"){echo "selected='selected'";} ?> value="GIZI">GIZI</option>
                                    <option <?php if($d['user_departemen']=="PETUGAS-UMUM"){echo "selected='selected'";} ?> value="PETUGAS-UMUM">PETUGAS-UMUM</option>
                                  </select>
                                </div>

                                <div class="form-group" style="width:100%">
                                  <label>Username <small style="color:red">*</small></label>
                                  <input type="text" name="username" value="<?php echo $d['user_username'] ?>" required="required" style="width:100%" class="form-control" placeholder="username ..">
                                </div>

                                <div class="form-group" style="width:100%">
                                  <label>Password <small style="color:red">*</small></label>
                                  <input type="password" name="password" style="width:100%" class="form-control" placeholder="Password ..">
                                  <small style="color:red">input jika akan diganti</small>
                                </div>                      
                                <div class="form-group" style="width:100%">
                                  <label>Foto</label>
                                  <input type="file" name="foto" class="form-control" style="width:100%">
                                  <small style="color:red">input jika akan diganti</small>
                                </div>
                               

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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