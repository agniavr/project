<?php 

$server     = "localhost";
$user       = "root";
$pass       = "";
$database   = "uas_pbw";

$koneksi = mysqli_connect($server, $user, $pass, $database);

if (!$koneksi) {
    die("<script>alert('Koneksi Gagal silahkan coba lagi!')</script>");
}

?>