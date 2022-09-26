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
<html>

<head>
  <title>Tambah Data Buku</title>
</head>
<body>
    <h3>Form Tambah Data Buku</h3>
    <form action="" method="POST">
        <ul>
            <li>
                <label>
                  Judul Buku :
                  <input type="text" name="judul_buku" required>
                </label><br><br>
            </li>
            <li>
                <label>
                  Penerbit :
                  <input type="text" name="penerbit" autofocus required>
                </label><br><br>
            </li>
            <li>
                <label>
                  Pengarang :
                  <input type="text" name="pengarang" required>
                </label><br><br>
            </li>
            <li>
                <label>
                  Tahun :
                  <input type="text" name="tahun" required>
                </label><br><br>
            </li>

            <li>
                <label>
                  Gambar :
                  <input type="text" name="gambar" required>
                </label>
                
            </li>
            <br>
            <li>
                <button type="submit" name="tambah">Tambah Data!</button>
            </li>
        </ul>
    </form>
</body>

</html>