<?php 

include 'config.php';
include 'fungsi/tambah_data_barang.php';
include 'fungsi/tampil_data_barang.php';

session_start();
error_reporting(0);

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

$sqli = mysqli_query($koneksi ,"SELECT * FROM user WHERE id = '".$_SESSION['id']."' ");
$tampil = mysqli_fetch_assoc($sqli);

$data = mysqli_fetch_assoc($proses_barang);

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
<body style="background: linear-gradient(69deg, rgba(44,255,100,1) 25%, rgba(0,245,255,1) 75%);">

<div class="row" style="border: 2rem; margin: 0;">
 <div class="col-3" style=" justify-items: center; padding:2rem; max-width: 20rem; ">
 
    <div class="barisbawah" style="margin-left: 70px;
                                   margin-right: 70px;
                                   margin-bottom: 20px;">
    <a class="navbar-brand" href="home.php"><img src="gambar/mart.png" width="120" height="120" ></a>
    </div>
 
    <h3 class="text-center" style="color:snow; margin-bottom: 5rem;">Mart Market</h3>

        <div class="nav-item border border-2 rounded-top rounded-bottom mt-4" style="background-color:#6096FD ;">
              <a class="nav-link text-light" href="home.php">Dashboard</a>
        </div>
        <div class="nav-item border border-2 rounded-top rounded-bottom mt-4" style="background-color:#6096FD ;">
              <a class="nav-link text-light" href="belanja.php">Belanja</a>
        </div>
        <div class="nav-item border border-2 rounded-top rounded-bottom mt-4" style="background-color:#6096FD ;">
              <a class="nav-link text-light" href="barang.php">Barang</a>
        </div>
        <div class="nav-item border border-2 rounded-top rounded-bottom mt-4" style="background-color:#6096FD ;">
              <a class="nav-link text-light" href=".php">Riwayat</a>
        </div>
        <div class="nav-item border border-2 rounded-top rounded-bottom bg-danger " style=" margin-top: 15rem;">
              <a class="nav-link text-light" href="logout.php" onclick="javascript: return confirm('Anda Yakin Ingin Keluar?');"> Keluar</a>
        </div>

 </div>

    <div class="col-9" style=" margin-left:1rem;" >

      <h3 class="text-center" style="color:snow; margin: 2rem;"> Selamat Datang di Mart Market</h3>
      <h3 class="text-center" style="color:snow; margin: 2rem;"><?php echo $_SESSION['nama']; ?></h3>
    
    <form action="fungsi/edit_data_barang.php" method="POST">  
  <div class="form-control" style="max-width: 60rem; height: auto;">
   
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">ID</label>
    <input type="text" class="form-control" name="id_barang" value="<?php if (isset($edit) && $edit['jenis'] != "") echo $edit['jenis']; ?>" disabled>
  </div>  

   <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Jenis</label>
    <input type="text" class="form-control" name="jenis" value="<?php if (isset($edit) && $edit['jenis'] != "") echo $edit['jenis']; ?>">
  </div> 

  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Merk</label>
    <input type="text" class="form-control" name="merk">
  </div> 

  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Stok</label>
    <input type="text" class="form-control" name="stok">
  </div> 

  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Harga</label>
    <input type="text" class="form-control" name="harga">
  </div>

  <div class="control-group">
    <label class="control-label" for=""></label>
    <div class="controls">
      <button name="tambah" class="btn btn-info">Tambah</button>
    </div>
  </div>

  </div>
 
 </form>
  
    </div>
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