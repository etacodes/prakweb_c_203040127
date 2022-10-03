<?php
require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal ditambahkan!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Buku</title>
</head>

<body>
  <h3>Form Tambah Data Buku</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <ul>
      <li>
        <label>
          Judul Buku :
          <input type="text" name="judul_buku" autofocus required>
        </label>
      </li>
      <li>
        <label>
          penerbit :
          <input type="text" name="penerbit" required>
        </label>
      </li>
      <li>
        <label>
          pengarang :
          <input type="text" name="pengarang" required>
        </label>
      </li>
      <li>
        <label>
          tahun :
          <input type="text" name="tahun" required>
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" class="gambar" required>
        </label>
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Data!</button>
      </li>
    </ul>
  </form>

  <script src="script.js"></script>
</body>

</html>