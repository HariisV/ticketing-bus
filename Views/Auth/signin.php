<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<h2>Selamat Datang di Aplikasi Pemesanan Tiket Online</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="/Api/AuthApi/insertApi.php" method="post">
			<h1>Buat Akun</h1>
			<input type="text" placeholder="Nama" name="nama" />
			<input type="email" placeholder="Email" name="email" />
			<input type="password" placeholder="Password" name="password" />
			<button>DAFTAR</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form  action="/Api/AuthApi/authApi.php" method="post">
			<h1>Masuk</h1>
			<input type="email" placeholder="Email " name="email" />
			<input type="password" placeholder="password" name="password" />
			<button>Masuk</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Selamat Datang!</h1>
				<p>Sudah mempunyai akun? silahkan login</p>
				<button class="ghost" id="signIn">MASUK</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Selamat Datang!</h1>
				<p>Belum mempunyai akun? silahkan daftar terlebih dahulu</p>
				<button class="ghost" id="signUp">DAFTAR</button>
			</div>
		</div>
	</div>
</div>

<script src="script.js"></script>