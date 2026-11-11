<?php
session_start();
include "koneksi.php";

if($_SERVER["REQUEST_METHOD"] != "POST") {
   header("Location: pilih_login.php");
   exit;
}
$username = trim($_POST['username']);
$password = $_POST['password'];
$role = $_POST['role'];

if (!in_array($role,['administrator','petugas'],true)){
    header("Location: pilih_login.php");
    exit;
}

$sql = "SELECT * FROM user WHERE username = ? AND role = ?";
$stmt = mysqli_prepare($koneksi,$sql);
mysqli_stmt_bind_param($stmt,"ss",$username,$role);
mysqli_stmt_execute($stmt);
$hasil = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($hasil);

if($user && password_verify($password, $user['password'])) {
   session_regenerate_id(true);

   $_SESSION['id'] = $user['id'];
   $_SESSION['nama'] = $user['nama'];
   $_SESSION['username'] = $user['username'];
   $_SESSION['role'] = $user['role'];

    if ($role == "admin") {
        header("Location: dashboard_admin.php");
    } else {
        header("Location: dashboard_petugas.php");
    }

    exit;
}else{  if ($role == "admin") {
        header("Location: login_admin.php?pesan=gagal");
    } else {
        header("Location: login_petugas.php?pesan=gagal");
    }

    exit;
}
?>