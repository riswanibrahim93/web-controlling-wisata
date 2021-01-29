<?php 
session_start();
include "function.php";
$name = $_SESSION['username'];
$pass = $_SESSION['password'];
if(!isset($name) || !isset($pass))
	{
		echo "<script>alert('anda belum login');history.back()</script>";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Wisata</title>
	<link rel="stylesheet" type="text/css" href="home_wisata.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
	
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
			<p>Wisata.id 2020</p>
		</div>
		<div class="topnav">
			<ul>
				<li class="dropdown"><a href="#">Top wisata</a>
					<ul class="isi-dropdown">
						<li><a href="wisata1.php?op=BL12">Pantai Balekambang</a></li>
						<li><a href="wisata1.php?op=TG15">Pantai 3 Warna</a></li>
						<li><a href="wisata1.php?op=SB14">Pantai Sendang Biru</a></li>
						<li><a href="wisata1.php?op=GC13">Pantai Goa Cina</a></li>
					</ul>
				</li>
				<li class="dropdown"><a href="#">Rekomendasi wisata</a>
					<ul class="isi-dropdown">
						<li><a href="wisata1.php?op=TG15">Pantai 3 Warna</a></li>
						<li><a href="wisata1.php?op=GC13">Pantai Goa Cina</a></li>
						<li><a href="wisata1.php?op=SB14">Pantai Sendang Biru</a></li>
						<li><a href="wisata1.php?op=BL12">Pantai Balekambang</a></li>
					</ul>
				</li>
				<li><a href="form_masuk.html">Log Out</a></li>
			</ul>
		</div>
		<div class="isi">
			<div class="tbl">
				<table>
					<tr>
						<th>Nama Admin</th>
						<th>No.Telepon</th>
						<th>Nama Wisata</th>
						<th>Jumlah pengunjung</th>
						<th>Kuota</th>
						<th>Keterangan</th>
					</tr>
					<tr>
						<?php
						$sql = "SELECT * FROM `controling_pengunjung`";
						$data = select($sql);
						foreach ($data as $b)
						{
						?>
							<td><?php echo $b['nama_admin']; ?></td>
							<td><?php echo $b['telepon']; ?></td>
							<td><?php echo $b['nama_wisata']; ?></td>
							<td><?php echo $b['jumlah_pengunjung']; ?></td>
							<td><?php echo $b['kuota']; ?></td>
							<td><?php echo $b['keterangan']; ?></td>
					</tr>
						<?php 
						}
						 ?>
				</table>
			</div>
			<div class="isi1">
				<div class="about">
					<div class="header_about">
						<h3>ABOUT</h3>
					</div>
					<p>Web ini dibuat untuk kontroling pengunjung wisata pantai yang ada di kota malang, diharapkan dengan adanya web ini membuat pantai malang makin banyak pengunjungnya. Web ini ada untuk mempermudah pengunjung dalam memilih wisata. Pengunjung biasa tau jumlah pengunjung di setiap wisata dan menentukan wisata mana yang pas untuk dikunjungi</p>
				</div>
				<div class="artikel">
					<div class="header_about">
						<h3>Artikel terkait</h3>
					</div>
					<ul>
						<li><a href="https://hot.liputan6.com/read/3947880/7-wisata-pantai-malang-terkenal-dengan-pemandangan-indah-dan-memesona">7 Wisata Pantai Malang Terkenal</a></li>
						<li><a href="https://abimanyutour.id/ini-nih-5-pantai-keren-di-malang-yang-wajib-dikunjungi/">Ini nih, 5 Pantai di Malang yang Keren</a></li>
						<li><a href="https://pariwisataku.com/7-pantai-indah-di-malang/">7 Pantai Indah di Malang</a></li>
					</ul>
				</div>
			</div>
			<div class="isi2">
				<div class="text">
					<div class="gambar1">
						<img src="gambar/bl.jpg" alt="wisata1">
						<p><h3><b>Pantai Balekambang</b></h3>
							Pantai Balekambang selain sebagai wisata alam, juga bisa disebut sebagai tempat wisata religi. Karena pada hari-hari tertentu, ribuan pengunjung datang ke pantai ini untuk melakukan ritual. <a href="wisata1.php?op=BL12">Read more...</a>
						</p>
					</div>
					<div class="gambar1">
						<img src="gambar/gc.jpg" alt="wisata2">
						<p><h3><b>Pantai Goa Cina</b></h3>
							Nama asli dari pantai ini adalah Pantai Rowo Indah. Namun karena pernah terjadi peristiwa kematian seorang Tionghoa yang sedang bertapa di dalam goa yang ada di kawasan pantai ini, nama Rowo Indah kalah popular dibandingkan dengan Goa Cina yang digunakan sampai sekarang. <a href="wisata1.php?op=GC13">Read more...</a>
						</p>
					</div>
					<div class="gambar1">
						<img src="gambar/sb.jpg" alt="wisata3">
						<p><h3><b>Pantai Sendang Biru</b></h3>
							Pantai ini tepat berhadapan dengan Pulau Sempu, hanya terpisahkan oleh Selat Sempu yang sempit dan dengan panjang sekitar 4 kilometer. Di selat ini cocok digunakan untuk berperahu atau olahraga air lainnya karena lokasinya terlindung. <a href="wisata1.php?op=SB14">Read more...</a> 
						</p>
					</div>
					<div class="gambar1">
						<img src="gambar/tg.jpg" alt="wisata4">
						<p><h3><b>Pantai Tiga Warna</b></h3>
							Pantai Tiga Warna ini memang indah gaes, tetapi selain keindahan yang ditawarkan, juga bisa memanfaatkan fasilitas yang sudah tersedia di Pantai Tiga Warna ini. Salah satu fasilitas yang dapat Anda nikmati adalah wahana snorkeling. <a href="wisata1.php?op=TG15">Read more...</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<p>2020.</p>
		</div>
	</div>
</body>
</html>