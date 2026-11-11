<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
   header("Location: login_admin.php");
   exit;
}
$produk =mysqli_fetch_assoc(mysqli_query(
        $koneksi,
        "SELECT COUNT(*) AS total FROM produk"
))['total'];

$pelanggan = mysqli_fetch_assoc(mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total FROM pelanggan"
))['total'];

$penjualan = mysqli_fetch_assoc(mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total FROM penjualan"
))['total'];

$stok = mysqli_fetch_assoc(mysqli_query(
    $koneksi,
    "SELECT COALESCE(SUM(Stok),0) AS total FROM produk"
))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
     <meta charset="UTF-8">
     <title>dashboard adminnnn</title>
</head>
<body>
     <div class="sidebar">
       <h2>KASIRRRR</h2>

       <a href = "dashboard_admin.php">Dashboardddd</a>
       <a href = "registrasi.php">REGISTRASIII PENGGUNAAA</a>
       <a href = "produk.php">dataaaaa barangggg</a>
       <a href = "pelanggan.php">dataaa pelanggan</a>
       <a href = "penjualan.php">pembeliannn</a>
       <a href = "stok.php">stokkk barang yang masihh ada</a>
       <a href = "logout.php">logouttt</a>
     </div>
     <div class="main">
           <h1>DASHBOARDDD ADMINISTRATORRRR</h1>
           <p>selamatt datang Kembali <?= htmlspecialchars($_SESSION['nama']) ?></p>

           <div class="cards">
                <div class="card">
                    <h3>total produk</h3>
                    <h2><?= $produk ?></h2>
                </div>
           <div class="card">
                    <h3>total pelanggan</h3>
                    <h2><?= $pelanggan ?></h2>
                </div>     
           <div class="card">
                    <h3>total penjualan</h3>
                    <h2><?= $penjualan ?></h2>
               </div>
          <div class="card">
                    <h3>totall stok</h3>
                    <h2><?= $stok ?></h2>
          </div>

           </div>
     </div>

</body>
</html>