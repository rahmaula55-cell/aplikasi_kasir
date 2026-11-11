
<?php

class User {

    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function login($username, $password) {

        $query = "SELECT * FROM user WHERE username = ?";

        $stmt = mysqli_prepare($this->koneksi, $query);

        mysqli_stmt_bind_param($stmt, "s", $username);

        mysqli_stmt_execute($stmt);

        $hasil = mysqli_stmt_get_result($stmt);

        $data = mysqli_fetch_assoc($hasil);

        if ($data && password_verify($password, $data['password'])) {
            return $data;
        }

        return false;
    }

    public function registrasi($nama, $username, $password, $role) {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user
                  (nama, username, password, role)
                  VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->koneksi, $query);

        mysqli_stmt_bind_param(
            $stmt,
            "ssss",
            $nama,
            $username,
            $password,
            $role
        );

        return mysqli_stmt_execute($stmt);
    }
}

?>
