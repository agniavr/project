<?php

include 'config.php';

error_reporting(0);

    $id_barang = $_GET['id_barang'];

    $proses = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = $id_barang" ) or die(mysqli_error($koneksi));

    if ($proses) {  
    echo "
    	<script>
                alert('Barang Sukses Dihapus');
                window.location.href='barang.php';
        </script>";
			} 
    else echo "<script>
                    alert('Barang Gagal Dihapus');
                    window.location.href='barang.php';
                </script>";