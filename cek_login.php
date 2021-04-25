<?php
include "koneksi.php";

session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "select * from tb_admin where username='$username' and password='$password'");

$r = mysqli_fetch_array($query);

$cek = mysqli_num_rows($query);

if($cek > 0) {
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['namaadmin'] = $r['nama_admin'];
    $_SESSION['idadmin'] = $r['id_admin'];
    header("location:dashboard.php");
} else {
    header("location:gagal_login.php");
}

?>