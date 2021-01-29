<?php 
session_start();
include "function.php";
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>controling</title>
	<link rel="stylesheet" type="text/css" href="controling12.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="header">
			<?php 
			$id = $_GET['op'];
			$_SESSION['id'] = $id;
			if(!isset($id))
			{
				echo "<script>alert('anda belum login');history.back()</script>";
			}
			$sql = "SELECT * from Wisata where `id_wisata` = '$id'";
			$data = select($sql);
			foreach ($data as $b)
			{
			?>
			<img src="<?php echo $b['gambar']; ?>">
			<?php 
			}
			$kuota = $b['kuota'];
			$jumlah = $b['jumlah_pengunjung'];
				if($jumlah_pengunjung>=$kuota)
				{
					$sql_up = "UPDATE `wisata` SET `keterangan`= penuh where `id_wisata`='$id'";
					$a = $koneksi->query($sql_up);
					$b = mysqli_fetch_array($a);
				}
			?>
		</div>
		<div class="isi">
			<?php
			$data = select($sql);
			foreach ($data as $b)
			{
			?>
			<h1>Controling <?php echo $b['nama_wisata']; ?></h1>
			<?php 
			}
			?>
			<div class="kanan">
				<h3>Pengunjung Masuk / keluar</h3>
				<form action="aksi_controling.php" method="POST">
					<table>
						<tr>
							<td><label>Jumlah</label></td>
							<td><input type="text" name="jumlah"></td>
						</tr>
						<tr>
							<td><label>Keterangan</label></td>
							<td><select name="keterangan">
								<option>--Pilih--</option>
								<option value="masuk">Masuk</option>
								<option value="keluar">Keluar</option>
							</select></td>
						</tr>
						<tr>
							<td></td>
							<td><button type="submit">Submit</button></td>
						</tr>
					</table>
				</form>		
			</div>
			<div class="kiri">
				<?php 
				$data = select($sql);
				foreach ($data as $b)
				{
				?>
				<table>
					<tr>
						<td>Id Wisata:</td>
						<td><?php echo $b['id_wisata']; ?></td>
					</tr>
					<tr>
						<td>Nama Wisata:</td>
						<td><?php echo $b['nama_wisata']; ?></td>
					</tr>
					<tr>
						<td>Harga Tiket:</td>
						<td><?php echo $b['harga_tiket']; ?></td>
					</tr>
					<tr>
						<td>Jumlah Pengunjung:</td>
						<td><?php echo $b['jumlah_pengunjung']; ?></td>
					</tr>
					<tr>
						<td>Kuota:</td>
						<td><?php echo $b['kuota']; ?></td>
					</tr>
					<tr>
						<td>Keterangan:</td>
						<td><?php echo $b['keterangan']; ?></td>
					</tr>
				</table>
				<?php 
				}
				 ?>
			</div>
			<div class="tb_pengunjung">
				<table>
					<tr>
						<th>Waktu</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
					</tr>
					<tr>
					<?php 
					$sql = "SELECT * FROM `pengunjung` where `id_wisata` = '$id' ORDER BY no DESC LIMIT 10";
					$data = select($sql);
					foreach ($data as $b)
					{
					?>
						<td><?php echo $b['waktu']; ?></td>
						<td><?php echo $b['jumlah']; ?></td>
						<td><?php echo $b['keterangan']; ?></td>
					</tr>
					<?php 
					}
					 ?>
				</table>
			</div>
		</div>
		<div class="kembali">
			<a href="form_masuk_admin.html">Kembali</a>
		</div>
		<br>
		<div class="footer">
			<p></p>
		</div>
	</div>
</body>
</html>