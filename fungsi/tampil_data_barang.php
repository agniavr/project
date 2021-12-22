<?php
include 'config.php';

error_reporting(0);

$proses_barang = mysqli_query($koneksi, "SELECT * FROM barang ") or die (mysqli_error($koneksi));

?>