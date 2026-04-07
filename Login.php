<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$data = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($data);

if ($user) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        header("Location: dashboard.php");
    } else {
        echo "Password salah!";
    }
} else {
    echo "Email tidak ditemukan!";
}
?>