<?php

include 'config.php';
error_reporting(0);

if (isset($_GET['id_barang'])) {
	$id 			= $_GET['id_barang'];

	$proses_ambil 	= mysqli_query($koneksi, " SELECT * from barang WHERE id_barang = '" . $id . "' ") or die(mysqli_error($koneksi));
	if (isset($_GET['proses'])) {

		$proses_edit 	= $_GET['proses'];
		if ($proses_edit == 1) {

			$jenis = $_POST['jenis'];
			$merk = $_POST['merk'];
			$stok = $_POST['stok'];
			$harga = $_POST['harga'];
			

			$update_data = mysqli_query($koneksi, " UPDATE barang SET jenis = '$jenis' , merk = '$merk' , stok = '$stok' , harga = '$harga' WHERE id_barang = '" . $id . "'") or die(mysqli_error($koneksi));
			if ($update_data) {
				echo "<script>
		                          alert('Data Berhasil Diupdate');
		                          window.location.href='barang.php';
		            </script>";
			} else echo " <script>
		                          alert('Data Gagal Diupdate');
		                          window.location.href='barang.php';
		                  </script>";
		}
	}
}
?>