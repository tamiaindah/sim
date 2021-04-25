<?php
    require_once "../../koneksi.php";

    $id = $_GET['id'];

    mysqli_query($koneksi, "delete from tb_kategori where id_kategori='$id'");

    header("location:kategori.php");
?>