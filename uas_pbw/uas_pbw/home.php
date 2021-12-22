<?php 

include 'config.php';

session_start();
error_reporting(0);

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

$sqli = mysqli_query($koneksi ,"SELECT * FROM user WHERE id = '".$_SESSION['id']."' ");
$tampil = mysqli_fetch_assoc($sqli);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style-home.css" />
    <title>MartMarket</title>
  </head>
<body style="background: url('gambar/market1.jpg');">

<nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(69deg, rgba(44,255,100,1) 25%, rgba(0,245,255,1) 75%);;;">
  <div class="container-fluid">
    <div style="display:flex; justify-items:center; align-items: center;">
      <a href="home.php">
      <img src="gambar/mart.png" style="max-height: 6rem; max-width: 6rem;"></a>
      <h5 style="margin-left:1rem; color:snow;">MartMarket</h5>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" >
      <div class="navbar-nav" style="margin-left:3rem;" >
        <a class="nav-link" href="belanja.php" style="color:snow;">Belanja</a>
        <a class="nav-link" href="barang.php" style="color:snow;">Barang</a>
        <a class="nav-link" href="transaksi.php" style="color:snow;">Transaksi</a>
        <a class="nav-link border border-2" href="logout.php" style="color:snow; margin-left: 45rem; background-color:orangered;" onclick="javascript: return confirm('Anda Yakin Ingin Keluar ?');">Keluar</a>
      </div>
    </div>
  </div>
</nav>

<div class="container" style="width: 60rem; height:15rem; background: linear-gradient(69deg, rgba(44,255,100,1) 25%, rgba(0,245,255,1) 75%);;;">
  <h2 class="text-center" align="center" style="color: snow; margin:5rem; font-weight: 400; padding-top: 2rem;">Selamat Datang Di MartMarket</h2> 
  <h3 class="text-center" align="center" style="color: snow; margin:5rem; font-weight: 400;">Silahkan Anda Nikmati Waktu Belanja Anda Di MartMarket </h3> 
</div>
 
</body>

<footer>
  <div class="footer" style="background: linear-gradient(69deg, rgba(236,171,38,1) 20%, rgba(223,250,0,1) 50%, rgba(236,171,38,1) 80%); width: auto; height: 5rem; justify-content: center; margin-top:5rem;" >
    <div class="footer1" style="font-family: sans-serif; justify-content: center; padding: 30px;" >
    <h6 align="center" style="color: blueviolet;"> Copyright &#9400; 2021 - MartMarket </h6>
    </div>  
  </div>
</footer>  

</html>
