<?php
ob_start();
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo '
    <center>
    <br><br><br><br><br><br><br><br><br><br><br>
    <b>Maaf, Silahkan Login Kembali</b><br>
    <b>Anda telah keluar dari sistem</b>
    <br>
    <a href="index.php" title="Klik Gambar untuk Kembali ke Halaman LOGIN">
    <img src="img/key-login.png" height="100" width="100"></img>
    </a>
    </center>';
} else {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:Dashboard:.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../../dashboard.php">PESONA INDONESIA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../../dashboard.php">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../profil/profil.php">Profil</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../kategori/kategori.php">Kategori Wisata</a>
                <a class="dropdown-item" href="../wisata/wisata.php">Wisata</a>
                <a class="dropdown-item" href="../berita/berita.php">Berita</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../wisata/laporan_wisata.php">Laporan</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Akun
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../password/password.php">Ubah Password</a>
                <a class="dropdown-item" href="../../logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
                </div>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        </nav>

        <?php
            require_once "../../koneksi.php";
            $id = $_GET['id'];

            $sql = mysqli_query($koneksi, "SELECT * FROM tb_berita WHERE id_berita='$id'");

            $r = mysqli_fetch_array($sql);

            $pecah = explode('-', $r['tanggal_berita']);
            $tgl_baru = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];

        ?>

        <br/>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <label for="exampleInputEmail1">ID Berita</label>
            <input type="text" class="form-control" name="id_berita" value="<?php echo $r['id_berita'] ?>" readonly>

          <div class="form-group">
            <label for="exampleInputEmail1">Judul Berita</label>
            <input type="text" class="form-control" name="judul_berita" value="<?php echo $r['judul_berita']?>">
            </div>

        <div class="form-group">
            <label for="exampleInputEmail1">User Uploaded</label>
            <input type="text" class="form-control" name="user_berita" value="<?php echo $r['user_berita']?>" readonly>
            </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Tanggal Berita</label>
            <input type="text" class="form-control" name="tanggal_berita" value="<?php echo $tgl_baru ?>" readonly>
            </div>

        <div class="form-group">
                <label for="exampleInputPassword1">Isi Berita</label>
                <textarea name="isi_berita" class="ckeditor"><?php echo $r['isi_berita']?></textarea>
            </div>

        <div class="form-group">
        <img src="../../img_berita/<?php echo $r['foto_berita'] ?>" height="100" width="100"></img>
                <label for="exampleInputEmail1">Upload Foto</label>
                <input type="file" name="foto_berita" class="form-control">
            </div>
            <p style="color: red">Available Extension: PNG , JPG , JPEG , GIF</p>
            <p style="color: red">File Size < 1Mb</p>
            
              <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
        </form>

    <?php
       require_once "../../koneksi.php";

       if(isset($_POST['submit'])) {
        $id_berita = $_POST['id_berita'];
        $judul_berita = $_POST['judul_berita'];
        $user_berita = $_POST['user_berita'];
        $tanggal_berita = date('Y-m-d');
        $isi_berita = $_POST['isi_berita'];
        
        $filename = $_FILES['foto_berita']['name'];
        $file_extension = array('png', 'jpg', 'jpeg', 'gif');
        $size = $_FILES['foto_berita']['size'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $rand = rand();

        if ($filename != "" ){
            if (!in_array($extension, $file_extension)) {
            echo "<script>alert('File Tidak Didukung'); window.location = 'tambah_berita.php'</script>";

        } else {
            if (!$size < 1050050) {

                    $query = mysqli_query($koneksi, "SELECT * FROM tb_berita WHERE id_berita='$id_berita'");
                    $a = mysqli_fetch_array($query);

                    $img_name = $a['foto_berita'];
                    $loc = "../../img_berita/$img_name";

                    @unlink($loc);

                    $nama_gambar = $rand.'_'.$filename;
                    move_uploaded_file($_FILES['foto_berita']['tmp_name'], "../../img_berita/".$nama_gambar);

                    mysqli_query($koneksi, "UPDATE tb_berita SET judul_berita='$judul_berita',
                                                                user_berita='$user_berita',
                                                                tanggal_berita='$tanggal_berita',
                                                                isi_berita='$isi_berita',
                                                                foto_berita='$nama_gambar'
                                                        WHERE id_berita='$id_berita'");

                    header("location:berita.php");
            } else {
                echo "<script>alert('File Terlalu Besar'); window.location = 'tambah_berita.php'</script>";
            }
        }
        } else {

            mysqli_query($koneksi, "UPDATE tb_berita SET judul_berita='$judul_berita',
                                                         user_berita='$user_berita',
                                                         tanggal_berita='$tanggal_berita',
                                                         isi_berita='$isi_berita'
                                                   WHERE id_berita='$id_berita'");

            header("location:berita.php");
        
        }
           
    } 
    ?>


    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="../../ckeditor/ckeditor.js" type="text/javascript"></script>
</html>

<?php
    }
?>