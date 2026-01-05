<?php include 'header.php'; ?>

<div class="content-wrapper">
<section class="content-header">
  <h1>Ruangan <small>Master Ruangan</small></h1>
</section>

<section class="content">
<div class="row">
<section class="col-lg-8 col-lg-offset-2">
<div class="box box-success">

<div class="box-header">
  <h3 class="box-title">Data Ruangan</h3>
  <div class="btn-group pull-right">
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahRuangan">
      <i class="fa fa-plus"></i> Tambah Ruangan
    </button>
  </div>
</div>

<!-- MODAL TAMBAH -->
<form action="ruangan_act.php" method="post">
<div class="modal fade" id="tambahRuangan">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h5 class="modal-title">Tambah Ruangan</h5>
</div>
<div class="modal-body">

  <div class="form-group">
    <label>Nama Ruangan</label>
    <input type="text" name="nama" required class="form-control">
  </div>

  <div class="form-group">
    <label>Keterangan</label>
    <textarea name="keterangan" class="form-control"></textarea>
  </div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
  <button type="submit" class="btn btn-primary">Simpan</button>
</div>
</div>
</div>
</div>
</form>

<div class="box-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Nama Ruangan</th>
  <th>Keterangan</th>
  <th>Status</th>
  <th width="15%">Opsi</th>
</tr>
</thead>
<tbody>

<?php
$no=1;
$data = mysqli_query($koneksi,"SELECT * FROM ruangan ORDER BY ruangan_nama ASC");
while($r = mysqli_fetch_assoc($data)){
?>
<tr>
<td><?= $no++; ?></td>
<td><?= $r['ruangan_nama']; ?></td>
<td><?= $r['ruangan_keterangan']; ?></td>
<td>
  <span class="label label-<?= $r['ruangan_status']=='Aktif'?'success':'danger'; ?>">
    <?= $r['ruangan_status']; ?>
  </span>
</td>
<!-- <td>
    <a href="ruangan_hapus.php?id=<?= $r['ruangan_id']; ?>" 
    onclick="return confirm('Hapus data?')" 
    class="btn btn-danger btn-sm">
    <i class="fa fa-trash"></i>
    </a>
</td> -->
<td>
    <button type="button" class="btn btn-warning btn-sm" 
            data-toggle="modal" 
            data-target="#editRuangan<?php echo $r['ruangan_id']; ?>">
        <i class="fa fa-cog"></i>
    </button>

    <button type="button" class="btn btn-danger btn-sm" 
            data-toggle="modal" 
            data-target="#hapusRuangan<?php echo $r['ruangan_id']; ?>">
        <i class="fa fa-trash"></i>
    </button>

    <!-- modal hapus -->
    <div class="modal fade" id="hapusRuangan<?php echo $r['ruangan_id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
            </button>
            <h5 class="modal-title">Peringatan!</h5>
        </div>

        <div class="modal-body">
            <p>
            Yakin ingin menghapus ruangan
            <b><?php echo $r['ruangan_nama']; ?></b> ?
            </p>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a class="btn btn-danger btn-sm"
            href="ruangan_hapus.php?id=<?php echo $r['ruangan_id']; ?>">
            <i class="fa fa-check"></i> Ya, Hapus
            </a>
        </div>

        </div>
    </div>
    </div>


    <!-- modal edit -->
    <form action="ruangan_update.php" method="post">
    <div class="modal fade" id="editRuangan<?php echo $r['ruangan_id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
            </button>
            <h5 class="modal-title">Edit Data Ruangan</h5>
        </div>

        <div class="modal-body">

            <input type="hidden" name="id" value="<?php echo $r['ruangan_id']; ?>">

            <div class="form-group" style="width:100%">
            <label>Nama Ruangan</label>
            <input type="text" name="nama"
                    value="<?php echo $r['ruangan_nama']; ?>"
                    required class="form-control">
            </div>

            <div class="form-group" style="width:100%">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"><?php
                echo $r['ruangan_keterangan'];
            ?></textarea>
            </div>

            <div class="form-group" style="width:100%">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Aktif" <?php if($r['ruangan_status']=="Aktif") echo "selected"; ?>>
                Aktif
                </option>
                <option value="Nonaktif" <?php if($r['ruangan_status']=="Nonaktif") echo "selected"; ?>>
                Nonaktif
                </option>
            </select>
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
<?php } ?>

</tbody>
</table>
</div>

</div>
</section>
</div>
</section>
</div>

<?php include 'footer.php'; ?>
