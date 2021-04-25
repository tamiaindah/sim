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

    
    <script src="../../js/jquery-1.7.2.min.js"></script>
    <script src="../../js/OpenLayers.js"></script>

    <link href="../../css/jquery-position-picker.css" rel="stylesheet" type="text/css"/>
    <script src="../../js/jquery-position-picker.debug.js"></script>

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

        <br/>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <label for="exampleInputEmail1">ID Wisata</label>
            <input type="text" class="form-control" name="id_wisata">

          <div class="form-group">
            <label for="exampleInputEmail1">Nama Wisata</label>
            <input type="text" class="form-control" name="nama_wisata">
            </div>


        <div class='gllpLatlonPicker'>
            <div class='gllpMap'></div>
            &#8627; <font color='red'>Klik 2X Pada Peta Untuk <b>Zoom</b></font> 
            <br />
            &#8627; <font color='red'>Klik 1X Pada Peta Untuk Menandai Lokasi Dengan <b>Marker</b></font> 
            <br /> <br />
            <input type='text' name='latitude' class='gllpLatitude' value='-7.79902' readonly/> &#8592 <font color='red'>Latitude</font> <br/> <br/>
            <input type='text' name='longitude' class='gllpLongitude' value='110.36403' readonly/> &#8592 <font color='red'>Longitude</font> <br/> <br/>
            <input type='text' class='gllpZoom' readonly/> &#8592 <font color='red'>Zoom</font> <br /> <br/>
        </div>

            <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori Wisata</label>
            <select name="kategori_wisata" class="form-control" id="exampleFormControlSelect1">
            <option value="0">----Pilih Kategori---</option>
            <?php
            require_once "../../koneksi.php";

            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
            while($r=mysqli_fetch_array($tampil)) {
            ?>
            <option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['nama_kategori'] ?></option>

            <?php
            }
            ?>

            </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Lokasi Wisata</label>
                <input type="text" class="form-control" name="lokasi_wisata">
                </div>

            <div class="form-group">
                    <label for="exampleInputPassword1">DESKRIPSI</label>
                    <textarea name="deskripsi_wisata" class="ckeditor"></textarea>
                </div>

        <div class="form-group">
                <label for="exampleInputEmail1">Upload Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <p style="color: red">Available Extension: PNG , JPG , JPEG , GIF</p>
            <p style="color: red">File Size < 1Mb</p>
            
              <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
        </form>

    <?php
       require_once "../../koneksi.php";

       if(isset($_POST['submit'])) {
        $id_wisata = $_POST['id_wisata'];
        $nama_wisata = $_POST['nama_wisata'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $kategori_wisata = $_POST['kategori_wisata'];
        $lokasi_wisata = $_POST['lokasi_wisata'];
        $deskripsi_wisata = $_POST['deskripsi_wisata'];
        
        $filename = $_FILES['foto']['name'];
        $file_extension = array('png', 'jpg', 'jpeg', 'gif');
        $size = $_FILES['foto']['size'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $rand = rand();

        if(!in_array($extension, $file_extension)) {
            echo "<script>alert('File Tidak Didukung'); window.location = 'tambah_wisata.php'</script>";
        } else {
            if (!$size < 1050050) {
                $nama_gambar = $rand.'_'.$filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], "../../img_wisata/".$nama_gambar);
                mysqli_query($koneksi, "INSERT into tb_wisata  values('$id_wisata', '$nama_wisata','$kategori_wisata', 
                                                                    '$lokasi_wisata','$latitude', '$longitude', '$nama_gambar', 
                                                                    '$deskripsi_wisata' )");

                header("location:wisata.php");
            } else {
                echo "<script>alert('File Terlalu Besar'); window.location = 'tambah_wisata.php'</script>";
            }
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