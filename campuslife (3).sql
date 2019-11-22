-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 09:03 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campuslife`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL COMMENT '1 = Laki - laki, 2 = Perempuan',
  `tipe_dosen` int(3) NOT NULL COMMENT '1 = Kepala Program Studi, 2 = Pembimbing Akademik, 3 = Dosen Reguler',
  `email_dosen` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_rumah` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL COMMENT '1 = Kristen, 2 = Katolik, 3 = Islam, 4 = Buddha, 5 = Hindu, 6 = Kong Hu Cu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `jenis_kelamin`, `tipe_dosen`, `email_dosen`, `tmpt_lahir`, `tgl_lahir`, `alamat_rumah`, `no_telp`, `agama`) VALUES
(1, 'qwerty', 1, 1, 'rtyyui', 'awdrwqr', '2121-12-11', 'dwaddwd', '12412456', 'dwad'),
(33, 'asd', 1, 3, 'a@gmail.com', 'asdasd', '1999-12-12', 'asdasd', '12345678', '1');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `id_enroll` int(11) NOT NULL,
  `id_mata_kuliah` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id_enroll`, `id_mata_kuliah`, `nim`, `id_semester`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `id_enroll` int(11) NOT NULL,
  `direktori_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id_header` int(11) NOT NULL,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `subjek` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_custom`
--

CREATE TABLE `jadwal_custom` (
  `id_jadwal` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tempat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id_jadwal` int(11) NOT NULL,
  `id_mata_kuliah` int(11) NOT NULL,
  `nidn` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL,
  `keterangan_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `keterangan_jurusan`) VALUES
(1, 'TIF', 'FIK'),
(2, 'SI', 'SISTECH');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `email_mhs` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `alamat_rumah` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `jenis_kelamin`, `id_jurusan`, `angkatan`, `email_mhs`, `tgl_lahir`, `tmpt_lahir`, `alamat_rumah`, `no_telp`, `agama`) VALUES
(1, 'jjs', '1', 1, 2017, 'jsj@gmail.com', '0000-00-00', 'jakarta', 'Jln. arwana no 25', '213124214', '2'),
(2, 'asdasd', '1', 2, 2017, 'asd@gmail.com', '1999-01-01', 'jkt', 'asdasd', '123123123', '2');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_mata_kuliah` int(11) NOT NULL,
  `nama_mata_kuliah` varchar(50) NOT NULL,
  `sks` int(5) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_mata_kuliah`, `nama_mata_kuliah`, `sks`, `id_semester`) VALUES
(1, 'web', 4, 1),
(2, 'algo', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_from_sender` int(11) NOT NULL,
  `id_header` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `status_read` varchar(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_enroll` int(11) NOT NULL,
  `tipe_nilai` varchar(10) NOT NULL,
  `nilai_mahasiswa` int(5) NOT NULL,
  `id_tugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `detail_ruangan` varchar(25) NOT NULL,
  `kapasitas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `jenis_semester` varchar(10) NOT NULL COMMENT '1 = ganjil, 2 genap, 3=akselerasi',
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `jenis_semester`, `tahun`) VALUES
(1, '1', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_enroll` int(11) NOT NULL,
  `direktori_soal` varchar(100) NOT NULL,
  `direktori_jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `tipe_akun` int(11) NOT NULL COMMENT '1=mahasiswa, 2= dosen, 0=admin',
  `status` int(11) NOT NULL COMMENT '0=belum aktivasi, 1= sudah aktivasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `images`, `tipe_akun`, `status`) VALUES
('1', '12345', 'default.jpg', 1, 1),
('33', '$2y$10$cLcbeJRzjaIYX5j7qNpGc.L5e9Y.nhHbDKodIg5GvbcWE0uodkVgW', 'default.jpg', 2, 1),
('awdawd', 'awdawd', 'default.jpg', 2, 1),
('dwadawd', 'dwadaw', 'default.jpg', 2, 1),
('dwadwad', 'dwadwadadw', 'default.jpg', 2, 1),
('ghi', 'jkl', 'default.jpg', 2, 1),
('yuio', 'iop', 'default.jpg', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`id_enroll`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `jadwal_custom`
--
ALTER TABLE `jadwal_custom`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_mata_kuliah`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;