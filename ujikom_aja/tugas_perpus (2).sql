-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2024 pada 05.34
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `kategori_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `perpus_id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori_id`) VALUES
(13, 0, 'capten', 'lham', 'PT.gagasan media', '2024-02-20', 'Comedy'),
(14, 0, 'dilan', 'azi', 'Mahaka media', '2024-02-22', 'Comedy'),
(15, 0, 'maling kundangg', 'aldi', 'Visi Media', '2024-02-28', 'Horor'),
(16, 0, 'sejarah indo', 'andre', 'buku fiki', '2024-02-29', 'Comedy'),
(17, 0, 'anak gunung', 'eza', 'multimedia', '2024-02-28', 'Comedy'),
(28, 0, 'jak kicen', 'fadel', 'PT.gagasan alva', '2024-03-05', 'comedy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_kategori`
--

CREATE TABLE `buku_kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_ulasan`
--

CREATE TABLE `buku_ulasan` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `Buku_id` int(11) NOT NULL,
  `ulasan` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_ulasan`
--

INSERT INTO `buku_ulasan` (`id`, `username`, `user_id`, `Buku_id`, `ulasan`, `rating`) VALUES
(1, 'andre', 'aku', 1, '3', 1),
(17, 'ezi', 'maling kundang', 3, 'buku ini saat bagus', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi_pribadi`
--

CREATE TABLE `koleksi_pribadi` (
  `koleksi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_pinjam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nama_buku`, `nama`, `tanggal`, `tanggal_kembali`, `status_pinjam`) VALUES
(1, 'habiebie', 'azi', '2024-02-16', '0000-00-00', 'di pinjam'),
(2, 'Dilan&milea', 'arip', '2024-02-20', '0000-00-00', 'di baca'),
(3, 'pokemon', 'aldi', '2024-02-21', '0000-00-00', 'di kembalikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `pinjam_detail_id` int(11) NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpus`
--

CREATE TABLE `perpus` (
  `perpus_id` int(11) NOT NULL,
  `nama_perpus` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `perpus_id`, `username`, `password`, `email`, `nama_lengkap`, `no_hp`, `alamat`, `role`) VALUES
(7, 1, 'ham', '$2y$10$q02iB03LLVgkD6KXtRvQVOQUTOWTpGAR968rdZSy97VDqwJbXpQGW', 'saputrailham18966@gmail.com', 'ilham', '081223191987', 'langkap', 'admin'),
(8, 2, 'ezi', '$2y$10$dzfF75p9nfU0/.sKzOrtb.mFyLLxeSTe3WlJUhXQ1G.kLtpi8Myu.', 'andre1902@gmail.com', 'andree', '0865565466', 'dobo', 'petugas'),
(11, 0, 'eza', '$2y$10$hafpnMtJX0yFopsxU3TPkuF47ZBDXjqoI3ASlG/Evy09XA9PxrFve', 'eza@gmail.com', 'reza', '', 'banjar', 'petugas'),
(12, 0, 'gilang', '$2y$10$UTgU4syizpiJCDng8DWv.eSvtPHBWDhUdUVBRRKJNLSiy/ntPc/3q', 'gilang@gmail.com', 'gilang nur sukma', '', 'ciamis', 'user'),
(13, 0, 'zahwan', '$2y$10$d7NXvg3QLZ1/E7k7PxcqZOYzGE7pKKgPxIk.L/weXgrRdmRMezzSO', 'zahwan@gmail.com', 'muhammad zahwan ', '', 'banjar', 'Petugas'),
(15, 0, 'iweng', '$2y$10$dF2hintjg4Dd1OYoPCqlau4QAuqAnF0nciduPxJD4rb9J.3c.3mZi', 'weng@gmail.com', 'weng', '', 'banjar\r\n', 'user'),
(16, 0, 'jenal', '$2y$10$U5cqRj1vOzdRu1gYJUjIju6we3ZYU//asU9l/sGCp2D3wyvHx25Dy', 'jenal@gmail.com', 'nal', '', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku_ulasan`
--
ALTER TABLE `buku_ulasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `buku_ulasan`
--
ALTER TABLE `buku_ulasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
