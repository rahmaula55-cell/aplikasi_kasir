<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id']) || $_SESSION['role'] != 'petugas'){
   header("Location: login_petugas.php");
   exit;
}
$produk = mysqli_fetch_assoc(mysqli_query(
   $koneksi,
  "SELECT COUNT(*) AS total FROM produk"
))['total'];
$pelanggan = mysqli_fetch_assoc(mysqli_query(
  $koneksi,
  "SELECT COUNT(*) AS total FROM pelanggan"
))['total'];
?>