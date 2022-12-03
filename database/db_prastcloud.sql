-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2022 pada 04.01
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prastcloud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(225) NOT NULL,
  `about_text` text NOT NULL,
  `about_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `about_text`, `about_image`) VALUES
(1, '<p>PrastCloud adalah layanan penyedia data berbasis web yang dioperasikan oleh PrastCloud, Inc. PrastCloud menggunakan sistem penyimpanan berjaringan yang memungkinkan pengguna untuk menyimpan dan berbagi data serta berkas dengan pengguna lain di internet menggunakan sinkronisasi data.</p>', 'f74096816e200e7776db4bad4aba9fb5-team.svg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `benefit`
--

CREATE TABLE `benefit` (
  `id` int(225) NOT NULL,
  `benefit_heading` varchar(225) NOT NULL,
  `benefit_text` varchar(255) NOT NULL,
  `benefit_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `benefit`
--

INSERT INTO `benefit` (`id`, `benefit_heading`, `benefit_text`, `benefit_image`) VALUES
(1, '<p>Responsif</p>', '<p>Menjaga agar semua file Anda tersimpan dengan aman, mutakhir, dan dapat diakses dari semua perangkat.</p>', '789d2190ecc1229b1b08e3779232f15b-file.svg'),
(2, '<p>Cadangkan dan Lindungi</p>', '<p>Jika perangkat Anda hilang, file dan foto yang disimpan tidak akan hilang.</p>', 'b703f08fc59bcf7015ae451fe36de631-cloud.svg'),
(3, '<p>Keamanan</p>', '<p>Menjaga privasi file Anda dengan beberapa lapisan perlindungan dari layanan yang dipercaya jutaan orang.</p>', '9d72278adf1a74c0acb1f2eeb0f5b1ef-security.svg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hero`
--

CREATE TABLE `hero` (
  `id` int(225) NOT NULL,
  `hero_text` varchar(255) NOT NULL,
  `hero_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hero`
--

INSERT INTO `hero` (`id`, `hero_text`, `hero_image`) VALUES
(4, '<p>Menyatukan <em>Pengetahuan</em>, <em>ide</em>, dan <em>Teknologi Kelas Dunia</em> untuk perusahaan Anda.</p>', '5a8dcdb4676f7ecab98de485debb279c-hero.svg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(225) NOT NULL,
  `news_heading` varchar(255) NOT NULL,
  `news_text` varchar(255) NOT NULL,
  `news_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `news_heading`, `news_text`, `news_image`) VALUES
(8, '<p>News 1</p>', '<p>Some quick example text to build on the card title and make up the bulk of the card content.</p>', 'ef4f3f540bcbc1a230ae31abd3f01e7e-news1.jpg'),
(9, '<p>News 2</p>', '<p>Some quick example text to build on the card title and make up the bulk of the card content.</p>', '748a285ff6b71f4299f6cdd111d94c88-news2.jpg'),
(10, '<p>News 3</p>', '<p>Some quick example text to build on the card title and make up the bulk of the card content.</p>', 'f811b122b9e3dcff791951dfa4c5d4e7-news3.jpg'),
(11, '<p>News 4</p>', '<p>Some quick example text to build on the card title and make up the bulk of the card content.</p>', '32430e12db83452e8e280afc7b8c78c6-news4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partnerr`
--

CREATE TABLE `partnerr` (
  `id` int(255) NOT NULL,
  `partner_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `partnerr`
--

INSERT INTO `partnerr` (`id`, `partner_image`) VALUES
(4, 'f7d4e1f77605e8427a2f7f7061ba0dd6-gojek-logo.png'),
(5, 'aaf5f93947227e296591ce9396e08515-niagahoster.png'),
(6, '722f705ff497ced3c4fd855506041679-shopee.png'),
(7, 'a9865d3374fbf0525e8093e1d2b24517-tokped.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testi`
--

CREATE TABLE `testi` (
  `id` int(225) NOT NULL,
  `testi_name` varchar(225) NOT NULL,
  `testi_profession` varchar(225) NOT NULL,
  `testi_text` text NOT NULL,
  `testi_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testi`
--

INSERT INTO `testi` (`id`, `testi_name`, `testi_profession`, `testi_text`, `testi_image`) VALUES
(3, '<p>Benedict Cumberbatch</p>', '<p>Aktor</p>', '<p>\"Lorem ipsum dolor sit amet, adipisicing elit. Cum amet distinctio cupiditate vero odit.\"</p>', '53ec19c65233290f77a2b73ae000e80c-user2.jpg'),
(4, '<p>Robert Downey Jr</p>', '<p>Aktor</p>', '<p>\"Lorem ipsum dolor sit amet, adipisicing elit. Cum amet distinctio cupiditate vero odit.\"</p>', 'b041a8b1bada98e4db105d56b1961fc5-user3.jpg'),
(5, '<div>\r\n<div>Tom Hiddleston</div>\r\n</div>', '<p>Aktor</p>', '<div>\r\n<div>Lorem ipsum dolor sit amet, adipisicing elit. Cum amet distinctio cupiditate vero odit.</div>\r\n</div>', '1e085e04b489cdba06f509eaab24a228-user1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_login` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_login`, `username`, `password`, `nama_pengguna`, `telepon`, `email`, `alamat`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '081298669897', 'admin@gmail.com', 'Bogor');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `benefit`
--
ALTER TABLE `benefit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partnerr`
--
ALTER TABLE `partnerr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testi`
--
ALTER TABLE `testi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `benefit`
--
ALTER TABLE `benefit`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `partnerr`
--
ALTER TABLE `partnerr`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `testi`
--
ALTER TABLE `testi`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
