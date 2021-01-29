-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 15, 2020 at 05:37 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `id_wisata` varchar(10) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(10) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `id_wisata`, `username_admin`, `password_admin`, `email_admin`, `telepon`) VALUES
('1933', 'Rama', 'BL12', 'Rama93', '1933BL12', 'rama@gmail.com', '085666666555'),
('1934', 'Ibrahim', 'GC13', 'ibrahim33', '1934GC13', 'ibrahim@gmail.com', '082111333444'),
('1935', 'Sulaiman', 'SB14', 'sulaiman99', '1935SB15', 'sulaiman@gmail.com', '081333555777'),
('1936', 'Bambang', 'TG15', 'bambang46', '1936TG15', 'bambang@gmail.com', '087999666333');

-- --------------------------------------------------------

--
-- Table structure for table `akun_utama`
--

CREATE TABLE `akun_utama` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_utama`
--

INSERT INTO `akun_utama` (`username`, `password`) VALUES
('dinaspariwisata', 'cintaalam');

-- --------------------------------------------------------

--
-- Stand-in structure for view `controling_pengunjung`
-- (See below for the actual view)
--
CREATE TABLE `controling_pengunjung` (
`nama_admin` varchar(50)
,`telepon` varchar(50)
,`nama_wisata` varchar(50)
,`lokasi` varchar(500)
,`map` varchar(500)
,`jumlah_pengunjung` int(50)
,`kuota` int(50)
,`keterangan` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `no` int(11) NOT NULL,
  `id_wisata` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` int(50) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`no`, `id_wisata`, `waktu`, `jumlah`, `keterangan`) VALUES
(14, 'BL12', '2020-05-07 00:05:38', 5, 'masuk'),
(15, 'BL12', '2020-05-07 00:07:57', 5, 'masuk'),
(16, 'BL12', '2020-05-07 00:13:23', 5, 'masuk'),
(17, 'BL12', '2020-05-07 00:14:06', 5, 'masuk');

--
-- Triggers `pengunjung`
--
DELIMITER $$
CREATE TRIGGER `keluar` AFTER INSERT ON `pengunjung` FOR EACH ROW BEGIN
UPDATE wisata
SET jumlah_pengunjung = jumlah_pengunjung - NEW.jumlah
where id_wisata= NEW.id_wisata AND NEW.keterangan = 'keluar';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `masuk` AFTER INSERT ON `pengunjung` FOR EACH ROW BEGIN
UPDATE wisata
SET jumlah_pengunjung = jumlah_pengunjung + NEW.jumlah
where id_wisata= NEW.id_wisata AND NEW.keterangan = 'masuk';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(10) NOT NULL,
  `email_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username_user`, `password_user`, `email_user`) VALUES
(3, 'ryan', 'ryanirawan', 'irawan', 'ryan@gmail.com'),
(4, 'nurian', 'nuriansyah', 'riansyah', 'nurian@gmail.com'),
(5, 'bayu', 'bayu21', 'bayuman', 'bayu@gmail.com'),
(6, 'jibril', 'jibrila', 'jibril21', 'jibril@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` varchar(10) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL,
  `lokasi` varchar(500) NOT NULL,
  `map` varchar(500) NOT NULL,
  `harga_tiket` varchar(50) NOT NULL,
  `jumlah_pengunjung` int(50) DEFAULT NULL,
  `kuota` int(50) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `id_admin`, `nama_wisata`, `lokasi`, `map`, `harga_tiket`, `jumlah_pengunjung`, `kuota`, `keterangan`, `deskripsi`, `gambar`) VALUES
('BL12', '1933', 'Pantai Balekambang', 'Dusun Sumber Jambe, Desa Srigonco, Kecamatan Bantur, Kabupaten Malang, Jawa Timur', 'https://www.google.com/maps/place/Pantai+Balekambang/@-8.4035709,112.5306164,15z/data=!3m1!4b1!4m5!3', '20.000', 20, 100, 'belum penuh', 'Pantai Balekambang selain sebagai wisata alam, juga bisa disebut sebagai tempat wisata religi. Karena pada hari-hari tertentu, ribuan pengunjung datang ke pantai ini untuk melakukan ritual. Bagi umat Islam, mereka menjalani ritual dengan berziarah ke makam Syaikh Abdul Jalil, orang pertama yang membabat Pantai Balekambang. Selain umat Islam, umat Hindu pun menjadikan pantai ini sebagai tempat ibadah utama setiap setahun sekali. Tepatnya pada hari raya Nyepi, lokasinya di Pura Amarta Jati yang berada di Pulau Ismoyo. Pulau ini menjorok masuk dari bibir pantai sekitar 70 meter yang dihubungkan dengan jembatan. Keberadaan pura ini bagai magnet tersendiri bagi Pantai Balekambang.', 'gambar/bl.jpg'),
('GC13', '1934', 'Pantai Goa Cina', ' Dusun Tumpak Awu, Desa Sitiarjo, Kecamatan Sumbermanjing Wetan, Kabupaten Malang, Jawa Timur', 'https://www.google.com/maps/place/Pantai+Goa+Cina/@-8.4469602,112.6525185,18z/data=!3m1!4b1!4m5!3m4!1s0x2dd601b24c3ffecf:0x8a9dd5320a0a08d8!8m2!3d-8.4471919!4d112.6537097', '20.000', 0, 100, 'belum penuh', 'Nama asli dari pantai ini adalah Pantai Rowo Indah. Namun karena pernah terjadi peristiwa kematian seorang Tionghoa yang sedang bertapa di dalam goa yang ada di kawasan pantai ini, nama Rowo Indah kalah popular dibandingkan dengan Goa Cina yang digunakan sampai sekarang. Tidak ada catatan resmi tahun berapa tragedi itu terjadi, tetapi warga sekitar pantai meyakini sekitar 20 tahunan silam. Dari Pantai Bajulmati, Desa Gajahrejo, Kecamatan Gedangan menuju Pantai Goa Cina ini hanya perlu waktu 15 menit saja karena kedua pantai ini hanya berjarak tak lebih dari 7 km. Aksesnya pun sangat mudah karena melewati jalur lingkar selatan (JLS) dengan aspal yang mulus. Terdapat petunjuk arah dan rambu yang akan memandu pengunjung untuk menuju lokasi. Tetapi Anda harus tetap berhati-hati karena jalannya berkelok-kelok dan berada di sisi jurang.', 'gambar/gc.jpg'),
('SB14', '1935', 'Pantai Sendang Biru', 'Dusun Sendangbiru, Desa Tambakrejo, Kecamatan Sumbermanjing Wetan, Kabupaten Malang, Jawa Timur', 'https://www.google.com/maps/place/Pantai+Sendangbiru/@-8.4318369,112.6842845,17z/data=!3m1!4b1!4m5!3m4!1s0x2dd6017de186609f:0xad73aff33b9271fc!8m2!3d-8.4318369!4d112.6864732', '20.000', 0, 120, 'belum penuh', 'Pantai ini tepat berhadapan dengan Pulau Sempu, hanya terpisahkan oleh Selat Sempu yang sempit dan dengan panjang sekitar 4 kilometer. Di selat ini cocok digunakan untuk berperahu atau olahraga air lainnya karena lokasinya terlindung oleh Pulau Sempu. Oleh karena itu, biasanya pantai ini digunakan sebagai pintu masuk menuju Pulau Sempu yang terkenal dengan kealamiannya. Adanya Pulau Sempu menjadi daya tarik sendiri Pantai Sendangbiru. Pulau Sempu, merupakan Cagar Alam yang berdanau tawar penuh ikan lele di tengah hutannya dan juga danau air laut. Salah satu daya tarik pantai ini adalah pasar ikan di tempat pelelangan ikan (TPI) dan wisata naik perahu bermesin diesel berkeliling pantai. Mayoritas wisatawan yang datang untuk naik perahu dan berbelanja ikan segar karena harganya yang sangat murah. Harga ikan mengikuti musim, sehingga jika pada saat ombak sedang tinggi harga ikan mahal. Hasil laut yang dapat ditemui di Sendangbiru antara lain jenis ikan pelagis yaitu lemurung, layang, teri, tongkol, kembung, dan cumi-cumi. Sedangkan untuk jenis damersal antara lain pari, kerapu, kakap putih, kakap merah dan bawal putih serta jenis komoditas ekspor lainnya seperti tuna, tenggiri, cucut, lobster, teripang, dan rumput laut.', 'gambar/sb.jpg'),
('TG15', '1936', 'Pantai Tiga Warna', 'Desa Tambakerejo, Kecamatan Sumbermanjing Wetan, Kabupaten Malang', 'https://www.google.com/maps/place/Pantai+Tiga+Warna/@-8.4325635,112.6569269,14z/data=!4m5!3m4!1s0x2dd601147042ed43:0x3d8b26de55357956!8m2!3d-8.4391428!4d112.6777942', '20.000', 0, 100, 'belum penuh', 'Pantai Tiga Warna ini memang indah gaes, tetapi selain keindahan yang ditawarkan, juga bisa memanfaatkan fasilitas yang sudah tersedia di Pantai Tiga Warna ini. Salah satu fasilitas yang dapat Anda nikmati adalah wahana snorkeling. Dengan kejernihan air laut Pantai Tiga Warna dan juga ombak yang tenang, Anda dapat melakukan olahraga yang satu ini. Snorkeling adalah kegiatan berenang ataupun menyelam dengan menggunakan peralatan berupa masker selam dan snorkel, selain snorkel juga ada alat bantu gerak berupa kaki katak yang berfungsi untuk menambah daya dorong pada kaki.', 'gambar/tg.jpg');

-- --------------------------------------------------------

--
-- Structure for view `controling_pengunjung`
--
DROP TABLE IF EXISTS `controling_pengunjung`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `controling_pengunjung`  AS  select `admin`.`nama_admin` AS `nama_admin`,`admin`.`telepon` AS `telepon`,`nama_wisata` AS `nama_wisata`,`lokasi` AS `lokasi`,`map` AS `map`,`jumlah_pengunjung` AS `jumlah_pengunjung`,`kuota` AS `kuota`,`keterangan` AS `keterangan` from (`admin` join `wisata`) where `admin`.`id_admin` = `wisata`.`id_admin` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD CONSTRAINT `pengunjung_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `event_jml_pengunjung` ON SCHEDULE EVERY 1 DAY STARTS '2020-04-23 16:12:56' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE wisata SET jumlah_pengunjung = 0$$

CREATE DEFINER=`root`@`localhost` EVENT `event_hapus` ON SCHEDULE EVERY 1 MONTH STARTS '2020-04-19 21:19:33' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM pengunjung$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
