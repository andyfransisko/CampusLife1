-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 11:42 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
  `id_admin` varchar(15) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `keterangan`) VALUES
('administrator', 'jo', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(15) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL COMMENT '1=Laki - laki, 2 = Perempuan',
  `tipe_dosen` int(3) NOT NULL COMMENT '1 = Kepala Program Studi, 2 = Pembimbing Akademik, 3 = Dosen Reguler',
  `email_dosen` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_rumah` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL COMMENT '1 = Kristen, 2 = Katolik, 3 = Islam, 4 = Buddha, 5 = Hindu, 6 = Kong Hu Cu',
  `user_add` text NOT NULL,
  `user_edit` text NOT NULL,
  `user_delete` text NOT NULL,
  `status_delete` int(11) NOT NULL COMMENT '1 = aktif, 2 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `jenis_kelamin`, `tipe_dosen`, `email_dosen`, `tmpt_lahir`, `tgl_lahir`, `alamat_rumah`, `no_telp`, `agama`, `user_add`, `user_edit`, `user_delete`, `status_delete`) VALUES
('1', 'qwerty', 1, 1, 'rtyyui', 'awdrwqr', '2121-12-11', 'dwaddwd', '12412456', 'dwad', '', '', '', 0),
('2', 'joni', 1, 3, 'a@gmail.com', 'asdasd', '1999-12-12', '2131', '2131', '1', '', '', '', 0),
('212', 'budi doremi', 1, 3, 'a@gmail.com', 'asdasd', '2000-12-12', 'cengkareng', '123123', '1', '212', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `id_enroll` varchar(15) NOT NULL,
  `id_mata_kuliah` varchar(15) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `id_semester` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id_enroll`, `id_mata_kuliah`, `nim`, `id_semester`) VALUES
('1', '1', '1', '1'),
('ENROLL-2', '1', '2', '1'),
('ENROLL-3', '2', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` varchar(15) NOT NULL,
  `direktori_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id_header` varchar(15) NOT NULL,
  `id_from` varchar(15) NOT NULL,
  `id_to` varchar(15) NOT NULL,
  `subjek` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_custom`
--

CREATE TABLE `jadwal_custom` (
  `id_jadwal` varchar(15) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `tipe_kegiatan` int(11) NOT NULL COMMENT '1=event, 2=meeting, 3=ulang tahun, 4=important',
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tempat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_custom`
--

INSERT INTO `jadwal_custom` (`id_jadwal`, `user_id`, `nama_kegiatan`, `tipe_kegiatan`, `tanggal`, `jam_mulai`, `jam_selesai`, `tempat`) VALUES
('JDL-CUS-1', '1', 'asd', 1, '2019-11-06', '13:04:00', '13:22:00', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id_jadwal` varchar(15) NOT NULL,
  `id_mata_kuliah` varchar(15) NOT NULL,
  `nidn` varchar(15) NOT NULL,
  `hari` varchar(10) NOT NULL COMMENT '1=senin, 2=selasa, 3=rabu, 4=kamis, 5=jumat, 6=sabtu, 7=minggu',
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_ruangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`id_jadwal`, `id_mata_kuliah`, `nidn`, `hari`, `jam_mulai`, `jam_selesai`, `id_ruangan`) VALUES
('JDL-KUL-1', '1', '2', '3', '07:00:00', '09:00:00', 'R-1'),
('JDL-KUL-2', '2', '212', '4', '09:00:00', '11:00:00', 'R-1');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(15) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL,
  `keterangan_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `keterangan_jurusan`) VALUES
('1', 'TIF', 'FIK'),
('2', 'SI', 'SISTECH');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL COMMENT '1 = Laki-Laki, 2 = Perempuan',
  `id_jurusan` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `email_mhs` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `alamat_rumah` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL COMMENT '1 = Kristen, 2 = Katolik, 3 = Islam, 4 = Buddha, 5 = Hindu, 6 = Kong Hu Cu',
  `user_add` text NOT NULL,
  `user_edit` text NOT NULL,
  `user_delete` text NOT NULL,
  `status_delete` int(11) NOT NULL COMMENT '1 = aktif, 0 = delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `jenis_kelamin`, `id_jurusan`, `angkatan`, `email_mhs`, `tgl_lahir`, `tmpt_lahir`, `alamat_rumah`, `no_telp`, `agama`, `user_add`, `user_edit`, `user_delete`, `status_delete`) VALUES
('1', 'jjs', '1', 1, 2017, 'jsj@gmail.com', '0000-00-00', 'jakarta', 'Jln. arwana no 25', '213124214', '2', '', '', '', 0),
('2', 'asdasd', '1', 2, 2017, 'asd@gmail.com', '1999-01-01', 'jkt', 'asdasd', '123123123', '2', '', '', '', 0),
('33', 'jo', '2', 2, 2017, 'domelafamily@gmail.com', '2000-12-12', 'asdasd', 'cengkareng', '213123', '3', '33', '', '', 1),
('41241', 'asd', '1', 1, 2016, 'domelafamily@gmail.com', '1999-12-12', 'asdasd', '213123', '213123', '2', '41241', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_mata_kuliah` varchar(15) NOT NULL,
  `nama_mata_kuliah` varchar(50) NOT NULL,
  `sks` int(5) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `jumlah_penilaian` int(11) NOT NULL COMMENT '3-5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_mata_kuliah`, `nama_mata_kuliah`, `sks`, `id_semester`, `jumlah_penilaian`) VALUES
('1', 'web', 4, 1, 3),
('2', 'algo', 4, 1, 4),
('MTKL-3', 'mpsi', 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah_nilai`
--

CREATE TABLE `matakuliah_nilai` (
  `id_nilai` varchar(15) NOT NULL,
  `id_mata_kuliah` varchar(15) NOT NULL,
  `id_tipe_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah_nilai`
--

INSERT INTO `matakuliah_nilai` (`id_nilai`, `id_mata_kuliah`, `id_tipe_nilai`) VALUES
('1', 'MTKL-3', 1),
('2', 'MTKL-3', 4),
('3', 'MTKL-3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` varchar(15) NOT NULL,
  `id_mata_kuliah` varchar(15) NOT NULL,
  `judul_materi` text NOT NULL,
  `penjelasan_materi` text NOT NULL,
  `kali_pertemuan` int(11) NOT NULL COMMENT 'value 1- 16',
  `direktori_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` varchar(15) NOT NULL,
  `id_from_sender` varchar(15) NOT NULL,
  `id_header` varchar(15) NOT NULL,
  `content` varchar(100) NOT NULL,
  `status_read` varchar(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mhs`
--

CREATE TABLE `nilai_mhs` (
  `id_nilai_mhs` varchar(15) NOT NULL,
  `tipe_nilai` int(11) NOT NULL COMMENT '1=KAT 1, 2=KAT 2, 3=KAT 3, 4=UTS, 5= UAS',
  `nilai_mahasiswa` int(5) NOT NULL,
  `id_enroll` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` varchar(15) NOT NULL,
  `detail_ruangan` varchar(25) NOT NULL,
  `kapasitas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `detail_ruangan`, `kapasitas`) VALUES
('R-1', 'B356', 30);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` varchar(15) NOT NULL,
  `jenis_semester` varchar(10) NOT NULL COMMENT '1 = ganjil, 2 genap, 3=akselerasi',
  `tahun` year(4) NOT NULL,
  `user_add` text NOT NULL,
  `user_edit` text NOT NULL,
  `user_delete` text NOT NULL,
  `status_delete` int(11) NOT NULL COMMENT '1=aktif, 0= deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `jenis_semester`, `tahun`, `user_add`, `user_edit`, `user_delete`, `status_delete`) VALUES
('1', '1', 2019, '', '', '', 0),
('SMSTR-2', '2', 2019, 'administrator', 'administrator', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_penilaian`
--

CREATE TABLE `tipe_penilaian` (
  `id_tipe_penilaian` int(11) NOT NULL,
  `detail_penilaian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` varchar(15) NOT NULL,
  `id_mata_kuliah` varchar(15) NOT NULL,
  `direktori_file` text NOT NULL
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
  `status` int(11) NOT NULL COMMENT '0=belum aktivasi, 1= sudah aktivasi',
  `user_add` text NOT NULL,
  `user_edit` text NOT NULL,
  `user_delete` text NOT NULL,
  `status_delete` int(11) NOT NULL COMMENT '1=aktif, 0=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `images`, `tipe_akun`, `status`, `user_add`, `user_edit`, `user_delete`, `status_delete`) VALUES
('1', '$2y$10$aZPh/HUUaJnlyH7BmvKVwetZBT/CePiKvCE79SQ35pfHDXCkTzttO', 'default.jpg', 1, 1, '', '', '', 0),
('2', '$2y$10$1JnKmrJknhAS.Ovmnrrkree3ZAXrUvnof1LkAIFh2/CAwn7JGEfN.', 'default.jpg', 2, 1, '', '', '', 0),
('212', '$2y$10$Cu5/CZZf24QQO7zfi45CrOCZHVvhupqs3HZbVMnHXyFZt9c9ucZby', 'default.jpg', 2, 1, '', '', '', 0),
('33', '$2y$10$gvlS1dW93SPaWP1Tx9WvXOZ16QgjsyrX4C5.dsqKurnhe64/186fS', 'default.jpg', 1, 1, '', '', '', 0),
('41241', '$2y$10$ISdG3OZr0.Z563pJ4C1y1Owb4AP14ksZ.NaHHgCdUrsqc5TZcNRGS', 'default.jpg', 1, 0, '', '', '', 0),
('administrator', '$2y$10$J0UCMTMhJlsUzB2euKHTw.PnQKW122TCSKR65RN507dm2UNsrI0t.', 'default.jpg', 0, 1, '', '', '', 0);

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
-- Indexes for table `matakuliah_nilai`
--
ALTER TABLE `matakuliah_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `nilai_mhs`
--
ALTER TABLE `nilai_mhs`
  ADD PRIMARY KEY (`id_nilai_mhs`);

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
