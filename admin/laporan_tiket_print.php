<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Helpdesk</title>	
	<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">	

</head>
<body>

<div style="display: flex; justify-content: center; flex-warp: warp; justify-content: space-around; ">
	<!-- <img style="width:6%; height:6%;" src="../gambar/sistem/logo.png" alt="" srcset=""> -->
	 <center>
		 <h4>LAPORAN PENGAJUAN TIKET <br> RS.St.ELISABETH BEKASI</h4>
	</center>
</div>
	<br>



	<div class="pagebreak"> </div>

	
	<table class="table table-bordered">
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
			include '../koneksi.php';
			$tgl_dari = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['tanggal_dari']));
			$tgl_sampai = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['tanggal_sampai']));  
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


	
	<script>
		window.print();
		$(document).ready(function(){

		});
	</script>


</body>
</html>
