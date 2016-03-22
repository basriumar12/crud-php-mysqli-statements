 <!-- Aplikasi CRUD
 ************************************************
 * Developer    : Indra Styawantoro
 * Company      : Indra Studio
 * Release Date : 1 Maret 2016
 * Website      : http://www.indrasatya.com, http://www.kulikoding.net
 * E-mail       : indra.setyawantoro@gmail.com
 * Phone        : +62-856-6991-9769
 * BBM          : 7679B9D9
 -->

<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	// sql statement untuk insert data ke tabel is_siswa
	$query = "INSERT INTO is_siswa(nis, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, no_telepon) 
			  VALUES (?,?,?,?,?,?,?,?)";
	// membuat prepared statements
	$stmt = mysqli_prepare($db, $query);

	// hubungkan "data" dengan prepared statements
	mysqli_stmt_bind_param($stmt, "ssssssss", $nis, $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $alamat, $no_telepon);

	// ambil data hasil submit dari form
	$nis           = trim($_POST['nis']);
	$nama          = trim($_POST['nama']);
	$tempat_lahir  = trim($_POST['tempat_lahir']);

	$tanggal       = $_POST['tanggal_lahir'];
	$tgl           = explode('-',$tanggal);
	$tanggal_lahir = $tgl[2]."-".$tgl[1]."-".$tgl[0];

	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama         = $_POST['agama'];
	$alamat        = trim($_POST['alamat']);
	$no_telepon    = $_POST['no_telepon'];

	// jalan query: execute
	mysqli_stmt_execute($stmt);	

	// cek hasil query
	if (!$stmt) {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	} 
	else {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	}

	/* tutup statement */
    mysqli_stmt_close($stmt);
}	
/* tutup koneksi */
mysqli_close($db);				
?>
