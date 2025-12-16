<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Detail Tiket
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>      
      <li class="active">Detail Tiket</li>
    </ol>
  </section>

  <?php 
  $id = $_GET['id'];
  // $data = mysqli_query($koneksi,"select * from pengaduan where pengaduan_id='$id'");
  $data = mysqli_query($koneksi,"
  SELECT 
    p.*,
    u.user_nama,
    u.user_departemen
  FROM pengaduan p
  JOIN user u 
    ON p.pengaduan_user = u.user_id
  WHERE p.pengaduan_id = '$id'
");
  $d = mysqli_fetch_assoc($data);
  
  ?>

  <section class="content">
    <div class="row">
      <div class="col-md-3">

        <div class="box box-primary">
          <div class="box-body box-profile">
           

           <!-- POPUP-IMG -->
           <?php if($d['pengaduan_gambar'] == ""){ ?>
              <img class="img-responsive" src="../gambar/sistem/logo.png">
            <?php } else { ?>
              <a href="#" data-toggle="modal" data-target="#modalGambar">
                <img 
                  class="img-responsive" 
                  style="cursor:pointer"
                  src="../gambar/tiket/<?php echo $d['pengaduan_gambar'] ?>"
                  alt="Klik untuk memperbesar"
                >
              </a>
            <?php } ?>
            <!-- AKHIR POPUP-IMG -->
             
           <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Nomor Tiket</b> <a class="pull-right"><?php echo $d['pengaduan_nomor'] ?></a>
            </li> 
              
              <li class="list-group-item">
                <b>User</b>
                <a style="color: black;" class="pull-right"><b><?php echo $d['user_nama']; ?></b></a>
              </li>

              <li class="list-group-item">
                <b>Departemen User</b>
                <a style="color: black; font-weight:600" class="pull-right"><b><?php echo $d['user_departemen']; ?></b></a>
              </li>

              <li class="list-group-item">
                <b>Urgency</b> 
                <a class="pull-right">
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
                </a>
              </li>  
              <li class="list-group-item">
                <b>Status</b> 
                <a class="pull-right">
                  <?php 
                  if($d['pengaduan_status']=="Open"){
                    ?>
                    <span class="label label-primary"><?php echo $d['pengaduan_status'] ?></span>
                    <?php
                  }elseif ($d['pengaduan_status']=="Pending") {
                    ?>
                    <span class="label label-warning"><?php echo $d['pengaduan_status'] ?></span>
                    <?php
                  }elseif ($d['pengaduan_status']=="Progress") {
                    ?>
                    <span class="label label-success"><?php echo $d['pengaduan_status'] ?></span>
                    <?php
                  }elseif ($d['pengaduan_status']=="Close") {
                    ?>
                    <span class="label label-success"><?php echo $d['pengaduan_status'] ?></span>
                    <?php
                  }
                  ?>
                </a>
              </li>                      
          </ul>           
        </div>

      </div>

      <!-- POPUP NODAL IMG -->
       <?php if($d['pengaduan_gambar'] != ""){ ?>
          <div class="modal fade" id="modalGambar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                  </button>
                  <h5 class="modal-title">Lampiran Tiket</h5>
                </div>

                <div class="modal-body text-center">
                  <img 
                    src="../gambar/tiket/<?php echo $d['pengaduan_gambar'] ?>" 
                    class="img-responsive"
                    style="margin:auto; max-height:80vh;"
                  >
                </div>

              </div>
            </div>
          </div>
          <?php } ?>

      <!-- AKHIR POPUP MODAL IMG -->

    </div>

    <div class="col-md-9">
      <div class="box box-success">      
        <div class="box-body">          
            <h6 class="fw-bold">Data Tiket</h6>
            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th>Unit</th>
                  <td><?php echo $d['pengaduan_email'] ?></td>
                </tr>
                <tr>
                  <th>Departemen yang dituju</th>
                  <td><?php echo $d['pengaduan_departemen'] ?></td>
                </tr>
                <tr>
                  <th>Judul</th>
                  <td><?php echo $d['pengaduan_judul'] ?></td>
                </tr>
                <tr>
                  <th>Keterangan</th>
                  <td><?php echo $d['pengaduan_keterangan'] ?></td>
                </tr>
                <tr>
                  <th style="width: 200px;">Tanggal Pengajuan</th>
                  <td><?php echo date('d-m-Y h:i:s', strtotime($d['pengaduan_tanggal'])) ?></td>
                </tr>
                <tr>
                  <th style="width: 200px;">Tanggal Penyelesaian</th>
                  <td> <?php if($d['pengaduan_tanggal_penyelesaian']!=""){echo date('d-m-Y h:i:s', strtotime($d['pengaduan_tanggal_penyelesaian']));}else{}  ?></td>
                </tr>
                <tr>
                  <th style="width: 200px;">Keterangan Penyelesaian</th>
                  <td> <?php if($d['pengaduan_keterangan_selesai']!=""){echo $d['pengaduan_keterangan_selesai'] ;}else{}  ?></td>
                </tr>
              </table>
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
            </div>

                            
        </div>

      </div>
    </div>

    <div class="col-md-9">
      <div class="box">      
        <div class="box-body">          
            <h6 class="fw-bold">Chat</h6>
            <div class="box-body">

              <!-- mulai -->
              <div class="direct-chat-messages">

                <?php 
                $chat = mysqli_query($koneksi,"select * from pengaduan_chat where pc_pengaduan='$id'");
                while($c = mysqli_fetch_array($chat)){
                  $user_id = $c['pc_user'];
                  if($c['pc_level']=="Teknisi"){
                    $cek_teknisi = mysqli_query($koneksi,"select * from admin where admin_id='$user_id'");
                    $ct = mysqli_fetch_assoc($cek_teknisi);
                    ?>
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo $ct['admin_nama'] ?></span>
                        <span class="direct-chat-timestamp pull-right"><?php echo date('d-m-Y H:i:s', strtotime($c['pc_waktu'])) ?></span>
                      </div>
                      <?php 
                      if($ct['admin_foto']==""){
                         ?>
                           <img class="direct-chat-img" src="../gambar/sistem/user.png" alt="message user image">
                          <?php
                      }else{
                          ?>
                           <img class="direct-chat-img" src="../gambar/user/<?php echo $ct['admin_foto'] ?>" alt="message user image">
                          <?php
                      }
                       ?>
                     

                      <div class="direct-chat-text">
                        <?php echo $c['pc_isi'] ?><a href="tiket_pesan_hapus.php?id=<?php echo $c['pc_id'] ?>" class="pull-right">x</a>
                      </div>
                    </div>

                    <?php
                  }else{

                    $cek_user = mysqli_query($koneksi,"select * from user where user_id='$user_id'");
                    $cu = mysqli_fetch_assoc($cek_user);

                    ?>
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?php echo $cu['user_nama'] ?></span>
                        <span class="direct-chat-timestamp pull-left"><?php echo date('d-m-Y H:i:s', strtotime($c['pc_waktu'])) ?></span>
                      </div>

                      <?php 
                      if($cu['user_foto']==""){
                         ?>
                           <img class="direct-chat-img" src="../gambar/sistem/user.png" alt="message user image">
                          <?php
                      }else{
                          ?>
                           <img class="direct-chat-img" src="../gambar/user/<?php echo $cu['user_foto'] ?>" alt="message user image">
                          <?php
                      }
                       ?>
                      

                      <div class="direct-chat-text">
                        <?php echo $c['pc_isi'] ?>
                      </div>

                    </div>
                    <?php
                  }
                }
                 ?>

                             

              </div>
              <!-- akhir -->







            </div>



          <div class="box-footer">
            <form action="tiket_pesan.php" method="post">
              <div class="input-group">
                <input type="hidden" name="tiket" value="<?php echo $d['pengaduan_id'] ?>">
                <input type="text" name="pesan" placeholder="Type Message ..." class="form-control">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-warning btn-flat">Send</button>
                </span>
              </div>
            </form>
          </div>

                            
        </div>

      </div>
    </div>




  </div>

</section>

</div>
<?php include 'footer.php'; ?>