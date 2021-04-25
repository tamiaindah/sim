-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2020 at 02:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Dian Pamungkas', 'dian', 'f97de4a9986d216a6e0fea62b0450da9'),
(2, 'Jack', 'jack', '4ff9fc6e4e5d5f590c4f2134a8cc96d1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `nik` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nik`, `nama`, `hp`, `email`, `alamat`) VALUES
(1, 'M. Yahya G.', '089997654321', 'yahya@mail.com', 'Jakarta'),
(2, 'Jhon', '087777779', 'jhon@mail.com', 'Jakarta'),
(3, 'Tio', '08777777911', 'tio@mail', 'bandung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Wisata Alam'),
(2, 'Wisata Buatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `foto`, `profil`) VALUES
(1, 'Unsleep_team.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id facilisis ante. Fusce eget dolor ornare, condimentum nisl sit amet, dignissim tortor. Nunc quis aliquet libero. Nam consequat nibh eu arcu faucibus, eu commodo dui feugiat. Nunc viverra nunc arcu, dignissim hendrerit nulla ullamcorper a. Cras hendrerit dignissim venenatis. Morbi tristique vulputate sapien, id ultrices elit facilisis et. Vestibulum est nisl, euismod eget malesuada in, aliquam sit amet leo. Proin viverra mauris sit amet mi cursus mattis. Morbi facilisis pretium nibh a rutrum. Ut pharetra ut nibh nec iaculis. Nulla vitae rhoncus tellus. Duis enim magna, viverra et justo et, ultrices porttitor magna. Nullam lobortis maximus eros eu interdum. Nulla sodales metus nec tincidunt laoreet. Ut non imperdiet enim. Duis iaculis urna quam, quis bibendum nunc aliquam et. Sed faucibus tortor a lorem aliquam, vitae convallis mi iaculis. Cras dictum tristique est a bibendum. Pellentesque blandit nisi ut arcu condimentum eleifend. Nam sit amet scelerisque felis. Etiam sit amet euismod lectus. Proin convallis consectetur libero, luctus tristique lorem laoreet ut. Mauris vitae eleifend orci. Sed sagittis velit diam, mollis posuere felis euismod eget. Vestibulum non rutrum tortor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam malesuada neque quis tincidunt sagittis. Cras eu iaculis nisl. Suspendisse eget lorem velit. Nulla a hendrerit odio, eu consequat libero. Sed sed turpis posuere, feugiat massa in, pretium mauris. Nulla sit amet faucibus eros. Vivamus sapien nisl, vehicula eget nisi vel, pretium malesuada velit. Cras quis magna ac mi hendrerit ultricies. Ut vel cursus mi. Quisque consectetur vestibulum volutpat. Nullam laoreet eleifend tempus. Mauris dictum neque et tellus maximus tristique. Maecenas quis mollis lectus. In nec sem vulputate, tristique nisi vitae, porta massa. Quisque tincidunt egestas enim nec imperdiet. Etiam diam dolor, cursus vitae consequat in, elementum et mauris. Pellentesque nec ultricies augue. Nam vulputate cursus ante id viverra. Quisque vel semper sem. Ut at sapien in orci luctus tempor eu nec eros. Vivamus in lectus consequat quam aliquet vulputate at faucibus libero. Quisque aliquet pretium risus ut accumsan. Etiam mi nibh, fringilla eu tempor id, molestie at tortor. Donec lacus magna, congue non nisi sed, gravida ultricies mauris. In dui erat, fermentum quis purus vel, aliquam faucibus massa. Vivamus vitae orci volutpat, dignissim ipsum aliquam, mollis mi. Maecenas nec tortor dolor. Praesent efficitur libero vel erat efficitur pretium. Vivamus at risus ipsum. Etiam commodo nunc leo, at volutpat quam tincidunt ut. Quisque tristique lacinia leo in luctus.</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
