<?php
session_start();
require "koneksi.php";

if (!isset($_SESSION['role']) ||
    $_SESSION['role'] != 'administrator') {
    header("Location:index.php");
    exit;
    }

    $produk = mysqli_fetch_assoc(mysqli_query(
        $koneksi, "SELECT COUNT(*) AS total FROM produk"
    ))['total'];
    $pelanggan = mysqli_fetch_assoc(mysqli_query(
        $koneksi, "SELECT COUNT(*) AS total FROM pelanggan"
    ))['total'];
    

?>