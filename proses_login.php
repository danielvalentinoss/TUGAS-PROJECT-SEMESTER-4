<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    echo "<script>alert('Login gagal!'); window.location='login.php';</script>";
}
?>
