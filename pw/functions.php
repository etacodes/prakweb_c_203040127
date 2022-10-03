<?php  

function koneksi()
{
	return mysqli_connect('localhost', 'root', '', 'prakweb_c_203040127_pw');
}

function query($query)
{
	$conn = koneksi();

	$result = mysqli_query($conn, $query);

	// Jika hasilnya hanya 1 data
	if (mysqli_num_rows($result) == 1) {
		return mysqli_fetch_assoc($result);
	}

	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];


  if ($error == 4) {
    return 'nophoto.png';
  }

  // cek eksistensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
          alert('Yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
          alert('Yang anda pilih bukan gambar!');
          </script>";
    return false;
  }


  // cek ukuran file 
  // maksimal 5Mb == 5.000.000
  if ($ukuran_file > 5000000) {
    echo "<script>
          alert('Ukuran gambar terlalu besar!');
          </script>";
    return false;
  }

  // lolos pengecekan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}

function tambah($data)
{
	$conn = koneksi();

	
	$judul_buku = htmlspecialchars($data['judul_buku']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$tahun = htmlspecialchars($data['tahun']);
	$gambar = htmlspecialchars($data['gambar']);

	// upload gambar
	$gambar = upload();
	if (!$gambar) {
	  return false;
	}

	$query = "INSERT INTO
	            buku
	            VALUES
	          (null, '$judul_buku', '$penerbit', '$pengarang', '$tahun', '$gambar');
	          ";
	mysqli_query($conn, $query); 
	
	return mysqli_affected_rows($conn);
}

function hapus($id)
{
	$conn = koneksi();
	mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_query($conn));
	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	$conn = koneksi();

	$id = ($data['id']);
	$judul_buku = htmlspecialchars($data['judul_buku']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$tahun = htmlspecialchars($data['tahun']);
	$gambar = htmlspecialchars($data['gambar']);

	// upload gambar
	$gambar = upload();
	if (!$gambar) {
	  return false;
	}

	$query = "UPDATE buku SET
				judul_buku = '$judul_buku',
				penerbit = '$penerbit',
				pengarang = '$pengarang',
				tahun = '$tahun',
				gambar = '$gambar'
				WHERE id = $id";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM buku
              WHERE 
            judul_buku LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%' OR
            pengarang LIKE '%$keyword%' OR
            tahun LIKE '%$keyword%'
            ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
?>