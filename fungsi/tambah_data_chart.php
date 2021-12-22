<?php 
include 'config.php';

error_reporting(0);

if (isset($_GET['keranjang'])) { 
    // membuat auto increment untuk id_transaksi
    $id = mysqli_query($koneksi,"SELECT MAX(id_trans) AS lastid FROM keranjang");
    $data = mysqli_fetch_array($id);
    $kode = $data['lastid'];
    $angka = (int) substr($kode,2,3);
    $angka++;
    $char = "TR";
    $id_trans = $char . sprintf("%03s",$angka);
    // // set zona waktu default
    // date_default_timezone_set("Asia/Jakarta");
    // //Mengambil data tgl dan jam saat transaksi dilakukan
    // $tgltrans = date("Y-m-d G:i:s");
    //mengambil variabel keranjang pada halaman kasir
    $keranjangrev = $_GET['keranjang'];
    //query mengambil semua dari tabel keranjang pada database
    $querysel = mysqli_query($koneksi, "SELECT * FROM keranjang") or die(mysqli_error($koneksi));
    foreach ($querysel as $each) {
        //query memasukan data ke tabel keranjang
        $query = mysqli_query($koneksi, 
            "INSERT INTO keranjang (id_trans,id_barang,jumlah,total) 
            VALUES('$id_trans','$each[id_barang]','$each[jumlah]' ,'$each[total]')");
        //proses untuk mengurangi stok pada tabel barang setiap transaksi dilakukan
        $getstok = mysqli_query($koneksi, "SELECT stok FROM barang WHERE id_barang='$each[id_barang]'");
        $postok = mysqli_fetch_array($getstok);
        $newstok = $postok['stok'] - $each['jumlah'];
        $queryup = mysqli_query($koneksi,"UPDATE barang SET stok='$newstok' WHERE id_barang='$each[id_barang]'");
    }

    header("Location:/uas_pbw/checkout.php");

    // //query memasukan data ke tabel transaksi
    // $querytr = mysqli_query($koneksi, "INSERT INTO transaksi (id_trans , id_barang , id_user , total) 
    // VALUES ('$id_trans','$id_barang','$id_user' ,'$total')");
    // //query menghapus data pada tabel keranjang
    // $querydel = mysqli_query($koneksi, "DELETE FROM keranjang");
    // if ($query && $querytr) {
    //     //mengarahkan halaman ke halaman transaksi
    //     header("Location:/uas_pbw/checkout.php");
    // } else {
    //     echo "<script>alert(' Data transaksi gagal di lanjutkan ')</script>";
    // }
}

?>


