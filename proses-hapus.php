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

if (isset($_GET['id'])) {
	// sql statement untuk delete data ke tabel is_siswa
	$query = "DELETE FROM is_siswa WHERE nis=?";
	// membuat prepared statements
	$stmt = mysqli_prepare($db, $query);

	// hubungkan "data" dengan prepared statements
	mysqli_stmt_bind_param($stmt, "s", $nis);

	// siapkan "data" query
	$nis = $_GET['id'];

	// jalan query: execute
	mysqli_stmt_execute($stmt);	

	// cek hasil query
	if (!$stmt) {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	} 
	else {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: index.php?alert=4');
	}	

	/* tutup statement */
    mysqli_stmt_close($stmt);
}	
/* tutup koneksi */
mysqli_close($db);			
?>