<!DOCTYPE html>
<html>
<head>
	<title>Masuk</title>
	<link rel="stylesheet" type="text/css" href="form_masuk.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="header">
		</div>
		<div class="isi">
			<h1>Hapus Akun</h1>
			<form action="aksi_hapus_akun.php" method="POST">
				<label>Username:</label>
				<input type="input" name="username">
				<label>Password:</label>
				<input type="password" name="password">
				<button type="submit">Hapus</button>
			</form>
			<div class="kanan">			
				<h4><a href="form_pendaftaran.html">Kembali</a></h4>
			</div>
		</div>
		<div class="footer">
			<p>2020.</p>
		</div>
	</div>
</body>
</html>