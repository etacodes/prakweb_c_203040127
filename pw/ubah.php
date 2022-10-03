<?php

require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query Buku berdasarkan id
$buku = query("SELECT * FROM buku WHERE id = $id");

// cek apakah tombol ubah sudah ditekan
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Buku</title>
</head>

<body>

  <h3>Form Ubah Data Buku</h3>

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $buku['id']; ?>">
    <ul>
      <li>
        <label>
          judul buku :
          <input type="text" name="judul_buku" autofocus required value="<?= $buku['judul_buku']; ?>">
        </label>
      </li>
      <li>
        <label>
          penerbit :
          <input type="text" name="penerbit" required value="<?= $buku['penerbit']; ?>">
        </label>
      </li>
      <li>
        <label>
          pengarang :
          <input type="text" name="pengarang" required value="<?= $buku['pengarang']; ?>">
        </label>
      </li>
      <li>
        <label>
          tahun :
          <input type="text" name="tahun" required value="<?= $buku['tahun']; ?>">
        </label>
      </li>
      <li>
        <input type="hidden" name="gambar_lama" value="<?= $buku['gambar']; ?>">
        <label>
          Gambar :
          <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </label>
        <img src="img/<?= $buku['gambar']; ?>" width="120" style="display: block;" class="img-preview">
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data!</button>
      </li>
    </ul>
  </form>

  <script src="script.js"></script>
</body>

</html>