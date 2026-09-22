<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:index.php");
    exit;
}

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = md5($_POST['password']);

$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $user = mysqli_fetch_assoc($data);

    $_SESSION['username'] = $user['username'];
    $_SESSION['status'] = "login";
    $_SESSION['hak_akses'] = $user['hak_akses'];

    header("location:admin/index.php");
    exit;
} else {
    header("location:index.php?pesan=gagal");
    exit;
}
?>