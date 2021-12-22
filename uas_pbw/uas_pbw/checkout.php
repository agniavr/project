<?php 

include 'config.php';
include 'fungsi/tampil_data_chart.php';

session_start();
error_reporting(0);

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

$sqli = mysqli_query($koneksi ,"SELECT * FROM user WHERE id = '".$_SESSION['id']."' ");
$tampil = mysqli_fetch_assoc($sqli);

$id_trans - $_POST['id_trans'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi , " SELECT * FROM keranjang WHERE id_trans = '".$id_trans."'"));

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
              <a class="nav-link text-light" href="transaksi.php">Transaksi</a>
        </div>
        <div class="nav-item border border-2 rounded-top rounded-bottom bg-danger " style=" margin-top: 15rem;">
              <a class="nav-link text-light" href="logout.php" onclick="javascript: return confirm('Anda Yakin Ingin Keluar?');"> Keluar</a>
        </div>

 </div>


<div class="col-9" style=" margin-left:1rem;" >
  <h3 class="text-center" style="color:snow; margin: 2rem;"> Menu Belanja </h3>
  <h4 class="text-center" style="color:snow; margin: 2rem;">Silahkan Nikmati Waktu Berbelanja Anda </h4>

  <form action="" method="POST">
    
    <div class="row">
      <div class="col-3">
        <p>Jenis Barang</p>
      </div>
      <div class="col-9">
        <input type="text" name="jenis" value="<?php echo $data['jenis']; ?>" disabled>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <p>Merek Barang</p>
      </div>
      <div class="col-9">
        <input type="text" name="merk" value="<?php echo $data['merk']; ?>" disabled>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <p>Harga</p>
      </div>
      <div class="col-9">
        <input type="text" name="harga" value="<?php echo $data['harga']; ?>" disabled>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <p>Jumlah</p>
      </div>
      <div class="col-9">
        <input type="text" name="Jumlah" value="<?php echo $data['jumlah']; ?>" disabled>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <p>Total Harga</p>
      </div>
      <div class="col-9">
        <input type="text" name="total" value="<?php echo $data['total']; ?>" disabled>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <p>Jenis</p>
      </div>
      <div class="col-9">
        <input type="text" name="jenis" value="<?php echo $data['jenis']; ?>" disabled>
      </div>
    </div>

  </form>

  <div class="control-group" style="margin:3rem;">
    <div class="controls">
      <button name="bayar" class="btn btn-success">Bayar</button>
    </div>
  </div>

<?php 




?>

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