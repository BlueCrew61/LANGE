<?php
include 'koneksi.php';

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// cek email sudah ada
$cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if(mysqli_num_rows($cek) > 0){
    echo "Email sudah terdaftar! <a href='register.html'>Kembali</a>";
    exit;
}

mysqli_query($conn, "INSERT INTO users(email,password) VALUES('$email','$password')");

echo "Registrasi berhasil! <a href='login.html'>Login</a>";
?>