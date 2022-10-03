<?php
require 'functions.php';
$buku = query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Buku</title>

  <!-- Import Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body style="text-align: center;">

  <div class="container container-fluid" style="text-align: center;">
    <h1>Daftar Buku</h1>

    <button class="link-dark btn btn-sm" type="submit" name="cari" style=" background-color: #7986cb; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
      <a href="tambah.php" style="text-decoration:none; color: white;">Tambah Data Buku</a></button>

    <br><br>

    <!-- TABLE -->
    <div style="text-align: center;">
      <table class="table table-striped" border="1" cellpadding="10" cellspacing="0" style="background-color: white; ">
        <tr>
          <th>Nomor</th>
          <th>Judul Buku</th>
          <th>Penerbit</th>
          <th>Pengarang</th>
          <th>Tahun</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>

        <?php if (empty($buku)) : ?>
          <tr>
            <td colspan="4">
              <p style="color: red; font-style: italic;">data buku tidak ditemukan!</p>
            </td>
          </tr>
        <?php endif; ?>

        <?php $i = 1;
        foreach ($buku as $b) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $b['judul_buku']; ?></td>
            <td><?= $b['penerbit']; ?></td>
            <td><?= $b['pengarang']; ?></td>
            <td><?= $b['tahun']; ?></td>
            <td><img src="gambar/<?= $b['gambar']; ?>" width="120"></td>
            <td>
              <button class="link-dark btn btn-sm" style="background-color: #7986cb; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); 
              color: white;"><a style=" text-decoration:none; color: white;" href="ubah.php?id=<?= $b['id']; ?>">Ubah</a></button>
              <button class="link-dark btn btn-sm" style="background-color: #7986cb; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); 
              color: white;"><a style="text-decoration:none; color: white;" href="hapus.php?id=<?= $b['id']; ?>">Hapus</a></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>

</body>

</html>