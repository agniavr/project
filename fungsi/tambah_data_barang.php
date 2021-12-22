<?php 
include 'config.php';

error_reporting(0);

if (isset($_GET['tambah'])) {

  $buat_id = "SELECT max(id_barang) as maxID FROM barang";
  $hasil = mysqli_query($koneksi , $buat_id);
  $data_barang = mysqli_fetch_assoc($hasil);

  $kode = $data_barang['maxID'];
  $urut = (int) substr($kode,2,3);
  $urut++;

  $char = 'BR' ;
  $id_barang = $char . sprintf("%02s" , $urut);

    $jenis      = $_POST['jenis'];
    $merk      = $_POST['merk'];
    $stok      = $_POST['stok'];
    $harga      = $_POST['harga'];


    $input_barang = mysqli_query($koneksi, "INSERT INTO barang (id_barang , jenis , merk , stok , harga ) values ( '$id_barang' , '$jenis', '$merk', '$stok' , '$harga') ") or die (mysqli_error($koneksi));

    if ($input_barang) {
        echo "<script>alert('Data Sukses tersimpan !'); window.location.href='/uas_pbw/barang.php'</script>";
      } 
    else echo "<script>alert('Data Gagal tersimpan!'); window.location.href='/uas_pbw/barang.php'</script>";
    
}

?>


