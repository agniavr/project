<?php
include 'config.php';

error_reporting(0);

if (isset($_GET['bayar'])) {
  $ = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id='".$_SESSION['id']."'"));

  $gid = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `transaksi` ORDER BY id_trans DESC"));
  $id = $gid['id_trans']+1;
  $id_user = $u['id'];
  $id_produk = $_POST['id_produk'];
  $gip = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `produk` WHERE id='$id_produk'"));
  $id_seller = $gip['id_seller'];
  $jumlah = $_POST['jumlah'];
  $pengiriman = $_POST['pengiriman'];
  $pembayaran = $_POST['pembayaran'];
  mysqli_query($koneksi, "INSERT INTO `checkout` SET id='$id', id_user='$id_user', id_produk='$id_produk', id_seller='$id_seller', jumlah='$jumlah', pengiriman='$pengiriman', pembayaran='$pembayaran', status='Sedang Dikemas'");
  mysqli_query($koneksi, "DELETE FROM `keranjang` WHERE id_user='$id_user' AND id_produk='$id_produk'");
  echo mysqli_error($koneksi);
  header('Location: home-profile.php');
?>