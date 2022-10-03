<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_c_203040127_pw');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $judul_buku = htmlspecialchars($data['judul_buku']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $tahun = htmlspecialchars($data['tahun']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
              buku
            VALUES
            ('', '$judul_buku', '$penerbit', '$pengarang', '$tahun', '$gambar');
          ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  //menghapus gambar di folder image
  $mhs = query("SELECT * FROM buku WHERE id = $id");
  if ($mhs['gambar'] != 'nophoto.png') {
    unlink('img/' . $mhs['gambar']);
  }

  // menghapus gambar di folder
  $mhs = query("SELECT * FROM buku WHERE id = $id");
  if ($mhs['gambar'] != 'nophoto.png') {
    unlink('img/' . $mhs['gambar']);
  }

  mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $judul_buku = htmlspecialchars($data['judul_buku']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $tahun = htmlspecialchars($data['tahun']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);


  if ($gambar == 'nophoto.jpg') {
    $gambar = $gambar_lama;
  }

  $query = "UPDATE buku SET
              judul_buku = '$judul_buku',
              penerbit = '$penerbit',
              pengarang = '$pengarang',
              tahun = '$tahun',
              gambar = '$gambar'
            WHERE id = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
