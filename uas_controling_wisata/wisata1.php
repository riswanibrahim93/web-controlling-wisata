<?php 
session_start();
include "function.php";
$id = $_GET['op'];
// $username = $_SESSION['usename'];
// $password = $_SESSION['password'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>wisata</title>
	<link rel="stylesheet" type="text/css" href="wisata1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="topnav">
			<a href="home_wisata.php">Home</a>
			<a href="wisata1.php?op=BL12">Balekambang</a>
			<a href="wisata1.php?op=GC13">Goa Cina</a>
			<a href="wisata1.php?op=SB14">Sendang Biru</a>
			<a href="wisata1.php?op=TG15">Tiga Warna</a>
		</div>
		<div class="header">
			<?php 
			$sql = "SELECT * from Wisata where `id_wisata` = '$id'";
			$data = select($sql);
			foreach ($data as $b)
			 ?>
			<img src="<?php echo $b['gambar']; ?>">
		</div>
		<div class="isi">
			<h1><?php echo $b['nama_wisata']; ?></h1>
			<div class="desk">
				<p><?php echo $b['deskripsi']; ?></p>
			</div>
			<div class="daftar">
				<table>
					<tr>
						<td>Harga:</td>
						<td><?php echo $b['harga_tiket']; ?></td>
					</tr>
					<tr>
						<td>Jumlah:</td>
						<td><?php echo $b['jumlah_pengunjung']; ?></td>
					</tr>
					<tr>
						<td>Kuota:</td>
						<td><?php echo $b['kuota']; ?></td>
					</tr>
					<tr>
						<td>Lokasi:</td>
						<td><?php echo $b['lokasi']; ?></td>
					</tr>
					<tr>
						<td>Map:</td>
						<td><a href="<?php echo $b['map']; ?>"><?php echo $b['map']; ?></a></td>
					</tr>
				</table>
			</div>
			<div class="ket">
				<?php 
					$batas = $b['kuota'] - 10;
					$jml = $b['jumlah_pengunjung'];
					if($jml>=$batas)
					{
				?>
				 	<h4><?php echo "Disarankan mencari tempat lain, karena wisata ini hampir penuh" ?></h4>
				<?php 
				 	}
				 	else
				 	{
				?>
				  	<h4><?php echo "Anda bisa mengunjungi tempat ini"; ?></h4>
				<?php 
				  	}
				?>
			</div>
		</div>
		<div class="footer">
			<p>2020.</p>
		</div>
	</div>
</body>
</html>