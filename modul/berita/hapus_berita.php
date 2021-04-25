<?php
    require_once "../../koneksi.php";

    $id = $_GET['id'];

    mysqli_query($koneksi, "delete from tb_berita where id_berita='$id'");

    header("location:berita.php");
?>