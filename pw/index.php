

<?php  
require 'functions.php';
$buku = query("SELECT * FROM buku");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
	$buku = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>DAFTAR BUKU</title>
</head>
<body>
	
	<h3>DAFTAR BUKU</h3>
	
	<a href = "tambah.php">Tambah Data Buku</a>
	<br><br>

	<form action="" method="post">
  		<input type="text" name="keyword" size="30" placeholder="masukkan keyword pencarian..." autocomplete="off" autofocus>
  		<button type="submit" name="cari">Cari!</button>
  	</form>
	  <br>
	<table border="1" cellpadding="10" cellspacing="0s" style="background-color: white">
		<tr>
			<th>Nomor</th>
			<th>Judul Buku</th>
			<th>Penerbit</th>
			<th>Pengarang</th>
      <th>Tahun</th>
      <th>Gambar</th>
      <th>Aksi</th>
		</tr>

		<?php if(empty($buku)) : ?>
		<tr>
			<td colspan="4">
				<p style="color: red; font-style: italic;">data buku tidak ditemukan!</p>
			</td>
		</tr>
		<?php endif; ?>

		<?php $i = 1; 
		foreach($buku as $b) : ?>
		<tr>
			<td><?= $i++; ?></td>
			<td><?= $b['judul_buku']; ?></td>
			<td><?= $b['penerbit']; ?></td>
			<td><?= $b['pengarang']; ?></td>
			<td><?= $b['tahun']; ?></td>
      <td><img src="gambar/<?= $b['gambar']; ?>" width ="100"></td>
			<td>
			<button>
				<a href="ubah.php?id=<?= $b['id']; ?>">Ubah</a>
			</button>
			<button>
				<a href="hapus.php?id=<?= $b['id']; ?>">Hapus</a>
			</button> 
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>