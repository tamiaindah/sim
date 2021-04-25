<?php
	require_once "../../koneksi.php";

	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_wisata WHERE id_wisata='$id'");

	$x = mysqli_fetch_array($sql);

	$img_name = $x['foto_wisata'];
	$loc= "../../img_wisata/$img_name";
	@unlink($loc);

	mysqli_query($koneksi, "DELETE FROM tb_wisata WHERE id_wisata='$id'");

	header("location:wisata.php");
?>