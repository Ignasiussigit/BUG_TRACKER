<?php
include '../koneksi.php';

$filterUnit    = $_GET['unit'] ?? '';
$filterStatus  = $_GET['status'] ?? '';
$filterUrgency = $_GET['urgency'] ?? '';
$dari          = $_GET['dari'] ?? '';
$sampai        = $_GET['sampai'] ?? '';

$where = "WHERE 1=1";

if($filterUnit != ""){
  $where .= " AND p.pengaduan_email = '$filterUnit'";
}

if($filterStatus != ""){
  $where .= " AND p.pengaduan_status = '$filterStatus'";
}

if($filterUrgency != ""){
  $where .= " AND p.pengaduan_urgency = '$filterUrgency'";
}

/* ===== FILTER TANGGAL ===== */
if($dari != "" && $sampai != ""){
  $where .= " AND DATE(p.pengaduan_tanggal) BETWEEN '$dari' AND '$sampai'";
}elseif($dari != ""){
  $where .= " AND DATE(p.pengaduan_tanggal) >= '$dari'";
}elseif($sampai != ""){
  $where .= " AND DATE(p.pengaduan_tanggal) <= '$sampai'";
}

$data = mysqli_query($koneksi,"
  SELECT 
    p.*,
    u.user_nama,
    a.admin_nama
  FROM pengaduan p
  JOIN user u ON p.pengaduan_user = u.user_id
  LEFT JOIN admin a ON p.pengaduan_teknisi = a.admin_id
  $where
  ORDER BY p.pengaduan_tanggal DESC
");

$no = 1;
while($d = mysqli_fetch_assoc($data)){
?>
<tr data-id="<?= $d['pengaduan_id']; ?>">
  <td><?= $no++; ?></td>
  <td><?= $d['pengaduan_nomor']; ?></td>
  <td><?= date('d-m-Y H:i:s', strtotime($d['pengaduan_tanggal'])); ?></td>
  <td><?= $d['pengaduan_tanggal_penyelesaian'] ? date('d-m-Y H:i:s', strtotime($d['pengaduan_tanggal_penyelesaian'])) : ''; ?></td>

  <td><?= $d['admin_nama'] ?: '<i>Belum ditangani</i>'; ?></td>

  <td>
    <?php
    if($d['pengaduan_urgency']=="High") echo '<span class="label label-danger">High</span>';
    elseif($d['pengaduan_urgency']=="Medium") echo '<span class="label label-warning">Medium</span>';
    else echo '<span class="label label-success">Low</span>';
    ?>
  </td>

  <td><?= $d['pengaduan_judul']; ?></td>
  <td><?= $d['pengaduan_email']; ?></td>

  <td>
    <?php
    if($d['pengaduan_status']=="Open") echo '<span class="label label-danger">Open</span>';
    elseif($d['pengaduan_status']=="Pending") echo '<span class="label label-warning">Pending</span>';
    elseif($d['pengaduan_status']=="Progress") echo '<span class="label label-primary">Progress</span>';
    else echo '<span class="label label-success">Close</span>';
    ?>
  </td>

   <td>
            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#updateStatus<?php echo $d['pengaduan_id'] ?>">
            <i class="fa fa-edit"></i> Update Status</button>

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
    <a href="tiket_detail.php?id=<?= $d['pengaduan_id']; ?>" class="btn btn-sm btn-primary">
      <i class="fa fa-search"></i>
    </a>
  </td>
</tr>
<?php } ?>
