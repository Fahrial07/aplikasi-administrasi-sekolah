-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 05:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siap_bayar`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `nok` bigint(20) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_ayah` varchar(128) NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `alamat_ortu` varchar(258) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nik`, `nok`, `nama_siswa`, `jenis_kelamin`, `kelas_id`, `nama_ayah`, `nama_ibu`, `alamat_ortu`) VALUES
(2, 2111111111111111, 2111111111111112, 'Fitriyani', 'Perempuan', 2, 'Ahmad', 'Zurriati', 'Banda Aceh'),
(4, 1111111111111111, 1111111111111113, 'Syahrul Ramadhan', 'Laki-laki', 1, 'Syafruddin', 'Aminah', 'Banda Aceh'),
(5, 1111111111111114, 1111111111111113, 'Syahrul Muttaqin', 'Laki-laki', 1, 'Syafruddin', 'Aminah', 'Banda Aceh'),
(6, 1111111111111115, 1111111111111113, 'baili syuhada coba', 'Laki-laki', 5, '', 'Aminah', 'banda aceh'),
(7, 2727272727272736, 7772636362736367, 'Aan anware', 'Laki-laki', 1, 'Annware', 'Ibu Zulaikah', 'asdkjgsahgdhsdjasgkdjasdasdad');

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `id` int(11) NOT NULL,
  `bulan_bayar` varchar(128) NOT NULL,
  `jmlh_bayar_lunas` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`id`, `bulan_bayar`, `jmlh_bayar_lunas`, `tahun`) VALUES
(2, '02', 600000, 2020),
(3, '03', 600000, 2020),
(4, '04', 600000, 2020),
(5, '05', 600000, 2020),
(6, '06', 600000, 2020),
(7, '07', 600000, 2020),
(8, '08', 600000, 2020),
(9, '09', 600000, 2020),
(10, '10', 600000, 2020),
(11, '11', 600000, 2020),
(12, '12', 600000, 2020),
(13, '01', 700000, 2021),
(16, '11', 600000, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL,
  `id_kurikulum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `id_kurikulum`) VALUES
(1, 'Kelas VII-1', 1),
(2, 'Kelas VII-2', 1),
(3, 'Kelas VIII-1', 1),
(4, 'Kelas VIII-2', 1),
(5, 'Kelas IX-1', 1),
(6, 'Kelas IX-2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tahun` int(11) NOT NULL,
  `semester` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurikulum`
--

INSERT INTO `kurikulum` (`id`, `nama`, `tahun`, `semester`) VALUES
(1, 'K-2013 Paket', 2020, 'Genap'),
(2, 'K-2013 Paket', 2020, 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `bulan_bayar` varchar(128) NOT NULL,
  `tahun_bayar` bigint(20) NOT NULL,
  `jmlh_bayar` bigint(20) NOT NULL,
  `status` varchar(128) NOT NULL,
  `sisa` bigint(20) NOT NULL,
  `tgl_bayar` int(11) NOT NULL,
  `nama_petugas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_siswa`, `bulan_bayar`, `tahun_bayar`, `jmlh_bayar`, `status`, `sisa`, `tgl_bayar`, `nama_petugas`) VALUES
(1, 2, '01', 0, 600000, 'Lunas', 0, 1576907294, 'Salahul Bain'),
(2, 2, '02', 0, 500000, 'Belum Lunas', 0, 1576910805, 'Salahul Bain'),
(3, 2, '03', 0, 500000, 'Belum Lunas', 0, 1576912439, 'Salahul Bain'),
(4, 5, '04', 0, 600000, 'Lunas', 0, 1576915999, 'Salahul Bain'),
(5, 4, '01', 0, 500000, 'Belum Lunas', 0, 1576916014, 'Salahul Bain'),
(6, 5, '03', 0, 500000, 'Belum Lunas', 0, 1576982929, 'Salahul Bain'),
(7, 4, '05', 0, 400000, 'Belum Lunas', 0, 1576982994, 'Salahul Bain'),
(8, 5, '11', 2021, 600000, 'Lunas', 0, 1577285188, 'Baili Suhada'),
(9, 4, '11', 2021, 600000, 'Lunas', 0, 1577285322, 'Baili Suhada'),
(10, 5, '11', 2021, 600000, 'Lunas', 0, 1577285514, 'Baili Suhada'),
(11, 2, '01', 2021, 600000, 'Lunas', 0, 1577285554, 'Baili Suhada'),
(12, 2, '11', 2021, 600000, 'Lunas', 0, 1577285593, 'Baili Suhada'),
(13, 2, '11', 2021, 600000, 'Lunas', 0, 1577285610, 'Baili Suhada'),
(14, 2, '11', 2021, 600000, 'Lunas', 0, 1577285874, 'Baili Suhada'),
(15, 4, '01', 2021, 600000, 'Lunas', 0, 1577285921, 'Baili Suhada'),
(16, 6, '11', 2021, 600000, 'Lunas', 0, 1577286052, 'Baili Suhada'),
(17, 6, '01', 2020, 400000, 'Belum Lunas', -400000, 1577286905, 'Baili Suhada'),
(18, 6, '11', 2020, 500000, 'Belum Lunas', -500000, 1577287319, 'Baili Suhada'),
(19, 6, '01', 2020, 500000, 'Belum Lunas', -500, 1577287370, 'Baili Suhada'),
(20, 6, '01', 2020, 500000, 'Belum Lunas', -500000, 1577287503, 'Baili Suhada'),
(21, 6, '01', 2020, 500000, 'Belum Lunas', 500000, 1577287798, 'Baili Suhada'),
(22, 6, '01', 2020, 500000, 'Belum Lunas', 500000, 1577287848, 'Baili Suhada'),
(23, 6, '12', 2020, 400000, 'Belum Lunas', 400000, 1577288147, 'Baili Suhada'),
(24, 6, '05', 2020, 400000, 'Belum Lunas', -400000, 1577288349, 'Baili Suhada'),
(25, 6, '10', 2020, 500000, 'Belum Lunas', -500000, 1577288465, 'Baili Suhada'),
(26, 6, '11', 2020, 500000, 'Belum Lunas', -500000, 1577288551, 'Baili Suhada'),
(27, 7, '11', 2021, 600000, 'Lunas', 0, 1636122207, 'admin2'),
(28, 7, '11', 2021, 600000, 'Lunas', 0, 1636125072, 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(7, 'Salahul Bain', 'salahul@gmail.com', 'profile_user.jpg', '$2y$10$UKKPcRTGe9euoWPRVHd1EOG0NCvKxWuqaYU1nW6MNO5cJh8lVPhAO', 1, 1, 1571583076),
(8, 'Baili Suhada', 'bailisuhada@smpislamik.sch.id', 'user-profile-icon-7.jpg', '$2y$10$3J01pcyXlw.8qJhTP0HYBOnxVdfRTtj/xFm8YPqDxAM2L0QsPVBAu', 1, 1, 1576980466),
(9, 'admin2', 'admin2@gmail.com', '67249258_2531256806925770_1106520468942225408_o.jpg', '$2y$10$Vc3TF0J9QXjyZtAIEvsN0.QPRcByClxVRcJSw7oef9aahhqdLTQJe', 1, 1, 0),
(11, 'MuhammadWali, S.Pd.I', 'wali@gmail.vom', 'default.jpg', 'wali@gmail.vom', 3, 1, 1636111082);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 4),
(5, 1, 4),
(6, 3, 6),
(8, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'siswa'),
(3, 'walikelas'),
(4, 'user'),
(6, 'walikelas');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Walikelas');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 4, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 4, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(8, 4, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 2, 'Data Siswa', 'siswa', 'fas fa-fw fa-user', 1),
(11, 2, 'Tambah Siswa', 'siswa/tambahsiswa', 'fas fa-fw fa-users', 1),
(12, 2, 'Transaksi', 'siswa/transaksi', 'fas fa-fw fa-cash-register', 1),
(14, 3, 'Wali Kelas', 'walikelas', 'fas fa-fw fa-chalkboard-teacher', 1),
(15, 6, 'Wali Kelas', 'teacher', 'fas fa-fw fa-chalkboard-teacher', 1),
(16, 1, 'Master', 'admin/master', 'fas fa-fw fa-database', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'salahul.bain@gmail.com', '1Hhk07PDKI2IztOZycD0HxetyG0mTCvYEiJW+WW2f3w=', 1572755551),
(4, 'salahul.bain@gmail.com', 'PLoRjekBgIOjF81HWfVCH1Jf02J8zE3W2nuG+5Grlw8=', 1572757912),
(5, 'salahul.bain@gmail.com', 'Lau66LGCMJbWDas6eR+qyLMggMLn5dbcB59Zabnuz9g=', 1572758051),
(7, 's1c.salahul1@gmail.com', 'ZY9K6bBNmZvuxunkHdOYiDxzxFGLOvHvdLrUIlzq2o0=', 1572801090),
(8, 'fazryanp@gmail.com', 'uWTwpdT7L+atxMOa+2ubf4DRQWyKEauyOO+YxWulYIs=', 1573876944);

-- --------------------------------------------------------

--
-- Table structure for table `walikelas`
--

CREATE TABLE `walikelas` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `role_id` varchar(2) NOT NULL,
  `is_active` varchar(2) NOT NULL,
  `image` varchar(225) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walikelas`
--

INSERT INTO `walikelas` (`id`, `name`, `email`, `kelas_id`, `role_id`, `is_active`, `image`, `date_created`) VALUES
(2, 'MuhammadWali, S.Pd.I', 'wali@gmail.vom', 5, '3', '1', 'default.jpg', 1636111082);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `walikelas`
--
ALTER TABLE `walikelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
