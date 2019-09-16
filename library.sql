-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Sep 2019 pada 07.22
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `ISBN` char(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `IDKategori` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  `fileGambar` varchar(50) NOT NULL,
  `fileBuku` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`ISBN`, `judul`, `deskripsi`, `IDKategori`, `poin`, `fileGambar`, `fileBuku`) VALUES
('000-000-001', 'Algoritma dan Pemrograman bahasa  C', 'Buku ini berisi: 1. Pencarian 2. Pengurutan 3. Matriks 4. Arsip Beruntun 5. Senarai 6. Representasi Fisik dan Variasi Senarai', 2, 150, 'alpro.jpg', 'download/Rinaldi Munir Algoritma & Pemrograman Da.pdf'),
('000-000-002', 'Fisika Dasar I', 'Memberikan konsep-konsep dan prinsip-prinsip dasar fisika yang diperlukan untuk belajar fisika lebih lanjut atau ilmu pengetahuan lainnya. Memberikan ketrampilan dalam penyelesaian persoalan fisika dasar terutama dalam pemakaian kalkulus dasar sebagai alat bantu.', 1, 120, 'fisika.jpg', 'download/Fisika dasar 1 ITB mikrajun abdullah.pdf'),
('000-000-003', 'Statistics for Engineers and Scientists-McGraw-Hil', 'probabilitas dan statistika mempelajari tentang bagaimana merencanakan, mengumpulkan, menganalisis, menginterpretasi, dan mempresentasikan data dan emungkinan suatu peristiwa terjadi, di antara keseluruhan peristiwa yang mungkin terjadi.', 4, 200, 'probstat.jpg', 'download/William Navidi-Statistics for Engineers and Scientists-McGraw-Hill Science_Engineering_Math (2010).pdf'),
('000-000-004', 'Matematika Diskrit', 'Matematika diskrit atau diskret adalah cabang matematika yang membahas segala sesuatu yang bersifat diskrit. Diskrit disini artinya tidak saling berhubungan (lawan dari kontinyu). Objek yang dibahas dalam Matematika Diskrit - seperti bilangan bulat, graf, atau kalimat logika - tidak berubah secara kontinyu, namun memiliki nilai yang tertentu dan terpisah. Beberapa hal yang dibahas dalam matematika ini adalah teori himpunan, teori kombinatorial, teori bilangan, permutasi, fungsi, rekursif, teori graf, dan lain-lain. Matematika diskrit merupakan mata kuliah utama dan dasar untuk bidang ilmu komputer atau informatika.', 2, 170, 'diskrit.jpg', 'download/Rinaldi Munir Matematika Diskrit.pdf'),
('000-000-005', 'Kalkulus', 'kalkulusss', 3, 200, 'kalkulus.jpg', 'download/Calculus (9rd Edition) - Dale Varberg, Edwin Purcell and Steve Rigdon.pdf'),
('000-000-006', 'Fisika Mipa', 'Fisika adalah ilmu mengenai alam, yang mempelajari unsur-unsur dasar pembentuk alam semesta, gaya-gaya yang bekerja di dalamnya, dan akibat-akibatnya; mencakup rentang yang luas: dari partikel sub atom pembentuk semua materi sampai kelakukan alam semesta sebagai suatu kesatuan kosmos.', 1, 220, 'fisika-mipa.jpg', 'download/Fisika mipa.pdf'),
('000-000-007', 'Data Communications and Networking By Behrouz A.Fo', 'Komunikasi data adalah proses pengiriman dan penerimaan data/informasi dari dua atau lebih alat (bahasa Inggris: device) (seperti komputer / laptop / telepon genggam / printer / dan alat komunikasi lain) yang terhubung dalam sebuah jaringan. Baik lokal maupun yang luas, sepeti internet.', 2, 300, '519hGIS5QWL._SX398_BO1,204,203,200_.jpg', 'download/Data Communications and Networking By Behrouz A.Forouzan 4th ed.pdf'),
('000-000-008', 'HAKIKAT PENDIDIKAN KEWARGANEGARAAN', 'akikat pendidikan kewarganegaraan adalah upaya sadar dan terencana untuk mencerdaskan kehidupan bangsa bagi warga negara dengan menumbuhkan jati diri dan moral bangsa sebagai landasan pelaksanaan hak dan kewajiban dalam bela negara, demi kelangsungan kehidupan dan kejayaan bangsa dan negara.', 5, 160, 'pkn.jpg', 'download/Materi 1  HAKIKAT PENDIDIKAN KEWARGANEGARAAN.pdf'),
('000-000-009', ' IDENTITAS NASIONAL', 'Identitas Nasional adalah suatu jati diri yang khas dimiliki oleh suatu bangsa dan tidak dimiliki oleh bangsa yang lain. ... Kata Identitas berasal dari kata Identitu, yang memiliki arti tanda-tanda, ciri-ciri, atau jati diri yang melekat pada seseorang atau sesuatu yang membedakannya dengan yang lain', 5, 150, 'pkn2.jpg', 'download/Materi 2 IDENTITAS NASIONAL.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `IDKategori` int(11) NOT NULL,
  `namaKategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`IDKategori`, `namaKategori`) VALUES
(1, 'Fisika'),
(2, 'Komputer'),
(3, 'Kalkulus'),
(4, 'Statistika'),
(5, 'Kewarganegaraan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukar`
--

CREATE TABLE `tukar` (
  `id_Tukar` int(11) NOT NULL,
  `ISBN` char(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `point_use` int(11) NOT NULL,
  `tanggal_tukar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tukar`
--

INSERT INTO `tukar` (`id_Tukar`, `ISBN`, `username`, `point_use`, `tanggal_tukar`) VALUES
(7, '000-000-002', 'siti', 120, '2019-08-22'),
(8, '000-000-001', 'siti', 150, '2019-08-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` varchar(50) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `hak_akses`, `point`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 0),
('siti', 'e10adc3949ba59abbe56e057f20f883e', 'siswa', 3270);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`IDKategori`);

--
-- Indexes for table `tukar`
--
ALTER TABLE `tukar`
  ADD PRIMARY KEY (`id_Tukar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tukar`
--
ALTER TABLE `tukar`
  MODIFY `id_Tukar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
