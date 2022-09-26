<?php
require 'functions.php';

// jika tidak ada URL
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari URL
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$b = query("SELECT * FROM buku WHERE id = $id");

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal diubah!";
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Ubah Data Buku</title>
</head>
<body>
    <h3>Form Ubah Data Buku</h3>
    <form action="" method="POST">
        <ul>
          <input type="hidden" name="id" value="<?= $b['id']; ?>">
            <li>
                <label>
                  Judul Buku :
                  <input type="text" name="judul_buku" required value="<?= $b['judul_buku']; ?>">
                </label><br><br>
            </li>
            <li>
                <label>
                  Penerbit :
                  <input type="text" name="penerbit" autofocus required value="<?= $b['penerbit']; ?>">
                </label><br><br>
            </li>
            <li>
                <label>
                  Pengarang :
                  <input type="text" name="pengarang" required value="<?= $b['pengarang']; ?>">
                </label><br><br>
            </li>
            <li>
                <label>
                  Tahun :
                  <input type="text" name="tahun" required value="<?= $b['tahun']; ?>">
                </label><br><br>
            </li>
            <li>
                <label>
                  Gambar :
                  <input type="text" name="gambar" required value="<?= $b['gambar']; ?>">
                </label><br><br>
            </li>
            <li>
                <button type="submit" name="ubah">Ubah Data!</button>
            </li>
        </ul>
    </form>
</body>

</html>