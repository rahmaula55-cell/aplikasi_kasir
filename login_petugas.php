<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>loginnn petugasss</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">

    <h1>LOGIN PETUGAS</h1>
    <p>Masukkan username dan password.</p>

    <?php
    if (isset($_GET['pesan'])) {
        echo "<p class='error'>Username atau password salah!</p>";
    }
    ?>

    <form action="proses_login.php" method="POST">

        <input type="hidden" name="role" value="petugas">

        <label>Username</label>
        <input type="text" name="username">

        <label>Password</label>
        <input type="password" name="password">

        <button type="submit" class="btn">LOGIN</button>

    </form>

    <a href="pilih_login.php" class="back">Kembali</a>

</div>

</body>
</html>