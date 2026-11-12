<?php
require "koneksi.php";

if(mysqli_num_rows(
 $kasir->query("SELECT id FROM user WHERE role='administrator'")    
) > 0) {
    die("Akun admin sudah tersedia");

}

if (isset($_POST['daftar'])){
    $nama = $kasir ->escape($post('nama'));
    $username = $kasir 
}