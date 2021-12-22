<?php
//Proses untuk menyimpan isi pada table cart ke tabel transaksi barang
//lalu menghapus isi tabel cart lalu menambahkan data transaksi
include "connect.php";
if (isset($_GET['total'])) { 
    // membuat auto increment untuk idtransaksi
    $id = mysqli_query($connect,"SELECT MAX(idtransaksi) AS lastid FROM transaksi");
    $data = mysqli_fetch_array($id);
    $iden = $data['lastid'];
    $angka = (int) substr($iden,2,3);
    $angka++;
    $char = "TR";
    $idtrans = $char . sprintf("%03s",$angka);
    // set zona waktu default
    date_default_timezone_set("Asia/Jakarta");
    //Mengambil data tgl dan jam saat transaksi dilakukan
    $tgltrans = date("Y-m-d G:i:s");
    //mengambil variabel total pada halaman kasir
    $totalrev = $_GET['total'];
    //query mengambil semua dari tabel cart pada database
    $querysel = mysqli_query($connect, "SELECT * FROM cart") or die(mysqli_error($connect));
    foreach ($querysel as $each) {
        //query memasukan data ke tabel transaksi_barang
        $query = mysqli_query($connect, 
            "INSERT INTO transaksi_barang (idtransaksi,idbarang,harga,jumlah,diskon,totalharga) 
            VALUES('$idtrans','$each[idbarang]','$each[harga]','$each[jumlah]','$each[diskon]','$each[totalharga]')");
        //proses untuk mengurangi stok pada tabel barang setiap transaksi dilakukan
        $getstok = mysqli_query($connect, "SELECT stok FROM barang WHERE idbarang='$each[idbarang]'");
        $postok = mysqli_fetch_array($getstok);
        $newstok = $postok['stok'] - $each['jumlah'];
        $queryup = mysqli_query($connect,"UPDATE barang SET stok='$newstok' WHERE idbarang='$each[idbarang]'");
    }
    //query memasukan data ke tabel transaksi
    $querytr = mysqli_query($connect, "INSERT INTO transaksi (idtransaksi, tgltransaksi, totalterima) 
    VALUES ('$idtrans','$tgltrans','$totalrev')");
    //query menghapus data pada tabel cart
    $querydel = mysqli_query($connect, "DELETE FROM cart");
    if ($query && $querytr) {
        //mengarahkan halaman ke halaman transaksi
        header("Location:../halaman/transaksi.php");
    } else {
        echo "Data gagal disimpan";
    }
}
?>