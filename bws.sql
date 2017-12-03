-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 02:17 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bws`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_kerja`
--

CREATE TABLE `bidang_kerja` (
  `id_bdkerja` varchar(5) NOT NULL,
  `nama_bdkerja` varchar(35) NOT NULL,
  `urut` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_kerja`
--

INSERT INTO `bidang_kerja` (`id_bdkerja`, `nama_bdkerja`, `urut`) VALUES
('BK001', 'HUMAN CAPITAL', 1),
('BK002', 'TEKNOLOGI INFORMASI', 2),
('BK003', 'OPERASIONAL', 3),
('BK004', 'TELLER', 4),
('BK005', 'SMO / AE', 5),
('BK006', 'ADMINISTRASI KARTU KREDIT', 6),
('BK007', 'COLLECTOR', 7),
('BK008', 'BUDGETING DAN LOGISTIC', 8),
('BK009', 'SURVEYOR', 9),
('BK010', 'DOKUMENTATOR', 10),
('BK011', 'RESEARCH & DEVELOPMENT', 11),
('BK012', 'SERVICE MANAGEMENT', 12),
('BK013', 'Legal', 13);

-- --------------------------------------------------------

--
-- Table structure for table `explicit`
--

CREATE TABLE `explicit` (
  `id_explicit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `judul_explicit` text NOT NULL,
  `keterangan` text NOT NULL,
  `userfile` text NOT NULL,
  `tgl_post` varchar(30) NOT NULL,
  `validasi_explicit` int(1) NOT NULL DEFAULT '0',
  `like` int(5) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `explicit`
--

INSERT INTO `explicit` (`id_explicit`, `id_pengguna`, `judul_explicit`, `keterangan`, `userfile`, `tgl_post`, `validasi_explicit`, `like`, `bulan`, `tahun`) VALUES
(7, 1, 'Pelatihan', '<p>Pelatihan Mengenai Sistem Sharing baru</p>\r\n', '', '2016-05-19 23:13:39', 1, 1, '05', 2016),
(8, 21, 'Program Keberlanjutan BNI 2015', '<p>Memperkuat Praktik Keberlanjutan Bank Negara Indonesia (Persero) Tbk</p>\r\n', 'BNI SR_2015_FINAL.pdf', '2016-06-01 09:09:40', 1, 2, '06', 2016),
(9, 20, 'PROSEDUR PELAYANAN DAN PENYELESAIAN PENGADUAN NASABAH BNI', '<p>dokumen ini menjelaskan alur alur yang dilakukan oleh petugas untuk membantu nasabah yang mengajukan pengaduan atau komplain terhadap pelayanan BNI</p>\r\n', 'Alur Penanganan Komplain.pdf', '2016-05-20 22:17:45', 1, 0, '05', 2016),
(10, 21, 'Annual Report BNI', '<p>Dokumentasi Perusahaan BNI</p>\r\n', 'BNI_AM_2014_Annual_Report_Final_LR_1.pdf', '2016-07-25 22:23:36', 1, 0, '07', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `bobot_gejala` int(5) NOT NULL,
  `urut` int(5) NOT NULL,
  `id_bdkerja` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `bobot_gejala`, `urut`, `id_bdkerja`) VALUES
('G001', 'Pegawai Resign', 3, 1, 'BK001'),
('G002', 'Sistem Offline', 5, 2, 'BK002'),
('G003', 'Tidak dapat masuk aplikasi', 5, 3, 'BK002'),
('G004', 'Kurang persyaratan realisasi', 5, 4, 'BK003'),
('G005', 'Bentrok pendapat', 3, 5, 'BK003'),
('G006', 'Tidak bisa login rekening nasabah', 1, 6, 'BK004'),
('G007', 'Pemblokiran Kredit', 1, 7, 'BK004'),
('G008', 'Tidak bisa klik menu pada aplikasi', 1, 8, 'BK001'),
('G009', 'Tidak mengupdate data pada penarikan uang', 3, 9, 'BK001'),
('G010', 'Selisih kelebihan atau kekurangan uang tidak sesuai dengan fisik kas', 5, 10, 'BK001'),
('G011', 'Target perbulan mencapai angka diluar rata-rata untuk peminjaman kredit', 3, 11, 'BK005'),
('G012', 'Menargetkan nasabah dengan peminjam kartu kredit tertinggi tiap bulan', 3, 12, 'BK005'),
('G013', 'Pengumpulan data tidak sesuai dengan permintaan', 5, 13, 'BK002'),
('G014', 'Persyaratan data yang diminta tidak lengkap', 5, 14, 'BK002'),
('G015', 'Keterlambatan aplikasi kartu kredit yang dikirim ke pusat', 3, 15, 'BK006'),
('G016', 'Proses kartu kredit yang melebihi service level', 5, 16, 'BK006'),
('G017', 'Nasabah menunggak pembayaran angsuran', 3, 17, 'BK007'),
('G018', 'Nasabah bersikap tidak kooperatif', 5, 18, 'BK007'),
('G019', 'Jumlah fisik dan data sistem tidak sama', 5, 19, 'BK003'),
('G020', 'Agunan tidak dapat dieksekusi', 3, 20, 'BK008'),
('G021', 'Nilai Agunan diatas nilai pasar setempat', 5, 21, 'BK009');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_solusi` varchar(5) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `jumlah_gejala` int(11) NOT NULL,
  `jumlah_fitur` int(11) NOT NULL,
  `selisih` int(11) NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_solusi`, `nilai`, `jumlah_gejala`, `jumlah_fitur`, `selisih`, `id_pengguna`) VALUES
(14, 'S002', '0.5', 2, 2, 0, 1),
(15, 'S003', '0.5', 2, 2, 0, 1),
(16, 'S004', '0', 2, 2, 0, 1),
(17, 'S005', '0.75', 1, 2, 1, 1),
(87, 'S001', '0', 1, 1, 0, 17),
(88, 'S002', '0', 2, 1, 1, 17),
(89, 'S003', '0', 1, 1, 0, 17),
(90, 'S004', '0', 3, 1, 2, 17),
(91, 'S005', '1', 3, 1, 2, 17),
(92, 'S001', '1', 1, 1, 0, 18),
(93, 'S002', '0', 2, 1, 1, 18),
(94, 'S003', '0', 1, 1, 0, 18),
(95, 'S004', '0', 3, 1, 2, 18),
(96, 'S005', '1', 3, 1, 2, 18),
(97, 'S006', '0', 1, 1, 0, 18),
(152, 'S001', '0', 1, 3, 2, 2),
(153, 'S002', '0.769', 2, 3, 1, 2),
(154, 'S003', '0', 1, 3, 2, 2),
(155, 'S004', '0', 3, 3, 0, 2),
(156, 'S005', '0', 2, 3, 1, 2),
(157, 'S006', '0', 2, 3, 1, 2),
(158, 'S007', '0', 2, 3, 1, 2),
(159, 'S008', '0', 2, 3, 1, 2),
(160, 'S009', '0', 2, 3, 1, 2),
(161, 'S010', '0', 1, 3, 2, 2),
(162, 'S011', '0.230', 1, 3, 2, 2),
(163, 'S012', '0', 1, 3, 2, 2),
(164, 'S013', '0.769', 3, 3, 0, 2),
(165, 'S014', '0.384', 2, 3, 1, 2),
(166, 'S015', '0', 2, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE `kasus` (
  `id_kasus` int(11) NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  `id_solusi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `id_gejala`, `id_solusi`) VALUES
(12, 'G001', 'S001'),
(13, 'G002', 'S002'),
(14, 'G003', 'S002'),
(15, 'G004', 'S003'),
(16, 'G006', 'S004'),
(17, 'G007', 'S004'),
(18, 'G008', 'S004'),
(23, 'G009', 'S005'),
(24, 'G010', 'S005'),
(25, 'G011', 'S006'),
(26, 'G012', 'S006'),
(27, 'G013', 'S007'),
(28, 'G014', 'S007'),
(29, 'G015', 'S008'),
(30, 'G016', 'S008'),
(31, 'G017', 'S009'),
(32, 'G018', 'S009'),
(33, 'G019', 'S010'),
(34, 'G020', 'S011'),
(36, 'G002', 'S013'),
(37, 'G003', 'S013'),
(38, 'G006', 'S013'),
(39, 'G003', 'S014'),
(40, 'G006', 'S014'),
(41, 'G005', 'S015'),
(42, 'G011', 'S015'),
(43, 'G002', 'S016'),
(44, 'G003', 'S016'),
(45, 'G020', 'S016'),
(48, 'G001', 'S011'),
(49, 'G019', 'S011'),
(50, 'G005', 'S011');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_explicit`
--

CREATE TABLE `komentar_explicit` (
  `id_komentar_explicit` int(5) NOT NULL,
  `id_explicit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `isi_komentar_explicit` text NOT NULL,
  `tgl_komentar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_tacit`
--

CREATE TABLE `komentar_tacit` (
  `id_komentar_tacit` int(5) NOT NULL,
  `id_tacit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `isi_komentar_tacit` text NOT NULL,
  `tgl_komentar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar_tacit`
--

INSERT INTO `komentar_tacit` (`id_komentar_tacit`, `id_tacit`, `id_pengguna`, `isi_komentar_tacit`, `tgl_komentar`) VALUES
(1, 13, 1, 'asd', '2017-04-20 15:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `like_explicit`
--

CREATE TABLE `like_explicit` (
  `id_like_e` int(5) NOT NULL,
  `id_explicit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tgl_like` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_explicit`
--

INSERT INTO `like_explicit` (`id_like_e`, `id_explicit`, `id_pengguna`, `tgl_like`) VALUES
(2, 7, 2, '2016-07-19 23:19:08'),
(4, 8, 1, '2016-07-10 13:10:40'),
(5, 8, 2, '2017-03-14 18:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `like_tacit`
--

CREATE TABLE `like_tacit` (
  `id_like` int(5) NOT NULL,
  `id_tacit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tgl_like` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_tacit`
--

INSERT INTO `like_tacit` (`id_like`, `id_tacit`, `id_pengguna`, `tgl_like`) VALUES
(1, 11, 2, '2016-07-11 20:52:30'),
(2, 12, 2, '2016-07-19 23:18:31'),
(3, 13, 2, '2016-07-19 23:18:50'),
(4, 13, 1, '2016-07-19 23:20:22'),
(5, 11, 3, '2016-07-20 0:16:36'),
(6, 17, 2, '2016-07-25 20:39:47'),
(8, 18, 1, '2017-04-23 19:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `id_penerima` int(5) NOT NULL,
  `id_posting` int(5) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `tgl_notif` varchar(30) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_pengguna`, `id_penerima`, `id_posting`, `kategori`, `tgl_notif`, `status`) VALUES
(1, 0, 2, 11, 'v_tacit', '2016-07-11 20:52:17', 'Y'),
(2, 0, 2, 6, 'v_explicit', '2016-07-11 20:52:22', 'Y'),
(3, 17, 2, 6, 'like_e', '2016-07-11 20:52:36', 'Y'),
(4, 0, 1, 13, 'v_tacit', '2016-07-19 23:18:17', 'Y'),
(5, 0, 1, 12, 'v_tacit', '2016-07-19 23:18:19', 'Y'),
(6, 0, 1, 7, 'v_explicit', '2016-07-19 23:18:23', 'Y'),
(7, 17, 1, 7, 'like_e', '2016-07-19 23:19:08', 'Y'),
(8, 0, 1, 0, 'reward', '2016-07-20 0:02:07', 'Y'),
(9, 0, 1, 8, 'v_explicit', '2016-07-23 12:34:10', 'Y'),
(10, 0, 2, 9, 'v_explicit', '2016-07-23 12:42:26', 'Y'),
(11, 0, 2, 10, 'v_explicit', '2016-07-23 12:44:46', 'Y'),
(12, 1, 1, 13, 'tacit', '2016-07-23 19:25:51', 'N'),
(13, 0, 3, 14, 'v_tacit', '2016-07-25 20:23:45', 'N'),
(14, 0, 2, 15, 'v_tacit', '2016-07-25 20:23:58', 'Y'),
(15, 0, 1, 12, 'v_tacit', '2016-07-25 20:24:00', 'Y'),
(16, 0, 20, 17, 'v_tacit', '2016-07-25 20:39:33', 'N'),
(17, 0, 20, 16, 'v_tacit', '2016-07-25 20:39:34', 'N'),
(18, 0, 21, 18, 'v_tacit', '2016-07-25 20:55:04', 'N'),
(19, 2, 1, 8, 'like_e', '2016-07-25 21:01:07', 'Y'),
(20, 0, 1, 7, 'v_explicit', '2016-07-25 21:01:22', 'Y'),
(21, 0, 21, 8, 'v_explicit', '2016-07-25 22:10:16', 'N'),
(23, 1, 21, 8, 'like_e', '2016-07-25 22:10:40', 'N'),
(24, 0, 20, 9, 'v_explicit', '2016-07-25 22:17:58', 'N'),
(25, 0, 1, 0, 'reward', '2016-10-27 22:58:12', 'Y'),
(26, 0, 1, 0, 'reward', '2016-11-17 22:11:25', 'Y'),
(27, 0, 1, 0, 'reward', '2016-11-17 22:14:44', 'Y'),
(28, 2, 20, 16, 'tacit', '2017-03-13 23:25:06', 'N'),
(29, 2, 21, 8, 'like_e', '2017-03-14 18:52:08', 'N'),
(30, 0, 21, 10, 'v_explicit', '2017-03-14 19:12:30', 'N'),
(31, 1, 1, 13, 'tacit', '2017-04-20 15:42:56', 'N'),
(32, 0, 21, 18, 'v_tacit', '2017-04-20 17:27:34', 'N'),
(33, 0, 20, 9, 'v_explicit', '2017-04-20 17:27:42', 'N'),
(34, 0, 21, 8, 'v_explicit', '2017-04-20 17:28:13', 'N'),
(35, 0, 21, 10, 'v_explicit', '2017-04-20 17:28:15', 'N'),
(36, 0, 1, 7, 'v_explicit', '2017-04-20 17:28:18', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `id_bdkerja` varchar(5) NOT NULL,
  `hak_akses` int(5) NOT NULL DEFAULT '1',
  `userfile` varchar(100) NOT NULL DEFAULT 'no_photo.jpg',
  `password` varchar(50) NOT NULL,
  `poin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `id_bdkerja`, `hak_akses`, `userfile`, `password`, `poin`) VALUES
(1, 'admin', 'System Admin', 'Laki-Laki', 'PC', '00 00 0000', 'BK001', 3, 'Dhonaldsuliet.jpg', '21232f297a57a5a743894a0e4a801fc3', 30),
(2, 'ahli', 'ahli', 'Laki-Laki', 'ahli', 'ahli', 'BK001', 4, 'no_photo.jpg', '24f91952c16f1edf8ab98d8251493782', 50),
(3, 'user', 'user', 'Perempuan', 'Padang', '11 Juni 1990', 'BK001', 1, 'no_photo.jpg', 'ee11cbb19052e40b07aac0ca060c23ee', 10),
(4, 'manajer', 'manajer', 'Perempuan', 'Bengkulu', '11 Oktober1982', 'BK001', 2, 'no_photo.jpg', '69b731ea8f289cf16a192ce78a37b4f0', 0),
(20, 'U001', 'Melvin Jumery', 'Laki-Laki', 'Palembang', '2 April 1988', 'BK002', 1, 'no_photo.jpg', '090432de83396d78f6165ee9b303effd', 40),
(21, 'U002', 'Muchlis', 'Laki-Laki', 'Palembang', '12 Juni 1982', 'BK001', 1, 'no_photo.jpg', 'b301f22e513d98540ffd4113fad3dc6d', 60);

-- --------------------------------------------------------

--
-- Table structure for table `revise`
--

CREATE TABLE `revise` (
  `id_revise` int(5) NOT NULL,
  `id_solusi` varchar(5) NOT NULL,
  `revisi` text NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `id_reward` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `reward` varchar(100) NOT NULL,
  `keterangan_reward` text NOT NULL,
  `tgl_reward` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id_reward`, `id_pengguna`, `reward`, `keterangan_reward`, `tgl_reward`) VALUES
(1, 1, 'Reward', 'Kontribusi yang anda berikan pada system ini sangat baik', '2016-06-02 09:02:07'),
(2, 1, 'g', 'g', '2016-10-27 22:58:12'),
(3, 1, 'kdlskdlsaklk', 'lakdlsakdlasdkl', '2016-11-17 22:11:25'),
(4, 1, 'dlaskdl', 'ldaklsdk', '2016-11-17 22:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_solusi` varchar(5) NOT NULL,
  `nama_solusi` text NOT NULL,
  `solusi_masalah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` varchar(5) NOT NULL,
  `nama_solusi` text NOT NULL,
  `solusi_masalah` text NOT NULL,
  `validasi` int(1) NOT NULL DEFAULT '0',
  `urut` int(5) NOT NULL,
  `dilihat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `nama_solusi`, `solusi_masalah`, `validasi`, `urut`, `dilihat`) VALUES
('S001', 'Penempatan Pegawai yang tidak sesuai dengan location FIT', '<p>Melakukan Perekrutan pegawai yang berasal dari masing-masing daerah</p>\r\n', 0, 1, 2),
('S002', 'Jaringan Komunikasi down (System Error)', '<ul>\r\n	<li>Koordinasi dengan vendor jaringan komunikasi</li>\r\n	<li>Koordinasi dengan Helpdesk TEK kantor pusat</li>\r\n</ul>\r\n', 0, 2, 1),
('S003', 'bentrok dengan unit bisnis', '<p>Jika bagian pemasaran tetap memaksakan pencairan, maka mereka harus membuat pernyataan TBO yang berisi penundaan realisasi, serta harus membuat target kapan mereka akan menyelesaikan realisasi tersebut.</p>\r\n', 0, 3, 0),
('S004', 'Error Aplikasi', '<ul>\r\n	<li>Re-open aplikasi dan sertifikasi kembali aplikasi tersebut apabila masih bermasalah hubungi SPAM</li>\r\n	<li>Melakukan pembukaan blokir pada BO</li>\r\n</ul>\r\n', 0, 4, 0),
('S005', 'Cash in dan Cash out uang', '<p>Melakukan pengecekan no.rekening nasabah pada sistem apabila terdapat tidak ada penarikan maka lakukan AGI pada sistem</p>\r\n', 0, 5, 0),
('S006', 'Pencapaian Target', '<ol>\r\n	<li>Perbanyak data pelunasan</li>\r\n	<li>Perbanyak sosialisasi atau kerja sama terhadap perusahaan lain agar bisa melakukan pinjaman kredit</li>\r\n</ol>\r\n', 0, 6, 0),
('S007', 'Data', '<p>Melakukan follow up kepada nasabah yang bersangkutan, bisa melalui via email ataupun via call</p>\r\n', 0, 7, 0),
('S008', 'Permasalahan Aplikasi kartu kredit ', '<ol>\r\n	<li>Call kurir untuk mengecek apakah aplikasi kartu kredit sudah sampai dan diterima di pusat dengan mencocokkan nomor memo.</li>\r\n	<li>Dengan Cara Memberikan cap tanggal pada saat menerima aplikasi kartu kredit agar mudah mengecek berapa hari mengerjakannya sampai kartu kreditnya selesai dan mengecek ke masing-masing bagian pemprosesan untuk mengethui adakah kendala pada saat prosesnya</li>\r\n</ol>\r\n', 0, 8, 0),
('S009', 'Nasabah Macet', '<p>Melakukan penagihan secara intensif dan eksekusi agunan nasabah</p>\r\n', 0, 9, 0),
('S010', 'Selisih Kas', '<p>Penghitungan ulang, apabila masih tetap selisih maka akan dilakukan penggantian</p>\r\n', 0, 10, 0),
('S011', 'Pengikatan agunan tidak sempurna', '<p>dilakukan pengikatan ulang</p>\r\n', 0, 11, 0),
('S012', 'Mark up nilai agunan oleh penilaian agunan oleh penilai eksternal', '<p>Review dan melakukan penilaian ulang dari penilai internal</p>\r\n', 0, 12, 0),
('S013', 'Jaringan Komunikasi down (System Error)', '<ul>\r\n	<li>Koordinasi dengan vendor jaringan komunikasi</li>\r\n	<li>Koordinasi dengan Helpdesk TEK kantor pusat</li>\r\n</ul>\r\n', 1, 13, 1),
('S014', 'Jaringan Komunikasi down (System Error)', '<ul>\r\n	<li>Koordinasi dengan vendor jaringan komunikasi</li>\r\n	<li>Koordinasi dengan Helpdesk TEK kantor pusat</li>\r\n</ul>\r\n', 1, 14, 1),
('S015', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 15, 1),
('S016', 'Jaringan Komunikasi down (System Error)', '<ul>\r\n	<li>Koordinasi dengan vendor jaringan komunikasi</li>\r\n	<li>Koordinasi dengan Helpdesk TEK kantor pusat</li>\r\n</ul>\r\n', 1, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tacit`
--

CREATE TABLE `tacit` (
  `id_tacit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `judul_tacit` text NOT NULL,
  `masalah` text NOT NULL,
  `solusi` text NOT NULL,
  `tgl_post` varchar(30) NOT NULL,
  `validasi_tacit` int(1) NOT NULL DEFAULT '0',
  `like` int(5) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tacit`
--

INSERT INTO `tacit` (`id_tacit`, `id_pengguna`, `judul_tacit`, `masalah`, `solusi`, `tgl_post`, `validasi_tacit`, `like`, `bulan`, `tahun`) VALUES
(11, 2, 'Test Case Solusi', '<p>Case Barus</p>\r\n', '<p>Solusi Baru</p>\r\n', '2016-05-11 20:51:43', 1, 2, '05', 2016),
(12, 1, 'Pegawai', '<p>Penempatan Pegawai yang tidak sesuai bidang ahli</p>\r\n', '<p>melakukan perekrutan sesuai dengan bidang ahli calon pegawai</p>\r\n', '2016-06-10 23:10:04', 1, 1, '06', 2016),
(13, 1, 'Sistem Jaringan Kantor', '<p>system offline dan tidak dapat masuk ke aplikasi</p>\r\n', '<p>lapor ke pada bagian teknologi jaringan kantor</p>\r\n', '2016-04-11 23:12:13', 1, 2, '04', 2016),
(14, 3, 'Data', '<p>persyaratan data tidak lengkap</p>\r\n', '<p>melakukan follow up kepada nasabah atau pegawai yang bersangkutan</p>\r\n', '2016-05-20 13:13:09', 1, 0, '05', 2016),
(15, 2, 'Data', '<p>Pengumpulan data dan persyaratan data yang tidak lengkap</p>\r\n', '<p>Melakukan follow up kepada yang bersangkutan, melalui via email atau call</p>\r\n', '2016-04-25 20:18:57', 1, 0, '04', 2016),
(16, 20, 'Jaringan Komunikasi down', '<ul>\r\n	<li>Offline</li>\r\n	<li>Tidak dapat masuk aplikasi</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Koordinasi dengan vendor jaringan komunikasi</li>\r\n	<li>Koordinasi dengan tim help desk teknologi kantor pusat</li>\r\n</ul>\r\n', '2016-04-20 14:33:04', 1, 0, '04', 2016),
(17, 20, 'System Error', '<ol>\r\n	<li>Offline</li>\r\n	<li>Tidak dapat masuk aplikasi</li>\r\n</ol>\r\n', '<ol>\r\n	<li>Koordinasi dengan vendor jaringan komunikasi</li>\r\n	<li>Koordinasi dengan tim Tek kantor pusat</li>\r\n</ol>\r\n', '2016-07-05 11:36:07', 1, 1, '07', 2016),
(18, 21, 'Masalah Penempatan pegawai yang tidak sama dengan location FIT', '<p>Pegawai Resign</p>\r\n', '<p>Melakukan Rekrut pegawai baru yang berasal dari masing-masing daerah dari calon pegawai tersebut</p>\r\n', '2016-06-12 13:54:04', 1, 1, '06', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `id_tmp_gejala` int(11) NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`id_tmp_gejala`, `id_gejala`, `id_pengguna`) VALUES
(6, 'G001', 1),
(7, 'G002', 1),
(28, 'G005', 17),
(29, 'G001', 18),
(39, 'G002', 2),
(40, 'G003', 2),
(41, 'G020', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_kerja`
--
ALTER TABLE `bidang_kerja`
  ADD PRIMARY KEY (`id_bdkerja`),
  ADD KEY `id_bdkerja` (`id_bdkerja`);

--
-- Indexes for table `explicit`
--
ALTER TABLE `explicit`
  ADD PRIMARY KEY (`id_explicit`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`),
  ADD KEY `id_bdkerja` (`id_bdkerja`),
  ADD KEY `id_bdkerja_2` (`id_bdkerja`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id_kasus`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_solusi` (`id_solusi`),
  ADD KEY `id_solusi_2` (`id_solusi`);

--
-- Indexes for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
  ADD PRIMARY KEY (`id_komentar_explicit`),
  ADD KEY `id_explicit` (`id_explicit`,`id_pengguna`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
  ADD PRIMARY KEY (`id_komentar_tacit`),
  ADD KEY `id_tacit` (`id_tacit`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pengguna_2` (`id_pengguna`);

--
-- Indexes for table `like_explicit`
--
ALTER TABLE `like_explicit`
  ADD PRIMARY KEY (`id_like_e`),
  ADD KEY `id_explicit` (`id_explicit`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pengguna_2` (`id_pengguna`);

--
-- Indexes for table `like_tacit`
--
ALTER TABLE `like_tacit`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_tacit` (`id_tacit`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_penerima` (`id_penerima`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_bdkerja` (`id_bdkerja`),
  ADD KEY `id_bdkerja_2` (`id_bdkerja`),
  ADD KEY `id_bdkerja_3` (`id_bdkerja`);

--
-- Indexes for table `revise`
--
ALTER TABLE `revise`
  ADD PRIMARY KEY (`id_revise`),
  ADD KEY `id_solusi` (`id_solusi`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`id_reward`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_solusi` (`id_solusi`),
  ADD KEY `id_solusi_2` (`id_solusi`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tacit`
--
ALTER TABLE `tacit`
  ADD PRIMARY KEY (`id_tacit`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD PRIMARY KEY (`id_tmp_gejala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `explicit`
--
ALTER TABLE `explicit`
  MODIFY `id_explicit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `kasus`
--
ALTER TABLE `kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
  MODIFY `id_komentar_explicit` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
  MODIFY `id_komentar_tacit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `like_explicit`
--
ALTER TABLE `like_explicit`
  MODIFY `id_like_e` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `like_tacit`
--
ALTER TABLE `like_tacit`
  MODIFY `id_like` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `revise`
--
ALTER TABLE `revise`
  MODIFY `id_revise` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `id_reward` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tacit`
--
ALTER TABLE `tacit`
  MODIFY `id_tacit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `id_tmp_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gejala`
--
ALTER TABLE `gejala`
  ADD CONSTRAINT `gejala_ibfk_1` FOREIGN KEY (`id_bdkerja`) REFERENCES `bidang_kerja` (`id_bdkerja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kasus`
--
ALTER TABLE `kasus`
  ADD CONSTRAINT `kasus_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kasus_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
  ADD CONSTRAINT `komentar_explicit_ibfk_1` FOREIGN KEY (`id_explicit`) REFERENCES `explicit` (`id_explicit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_explicit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
  ADD CONSTRAINT `komentar_tacit_ibfk_1` FOREIGN KEY (`id_tacit`) REFERENCES `tacit` (`id_tacit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_tacit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_explicit`
--
ALTER TABLE `like_explicit`
  ADD CONSTRAINT `like_explicit_ibfk_1` FOREIGN KEY (`id_explicit`) REFERENCES `explicit` (`id_explicit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_explicit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_tacit`
--
ALTER TABLE `like_tacit`
  ADD CONSTRAINT `like_tacit_ibfk_1` FOREIGN KEY (`id_tacit`) REFERENCES `tacit` (`id_tacit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_tacit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_penerima`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_bdkerja`) REFERENCES `bidang_kerja` (`id_bdkerja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revise`
--
ALTER TABLE `revise`
  ADD CONSTRAINT `revise_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reward`
--
ALTER TABLE `reward`
  ADD CONSTRAINT `reward_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
